<?php

session_start();

if (!isset($_SESSION["admin_id"])) {

    header("Location: login.php");

    exit;

}

include "../conexao.php";


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $data = $_POST["data"];
    $horario = $_POST["horario"];

    $sql = "INSERT INTO horarios_disponiveis
            (data, horario, disponivel)
            VALUES ($1, $2, TRUE)";

    pg_query_params(
        $conexao,
        $sql,
        array($data, $horario)
    );
}


$sql = "SELECT *
        FROM horarios_disponiveis
        WHERE data >= CURRENT_DATE
        ORDER BY data, horario";

$resultado = pg_query($conexao, $sql);

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <title>Horários - Sophelle</title>

    <link rel="stylesheet" href="/sophelle/style/style.css">

</head>

<body>

<?php include "../includes/header.php"; ?>

<main>

    <section>

        <h1>Horários de atendimento</h1>

        <p>
            Cadastre os horários disponíveis para atendimento.
        </p>

    </section>


    <section>

        <h2>Cadastrar horário</h2>

        <form method="POST">

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
                Adicionar horário
            </button>

        </form>

    </section>


    <section>

        <h2>Horários cadastrados</h2>

        <table>

            <tr>

                <th>Data</th>

                <th>Horário</th>

                <th>Status</th>

            </tr>


            <?php while ($horario = pg_fetch_assoc($resultado)) { ?>

                <tr>

                    <td>
                        <?php
                        echo date(
                            "d/m/Y",
                            strtotime($horario["data"])
                        );
                        ?>
                    </td>

                    <td>
                        <?php
                        echo substr(
                            $horario["horario"],
                            0,
                            5
                        );
                        ?>
                    </td>

                    <td>

                        <?php

                        if ($horario["disponivel"] == "t") {

                            echo "Disponível";

                        } else {

                            echo "Agendado";

                        }

                        ?>

                    </td>

                </tr>

            <?php } ?>

        </table>

    </section>


    <br>

    <button onclick="history.back()">
        Voltar
    </button>

</main>

<?php include "../includes/footer.php"; ?>

</body>

</html>