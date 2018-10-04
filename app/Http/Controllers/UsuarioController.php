<?php

namespace App\Http\Controllers;
use App\Usuario;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    private $usuario;

    public function __construct()  {
        $this->usuario = new Usuario();
    }

    public function logout(){
        session()->forget('usuario_id');
        return Redirect("/");
    }
    public function novoView(){
        return view('usuario.create');
    }

    public function index($id){
        $usuarios = $this->usuario->find($id);
        $usuario =  [   'id'    =>  $usuarios->id,
                        'nome'  =>  $usuarios->nome
                    ];
        return view('usuario.index',$usuario);
    }

    public function validarLogin(Request $request){

        $login = $request->login;
	    $senha = md5($request->senha);
        $resultSet = $this->getUsuario($login,$senha);
        if($resultSet){
            foreach($resultSet as $result){
                $id                 = $result->id;
                $nome               =$result->nome;
                $login_digitado     =$result->login;

                if(@$request->nome){
                    if($login_digitado == $login){
                        return false;
                    }
                }
            }

            $usuario =  [   'id'    =>  $id,
                            'nome'  =>  $nome
                        ];

            if ($id) {
                $request->session()->put('usuario_id',$id);
                $this-> buscarEmpresa();
                return view("/usuario.index",$usuario);
            } else {
                return redirect("/");
            }
        }else{
            $erro = ['mensagem' => "Login ou senha inválida"];
            return view("welcome",$erro);

        }
    }
    protected function getUsuario($login,$senha){
        $sql = "SELECT * FROM usuario WHERE usuario.login = ? AND usuario.senha = ?";
        $resultSet = DB::select($sql,[ $login,$senha]);
        return $resultSet;
    }
    public function salvar(Request $request){
        try {
            if( $this->validarLogin($request)){
                $erro = ['mensagem' => "Já existe um usuário com este login"];
                return view("usuario.create",$erro);
            }
            $senha = md5($request->senha);
            $login = $request->login;
            $nome  = $request->nome;
            $data  = date("d/m/Y H:i:s");

            $sql = "INSERT INTO usuario
            VALUES (null,?,?,?,null,null)";
            $resultSet = DB::insert($sql,[$nome,$login,$senha]);

            $resultSet = $this->getUsuario($login,$senha);
            foreach($resultSet as $result){
                $id     = $result->id;
            }
            $sql = "INSERT INTO configuracao
            VALUES (null,null,?,null,null)";
            $resultSet = DB::insert($sql,[$id]);

        }catch(Exception $e){
            return redirect("/admin/novo");
            //echo 'erro: '.$e->getMessage();
        }
        return redirect("/");
    }
}
