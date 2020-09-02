<?php

    require_once ('conexao/conexao.php');

    $nome       = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_MAGIC_QUOTES);
    $prioridade = filter_input(INPUT_POST, 'prioridade', FILTER_SANITIZE_MAGIC_QUOTES);
    $data       = filter_input(INPUT_POST, 'data', FILTER_SANITIZE_MAGIC_QUOTES);
    
    $exec = $conexao -> prepare("INSERT INTO afazer VALUES (NULL, :n, :p, :d)");
    $dados = array(
        'n' => "$nome", 
        'p' => "$prioridade", 
        'd' => "$data"
    );
    $exec -> execute($dados);

    header('location: ./');
    exit();

?>