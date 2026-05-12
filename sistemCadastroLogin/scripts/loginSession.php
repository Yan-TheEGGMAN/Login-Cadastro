<?php

session_start();
session_regenerate_id();
require_once "conexao.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    try {

        //  Capturando e limpando dados do formulário
        $nome      = trim($_POST["nm_conta"] ?? "");
        $senha     = trim($_POST["ds_senha"] ?? "");

      
        //  Validação simples (didática)
        if ($nome == "") {
            die("O nome é obrigatório.");
        }

        //processo de entrada no banco
        $sql = "SELECT * FROM tb_usuario WHERE nm_login = :nome";
        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(":nome", $nome);

        $stmt->execute();

        //Busca o usuario no banco
        $usuario = $stmt->fetch();
        if(!$usuario){
            die ("usuario não encontrado");
        }

        if ($usuario) {

        if (password_verify($senha, $usuario["ds_senha"])) {

        $_SESSION["usuario"] = $usuario["nm_login"];

        echo "Login realizado!";

        header("Location: ../pags/index.php");
        exit;

    } else {

        echo "Senha incorreta.";

        header("Location: ../pags/cadastro.php");
        exit;

    }

}


    }catch (PDOException $e) {
        echo "Erro ao Logar: " . $e->getMessage();
    }

} else {
    echo "Erro no envio do formulário.";
}
?>