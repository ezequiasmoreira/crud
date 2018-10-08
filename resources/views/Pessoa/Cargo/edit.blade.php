@extends("template.app")
@section("content")
<div class="container">
    <h2>Editar cargo</h2>
    <form action= {{url('cargo/atualizar')}} method="Post">
        {{ csrf_field()}}
            <input type="hidden" name="id" value="<?php echo $cargo->id ?>" class="btn btn-default">
        <div class="form-group">
            <label for="nome">nome:</label>
            <input type="text" class="form-control" id="nome" value='<?php echo $cargo->nome ?>' name="nome">
        </div>
        <div class="form-group">
            <label for="sigla">Salario inicial:</label>
            <input type="text" class="form-control" id="salario_inicial" value="<?php echo $cargo->salario_inicial ?>" name="salario_inicial">
        </div>
        <div class="form-group">
            <label for="funcao">Função:</label>
            <input type="text" class="form-control" id="funcao" value='<?php echo $cargo->funcao ?>' name="funcao">
        </div>
        <div class="form-group">
            <label for="atividade">Atividades:</label>
            <textarea class="form-control" id="atividade"  name="atividade"><?php echo $cargo->atividade ?>'</textarea>
        </div>
        <div class="form-group">
            <input type="hidden" class="form-control" id="empresa_id" value="<?php echo session()->get('empresa_id') ?>" name="empresa_id">
        </div>
        <div class="form-group">
            <input type="hidden" class="form-control" id="usuario_id" value="1" name="usuario_id">
        </div>
        <input type="submit" value="Alterar cargo" class="btn">
        <a href= {{url('cargo/'.$cargo->id.'/excluir')}} class="btn excluir">Excluir</a>
    </form>

</div>
@endsection
