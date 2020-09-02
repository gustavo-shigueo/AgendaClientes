<?php

    require_once ('conexao/conexao.php');

    $ID = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);
    $exec = $conexao -> prepare("DELETE FROM afazer WHERE IDA = :i");
	$exec -> bindParam(':i', $ID);
    $exec -> execute();

    header('location: ./');
    exit();

?>