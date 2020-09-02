<?php

    require_once ('conexao/conexao.php');

    $cliente  = filter_input(INPUT_POST, 'cliente' , FILTER_SANITIZE_MAGIC_QUOTES);
    $data     = filter_input(INPUT_POST, 'data'    , FILTER_SANITIZE_MAGIC_QUOTES);
    $valor    = filter_input(INPUT_POST, 'valor'   , FILTER_SANITIZE_MAGIC_QUOTES);
    $dimob    = filter_input(INPUT_POST, 'dimob'   , FILTER_SANITIZE_MAGIC_QUOTES);
    $carencia = filter_input(INPUT_POST, 'carencia', FILTER_SANITIZE_MAGIC_QUOTES);
    $agua     = filter_input(INPUT_POST, 'agua'    , FILTER_SANITIZE_MAGIC_QUOTES);
    $luz      = filter_input(INPUT_POST, 'luz'     , FILTER_SANITIZE_MAGIC_QUOTES);

    if(empty($data) || is_nan($data) || $data === ''){
        $data = '0000-00-00';
    }

    $cliente_array = explode(' | ', $cliente);
    $idC   = $cliente_array[0];
    $nomeC = $cliente_array[1];

    $exec = $conexao -> prepare("INSERT INTO locacao VALUES (NULL, :dic, :v, :dim, :c, :a, :l, :i, :n)");
    $dados = array(
        'dic' => "$data", 
        'v'   => "$valor", 
        'dim' => "$dimob", 
        'c'   => "$carencia", 
        'a'   => "$agua", 
        'l'   => "$luz", 
        'i'   => "$idC", 
        'n'   => "$nomeC" 
    );
    $exec -> execute($dados);

    header('location: locacao.php');
    exit();

?>