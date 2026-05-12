<?php
    require_once "../scripts/conexao.php";
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <!--Styles-->
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/card.css">
   <!--Styles-->
</head>
<body>
    

    <div class="container">
        <h2>Logar em uma conta</h2>
             

        <form action="../scripts/loginSession.php" method="POST">

            <label for="nm_conta">Nome da conta:</label>
            <input type="text" id="nm_conta" name="nm_conta" required>

            <label for="ds_senha">Senha:</label>
            <input type="password" id="ds_senha" name="ds_senha" required>

            <button type="submit">Confirmar</button>
              
              <p>Não tem uma conta?<p>
              <a class="btn-consultar" href="cadastro.php">Cadastrar</a>
        </form>
    </div>
  
</body>
</html>