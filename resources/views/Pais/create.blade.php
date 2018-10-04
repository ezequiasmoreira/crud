@extends("template.app")
@section("content")
<div class="container">
        <h2>Cadastro de pais</h2>
        <form action= {{ url("pais/salvar") }} method="Post">
            {{ csrf_field()}}
            <div class="form-group">
                <label for="descricao">nome:</label>
                <input type="text" class="form-control" id="nome" placeholder="pais" name="nome">
             </div>
            <div class="form-group">
                <label for="sigla">sigla:</label>
                <input type="text" class="form-control" id="sigla" placeholder="sigla" name="sigla">
             </div>
            <div class="form-group">
                <input type="hidden" class="form-control" id="empresa_id" value="<?php echo session()->get('empresa_id') ?>" name="empresa_id">
            </div>
            <div class="form-group">
                <input type="hidden" class="form-control" id="usuario_id" value="<?php echo session()->get('usuario_id') ?>" name="usuario_id">
            </div>
            <button type="submit" class="btn btn-default">Cadastrar</button>
        </form>
  </div>
  @endsection
