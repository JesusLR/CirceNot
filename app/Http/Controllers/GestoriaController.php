<?php

namespace App\Http\Controllers;

use App\Models\Gestoria;
use App\Models\GestoriaPatente;
use Illuminate\Http\Request;
use App\Http\Requests\GestoriaRequest;
// use Illuminate\Http\Requests\GestoriaRequest;

class GestoriaController extends Controller
{
   public function gestoriaCreate(){
        return view('admin.gestoria');
   }

   public function gestoriaEdit(){
    $gestoria = Gestoria::select('*')->first();
    $gestoriaPatente = GestoriaPatente::select('*')->first();
    return view('gestoria.gestoriaEdit', ['gestoria' => $gestoria, 'gestoriaPatente' => $gestoriaPatente]);
    }

   public function createGestoria(GestoriaRequest $request){
    try {
        // $request->validate([
        //     'nomNotaria' => 'required',
        // ]);
            if($request->checkProtocoloAbierto != null){
                $ipa = true;
            }else{
                $ipa = false;
            }
            // dd($ipa);
        $request->file('logoNotaria')->store('public');
        $request->file('fileNombramientoNotario')->store('public');

        Gestoria::create([
            'cNombreGestoria' => $request->nomNotaria,
            'iNumGestoria' => $request->numNotaria,
            'iIDGestoriaPatente' => 1,
            'cDomicilioGestoria' => $request->domicilioNotaria,
            'cEmailGestoria' => $request->emailNotaria,
            'iTelGestoria' => $request->telNotaria,
            'cLogoGestoria' => 'Nombre del documento',
            'cRutaLogoGestoria' => $request->file('logoNotaria')->store('public'),
            'lActivo' => 1,
            'lPA' => $ipa,
            'lPC' => false,
            'lPE' => false,
            'cPA_Acta' => ($ipa) ? $request->numActaProtocolo : 0,
            'cPA_Libro' => ($ipa) ? $request->numLibroProtocolo : 0,
            'iPA_FojaInic' => ($ipa) ? $request->numFojaIniProtocolo : 0,
            'iPA_FojaFin' => ($ipa) ? $request->numFojaFinProtocolo : 0,
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
            'cNombramiento' => 'Nombre del documento',
            'cRutaNombramiento' => $request->file('fileNombramientoNotario')->store('public'),
            'lActivo' => 1,
        ]);

        return redirect()->route('admin_vista_home')->with('success', 'Se ha guardado correctamente la información de la notaría');
        // return back()->with('success', 'Documento creado con exito!');
    } catch (Exception $err) {
         $conexion->rollback();
         return response()->json([
             'lSuccess' => false,
             'cMensaje' => $err->getMessage(),
         ]);
    }
   }

   public function updateGestoria(Request $request){
    try {
        // dd($request->all());
        $rutaGestoria = Gestoria::select('*')->first();
        $rutaGestoriaPantente = GestoriaPatente::select('*')->first();

            if($request->checkProtocoloAbiertoEdit != null){
                $ipa = true;
            }else{
                $ipa = false;
            }

            if(isset($request->logoNotariaEdit)){
                $request->file('logoNotariaEdit')->store('public');
                $rutaLogo = $request->file('logoNotariaEdit')->store('public');
            }else{
                $rutaLogo = $rutaGestoria->cRutaLogoGestoria;
            }

            if(isset($request->fileNombramientoNotarioEdit)){
                $request->file('fileNombramientoNotarioEdit')->store('public');
                $rutaNombramiento = $request->file('fileNombramientoNotarioEdit')->store('public');
            }else{
                $rutaNombramiento = $rutaGestoriaPantente->cRutaNombramiento;
            }

        // $request->file('fileNombramientoNotario')->store('public');

        Gestoria::where('iIDGestoria', 1)->create([
            'cNombreGestoria' => $request->nomNotariaEdit,
            'iNumGestoria' => $request->numNotariaEdit,
            'iIDGestoriaPatente' => 1,
            'cDomicilioGestoria' => $request->domicilioNotariaEdit,
            'cEmailGestoria' => $request->emailNotariaEdit,
            'iTelGestoria' => $request->telNotariaEdit,
            'cLogoGestoria' => 'Nombre del documento',
            'cRutaLogoGestoria' => $rutaLogo,
            'lActivo' => 1,
            'lPA' => $ipa,
            'lPC' => false,
            'lPE' => false,
            'cPA_Acta' => ($ipa) ? $request->numActaProtocoloEdit : 0,
            'cPA_Libro' => ($ipa) ? $request->numLibroProtocoloEdit : 0,
            'iPA_FojaInic' => ($ipa) ? $request->numFojaIniProtocoloEdit : 0,
            'iPA_FojaFin' => ($ipa) ? $request->numFojaFinProtocoloEdit : 0,
        ]);

        GestoriaPatente::where('iIDGestoriaPatente', 1)->update([
            'cNombreTitular' => $request->nomNotarioEdit,
            'cApellidoPatTitular' => $request->apellitoPatNotarioEdit,
            'cApellidoMatTitular' => $request->apellitoMatNotarioEdit,
            'cDireccion' => $request->direccionNotarioEdit,
            'cCorreo' => $request->correoNotarioEdit,
            'iTelefono' => $request->telNotarioEdit,
            'iCelular' => $request->celNotarioEdit,
            'cRFC' => $request->rfcNotarioEdit,
            'cCURP' => $request->curpNotarioEdit,
            'cProfesionTitular' => $request->profesionNotarioEdit,
            'cFechaNombramiento' => $request->fechaNombNotarioEdit,
            'cNombramiento' => 'Nombre del documento',
            'cRutaNombramiento' => $rutaNombramiento,
            'lActivo' => 1,
        ]);

        return redirect()->route('admin_vista_home')->with('success', 'Se ha actualizado correctamente la información de la notaría');
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
