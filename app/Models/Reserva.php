<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;

    protected $table = 'reservas';

    protected $fillable =[
        'fechaInicio',
        'fechaFin',
        'cedula_cliente',
        'codigo_habitacion'
    ];


    public function cliente(){
        return $this->belongsTo(Ciente::class,'cedula','cedula_cliente');
    }
    public function habitacion(){
        return $this->belongsTo(Habitacion::class,'codigo','codigo_habitacion');
        
    }
}

