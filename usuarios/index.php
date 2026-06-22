<?php
session_start();

if (!isset($_SESSION['usuario_logado'])) {
    header("Location: ../login.php");
    exit;
}

require_once "../conexao.php";

$editando = false;
$dados = [];

/* CARREGAR DADOS PARA EDIÇÃO */

if (isset($_GET['editar'])) {

    $editando = true;

    $id = (int) $_GET['editar'];

    $sql = "SELECT * FROM usuarios WHERE id = :id";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        ':id' => $id
    ]);

    $dados = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuários</title>

    <link rel="stylesheet" href="../style.css">
</head>

<body class="home-body">

<header class="navbar">

    <h1 class="logo">NETFLIX</h1>

    <nav>
            <ul class="menu">
            <li><a href="../index.php">Home</a></li>
            <li><a href="index.php">Filmes</a></li>
            <li><a href="../series/index.php">Séries</a></li>
            <li><a href="../usuarios/index.php">Usuários</a></li>
            <li><a href="../sair.php">Sair</a></li>
        </ul>
    </nav>

</header>

<div class="crud-box">

    <h2>Cadastro de Usuários</h2>

    <form
        method="POST"
        action="<?= $editando ? 'update.php' : 'store.php' ?>"
        class="crud-form">

        <?php if($editando): ?>
            <input
                type="hidden"
                name="id"
                value="<?= $dados['id'] ?>">
        <?php endif; ?>

        <input
            type="text"
            name="nome"
            placeholder="Nome"
            value="<?= $editando ? $dados['nome'] : '' ?>"
            required>

        <input
            type="email"
            name="email"
            placeholder="Email"
            value="<?= $editando ? $dados['email'] : '' ?>"
            required>

        <?php if(!$editando): ?>
        <input
            type="password"
            name="senha"
            placeholder="Senha"
            required>
        <?php endif; ?>

        <input
            type="text"
            name="plano"
            placeholder="Plano"
            value="<?= $editando ? $dados['plano'] : '' ?>"
            required>

        <div class="buttons">

            <?php if($editando): ?>

                <button type="submit">
                    Atualizar
                </button>

            <?php else: ?>

                <button type="submit">
                    Cadastrar
                </button>

            <?php endif; ?>

        </div>

    </form>

    <table>

        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Plano</th>
            <th>Ações</th>
        </tr>

        <?php

        $sql = "SELECT * FROM usuarios ORDER BY id DESC";

        $stmt = $pdo->query($sql);

        while($usuario = $stmt->fetch(PDO::FETCH_ASSOC)){

        ?>

        <tr>

            <td><?= $usuario['id'] ?></td>
            <td><?= $usuario['nome'] ?></td>
            <td><?= $usuario['email'] ?></td>
            <td><?= $usuario['plano'] ?></td>

            <td>

                <a href="index.php?editar=<?= $usuario['id'] ?>">
                    Editar
                </a>

                |

                <a
                    href="delete.php?id=<?= $usuario['id'] ?>"
                    onclick="return confirm('Excluir usuário?')">
                    Excluir
                </a>

            </td>

        </tr>

        <?php } ?>

    </table>

</div>

</body>
</html>