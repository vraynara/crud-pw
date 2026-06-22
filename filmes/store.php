<?php

session_start();

if (!isset($_SESSION['usuario_logado'])) {
    header("Location: ../login.php");
    exit;
}

require_once "../conexao.php";

$sql = "INSERT INTO filmes
        (nome,categoria,ano)
        VALUES
        (:nome,:categoria,:ano)";

$stmt = $pdo->prepare($sql);

$stmt->execute([
    ':nome' => $_POST['nome'],
    ':categoria' => $_POST['categoria'],
    ':ano' => $_POST['ano']
]);

header("Location: index.php");
exit;