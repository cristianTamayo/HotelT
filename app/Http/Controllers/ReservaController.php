<?php

namespace App\Http\Controllers;
use App\Models\Cliente;
use App\Models\Habitacion;
use App\Models\Reserva;

use App\Http\Requests\StorereservaRequest;
use App\Http\Requests\UpdatereservaRequest;
use Illuminate\Http\Request;

class ReservaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorereservaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(reserva $reserva)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(reserva $reserva)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatereservaRequest $request, reserva $reserva)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(reserva $reserva)
    {
        //
    }

    public function crearReserva(Request $request){
        $header =['Content-Type' => 'application/json','charset' => 'utf-8'];
        try {
            $data = $request->all();
            $reserva = new reserva();
            $reserva->fechaInicio=$data['fechaInicio'];
            $reserva->fechaFin=$data['fechaFin'];
            
            $cliente = Cliente::where('correo','=',$request->correo)->Where('password','=',$request->password)->get();
            
            if(count($cliente)==0){
                
                return response()->json('Datos de inicio de sesion incorrecto',200, $header, JSON_UNESCAPED_UNICODE);
            }

            $habitacion = Habitacion::where('codigo','=',$request->codigo_habitacion)->get();
            if(count($habitacion)==0){
                return response()->json('habitacion no encontrada',200, $header, JSON_UNESCAPED_UNICODE);
            }
            foreach ($cliente as $user) {
                $reserva->cedula_cliente=$user->cedula;
            }
            foreach ($habitacion as $h) {
                $reserva->codigo_habitacion=$h->codigo;
            }

            $reserva->save();
            return response()->json("reserva creada",200, $header, JSON_UNESCAPED_UNICODE);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json($th->getMessage(),200, $header, JSON_UNESCAPED_UNICODE);
        }


        
    }

    public function listarReservas(Request $request){
        $header =['Content-Type' => 'application/json','charset' => 'utf-8'];
        try {
            $cliente = Cliente::where('correo','=',$request->correo)->Where('password','=',$request->password)->get();
            
            if(count($cliente)==0){
                
                return response()->json('Datos de inicio de sesion incorrecto',200, $header, JSON_UNESCAPED_UNICODE);
            }

            foreach ($cliente as $user) {
                $cedula_cliente=$user->cedula;
            }
            $reservas= Reserva::where('cedula_cliente','=',$cedula_cliente)->get();
           
            return response()->json($reservas,200, $header, JSON_UNESCAPED_UNICODE);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json($th->getMessage(),200, $header, JSON_UNESCAPED_UNICODE);
        }
    }

    public function eliminarReserva(Request $request){
        $header =['Content-Type' => 'application/json','charset' => 'utf-8'];
        try {

            $cliente = Cliente::where('correo','=',$request->correo)->where('password','=',$request->password)->get();
            
            if(count($cliente)==0){
                
                return response()->json('Datos de inicio de sesion incorrecto',200, $header, JSON_UNESCAPED_UNICODE);
            }

            foreach ($cliente as $user) {
                $cedula_cliente=$user->cedula;
            }
            //$reserva= Reserva::where('cedula_cliente','=',$cedula_cliente)->where('id',$request->id_reserva)->delete();
          
            if(Reserva::where('cedula_cliente','=',$cedula_cliente)->where('id',$request->id_reserva)->delete()){
                $message='Reserva elimimnada';
            };
           
            return response()->json($message,200, $header, JSON_UNESCAPED_UNICODE);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json($th->getMessage(),200, $header, JSON_UNESCAPED_UNICODE);
        }
    }
}
