
    @extends("template.app")
    @section("content")
    <div class="base-home">
        <h1 class="titulo">
            <strong>Lista de cidades</strong>
        </h1>
        <a href= {{url("cidade/novo")}} class="btn add">Adicionar cidade</a>
            <div class="tabela">
                <table cellpadding="0" cellspacing="0" >
                    <thead>
                        <tr >
                            <th  width="5%">Cód</th>
                            <th  width="50%">nome</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cidades as $cidade)
                        <tr>
                            <td> {{$cidade->id}} </td>
                            <td> {{$cidade->nome}}</td>
                            <td align="center">
                                <a href= '<?php echo "cidade/".$cidade->id."/editar" ?>'  class="btn editar">Editar</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endsection
