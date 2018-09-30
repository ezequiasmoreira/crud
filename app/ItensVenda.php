<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItensVenda extends Model
{
    protected $fillable=[
        'id',
        //fk
        'produto_id',
        'venda_id'
    ];
    protected $table = 'itens_venda';}
