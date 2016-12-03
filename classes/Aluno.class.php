<?php

session_start();

require_once "util/Util.php";

$acao = (isset($_GET['acao'])) ? $_GET['acao'] : 'listar';

$aluno = new Aluno();

switch($acao) {
    case 'alterar': {
        $aluno->Update();
        break;
    }
    case 'inserir': {
        $aluno->Insert();
        break;
    }
    case 'buscarPorId': {
        $aluno->getDados();
        break;
    }
    case 'buscarPorAtividade': {
        $aluno->getListaByAtividade();
        break;
    }
    default: {
        $aluno->getLista();
        break;
    }
}




/**
 * Created by PhpStorm.
 * User: Carina
 * Date: 11/10/2016
 * Time: 20:53
 */
class Aluno
{
    private $bd;

    function __construct(){
        $this->bd = new BDConnection();
    }



    /**
     * Insere os dados de um aluno a partir de um array
     */
    function Insert($array){

    }

    /**
     * Atualiza os dados de um aluno a partir de um array
     */
     function Update(){
        if(!isset($_SESSION['cod_usuario']))
            respostaJsonErro("Usuário não informado");

        $cod_usuario = (int) $_SESSION['cod_usuario'];

        $ra = $_POST['ra'];
        $nome = $_POST['nome'];
        $telefone = $_POST['telefone'];
        $emailCadastro = $_POST['emailCadastro'];

        try{
			
			$conn = $this->bd->getConnection();

            $sqlQuery = 'SELECT *
                           FROM tb_usuario
                          WHERE ra = :ra
						    AND cod_usuario <>  :cod_usuario';

            $stmConsulta = $conn->prepare($sqlQuery);
            $stmConsulta->bindParam(':ra', $ra);
            $stmConsulta->bindParam(':cod_usuario', $cod_usuario);
            $stmConsulta->execute();

            if($stmConsulta->rowCount() > 0) {
                respostaJsonErro('Este RA já foi cadastrado!');
            }
			
            $sqlConsultaEmail = 'SELECT *
                                   FROM tb_usuario
                                  WHERE email = :email
								    AND cod_usuario <>  :cod_usuario';

            $stmConsultaEmail = $conn->prepare($sqlConsultaEmail);
            $stmConsultaEmail->bindParam(':email', $emailCadastro);
			$stmConsultaEmail->bindParam(':cod_usuario', $cod_usuario);
            $stmConsultaEmail->execute();

            if($stmConsultaEmail->rowCount() > 0) {
              respostaJsonErro('Este e-mail já foi cadastrado!');
            }
			
            $sql= 'UPDATE tb_usuario 
                      SET email = :emailCadastro,
                          ra = :ra,
                          nome = :nome,
                          telefone = :telefone
                    WHERE cod_usuario =  :cod_usuario';

            
            $conn = $this->bd->getConnection();
            $stm = $conn->prepare($sql);
            $stm->bindParam(':cod_usuario', $cod_usuario);
            $stm->bindParam(':ra', $ra);
            $stm->bindParam(':nome', $nome);
            $stm->bindParam(':telefone', $telefone);
            $stm->bindParam(':emailCadastro', $emailCadastro);

            $stm->execute();

            if($stm->rowCount() > 0) {
                respostaJsonSucesso("Alteração realizada com sucesso!");
            } else {
                respostaJsonErro("Nenhum registro alterado.");
            }
            response($stm->fetchAll(PDO::FETCH_ASSOC));
        }catch (PDOException $e){
            respostaJsonExcecao($e);
        }finally {
            $this->bd->close();
        }
    }
    
    
    /**
     * Retorna os dados de um aluno a partir do seu codigo
     */
    function getDados(){

        if(!isset($_SESSION['cod_usuario']))
            respostaJsonErro('Usuario inválido ');

        $cod_usuario = $_SESSION['cod_usuario'];

        try{
            $sql = ' SELECT email, 
 			    senha, 
 			    ra, 
 			    nome, 
 			    telefone 
 		       FROM tb_usuario 
 		      WHERE cod_usuario = :cod_usuario';

            $conn = $this->bd->getConnection();
            $stm = $conn->prepare($sql);
            $stm->bindParam(':cod_usuario', $cod_usuario);
            $stm->execute();

            respostaJson($stm->fetchAll(PDO::FETCH_ASSOC));
        }catch (Exception $e){
            respostaJsonExcecao($e);
        }finally {
            $this->bd->close();
        }
    }

    /**
     * Retorna uma lista de todos os alunos
     */
    function getLista(){

    }

    /**
     * Retorna uma lista de todos os alunos que participam de determinada atividade
     */
    function getListaByAtividade($codAtividade){

    }

    /**
     * Atualiza senha do aluno
     */
    function alterarSenha(){
        if(!isset($_SESSION['cod_usuario']))
            respostaJsonErro("Usuário não informado");

        $cod_usuario = (int) $_SESSION['cod_usuario'];

        $senhaAtual = $_POST['senhaAtual'];
        $senha = $_POST['novaSenha'];

        try {

            $conn = $this->bd->getConnection();

            $sqlQuery = 'SELECT *
                           FROM tb_usuario
                          WHERE cod_usuario = :cod_usuario
                            AND senha = :senhaAtual';

            $stmConsulta = $conn->prepare($sqlQuery);
            $stmConsulta->bindParam(':cod_usuario', $cod_usuario);
            $stmConsulta->bindParam(':senhaAtual', $senhaAtual);
            $stmConsulta->execute();

            if($stmConsulta->rowCount() > 0) {
                respostaJsonErro('Senha atual incorreta!');
            }

            $sql= 'UPDATE tb_usuario 
                      SET senha = SHA1(:senha)
                    WHERE cod_usuario =  :cod_usuario';


            $conn = $this->bd->getConnection();
            $stm = $conn->prepare($sql);
            $stm->bindParam(':cod_usuario', $cod_usuario);
            $stm->bindParam(':senha', $senha);

            $stm->execute();

            if($stm->rowCount() > 0) {
                respostaJsonSucesso("Alteração realizada com sucesso!");
            } else {
                respostaJsonErro("Nenhum registro alterado.");
            }
            response($stm->fetchAll(PDO::FETCH_ASSOC));

        }catch (PDOException $e){
            respostaJsonExcecao($e);
        }finally {
            $this->bd->close();
        }
    }
}
