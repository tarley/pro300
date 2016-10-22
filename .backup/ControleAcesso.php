<?php
    session_start();

    if (!isset($_SESSION['cod_usuario']))
        header("location:login.php");
    else if($permissaoPagina == "P" && $_SESSION['perfil'] != "P")
        header("location:HomeAluno.php");
    else if($permissaoPagina == "A" && $_SESSION['perfil'] != "A")
        header("location:AdministrarAtividades.php");
?>