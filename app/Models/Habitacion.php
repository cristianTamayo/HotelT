<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Habitacion extends Model
{
    use HasFactory;

    protected $table = 'habitacions';

    protected $fillable =[
        'codigo',
        'disponibilidad',
        'numero_camas',
        'imagen'
    ];


    public function reserva(){
        return $this->hasMany(Reserva::class);
    }
}


