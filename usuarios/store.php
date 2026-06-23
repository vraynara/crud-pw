<?php
require_once "../conexao.php";

$sql = "INSERT INTO usuarios
        (nome,email,senha,plano)
        VALUES
        (:nome,:email,:senha,:plano)";

$stmt = $pdo->prepare($sql);

$stmt->execute([
    ':nome' => $_POST['nome'],
    ':email' => $_POST['email'],
    ':senha' => password_hash($_POST['senha'], PASSWORD_DEFAULT),
    ':plano' => $_POST['plano']
]);

header("Location: index.php");
exit;