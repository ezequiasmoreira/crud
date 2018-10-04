
@extends("template.app")
@section("content")
<div class="base-home">
    <h1 class="titulo">
        <strong>Lista de endereços</strong>
    </h1>
    <a href= {{url("cliente/novo")}} class="btn add">Adicionar cliente</a>
        <div class="tabela">
            <table cellpadding="0" cellspacing="0" >
                <thead>
                    <tr >
                        <th  width="5%">cod</th>
                        <th  width="50%">nome</th>
                        <th  width="5%">cpf</th>
                        <th  width="10%">ação</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clientes as $cliente)
                    <tr>
                        <td> {{$cliente->id}} </td>
                        <td> {{$cliente->nome}}</td>
                        <td align="center"> {{$cliente->cpf}} </td>
                        <td align="center">
                            <a href= '<?php echo "cliente/".$cliente->id."/editar" ?>'  class="btn editar">Editar</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
