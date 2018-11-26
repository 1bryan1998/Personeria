<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArchivoProceso extends Model
{
    protected $table = "archivo_procesos";

    protected $fillable=[
        'url_archivo',
        'proceso_id'

    ];
    public function proceso()
    {
        return $this->hasOne(Proceso::class, 'id', 'proceso_id');
    }
}


