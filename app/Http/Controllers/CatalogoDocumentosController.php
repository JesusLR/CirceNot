<?php

namespace App\Http\Controllers;

use App\Models\CatalogoDocumentos;
use Illuminate\Http\Request;

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

            $headers = array(
                'Content-Type' => 'application/pdf',
                'Content-Length' => filesize($doc->cRuta),
                'X-UA-Compatible' => 'IE=Edge,chrome=1',
            );

            return response()->file($doc->cRuta, $headers);
           
         } catch (Exception $err) {
             $conexion->rollback();
             return response()->json([
                 'lSuccess' => false,
                 'cMensaje' => $err->getMessage(),
             ]);
        }
    }

    public function catalogoDocAdmin(){
        return view('catalogos.catalogoDoc_administracion');
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

}
