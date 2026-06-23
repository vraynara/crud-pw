<?php
require_once "../conexao.php";

$sql = "UPDATE series SET
        nome = :nome,
        temporadas = :temporadas,
        genero = :genero
        WHERE id = :id";

$stmt = $pdo->prepare($sql);

$stmt->execute([
    ':nome' => $_POST['nome'],
    ':temporadas' => $_POST['temporadas'],
    ':genero' => $_POST['genero'],
    ':id' => $_POST['id']
]);

header("Location: index.php");
exit;