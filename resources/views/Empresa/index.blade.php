@extends("template.app")
@section("content")
<div class="base-home">
    <h1 class="titulo">
        <strong>Lista de empresas</strong>
    </h1>
    <a href= {{url('empresa/novo')}} class="btn add">Adicionar empresa</a>

    <div class="tabela">
        <table cellpadding="0" cellspacing="0" >
            <thead>
                <tr >
                    <th  width="5%">Cód</th>
                    <th >Razão social</th>
                    <th >Cnpj</th>
                    <th >Capital social</th>
                    <th colspan="2">acão</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($empresas as $empresa){?>
                <tr>
                    <td><?php echo $empresa->id ?></td>
                    <td><?php echo $empresa->razao_social ?></td>
                    <td align="center"><?php echo $empresa->cnpj ?></td>
                    <td align="center"><?php echo $empresa->capital_social ?></td>
                    <td align="center">
                        <a href= {{url('empresa/'.$empresa->id.'/editar')}} class="btn editar">Editar</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
@endsection


