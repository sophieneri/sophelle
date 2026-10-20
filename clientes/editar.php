<?php

session_start();

if (!isset($_SESSION["admin_id"])) {

    header("Location: ../admin/login.php");

    exit;

}

include "../conexao.php";


$id = $_GET["id"];


/* Busca o cliente */

$sql = "SELECT *
        FROM clientes
        WHERE id = $1";

$resultado = pg_query_params(
    $conexao,
    $sql,
    array($id)
);

$cliente = pg_fetch_assoc($resultado);


/* Atualiza o cliente */

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nome = $_POST["nome"];

    $telefone = $_POST["telefone"];

    $email = $_POST["email"];


    $sql = "UPDATE clientes

            SET nome = $1,
                telefone = $2,
                email = $3

            WHERE id = $4";


    pg_query_params(
        $conexao,
        $sql,
        array(
            $nome,
            $telefone,
            $email,
            $id
        )
    );


    header("Location: clientes.php");

    exit;

}

?>

<!DOCTYPE html>

<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <title>Editar Cliente - Sophelle</title>

    <link rel="stylesheet" href="/sophelle/style/style.css">

</head>


<body>


<?php include "../includes/header.php"; ?>


<main>

    <h1>Editar Cliente</h1>


    <form method="POST">


        <label for="nome">
            Nome:
        </label>

        <br>

        <input
            type="text"
            id="nome"
            name="nome"
            value="<?php echo $cliente["nome"]; ?>"
            required
        >


        <br><br>


        <label for="telefone">
            Telefone:
        </label>

        <br>

        <input
            type="text"
            id="telefone"
            name="telefone"
            value="<?php echo $cliente["telefone"]; ?>"
            required
        >


        <br><br>


        <label for="email">
            Email:
        </label>

        <br>

        <input
            type="email"
            id="email"
            name="email"
            value="<?php echo $cliente["email"]; ?>"
            required
        >


        <br><br>


        <button type="submit">
            Salvar alterações
        </button>


    </form>


    <br>


    <button onclick="history.back()">
        Voltar
    </button>


</main>


<?php include "../includes/footer.php"; ?>


</body>

</html>