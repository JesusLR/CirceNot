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
            $docs =  CatalogoDocumentos::select('*')->get();
             
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
                'cDescripcion' =>$request->descripcionDoc,
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

}
