@extends("template.app")
@section("content")
<div class="container" width="100px">
    <h2>Relatório de vendas</h2>
    <form action= {{ url("/relatorio/processar") }} method="Post">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="descricao">descrição:</label>
            <input type="text" class="form-control" id="descricao" placeholder="Descrição do produto" name="descricao">
        </div>
        <div class="form-group">
            <label for="data-inicial" width="5%">data inicial:</label>
            <input type="date" class="form-control" id="data-inicial"  name="dataInicial" width="40%">
            <label for="data-final" width="5%">data final:</label>
            <input type="date" class="form-control" id="data-final"  name="dataFinal" width="40%">
        </div>
        <div class="form-group">
            <label class="radio-inline">
                <input type="radio" name="status" Value="S" checked >Ativo
            </label>
            <label class="radio-inline">
              <input type="radio" name="status" Value="N" >Inativo
            </label>
        </div>
        <div class="form-group">
            <label>Mostar campos</label>
            <div class="checkbox">
                <label><input type="checkbox" value="1" name="mostrarCampos">Saldo</label>
            </div>
            <div class="checkbox">
                <label><input type="checkbox" value="2" name="mostrarCampos">Descrição do produto</label>
            </div>
            <div class="checkbox">
                <label><input type="checkbox" value="4" name="mostrarCampos">Status do produto</label>
            </div>
            <div class="checkbox">
                <label><input type="checkbox" value="5" name="mostrarCampos">Valor do produto</label>
            </div>
            <div class="checkbox">
                <label><input type="checkbox" value="6" name="mostrarCampos">Data de Cadastro</label>
            </div>
        </div>
        <button type="submit" class="btn btn-default">gravar </button>
    </form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script type="text/javascript">
{{-- ajax Form Add Post--}}
/*
  $("#gerar").click(function() {
    $.ajax({
      type: 'POST',
      url: 'processar',
      data: {
        '_token': $('input[name=_token]').val(),
        'descricao': $('input[name=descricao]').val()
      },
      success: function(data){
        if ((data.errors)) {
          $('.error').removeClass('hidden');
          $('.error').text(data.errors.descricao);
        } else {
          $('.error').remove();
        }
      },
    });
});*/
</script>
  @endsection
