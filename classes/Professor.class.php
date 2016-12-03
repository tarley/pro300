<?php

/**
 * Created by PhpStorm.
 * User: Carina
 * Date: 11/10/2016
 * Time: 21:00
 */

/**
 * Alter by PhpStorm.
 * User: Fillipe
 * Date: 03/11/2016
 * Time: 16:00
 */

session_start();

require_once "util/Util.php";

$acao = (isset($_GET['acao'])) ? $_GET['acao'] : 'listar';

$professor = new Professor();

switch($acao) {
    //case 'excluir': { $professor->excluir(); break; }
    case 'alterar': { $professor->Update(); break; }
    case 'inserir': { $professor->Insert(); break;}
    case 'buscarPorId': {$professor->getDados(); break;}
    case 'alterarSenha': {$professor->AlterarSenha(); break;}
    default: { break; }
}



class Professor
{

    private $bd;

    function __construct()
    {
        $this->bd = new BDConnection();
    }

    /**
     * Insere os dados de um professor a partir de um array
     */
    function Insert(){
        $nome = $_POST['nome'];
        $telefone = $_POST['telefone'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $perfil = "P";

        //inserir o perfil P na query

        try{
            $conn = $this->bd->getConnection();

            $sqlConsulta = 'SELECT *
                                  FROM tb_usuario
                                 WHERE email = :email';

            $stmConsulta = $conn->prepare($sqlConsulta);
            $stmConsulta->bindParam(':email', $email);
            $stmConsulta->execute();

            if($stmConsulta->rowCount() > 0) {
                respostaJsonErro('Email já cadastrado');
            }

            $sql = 'INSERT INTO tb_usuario (nome, telefone, email, senha, perfil) VALUES (:nome, :telefone, :email, SHA1(:senha), :perfil)';

            $stm = $conn->prepare($sql);
            $stm->bindParam(':nome', $nome);
            $stm->bindParam(':telefone', $telefone);
            $stm->bindParam(':email', $email);
            $stm->bindParam(':senha', $senha);
            $stm->bindParam(':perfil', $perfil);
            $stm->execute();

            if($stm->rowCount() > 0) {
                respostaJsonSucesso("Cadastro realizado com sucesso!");
            } else {
                respostaJsonErro("Falha ao realizar cadastro.");
            }

        }catch (PDOException $e){
            respostaJsonExcecao($e);
        }finally {
            $this->bd->close();
        }
    }


    /**
     * Atualiza os dados de um professor a partir de um array
     */
    function Update(){
		if(!isset($_SESSION['cod_usuario']))
            respostaJsonErro("Usuário não informado");

        $cod_usuario = (int) $_SESSION['cod_usuario'];

		$nome = $_POST['nome'];
        $telefone = $_POST['telefone'];
        $emailCadastro = $_POST['emailCadastro'];


        try{
			
			$conn = $this->bd->getConnection();

            $sqlQuery = 'SELECT *
                           FROM tb_usuario
                          WHERE email = :email
						    AND cod_usuario <>  :cod_usuario';

            $stmConsulta = $conn->prepare($sqlQuery);
            $stmConsulta->bindParam(':email', $emailCadastro);
            $stmConsulta->bindParam(':cod_usuario', $cod_usuario);
            $stmConsulta->execute();

            if($stmConsulta->rowCount() > 0) {
                respostaJsonErro('Este Email já foi cadastrado!');
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
                          nome = :nome,
                          telefone = :telefone
                    WHERE cod_usuario =  :cod_usuario';

            
            $conn = $this->bd->getConnection();
            $stm = $conn->prepare($sql);
            $stm->bindParam(':cod_usuario', $cod_usuario);
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
     * Atualiza senha do professor
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
						    AND senha = SHA1(:senhaAtual)';

            $stmConsulta = $conn->prepare($sqlQuery);
            $stmConsulta->bindParam(':cod_usuario', $cod_usuario);
            $stmConsulta->bindParam(':senhaAtual', $senhaAtual);
            $stmConsulta->execute();

            if($stmConsulta->rowCount() == 0) {
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

    /**
     * Deleta um professor a partir do seu codigo
     */
    function Delete($codProfessor){

    }
    
    /**
     * Retorna os dados de um professor a partir do seu codigo
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
     * Retorna uma lista de todos os professores
     */
    function getLista($codProfessor){

    }


}
