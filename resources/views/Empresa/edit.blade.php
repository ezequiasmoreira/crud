@extends("template.app")
@section("content")
<div class="container">
    <h2>Editar empresa</h2>
    <form action= {{url('empresa/atualizar')}} method="Post">
        {{ csrf_field()}}
        <input type="hidden" name="id" value="<?php echo $empresa->id ?>" class="btn btn-default">
        <div class="form-group">
            <label for="razao_social">Razão social:</label>
            <input type="text" class="form-control" id="razao_social" value="<?php echo $empresa->razao_social ?>" name="razao_social">
        </div>
        <div class="form-group">
            <label for="cnpj">Cnpj:</label>
            <input type="text" class="form-control" id="cnpj" value="<?php echo $empresa->cnpj ?>" name="cnpj">
        </div>
        <div class="form-group">
            <label for="capital_social">Capital social:</label>
            <input type="text" class="form-control" id="capital_social" value="<?php echo $empresa->capital_social ?>" name="capital_social">
        </div>
        <input type="submit" value="Alterar identidade" class="btn">
        <a href= {{url('empresa/'.$empresa->id.'/excluir')}} class="btn excluir">Excluir</a>
    </form>
</div>
@endsection
