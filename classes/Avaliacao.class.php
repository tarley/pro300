<?php
session_start();
require_once "util\Util.php";
$acao = (isset($_GET['acao'])) ? $_GET['acao'] : 'listar';

$avaliacao = new Avaliacao();
switch($acao) {  
        case 'inserir': {$avaliacao->inserir(); break;} 
        case 'listar': {$avaliacao->getListaByAvaliado(); break;} 
        default: {break;}
}
/** * Created by PhpStorm. * User: Carina * Date: 11/10/2016 * Time: 21:54 */
class Avaliacao
{    
        private $bd;   
        function __construct() 
        {       
                 $this->bd = new BDConnection();
        }    
        /**     * Insere os dados de uma avaliação a partir de um array     */  
        function Insert($array)
        {    
        
        }   
        /**     * Retorna os dados de uma avaliação a partir do seu avaliado e avaliador em uma atividade     */    
        function getDados($codAvaliado, $codAvaliador, $codAtividade)
        { 
                
        }    
        /**     * Retorna uma lista de todos as avaliações para um aluno em uma atividade     */ 
        function getListaByAvaliado()
        { 
                $codAvaliado = $_SESSION['cod_usuario']; 
                $codInscricao = $_GET['codInscricao'];  
                try{ 
                        $sql = ' 
                        SELECT i.cod_inscricao,  
                        i.grupo,        
                        i.lider,       
                        i.cod_atividade         
                        FROM tb_inscricao i       
                        WHERE i.cod_inscricao = :codInscricao ';    
                        
                        $conn = $this->bd->getConnection();     
                        $stm = $conn->prepare($sql);  
                        $stm->bindParam("codInscricao", $codInscricao);     
                        $stm->execute();   
                        $inscricao = $stm->fetch(PDO::FETCH_ASSOC);    
                        //respostaJson($inscricao);     
                        if($inscricao["lider"] = "1")
                        {    $sqlretorno = '     
                        SELECT *     
                        FROM tb_inscricao i   
                        where i.cod_atividade = :cod_atividade   
                        and i.grupo = :grupo          and i.lider = 0          and i.cod_inscricao <> :codInscricao ';    
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
                                $sqlavaliado ='
				
				
					SELECT *
					from tb_inscricao I	
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
                        /*$sql = 'SELECT cod_usuario, email, senha, ra, nome, telefone, perfil FROM tb_usuario where perfil = "A"'; 
                        $conn = $this->bd->getConnection(); 
                        $stm = $conn->prepare($sql);    
                        $stm->execute();     
                        $retorno = $stm->fetchAll(PDO::FETCH_ASSOC);  
                        $retorno['usuarioAtualLider'] = $lider;          
                        preparaJson($retorno);*/        
                }catch (PDOException $e){     
                        respostaJsonExcecao($e);  
                }finally {         
                        $this->bd->close(); 
                }   
        } 
        /*
        function insert() { 
        $codAval = $_POST['cod_insc_avaliador'];  
        $alunos = $_POST['alunos'];  
        for($i = 0; i < sizeOf($alunos); $i++) {
        //insert da nota no banco  } }
        */
}
