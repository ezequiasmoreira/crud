<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    protected $fillable=[
        'id',
        'nome',
        'salario_inicial',
        'funcao',
        'atividade',
        //fk
        'empresa_id',
        'usuario_id'
    ];
    protected $table = 'cargo';
}
