 <?php
        session_start();

        

        if (isset($_SESSION["usuario"])) {
            //libera acesso
        } else {
            header("Location: cadastro.php");
            exit;
        }
    ?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema</title>
<!--Styles-->
    <link rel="stylesheet" href="../css/nav.css">
    <link rel="stylesheet" href="../css/index.css">

<!--Styles-->
</head>
<body>

   
<!--navegador-->
    <nav class="navbar">
        <div class="logo">
            Sistema
        </div>
        <ul class="menu">
            <li>
                <a href="index.php">Home</a>
            </li>
            <li class="dropdown">
                <button class="dropbtn">
                    Conta
                </button>
                <div class="dropdown-content">
                    <p>
                        Usuário:<?php echo $_SESSION["usuario"];?>
                    </p>
                    <form action="../scripts/encerrar.php" method="POST">
                        <button type="submit" class="btn-acao">
                            encerrar sessão
                        </button>
                    </form>
                </div>
            </li>
            <li>
                <a href="gerenciar.php">
                    Gerenciar Usuários
                </a>
            </li>

        </ul>
    </nav>
<!--navegador-->

<div class="welcome-container">
    <div class="welcome-card">
        <img src="../img/rato.gif" alt="Rato" class="rato-img">
        
        <div class="welcome-text">
            <span>bem vindo</span>
            <h1><?php echo htmlspecialchars($_SESSION["usuario"]); ?></h1>
        </div>

        <img src="../img/rato.gif" alt="Rato" class="rato-img">
    </div>
</div>
</body>
</html>