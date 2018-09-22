@extends("template.app")
@section("content")
<div class="container">
    <h2>Cadastro de entidades</h2>
    <form action= {{url('entidade/salvar')}} method="Post">
        {{ csrf_field()}}
      <div class="form-group">
          <select name="tipo" class="form-control">
              <option value="C" selected>Cliente</option>
              <option value="F" >Fornecedor</option>
          </select>
      </div>
      <div class="form-group">
        <label for="nome">Nome:</label>
        <input type="text" class="form-control" id="nome" placeholder="nome" name="nome">
      </div>
      <div class="form-group">
          <label class="radio-inline">
              <input type="radio" name="ativo" Value="S">Ativo
          </label>
          <label class="radio-inline">
              <input type="radio" name="ativo" Value="N">Inativo
          </label>
      </div>
      <button type="submit" class="btn btn-default">Cadastrar</button>
    </form>
</div>
@endsection
