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
        (int)    $quantidadeMostrarCampos = 0;
        (string) $filtro = "";

        $data = date( 'd/m/Y' , strtotime($request->data_inicial ));
        $filtro = $filtro.($request->descricao)?" AND produto.descricao LIKE '%".$request->descricao."%'":"";
        $filtro = $filtro.($request->data_inicial)?" AND produto.data_cadastro > '".$request->data_inicial."'":"";


        $sql = "SELECT empresa.razao_social,
                produto.data_cadastro AS cadastrado,
                produto.descricao, produto.saldo
                FROM movimentacao INNER JOIN
                produto ON(movimentacao.id_produto = produto.id)
                INNER JOIN empresa ON (empresa.id = produto.empresa_id)
                WHERE produto.id > 0".$filtro;

        $resultSet = DB::select($sql);



        $mostrarCampos           = $request->mostrarCampos;
        $quantidadeMostrarCampos += count($mostrarCampos);


        $campoCheckbox[]=0;
        $campo[1] = "";
        $campo[2] = "";
        $campo[3] = "";
        $campo[4] = "";
        $campo[5] = "";
        if ($mostrarCampos){
            foreach ($mostrarCampos as $key => $value) {

                switch ($value) {
                    case 1: $campoCheckbox[1] = "Saldo";                break;
                    case 2: $campoCheckbox[2] = "Descrição";            break;
                    case 3: $campoCheckbox[3] = "Status";               break;
                    case 4: $campoCheckbox[4] = "Valor do produto";     break;
                    case 5: $campoCheckbox[5] = "Data de cadastro";     break;
                    break;
                }
            }
        }

        $dados = [
                        'descricao'          =>$request->descricao,
                        'dataInicial'        =>$request->dataInicia,
                        'dataFinal'          =>$request->dataFinal,
                        'status'             =>$request->status,
                        'coluna'             =>$quantidadeMostrarCampos,
                        'campos'             =>$campoCheckbox,
                        'data'               =>$data
                    ];

        $pdf = PDF::loadView('Relatorio.Vendas.vendas', [
            "relatorioVendas" => $resultSet,
            "formulario"=> $dados,
        ],$dados);

       return $pdf->stream('vendas.pdf');
        // return $pdf->dawnload('produto.relatorio.vendas.pdf')*/
     }


}
