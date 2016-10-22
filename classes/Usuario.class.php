<?php

session_start();

require_once "util\Util.php";

$acao = (isset($_GET['acao'])) ? $_GET['acao'] : "";

$usuario = new Usuario();

switch($acao) {
    case 'login': { $usuario->login(); break; }
    default: { break; }
}

class Usuario {
    private $bd;

    function __construct()
    {
        $this->bd = new BDConnection();
    }

    public function login() {

        if(!isset($_POST['email']))
            respostaJsonErro("E-mail não informado");

        if(!isset($_POST['senha']))
            respostaJsonErro("Senha não informada");

        $email = $_POST['email'];
        $senha = $_POST['senha'];

        try{
            $sql = 'SELECT cod_usuario, nome, perfil FROM tb_usuario WHERE email = :email AND senha = SHA1(:senha)';

            $conn = $this->bd->getConnection();
            $stm = $conn->prepare($sql);
            $stm->bindParam(':email', $email);
            $stm->bindParam(':senha', $senha);
            $stm->execute();

            $result = $stm->fetch(PDO::FETCH_ASSOC);

            if ($result['cod_usuario'] == null)
                prepararJson($result, true, "Usuário ou senha inválidos");
            else {
                $_SESSION['cod_usuario'] = $result['cod_usuario'];
                $_SESSION['nome'] = $result['nome'];
                $_SESSION['perfil'] = $result['perfil'];
                prepararJson($result);
            }

        }catch (PDOException $e){
            respostaJsonExcecao($e);
        }finally {
            $this->bd->close();
        }
    }
}