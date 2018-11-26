<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Personas extends Model
{
    protected $table='personas';
    protected $primaryKey="Cedula";
    public $timestamps=false;
    protected $fillabel=[
      'Cedula',
      'Nombre_Persona',
      'Direccion_Persona',
      'Telefono_Pesona',
      'Email_Pesona'
    ];
  }
