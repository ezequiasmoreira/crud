<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Configuracao;
use App\Empresa;
use Illuminate\Http\Request;

class ConfiguracaoController extends Controller
{
    private $configuracao;

    public function __construct()  {
        $this->configuracao = new Configuracao();
    }

    protected function getConfiguracao(){
        $usuario_id = session()->get('usuario_id');
        $sql = "SELECT * FROM configuracao WHERE usuario_id = ?";
        $resultSet = DB::select($sql,[$usuario_id]);
        return $resultSet;
    }
    public function index(){
        if(!$this->validar()){
            return Redirect("/");
        }
        $resultSet =  $this->getConfiguracao();
        foreach($resultSet as $result){
            $id = $result->id;
        }
        $list_configuracao = $this->configuracao->find(34);
        $list_empresas      = Empresa::all();
       return view('configuracao.edit', [
            'configuracao' => $list_configuracao,
            'empresas'      => $list_empresas
        ]);
    }

    public function atualizar(Request $request){
        if(!$this->validar()){
            return Redirect("/");
        }
        $configuracao = $this->configuracao->find($request->id);;
        $configuracao->update($request->all());
        return Redirect("configuracao");
    }
}
