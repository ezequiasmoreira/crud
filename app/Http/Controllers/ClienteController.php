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
        $endereco = New Endereco();
        
        foreach ($request->endereco as $key => $value) {
            switch ($key) {
                case  'rua'     : $endereco->rua    = $value; break;
                case  'numero'  : $endereco->numero = $value; break;
                case  'bairro'  : $endereco->bairro = $value; break;
                case  'complemento'  : $endereco->complemento = $value; break;
                case  'cep'  : $endereco->cep = $value; break;
                case  'cidade'  : $endereco->cidade_id = $value; break;
                case  'empresa_id'  : $endereco->empresa_id = $value; break;
                case  'usuario_id'  : $endereco->usuario_id = $value; break;               
                default:
                break;
            }
        }
        $endereco->save();      
        
        $cliente = New Cliente();
        $cliente ->nome                 = $request->nome;
        $cliente ->cpf                  = $request->cpf;
        $cliente ->data_cadastro        = $request->data_cadastro;
        $cliente ->endereco_principal   = $endereco->id;
        $cliente ->empresa_id           = $request->empresa_id;
        $cliente ->usuario_id           = $request->usuario_id;        
        $cliente->save();
        $list_estados = Estado::all();
        $obj =  ['cliente'    => $cliente,
                'endereco'  => $endereco,
                'estados'   => $list_estados
        ];
        return $obj;
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
