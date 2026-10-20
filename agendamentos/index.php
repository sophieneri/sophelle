<?php

session_start();

include "../conexao.php";


$sql = "SELECT
            agendamentos.id,
            clientes.nome AS cliente_nome,
            agendamentos.servico,
            agendamentos.data,
            agendamentos.horario,
            agendamentos.status

        FROM agendamentos

        INNER JOIN clientes
        ON agendamentos.cliente_id = clientes.id

        ORDER BY
            agendamentos.data,
            agendamentos.horario";


$resultado = pg_query($conexao, $sql);


if (!$resultado) {

    die(
        "Erro ao consultar os agendamentos: "
        . pg_last_error($conexao)
    );

}

?>

<!DOCTYPE html>

<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <title>Agendamentos - Sophelle</title>

    <link rel="stylesheet" href="/sophelle/style/style.css">

</head>


<body>


<?php include "../includes/header.php"; ?>


<main>

    <h1>Agendamentos</h1>


    <p>
        Confira os horários agendados.
    </p>


    <table>

        <tr>

            <th>Cliente</th>

            <th>Data</th>

            <th>Horário</th>

            <th>Serviço</th>

            <th>Status</th>

            <?php if (isset($_SESSION["admin_id"])) { ?>

                <th>Ações</th>

            <?php } ?>

        </tr>


        <?php while ($agendamento = pg_fetch_assoc($resultado)) { ?>

            <tr>

                <td>
                    <?php
                    echo $agendamento["cliente_nome"];
                    ?>
                </td>


                <td>

                    <?php

                    echo date(
                        "d/m/Y",
                        strtotime(
                            $agendamento["data"]
                        )
                    );

                    ?>

                </td>


                <td>

                    <?php

                    echo substr(
                        $agendamento["horario"],
                        0,
                        5
                    );

                    ?>

                </td>


                <td>

                    <?php
                    echo $agendamento["servico"];
                    ?>

                </td>


                <td>

                    <?php
                    echo $agendamento["status"];
                    ?>

                </td>


                <?php if (isset($_SESSION["admin_id"])) { ?>

                    <td>

                        <a
                            href="editar.php?id=<?php echo $agendamento["id"]; ?>"
                        >
                            Editar
                        </a>

                        |

                        <a
                            href="excluir.php?id=<?php echo $agendamento["id"]; ?>"
                        >
                            Excluir
                        </a>

                    </td>

                <?php } ?>

            </tr>

        <?php } ?>

    </table>


    <br>


    <button onclick="history.back()">
        Voltar
    </button>


</main>


<?php include "../includes/footer.php"; ?>


</body>

</html>