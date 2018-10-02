<?php

namespace App\Http\Controllers;
use App\Estado;
use App\Pais;
use Illuminate\Http\Request;

class EstadoController extends Controller
{
    private $estado;

    public function __construct()  {
        $this->estado = new Estado();
    }

    public function index(){
        if(!$this->validar()){
            return Redirect("/");
        }
        $empresa      = $this->buscarEmpresa();
        foreach ($empresa as $dado){
          $emp = [ 'empresa_id' => $dado->id];
        }
        $list_estados = Estado::all();
        return view('estado.index', [
            'estados' => $list_estados

        ],$emp);
    }
    public function novoView(){
        if(!$this->validar()){
            return Redirect("/");
        }
        $empresa      = $this->buscarEmpresa();
        foreach ($empresa as $dado){
          $emp = [ 'empresa_id' => $dado->id];
        }
        $list_estados = Estado::all();
        $list_paises  = Pais::all();
        return view('estado.create', [
            'estados' => $list_estados,
            'paises'  => $list_paises

        ],$emp);
    }
    public function salvar(Request $request){
        if(!$this->validar()){
            return Redirect("/");
        }
        $estado = Estado::create($request->all());
        return redirect("/estado")->with("message", "Estado criado com sucesso!");
    }
    public function editarView($id) {
        if(!$this->validar()){
            return Redirect("/");
        }
        $list_paises  = Pais::all();
        return view('estado.edit', [
            'estado' => $this->getEstado($id),
            'paises'  => $list_paises
        ]);
    }
    public function atualizar(Request $request){
        if(!$this->validar()){
            return Redirect("/");
        }
        $estado = $this->getEstado($request->id);
        $estado->update($request->all());
        return redirect("/estado");
    }
    public function excluir($id) {
        if(!$this->validar()){
            return Redirect("/");
        }
        $this->getEstado($id)->delete();
        return redirect(url('estado'))->with('success', 'Excluído!');
    }
    protected function getEstado($id)  {
        return $this->estado->find($id);
    }
}
