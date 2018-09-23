@extends("template.app")
@section("content")
<div class="container">
    <h2>Editar entidade</h2>
    <form action= {{url('entidade/atualizar')}} method="Post">
        {{ csrf_field()}}
        <input type="hidden" name="id" value="<?php echo $entidade->id ?>" class="btn btn-default">
      <div class="form-group">
          <label for="tipo">Tipo:</label>
          <select name="tipo" class="form-control">
              <option value="C" <?php echo($entidade->tipo=='C')?"selected":""; ?>>Cliente</option>
              <option value="F"  <?php echo($entidade->tipo=='F')?"selected":""; ?>>Fornecedor</option>
          </select>
      </div>
        <div class="form-group">
            <label for="empresa">Empresa:</label>
            <select name="empresa_id" class="form-control" id="empresa_id">
                <?php
                    foreach ($empresas as $empresa){?>
                    <option value="<?php echo $empresa->id ?>"
                    <?php echo($entidade->empresa_id == $empresa->id)?"selected":"";?>><?php echo $empresa->razao_social ?>
                    </option>
                <?php }?>
            </select>
        </div>
      <div class="form-group">
          <label class="radio-inline">
              <input type="radio" name="ativo" Value="S" <?php echo ($entidade->ativo == 'S')? 'checked':""; ?>>Ativo
          </label>
          <label class="radio-inline">
              <input type="radio" name="ativo" Value="N" <?php echo ($entidade->ativo == 'N')? 'checked':""; ?>>Inativo
          </label>
      </div>
      <input type="submit" value="Alterar identidade" class="btn">
      <a href= {{url('entidade/'.$entidade->id.'/excluir')}} class="btn excluir">Excluir</a>
    </form>
</div>
@endsection
