<?php
    require_once "../scripts/conexao.php";
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/card.css">
   
</head>
<body>
    

    <div class="container">
        <h2>Cadastro de Informações Pessoais</h2>
             

        <form action="../scripts/adicionarCliente.php" method="POST">
            <label for="nome">Nome de usuario:</label>
            <input type="text" id="nome" name="nm_nome" required>

            <label for="nm_conta">Nome da conta:</label>
            <input type="text" id="nomeConta" name="nm_conta" required>

            <label for="ds_email">Email:</label>
            <input type="email" id="ds_email" name="ds_email" required>

            <label for="ds_senha">Senha:</label>
            <input type="password" id="senha" name="ds_senha" required>

            <button type="submit">Confirmar</button>
              
              <p>Ja tem uma conta?<p>
              <a class="btn-consultar" href="login.php">Login</a>
        </form>
    </div>
  
</body>
</html>