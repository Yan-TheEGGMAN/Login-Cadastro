<?php
require_once "conexao.php";

$id     = $_POST['id'];
$nome   = $_POST['nm_usuario'];
$login  = $_POST['nm_login'];
$email  = $_POST['ds_email'];
$senha  = $_POST['ds_password'];


// 🔹 Se NÃO digitou nova senha
if(empty($senha)) {

    $sql = "UPDATE tb_usuario 
            SET nm_usuario = :nome,
                nm_login   = :login,
                ds_email   = :email
            WHERE id = :id";

    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':nome',  $nome,  PDO::PARAM_STR);
    $stmt->bindParam(':login', $login, PDO::PARAM_STR);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':id',    $id,    PDO::PARAM_INT);

    $stmt->execute();

}else{ // Se digitou a senha
    $sql = "UPDATE tb_usuario 
            SET nm_usuario = :nome,
                nm_login   = :login,
                ds_email   = :email,
                ds_senha   = :senha
            WHERE id = :id";

    $stmt = $pdo->prepare($sql);

    $hash = password_hash($senha, PASSWORD_DEFAULT);

    $stmt->bindParam(':nome',  $nome,  PDO::PARAM_STR);
    $stmt->bindParam(':login', $login, PDO::PARAM_STR);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':senha', $hash,  PDO::PARAM_STR);
    $stmt->bindParam(':id',    $id,    PDO::PARAM_INT);

    $stmt->execute();
    
}

    header("Location: ../pags/gerenciar.php");
    exit;
?>