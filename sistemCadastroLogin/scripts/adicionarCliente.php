<?php
require_once "conexao.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    try {

        //  Capturando e limpando dados do formulário
        $nome      = trim($_POST["nm_nome"] ?? "");
        $nomeConta  = trim($_POST["nm_conta"] ?? "");
        $email  = trim($_POST["ds_email"] ?? "");
        $senha     = trim($_POST["ds_senha"] ?? "");

        $hash = password_hash($senha, PASSWORD_DEFAULT);

      
//  Validação simples (didática)
        if ($nome == "") {
            die("O nome é obrigatório.");
        }
//VERIFICA SE A CONTA JA EXISTE
        $sql = "SELECT id FROM tb_usuario 
        WHERE nm_login = :login 
        OR ds_email = :email";

        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(":login", $nomeConta);
        $stmt->bindParam(":email", $email);

        $stmt->execute();

        $existe = $stmt->fetch();

        if ($existe) {
            die("Usuário ou email já cadastrado.");
        }


//ADICIONA AS INFORMAÇÕES AO BANCO
        $sql = "INSERT INTO tb_usuario
                (nm_usuario, nm_login, ds_email, ds_senha)
                VALUES
                (:nome, :nomeConta, :email, :senha)";

        /*
        prepare -> é um método do PHP Data Objects (PDO) que prepara uma consulta SQL para execução, retornando um objeto
                
        O bindParam() no PHP PDO é um método usado para vincular (associar) uma variável PHP a um marcador nomeado (:nome) ou de interrogação (?) em uma consulta SQL preparada
                
        */ 


        $stmt = $pdo->prepare($sql);

        //  Bind dos parâmetros
        $stmt->bindParam(":nome", $nome);
        $stmt->bindParam(":nomeConta", $nomeConta);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":senha", $hash);


        
        //Executa
        $stmt->execute();

        echo "Cliente cadastrado com sucesso!";

        
        header("Location: ../pags/login.php");
        exit;
        

    } catch (PDOException $e) {
        echo "Erro ao cadastrar: " . $e->getMessage();
    }

} else {
    echo "Erro no envio do formulário.";
}
?>