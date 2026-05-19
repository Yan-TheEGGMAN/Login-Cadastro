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
   <!--Styles-->
</head>
<body>

    <?php if (isset(($_GET['erro'])) && $_GET['erro'] == "expirado"){?>
        <div class="alerta-erro">
        <span class="icone-alerta">⚠️</span>
        <div class="texto-alerta">
            <strong>Sessão Expirada!</strong>
            <p>Por motivos de segurança, sua sessão foi encerrada por inatividade. Faça login novamente.</p>
        </div>
    </div>
<?php
} // Fecha o IF aqui
?>
    

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