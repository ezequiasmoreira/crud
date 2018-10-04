<?php

namespace App\Http\Controllers\Localizacao;
use App\Pais;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PaisController extends Controller
{
    private $pais;

    public function __construct()  {
        $this->pais = new Pais();
    }

    public function index(){
        $list_paises = Pais::all();
        return view('localizacao.pais.index', [
            'paises' => $list_paises
        ]);
    }

    public function novoView(){
        return view('localizacao.pais.create');
    }

    public function salvar(Request $request){
        $pais = Pais::create($request->all());
        return redirect("/pais");
    }

    public function atualizar(Request $request){
        $pais = $this->getPais($request->id);
        $pais->update($request->all());
        return redirect("/pais");
    }

    public function editarView($id) {
        return view('localizacao.pais.edit', [
            'pais' => $this->getPais($id)
        ]);
    }

    public function excluir($id) {
        $this->getPais($id)->delete();
        return redirect(url('pais'))->with('success', 'Excluído!');
    }
    protected function getPais($id)  {
        return $this->pais->find($id);
    }
}
