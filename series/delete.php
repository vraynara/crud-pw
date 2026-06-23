<?php
require_once "../conexao.php";

$id = (int) $_GET['id'];

$sql = "DELETE FROM series WHERE id = :id";

$stmt = $pdo->prepare($sql);

$stmt->execute([
    ':id' => $id
]);

header("Location: index.php");
exit;