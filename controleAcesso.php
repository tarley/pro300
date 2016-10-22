<?php
    session_start();

    if (!isset($_SESSION['cod_usuario']))
        header("location:login.php");
    else if(isset($permissaoPagina) && $permissaoPagina == "P" && $_SESSION['perfil'] != "P")
        header("location:homeAluno.php");
    else if(isset($permissaoPagina) && $permissaoPagina == "A" && $_SESSION['perfil'] != "A")
        header("location:administrarAtividades.php");
?>