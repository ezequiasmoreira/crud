@extends("template.app")
@section("content")
<div class="container">
    <h2>Editar cidade</h2>
    <form action= {{url('cidade/atualizar')}} method="Post">
        {{ csrf_field()}}
        <input type="hidden" name="id" value="<?php echo $cidade->id ?>" class="btn btn-default">
        <div class="form-group">
            <label for="nome">nome:</label>
            <input type="text" class="form-control" id="nome" value='<?php echo $cidade->nome ?>' name="nome">
        </div>
        <div class="form-group">
            <label for="estado">Estado:</label>
            <select name="estado_id" class="form-control" id="estado">
                <?php
                    foreach ($estados as $estado){?>
                    <option value="<?php echo $estado->id ?>"
                        <?php echo($estado->id == $cidade->estado_id)?"selected":"";?>>
                        <?php echo $estado->nome." - ".$estado->sigla ?>
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
        <input type="submit" value="Alterar estado" class="btn">
        <a href= {{url('cidade/'.$cidade->id.'/excluir')}} class="btn excluir">Excluir</a>
    </form>

</div>
@endsection
