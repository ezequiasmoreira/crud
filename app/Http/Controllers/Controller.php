<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function validar(){
        $session = session()->get('usuario_id');
        if ($session){
            return true;
        }else{
            return false;
        }
    }
    public function buscarEmpresa(){
        $id = session()->get('usuario_id');
        $sql = "SELECT empresa.*
        FROM empresa INNER JOIN  configuracao
        on (configuracao.empresa_padrao = empresa.id)
        WHERE configuracao.usuario_id = ?";
        $resultSet = DB::select($sql,[$id]);
        return $resultSet;
    }
}
