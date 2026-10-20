<?php

session_start();

if (!isset($_SESSION["admin_id"])) {

    header("Location: ../admin/login.php");
    exit;

}

include "../conexao.php";


$id = $_GET["id"];


/* Exclui o agendamento */

$sql = "DELETE FROM agendamentos
        WHERE id = $1";


pg_query_params(
    $conexao,
    $sql,
    array($id)
);


/* Volta para a lista */

header("Location: index.php");

exit;

?>