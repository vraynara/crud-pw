<?php
include("conexao.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Séries</title>

    <link rel="stylesheet" href="style.css">
</head>
<body class="home-body">

<header class="navbar">
    <h1 class="logo">SÉRIES</h1>

    <nav>
        <ul class="menu">
            <li><a href="index.php">Home</a></li>
            <li><a href="filmes.php">Filmes</a></li>
            <li><a href="series.php">Séries</a></li>
            <li><a href="usuarios.php">Usuários</a></li>
        </ul>
    </nav>
</header>

<section class="crud-box">

    <h2>CRUD DE SÉRIES</h2>

    <form class="crud-form">

        <input type="text" placeholder="Nome da Série">

        <input type="text" placeholder="Temporadas">

        <input type="text" placeholder="Gênero">

        <div class="buttons">
            <button>Adicionar</button>
            <button>Editar</button>
            <button>Excluir</button>
        </div>

    </form>

    <table>

        <tr>
            <th>Série</th>
            <th>Temporadas</th>
            <th>Gênero</th>
        </tr>

        <tr>
            <td>Elite</td>
            <td>8</td>
            <td>Drama</td>
        </tr>

        <tr>
            <td>Dark</td>
            <td>3</td>
            <td>Ficção</td>
        </tr>

    </table>

</section>

</body>
</html>