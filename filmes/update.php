<?php

session_start();

if (!isset($_SESSION['usuario_logado'])) {
    header("Location: ../login.php");
    exit;
}

require_once "../conexao.php";

$sql = "UPDATE filmes SET
        nome = :nome,
        categoria = :categoria,
        ano = :ano
        WHERE id = :id";

$stmt = $pdo->prepare($sql);

$stmt->execute([
    ':nome' => $_POST['nome'],
    ':categoria' => $_POST['categoria'],
    ':ano' => $_POST['ano'],
    ':id' => $_POST['id']
]);

header("Location: index.php");
exit;