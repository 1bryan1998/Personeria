<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Caracterizacion extends Model
{
    protected $table = "caracterizaciones";

    protected $fillable=[
        'poblacion_vulnerable',
        'grupos_etnicos',
        'persona_id'
    ];

    public function personas()
    {
        return $this->belongsTo('App\Persona', 'persona_id', 'id');
    }

}
