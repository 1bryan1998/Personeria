<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proceso extends Model
{
    protected $table='procesos';

    protected $fillable =  [
        'area_proceso',
        'resumen_factico',
        'proceso_a_seguir',
        'persona_id',
        'user_id'
    ];
    public function persona()
    {
        return $this->hasOne(Persona::class, 'id', 'persona_id')->with('caracterizaciones');
    }
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
    public function archivoproceso()
    {
        return $this->hasMany(ArchivoProceso::class);
    }
}

