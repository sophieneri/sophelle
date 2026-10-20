<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <title>Contato - Sophelle</title>

    <link rel="stylesheet" href="/sophelle/style/style.css">

</head>

<body>

<?php include __DIR__ . "/includes/header.php"; ?>

<main>

    <h1>Entre em contato</h1>

    <section>

        <h2>Fale conosco</h2>

        <p>
            Entre em contato para tirar dúvidas ou agendar
            seu horário.
        </p>

        <p>Telefone: (19) 98201-0352</p>

        <p>Email: sophelle@gmail.com</p>

    </section>


    <section>

        <h2>Horário de atendimento</h2>

        <ul>

            <li>Segunda a sexta: 09:00 às 18:00</li>

            <li>Sábado: 09:00 às 14:00</li>

            <li>Domingo: Fechado</li>

        </ul>

    </section>


    <section>

        <h2>Envie uma mensagem</h2>

        <form>

            <label for="nome">Nome:</label>

            <br>

            <input
                type="text"
                id="nome"
                name="nome"
                placeholder="Digite seu nome"
                required
            >

            <br><br>


            <label for="email">Email:</label>

            <br>

            <input
                type="email"
                id="email"
                name="email"
                placeholder="Digite seu email"
                required
            >

            <br><br>


            <label for="mensagem">Mensagem:</label>

            <br>

            <textarea
                id="mensagem"
                name="mensagem"
                placeholder="Digite sua mensagem"
                required
            ></textarea>

            <br><br>

            <button type="submit">
                Enviar
            </button>

        </form>

    </section>

</main>

<?php include __DIR__ . "/includes/footer.php"; ?>

</body>

</html>