<?php
    $host    = "127.0.0.1";
    $dbname  = "cadastrologin";
    $usuario = "root";
    $senha   = "";
    $port    = "3406";

    try {
        $pdo = new PDO("mysql:host=$host;port=$port;dbname=$dbname;charset=utf8", $usuario, $senha);
        //Testar se a conexão foi bem-sucedida
        
        //Se der err no sql, lança uma exceção.
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die("Erro na conexão: " . $e->getMessage());
    }
?>