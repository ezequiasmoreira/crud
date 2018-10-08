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
                  <option  value="<?php echo @$endereco->id ?>"><?php echo @$endereco->rua.' - '.$endereco->numero.' - '.$endereco->cep ?></option>
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

        <button type="button" id='cadastrarCliente' class="btn btn-default">Cadastrar</button>
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

<script  type="text/javascript" >
window.onload = function(){ 
    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
       $("#estado").on('change', function(){
            
            var estado  = $('#estado').val();
            var token   = $("input[type=hidden][name=_token]").val();
            
            $.ajax({
                type:"post",
                url:"{!! URL::to('cliente/retorna-cidade') !!}",
                dataType: 'JSON',
                data: {
                    "estado_id": estado, 
                    '_token': token
                },
                success:function(data){  
                    $(".removeCidades").each(function() {
                        $(this).remove();
                    });
                    for (var i = 0; i < data.length; i++) { 
                        var id      = data[i].id;
                        var nome    = data[i].nome;                                          
                        $('#cidade').append("<option class='removeCidades' value="+id+">"+nome+"</option>");                   
                    }
                },
                error:function(){                    
                        alert("Ocorreu algum problema entre em contato como suporte");                    
                },
            });
       });
    });   
    
    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $("#cadastrarCliente").on('click', function(){            
            var nome                = $('#nome').val();
            var cpf                 = $('#cpf').val();
            var data_cadastro       = $('#data_cadastro').val();
            var endereco_principal  = $('#endereco_principal').val(); 
            var empresa_id          = $('#empresa_id').val();
            var usuario_id          = $('#usuario_id').val(); 
            var token               = $("input[type=hidden][name=_token]").val();
            if (($('#nome').val() == "")){
                alert("nome obrigatório");
                $('#nome').focus();
                return false;
            }
            if (($('#cpf').val() == "")){
                alert("cpf obrigatório");
                $('#cpf').focus();
                return false;
            }
            $.ajax({
                type:"post",
                url:"{!! URL::to('cliente/salvar') !!}",
                dataType: 'JSON',
                data: {
                    "nome": nome,
                    "cpf":cpf,
                    "data_cadastro":data_cadastro,
                    "endereco_principal":endereco_principal,
                    "empresa_id":empresa_id,
                    "usuario_id":usuario_id,
                    '_token': token
                },
                success:function(data){                                 
                    alert('Cliente Cadastrado com sucesso');
                    $(".removeEndereco").each(function() {
                        $(this).remove();
                    });
                    $('#nome').val("");
                    $('#cpf').val("");                    
                },
                error:function(){
                   
                    alert("erro");
                },
            });             
        });
    });
     
    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $("#cadastrarEndereco").on('click', function(){
            var rua         = $('#rua').val();
            var numero      = $('#numero').val();
            var bairro      = $('#bairro').val();
            var cep         = $('#cep').val();
            var complemento = $('#complemento').val();
            var estado      = $('#estado').val();
            var cidade      = $('#cidade').val();
            var empresa_id  = $('#empresa_id').val();
            var usuario_id  = $('#usuario_id').val();
            var token   = $("input[type=hidden][name=_token]").val();
            if (($('#rua').val() == "")){
                alert("rua obrigatório");
                $('#rua').focus();
                return false;
            }
            if (($('#numero').val() == "")){
                alert("numero obrigatório");
                $('#numero').focus();
                return false;
            }
            if (($('#bairro').val() == "")){
                alert("bairro obrigatório");
                $('#bairro').focus();
                return false;
            }
            if (($('#cep').val() == "")){
                alert("cep obrigatório");
                $('#cep').focus();
                return false;
            }
            if (($('#estado').val() == "0")){
                alert("estado obrigatório");
                $('#estado').focus();
                return false;
            }
            $.ajax({
                type:"post",
                url:"{!! URL::to('endereco/salvar-json') !!}",
                dataType: 'JSON',
                data: {
                        'rua':rua,         
                        'numero':numero,    
                        'bairro':bairro,      
                        'cep':cep ,        
                        'complemento':complemento, 
                        'estado':estado,      
                        'cidade':cidade,      
                        'empresa_id':empresa_id,
                        'usuario_id':usuario_id,
                        '_token': token
                },
                success:function(data){                    
                    if(data){ 
                        $(".removeEstados").each(function() {
                            $(this).remove();
                        });
                        $(".removeCidades").each(function() {
                            $(this).remove();
                        });                        
                        for(var i = 0; i<data[1].length; i++){
                            $('#estado').append("<option class='removeEstados' value="+data[1][i].id+">"+data[1][i].sigla+" - "+data[1][i].nome+"</option>");
                        }
                        $('#endereco_principal').append("<option class='removeEndereco' value="+data[0].id+">"+data[0].rua+","+data[0].numero+"</option>");
                        alert("Endereço cadastrado com sucesso");
                        $('#rua').val("");      
                        $('#numero').val("");
                        $('#bairro').val("");
                        $('#cep').val("");
                        $('#complemento').val("");
                    } 
                },
                error:function(){
                    alert("Ops, ocorreu algum problema , entre em contato com o suporte");
                },
            }); 
        });
    });
}
</script>
 

