@extends("template.app")
@section("content")
<div class="container">
    <h2>Cadastro de movimentação</h2>
    <form action= {{url('movimentacao/salvar')}} method="Post">
        {{ csrf_field()}}
      <div class="form-group">
          <label for="tipo">Tipo:</label>
          <select name="tipo" class="form-control" id="tipo">
              <option value="E" selected>Entrada</option>
              <option value="S" >Saida</option>
          </select>
      </div>
      <div class="form-group">
          <label for="produto">Produto:</label>
          <select name="id_produto" class="form-control" id="produto">
              <?php
                  foreach ($produtos as $produto){?>
                  <option value="<?php echo $produto->id ?>"><?php echo $produto->descricao ?></option>
              <?php }?>
          </select>
      </div>
      <div class="form-group">
        <label for="quantidade">Quantidade:</label>
        <input type="text" class="form-control" id="quantidade" placeholder="quantidade" name="quantidade" required>
      </div>
      <div class="form-group">
          <label for="entidade">Entidade:</label>
          <select name="id_entidade" class="form-control" id="entidade">
              <?php
                  foreach ($entidades as $entidade){?>
                  <option value="<?php echo $entidade->id ?>"><?php echo $entidade->nome ?></option>
              <?php }?>
          </select>
      </div>
      <div class="form-group">
        <label for="data">Data:</label>
        <input type="date" class="form-control" id="data" name="data" value="<?php  echo date('Y-m-d');?>" readonly >
      </div>
      <div class="form-group">
        <label for="observacao">Observação:</label>
        <textarea class="form-control" id="observacao" name="observacao">Observações</textarea>
      </div>
      <button type="submit" class="btn btn-default">Cadastrar</button>
    </form>
</div>
@endsection
