<?php

namespace App\Http\Controllers;
use App\Produto;
use PDF;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    private $produto;

    public function __construct()  {
        $this->produto = new Produto();
    }

    public function index(){
        if(!$this->validar()){
            return Redirect("/");
        }
        if($empresa = $this->buscarEmpresa()){

            foreach ($empresa as $dado){
                $emp = [ 'empresa_id' => $dado->id];
            }
            $list_produtos = Produto::all();
            return view('produto.index', [
                'produtos'      => $list_produtos
            ],$emp);
        }else{
            $erro = [   'codigo'    => 0,
                        'descricao' => 'Não há empresa definidida não configuração padrão Adminstração/Configuração'
                    ];
            return view('configuracao.erro', $erro);
        }
    }

    public function create(){
        if(!$this->validar()){
            return Redirect("/");
        }
        if($empresa = $this->buscarEmpresa()){
            foreach ($empresa as $dado){
                $emp = [ 'empresa_id' => $dado->id];
            }
            return view('produto.create',$emp);
        }else{
            $erro = [   'codigo'    => 0,
                        'descricao' => 'Não há empresa definidida não configuração padrão Adminstração/Configuraçã'
                    ];
            return view('configuracao.erro', $erro);
        }
    }

    public function salvar(Request $request){
        if(!$this->validar()){
            return Redirect("/");
        }
        $produto = Produto::create($request->all());
        return redirect("/produto");
    }

    public function atualizar(Request $request){
        if(!$this->validar()){
            return Redirect("/");
        }

        $produto = $this->getProduto($request->id);
        $produto->update($request->all());
        return redirect("/produto");
    }

    public function editarView($id) {
        if(!$this->validar()){
            return Redirect("/");
        }
        if($empresa = $this->buscarEmpresa()){
            foreach ($empresa as $dado){
                $emp = [ 'empresa_id' => $dado->id];
            }
            return view('produto.edit', [
                'produto' => $this->getProduto($id)
            ],$emp);
        }else{
            $erro = [   'codigo'    => 0,
                        'descricao' => 'Não há empresa definidida não configuração padrão Adminstração/Configuraçã'
                    ];
            return view('configuracao.erro', $erro);
        }
    }

    public function excluir($id) {
        if(!$this->validar()){
            return Redirect("/");
        }
        $this->getProduto($id)->delete();
        return redirect(url('produto'))->with('success', 'Excluído!');
    }

    protected function getProduto($id)  {
        return $this->produto->find($id);
    }
}
