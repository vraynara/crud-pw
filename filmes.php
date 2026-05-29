<?php

include("conexao.php");

if(isset($_POST['adicionar'])){

    $nome = $_POST['nome'];
    $categoria = $_POST['categoria'];
    $ano = $_POST['ano'];

    $sql = "INSERT INTO filmes(nome, categoria, ano)
            VALUES('$nome', '$categoria', '$ano')";

    $conexao->query($sql);
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Filmes</title>

    <link rel="stylesheet" href="style.css">
</head>
<body class="home-body">

<header class="navbar">
    <h1 class="logo">FILMES</h1>

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

    <h2>CRUD DE FILMES</h2>
        <form method="POST" class="crud-form">

        <input type="text" name="nome" placeholder="Nome do Filme">

        <input type="text" name="categoria" placeholder="Categoria">

        <input type="number" name="ano" placeholder="Ano">

        <div class="buttons">
            <button type="submit" name="adicionar">
                Adicionar
        </button>
    </div>

</form>

    <table>

        <?php

        $sql = "SELECT * FROM filmes";

        $resultado = $conexao->query($sql);

        while($dados = $resultado->fetch_assoc()){

        echo "
        <tr>
            <td>{$dados['nome']}</td>
            <td>{$dados['categoria']}</td>
            <td>{$dados['ano']}</td>
    </tr>
    ";
}

?>

    </table>

</section>

</body>
</html>