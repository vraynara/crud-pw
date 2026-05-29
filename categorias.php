<?php
include("conexao.php");

if(isset($_POST['salvar'])){

    $nome = $_POST['nome'];

    mysqli_query($conn,
    "INSERT INTO categorias(nome)
    VALUES('$nome')");
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Categorias</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<h1>CRUD Categorias</h1>

<form method="POST">

    <input type="text"
    name="nome"
    placeholder="Categoria">

    <button name="salvar">
        Salvar
    </button>

</form>

<hr>

<?php

$sql = "SELECT * FROM categorias";

$resultado = mysqli_query($conn, $sql);

while($dados = mysqli_fetch_assoc($resultado)){

    echo "
    <div class='card'>

        <h3>".$dados['nome']."</h3>

    </div>
    ";
}

?>

</body>
</html>