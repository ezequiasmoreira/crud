<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movimentacao extends Model
{
    protected $fillable=[
        'id',
        'tipo',
        'id_produto',
        'quantidade',
        'id_entidade',
        'data',
        'observacao'
    ];
    protected $table = 'movimentacao';
}
