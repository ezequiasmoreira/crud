<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable=[
        'id',
        'descricao',
        'saldo',
        'status'
    ];
    protected $table = 'produto';
}
