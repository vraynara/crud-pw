<?php
require_once "../conexao.php";

$sql = "INSERT INTO series
        (nome,temporadas,genero)
        VALUES
        (:nome,:temporadas,:genero)";

$stmt = $pdo->prepare($sql);

$stmt->execute([
    ':nome' => $_POST['nome'],
    ':temporadas' => $_POST['temporadas'],
    ':genero' => $_POST['genero']
]);

header("Location: index.php");
exit;