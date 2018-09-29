<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>



@foreach($relatorioVendas as $relatorioVenda)
      <p> {{$relatorioVenda->razao_social }} </p>
      <p> {{$relatorioVenda->descricao }} </p>

@endforeach
@foreach($campos as $campo)
    {{$campo}}

@endforeach
<p>quantidade de colunas {{$coluna}}</p>
<p>data de cadastro {{$data}}</p>





<?php



?>
<h1>Relatório de Vendas</h1>
<table class="table table-sm">
    <thead>
      <tr>
        <th scope="col">Empresa</th>
        <th scope="col">Descrição</th>
        <th scope="col">Cadastrado</th>
        <th scope="col">Saldo</th>
        <th scope="col">Empresa</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">1</th>
        <td>Mark</td>
        <td>Otto</td>
        <td></td>
      </tr>
      <tr>
        <th scope="row">2</th>
        <td>Jacob</td>
        <td>Thornton</td>
        <td>@fat</td>
      </tr>
      <tr>
        <th scope="row">3</th>
        <td colspan="2">Larry the Bird</td>
        <td></td>
      </tr>
    </tbody>
  </table>
