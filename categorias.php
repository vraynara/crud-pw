<?php
// OBRIGATÓRIO: Inicia o sistema de sessões para validar o usuário
session_start();

// SE NÃO existir o crachá do usuário logado, manda ele direto de volta para o login
if (!isset($_SESSION['usuario_logado'])) {
    header("Location: login.php"); // Altere aqui se o seu arquivo tiver outro nome (ex: index.php de login)
    exit;
}

include("conexao.php");

if (isset($_POST['salvar'])) {
    // É uma boa prática limpar o texto recebido para evitar erros de sintaxe no banco
    $nome = mysqli_real_escape_string($conn, $_POST['nome']);
    
    // Deixando a query em uma linha única e legível
    $sql = "INSERT INTO categorias (nome) VALUES ('$nome')";
    
    // Executa e verifica se deu certo
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Categoria salva com sucesso!');</script>";
    } else {
        echo "<script>alert('Erro ao salvar: " . mysqli_error($conn) . "');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Categorias</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div style="padding: 10px; background: #222; margin-bottom: 20px;">
        <a href="index.php" style="color: white; margin-right: 15px; text-decoration: none;">🏠 Voltar ao Catálogo</a>
        <a href="sair.php" style="color: #ff4444; text-decoration: none;">🚪 Sair</a>
    </div>

    <h1>CRUD Categorias</h1>

    <form method="POST">
        <input type="text" name="nome" placeholder="Categoria" required>
        <button name="salvar">Salvar</button>
    </form>

    <hr>

    <div class="categorias-lista">
        <?php
        $sql = "SELECT * FROM categorias ORDER BY id DESC";
        $resultado = mysqli_query($conn, $sql);

        while($dados = mysqli_fetch_assoc($resultado)){
            echo "
            <div class='card'>
                <h3>".$dados['nome']."</h3>
            </div>
            ";
        }
        ?>
    </div>

</body>
</html>