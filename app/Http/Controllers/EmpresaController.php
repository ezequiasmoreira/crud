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
        $list_empresas = Empresa::all();
        return view('empresa.index', [
            'empresas' => $list_empresas
        ]);
    }
    public function novoView(){
        return view('empresa.create');
    }
    public function salvar(Request $request){
        $empresa = Empresa::create($request->all());
        return redirect("/empresa")->with("message", "Empresa criada com sucesso!");
    }
    public function editarView($id) {
        return view('empresa.edit', [
            'empresa' => $this->getEmpresa($id)
        ]);
    }
    public function atualizar(Request $request){
        $empresa = $this->getEmpresa($request->id);
        $empresa->update($request->all());
        return redirect("/empresa");
    }
    public function excluir($id) {
        $this->getEmpresa($id)->delete();
        return redirect(url('empresa'))->with('success', 'Excluído!');
    }
    protected function getEmpresa($id)  {
        return $this->empresa->find($id);
    }
}
