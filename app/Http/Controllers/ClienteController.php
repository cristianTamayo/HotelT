<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Http\Requests\StoreClienteRequest;
use App\Http\Requests\UpdateClienteRequest;
use Illuminate\Http\Request;

class ClienteController extends Controller
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
    public function store(StoreClienteRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cliente $cliente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateClienteRequest $request, Cliente $cliente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cliente $cliente)
    {
        //
    }

    public function registroCliente(Request $request){
        $header =['Content-Type' => 'application/json','charset' => 'utf-8'];
        try {
            $data = $request->all();
            $cliente = new Cliente();
            $cliente->cedula=$data['cedula'];
            $cliente->nombre=$data['nombre'];
            $cliente->correo=$data['correo'];
            $cliente->password=$data['password'];
            $cliente->save();
            return response()->json('Cliente registrado',200, $header, JSON_UNESCAPED_UNICODE);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json($th->getMessage(),200, $header, JSON_UNESCAPED_UNICODE);
        }
    }

    public function inicioSesion(Request $request){
        $header =['Content-Type' => 'application/json','charset' => 'utf-8'];
        try {
            $cliente = Cliente::where('correo','=',$request->correo)->Where('password','=',$request->password)->get();
            $mensaje='Inicio de sesion correcto';
            if(count($cliente)==0){
                $mensaje='Datos de inicio de sesion incorrecto';
            }
            return response()->json($mensaje,200, $header, JSON_UNESCAPED_UNICODE);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json($th->getMessage(),200, $header, JSON_UNESCAPED_UNICODE);
        }
    }
}
