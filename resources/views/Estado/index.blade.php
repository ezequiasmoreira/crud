
    @extends("template.app")
    @section("content")
    <div class="base-home">
        <h1 class="titulo">
            <strong>Lista de estados</strong>
        </h1>
        <a href= {{url("estado/novo")}} class="btn add">Adicionar estado</a>
            <div class="tabela">
                <table cellpadding="0" cellspacing="0" >
                    <thead>
                        <tr >
                            <th  width="5%">Cód</th>
                            <th  width="50%">nome</th>
                            <th  width="5%">sigla</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($estados as $estado)
                        <tr>
                            <td> {{$estado->id}} </td>
                            <td> {{$estado->nome}}</td>
                            <td align="center"> {{$estado->sigla}} </td>
                            <td align="center">
                                <a href= '<?php echo "estado/".$estado->id."/editar" ?>'  class="btn editar">Editar</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endsection
