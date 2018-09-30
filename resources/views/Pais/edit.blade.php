@extends("template.app")
@section("content")
<div class="container">
    <h2>Editar pais</h2>
    <form action= {{url('pais/atualizar')}} method="Post">
        {{ csrf_field()}}
            <input type="hidden" name="id" value="<?php echo $pais->id ?>" class="btn btn-default">
        <div class="form-group">
            <label for="nome">nome:</label>
            <input type="text" class="form-control" id="nome" value='<?php echo $pais->nome ?>' name="nome">
        </div>
        <div class="form-group">
            <label for="sigla">sigla:</label>
            <input type="text" class="form-control" id="sigla" value='<?php echo $pais->sigla ?>' name="sigla">
        </div>
        <div class="form-group">
            <input type="hidden" class="form-control" id="usuario_id" value="1" name="usuario_id">
        </div>
        <input type="submit" value="Alterar pais" class="btn">
        <a href= {{url('pais/'.$pais->id.'/excluir')}} class="btn excluir">Excluir</a>
    </form>

</div>
@endsection
