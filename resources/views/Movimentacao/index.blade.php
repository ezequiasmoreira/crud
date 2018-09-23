@extends("template.app")
@section("content")
<div class="base-home">
    <h1 class="titulo">
        <strong>Lista de Movimentação</strong>
    </h1>
    <a href= {{url('movimentacao/novo')}} class="btn add">Adicionar movimentacao</a>

    <div class="tabela">
        <table cellpadding="0" cellspacing="0" >
            <thead>
                <tr >
                    <th  width="5%">Cód</th>
                    <th  width="5%">Tipo</th>
                    <th >Produto</th>
                    <th >Quantidade</th>
                    <th >Entidade</th>
                    <th >Data</th>

                    <th colspan="2">acão</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($movimentacoes as $movimentacao){?>
                <tr>
                    <td><?php echo $movimentacao->id ?></td>
                    <td><?php echo $movimentacao->tipo ?></td>
                    <td align="center"><?php echo $movimentacao->descricao_produto ?></td>
                    <td align="center"><?php echo $movimentacao->quantidade ?></td>
                    <td align="center"><?php echo $movimentacao->razao_social ?></td>
                    <td align="center">
                        <?php echo date('d/m/Y', strtotime($movimentacao->data)); ?>
                    </td>
                    <td align="center">
                        <a href= {{url('movimentacao/'.$movimentacao->id.'/editar')}} class="btn editar">Editar</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
@endsection


