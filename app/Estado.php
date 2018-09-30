<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    protected $fillable=[
        'id',
        'nome',
        //fk
        'pais_id',
        'empresa_id',
        'usuario_id'
    ];
    protected $table = 'estado';
}
