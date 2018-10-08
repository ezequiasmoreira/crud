<?php

namespace App\Http\Controllers\Pessoa;
use App\Cargo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CargoController extends Controller
{
    private $cargo;

    public function __construct()  {
        $this->cargo = new Cargo();
    }

    public function index(){
        $list_cargos = Cargo::all();
        return view('pessoa.cargo.index', [
            'cargos' => $list_cargos
        ]);
    }

    public function novoView(){
        return view('pessoa.cargo.create');
    }

    public function salvar(Request $request){
        $cargo = Cargo::create($request->all());
        return redirect("/cargo");
    }

    public function atualizar(Request $request){
        $cargo = $this->getCargo($request->id);
        $cargo->update($request->all());
        return redirect("/cargo");
    }

    public function editarView($id) {
        return view('pessoa.cargo.edit', [
            'cargo' => $this->getCargo($id)
        ]);
    }

    public function excluir($id) {
        $this->getCargo($id)->delete();
        return redirect(url('cargo'))->with('success', 'Excluído!');
    }
    protected function getCargo($id)  {
        return $this->cargo->find($id);
    }
}
