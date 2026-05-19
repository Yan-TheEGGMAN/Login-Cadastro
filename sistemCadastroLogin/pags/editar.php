<?php 

require_once "../scripts/protocoloSessao.php";
require_once "../scripts/conexao.php";

$id = $_GET['id'];

$sql = "SELECT * FROM tb_usuario WHERE id= :id";

$stmt = $pdo->prepare($sql);
$stmt->execute(["id" =>$id]);
$usuario = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>editar <?php echo $usuario["nm_login"] ?></title>
    <link rel="stylesheet" href="../css/editar.css">
</head>
<body>
<div class="conteudo-centro">
    <h2>Editar Usuário</h2>

    <!--Formulario de edição-->
    <form action="../scripts/salvarEdicao.php" method="POST">

        <input type="hidden" name="id" value="<?= $usuario['id'] ?>">

        Nome:<br>
        <input type="text" name="nm_usuario"
            value="<?= $usuario['nm_usuario'] ?>" required>
        <br><br>

        Login:<br>
        <input type="text" name="nm_login"
            value="<?= $usuario['nm_login'] ?>" required>
        <br><br>

        Email:<br>
        <input type="email" name="ds_email"
            value="<?= $usuario['ds_email'] ?>" required>
        <br><br>

        Nova senha (opcional):<br>
        <input type="password" name="ds_password">
        <br>
        <small>Preencha apenas se quiser alterar a senha</small>
        <br><br>

        <button type="submit">Salvar Alterações</button>
</div>
</form>
    
</body>
</html>