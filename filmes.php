<?php
session_start();

if (!isset($_SESSION['usuario_logado'])) {
    header("Location: login.php");
    exit;
}

require_once "conexao.php";

$editando = false;
$dados = [];

/* CARREGAR DADOS PARA EDIÇÃO */

if (isset($_GET['editar'])) {

    $editando = true;

    $id = (int) $_GET['editar'];

    $sql = "SELECT * FROM filmes WHERE id = :id";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        ':id' => $id
    ]);

    $dados = $stmt->fetch(PDO::FETCH_ASSOC);
}

/* CADASTRAR */

if (isset($_POST['cadastrar'])) {

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

    header("Location: filmes.php");
    exit;
}

/* ATUALIZAR */

if (isset($_POST['atualizar'])) {

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

    header("Location: filmes.php");
    exit;
}

/* EXCLUIR */

if (isset($_GET['excluir'])) {

    $id = (int) $_GET['excluir'];

    $sql = "DELETE FROM filmes WHERE id = :id";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        ':id' => $id
    ]);

    header("Location: filmes.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filmes</title>

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
            <li><a href="sair.php">Sair</a></li>
        </ul>
    </nav>

</header>

<div class="crud-box">

    <h2>Cadastro de Filmes</h2>

    <form method="POST" class="crud-form">

        <?php if($editando): ?>
            <input
                type="hidden"
                name="id"
                value="<?= $dados['id'] ?>"
            >
        <?php endif; ?>

        <input
            type="text"
            name="nome"
            placeholder="Nome do Filme"
            value="<?= $editando ? $dados['nome'] : '' ?>"
            required
        >

        <input
            type="text"
            name="categoria"
            placeholder="Categoria"
            value="<?= $editando ? $dados['categoria'] : '' ?>"
            required
        >

        <input
            type="number"
            name="ano"
            placeholder="Ano"
            value="<?= $editando ? $dados['ano'] : '' ?>"
            required
        >

        <div class="buttons">

            <?php if($editando): ?>

                <button type="submit" name="atualizar">
                    Atualizar
                </button>

            <?php else: ?>

                <button type="submit" name="cadastrar">
                    Cadastrar
                </button>

            <?php endif; ?>

        </div>

    </form>

    <table>

        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Categoria</th>
            <th>Ano</th>
            <th>Ações</th>
        </tr>

        <?php

        $sql = "SELECT * FROM filmes ORDER BY id DESC";

        $stmt = $pdo->query($sql);

        while($filme = $stmt->fetch(PDO::FETCH_ASSOC)){

        ?>

        <tr>

            <td><?= $filme['id'] ?></td>
            <td><?= $filme['nome'] ?></td>
            <td><?= $filme['categoria'] ?></td>
            <td><?= $filme['ano'] ?></td>

            <td>

                <a href="filmes.php?editar=<?= $filme['id'] ?>">
                    Editar
                </a>

                |

                <a
                    href="filmes.php?excluir=<?= $filme['id'] ?>"
                    onclick="return confirm('Excluir filme?')">
                    Excluir
                </a>

            </td>

        </tr>

        <?php } ?>

    </table>

</div>

</body>
</html>