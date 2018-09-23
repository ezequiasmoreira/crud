@extends("template.app")
@section("content")
    <div class="base-home">
        <h1 class="titulo">
            <strong>Lista de entidades</strong>
        </h1>
        <a href= {{url('entidade/novo')}} class="btn add">Adicionar entidade</a>
    <div class="tabela">
        <table cellpadding="0" cellspacing="0">
            <thead>
                <tr>
                    <th align="left" width="5%">Cód</th>
                    <th align="left" width="5%">Tipo</th>
                    <th align="center">Nome</th>
                    <th align="center">Status</th>
                    <th colspan="2">acão</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($entidades as $entidade){?>
                <tr>
                    <td align="center"><?php echo ($entidade->id) ?></td>
                    <td>{{ ($entidade->tipo =='F')?"Fornecedor":"Cliente" }}</td>
                    <?php
                        foreach ($empresas as $empresa){
                            if ($empresa->id ==$entidade->empresa_id){
                                echo("<td>$empresa->razao_social</td>");
                            }
                        }
                    ?>
                    <td align="center"><?php echo ($entidade->ativo=='S')?"Ativo":"Inativo" ?></td>

                    <td align="center">
                        <a href= {{url('entidade/'.$entidade->id.'/editar')}} class="btn editar">Editar</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

</div>
@endsection
