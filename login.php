<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login</title>

    <link rel="stylesheet" href="style.css">

    <style>
        body{
            background-image: url('img/fundo.png');
            background-size: cover;
            background-position: center;
        }
    </style>

</head>

<body class="login-body">

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        if (!empty($email) && !empty($senha)) {
            header("Location: index.php");
            exit;
        }
    }
    ?>

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