<div class="container">
<div class="modal" id="myModal" >
<div class="modal-dialog modal-lg">
<div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title">Cadastro de Endereço</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
    </div>
    <div class="modal-body">           
            <!-- Abas nav -->
            <ul class="nav nav-tabs active" id="myTab" role="tablist">              
              <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#perfil" role="tab" aria-controls="profile" aria-selected="false">Local</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="messages-tab" data-toggle="tab" href="#messages" role="tab" aria-controls="messages" aria-selected="false">Regional</a>
              </li> 
            </ul>
            <!-- Painel de abas -->
            <div class="tab-content">                
                <div class="tab-pane active" id="perfil" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="base-home">
                    <div class="tabela">
                    <table cellpadding="0" cellspacing="0" style="margin-top: 1%">                    
                        <tr>
                            {{ csrf_field()}}
                            <th width="70%" style="text-align:left">Rua</th>                        
                            <th style="text-align:left">Numero</th>
                        </tr>                        
                        <tr>
                            <td><div class="form-group"><input type="text" class="form-control" id="rua" placeholder="rua" name="rua"></div></td>
                            <th><div class="form-group"><input type="text" class="form-control" id="numero" placeholder="número" name="numero"></div></th>
                        </tr>
                        <tr>
                            <th width="70%" style="text-align:left">Bairro</th>                        
                            <th style="text-align:left">Complemento:</th>
                        </tr>
                        <tr>
                            <th><div class="form-group"><input type="text" class="form-control" id="bairro" placeholder="bairro" name="bairro"></div></th>
                            <th><div class="form-group"><input type="text" class="form-control" id="complemento" placeholder="complemento" name="complemento"></div></th>
                        <tr>
                    </table>
                    </div>     
                </div> 
                </div>
                <div class="tab-pane" id="messages" role="tabpanel" aria-labelledby="messages-tab">
                    <div class="tabela">
                    <table cellpadding="0" cellspacing="0" style="margin-top: 1%">
                         <tr>
                            <th width="15%" style="text-align:left">Cep:</th>                        
                            <th width="35%"style="text-align:left">Estado:</th>
                            <th style="text-align:left">Cidade:</th>
                        </tr>
                        <tr>
                            <th><div class="form-group"><input type="text" class="form-control" id="cep" placeholder="cep" name="cep"></div></th>
                            <th><div class="form-group">
                                    <select name="estado_id" class="form-control" id="estado">
                                    <?php if(@$estados){
                                        foreach ($estados as $estado){?>
                                        <option value="<?php echo $estado->id ?>"><?php echo $estado->sigla." - ".$estado->nome ?></option>
                                    <?php }}?>
                                    </select>
                            </div></th>
                            <th><div class="form-group">
                                    <select name="cidade_id" class="form-control" id="cidade">                                        
                                    </select>
                            </div></th>
                        </tr>                        
                    </table>
                    </div>                    
                </div>             
                </div>   
            </div>       
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
            <button type="button" class="btn btn-default">Cadastrar</button>
        </div>
    </div>        
    </div>
    </div>
 </div>

<script type="text/javascript">
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
                    $(".remove").each(function() {
                        $(this).remove();
                    });
                    for (var i = 0; i < data.length; i++) { 
                        var id      = data[i].id;
                        var nome    = data[i].nome;                                          
                        $('#cidade').append("<option class='remove' value="+id+">"+nome+"</option>");                   
                    }
                },
                error:function(){                    
                        alert("Ocorreu algum problema entre em contato como suporte");                    
                },
            });
       });
    });
   }
</script>
