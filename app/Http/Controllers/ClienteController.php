<?php

namespace App\Http\Controllers;
use App\Endereco;
use App\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    private $cliente;

    public function __construct()  {
        $this->cliente = new Cliente();
    }

    public function index(){
        if(!$this->validar()){
            return Redirect("/");
        }
        $list_enderecos = Endereco::all();
        $list_clientes = Cliente::all();        
        return view('cliente.index', [
            'clientes'  =>  $list_clientes,
            'enderecos' =>  $list_enderecos
        ]);
    }
    public function novoView(){
        if(!$this->validar()){
            return Redirect("/");
        }
        return view('cliente.create');
    }
    public function salvar(Request $request){
        if(!$this->validar()){
            return Redirect("/");
        }
        $cliente = Cliente::create($request->all());
        return redirect("/cliente");
    }
    public function editarView($id) {
        if(!$this->validar()){
            return Redirect("/");
        }
        $list_enderecos = Endereco::all();
        return view('cliente.edit', [
            'cliente' => $this->getCliente($id),
            'enderecos' =>  $list_enderecos
        ]);
    }
    public function atualizar(Request $request){
        if(!$this->validar()){
            return Redirect("/");
        }
        $cliente = $this->getCliente($request->id);
        $cliente->update($request->all());
        return redirect("/cliente");
    }
    public function excluir($id) {
        if(!$this->validar()){
            return Redirect("/");
        }
        $this->getCliente($id)->delete();
        return redirect(url('cliente'));
    }
    protected function getCliente($id)  {
        return $this->cliente->find($id);
    }
}
