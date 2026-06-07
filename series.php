```php
<?php
session_start();

if (!isset($_SESSION['usuario_logado'])) {
    header("Location: login.php");
    exit;
}

require_once "conexao.php";


$editando = false;
$dados = [];

/* EDITAR */

if (isset($_GET['editar'])) {

    $editando = true;

    $id = (int) $_GET['editar'];

    $sql = "SELECT * FROM series WHERE id = :id";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        ':id' => $id
    ]);

    $dados = $stmt->fetch(PDO::FETCH_ASSOC);
}

/* CADASTRAR */

if (isset($_POST['cadastrar'])) {

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

    header("Location: series.php");
    exit;
}

/* ATUALIZAR */

if (isset($_POST['atualizar'])) {

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

    header("Location: series.php");
    exit;
}

/* EXCLUIR */

if (isset($_GET['excluir'])) {

    $id = (int) $_GET['excluir'];

    $sql = "DELETE FROM series WHERE id = :id";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        ':id' => $id
    ]);

    header("Location: series.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Séries</title>

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

    <h2>Cadastro de Séries</h2>

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
            placeholder="Nome da Série"
            value="<?= $editando ? $dados['nome'] : '' ?>"
            required
        >

        <input
            type="number"
            name="temporadas"
            placeholder="Temporadas"
            value="<?= $editando ? $dados['temporadas'] : '' ?>"
            required
        >

        <input
            type="text"
            name="genero"
            placeholder="Gênero"
            value="<?= $editando ? $dados['genero'] : '' ?>"
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
            <th>Temporadas</th>
            <th>Gênero</th>
            <th>Ações</th>
        </tr>

        <?php

        $sql = "SELECT * FROM series ORDER BY id DESC";

        $stmt = $pdo->query($sql);

        while($serie = $stmt->fetch(PDO::FETCH_ASSOC)){

        ?>

        <tr>

            <td><?= $serie['id'] ?></td>
            <td><?= $serie['nome'] ?></td>
            <td><?= $serie['temporadas'] ?></td>
            <td><?= $serie['genero'] ?></td>

            <td>

                <a href="series.php?editar=<?= $serie['id'] ?>">
                    Editar
                </a>

                |

                <a
                    href="series.php?excluir=<?= $serie['id'] ?>"
                    onclick="return confirm('Excluir série?')">
                    Excluir
                </a>

            </td>

        </tr>

        <?php } ?>

    </table>

</div>

</body>
</html>