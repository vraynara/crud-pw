<?php
session_start();

if (!isset($_SESSION['usuario_logado'])) {
    header("Location: login.php");
    exit;
}

require_once "conexao.php";

/* CADASTRAR */

if(isset($_POST['cadastrar'])){

    $sql = "INSERT INTO categorias(nome)
            VALUES(:nome)";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        ':nome' => $_POST['nome']
    ]);

    header("Location: categorias.php");
    exit;
}

/* EXCLUIR */

if(isset($_GET['excluir'])){

    $id = (int)$_GET['excluir'];

    $sql = "DELETE FROM categorias
            WHERE id = :id";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        ':id' => $id
    ]);

    header("Location: categorias.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorias</title>

    <link rel="stylesheet" href="style.css">
</head>

<body class="home-body">

<header class="navbar">

    <h1 class="logo">NETFLIX</h1>

    <nav>
        <ul class="menu">
            <li><a href="index.php">Home</a></li>
            <li><a href="filmes.php">Filmes</a></li>
            <li><a href="series.php">Séries</a></li>
            <li><a href="usuarios.php">Usuários</a></li>
            <li><a href="categorias.php">Categorias</a></li>
            <li><a href="sair.php">Sair</a></li>
        </ul>
    </nav>

</header>

<div class="crud-box">

    <h2>Cadastro de Categorias</h2>

    <form method="POST" class="crud-form">

        <input
            type="text"
            name="nome"
            placeholder="Nome da Categoria"
            required
        >

        <div class="buttons">
            <button type="submit" name="cadastrar">
                Cadastrar
            </button>
        </div>

    </form>

    <table>

        <tr>
            <th>ID</th>
            <th>Categoria</th>
            <th>Ações</th>
        </tr>

        <?php

        $sql = "SELECT * FROM categorias ORDER BY id DESC";

        $stmt = $pdo->query($sql);

        while($categoria = $stmt->fetch(PDO::FETCH_ASSOC)){

        ?>

        <tr>

            <td><?= $categoria['id'] ?></td>

            <td><?= $categoria['nome'] ?></td>

            <td>

                <a
                    href="categorias.php?excluir=<?= $categoria['id'] ?>"
                    onclick="return confirm('Excluir categoria?')">
                    Excluir
                </a>

            </td>

        </tr>

        <?php } ?>

    </table>

</div>

</body>
</html>