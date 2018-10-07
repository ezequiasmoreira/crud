<?php

namespace App\Http\Controllers;
use App\Endereco;
use App\Cliente;
use App\Cidade;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    private $cliente;

    public function __construct()  {
        $this->cliente = new Cliente();
    }

    protected $except = [
        'stripe/*',
    ];
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
        //$list_enderecos = DB::table('endereco')->where('cliente_id', 100)->get();
        $list_cidades = Cidade::all();
        return view('cliente.create',[
            'cidades' => $list_cidades
        ]);
    }
    public function salvar(Request $request){
       if(!$this->validar()){
            return Redirect("/");
        }
        $cliente = New Cliente();
        $cliente ->nome = $request->nome;
        $cliente ->cpf = $request->cpf;
        $cliente ->data_cadastro = $request->data_cadastro;
        $cliente ->empresa_id = $request->empresa_id;
        $cliente ->usuario_id = $request->usuario_id;
        $cliente->save();
        //return redirect("/cliente");
        return $cliente;
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
