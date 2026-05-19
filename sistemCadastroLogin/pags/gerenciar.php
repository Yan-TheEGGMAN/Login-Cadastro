<?php 

require_once "../scripts/protocoloSessao.php";
require_once "../scripts/conexao.php";

//pega informações da database---------------------------------------------------
if ($_SERVER["REQUEST_METHOD"] == "GET") {
try{
    $sql = "SELECT * FROM tb_usuario";
    $stmt = $pdo->query($sql);

    $usuario = $stmt->fetchAll(PDO::FETCH_ASSOC);

    }catch(PDOException $e) {
        echo "Erro ao buscar dados: " . $e->getMessage();
    }
//------------------------------------------------------------------------------
}
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--Styles-->
    <link rel="stylesheet" href="../css/gerenciar.css">
    <link rel="stylesheet" href="../css/nav.css">
    <!--Styles-->

    <title>gerenciar usuarios</title>
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
<h1>invible title</h1>
<h4>mueheheh</h4>               <!--!!!!!!!!!!!!!!!!!!!!A GAMBIARRA ABSOLUTA!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!-->
<h4>mueheheh</h4>

<!--arêa de busca-->
<div class="container">
    <h2>Consulta de Cadastros</h2>
    
    <form action="" method="GET" class="form-busca">
        <label for="tipo_busca">Buscar por:</label>
        <select name="tipo_busca" id="tipo_busca">
            <option value="id">Buscar por ID</option>
            <option value="nome">Buscar por Nome</option>
        </select>

        <label for="valor_busca">Digite o valor:</label>
        <input type="text" name="valor_busca" id="valor_busca" placeholder="Digite aqui...">

        <button type="submit">Buscar</button>
    </form>
</div>
<!---->

<table>
<thead>
    <!--cabeça-->
        <tr>
            <th>ID</th>
            <th>Nome de Usuário</th>
            <th>Login</th>
            <th>E-mail</th>
        </tr>
    </thead>

    <!--corpo-->
    <tbody>
        <?php foreach( $usuario as $usuario):?>
            <tr>
                <td><?= $usuario["id"]?>
                <td><?=htmlspecialchars($usuario['nm_usuario'])?></td>
                <td><?=htmlspecialchars($usuario['nm_login'])?></td>
                <td><?=htmlspecialchars($usuario['ds_email'])?></td>
                <td><a href="editar.php?id=<?= $usuario['id'] ?>" class="btn-editar">Editar</a></td>
            </tr>
        <?php endforeach?>
    </tbody>

</table>
</body>
</html>