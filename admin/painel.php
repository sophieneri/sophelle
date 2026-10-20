<?php

session_start();

if (!isset($_SESSION["admin_id"])) {

    header("Location: login.php");

    exit;

}

?>

<!DOCTYPE html>

<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <title>Painel Administrativo - Sophelle</title>

    <link rel="stylesheet" href="/sophelle/style/style.css">

</head>


<body>


<?php include "../includes/header.php"; ?>


<main>

    <section>

        <h1>Painel Administrativo</h1>

        <p>
            Bem-vindo, <?php echo $_SESSION["admin_usuario"]; ?>!
        </p>

        <p>
            Gerencie os clientes, agendamentos e horários
            da Sophelle por aqui.
        </p>

    </section>


    <section>

        <h2>Gerenciamento</h2>


        <article>

            <h3>Clientes</h3>

            <p>
                Consulte, edite e exclua clientes cadastrados.
            </p>

            <a href="../clientes/clientes.php">
                Gerenciar clientes
            </a>

        </article>


        <br>


        <article>

            <h3>Agendamentos</h3>

            <p>
                Veja e gerencie os horários agendados
                pelos clientes.
            </p>

            <a href="../agendamentos/index.php">
                Gerenciar agendamentos
            </a>

        </article>


        <br>


        <article>

            <h3>Horários</h3>

            <p>
                Consulte os horários de atendimento
                da Sophelle.
            </p>

            <a href="horarios.php">
                Gerenciar horários
            </a>

        </article>

    </section>


    <br>


    <section>

        <h2>Acesso rápido</h2>

        <p>
            <a href="../index.php">
                Voltar para o site
            </a>
        </p>

        <p>
            <a href="sair.php">
                Sair do painel
            </a>
        </p>

    </section>


</main>


<?php include "../includes/footer.php"; ?>


</body>

</html>