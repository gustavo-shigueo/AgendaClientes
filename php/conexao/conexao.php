<?php

    $host = "localhost";
    $user = "root";
    $pass = "";
    $base = "agenda";

    try {

        $conexao = new PDO("mysql:host=$host;dbname=$base", $user, $pass);
        $conexao -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch (PDOException $e) {

        print "Falha na conexão com o banco de dados! " . $e -> getMessage();

    }