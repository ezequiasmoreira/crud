@extends("template.app")
@section("content")
<div class="container">
    <h2>Editar estado</h2>
    <form action= {{url('endereco/atualizar')}} method="Post">
        {{ csrf_field()}}
        <input type="hidden" name="id" value="<?php echo $endereco->id ?>" class="btn btn-default">
        <div class="form-group">
            <label for="rua">Rua:</label>
            <input type="text" class="form-control" id="rua" value='<?php echo $endereco->rua ?>' name="rua">
        </div>
        <div class="form-group">
            <label for="numero">Número:</label>
            <input type="text" class="form-control" id="numero" value='<?php echo $endereco->numero ?>' name="numero">
        </div>
        <div class="form-group">
            <label for="bairro">Bairro:</label>
            <input type="text" class="form-control" id="bairro" value='<?php echo $endereco->bairro ?>' name="bairro">
        </div>
        <div class="form-group">
            <label for="complemento">Complemento:</label>
            <input type="text" class="form-control" id="complemento" value='<?php echo $endereco->complemento ?>' name="complemento">
        </div>
        <div class="form-group">
            <label for="cep">Cep:</label>
            <input type="text" class="form-control" id="cep" value='<?php echo $endereco->cep ?>' name="cep">
        </div>
        
        <div class="form-group">
            <label for="cidade">Cidade:</label>
            <select name="cidade_id" class="form-control" id="cidade">
                <?php
                    foreach ($cidades as $cidade){?>
                    <option value="<?php echo $cidade->id ?>"
                        <?php echo($cidade->id == $endereco->cidade_id)?"selected":"";?>>
                        <?php echo $cidade->nome?>
                    </option>
                <?php }?>
            </select>
        </div>
        <div class="form-group">
            <label for="cliente">Cliente:</label>
            <select name="cliente_id" class="form-control" id="cliente">
                <?php
                    foreach ($clientes as $cliente){?>
                    <option value="<?php echo $cliente->id ?>"
                        <?php echo($cliente->id == $endereco->cliente_id)?"selected":"";?>>
                        <?php echo $cliente->nome?>
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
        <input type="submit" value="Alterar endereço" class="btn">
        <a href= {{url('endereco/'.$endereco->id.'/excluir')}} class="btn excluir">Excluir</a>
    </form>

</div>
@endsection
