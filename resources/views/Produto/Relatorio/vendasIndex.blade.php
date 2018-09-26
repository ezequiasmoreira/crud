@extends("template.app")
@section("content")
<div class="container" width="100px">
    <h2>Relatório de vendas</h2>
    <form action= {{ url("produto/processar") }} method="Post">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="descricao">descrição:</label>
            <input type="text" class="form-control" id="descricao" placeholder="Descrição do produto" name="descricao">
        </div>
        <div class="form-group">
            <label for="data-inicial" width="5%">data inicial:</label>
            <input type="date" class="form-control" id="data-inicial"  name="data-inicial" width="40%">
            <label for="data-final" width="5%">data final:</label>
            <input type="date" class="form-control" id="data-final"  name="data-final" width="40%">
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
                <label><input type="checkbox" value="1">Saldo</label>
            </div>
            <div class="checkbox">
                <label><input type="checkbox" value="2">Descrição do produto</label>
            </div>
            <div class="checkbox">
                <label><input type="checkbox" value="4">Status do produto</label>
            </div>
            <div class="checkbox">
                <label><input type="checkbox" value="5">Valor do produto</label>
            </div>
            <div class="checkbox">
                <label><input type="checkbox" value="6">Data de Cadastro</label>
            </div>
        </div>

        <button type="submit" class="btn btn-default">gravar </button>
            <a  id="gerar">Gerar</a></button>-->
    </form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script type="text/javascript">
{{-- ajax Form Add Post--}}

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
});
</script>
  @endsection
