<?php

include "../conexao.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nome = $_POST["nome"];
    $telefone = $_POST["telefone"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    $sql = "INSERT INTO clientes
            (nome, telefone, email, senha)
            VALUES ($1, $2, $3, $4)";

    $resultado = pg_query_params(
        $conexao,
        $sql,
        array($nome, $telefone, $email, $senha)
    );

    if ($resultado) {

        header("Location: login.php");
        exit;

    } else {

        $erro = "Esse email já está cadastrado.";

    }
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <title>Cadastro - Sophelle</title>

    <link rel="stylesheet" href="/sophelle/style/style.css">

</head>

<body>

<main>

    <h1>Criar conta</h1>

    <?php if (isset($erro)) { ?>

        <p><?php echo $erro; ?></p>

    <?php } ?>

    <form method="POST">

        <label for="nome">Nome:</label>

        <br>

        <input
            type="text"
            id="nome"
            name="nome"
            required
        >

        <br><br>


        <label for="telefone">Telefone:</label>

        <br>

        <input
            type="text"
            id="telefone"
            name="telefone"
            placeholder="(00) 00000-0000"
            required
        >

        <br><br>


        <label for="email">Email:</label>

        <br>

        <input
            type="email"
            id="email"
            name="email"
            required
        >

        <br><br>


        <label for="senha">Senha:</label>

        <br>

        <input
            type="password"
            id="senha"
            name="senha"
            required
        >

        <br><br>


        <button type="submit">
            Criar conta
        </button>

    </form>


    <br>

    <a href="login.php">
        Já tenho uma conta
    </a>

</main>

</body>

</html>