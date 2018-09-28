<?php

namespace App\Http\Controllers\Relatorio;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use PDF;
class RelatorioVendaController extends Controller
{
    public function __construct()  {

    }

    public function novoview(){
        return view('Relatorio.Vendas.vendasIndex');
    }


    public function relatorioProduto(Request $request){
        $sql = "SELECT empresa.razao_social,
                produto.created_at AS cadastrado,
                produto.descricao, produto.saldo
                FROM movimentacao INNER JOIN
                produto ON(movimentacao.id_produto = produto.id)
                INNER JOIN empresa ON (empresa.id = produto.empresa_id) ";

        $resultSet = DB::select($sql);


        $dados = ['formulario' => [
                0 =>    [
                        'dado'          =>$request->descricao,
                        'dataInicial'   =>$request->dataInicial],
                1 =>    [
                        'dado'          =>$request->descricao,
                        'dataInicial'   =>$request->dataInicial],
                                         3 =>
                                         ['dado'             =>$request->descricao,
                                         'dataInicial'      =>$request->dataInicial]
                                    ]];
                                   /* ['dataFinal'        =>$request->dataFinal],
                                    ['status'          =>$request->status],
                                    ['mostrarCampos'  =>$request->mostrarCampos]]
                ];*/
        $array[0] = "teste";
        $array[2] = "teste";
        $array[3] = "teste";
        $array[4] = "teste";
        $array[5] = "teste";
        $pdf = PDF::loadView('Relatorio.Vendas.vendas', ["relatorioVendas" => $resultSet]);

        return $pdf->stream('vendas.pdf');
        // return $pdf->dawnload('produto.relatorio.vendas.pdf')
     }


}
