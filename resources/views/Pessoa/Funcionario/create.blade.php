@extends("template.app")
@section("content")
<div class="container">
        <h2>Cadastro de funcionario</h2>
        <form action= {{ url("funcionario/salvar") }} method="Post">
            {{ csrf_field()}}
            <div class="form-group">
                <label for="descricao">nome:</label>
                <input type="text" class="form-control" id="nome" placeholder="cargo" name="nome">
            </div>
            <div class="form-group">
                <label for="cpf">cpf:</label>
                <input type="text" class="form-control" id="cpf" placeholder="Cpf" name="cpf">
            </div>
            <div class="form-group">
                <label for="rg">Rg:</label>
                <input type="text" class="form-control" id="rg" placeholder="Número de identidade" name="rg">
            </div>
            <div class="form-group">
                <label for="salario">salario:</label>
                <input type="text" class="form-control" id="salario" placeholder="Salário" name="salario">
            </div>
            <div class="form-group">
                <label for="data_nasc">Nascimento:</label>
                <input type="date" class="form-control" id="data_nasc" placeholder="Data de nascimento" name="data_nasc">
            </div>
            <div class="form-group">
                <label for="cargo_id">Cargo:</label><br>
                <select name="cargo_id" class="form-control" id="cargo_id" >
                    <?php if (@$cargos){ 
                        foreach (@$cargos as $cargo){?>
                        <option  value="<?php echo @$cargo->id ?>"><?php echo @$cargo->nome ?></option>
                    <?php }}?>
                </select>
            </div>
            <div class="form-group">
                <label for="endereco_principal">Endereço principal:</label><br>
              <select name="endereco_principal" class="form-control" id="endereco_principal" style="width:50%; float:left;">
                  <?php if (@$enderecos){ 
                      foreach (@$enderecos as $endereco){?>
                      <option  value="<?php echo @$endereco->id ?>"><?php echo @$endereco->rua.' - '.$endereco->numero.' - '.$endereco->cep ?></option>
                  <?php }}?>
              </select>
                  
            <button type="button" title="Cadastrar endereço  para este cliente"class="form-control" style="width:15%;" data-toggle="modal" data-target="#myModal">
            Adicionar
            </button>
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
  @include('localizacao.endereco.modalCadastro') 
  @endsection
