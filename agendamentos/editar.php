<?php

session_start();

if (!isset($_SESSION["admin_id"])) {

    header("Location: ../admin/login.php");
    exit;

}

include "../conexao.php";

$id = $_GET["id"];


/* Busca o agendamento */

$sql = "SELECT *
        FROM agendamentos
        WHERE id = $1";

$resultado = pg_query_params(
    $conexao,
    $sql,
    array($id)
);

$agendamento = pg_fetch_assoc($resultado);


/* Atualiza o agendamento */

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $servico = $_POST["servico"];
    $data = $_POST["data"];
    $horario = $_POST["horario"];
    $status = $_POST["status"];


    $sql = "UPDATE agendamentos
            SET servico = $1,
                data = $2,
                horario = $3,
                status = $4
            WHERE id = $5";


    pg_query_params(
        $conexao,
        $sql,
        array(
            $servico,
            $data,
            $horario,
            $status,
            $id
        )
    );


    header("Location: index.php");
    exit;

}

?>

<!DOCTYPE html>

<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <title>Editar Agendamento - Sophelle</title>

    <link rel="stylesheet" href="/sophelle/style/style.css">

</head>

<body>

<?php include "../includes/header.php"; ?>

<main>

    <h1>Editar Agendamento</h1>


    <form method="POST">

        <label for="servico">
            Serviço:
        </label>

        <br>

        <select
            id="servico"
            name="servico"
            required
        >

            <option value="Manicure">
                Manicure
            </option>

            <option value="Pedicure">
                Pedicure
            </option>

            <option value="Alongamento">
                Alongamento
            </option>

            <option value="Banho de Gel">
                Banho de Gel
            </option>

            <option value="Nail Art">
                Nail Art
            </option>

        </select>

        <br><br>


        <label for="data">
            Data:
        </label>

        <br>

        <input
            type="date"
            id="data"
            name="data"
            value="<?php echo $agendamento["data"]; ?>"
            required
        >

        <br><br>


        <label for="horario">
            Horário:
        </label>

        <br>

        <input
            type="time"
            id="horario"
            name="horario"
            value="<?php echo substr($agendamento["horario"], 0, 5); ?>"
            required
        >

        <br><br>


        <label for="status">
            Status:
        </label>

        <br>

        <select
            id="status"
            name="status"
            required
        >

            <option value="Pendente">
                Pendente
            </option>

            <option value="Confirmado">
                Confirmado
            </option>

            <option value="Concluído">
                Concluído
            </option>

            <option value="Cancelado">
                Cancelado
            </option>

        </select>

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