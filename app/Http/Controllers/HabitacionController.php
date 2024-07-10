<?php

namespace App\Http\Controllers;

use App\Models\Habitacion;
use App\Http\Requests\StoreHabitacionRequest;
use App\Http\Requests\UpdateHabitacionRequest;
use Illuminate\Http\Request;

class HabitacionController extends Controller
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
    public function store(StoreHabitacionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Habitacion $habitacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Habitacion $habitacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateHabitacionRequest $request, Habitacion $habitacion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Habitacion $habitacion)
    {
        //
    }

    public function registroHabitacion(Request $request){
        $header =['Content-Type' => 'application/json','charset' => 'utf-8'];
        try {
            $data = $request->all();
            $habitacion = new Habitacion();
            $habitacion->codigo=$data['codigo'];
            $habitacion->disponibilidad=$data['disponibilidad'];
            $habitacion->numero_camas=$data['numero_camas'];
            $habitacion->imagen=$data['imagen'];
            $habitacion->save();
            return response()->json('habitacion registrada',200, $header, JSON_UNESCAPED_UNICODE);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json($th->getMessage(),200, $header, JSON_UNESCAPED_UNICODE);
        }
    }

    public function listarHabitaciones(){
        $header =['Content-Type' => 'application/json','charset' => 'utf-8'];
        try {
            $habitacion = Habitacion::all();
           
            return response()->json($habitacion,200, $header, JSON_UNESCAPED_UNICODE);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json($th->getMessage(),200, $header, JSON_UNESCAPED_UNICODE);
        }
    }

    public function consultaHabitacion($id){
        $header =['Content-Type' => 'application/json','charset' => 'utf-8'];
        try {
            $habitacion = Habitacion::find($id);
           
            return response()->json($habitacion,200, $header, JSON_UNESCAPED_UNICODE);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json($th->getMessage(),200, $header, JSON_UNESCAPED_UNICODE);
        }
    }

    public function consultaHabitacionCodigo(Request $request){
        $header =['Content-Type' => 'application/json','charset' => 'utf-8'];
        try {
            $data = $request->all();
            $habitacion = Habitacion::where('codigo','=',$request->codigo)->get();
           
            return response()->json($habitacion,200, $header, JSON_UNESCAPED_UNICODE);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json($th->getMessage(),200, $header, JSON_UNESCAPED_UNICODE);
        }
    }

    public function eliminarHabitacion($id){
        $header =['Content-Type' => 'application/json','charset' => 'utf-8'];
        try {
            $habitacion = Habitacion::find($id);
            if($habitacion->delete()){
                $message='Habitacion elimimnada';
            };
           
            return response()->json($message,200, $header, JSON_UNESCAPED_UNICODE);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json($th->getMessage(),200, $header, JSON_UNESCAPED_UNICODE);
        }
    }

    public function actualizarHabitacion(Request $request){
        $header =['Content-Type' => 'application/json','charset' => 'utf-8'];
        try {
            $data = $request->all();

            $habitacion = Habitacion::find($data['id_habitacion']);
            $habitacion->codigo=$data['codigo'];
            $habitacion->disponibilidad=$data['disponibilidad'];
            $habitacion->numero_camas=$data['numero_camas'];
            $habitacion->imagen=$data['imagen'];
            $habitacion->save();
            return response()->json('habitacion actualizada',200, $header, JSON_UNESCAPED_UNICODE);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json($th->getMessage(),200, $header, JSON_UNESCAPED_UNICODE);
        }
    }
}
