<?php

require_once "util/Util.php";

/**
 * Created by PhpStorm.
 * User: Carina
 * Date: 11/10/2016
 * Time: 21:43
 */
$acao      = isset($_GET['acao']) ? $_GET['acao'] : 'listar';
$cod_professor = isset($_GET['cod_professor']) ? $_GET['cod_professor']:'sem_professor';

$grupo = new Grupo();

switch($acao) {
    case 'gerar': {
        break;
    }

    case 'alterar': {
        $grupo ->Update();
        break;
    }

	case 'encerrar':{
        break;
    }

	case 'gerarNotaLider': {
    	$grupo->gerarNotaLider();
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


    function Update(){

        $cod_atividade  = $_POST['cod_atividade'];
        $cod_aluno      = $_POST['cod_aluno'];
        $notap1         = $_POST['notap1'];
        $notap300       = $_POST['notap300'];

        try {
            $conn = $this->bd->getConnection();// faz a conexão
            $queryEditarNota = "update tb_inscricao set p1   = :notap1,
                                                        p300 = :notap300
                                                        
                                 where cod_atividade         = :cod_atividade
                                   and cod_aluno             = :cod_aluno";
            $stm = $conn->prepare($queryEditarNota);
            $stm->bindParam(':cod_atividade',  $cod_atividade);
            $stm->bindParam(':cod_aluno'    ,  $cod_aluno);
            $stm->bindParam(':notap1'       ,  $notap1);
            $stm->bindParam(':notap300'      ,  $notap300);
            $stm->execute();

            if($stm->rowCount() > 0) {
                respostaJsonSucesso("Alteração realizada com sucesso!");
            } else {
                ///echo $nota ;echo $cod_atividade; echo $cod_aluno;
                respostaJsonErro("Houve um erro!");
            }
        }catch (PDOException $e){
            respostaJsonExcecao($e);
        }finally {
            $this->bd->close();
        }
    }
    /**
     * Retorna uma lista de todos os grupos de uma atividade
     */
    function getListaByAtividade(){

        $sql = "select  i.cod_inscricao,
                        ifnull(i.p1,'') p1,
                        ifnull(i.p300,'') p300,
                        i.cod_aluno,
                        i.lider,
                        u.ra,
                        u.nome,
                        a.cod_professor,
                        a.cod_atividade
                  from tb_inscricao i inner join tb_usuario u 
                                         on (i.cod_aluno = u.cod_usuario)
                                      inner join tb_atividade a
                                         on (i.cod_atividade = a.cod_atividade)
                 where a.cod_professor = 1";


        try{
            $conn = $this->bd->getConnection();
            $stm = $conn->prepare($sql);
            $stm->bindParam(':cod_professor', $cod_professor);  //quando se receber algum parametro usado no sql
            $stm->execute();

            echo json_encode($stm->fetchAll(PDO::FETCH_OBJ));
           // respostaJson($stm->fetchAll(PDO::FETCH_ASSOC));
        
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

    function gerarNotaLider() {
		try{
			if (!isset($_POST['cod_inscricao']))
				respostaJsonErro("Falha ao gerar nota. Código da incrição não fornecido.");

			$codInscricao = $_POST['cod_inscricao'];

			$dadosIncricao = $this->getDadosInscricao($codInscricao);
			$grupo = $dadosIncricao['grupo'];

			if ($this->temAvaliacaoPendente($grupo, $codInscricao))
				respostaJsonErro('Ainda existem avaliações pendentes para este grupo!');

			$mediaMelhora = $this->getMediaMelhora($grupo);
			$mediaAvaliacao = $this->getMediaAvaliacao($codInscricao);
			$notaFinal = $this->getNotaFinalLider($mediaMelhora, $mediaAvaliacao);

			//echo "Melhora: " . $mediaMelhora . " - Avaliacao: " . $mediaAvaliacao . " - Nota: " . $notaFinal;

			if ($this->updateNotaLider($notaFinal, $codInscricao))
				respostaJsonSucesso("Nota gerada com sucesso.");
			else
				respostaJsonErro("Falha ao gerar nota.");
		}catch (PDOException $e){
			respostaJsonExcecao($e);
		}finally {
			$this->bd->close();
		}
	}

	function getDadosInscricao($codInscricao) {
		try{
			$conn = $this->bd->getConnection();

			$sqlQuery = "SELECT * FROM tb_inscricao WHERE cod_inscricao = :codInscricao";

			$stm = $conn->prepare($sqlQuery);
			$stm->bindParam(':codInscricao', $codInscricao);
			$stm->execute();

			return $stm->fetch(PDO::FETCH_ASSOC);
		}catch (PDOException $e){
			throw $e;
		}
	}

	function temAvaliacaoPendente($grupo, $codInscricaoLider) {
		try{
			$sqlQuery = "SELECT a.nota FROM tb_inscricao i LEFT JOIN tb_avaliacao a ON (i.cod_inscricao = a.cod_inscricao_avaliador) 
							WHERE i.lider = 0 AND a.nota IS NULL AND i.grupo = :grupo AND a.cod_inscricao_avaliado = :codInscricaoLider";

			$conn = $this->bd->getConnection();
			$stm = $conn->prepare($sqlQuery);
			$stm->bindParam(':grupo', $grupo);
			$stm->bindParam(':codInscricaoLider', $codInscricaoLider);
			$stm->execute();

			return ($stm->rowCount() > 0);
		}catch (PDOException $e){
			throw $e;
		}
	}

	function getMediaMelhora($grupo) {
		try{
			$sqlQuery = "SELECT CAST(AVG(p300 - p1) AS DECIMAL(10,2)) AS Media FROM tb_inscricao WHERE grupo = :grupo AND lider = 0";

			$conn = $this->bd->getConnection();
			$stm = $conn->prepare($sqlQuery);
			$stm->bindParam(':grupo', $grupo);
			$stm->execute();
			$dados = $stm->fetch(PDO::FETCH_ASSOC);

			return $dados['Media'];
		}catch (PDOException $e){
			throw $e;
		}
	}

	function getMediaAvaliacao($codInscricaoLider) {
		try{
			$sqlQuery = "SELECT CAST(AVG(nota) AS INT) AS Media FROM tb_avaliacao WHERE cod_inscricao_avaliado = :codInscricaoLider";

			$conn = $this->bd->getConnection();
			$stm = $conn->prepare($sqlQuery);
			$stm->bindParam(':codInscricaoLider', $codInscricaoLider);
			$stm->execute();
			$dados = $stm->fetch(PDO::FETCH_ASSOC);

			return $dados['Media'];
		}catch (PDOException $e){
			throw $e;
		}
	}

	function getNotaFinalLider($mediaMelhora, $mediaAvaliacao) {
		try{
			if ($mediaMelhora < 0)
				return 0;

			$sqlQuery = "SELECT * FROM tb_parametro_prova WHERE valor_media_min_melhoria <= :mediaMelhora AND valor_media_max_melhoria >= :mediaMelhora";

			$conn = $this->bd->getConnection();
			$stm = $conn->prepare($sqlQuery);
			$stm->bindParam(':mediaMelhora', $mediaMelhora);
			$stm->execute();

			if ($stm->rowCount() == 0)
				respostaJsonExcecao("Configuração incorreta de parâmetros.");

			$dados = $stm->fetch(PDO::FETCH_ASSOC);

			return $dados['media' . $mediaAvaliacao];
		}catch (PDOException $e){
			throw $e;
		}
	}

	function updateNotaLider($nota, $codInscricao) {
		try{
			$sqlQuery = "UPDATE tb_inscricao SET acrescimo = :nota WHERE cod_inscricao = :codInscricao";

			$conn = $this->bd->getConnection();
			$stm = $conn->prepare($sqlQuery);
			$stm->bindParam(':nota', $nota);
			$stm->bindParam(':codInscricao', $codInscricao);
			$stm->execute();

			return true;
		}catch (PDOException $e){
			throw $e;
		}
	}
}
