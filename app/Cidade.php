<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
    protected $fillable=[
        'id',
        'nome',
        //fk
        'estado_id',
        'empresa_id',
        'usuario_id'
    ];
    protected $table = 'cidade';
}
