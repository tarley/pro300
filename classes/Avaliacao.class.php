<?php
session_start();

require_once "util\Util.php";

$acao = (isset($_GET['acao'])) ? $_GET['acao'] : 'listar';

$avaliacao = new Avaliacao();


switch($acao) {
    case 'inserir': {$avaliacao->Insert(); break;}
	case 'listar': {$avaliacao->getListaByAvaliado(); break;}
    default: {break;}
}

/**
 * Created by PhpStorm.
 * User: Carina
 * Date: 11/10/2016
 * Time: 21:54
 */
class Avaliacao
{
    private $bd;

    function __construct()
    {
        $this->bd = new BDConnection();
    }
	
    /**
     * Insere os dados de uma avaliação a partir de um array
     */
    function Insert(){
		try {
			$cod_insc_avaliador = $_POST['codAvaliador'];
			$lista_cod_insc_avaliado = explode(",",  $_POST['listaCodInscricaoAvaliado']);
			$lista_nota = explode(",",  $_POST['listaNota']);
			
			$conn = $this->bd->getConnection();// faz a conecção
			
			$queryExcluirAvaliacao = "DELETE FROM tb_avaliacao WHERE cod_inscricao_avaliador = :cod_inscricao_avaliador";
			$stm = $conn->prepare($queryExcluirAvaliacao);
			$stm->bindParam(':cod_inscricao_avaliador', $cod_insc_avaliador);
			$stm->execute();
			
			
			$queryInserirAvaliacao = "
				INSERT INTO tb_avaliacao (
					cod_inscricao_avaliador, 
					cod_inscricao_avaliado, 
					nota
				) VALUES (
					:cod_inscricao_avaliador, 
					:cod_inscricao_avaliado, 
					:nota
				)";
				
				$stm = $conn->prepare($queryInserirAvaliacao);
			
			for($i = 0; $i < count($lista_cod_insc_avaliado); $i ++) {
				$stm->bindParam(':cod_inscricao_avaliador', $cod_insc_avaliador);
				$stm->bindParam(':cod_inscricao_avaliado', $lista_cod_insc_avaliado[$i]);
				$stm->bindParam(':nota', $lista_nota[$i]);
								
				$stm->execute();
			}
			
			respostaJsonSucesso("Avaliação realizada com sucesso!");
		} catch(Exception $e) {
			respostaJsonExcecao($e);
		} finally {
            $this->bd->close();
        }
    }

    /**
     * Retorna os dados de uma avaliação a partir do seu avaliado e avaliador em uma atividade
     */
    function getDados($codAvaliado, $codAvaliador, $codAtividade){

    }

    /**
     * Retorna uma lista de todos as avaliações para um aluno em uma atividade
     */
    function getListaByAvaliado(){
		$codAvaliado = $_SESSION['cod_usuario'];
		$codInscricao = $_GET['codInscricao'];
				
		try{
			$sql = '
				SELECT i.cod_inscricao,
					   i.grupo,
					   i.lider,
					   i.cod_atividade,
                       u.nome
			     FROM tb_inscricao i INNER JOIN tb_usuario u
			     WHERE i.cod_inscricao = :codInscricao';
			
			
			
			
			
            $conn = $this->bd->getConnection();
            $stm = $conn->prepare($sql);
			$stm->bindParam("codInscricao", $codInscricao);
            $stm->execute();
			$inscricao = $stm->fetch(PDO::FETCH_ASSOC);
			
			
			
			//respostaJson($inscricao);
			
			if($inscricao["lider"] = "1") {
				$sqlretorno = '
					 SELECT *
					 FROM tb_inscricao i 
					INNER JOIN tb_usuario u ON u.cod_usuario = i.cod_aluno
					 where i.cod_atividade = :cod_atividade
					 and i.grupo = :grupo
					 and i.lider = 0
					 and i.cod_inscricao <> :codInscricao ';
				
				$conn2 = $this->bd->getConnection();
	            $stm2 = $conn->prepare($sqlretorno);
				
				$stm2->bindParam("cod_atividade", $inscricao["cod_atividade"]);
				$stm2->bindParam("grupo", $inscricao["grupo"]);
				$stm2->bindParam("codInscricao", $codInscricao);
				
				$stm2->execute();
				
				$retorno = $stm2->fetchAll(PDO::FETCH_ASSOC);
				$retorno["avaliadorLider"] = "Sim";
				respostaJson($retorno); 
				
			} else {
				
				// Caso contrario
					// buscar todos os alunos 
			$sqlavaliado ='
				
				
					SELECT *
					from tb_inscricao I	
					INNER JOIN tb_usuario u ON u.cod_usuario = i.cod_aluno
					where i.cod_atividade = :cod_atividade
					and i.grupo = :grupo
					and i.lider = 1
					and i.cod_inscricao <> :codInscricao ';
				
				
				$conn3 = $this->bd->getConnection();
	            $stm3 = $conn->prepare($sqlavaliado);
				
				$stm3->bindParam("cod_atividade", $inscricao["cod_atividade"]);
				$stm3->bindParam("grupo", $inscricao["grupo"]);
				$stm3->bindParam("codInscricao", $codInscricao);
				
				$stm3-->execute();
				
				$retorno = $stm3 ->fetchAll(PDO::FETCH_ASSOC);
				respostaJson($retorno);

			}

        }catch (PDOException $e){
            respostaJsonExcecao($e);
        }finally {
            $this->bd->close();
        }
    }
	
	//function insert() {
		
	//	}
	//}
}
