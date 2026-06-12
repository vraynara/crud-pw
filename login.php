<?php
session_start();
require "conexao.php";

if (isset($_SESSION['usuario_logado'])) {
    header("Location: index.php");
    exit;
}

$erro = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    if (!empty($email) && !empty($senha)) {

        $sql = "SELECT * FROM login WHERE email = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$email]);

        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        // 🔥 SEM HASH (comparação direta)
        if ($usuario && $senha === $usuario['senha']) {

            $_SESSION['usuario_logado'] = $usuario['email'];

            header("Location: index.php");
            exit;

        } else {
            $erro = "Email ou senha inválidos!";
        }
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
    <?php if 
        (isset($erro)) { echo "<p style='color:red;'>$erro</p>"; } 
        ?> 

</body>
</html>