<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entidade extends Model
{
    protected $fillable=[
        'id',
        'tipo',
        'nome',
        'ativo',
        'empresa_id'
    ];
    protected $table = 'entidade';
}
