@extends("template.app")
@section("content")
<div class="container">
  <h2>Cadastro de clientes</h2> 
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">Principal</a></li>
    <li id='endereco' ><a data-toggle="tab" class="endereco" href="#menu1">Comercial</a></li>
    <!--<li><a data-toggle="tab" href="#menu2">Menu 2</a></li>
    <li><a data-toggle="tab" href="#menu3">Menu 3</a></li>-->
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
         <form action= {{url('cliente/salvar')}} method="Post">
        {{ csrf_field()}}
        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" class="form-control" id="nome" placeholder="nome" name="nome" required>
        </div>
        <div class="form-group">
            <label for="cpf">Cpf:</label>
            <input type="text" class="form-control" id="cpf" placeholder="cpf" name="cpf" required="">
        </div>
        <div class="form-group">
            <label for="data_cadastro">Data:</label>
            <input type="date" class="form-control" id="data_cadastro" name="data_cadastro" value="<?php  echo date('Y-m-d');?>" readonly >
        </div> 
        <div class="form-group">
            <label for="endereco_principal">Endereço principal:</label><br>
          <select name="endereco_principal" class="form-control" id="endereco_principal" style="width:50%; float:left;">
              <?php if (@$enderecos){ 
                  foreach (@$enderecos as $endereco){?>
                  <option value="<?php echo @$endereco->id ?>"><?php echo @$endereco->rua.' - '.$endereco->numero.' - '.$endereco->cep ?></option>
              <?php }}?>
          </select>
              
        <button type="button" title="Cadastrar endereço  para este cliente"class="form-control" style="width:15%;" data-toggle="modal" data-target="#myModal">
        Adicionar
        </button>
        </div>
        <div class="form-group">
            <input type="hidden" class="form-control" id="empresa_id" value="<?php echo session()->get('empresa_id') ?>" name="empresa_id">
        </div>
        <div class="form-group">
            <input type="hidden" class="form-control" id="usuario_id" value="<?php echo session()->get('usuario_id') ?>" name="usuario_id">
        </div>

        <button type="button" id='cadastrar' class="btn btn-default">Cadastrar</button>
    </form>
      
    </div>
    <div id="menu1" class="tab-pane fade">
        <h3 >Comercial</h3>
      
    </div>     
  </div>
  <div class="alert alert-success" style="display:none"></div>
</div>
@include('localizacao.endereco.modalCadastro') '
@endsection
<script type="text/javascript">
 window.onload = function(){ 
    
    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

       $("#cadastrar").on('click', function(){
           
            
            var nome            = $('#nome').val();
            var cpf             = $('#cpf').val();
            var data_cadastro   = $('#data_cadastro').val();
            var empresa_id      = $('#empresa_id').val();
            var usuario_id      = $('#usuario_id').val();       
            $.ajax({
                type:"post",
                url:"{!! URL::to('cliente/salvar') !!}",
                dataType: 'JSON',
                data: {
                    "nome": nome,
                    "cpf":cpf,
                    "data_cadastro":data_cadastro,
                    "empresa_id":empresa_id,
                    "usuario_id":usuario_id,
                    '_token': "7DqxQLvYHps8EEJsdOPk49eg0aeShTvFR0eMPJPZ"
                },
                success:function(data){
                    if(!data.id){
                        $('.endereco').prop('href','');
                    }               
                    alert('Sucesso');
                },
                error:function(){
                    if (($('#nome').val() == "")){
                        alert("nome obrigatório");
                    }
                    if (($('#cpf').val() == "")){
                        alert("cpf obrigatório");
                    }
                },
            });
       });
    });
   }
</script>
 

