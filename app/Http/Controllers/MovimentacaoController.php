<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Movimentacao;
use App\Produto;
use App\Entidade;
use Illuminate\Http\Request;

class MovimentacaoController extends Controller
{

    private $movimentacao;

    public function __construct()  {
        $this->movimentacao = new Movimentacao();

    }

    public function index(){
        $sql = "SELECT movimentacao.*,entidade.nome nome_entidade, produto.descricao descricao_produto FROM movimentacao
                INNER JOIN entidade on (movimentacao.id_entidade = entidade.id)
                INNER JOIN produto on (movimentacao.id_produto = produto.id)
                ORDER BY movimentacao.data";
        $resultSet = DB::select($sql);
        return view('movimentacao.index', [
            'movimentacoes' => $resultSet
        ]);
    }
    public function novoView(){
        $list_produtos = Produto::all();
        $list_entidades = Entidade::all();
        return view('movimentacao.create',[
            'produtos' => $list_produtos,
            'entidades' => $list_entidades
        ]);
    }
    public function salvar(Request $request){
        $quantidade = $request->quantidade;
        $produto_id = $request->id_produto;
        $tipo       = $request->tipo;

        $sinal = ($tipo == 'E')?'+':'-';
        $this->atualizaProduto($quantidade,$produto_id,$tipo);
        $movimentacao = Movimentacao::create($request->all());
        return redirect("/movimentacao")->with("message", "movimentacao criada com sucesso!");
    }
    public function editarView($id) {
        $list_produtos = Produto::all();
        $list_entidades = Entidade::all();
        return view('movimentacao.edit', [
            'movimentacao' => $this->getMovimentacao($id),
            'produtos' => $list_produtos,
            'entidades' => $list_entidades
        ]);
    }
    public function atualizar(Request $request){
        $movimentacao = $this->getMovimentacao($request->id);
        $movimentacao->update($request->all());
        return redirect("/movimentacao");
    }
    public function excluir($id) {
        $this->getMovimentacao($id)->delete();
        return redirect(url('movimentacao'))->with('success', 'Excluído!');
    }
    protected function atualizaProduto($saldo,$id,$tipo)  {
        $sinal = ($tipo == 'E')?'+':'-';
        $sql = "UPDATE produto SET saldo = saldo ".$sinal." :paramSaldo where produto.id =:paramId";
        $resultSet = DB::update($sql,[$saldo,$id]);
    }
    protected function getMovimentacao($id)  {
        return $this->movimentacao->find($id);
    }
}
