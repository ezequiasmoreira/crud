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
        <div class="form-group" style="width:100%; float: left;">
            <label for="endereco_principal"style="float: left; line-height: 2.5em;">Endereço principal:</label>              
            <button type="button" title="Cadastrar endereço  para este cliente"class="form-control" style="width:15%; float: left;" data-toggle="modal" data-target="#myModal">
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
            //endereço
            var rua                 = $('#rua').val();
            var numero              = $('#numero').val();
            var bairro              = $('#bairro').val();
            var cep                 = $('#cep').val();
            var complemento         = $('#complemento').val();
            var estado              = $('#estado').val();
            var cidade              = $('#cidade').val();
            var empresa_id          = $('#empresa_id').val();
            var usuario_id          = $('#usuario_id').val();

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
                url:"{!! URL::to('cliente/salvar') !!}",
                dataType: 'JSON',
                data: {
                    "nome": nome,
                    "cpf":cpf,
                    "data_cadastro":data_cadastro,
                    "endereco_principal":endereco_principal,
                    "empresa_id":empresa_id,
                    "usuario_id":usuario_id,
                    '_token': token,
                    'endereco':{
                                'rua':rua,         
                                'numero':numero,    
                                'bairro':bairro,      
                                'cep':cep ,        
                                'complemento':complemento, 
                                'estado':estado,      
                                'cidade':cidade,      
                                'empresa_id':empresa_id,
                                'usuario_id':usuario_id
                    }
                },
                success:function(data){                                 
                    alert('Cliente Cadastrado com sucesso');
                        $(".removeEstados").each(function() {
                            $(this).remove();
                        });
                        $(".removeCidades").each(function() {
                            $(this).remove();
                        });                       
                                              
                        for(var i = 0; i < data.estados.length; i++){
                            $('#estado').append("<option class='removeEstados' value="+data.estados[i].id+">"+data.estados[i].sigla+" - "+data.estados[i].nome+"</option>");
                        }
                        $(".removeEndereco").each(function() {
                            $(this).remove();
                        });
                        $('#nome').val("");
                        $('#cpf').val("");   

                        $('#rua').val("");      
                        $('#numero').val("");
                        $('#bairro').val("");
                        $('#cep').val("");
                        $('#complemento').val("");                 
                },
                error:function(){                   
                    alert("erro");
                },
            });             
        });
    });    
}
</script>
 

