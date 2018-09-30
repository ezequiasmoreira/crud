<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    protected $fillable=[
        'id',
        'funcionario',
        'data_venda',
        //fk
        'cliente_id',
        'empresa_id',
        'usuario_id'
    ];
    protected $table = 'venda';
}
