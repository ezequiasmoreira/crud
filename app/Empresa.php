<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $fillable=[
        'id',
        'razao_social',
        'cnpj',
        'capital_social'
    ];
    protected $table = 'empresa';
}
