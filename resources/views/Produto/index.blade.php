
    @extends("template.app")
    @section("content")
    <div class="base-home">
        <h1 class="titulo">
            <strong>Lista de produtos</strong>
        </h1>
        <a href= {{url("produto/novo")}} class="btn add">Adicionar produto</a>
            <div class="tabela">
                <table cellpadding="0" cellspacing="0" >
                    <thead>
                        <tr >
                            <th  width="5%">Cód</th>
                            <th  width="5%">Descrição</th>
                            <th >Saldo</th>
                            <th >Status</th>
                            <th colspan="2">acão</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($produtos as $produto)
                        <tr>
                            <td> {{$produto->id}} </td>
                            <td> {{$produto->descricao}}</td>
                            <td align="center"> {{$produto->saldo}} </td>
                            <td align="center"> {{($produto->status == 'S')?"Ativo":"Inativo"}} </td>
                            <td align="center">
                                <a href= '<?php echo "produto/".$produto->id."/editar" ?>'  class="btn editar">Editar</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endsection
