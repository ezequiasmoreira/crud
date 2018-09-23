<?php

namespace App\Http\Controllers;
use App\Entidade;
use App\Empresa;
use Illuminate\Http\Request;

class EntidadeController extends Controller
{
    private $entidade;

    public function __construct()  {
        $this->entidade = new Entidade();
    }

    public function index(){
        $list_entidades = Entidade::all();
        $list_empresas = Empresa::all();
        return view('entidade.index', [
            'entidades' => $list_entidades,
            'empresas' => $list_empresas
        ]);
    }
    public function novoView(){
        $list_empresas = Empresa::all();
        return view('entidade.create',[
            'empresas' => $list_empresas
        ]);
    }
    public function salvar(Request $request){
        $entidade = Entidade::create($request->all());
        return redirect("/entidade")->with("message", "Entidade criada com sucesso!");
    }
    public function editarView($id) {
        $list_empresas = Empresa::all();
        return view('entidade.edit', [
            'entidade' => $this->getEntidade($id),
            'empresas' => $list_empresas
        ]);
    }
    public function atualizar(Request $request){
        $entidade = $this->getEntidade($request->id);
        $entidade->update($request->all());
        return redirect("/entidade");
    }
    public function excluir($id) {
        $this->getEntidade($id)->delete();
        return redirect(url('entidade'))->with('success', 'Excluído!');
    }
    protected function getEntidade($id)  {
        return $this->entidade->find($id);
    }
}
