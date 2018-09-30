<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $fillable=[
        'id',
        'nome',
        'login',
        'senha',
        'data_cadastro',
        //fk
        'empresa_id',
        'usuario_id'
    ];
    protected $table = 'usuario';
}
