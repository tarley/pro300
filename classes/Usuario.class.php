<?php

session_start();

require_once "util/Util.php";

$acao = (isset($_GET['acao'])) ? $_GET['acao'] : "";

$usuario = new Usuario();

switch($acao) {
    case 'login': { $usuario->login(); break; }
    case 'cadastro': { $usuario->cadastro(); break; }
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

    public function cadastro() {
        $ra = $_POST['ra'];
        $nome = $_POST['nome'];
        $telefone = $_POST['telefone'];
        $emailCadastro = $_POST['emailCadastro'];
        $senhaCadastro = $_POST['senhaCadastro'];
        $perfil = "A";


        try{
            $conn = $this->bd->getConnection();

            $sqlConsulta = 'SELECT *
                              FROM tb_usuario
                             WHERE email = :email';

            $stmConsulta = $conn->prepare($sqlConsulta);
            $stmConsulta->bindParam(':email', $emailCadastro);
            $stmConsulta->execute();

            if($stmConsulta->rowCount() > 0) {
                respostaJsonErro('Email já cadastrado');
            }

            $sql = 'INSERT INTO tb_usuario (ra, nome, telefone, email, senha, perfil) VALUES (:ra, :nome, :telefone, :emailCadastro, SHA1(:senhaCadastro), :perfil)';

            $stm = $conn->prepare($sql);
            $stm->bindParam(':ra', $ra);
            $stm->bindParam(':nome', $nome);
            $stm->bindParam(':telefone', $telefone);
            $stm->bindParam(':emailCadastro', $emailCadastro);
            $stm->bindParam(':senhaCadastro', $senhaCadastro);
            $stm->bindParam(':perfil', $perfil);
            $stm->execute();

            if($stm->rowCount() > 0) {
                respostaJsonSucesso("Cadastro realizado com sucesso!");
            } else {
                respostaJsonErro("Cadastro não realizado.");
            }

            respostaJsonExcecao($stm->fetchAll(PDO::FETCH_ASSOC));
        }catch (PDOException $e){
            respostaJsonExcecao($e);
        }finally {
            $this->bd->close();
        }
    }
}
