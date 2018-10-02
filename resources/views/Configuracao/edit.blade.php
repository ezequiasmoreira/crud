@extends("template.app")
@section("content")
<div class="container">
    <h2>Editar configuracao</h2>
    <form action= {{url('configuracao/atualizar')}} method="Post">
        {{ csrf_field()}}
        <input type="hidden" class="teste" name="id" value="<?php echo $configuracao->id ?>" class="btn btn-default">
        <div class="form-group">
            <label for="empresa">Empresa padrão:</label>
            <select name="empresa_padrao" class="form-control" id="empresa">
                <?php
                    foreach ($empresas as $empresa){?>
                    <option value="<?php echo $empresa->id ?>"
                        <?php echo($empresa->id == $configuracao->empresa_padrao)?"selected":"";?>>
                        <?php echo $empresa->razao_social ?>
                    </option>
                <?php }?>
            </select>
            <input type="hidden" name="usuario_id" value="<?php echo session()->get('usuario_id'); ?>" class="btn btn-default">
        </div>
       <input type="submit" value="Alterar configuracão" class="btn">
    </form>

</div>
@endsection
