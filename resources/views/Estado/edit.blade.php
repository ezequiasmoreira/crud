@extends("template.app")
@section("content")
<div class="container">
    <h2>Editar estado</h2>
    <form action= {{url('estado/atualizar')}} method="Post">
        {{ csrf_field()}}
        <input type="hidden" name="id" value="<?php echo $estado->id ?>" class="btn btn-default">
        <div class="form-group">
            <label for="nome">nome:</label>
            <input type="text" class="form-control" id="nome" value='<?php echo $estado->nome ?>' name="nome">
        </div>
        <div class="form-group">
            <label for="sigla">sigla:</label>
            <input type="text" class="form-control" id="sigla" value='<?php echo $estado->sigla ?>' name="sigla">
        </div>
        <div class="form-group">
            <label for="pais">Pais:</label>
            <select name="pais_id" class="form-control" id="pais">
                <?php
                    foreach ($paises as $pais){?>
                    <option value="<?php echo $pais->id ?>"
                        <?php echo($pais->id == $estado->pais_id)?"selected":"";?>>
                        <?php echo $pais->nome." - ".$pais->sigla ?>
                    </option>
                <?php }?>
            </select>
        </div>
        <div class="form-group">
            <input type="hidden" class="form-control" id="empresa_id" value='<?php echo $estado->empresa_id ?>' name="empresa_id">
        </div>
        <div class="form-group">
            <input type="hidden" class="form-control" id="usuario_id" value="<?php echo session()->get('usuario_id') ?>" name="usuario_id">
        </div>
        <input type="submit" value="Alterar estado" class="btn">
        <a href= {{url('estado/'.$estado->id.'/excluir')}} class="btn excluir">Excluir</a>
    </form>

</div>
@endsection
