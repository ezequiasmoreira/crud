@extends("template.app")
@section("content")
<div class="container">
    <?php
        switch ($codigo) {
            case 0: echo "<b style='float: left'> Erro: ".$descricao."</b>";  break;

            break;
        }
    ?>
</div>
@endsection
