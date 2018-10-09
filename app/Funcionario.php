<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    protected $fillable=[
        'id',
        'nome',
        'cpf',
        'rg',
        'salario',
        'data_nasc',        
        //fk
        'cargo_id',
        'endereco_principal',
        'empresa_id',
        'usuario_id'
    ];
    protected $table = 'funcionario';
}
