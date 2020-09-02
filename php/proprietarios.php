<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../font/css/all.css">
        <link rel="stylesheet" href="../css/main.min.css">
        <script src="../js/script.js" defer></script>
        <script src="../js/filter_proprietaries.js" defer></script>
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
                        <li><a href="./proprietarios.php" class="menu-link active">Proprietários</a></li>
                        <li><a href="./locacao.php" class="menu-link">Locação</a></li>

                    </ul>

                </div>

            </nav>

        </header>
        <section class="proprietaries">

            <div class="proprietaries-header">

                <div class="title-row">

                    <span class="title">Proprietários</span>
                    <span class="button"><a href="novo_proprietario.php">+ Adicionar proprietário</a></span>

                </div>
                <div class="filter-input">

                    <label for="filter">Filtrar:</label>
                    <input type="text" class="filter" id="filter" data-search>

                </div>
                
                <div class="category-names">

                    <span data-category-name>Nome</span>
                    <span data-category-phone>Telefone</i></span>
                    <span data-category-cpf>CPF</span>

                </div>

            </div>
            <div class="proprietary-body">

                <?php
                
                    require_once ('conexao/conexao.php');

                    $query = $conexao -> prepare("SELECT IDP, nomeP, telP, CPFP FROM proprietario");
                    $query -> execute();
                    $resultados = $query -> fetchAll();

                    foreach($resultados as $exibir){

                        $id   = $exibir[0];
                        $nome = $exibir[1];
                        $fone = $exibir[2];
                        $cpf  = $exibir[3];
                
                ?>

                        <div class="row" data-id="<?php print $id;?>">

                            <div class="column" data-name><?php print $nome;?></div>
                            <div class="column" data-tel><?php print $fone;?></div>
                            <div class="column" data-cpf><?php print $cpf;?><a href="visualizar_proprietario.php?id=<?php print $id; ?>"><i class="fas fa-caret-right"></i></a></div>

                        </div>

                <?php

                    }

                ?>

            </div>

        </section>

    </body>

</html>