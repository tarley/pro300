<?php

session_start();

require_once "util/Util.php";

$acao = (isset($_GET['acao'])) ? $_GET['acao'] : 'listar';
$codprofessor = $_SESSION['cod_usuario'];

$atividade = new Atividade();

switch($acao) {
    case 'enviarEmails':{
        $atividade->EnviarEmails();
        break;
    }
    
    case 'inserir': {
        $atividade->Insert();
        break;
    }

    case 'alterar': {
        $atividade->Update();
        break;
    }
    case 'encerrar':{
        $atividade->EncerrarAtividade();
        break;
    }

    case 'mostrar': {
        $atividade->getDados();
        break;
    }

    case 'listagemAtividade':{
        $atividade->getListaByProfessor($codprofessor);
        break;
    }

	case 'listarPorAluno':{
		$atividade->getListByAluno();
		break;
	}

    default: {
        $atividade->getListaByProfessor($codprofessor);
        break;
    }
}
class Atividade
{

    private $bd;

    function __construct(){
        $this-> bd = new BDConnection();
    }

    function EnviarEmails(){
        $codAtividade = $_POST['codAtividade'];

        $sql = "SELECT U.nome, U.email as Email, I.lider
        FROM tb_atividade A INNER JOIN tb_inscricao I ON(A.cod_atividade = I.cod_atividade)
                            INNER JOIN tb_usuario U ON (U.cod_usuario = I.cod_aluno)
        WHERE a.cod_atividade = :codAtividade";

        try{
            $conn = $this->bd->getConnection();
            $stm = $conn->prepare($sql);
            $stm->bindParam(":codAtividade", $codAtividade);
            $stm->execute();

            $result = $stm->fetchAll(PDO::FETCH_ASSOC);// = 0;
            $emails = "";

            $subject = "Avaliação disponível";

            $message = "A avaliação está disponível para ser realizada : <a href='www.pro300.com.br'>Pro 300</a>";

            $header = "From:abc@somedomain.com \r\n";
            $header .= "MIME-Version: 1.0\r\n";
            $header .= "Content-type: text/html\r\n";

            for ($i = 0; $i < sizeof($result); $i++) {
                $to = $result[$i]['Email'];
                $retval = mail ($to,$subject,$message,$header);
            }

            respostaJsonSucesso("Emails enviados com sucesso a $emails.");

       }catch (PDOException $e){
           respostaJsonExcecao($e);
       }finally{
           $this->bd->close();
       }
    }

    /**
     * Insere os dados de uma atividade a partir de um array
     */
    function Insert(){
        $token = trim(strip_tags($_POST['token']));
        $descricao = trim(strip_tags($_POST['descricao']));
        $dataInicio= $_POST['dataInicio'];
        $dataFim= $_POST['dataFim'];

        if(!isset($_SESSION['cod_usuario']) || trim($_SESSION['cod_usuario']) == "")
            respostaJsonErro("Usuario não autenticado!");

        $codProfessor = $_SESSION['cod_usuario'];

        try{
            $conn = $this->bd->getConnection();

            $validToken = 'SELECT cod_atividade FROM tb_atividade WHERE token = :token';

            $validToken = $conn->prepare($validToken);
            $validToken->bindParam(':token', $token);
            $validToken->execute();

            if($validToken->rowCount() > 0){ // se não retornar nenhuma linha
                respostaJsonErro("Inscrição já realizada!");
            }

            $inj = 'INSERT INTO tb_atividade (token,desc_atividade,data_inicio, data_fim,cod_professor)
             VALUES (:token,:descricao,:dataInicio,:dataFim,:cod_professor)';

            $resultado = $conn->prepare($inj);

            $resultado->bindParam(':token', $token);
            $resultado->bindParam(':descricao', $descricao);
            $resultado->bindParam(':cod_professor', $codProfessor);
            $resultado->bindParam(':dataInicio', $dataInicio);
            $resultado->bindParam(':dataFim', $dataFim);

            $resultado->execute();

            if($resultado->rowCount() > 0){
                respostaJsonSucesso("Cadastro realizado com sucesso!");
            } else {
                respostaJsonErro("Cadastro não realizado!");
            }
        }catch (PDOException $e){
            respostaJsonExcecao($e);
        }finally{
            $this->bd->close();
        }
    }

    /**
     * Atualiza os dados de uma atividade a partir de um array
     */
    function Update(){

        $codProfessor = $_SESSION['cod_usuario'];

        $token = trim(strip_tags($_POST['token']));
        $descricao = trim(strip_tags($_POST['descricao']));
        $dataInicio= $_POST['dataInicio'];
        $dataFim= $_POST['dataFim'];
        $codAtividade = $_POST['cod_atividade'];

        try{

            $sql= 'UPDATE tb_atividade
					 SET 	cod_atividade = :codAtividade,
							desc_atividade = :descricao,
							token = :token,
							data_inicio = :dataInicio,
							data_fim = :dataFim,
							data_encerramento_atv = null,
							cod_professor = :codProfessor
				   WHERE cod_atividade =  :codAtividade
			';

            $conn = $this->bd->getConnection();
            $stm = $conn->prepare($sql);
            $stm->bindParam(':codAtividade', $codAtividade);
            $stm->bindParam(':descricao', $descricao);
            $stm->bindParam(':token', $token);
            $stm->bindParam(':dataInicio', $dataInicio);
            $stm->bindParam(':dataFim', $dataFim);
            $stm->bindParam(':codProfessor', $codProfessor);

            $stm->execute();

            if($stm->rowCount() > 0) {
                respostaJsonSucesso("Alteração realizada com sucesso!");
            } else {
                respostaJsonErro("Nenhum registro alterado.");
            }
        }catch (PDOException $e){
            respostaJsonExcecao($e);
        }finally{
            $this->bd->close();
        }
    }

    /**
     * Encerra uma atividade a partir do seu codigo
     */
    function EncerrarAtividade(){
        try{

            $codAtividade = $_POST['cod_atividade'];
            $conn = $this->bd->getConnection();

            $sql = '
                UPDATE tb_atividade
                SET data_encerramento_atv = NOW()
                WHERE cod_atividade = :codAtividade
                ';

            $stm = $conn->prepare($sql);
            $stm->bindParam(':codAtividade', $codAtividade);

            $stm->execute();

            if($stm->rowCount() > 0) {
                respostaJsonSucesso("Atividade encerrada!");
            } else {
                respostaJsonErro("Erro ao encerrar atividade.");
            }
        }
        catch (PDOException $e){
            respostaJsonExcecao($e);
        }finally{
            $this->bd->close();
        }
    }

    /**
     * Retorna os dados de uma atividade a partir do seu codigo
     */
    function getDados(){

        if(!isset($_GET['cod_atividade']) || trim($_GET['cod_atividade']) == "")
            respostaJsonErro("Atividade não encontrada");

        $codAtividade = $_GET['cod_atividade'];

        try{
            $sql = '
            SELECT  cod_atividade,
                    desc_atividade,
                    token,
                    date_format(data_inicio, \'%d/%m/%Y\') as data_inicio,
                    date_format(data_fim,\'%d/%m/%Y\') as data_fim,
                    data_encerramento_atv,
                    cod_professor
            FROM tb_atividade a 
            WHERE a.cod_atividade = :codAtividade
            AND a.data_encerramento_atv IS NULL
        ';

            $conn = $this->bd->getConnection();
            $stm = $conn->prepare($sql);
            $stm->bindParam(':codAtividade', $codAtividade);
            $stm->execute();

            respostaJson($stm->fetchAll(PDO::FETCH_ASSOC));
        }catch (Exception $e){
            respostaJsonExcecao($e);
        }finally{
            $this->bd->close();
        }

    }

    /**
     * Retorna uma lista de todos as atividades
     */
    function getLista(){

    }

    /**
     * Retorna uma lista de todos as atividades por professor
     */
    function getListaByProfessor($codProfessor)
    {
        $sql = '
		SELECT desc_atividade, cod_atividade
                FROM tb_atividade 
                WHERE cod_professor = :codProfessor
                AND data_encerramento_atv IS NULL
                ';

        try{

            $conn = $this->bd->getConnection();
            $stm = $conn->prepare($sql);
            $stm->bindParam(":codProfessor", $codProfessor);
            $stm->execute();

            respostaJson($stm->fetchAll(PDO::FETCH_ASSOC));

        }catch (PDOException $e){
            respostaJsonExcecao($e);
        }finally{
            $this->bd->close();
        }
    }

    /**
     * Inscreve um aluno em uma atividade a partir de seus codigos
     */
    function InscricaoAvaliacao($codAtividade, $codAluno){

    }

	function getListByAluno()
	{
		$codAluno = $_SESSION['cod_usuario'];

		$sql = 'SELECT a.*, i.cod_inscricao
                FROM tb_atividade a INNER JOIN tb_inscricao i ON (a.cod_atividade = i.cod_atividade)
                WHERE i.cod_aluno = :codAluno
                AND a.data_encerramento_atv IS NULL
                ORDER BY a.data_inicio DESC
                ';

		try{

			$conn = $this->bd->getConnection();
			$stm = $conn->prepare($sql);
			$stm->bindParam(":codAluno", $codAluno);
			$stm->execute();

			$result = $stm->fetchAll(PDO::FETCH_ASSOC);

			for ($i = 0; $i < sizeof($result); $i++) {
				$result[$i]['data_inicio'] = date_format(date_create($result[$i]['data_inicio']), 'd-m-Y');
				$result[$i]['data_fim'] = date_format(date_create($result[$i]['data_fim']), 'd-m-Y');
			}

			prepararJson($result);

		}catch (PDOException $e){
			respostaJsonExcecao($e);
		}finally{
			$this->bd->close();
		}
	}
}
