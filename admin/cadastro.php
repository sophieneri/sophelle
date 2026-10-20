<?php

include "../conexao.php";


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $usuario = $_POST["usuario"];
    $senha = $_POST["senha"];


    $sql = "INSERT INTO admins
            (usuario, senha)
            VALUES ($1, $2)";


    $resultado = pg_query_params(
        $conexao,
        $sql,
        array($usuario, $senha)
    );


    if ($resultado) {

        header("Location: login.php");

        exit;

    } else {

        $erro = "Esse usuário já existe.";

    }
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <title>Criar administrador</title>

    <link rel="stylesheet" href="/sophelle/style/style.css">

</head>

<body>

<main>

    <h1>Criar administrador</h1>


    <?php if (isset($erro)) { ?>

        <p><?php echo $erro; ?></p>

    <?php } ?>


    <form method="POST">

        <label for="usuario">
            Usuário:
        </label>

        <br>

        <input
            type="text"
            id="usuario"
            name="usuario"
            required
        >

        <br><br>


        <label for="senha">
            Senha:
        </label>

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

</main>

</body>

</html>