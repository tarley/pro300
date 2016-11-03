<?php
/**
 * Created by PhpStorm.
 * User: tarle
 * Date: 09/10/2016
 * Time: 19:27
 */
require_once "util/Util.php";

$acao = (isset($_GET['acao'])) ? $_GET['acao'] : 'listar';

$tarefa = new Tarefa();

switch($acao) {
    case 'excluir': { $tarefa->excluir(); break; }
    case 'alterar': { $tarefa->alterar(); break; }
    case 'inserir': { $tarefa->inserir(); break;}
    case 'buscarPorId': {$tarefa->buscarPorId(); break;}
    default: { $tarefa->buscarTodas(); break; }
}

class Tarefa
{
    private $bd;

    function __construct()
    {
        $this->bd = new BDConnection();
    }

    public function buscarTodas() {

        try{
            $sql = 'SELECT id, 
                           dataFinalizacao, 
                           descricao, 
                           finalizado 
                      FROM tarefa';

            $conn = $this->bd->getConnection();
            $stm = $conn->prepare($sql);
            $stm->execute();

            respostaJson($stm->fetchAll(PDO::FETCH_ASSOC));
        }catch (PDOException $e){
            respostaJsonExcecao($e);
        }finally {
            $this->bd->close();
        }
    }

    public function buscarPorId() {
        if(!isset($_GET['id']))
            respostaJsonErro("ID não informado");

        $id = (int) $_GET['id'];

        try{
            $sql = 'SELECT id, 
                           dataFinalizacao, 
                           descricao, 
                           finalizado 
                      FROM tarefa
                     WHERE id = :id';

            $conn = $this->bd->getConnection();
            $stm = $conn->prepare($sql);
            $stm->bindParam(':id', $id);
            $stm->execute();

            respostaJson($stm->fetchAll(PDO::FETCH_ASSOC));
        }catch (Exception $e){
            respostaJsonExcecao($e);
        }finally {
            $this->bd->close();
        }
    }

    public function excluir() {
        if(!isset($_GET['id']))
            respostaJsonErro("ID não informado");

        $id = (int) $_GET['id'];

        try{
            $sql = 'DELETE FROM tarefa
                     WHERE id = :id';

            $conn = $this->bd->getConnection();
            $stm = $conn->prepare($sql);
            $stm->bindParam(':id', $id);
            $stm->execute();

            if($stm->rowCount() > 0) {
                respostaJsonSucesso("Exclusao realizada com sucesso!");
            } else {
                respostaJsonErro("Nenhum registro excluido.");
            }

            response($stm->fetchAll(PDO::FETCH_ASSOC));
        }catch (PDOException $e){
            responseError($e);
        }finally {
            $this->bd->close();
        }
    }

    public function alterar() {

        if(!isset($_POST['id']))
            respostaJsonErro("ID não informado");

        if(!isset($_POST['descricao']) || trim($_POST['descricao']) == "")
            respostaJsonErro("Descrição não informada");

        $id = (int) $_POST['id'];
        $descricao = trim($_POST['descricao']);

        try{
            $sql = 'UPDATE tarefa
                       SET descricao = :descricao 
                     WHERE id = :id';

            $conn = $this->bd->getConnection();
            $stm = $conn->prepare($sql);
            $stm->bindParam(':id', $id);
            $stm->bindParam(':descricao', $descricao);

            $stm->execute();

            if($stm->rowCount() > 0) {
                respostaJsonSucesso("Alteração realizada com sucesso!");
            } else {
                respostaJsonErro("Nenhum registro alterado.");
            }
        }catch (PDOException $e){
            respostaJsonExcecao($e);
        }finally {
            $this->bd->close();
        }
    }

    public function inserir() {

        if(!isset($_POST['descricao']) || trim($_POST['descricao']) == "")
            respostaJsonErro("Descrição não informada");

        $descricao = trim($_POST['descricao']);

        try{
            $sql = 'INSERT INTO tarefa (descricao) 
                      VALUES (:descricao)';

            $conn = $this->bd->getConnection();
            $stm = $conn->prepare($sql);
            $stm->bindParam(':descricao', $descricao);

            $stm->execute();

            if($stm->rowCount() > 0){
                respostaJsonSucesso("Tarefa cadastrada com sucesso!");
            } else {
                respostaJsonErro("Nenhuma tarefa cadastrada");
            }
        }catch (PDOException $e){
            respostaJsonExcecao($e);
        }finally {
            $this->bd->close();
        }
    }

    public function finalizar() {

        try{
            $sql = 'UPDATE tarefa
                       SET dataFinalizacao = :dataFinalizacao,
                           finalizado = 1
                     WHERE id = :id';

            $conn = $this->bd->getConnection();
            $stm = $conn->prepare($sql);
            $stm->bindParam(':id', $_POST['id']);
            $stm->bindParam(':dataFinalizacao', date("Y-m-d H:i:s"));

            $stm->execute();

            if($stm->rowCount() > 0) {
                respostaJsonSucesso("Tarefa finalizada com sucesso!");
            } else {
                respostaJsonErro("Nenhum registro alterado.");
            }
        }catch (PDOException $e){
            respostaJsonExcecao($e);
        }finally {
            $this->bd->close();
        }
    }
}
?>