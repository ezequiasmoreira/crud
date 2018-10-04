@extends("template.app")
@section("content")
<div class="container">
        <h2>Cadastro de cidade</h2>
        <form action= {{ url("cidade/salvar") }} method="Post">
            {{ csrf_field()}}
            <div class="form-group">
                <label for="descricao">nome:</label>
                <input type="text" class="form-control" id="nome" placeholder="cidade" name="nome">
            </div>
            <div class="form-group">
                <label for="estado">Estado:</label>
                <select name="estado_id" class="form-control" id="estado">
                    <?php
                        foreach ($estados as $estado){?>
                        <option value="<?php echo $estado->id ?>"><?php echo $estado->nome." - ".$estado->sigla ?></option>
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
