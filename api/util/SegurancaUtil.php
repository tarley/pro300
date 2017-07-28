<?php
    /* ID DOS PERFIS */
    $ADMINISTRADOR = 1;
    $COORDENADOR = 2;
    $PROFESSOR = 3;
    $ALUNO = 4;
    
    /* CHAVE PARA O USUARIO NA SESSAO */
    define('USUARIO', 'usuario');

    session_start();

    function autenticacaoInvalida() {
        return empty($_SESSION[USUARIO]);
    }
    
    function acessoRestrito($perfisPermitidos = array(1, 2, 3, 4)) {
        if(autenticacaoInvalida() || !in_array(getPerfilId(), $perfisPermitidos)) {
            http_response_code(401);
            exit;
        }    
    }

    function setUsuario($usuario) {
        $_SESSION[USUARIO] = $usuario;
    }
    
    function logout() {
        x1session_destroy();
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
?>