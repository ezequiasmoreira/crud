<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Configuracao extends Model
{
    protected $fillable=[
        'id',
        'empresa_padrao',
        'usuario_id'
    ];
    protected $table = 'configuracao';
}
