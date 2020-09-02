<?php

    require_once ('conexao/conexao.php');

    $id     = filter_input(INPUT_POST, 'id'    , FILTER_SANITIZE_MAGIC_QUOTES);
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

    if(empty($nasc) || is_nan($nasc) || $nasc === ''){
        $nasc = '0000-00-00';
    }

    $exec = $conexao -> prepare("UPDATE proprietario SET nomeP = :n, telP = :t, CPFP = :c, endP = :a,nascP = :d, emailP = :e, obsP = :o WHERE IDP = :i");
    $dados = array(
        'n' => "$nome", 
        't' => "$fone", 
        'c' => "$cpf", 
        'a' => "$end", 
        'd' => "$nasc", 
        'e' => "$email", 
        'o' => "$obs",
        'i' => "$id"
    );
    $exec -> execute($dados);

    header("location: visualizar_proprietario.php?id=$id");
    exit();

?>