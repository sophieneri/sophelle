<?php

session_start();

include "../conexao.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $usuario = $_POST["usuario"];
    $senha = $_POST["senha"];

    $sql = "SELECT *
            FROM admins
            WHERE usuario = $1
            AND senha = $2";

    $resultado = pg_query_params(
        $conexao,
        $sql,
        array($usuario, $senha)
    );

    if ($resultado && pg_num_rows($resultado) > 0) {

        $admin = pg_fetch_assoc($resultado);

        $_SESSION["admin_id"] = $admin["id"];
        $_SESSION["admin_usuario"] = $admin["usuario"];

        header("Location: painel.php");
        exit;

    } else {

        $erro = "Usuário ou senha incorretos.";

    }
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <title>Login Administrativo - Sophelle</title>

    <link rel="stylesheet" href="/sophelle/style/style.css">

</head>

<body>

<?php include "../includes/header.php"; ?>

<main class="login">

    <section class="login-caixa">

        <h1>Área Administrativa</h1>

        <p>
            Entre para gerenciar o sistema da Sophelle.
        </p>

        <?php if (isset($erro)) { ?>

            <p class="erro">
                <?php echo $erro; ?>
            </p>

        <?php } ?>

        <form method="POST">

            <label for="usuario">
                Usuário:
            </label>

            <input
                type="text"
                id="usuario"
                name="usuario"
                placeholder="Digite seu usuário"
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
            Ainda não possui um administrador?
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