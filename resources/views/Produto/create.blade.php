@extends("template.app")
@section("content")
<div class="container">
        <h2>Cadastro de produtos</h2>
        <form action= {{ url("produto/salvar") }} method="Post">
            {{ csrf_field()}}
          <div class="form-group">
            <label for="descricao">descrição:</label>
            <input type="text" class="form-control" id="descricao" placeholder="Descrição do produto" name="descricao">
          </div>
          <div class="form-group">
            <label for="saldo">Quantidade:</label>
            <input type="text" class="form-control" id="saldo" placeholder="saldo" name="saldo">
          </div>
          <div class="form-group">
              <label class="radio-inline">
                  <input type="radio" name="status" Value='S' "checked">Ativo

              </label>

              <label class="radio-inline">
                  <input type="radio" name="status" Value='N'>Inativo
              </label>
          </div>
          <button type="submit" class="btn btn-default">Cadastrar</button>
        </form>
  </div>
  @endsection
