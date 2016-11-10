<?php

require_once "util/Util.php";

/**
 * Created by PhpStorm.
 * User: Carina
 * Date: 11/10/2016
 * Time: 21:43
 */
 
$acao = isset($_GET['acao']) ? $_GET['acao'] : 'listar';

$grupo = new Grupo();

switch($acao) {
    case 'gerar': {
        break;
    }

    case 'alterar': {
        break;
    }
    
	case 'encerrar':{
        break;
    }

    default: {
        $grupo->getListaByAtividade();
        break;
    }
}

 
class Grupo
{
    private $bd;

    function __construct()
    {
        $this->bd = new BDConnection();
    }

    /**
     * Insere os dados de um grupo a partir de um array
     */
    function Insert($array){

    }

    /**
     * Retorna os dados de um grupo a partir do seu codigo
     */
    function getDados($codGrupo){

    }

    /**
     * Retorna uma lista de todos os grupos de uma atividade
     */
    function getListaByAtividade(){
	
		$codAtividade = $_GET['codAtividade'];
    
        $sql = 'SELECT cod_inscricao, ra, nome, lider, p1, situacao, grupo
                FROM tb_usuario u INNER JOIN tb_inscricao i ON (u.cod_usuario = i.cod_aluno)
                WHERE cod_atividade = :atividade
                ORDER BY grupo';
        
        try{
            $conn = $this->bd->getConnection();
            $stm = $conn->prepare($sql);
            $stm->bindParam(':atividade', $codAtividade);            
            $stm->execute();            
            respostaJson($stm->fetchAll(PDO::FETCH_ASSOC));
        
        }catch(PDOException $e){        
            respostaJsonExcecao($e);            
        }finally{        
            $this->bd->close();
        }    
    }


    /**
     * Insere aluno em um grupo de uma avaliação 300
     */
    function vinculaAluno($codAluno, $codAvaliacao){

    }

    /**
     * Desabilita aluno em um grupo de uma avaliação 300
     */
    function desabilitaAluno($codAluno, $codAvaliacao){

    }
}
