<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Endereco;
use App\Cliente;
use App\Cidade;
use App\Estado;
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
    public function retornaCidade(Request $request){
        $list_cidades = DB::table('cidade')->where('estado_id','=', $request->estado_id)->get();
        $obj    =   ['cidades'  =>  $list_cidades];
        return $list_cidades;
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
        //$list_enderecos = DB::table('endereco')->where('cliente_id', 100)->get();
        $list_cidades   = Cidade::all();
        $list_estados  = Estado::all();
        return view('cliente.create',[
            'cidades'   =>  $list_cidades,
            'estados'   =>  $list_estados
        ]);
    }
    public function salvar(Request $request){
       if(!$this->validar()){
            return Redirect("/");
        }
        $cliente = New Cliente();
        $cliente ->nome                 = $request->nome;
        $cliente ->cpf                  = $request->cpf;
        $cliente ->data_cadastro        = $request->data_cadastro;
        $cliente ->endereco_principal   = $request->endereco_principal;
        $cliente ->empresa_id           = $request->empresa_id;
        $cliente ->usuario_id           = $request->usuario_id;
        $cliente->save();
        return $cliente;
    }
    
    public function editarView($id) {
        if(!$this->validar()){
            return Redirect("/");
        }
        $list_enderecos = Endereco::all();
        return view('cliente.edit', [
            'cliente'   => $this->getCliente($id),
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
