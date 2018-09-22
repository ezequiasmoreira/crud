@extends("template.app")
@section("content")
<div class="container">
    <h2>Editar movimentação</h2>
    <form action= {{url('movimentacao/atualizar')}} method="Post">
        {{ csrf_field()}}
      <div class="form-group">
          <label for="tipo">Tipo:</label>
          <select name="tipo" class="form-control" id="tipo">
              <option value="E" <?php echo($movimentacao->tipo=='E')?"selected":""; ?>>Entrada</option>
              <option value="S" <?php echo($movimentacao->tipo=='S')?"selected":""; ?>>Saida</option>
          </select>
      </div>
      <div class="form-group">
          <label for="produto">Produto:</label>
          <select name="id_produto" class="form-control" id="produto">
              <?php
                  foreach ($produtos as $produto){?>
                  <option value="<?php echo $produto->id ?>"
                  <?php echo($movimentacao->id_produto==$produto->id)?"selected":"";?>><?php echo $produto->descricao ?></option>
              <?php }?>
          </select>
      </div>
      <div class="form-group">
        <label for="quantidade">Quantidade:</label>
        <input type="text" class="form-control" id="quantidade" value="<?php echo $movimentacao->quantidade; ?>" name="quantidade">
      </div>
      <div class="form-group">
          <label for="entidade">Entidade:</label>
          <select name="id_entidade" class="form-control" id="entidade">
              <?php
                  foreach ($entidades as $entidade){?>
                  <option value="<?php echo $entidade->id ?>"
                  <?php echo($movimentacao->id_entidade==$entidade->id)?"selected":"";?>><?php echo $entidade->nome ?></option>
              <?php }?>
          </select>
      </div>
      <div class="form-group">
        <label for="data">Data:</label>
        <input type="date" class="form-control date-time-mask" id="data" name="data"
               value="<?php echo date('Y-m-d');?>" readonly>
      </div>
      <div class="form-group">
        <label for="observacao">Observação:</label>
        <textarea class="form-control" id="observacao" name="observacao"><?php echo $movimentacao->observacao ; ?></textarea>
      </div>
      <input type="hidden" name="id" value="<?php echo $movimentacao->id ?>" class="btn btn-default">
      <input type="submit" value="Alterar movimentação" class="btn" id="btnAlterar">
      <a href= {{url('movimentacao/'.$movimentacao->id.'/excluir')}} class="btn editar">Excluir</a>
    </form>
</div>
@endsection
