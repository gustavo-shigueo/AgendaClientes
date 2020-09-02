<?php

    require_once ('conexao/conexao.php');

    $nome  = filter_input(INPUT_POST, 'nome',  FILTER_SANITIZE_MAGIC_QUOTES);
    $fone  = filter_input(INPUT_POST, 'fone',  FILTER_SANITIZE_MAGIC_QUOTES);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_MAGIC_QUOTES);
    $cpf   = filter_input(INPUT_POST, 'cpf',   FILTER_SANITIZE_MAGIC_QUOTES);
    $nasc  = filter_input(INPUT_POST, 'nasc',  FILTER_SANITIZE_MAGIC_QUOTES);
    $obs   = filter_input(INPUT_POST, 'obs',   FILTER_SANITIZE_MAGIC_QUOTES);

    if(empty($nasc) || is_nan($nasc) || $nasc === ''){
        $nasc = '0000-00-00';
    }

    $exec = $conexao -> prepare("INSERT INTO cliente VALUES (NULL, :n, :t, :c, :d, :e, :o)");
    $dados = array(
        'n' => "$nome", 
        't' => "$fone", 
        'c' => "$cpf", 
        'd' => "$nasc", 
        'e' => "$email", 
        'o' => "$obs" 
    );
    $exec -> execute($dados);

    header('location: clientes.php');
    exit();

?>