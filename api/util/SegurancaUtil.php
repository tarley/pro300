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
?>