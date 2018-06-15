<?php
    /* ID DOS PERFIS */
    $ADMINISTRADOR = 1;
    $COORDENADOR = 2;
    $PROFESSOR = 3;
    $ALUNO = 4;
    
    /* CHAVE PARA O USUARIO NA SESSAO */
    define('USUARIO', 'usuario');

    function autenticacaoInvalida() {
        return empty($_SESSION[USUARIO]);
    }
    
    function acessoRestrito($perfisPermitidos = array(1, 2, 3, 4)) {
        
        if(autenticacaoInvalida()) {
            LOG::Debug("Acesso negado ao recurso, usuário não autenticado.");
                
            http_response_code(401);
            exit;
        }
        
        if(!in_array(getPerfilId(), $perfisPermitidos)) {
            LOG::Debug("Usuário não possui permissão de acesso ao recurso. {print_r(getUsuario(), true}");
                
            http_response_code(401);
            exit;
        }    
    }

    function setUsuario($usuario) {
        $_SESSION[USUARIO] = $usuario;
    }
    
    function logout() {
        session_destroy();
    }
    
    function getUsuario() {
        return $_SESSION[USUARIO];
    }
    
    function getUsuarioId() {
        return getUsuario()['id'];
    }
    
    function getPerfilId() {
        return getUsuario()['perfil_id'];
    }
    
    function gerarSenha($tamanho, $maiusculas, $minusculas, $numeros, $simbolos){
        $ma = "ABCDEFGHIJKLMNOPQRSTUVYXWZ"; // $ma contem as letras maiúsculas
        $mi = "abcdefghijklmnopqrstuvyxwz"; // $mi contem as letras minusculas
        $nu = "0123456789"; // $nu contem os números
        $si = "!@#$%¨&*()_+="; // $si contem os símbolos
        
        $senha = "";
        
        if ($maiusculas){
            // se $maiusculas for "true", a variável $ma é embaralhada e adicionada para a variável $senha
            $senha .= str_shuffle($ma);
        }
     
        if ($minusculas){
            // se $minusculas for "true", a variável $mi é embaralhada e adicionada para a variável $senha
            $senha .= str_shuffle($mi);
        }
     
        if ($numeros){
            // se $numeros for "true", a variável $nu é embaralhada e adicionada para a variável $senha
            $senha .= str_shuffle($nu);
        }
     
        if ($simbolos){
            // se $simbolos for "true", a variável $si é embaralhada e adicionada para a variável $senha
            $senha .= str_shuffle($si);
        }
     
        // retorna a senha embaralhada com "str_shuffle" com o tamanho definido pela variável $tamanho
        return substr(str_shuffle($senha),0,$tamanho);
    }
?>