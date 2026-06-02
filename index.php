<?php
session_start();

// Se NÃO existir a sessão, manda o usuário de volta para o login
if (!isset($_SESSION['usuario_logado'])) {
    header("Location: login.php"); 
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Inicio</title>

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
            </ul>
        </nav>

    </header>

    <section class="banner">

        <div class="banner-content">
   <!-- nome do filme ou serie -->

            <h2>Missão Impossível:O Acerto Final</h2>
            <p>
                Mistério, ficção científica e suspense em uma das séries
                mais famosas da Netflix.
            </p>

            <button>Assistir</button>

        </div>

    </section>

    <!-- FILMES -->
    <section class="catalogo">

        <h2>Populares na Netflix</h2>

        <div class="filmes-grid">

            <div class="card">
                <img src="https://image.tmdb.org/t/p/w500/56v2KjBlU4XaOv9rVYEQypROD7P.jpg">
                <h3>Stranger Things</h3>
            </div>

            <div class="card">
                <img src="img/derepente30.jpg">
                <h3>De Repente 30</h3>
            </div>

            <div class="card">
                <img src="https://image.tmdb.org/t/p/w500/7WsyChQLEftFiDOVTGkv3hFpyyt.jpg">
                <h3>Vingadores: Ultimato</h3>
            </div>

            <div class="card">
                <img src="img/barbie.jpg">
                <h3>Barbie:Escola de princesas</h3>
            </div>

            <div class="card">
                <img src="https://image.tmdb.org/t/p/w500/q719jXXEzOoYaps6babgKnONONX.jpg">
                <h3>Your Name</h3>
            </div>

        </div>

    </section>

    <!-- SERIES -->
    <section class="catalogo">

        <h2>Séries em Alta</h2>

        <div class="filmes-grid">

            <div class="card">
                <img src="img/shadowhunters.jpg">
                <h3>Shadowhunters:caçadores das sombras </h3>
            </div>

            <div class="card">
                <img src="https://image.tmdb.org/t/p/w500/reEMJA1uzscCbkpeRJeTT2bjqUp.jpg">
                <h3>Breaking Bad</h3>
            </div>

            <div class="card">
                <img src="https://image.tmdb.org/t/p/w500/9OYu6oDLIidSOocW3JTGtd2Oyqy.jpg">
                <h3>The Good Doctor: O Bom Doutor</h3>
            </div>

            <div class="card">
                <img src="img/manifest.jpg">
                <h3>Manifest</h3>
            </div>

            <div class="card">
                <img src="https://image.tmdb.org/t/p/w500/62HCnUTziyWcpDaBO2i1DX17ljH.jpg">
                <h3> Top Gun: Maverick</h3>
            </div>

        </div>

    </section>

</body>
</html>