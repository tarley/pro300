<?php

require_once "util/Util.php";

session_start();
$codprofessor = $_SESSION['cod_usuario'];

$atv = new Atividade();

$acao = (isset($_GET['acao'])) ? $_GET['acao'] : 'listar';

switch($acao) {
    case 'encerrar': { $atv->EncerrarAtividade(); break; }
    default: { $atv->getListaByProfessor($codprofessor); break; }
}


/**
 * Created by PhpStorm.
 * User: Carina
 * Date: 11/10/2016
 * Time: 21:01
 */
class Atividade
{
    private $bd;

    function  __construct()
    {
        $this->bd = new BDConnection();
    }

    /**
     * Insere os dados de uma atividade a partir de um array
     */
    function Insert($array){

    }

    /**
     * Atualiza os dados de uma atividade a partir de um array
     */
    function Update($array){

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
    function getDados($codAtividade){

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
}

