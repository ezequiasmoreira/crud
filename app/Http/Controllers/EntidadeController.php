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
        if(!$this->validar()){
            return Redirect("/");
        }
        $list_empresas = Empresa::all();
        return view('entidade.create',[
            'empresas' => $list_empresas
        ]);
    }
    public function salvar(Request $request){
        if(!$this->validar()){
            return Redirect("/");
        }
        $entidade = Entidade::create($request->all());
        return redirect("/entidade")->with("message", "Entidade criada com sucesso!");
    }
    public function editarView($id) {
        if(!$this->validar()){
            return Redirect("/");
        }
        $list_empresas = Empresa::all();
        return view('entidade.edit', [
            'entidade' => $this->getEntidade($id),
            'empresas' => $list_empresas
        ]);
    }
    public function atualizar(Request $request){
        if(!$this->validar()){
            return Redirect("/");
        }
        $entidade = $this->getEntidade($request->id);
        $entidade->update($request->all());
        return redirect("/entidade");
    }
    public function excluir($id) {
        if(!$this->validar()){
            return Redirect("/");
        }
        $this->getEntidade($id)->delete();
        return redirect(url('entidade'))->with('success', 'Excluído!');
    }
    protected function getEntidade($id)  {
        return $this->entidade->find($id);
    }
}
