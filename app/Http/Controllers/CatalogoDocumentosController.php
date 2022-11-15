<?php

namespace App\Http\Controllers;

use App\Models\CatalogoDocumentos;
use Illuminate\Http\Request;
use PDF;

class CatalogoDocumentosController extends Controller
{
    public function catalogosAdmin(){
        return view('admin.catalogoDocumentos');
    }

    public function gridDocs(){
        try {
            $docs =  CatalogoDocumentos::select('*')->where('lActivo', '<>', 2)->get();

             return $docs;

         } catch (Exception $err) {
             $conexion->rollback();
             return response()->json([
                 'lSuccess' => false,
                 'cMensaje' => $err->getMessage(),
             ]);
         }
    }

    public function createDoc(Request $request){
        try {
            // dd($request->all());
            $request->file('fileDoc')->store('public');
            CatalogoDocumentos::create([
                'cNombre' => $request->docNombre,
                'cRuta' => $request->file('fileDoc')->store('public'),
                'cDescripcion' => $request->descripcionDoc,
                'iIDCategoria' => $request->categoriaDoc,
                'cPlantilla' => $request->plantillaDoc,
                'lActivo' => 1,
            ]);

            return back()->with('success', 'Documento creado con exito!');
         } catch (Exception $err) {
             $conexion->rollback();
             return response()->json([
                 'lSuccess' => false,
                 'cMensaje' => $err->getMessage(),
             ]);
        }

    }

    public function consultarDocumento($id){
        try {

            $doc = CatalogoDocumentos::where('iIDCatalogoDocumento', $id)->first();
            // dd(public_path());
            $storage = public_path().$doc->cRuta;
            // dd($storage);
            $headers = array(
                'Content-Type' => 'application/pdf',
                'Content-Length' =>   $storage,
                'X-UA-Compatible' => 'IE=Edge,chrome=1',
            );

            return response()->file($storage, $headers);

         } catch (Exception $err) {
             $conexion->rollback();
             return response()->json([
                 'lSuccess' => false,
                 'cMensaje' => $err->getMessage(),
             ]);
        }
    }

    public function catalogoDocAdmin(){
        $docs =  CatalogoDocumentos::select('*')->where('lActivo', 1)->where('iIDCategoria', 1)->get();
        return view('catalogos.catalogoDoc_administracion', compact('docs'));
    }

    public function catalogoDocContratos(){
        return view('catalogos.catalogoDoc_contratos');
    }

    public function stsDoc(Request $request){
        try {

            $doc = CatalogoDocumentos::where('iIDCatalogoDocumento', $request->iIDCatalogoDocumento)->first();

            if($request->sts == 1){
                CatalogoDocumentos::where('iIDCatalogoDocumento', $request->iIDCatalogoDocumento)->update([
                    'lActivo' => 0,
                ]);

                return response()->json([
                    'lSuccess' => true,
                    'cMensaje' => 'Documento '.$doc->cNombre.' inactivado',
                ]);
            }else{
                CatalogoDocumentos::where('iIDCatalogoDocumento', $request->iIDCatalogoDocumento)->update([
                    'lActivo' => 1,
                ]);

                return response()->json([
                    'lSuccess' => true,
                    'cMensaje' => 'Documento '.$doc->cNombre.' activado',
                ]);
            }

         } catch (Exception $err) {
             $conexion->rollback();
             return response()->json([
                 'lSuccess' => false,
                 'cMensaje' => $err->getMessage(),
             ]);
        }
    }

    public function deleteDoc(Request $request){
        try {

            $doc = CatalogoDocumentos::where('iIDCatalogoDocumento', $request->iIDCatalogoDocumento)->first();

            CatalogoDocumentos::where('iIDCatalogoDocumento', $request->iIDCatalogoDocumento)->update([
                'lActivo' => 2,
            ]);

            return response()->json([
                'lSuccess' => true,
                'cMensaje' => 'Documento '.$doc->cNombre.' eliminado',
            ]);

         } catch (Exception $err) {
             $conexion->rollback();
             return response()->json([
                 'lSuccess' => false,
                 'cMensaje' => $err->getMessage(),
             ]);
        }
    }

    public function docUsers(Request $request){
        try {

            $docs = CatalogoDocumentos::where('iIDCategoria', $request->iIDCategoria)->where('lActivo', 1)->get();

            return response()->json([
                'lSuccess' => true,
                'data' => $docs,
            ]);

         } catch (Exception $err) {
             $conexion->rollback();
             return response()->json([
                 'lSuccess' => false,
                 'cMensaje' => $err->getMessage(),
             ]);
        }
    }

    public function createPlantillaPDF(Request $request){

        $plantilla = CatalogoDocumentos::where('iIDCatalogoDocumento', $request->idPlantillaPDF)
        ->first();

        $pdf = PDF::loadView('catalogos.documentoPlantilla', compact('plantilla'));
        return $pdf->download($plantilla->cNombre.'.pdf');
    }

    // public function docprueba(Request $request){
    //     // dd($request->all());
    //     $phpWord = new \PhpOffice\PhpWord\PhpWord();
    //     $doc = CatalogoDocumentos::where('iIDCatalogoDocumento', $request->inputrueba)->first();
    //     $section = $phpWord->addSection();
    //     // $text = $section->addText($request->get('emp_name'));
    //     // $text = $section->addText($request->get('emp_salary'));
    //     $text = $section->addText($doc->cDescripcion);

    //     $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
    //     $objWriter->save('Appdividend.docx');
    //     return response()->download(public_path('Appdividend.docx'));
    // }
}
