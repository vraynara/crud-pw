<?php

session_start();

if (!isset($_SESSION['usuario_logado'])) {
    header("Location: ../login.php");
    exit;
}

require_once "../conexao.php";

$sql = "UPDATE usuarios SET
        nome = :nome,
        email = :email,
        plano = :plano
        WHERE id = :id";

$stmt = $pdo->prepare($sql);

$stmt->execute([
    ':nome' => $_POST['nome'],
    ':email' => $_POST['email'],
    ':plano' => $_POST['plano'],
    ':id' => $_POST['id']
]);

header("Location: index.php");
exit;