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
