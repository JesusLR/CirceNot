<?php

namespace App\Http\Controllers;
use App\Models\Servicios;
use App\Models\Clientes;
use App\Models\Presupuestos;
use App\Models\CatalogoDocumentos;
use App\Models\PresupuestoService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB as DB;
use PDF;
use \Milon\Barcode\DNS1D;
class PresupuestoController extends Controller
{
    //
    public function newPresupuesto(){
        $services = Servicios::where('lActivo', 1)->get();
        $clientes = Clientes::where('lActivo', 1)->where('iTipo',1)->get();

        return view('presupuestos.newPresupuesto',  compact('services','clientes'));
    }
    public function presupuestosIndex(){
        return view('presupuestos.presupuestosIndex');
    }
    public function getPresupuestos(){
        try {

            $Presupuestos = Presupuestos::select('Presupuestos.id as id','tbClienteF.cNombre as cNombre','tbClienteF.cApellidoPat as cApellidoPat','tbClienteF.cApellidoPat as cApellidoMat','Presupuestos.totales as totales','Presupuestos.lActivo as lActivo')
            ->join('tbClienteF', 'Presupuestos.idClient','=','tbClienteF.iIDClienteF')
            ->where('Presupuestos.lActivo', 1)
            ->get();

            return $Presupuestos;

         } catch (Exception $err) {

             return response()->json([
                 'lSuccess' => false,
                 'cMensaje' => $err->getMessage(),
             ]);
         }
    }
    public function createPresupuesto(Request $request){
        try {
            DB::beginTransaction();

                $presupuesto = Presupuestos::create([
                    'totales' => $request->totales,
                    'honorarios' => $request->honorarios,
                    'ivaHonorarios' => $request->ivaHonorarios,
                    'totalHonorarios' => $request->totalHonorarios,
                    'subtotalServicios' => $request->subtotalServicios,
                    'idClient' => (int)$request->idClient,
                    'userCreator' => "personal_notaria1",
                    'lActivo' => true,

                ]);

                foreach ($request->presupuesto as $lst) {
                    $jsonEncode = json_encode($lst);
                    $pres = json_decode($jsonEncode);

                    PresupuestoService::create([
                        'id_presupuesto' => $presupuesto->id,
                        'id_service' => $pres->id_service,
                        'cantidad' => 1,


                ]);


                }
                DB::commit();


        return response()->json([

            'lSuccess' => true,
            'cMensaje' => "",
            'idPresupuesto' => $presupuesto->id,
        ]);



         } catch (Exception $err) {
            DB::rollback();

             return response()->json([
                 'lSuccess' => false,
                 'cMensaje' => $err->getMessage(),
             ]);
         }
    }
    public function createPDFpresupuesto(Request $request){

        $presupuesto = Presupuestos::where('id', $request->idPresupuestoPDF)
        ->first();

        $servicios = PresupuestoService::select('Servicios.name','Servicios.Price')
        ->join('Servicios', 'Presupuesto_has_service.id_service','=','Servicios.id')
        ->where('Presupuesto_has_service.id_presupuesto',$request->idPresupuestoPDF)
        ->get();

        $lMarcaAgua = false;

        // $plantilla = CatalogoDocumentos::where('iIDCatalogoDocumento', 1)
        // ->first();

        $idPresupuestoPDF = DNS1D::getBarcodeHTML($request->idPresupuestoPDF, 'C39');

        // dd($presupuesto, $servicios);


        // view()->share('productos', $productos);
        $pdf = PDF::loadView('presupuestos.PresupuestoPlantilla', compact('presupuesto', 'servicios','lMarcaAgua','idPresupuestoPDF'));
        return $pdf->download('archivo-pdf.pdf');
    }
}
