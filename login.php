<?php
// OBRIGATÓRIO: Iniciar a sessão sempre na PRIMEIRA linha do arquivo, antes de qualquer HTML
session_start();

// Se o usuário já estiver logado e tentar entrar na página de login, 
// nós mandamos ele direto para o index.php
if (isset($_SESSION['usuario_logado'])) {
    header("Location: index.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    if (!empty($email) && !empty($senha)) {
        // [OPCIONAL] Aqui depois você pode colocar a verificação do banco de dados.
        // Por enquanto, qualquer e-mail e senha vão dar acesso.
        
        // Criamos o "crachá" do usuário na sessão
        $_SESSION['usuario_logado'] = $email;

        // Redireciona para a página principal protegida
        header("Location: index.php");
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login</title>

    <link rel="stylesheet" href="style.css">

    <style>
    body{
        margin: 0;
        min-height: 100vh;

        background-image: url("img/fundo.png");
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center center;
        background-attachment: fixed;
    }
    </style>
</head>

<body class="login-body">

    <div class="login-container">

        <form action="" method="POST" class="login-box">

            <h1>Login</h1>

            <div class="input-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" placeholder="Digite seu email" required>
            </div>

            <div class="input-group">
                <label for="senha">Senha</label>
                <input type="password" name="senha" id="senha" placeholder="Digite sua senha" required>
            </div>

            <button type="submit" class="btn-entrar">Entrar</button>

        </form>

    </div>

</body>
</html>