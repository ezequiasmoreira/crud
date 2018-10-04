
    @extends("template.app")
    @section("content")
    <div class="base-home">
        <h1 class="titulo">
            <strong>Lista de endereços</strong>
        </h1>
        <a href= {{url("endereco/novo")}} class="btn add">Adicionar endereço</a>
            <div class="tabela">
                <table cellpadding="0" cellspacing="0" >
                    <thead>
                        <tr >
                            <th  width="25%">Rua</th>
                            <th  width="10%">Num</th>
                            <th  width="25%">bairro</th>
                            <th  width="30%">cidade</th>
                            <th  width="10%">ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($enderecos as $endereco)
                        <tr>
                            <td> {{$endereco->rua}} </td>
                            <td> {{$endereco->numero}} </td>
                            <td> {{$endereco->bairro}} </td>
                            <td> {{$endereco->cidade}} </td>                            
                            <td align="center">
                                <a href= '<?php echo "endereco/".$endereco->id."/editar" ?>'  class="btn editar">Editar</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endsection
