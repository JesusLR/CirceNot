<?php

namespace App\Http\Controllers;

use App\Models\Gestoria;
use App\Models\GestoriaPatente;
use Illuminate\Http\Request;

class GestoriaController extends Controller
{
   public function gestoriaCreate(){
        return view('admin.gestoria');
   }

   public function createGestoria(Request $request){
    try {
        // dd($request->all());
        $request->file('logoNotaria')->store('public');
        $request->file('fileNombramientoNotario')->store('public');
        
        Gestoria::create([
            'cNombreGestoria' => $request->nomNotaria,
            'iNumGestoria' => $request->numNotaria,
            'cDomicilioGestoria' => $request->domicilioNotaria,
            'cEmailGestoria' => $request->emailNotaria,
            'iTelGestoria' => $request->telNotaria,
            'cLogoGestoria' => 'Nombre del documento',
            'cRutaLogoGestoria' => $request->file('logoNotaria')->store('public'),
            'lActivo' => 1,
            'iPA' => $request->telNotaria,
            'iPC' => 0,
            'iPE' => 0,
            'cPA_Acta' => $request->numActaProtocolo,
            'cPA_Libro' => $request->numLibroProtocolo,
            'iPA_FojaInic' => $request->numFojaIniProtocolo,
            'iPA_FojaFin' => $request->numFojaFinProtocolo,
        ]);

        GestoriaPatente::create([
            'cNombreTitular' => $request->nomNotario,
            'cApellidoPatTitular' => $request->apellitoPatNotario,
            'cApellidoMatTitular' => $request->apellitoMatNotario,
            'cDireccion' => $request->direccionNotario,
            'cCorreo' => $request->correoNotario,
            'iTelefono' => $request->telNotario,
            'iCelular' => $request->celNotario,
            'cRFC' => $request->rfcNotario,
            'cCURP' => $request->curpNotario,
            'cProfesionTitular' => $request->profesionNotario,
            'cFechaNombramiento' => $request->fechaNombNotario,
            'cNombramineto' => 'Nombre del documento',
            'cRutaNombramiento' => $request->file('fileNombramientoNotario')->store('public'),
            'lActivo' => 1,
        ]);

        return redirect()->route('admin_vista_home')->with('success', 'Bienvenido '.$request->nomNotario.'!');
        // return back()->with('success', 'Documento creado con exito!');
     } catch (Exception $err) {
         $conexion->rollback();
         return response()->json([
             'lSuccess' => false,
             'cMensaje' => $err->getMessage(),
         ]);
    }
   }
}
