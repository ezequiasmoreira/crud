<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable=[
        'id',
        'nome',
        'data_cadastro',
        'cpf',
        //fk
        'endereco_principal',
        'empresa_id',
        'usuario_id'
    ];
    protected $table = 'cliente';
}
