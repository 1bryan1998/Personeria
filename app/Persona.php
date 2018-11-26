<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $table='personas';

    protected $fillable =  [
        'cedula',
        'nombre',
        'apellido',
        'direccion',
        'celular',
        'genero'
    ];
    public function caracterizaciones()
    {
        return $this->hasOne('App\Caracterizacion');
    }
    public function consultas()
    {
        return $this->hasMany('App\Consulta');
    }
    public function procesos()
    {
        return $this->hasMany('App\Proceso');

    }

}
