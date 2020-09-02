<?php

    require_once ('conexao/conexao.php');

    $nome   = filter_input(INPUT_POST, 'nome'  , FILTER_SANITIZE_MAGIC_QUOTES);
    $fone   = filter_input(INPUT_POST, 'fone'  , FILTER_SANITIZE_MAGIC_QUOTES);
    $cep    = filter_input(INPUT_POST, 'cep'   , FILTER_SANITIZE_MAGIC_QUOTES);
    $bairro = filter_input(INPUT_POST, 'bairro', FILTER_SANITIZE_MAGIC_QUOTES);
    $rua    = filter_input(INPUT_POST, 'rua'   , FILTER_SANITIZE_MAGIC_QUOTES);
    $num    = filter_input(INPUT_POST, 'num'   , FILTER_SANITIZE_MAGIC_QUOTES);
    $comp   = filter_input(INPUT_POST, 'comp'  , FILTER_SANITIZE_MAGIC_QUOTES);
    $email  = filter_input(INPUT_POST, 'email' , FILTER_SANITIZE_MAGIC_QUOTES);
    $cpf    = filter_input(INPUT_POST, 'cpf'   , FILTER_SANITIZE_MAGIC_QUOTES);
    $nasc   = filter_input(INPUT_POST, 'nasc'  , FILTER_SANITIZE_MAGIC_QUOTES);
    $obs    = filter_input(INPUT_POST, 'obs'   , FILTER_SANITIZE_MAGIC_QUOTES);

    $end = $rua . ', ' . $num . ' - ' . $bairro . ', ' . $cep . ', ' . $comp;

    $exec = $conexao -> prepare("INSERT INTO proprietario VALUES (NULL, :n, :t, :c, :a, :d, :e, :o)");
    $dados = array(
        'n' => "$nome", 
        't' => "$fone", 
        'c' => "$cpf", 
        'a' => "$end", 
        'd' => "$nasc", 
        'e' => "$email", 
        'o' => "$obs" 
    );
    $exec -> execute($dados);

    header('location: proprietarios.php');
    exit();

?>