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

require_once "util/Util.php";

$acao = (isset($_GET['acao'])) ? $_GET['acao'] : 'listar';

$professor = new Professor();

switch($acao) {
    //case 'excluir': { $professor->excluir(); break; }
    case 'alterar': { $professor->alterar(); break; }
    case 'inserir': { $professor->Insert(); break;}
    //case 'buscarPorId': {$professor->buscarPorId(); break;}
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
                respostaJsonErro('Email jรก cadastrado');
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
    function Update($array){

    }


    /**
     * Retorna os dados de um professor a partir do seu codigo
     */
    function getDados($codProfessor){

    }

    /**
     * Retorna uma lista de todos os professores
     */
    function getLista($codProfessor){

    }


}
