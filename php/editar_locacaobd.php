<?php

    require_once ('conexao/conexao.php');

    $IDL      = filter_input(INPUT_POST, 'IDL'     , FILTER_SANITIZE_MAGIC_QUOTES);
    $cliente  = filter_input(INPUT_POST, 'cliente' , FILTER_SANITIZE_MAGIC_QUOTES);
    $data     = filter_input(INPUT_POST, 'data'    , FILTER_SANITIZE_MAGIC_QUOTES);
    $valor    = filter_input(INPUT_POST, 'valor'   , FILTER_SANITIZE_MAGIC_QUOTES);
    $dimob    = filter_input(INPUT_POST, 'dimob'   , FILTER_SANITIZE_MAGIC_QUOTES);
    $carencia = filter_input(INPUT_POST, 'carencia', FILTER_SANITIZE_MAGIC_QUOTES);
    $agua     = filter_input(INPUT_POST, 'agua'    , FILTER_SANITIZE_MAGIC_QUOTES);
    $luz      = filter_input(INPUT_POST, 'luz'     , FILTER_SANITIZE_MAGIC_QUOTES);

    $cliente_array = explode(' | ', $cliente);
    $idC   = $cliente_array[0];
    $nomeC = $cliente_array[1];

    $exec = $conexao -> prepare("UPDATE locacao SET dataInicioL = :dic, valorL = :v, dimobL = :dim, carenciaL = :c, aguaL = :a, luzL = :l, IDC = :i, nomeC = :n WHERE IDL = :idL");
    $dados = array(
        'dic' => "$data", 
        'v'   => "$valor", 
        'dim' => "$dimob", 
        'c'   => "$carencia", 
        'a'   => "$agua", 
        'l'   => "$luz", 
        'i'   => "$idC", 
        'n'   => "$nomeC", 
        'idL' => "$IDL" 
    );
    $exec -> execute($dados);

    header("location: visualizar_locacao.php?id=$IDL");
    exit();

?>