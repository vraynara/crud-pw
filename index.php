<?php
session_start();

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
    <title>Netflix Clone</title>

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

<section class="banner">

    <div class="banner-content">

        <h2>Dark</h2>

        <p>
            Quando duas crianças desaparecem em uma pequena cidade alemã,
            segredos familiares e viagens no tempo revelam uma trama
            que atravessa gerações.
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

            <div class="filme-info">
                <h4>Stranger Things</h4>
                <p>
                    Um grupo de amigos enfrenta eventos sobrenaturais após
                    o desaparecimento de um garoto.
                </p>
            </div>

            <h3>Stranger Things</h3>

        </div>

        <div class="card">

            <img src="img/derepente30.jpg">

            <div class="filme-info">
                <h4>De Repente 30</h4>
                <p>
                    Jenna deseja ser adulta e acorda aos 30 anos vivendo
                    a vida dos seus sonhos.
                </p>
            </div>

            <h3>De Repente 30</h3>

        </div>

        <div class="card">

            <img src="https://image.tmdb.org/t/p/w500/7WsyChQLEftFiDOVTGkv3hFpyyt.jpg">

            <div class="filme-info">
                <h4>Vingadores: Ultimato</h4>
                <p>
                    Os heróis restantes unem forças para derrotar Thanos
                    e restaurar o universo.
                </p>
            </div>

            <h3>Vingadores: Ultimato</h3>

        </div>

        <div class="card">

            <img src="img/barbie.jpg">

            <div class="filme-info">
                <h4>Barbie: Escola de Princesas</h4>
                <p>
                    Blair descobre um segredo sobre seu passado ao entrar
                    em uma escola de princesas.
                </p>
            </div>

            <h3>Barbie: Escola de Princesas</h3>

        </div>

        <div class="card">

            <img src="https://image.tmdb.org/t/p/w500/q719jXXEzOoYaps6babgKnONONX.jpg">

            <div class="filme-info">
                <h4>Your Name</h4>
                <p>
                    Dois adolescentes passam a trocar de corpo de forma
                    misteriosa e criam uma conexão especial.
                </p>
            </div>

            <h3>Your Name</h3>

        </div>

    </div>

</section>

<!-- SÉRIES -->

<section class="catalogo">

    <h2>Séries em Alta</h2>

    <div class="filmes-grid">

        <div class="card">

            <img src="img/shadowhunters.jpg">

            <div class="filme-info">
                <h4>Shadowhunters</h4>
                <p>
                    Clary Fray descobre que pertence a uma linhagem de
                    guerreiros que combate demônios.
                </p>
            </div>

            <h3>Shadowhunters</h3>

        </div>

        <div class="card">

            <img src="https://image.tmdb.org/t/p/w500/reEMJA1uzscCbkpeRJeTT2bjqUp.jpg">

            <div class="filme-info">
                <h4>La Casa de Papel</h4>
                <p>
                    um grupo de ladrões liderados pelo “Professor” que planeja grandes assaltos, 
                    principalmente à Casa da Moeda da Espanha, enquanto enfrenta a polícia e conflitos internos.
                </p>
            </div>

            <h3>La Casa de Papel</h3>

        </div>

        <div class="card">

            <img src="https://image.tmdb.org/t/p/w500/9OYu6oDLIidSOocW3JTGtd2Oyqy.jpg">

            <div class="filme-info">
                <h4>The Good Doctor</h4>
                <p>
                    Um jovem médico com autismo utiliza suas habilidades
                    extraordinárias para salvar vidas.
                </p>
            </div>

            <h3>The Good Doctor</h3>

        </div>

        <div class="card">

            <img src="img/manifest.jpg">

            <div class="filme-info">
                <h4>Manifest</h4>
                <p>
                    Passageiros de um voo desaparecido retornam anos depois
                    sem perceber a passagem do tempo.
                </p>
            </div>

            <h3>Manifest</h3>

        </div>

        <div class="card">

            <img src="https://image.tmdb.org/t/p/w500/62HCnUTziyWcpDaBO2i1DX17ljH.jpg">

            <div class="filme-info">
                <h4>Top Gun: Maverick</h4>
                <p>
                    Maverick retorna para treinar uma nova geração de pilotos
                    em uma missão de alto risco.
                </p>
            </div>

            <h3>Top Gun: Maverick</h3>

        </div>

    </div>

</section>

<script>
const cards = document.querySelectorAll(".card");

cards.forEach(card => {

    card.addEventListener("click", () => {

        cards.forEach(c => {
            if(c !== card){
                c.classList.remove("ativo");
            }
        });

        card.classList.toggle("ativo");

    });

});
</script>

</body>
</html>