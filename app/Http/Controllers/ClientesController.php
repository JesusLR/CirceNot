<?php

namespace App\Http\Controllers;

use App\Models\Clientes;
use App\Models\ClientesM;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    public function newCliente(){
        return view('clientes.newCliente');
    }

    public function clientesFiscView(){
        return view('clientes.clientesF');
    }

    public function prospectosFiscView(){
        return view('clientes.prospectosF');
    }

    public function clientesMorView(){
        return view('clientes.clientesM');
    }

    public function prospectosMorView(){
        return view('clientes.prospectosM');
    }

    public function consultarRepresentantes(){
        try {

            $clientes = Clientes::where('lActivo', 1)->where('iTipo',1)->get();

            return $clientes;

         } catch (Exception $err) {

             return response()->json([
                 'lSuccess' => false,
                 'cMensaje' => $err->getMessage(),
             ]);
         }
    }

    public function createCliente(Request $request){
        try {
            dd($request->all());
            if($request->clienteTipo == 1){ //Persona Fisica

                $request->file('clienteIdentificacionF')->store('public');
                $request->file('clienteActaF')->store('public');
                $request->file('clienteComprobanteF')->store('public');
                $request->file('clienteVencimientoF')->store('public');

                Clientes::create([
                    'iTipo' =>$request->clienteEstatus,
                    'cNombre' => strtoupper($request->clienteNombre),
                    'cApellidoPat' => strtoupper($request->clienteApellidoP),
                    'cApellidoMat' => strtoupper($request->clienteApellidoM),
                    'cEmail' => $request->clienteEmail,
                    'iTel' => $request->clienteTel,
                    'iCel' => $request->clienteCel,
                    'cCURP' => strtoupper($request->clienteCURP),
                    'cRFC' => strtoupper($request->clienteRFC),
                    'cOcupacion' => strtoupper($request->clienteOcupacion),
                    'cPaisNacimiento' => strtoupper($request->clienteNac),
                    'cEstadoCivil' => strtoupper($request->clienteCivil),
                    'cNombreConyugue' => ($request->clienteCony == null) ? 'N/A' : strtoupper($request->clienteCony),
                    'iCalle1' => $request->clienteCalle,
                    'iNumExt1' => $request->clienteNumEx,
                    'iNumInt1' => $request->clienteNumInt,
                    'cCodPost1' => $request->clienteCp,
                    'cColonia1' => $request->clienteColonia,
                    'cCiudad1' => $request->clienteCiudad,
                    'cEstado1' => $request->clienteEstado,
                    'iCalle2' => $request->clienteCalleFisc,
                    'iNumExt2' => $request->clienteNumExFisc,
                    'iNumInt2' => $request->clienteNumExtFisc,
                    'cCodPost2' => $request->clienteCpFisc,
                    'cColonia2' => $request->clienteColoniaFisc,
                    'cCiudad2' => $request->clienteCiudadFisc,
                    'cEstado2' => $request->clienteEstadoFisc,
                    'cIdentificacionRuta' => $request->file('clienteIdentificacionF')->store('public'),
                    'cActaRuta' => $request->file('clienteActaF')->store('public'),
                    'cComprobanteRuta' => $request->file('clienteComprobanteF')->store('public'),
                    'cFechaVencimientoRuta' => $request->file('clienteVencimientoF')->store('public'),
                ]);

                return redirect()->route('nuevo_cliente')->with('success', 'Cliente '.strtoupper($request->clienteNombre).''.strtoupper($request->clienteApellidoP).''.strtoupper($request->clienteApellidoM).' creado con exito!');

            }else{  //Persona Moral

                $request->file('cleinteActaConstM')->store('public');
                $request->file('clienteRepresentacionDocM')->store('public');

                ClientesM::create([
                    'cRazonSocial' => strtoupper($request->clienteRazonSocial),
                    'cEmail' => $request->clienteCorreoM,
                    'iTel' => $request->telClienteM,
                    'iCel' => $request->celClienteM,
                    'cDomicilioFiscal' => strtoupper($request->clienteDomicilioM),
                    'cEntidad' => strtoupper($request->clienteEntidadM),
                    'cCodigoPost' => $request->clientCodigoPostM,
                    'cRFC' => strtoupper($request->clienteRFCM),
                    'cRegimenFisc' => $request->clienteRegimenM,
                    'iIDClienteF' => $request->clienteRepresentanteM,
                    'cActaRuta' => $request->file('cleinteActaConstM')->store('public'),
                    'cDocumentacionRuta' => $request->file('clienteRepresentacionDocM')->store('public'),
                    'iTipo' => $request->clienteTipo,
                    'lActivo' => 1,
                ]);

                return redirect()->route('nuevo_cliente')->with('success', 'Cliente '.strtoupper($request->clienteRazonSocia).' creado con exito!');
            }

         } catch (Exception $err) {

             return response()->json([
                 'lSuccess' => false,
                 'cMensaje' => $err->getMessage(),
             ]);
         }
    }

    public function editClienteF(Request $request){
        try {

            $cliente = Clientes::where('iIDClienteF', $request->iIDClienteF)->get();

            return $cliente;

         } catch (Exception $err) {

             return response()->json([
                 'lSuccess' => false,
                 'cMensaje' => $err->getMessage(),
             ]);
         }
    }

    public function updateClienteF(Request $request){
        try {

            $cliente = Clientes::where('iIDClienteF', $request->iIDClienteF)->update([
                    'cNombre' => strtoupper($request->cNombe),
                    'cApellidoPat' => strtoupper($request->cApellidoP),
                    'cApellidoMat' => strtoupper($request->cApellidoM),
                    'cEmail' => $request->cEmail,
                    'iTel' => $request->iTel,
                    'iCel' => $request->iCel,
                    'cCURP' => strtoupper($request->cCURP),
                    'cRFC' => strtoupper($request->cRFC),
                    'cOcupacion' => strtoupper($request->cOcupacion),
                    'cPaisNacimiento' => strtoupper($request->cNac),
                    'cEstadoCivil' => strtoupper($request->cCivil),
                    'cNombreConyugue' => ($request->cConyugue == null) ? 'N/A' : strtoupper($request->cConyugue),
                    'iCalle1' => $request->cCalle,
                    'iNumExt1' => $request->cNumExt,
                    'iNumInt1' => $request->cNumInt,
                    'cCodPost1' => $request->cCP,
                    'cColonia1' => $request->cColonia,
                    'cCiudad1' => $request->cCiudad,
                    'cEstado1' => $request->cEstado,
                    'iCalle2' => $request->cCalle2,
                    'iNumExt2' => $request->cNumExt2,
                    'iNumInt2' => $request->cNumInt2,
                    'cCodPost2' => $request->cCP2,
                    'cColonia2' => $request->cColonia2,
                    'cCiudad2' => $request->cCiudad2,
                    'cEstado2' => $request->cEstado2,
                    'lActivo' => 1,
                    'iTipo' => $request->iTipo,
            ]);

            return response()->json([
                'lSuccess' => true,
                'cMensaje' => 'Usuario editado con exito!',
            ]);

         } catch (Exception $err) {

             return response()->json([
                 'lSuccess' => false,
                 'cMensaje' => $err->getMessage(),
             ]);
         }
    }

    public function consultarProspectosFisic(Request $request){
        try {

            $clientes = Clientes::where('lActivo', 1)->where('iTipo',2)->get();

            return $clientes;

         } catch (Exception $err) {

             return response()->json([
                 'lSuccess' => false,
                 'cMensaje' => $err->getMessage(),
             ]);
         }
    }

    public function consultarClientesM(Request $request){
        try {

            $clientes = ClientesM::where('lActivo', 1)->where('iTipo',1)->get();

            return $clientes;

         } catch (Exception $err) {

             return response()->json([
                 'lSuccess' => false,
                 'cMensaje' => $err->getMessage(),
             ]);
         }
    }

    public function editClienteM(Request $request){
        try {

            $cliente = ClientesM::where('iIDClienteM', $request->iIDClienteM)->get();

            return $cliente;

         } catch (Exception $err) {

             return response()->json([
                 'lSuccess' => false,
                 'cMensaje' => $err->getMessage(),
             ]);
         }
    }

    public function updateClienteM(Request $request){
        try {

            $cliente = ClientesM::where('iIDClienteM', $request->iIDClienteM)->update([
                'cRazonSocial' => strtoupper($request->cRazonSocial),
                'cEmail' => $request->cEmail,
                'iTel' => $request->iTel,
                'iCel' => $request->iCel,
                'cDomicilioFiscal' => strtoupper($request->cDomicilio),
                'cEntidad' => strtoupper($request->cEntidad),
                'cCodigoPost' => $request->cCP,
                'cRFC' => strtoupper($request->cRFC),
                'cRegimenFisc' => $request->cRegimenFisc,
                'iIDClienteF' => $request->iRepresentante,
                'iTipo' => $request->iTipo,
            ]);

            return response()->json([
                'lSuccess' => true,
                'cMensaje' => 'Usuario editado con exito!',
            ]);

         } catch (Exception $err) {

             return response()->json([
                 'lSuccess' => false,
                 'cMensaje' => $err->getMessage(),
             ]);
         }
    }

    public function consultarProspectosM(Request $request){
        try {

            $clientes = ClientesM::where('lActivo', 1)->where('iTipo',2)->get();

            return $clientes;

         } catch (Exception $err) {

             return response()->json([
                 'lSuccess' => false,
                 'cMensaje' => $err->getMessage(),
             ]);
         }
    }

}
