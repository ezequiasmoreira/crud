<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    protected $fillable=[
        'id',
        'nome',
        'sigla',
        'usuario_id'
    ];
    protected $table = 'pais';
}
