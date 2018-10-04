@extends("template.app")
@section("content")
<div class="container">
    <h2>Cadastro de clientes</h2>
    <form action= {{url('cliente/salvar')}} method="Post">
        {{ csrf_field()}}
        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" class="form-control" id="nome" placeholder="nome" name="nome" required>
        </div>
        <div class="form-group">
            <label for="cpf">Cpf:</label>
            <input type="text" class="form-control" id="cpf" placeholder="cpf" name="cpf" required="">
        </div>
        <div class="form-group">
            <label for="data_cadastro">Data:</label>
            <input type="date" class="form-control" id="data_cadastro" name="data_cadastro" value="<?php  echo date('Y-m-d');?>" readonly >
        </div> 
        <div class="form-group">
          <label for="endereco_principal">Endereço principal:</label>
          <select name="endereco_principal" class="form-control" id="endereco_principal">
              <?php
                  foreach ($enderecos as $endereco){?>
                  <option value="<?php echo $endereco->id ?>"><?php echo $endereco->rua.' - '.$endereco->numero.' - '.$endereco->cep ?></option>
              <?php }?>
          </select>
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
