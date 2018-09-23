@extends("template.app")
@section("content")
<div class="container">
    <h2>Cadastro de empresas</h2>
    <form action= {{url('empresa/salvar')}} method="Post">
        {{ csrf_field()}}
      <div class="form-group">
        <label for="razao_social">Razão social:</label>
        <input type="text" class="form-control" id="razao_social" placeholder="Razão social" name="razao_social">
      </div>
      <div class="form-group">
        <label for="cnpj">Cnpj:</label>
        <input type="text" class="form-control" id="cnpj" placeholder="Cnpj" name="cnpj">
      </div>
      <div class="form-group">
        <label for="capital_social">Capital social:</label>
        <input type="text" class="form-control" id="capital_social" placeholder="Capital social" name="capital_social">
      </div>
      <button type="submit" class="btn btn-default">Cadastrar</button>
    </form>
</div>
@endsection
