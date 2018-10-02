@extends("template.app")
@section("content")
<div class="container">
        <h2>Cadastro de estado</h2>
        <form action= {{ url("estado/salvar") }} method="Post">
            {{ csrf_field()}}
            <div class="form-group">
                <label for="nome">nome:</label>
                <input type="text" class="form-control" id="nome" placeholder="estado" name="nome">
             </div>
            <div class="form-group">
                <label for="sigla">sigla:</label>
                <input type="text" class="form-control" id="sigla" placeholder="sigla" name="sigla">
            </div>
            <div class="form-group">
                <label for="pais">Pais:</label>
                <select name="pais_id" class="form-control" id="pais">
                    <?php
                        foreach ($paises as $pais){?>
                        <option value="<?php echo $pais->id ?>"><?php echo $pais->nome." - ".$pais->sigla ?></option>
                    <?php }?>
                </select>
            </div>
            <div class="form-group">
                <input type="hidden" class="form-control" id="empresa_id" value= {{ $empresa_id}} name="empresa_id">
            </div>
            <div class="form-group">
                <input type="hidden" class="form-control" id="usuario_id" value="<?php echo session()->get('usuario_id') ?>" name="usuario_id">
            </div>
            <button type="submit" class="btn btn-default">Cadastrar</button>
        </form>
  </div>
  @endsection
