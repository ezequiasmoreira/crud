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
        $list_produtos = Produto::all();
        return view('produto.index', [
            'produtos' => $list_produtos
        ]);
    }

    public function create(){
        return view('produto.create');
    }

    public function salvar(Request $request){
        $produto = Produto::create($request->all());
        return redirect("/produto")->with("message", "Produto criada com sucesso!");
    }

    public function atualizar(Request $request){
        $produto = $this->getProduto($request->id);
        $produto->update($request->all());
        return redirect("/produto");
    }

    public function editarView($id) {
        return view('produto.edit', [
            'produto' => $this->getProduto($id)
        ]);
    }

    public function excluir($id) {
        $this->getProduto($id)->delete();
        return redirect(url('produto'))->with('success', 'Excluído!');
    }
    //relatórios
    public function relatorioProduto(){

       $data = ['dado'=>'ola'];
        $pdf = PDF::loadView('produto.relatorio.vendas', $data);
        return $pdf->stream('produto.relatorio.vendas.pdf');
       // return $pdf->dawnload('produto.relatorio.vendas.pdf')
    }
    protected function getProduto($id)  {
        return $this->produto->find($id);
    }
}
