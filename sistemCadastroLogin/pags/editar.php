<?php 
require_once "conexao.php";

$id = $_GET['id'];

$sql = "SELECT * FROM tb_usuario WHERE id= :id";

$stmt = $pdo->prepare($sql);
$stmt->execute(["id" =>$id]);
$usuario = $stmt->fetch(PDO::FETCH_ASSOC)
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>editar <?php $usuario["nm_login"] ?></title>
</head>
<body>
    
</body>
</html>