
    @extends("template.app")
    @section("content")
    <div class="base-home">
        <h1 class="titulo">
            <strong>Lista de paises</strong>
        </h1>
        <a href= {{url("pais/novo")}} class="btn add">Adicionar pais</a>
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
                        @foreach ($paises as $pais)
                        <tr>
                            <td> {{$pais->id}} </td>
                            <td> {{$pais->nome}}</td>
                            <td align="center"> {{$pais->sigla}} </td>
                            <td align="center">
                                <a href= '<?php echo "pais/".$pais->id."/editar" ?>'  class="btn editar">Editar</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endsection
