<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Eventos extends Model
{
    //
    protected $fillable = [
        'Nombre_evento',
        'Fecha_inicio',
        'Fecha_finalizacion',
        'user_id'

    ];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

}