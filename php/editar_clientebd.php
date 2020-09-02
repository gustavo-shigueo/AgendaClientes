<?php

    require_once ('conexao/conexao.php');

    $id    = filter_input(INPUT_POST, 'id',    FILTER_SANITIZE_MAGIC_QUOTES);
    $nome  = filter_input(INPUT_POST, 'nome',  FILTER_SANITIZE_MAGIC_QUOTES);
    $fone  = filter_input(INPUT_POST, 'fone',  FILTER_SANITIZE_MAGIC_QUOTES);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_MAGIC_QUOTES);
    $cpf   = filter_input(INPUT_POST, 'cpf',   FILTER_SANITIZE_MAGIC_QUOTES);
    $nasc  = filter_input(INPUT_POST, 'nasc',  FILTER_SANITIZE_MAGIC_QUOTES);
    $obs   = filter_input(INPUT_POST, 'obs',   FILTER_SANITIZE_MAGIC_QUOTES);

    $exec = $conexao -> prepare("UPDATE cliente SET nomeC = :n, telC = :t, CPFC = :c, nascC = :d, emailC = :e, obsC = :o WHERE IDC = :i");
    $dados = array(
        'n' => "$nome", 
        't' => "$fone", 
        'c' => "$cpf", 
        'd' => "$nasc", 
        'e' => "$email", 
        'o' => "$obs",
        'i' => "$id"
    );
    $exec -> execute($dados);

    header("location: visualizar_cliente.php?id=$id");
    exit();

?>