@extends("template.app")
@section("content")
<div class="container">
    <div class="base-home" width="100%">
        <div class="tabela">
            <table cellpadding="0" cellspacing="0" >
                <tbody>
                    <tr >
                        <td><h6>Seja bem vindo: {{ $nome }}</h6></td>
                        <td><a href= {{ url('/configuracao')}} class="btn btn-default btn-sm"  >Configurações</a></td>
                        <td><a href= {{ url('/admin/sair')}} class="btn btn-default btn-sm"  >
                                <span class="glyphicon glyphicon-log-out"></span> Sair
                        </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
