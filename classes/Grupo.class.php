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
}
