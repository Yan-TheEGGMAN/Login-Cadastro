<?php 
//inicia sessão e verifica se ela ja não esta iniciada
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


//ve se a algum usuario ligado a sessão
 if (!isset($_SESSION["usuario"])|| !isset($_SESSION['ultimo_acesso'])) {
    session_unset();
    @session_destroy();
     header("Location: ../pags/cadastro.php");
     exit; 
    }

 if (isset($_SESSION['ultimo_acesso'])) {
    $tempoAtual = time();

    $tempoInativo = $tempoAtual - $_SESSION['ultimo_acesso'];

    if($tempoInativo >300){
        // Destrói a sessão completamente
        session_unset();
        session_destroy();

        header("Location: ../pags/login.php?erro=expirado");
        exit;
    }
 }

 $_SESSION['ultimo_acesso'] = time();
?>