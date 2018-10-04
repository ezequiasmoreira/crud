@extends("template.app")
@section("content")
<div class="container">
        <h2>Cadastro de endereço</h2>
        <form action= {{ url("endereco/salvar") }} method="Post">
            {{ csrf_field()}}
            <div class="form-group">
                <label for="rua">Rua:</label>
                <input type="text" class="form-control" id="rua" placeholder="rua" name="rua">
             </div>
            <div class="form-group">
                <label for="numero">Número:</label>
                <input type="text" class="form-control" id="numero" placeholder="número" name="numero">
            </div>
            <div class="form-group">
                <label for="bairro">Bairro:</label>
                <input type="text" class="form-control" id="bairro" placeholder="bairro" name="bairro">
            </div>
            <div class="form-group">
                <label for="complemento">Complemento:</label>
                <input type="text" class="form-control" id="complemento" placeholder="complemento" name="complemento">
            </div>
            <div class="form-group">
                <label for="cep">Cep:</label>
                <input type="text" class="form-control" id="cep" placeholder="cep" name="cep">
            </div>
            <div class="form-group">
                <label for="cidade">Cidade:</label>
                <select name="cidade_id" class="form-control" id="cidade">
                    <?php
                        foreach ($cidades as $cidade){?>
                        <option value="<?php echo $cidade->id ?>"><?php echo $cidade->nome ?></option>
                    <?php }?>
                </select>
            </div>
            <div class="form-group">
                <label for="cliente">Cliente:</label>
                <select name="cliente_id" class="form-control" id="cliente" required="">
                    <?php
                        foreach ($clientes as $cliente){?>
                        <option value="<?php echo $cliente->id ?>"><?php echo $cliente->nome ?></option>
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
