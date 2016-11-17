<?php

/**
 * Created by PhpStorm.
 * User: Vitor
 * Date: 23/10/2016
 * Time: 17:43
 */

require_once "util/Util.php";

$acao = (isset($_GET['acao'])) ? $_GET['acao'] : 'listar';

$RelatorioAtividades = new RelatorioAtividades();

switch($acao) {
    case 'buscarDetalhes': { $RelatorioAtividades->buscarDetalhes(); break; }
    default: { $RelatorioAtividades->buscarTodas(); break; }
}

class RelatorioAtividades
{private $bd;

    function __construct()
    {
        $this->bd = new BDConnection();
    }

    public function buscarTodas() {

        if(!isset($_GET['CodAtividade']))
            respostaJsonErro("Codigo de atividade não informado");

        $codAtividade = (int) $_GET['CodAtividade'];

    try{
        $sql = 'SELECT	U.cod_usuario,
            I.cod_inscricao as "CodInscricao",
            U.Nome as "Nome",
            U.RA as "RA",
            I.p1 as "NotaP1",
            I.p300 as "NotaP300",
            I.nota_final as "NotaFinal",
           format ((((I.p300 / I.nota_final) -1) * 100),1) as "IndiceMelhoria"
FROM	tb_usuario U
INNER JOIN
		tb_inscricao I
ON		(U.cod_usuario = I.cod_aluno)
WHERE U.perfil = "A"
AND	I.cod_atividade = :codAtividade ';

        $conn = $this->bd->getConnection();
        $stm = $conn->prepare($sql);
        $stm->bindParam(':codAtividade', $codAtividade);
        $stm->execute();

        respostaJson($stm->fetchAll(PDO::FETCH_ASSOC));


    }catch (PDOException $e){
        respostaJsonExcecao($e);


    }finally {
        $this->bd->close();
    }
}

    public function buscarDetalhes() {

        if(!isset($_GET['CodInscricao']))
            respostaJsonErro("Codigo de inscrição não informado");

        $codInscricao = (int) $_GET['CodInscricao'];

        try{
            $sql = 'SELECT	U.Nome as "Nome",
		U.RA as "RA",
        A.nota as "AvAjudante",
        (SELECT nota from tb_avaliacao where cod_inscricao_avaliador = A.cod_inscricao_avaliado and cod_inscricao_avaliado = A.cod_inscricao_avaliador) as "AvAjudado",
        FORMAT((A.nota+(SELECT nota from tb_avaliacao where cod_inscricao_avaliador = A.cod_inscricao_avaliado and cod_inscricao_avaliado = A.cod_inscricao_avaliador))/2,1) as "Media"

from	tb_avaliacao A
		inner join tb_inscricao I on (A.cod_inscricao_avaliado = I.cod_inscricao)
        inner join tb_usuario U on (I.cod_aluno = U.cod_usuario)
where cod_inscricao_avaliador = :codInscricao ';

            $conn = $this->bd->getConnection();
            $stm = $conn->prepare($sql);
            $stm->bindParam(':codInscricao', $codInscricao);
            $stm->execute();

            respostaJson($stm->fetchAll(PDO::FETCH_ASSOC));


        }catch (PDOException $e){
            respostaJsonExcecao($e);


        }finally {
            $this->bd->close();
        }
    }


}