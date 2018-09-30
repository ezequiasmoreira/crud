<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    protected $fillable=[
        'id',
        'rua',
        'numero',
        'bairro',
        'complemento',
        'cep',
        //fk
        'cidade_id',
        'empresa_id',
        'usuario_id'
    ];
    protected $table = 'endereco';
}
