<?php

session_start();

include "../conexao.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST["email"];
    $senha = $_POST["senha"];

    $sql = "SELECT *
            FROM clientes
            WHERE email = $1
            AND senha = $2";

    $resultado = pg_query_params(
        $conexao,
        $sql,
        array($email, $senha)
    );

    if ($resultado && pg_num_rows($resultado) > 0) {

        $cliente = pg_fetch_assoc($resultado);

        $_SESSION["cliente_id"] = $cliente["id"];
        $_SESSION["cliente_nome"] = $cliente["nome"];

        header("Location: ../agendamentos/cadastrar.php");
        exit;

    } else {

        $erro = "Email ou senha incorretos.";

    }
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <title>Login - Sophelle</title>

    <link rel="stylesheet" href="/sophelle/style/style.css">

</head>

<body>

<?php include "../includes/header.php"; ?>

<main class="login">

    <section class="login-caixa">

        <h1>Entrar na sua conta</h1>

        <p>
            Acesse sua conta para agendar seu horário.
        </p>

        <?php if (isset($erro)) { ?>

            <p class="erro">
                <?php echo $erro; ?>
            </p>

        <?php } ?>

        <form method="POST">

            <label for="email">
                Email:
            </label>

            <input
                type="email"
                id="email"
                name="email"
                placeholder="Digite seu email"
                required
            >

            <label for="senha">
                Senha:
            </label>

            <input
                type="password"
                id="senha"
                name="senha"
                placeholder="Digite sua senha"
                required
            >

            <button type="submit">
                Entrar
            </button>

        </form>

        <p>
            Ainda não possui uma conta?
            <a href="cadastro.php">Criar conta</a>
        </p>

        <a href="../index.php">
            Voltar para o início
        </a>

    </section>

</main>

<?php include "../includes/footer.php"; ?>

</body>

</html>