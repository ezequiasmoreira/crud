<?php

namespace App\Http\Controllers\Pessoa;
use Illuminate\Support\Facades\DB;
use App\Funcionario;
use App\Cargo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FuncionarioController extends Controller
{
    private $funcionario;

    public function __construct()  {
        $this->funcionario = new Funcionario();
    }

    public function index(){
        $list_funcionarios  = Funcionario::all();
        $list_cargos        = Cargos::all();
        return view('pessoa.funcionario.index', [
            'funcionarios'  => $list_funcionarios,
            'cargos'        => $list_cargos
        ]);
    }

    public function novoView(){
        $list_cargos = Cargo::all();
        return view('pessoa.funcionario.create',[
            'cargos'    => $list_cargos 
        ]);
    }

    public function salvar(Request $request){
        $funcionario = Funcionario::create($request->all());
        return redirect("/funcionario");
    }

    public function atualizar(Request $request){
        $funcionario = $this->getFuncionario($request->id);
        $funcionario->update($request->all());
        return redirect("/funcionario");
    }

    public function editarView($id) {
        $funcionario        =  $this->getFuncionario($id);
        $cargo         =  DB::table('cargo')->where('id','=', $funcionario ->cargo_id)->get();
        
        return view('pessoa.funcionario.edit', [
            'funcionario'   => $this->getFuncionario($id),
            'cargo'         => $cargo        
        ]);
    }

    public function excluir($id) {
        $this->getFuncionario($id)->delete();
        return redirect(url('funcionario'));
    }
    protected function getFuncionario($id)  {
        return $this->funcionario->find($id);
    }
}
