<?php
include("conexao.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>

    <link rel="stylesheet" href="style.css">
</head>
<body class="home-body">

<header class="navbar">
    <h1 class="logo">USUÁRIOS</h1>

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

    <h2>Se Inscreva</h2>

    <form class="crud-form">

        <input type="text" placeholder="Nome">

        <input type="email" placeholder="Email">

        <input type="password" placeholder="Senha">

        <div class="buttons">
            <button>Adicionar</button>
            <button>Editar</button>
            <button>Excluir</button>
        </div>

    </form>

    <table>

        <tr>
            <th>Nome</th>
            <th>Email</th>
            <th>Plano</th>
        </tr>

        <tr>
            <td>Raynara</td>
            <td>ray@gmail.com</td>
            <td>Premium</td>
        </tr>

        <tr>
            <td>Maria</td>
            <td>maria@gmail.com</td>
            <td>Padrão</td>
        </tr>

    </table>

</section>

</body>
</html>