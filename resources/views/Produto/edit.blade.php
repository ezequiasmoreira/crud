@extends("template.app")
@section("content")
<div class="container">
    <h2>Editar produto</h2>
    <form action= {{url('produto/atualizar')}} method="Post">
        {{ csrf_field()}}
      <input type="hidden" name="id" value="<?php echo $produto->id ?>" class="btn btn-default">
        <div class="form-group">
        <label for="descricao">descrição:</label>
        <input type="text" class="form-control" id="descricao" value='<?php echo $produto->descricao ?>' name="descricao">
      </div>
      <div class="form-group">
        <label for="saldo">Quantidade:</label>
        <input type="text" class="form-control" id="saldo" value="<?php echo $produto->saldo ?>" name="saldo">
      </div>
      <div class="form-group">
          <label class="radio-inline">
              <input type="radio" name="status" Value="S" <?php echo ($produto->status == 'S')? "checked":"" ?> >Ativo
          </label>
          <label class="radio-inline">
            <input type="radio" name="status" Value="N" <?php echo ($produto->status == 'N')? "checked":"" ?> >Inativo
          </label>
      </div>
       <input type="submit" value="Alterar produto" class="btn">
       <a href= {{url('produto/'.$produto->id.'/excluir')}} class="btn excluir">Excluir</a>
    </form>

</div>
@endsection
