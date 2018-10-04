<?php

namespace App\Http\Controllers;
use App\Estado;
use App\Cidade;
use Illuminate\Http\Request;

class CidadeController extends Controller
{
    private $cidade;

    public function __construct()  {
        $this->cidade = new Cidade();
    }

    public function index(){
        if(!$this->validar()){
            return Redirect("/");
        }
        $empresa      = $this->buscarEmpresa();
        foreach ($empresa as $dado){
          $emp = [ 'empresa_id' => $dado->id];
        }
        $list_estados = Cidade::all();
        return view('cidade.index', [
            'cidades' => $list_estados

        ],$emp);
    }
    public function novoView(){
        if(!$this->validar()){
            return Redirect("/");
        }

        $list_estados = Cidade::all();
        $list_Estados  = Estado::all();
        return view('cidade.create', [
            'cidades' => $list_estados,
            'estados'  => $list_Estados

        ]);
    }
    public function salvar(Request $request){
        if(!$this->validar()){
            return Redirect("/");
        }
        $cidade = Cidade::create($request->all());
        return redirect("/cidade");
    }
    public function editarView($id) {
        if(!$this->validar()){
            return Redirect("/");
        }
        $list_Estados  = Estado::all();
        return view('cidade.edit', [
            'cidade' => $this->getCidade($id),
            'estados'  => $list_Estados
        ]);
    }
    public function atualizar(Request $request){
        if(!$this->validar()){
            return Redirect("/");
        }
        $cidade = $this->getCidade($request->id);
        $cidade->update($request->all());
        return redirect("/cidade");
    }
    public function excluir($id) {
        if(!$this->validar()){
            return Redirect("/");
        }
        $this->getCidade($id)->delete();
        return redirect(url('cidade'))->with('success', 'Excluído!');
    }
    protected function getCidade($id)  {
        return $this->cidade->find($id);
    }
}
