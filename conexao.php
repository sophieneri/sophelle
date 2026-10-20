<?php

$conexao = pg_connect(
    "host=192.168.10.40
    dbname=sophelle
    user=sophelle_user
    password=1234"
);

if (!$conexao) {
    die("Erro ao conectar com o banco de dados.");
}

?>