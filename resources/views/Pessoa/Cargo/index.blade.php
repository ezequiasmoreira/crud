
    @extends("template.app")
    @section("content")
    <div class="base-home">
        <h1 class="titulo">
            <strong>Lista de cargos</strong>
        </h1>
        <a href= {{url("cargo/novo")}} class="btn add">Adicionar cargo</a>
            <div class="tabela">
                <table cellpadding="0" cellspacing="0" >
                    <thead>
                        <tr >
                            <th  width="5%">Cód</th>
                            <th  width="20%">nome</th>
                            <th  width="65%">função</th>
                            <th  width="10%">ação</th>
                        </tr>                        
                    </thead>
                    <tbody>
                        @foreach ($cargos as $cargo)
                        <tr>
                            <td> {{$cargo->id}} </td>
                            <td> {{$cargo->nome}}</td>
                            <td align="center"> {{$cargo->funcao}} </td>
                            <td align="center">
                                <a href= '<?php echo "cargo/".$cargo->id."/editar" ?>'  class="btn editar">Editar</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endsection
