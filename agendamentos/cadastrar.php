<?php

session_start();

include "../conexao.php";


if (!isset($_SESSION["cliente_id"])) {

    header("Location: ../clientes/login.php");
    exit;   

}


$cliente_id = $_SESSION["cliente_id"];


/* Verifica se já possui agendamento */

$sql = "SELECT COUNT(*) AS total
        FROM agendamentos
        WHERE cliente_id = $1
        AND status NOT IN ('Cancelado', 'Concluído')";

$resultado = pg_query_params(
    $conexao,
    $sql,
    array($cliente_id)
);

$limite = pg_fetch_assoc($resultado);


if ($limite["total"] >= 1) {

    $bloqueado = true;

} else {

    $bloqueado = false;

}


/* Faz o agendamento */

if (
    $_SERVER["REQUEST_METHOD"] == "POST"
    && !$bloqueado
) {

    $servico = $_POST["servico"];
    $data = $_POST["data"];
    $horario = $_POST["horario"];


    $sql = "INSERT INTO agendamentos
            (cliente_id, servico, data, horario, status)
            VALUES ($1, $2, $3, $4, $5)";


    $resultado_agendamento = pg_query_params(
        $conexao,
        $sql,
        array(
            $cliente_id,
            $servico,
            $data,
            $horario,
            "Pendente"
        )
    );


    if ($resultado_agendamento) {

        header("Location: index.php");
        exit;

    } else {

        $erro = "Não foi possível realizar o agendamento.";

    }

}

?>

<!DOCTYPE html>

<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <title>Agendar - Sophelle</title>

    <link rel="stylesheet" href="/sophelle/style/style.css">

</head>

<body>

<?php include "../includes/header.php"; ?>

<main>

    <h1>Agendar horário</h1>

    <p>
        Olá, <?php echo $_SESSION["cliente_nome"]; ?>!
    </p>


    <?php if ($bloqueado) { ?>

        <p>
            Você já possui um agendamento ativo.
        </p>

        <p>
            Para realizar outro agendamento,
            aguarde a conclusão ou cancelamento.
        </p>


    <?php } else { ?>


        <?php if (isset($erro)) { ?>

            <p>
                <?php echo $erro; ?>
            </p>

        <?php } ?>


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

                <option value="" disabled selected>
                    Selecione um serviço
                </option>

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
                min="<?php echo date('Y-m-d'); ?>"
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
                required
            >


            <br><br>


            <button type="submit">
                Agendar
            </button>


        </form>


    <?php } ?>


    <br>

    <button onclick="history.back()">
        Voltar
    </button>


    <br><br>

    <a href="../clientes/sair.php">
        Sair
    </a>

</main>

<?php include "../includes/footer.php"; ?>

</body>

</html>