<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../font/css/all.css">
    <link rel="stylesheet" href="../css/main.min.css">
    <script src="../js/script.js" defer></script>
    <script src="../js/dimob.js" defer></script>
    <script src="../js/filter_locacao.js" defer></script>
    <title>Document</title>

</head>

<body>

    <header class="cabecalho">

        <nav class="navbar">

            <a href="./index.html">

                <div class="logo"></div>

            </a>
            <div class="menu">

                <div class="dropdown" data-dropdown>

                    <span class="linha">

                </div>
                <ul class="links" data-dropdown>

                    <li><a href="./" class="menu-link">A fazer</a></li>
                    <li><a href="./clientes.php" class="menu-link">Clientes</a></li>
                    <li><a href="./proprietarios.php" class="menu-link">Proprietários</a></li>
                    <li><a href="./locacao.php" class="menu-link active">Locação</a></li>

                </ul>

            </div>

        </nav>

    </header>
    <section class="rent">

        <div class="rent-header">

            <div class="title-row">

                <span class="title">Contratos de locação</span>
                <span class="button"><a href="nova_locacao.php">+ Adicionar locação</a></span>

            </div>
            <div class="filter-input">
            
                <label for="filter">Filtrar:</label>
                <input type="text" class="filter" id="filter" data-search>
            
            </div>
            <div class="category-names">

                <span data-category-name>Cliente</span>
                <span data-category-priority>Data - Início</span>
                <span data-category-value>Valor</span>
                <span data-category-dimob>Dimob</span>

            </div>

        </div>
        <div class="rent-body">

            <?php

                require_once ('conexao/conexao.php');

                $query = $conexao -> prepare("SELECT IDL, nomeC, dataInicioL, valorL, dimobL FROM locacao");
                $query -> execute();
                $resultados = $query -> fetchAll();

                foreach($resultados as $exibir){

                    $id    = $exibir[0];
                    $nome  = $exibir[1];
                    $data  = $exibir[2];
                    $val   = $exibir[3];
                    $dimob = $exibir[4];

                    $dataArr = explode('-', $data);
                    $date    = $dataArr[2] . '/' . $dataArr[1] . '/' . $dataArr[0];

                    $dimobStr = $dimob ? 'Sim' : 'Não';

            ?>

                    <div class="row" data-id="<?php print $id; ?>">

                        <div class="column" data-name><?php print $nome; ?></div>
                        <div class="column" data-date><?php print $date; ?></div>
                        <div class="column" data-value><?php print $val; ?></div>
                        <div class="column" data-dimob><?php print $dimobStr; ?><a href="visualizar_locacao.php?id=<?php print $id; ?>"><i class="fas fa-caret-right"></i></a></div>

                    </div>

            <?php

                }

            ?>

        </div>

    </section>

</body>

</html>