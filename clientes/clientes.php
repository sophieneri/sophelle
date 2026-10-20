<?php

session_start();


if (!isset($_SESSION["admin_id"])) {

    header("Location: ../admin/login.php");

    exit;
}


include "../conexao.php";


$sql = "SELECT *
        FROM clientes
        ORDER BY id";


$resultado = pg_query($conexao, $sql);

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <title>Clientes - Sophelle</title>

    <link rel="stylesheet" href="/sophelle/style/style.css">

</head>

<body>

<main>

    <h1>Clientes</h1>


    <a href="../admin/painel.php">
        Voltar ao painel
    </a>

    <br><br>


    <table>

        <tr>

            <th>ID</th>

            <th>Nome</th>

            <th>Telefone</th>

            <th>Email</th>

            <th>Ações</th>

        </tr>


        <?php while ($cliente = pg_fetch_assoc($resultado)) { ?>

        <tr>

            <td>
                <?php echo $cliente["id"]; ?>
            </td>

            <td>
                <?php echo $cliente["nome"]; ?>
            </td>

            <td>
                <?php echo $cliente["telefone"]; ?>
            </td>

            <td>
                <?php echo $cliente["email"]; ?>
            </td>

            <td>

                <a href="editar.php?id=<?php echo $cliente["id"]; ?>">
                    Editar
                </a>

                |

                <a href="excluir.php?id=<?php echo $cliente["id"]; ?>">
                    Excluir
                </a>

            </td>

        </tr>

        <?php } ?>

    </table>

</main>

</body>

</html>