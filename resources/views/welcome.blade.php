
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<style type="text/css">
    .form-login{width: 20%; float: left; margin-left: 40%;}
    .login{width: 100%; margin-top: 10%;}
    .cadastrar{text-decoration: none; }
</style>
<div class="login">
    <form class="form-login" action= {{url('admin/login')}} method="Post">
        <?php echo (@$mensagem)?"<h6 align='center'>".$mensagem."</h6>":""; ?>
        {{ csrf_field()}}
        <div class="form-group">
        <label for="email">Email </label>
        <input type="email" class="form-control" name="login" id="email" aria-describedby="emailHelp" placeholder="Digite o email">
        </div>
        <div class="form-group">
        <label for="exampleInputPassword1">Senha</label>
        <input type="password" class="form-control" id="senha" name="senha" placeholder="senha">
        </div>
        <button type="submit" class="btn btn-outline-primary btn-sm" >logar</button>
        <a class="btn btn-outline-primary btn-sm" href= {{ url('admin/novo')}}>Cadastrar</a>
    </form>
</div>




