<?php

namespace App\Http\Controllers\Relatorio;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PDF;
class RelatorioVendaController extends Controller
{
    public function __construct()  {

    }

    public function novoview(){
        return view('produto.relatorio.vendasIndex');
    }


    public function relatorioProduto(Request $request){
        $data = ['dado'=>$request->descricao];
        $pdf = PDF::loadView('produto.Relatorio.vendas', $data);

        return $pdf->stream('vendas.pdf');
        // return $pdf->dawnload('produto.relatorio.vendas.pdf')
     }
    function processar(Request $request){

        //relatorioProduto($request);
    }

}
