@extends("template.app")
@section("content")
<div class="container">
        <h2>Cadastro de cargo</h2>
        <form action= {{ url("cargo/salvar") }} method="Post">
            {{ csrf_field()}}
            <div class="form-group">
                <label for="descricao">nome:</label>
                <input type="text" class="form-control" id="nome" placeholder="cargo" name="nome">
            </div>
            <div class="form-group">
                <label for="sigla">Salario inicial:</label>
                <input type="text" class="form-control" id="salario_inicial" placeholder="salario inicial" name="salario_inicial">
            </div>
            <div class="form-group">
                <label for="funcao">Função:</label>
                <input type="text" class="form-control" id="funcao" placeholder="funcão" name="funcao">
            </div>
            <div class="form-group">
                <label for="atividade">Atividades:</label>
                <textarea class="form-control" id="atividade"  name="atividade"></textarea>
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
