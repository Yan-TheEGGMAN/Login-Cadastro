<?php 
    session_start();

    $_SESSION = [];

    session_destroy();

    header("Location: ../pags/index.php");
    exit;
?>