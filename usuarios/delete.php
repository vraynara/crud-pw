<?php

session_start();

if (!isset($_SESSION['usuario_logado'])) {
    header("Location: ../login.php");
    exit;
}

require_once "../conexao.php";

$id = (int) $_GET['id'];

$sql = "DELETE FROM usuarios WHERE id = :id";

$stmt = $pdo->prepare($sql);

$stmt->execute([
    ':id' => $id
]);

header("Location: index.php");
exit;