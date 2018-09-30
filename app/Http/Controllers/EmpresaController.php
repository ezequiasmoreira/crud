<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Empresa;

class EmpresaController extends Controller
{
    public function __construct()  {
        $this->empresa = new Empresa();
    }
    public function index(){
        if(!$this->validar()){
            return Redirect("/");
        }
        $list_empresas = Empresa::all();
        return view('empresa.index', [
            'empresas' => $list_empresas
        ]);
    }
    public function novoView(){
        if(!$this->validar()){
            return Redirect("/");
        }
        return view('empresa.create');
    }
    public function salvar(Request $request){
        if(!$this->validar()){
            return Redirect("/");
        }
        $empresa = Empresa::create($request->all());
        return redirect("/empresa")->with("message", "Empresa criada com sucesso!");
    }
    public function editarView($id) {
        if(!$this->validar()){
            return Redirect("/");
        }
        return view('empresa.edit', [
            'empresa' => $this->getEmpresa($id)
        ]);
    }
    public function atualizar(Request $request){
        if(!$this->validar()){
            return Redirect("/");
        }
        $empresa = $this->getEmpresa($request->id);
        $empresa->update($request->all());
        return redirect("/empresa");
    }
    public function excluir($id) {
        if(!$this->validar()){
            return Redirect("/");
        }
        $this->getEmpresa($id)->delete();
        return redirect(url('empresa'))->with('success', 'Excluído!');
    }
    protected function getEmpresa($id)  {
        return $this->empresa->find($id);
    }
}
