@extends("template.app")
@section("content")
<div class="container">
    <h2>Editar cliente</h2>
    <form action= {{url('cliente/atualizar')}} method="Post">
        {{ csrf_field()}}
        <input type="hidden" name="id" value="<?php echo $cliente->id ?>" class="btn btn-default">
        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" class="form-control" id="nome" value='<?php echo $cliente->nome ?>' name="nome" required>
        </div>
        <div class="form-group">
            <label for="cpf">Cpf:</label>
            <input type="text" class="form-control" id="cpf" value='<?php echo $cliente->cpf ?>' name="cpf" required="">
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
                    <option value="<?php echo $endereco->id ?>"
                        <?php echo($endereco->id == $cliente->endereco_principal)?"selected":"";?>>
                        <?php echo $endereco->rua." - ".$endereco->numero.' - '.$endereco->cpf ?>
                    </option>
                <?php }?>
            </select>
        </div>
        <div class="form-group">
            <input type="hidden" class="form-control" id="empresa_id" value="<?php echo session()->get('empresa_id') ?>" name="empresa_id">
        </div>
        <div class="form-group">
            <input type="hidden" class="form-control" id="usuario_id" value="<?php echo session()->get('usuario_id') ?>" name="usuario_id">
        </div>
      <input type="submit" value="Alterar cliente" class="btn">
      <a href= {{url('cliente/'.$cliente->id.'/excluir')}} class="btn excluir">Excluir</a>
    </form>
</div>
@endsection
