<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    protected $table = "consultas";

    protected $fillable=[
        'area',
        'motivo',
        'detalle',
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
}
