<?php

namespace App\Http\Controllers\Localizacao;
use App\Endereco;
use App\Cidade;
use App\Cliente;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EnderecoController extends Controller
{
    private $endereco;

    public function __construct()  {
        $this->endereco = new Endereco();
    }

    public function index(){
        if(!$this->validar()){
            return Redirect("/");
        }        
        $list_enderecos = Endereco::all();
        return view('localizacao.endereco.index', [
            'enderecos' => $list_enderecos
        ]);
    }
    public function novoView(){
        if(!$this->validar()){
            return Redirect("/");
        }  
        $list_enderecos = Endereco::all();        
        $list_cidades   = Cidade::all();
        $list_clientes  = Cliente::all();
        return view('localizacao.endereco.create', [
            'enderecos' => $list_enderecos,
            'cidades'   => $list_cidades,
            'clientes'  => $list_clientes
        ]);
    }
    public function salvar(Request $request){
        if(!$this->validar()){
            return Redirect("/");
        }
        $endereco = Endereco::create($request->all());
        return redirect("/endereco");
    }
    public function editarView($id) {
        if(!$this->validar()){
            return Redirect("/");
        }
        return view('localizacao.endereco.edit', [
            'endereco' => $this->getEndereco($id)
        ]);
    }
    public function atualizar(Request $request){
        if(!$this->validar()){
            return Redirect("/");
        }
        $endereco = $this->getEndereco($request->id);
        $endereco->update($request->all());
        return redirect("/endereco");
    }
    public function excluir($id) {
        if(!$this->validar()){
            return Redirect("/");
        }
        $this->getEndereco($id)->delete();
        return redirect(url('endereco'));
    }
    protected function getEndereco($id)  {
        return $this->endereco->find($id);
    }
}
