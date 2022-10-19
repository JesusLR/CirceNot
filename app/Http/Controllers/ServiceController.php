<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servicios;


class ServiceController extends Controller
{
    //
    public function newService(){
        return view('servicios.newService');
    }

    public function serviceIndex(){
        return view('Servicios.serviceIndex');
    }

    public function createService(Request $request){
        try {

                Servicios::create([
                    'name' => strtoupper($request->nameService),
                    'Description' => strtoupper($request->description),
                    'Type' => (int)$request->typeService,
                    'Price' => $request->servicePrice,
                    'user_creator' => "personal_notaria1",
                    'notaria_id' => 1,
                    'lActivo' => true,

                ]);

                return redirect()->route('service_index')->with('success', 'Servicio '.strtoupper($request->nameService).' creado con exito!');



         } catch (Exception $err) {

             return response()->json([
                 'lSuccess' => false,
                 'cMensaje' => $err->getMessage(),
             ]);
         }
    }
    public function getServices(){
        try {

            $services = Servicios::where('lActivo', 1)->get();

            return $services;

         } catch (Exception $err) {

             return response()->json([
                 'lSuccess' => false,
                 'cMensaje' => $err->getMessage(),
             ]);
         }
    }
    public function getServicesById(Request $request){
        try {

            $services = Servicios::where('lActivo', 1)
            ->where('id',$request->idService)
            ->get();

            return $services;

         } catch (Exception $err) {

             return response()->json([
                 'lSuccess' => false,
                 'cMensaje' => $err->getMessage(),
             ]);
         }
    }

}