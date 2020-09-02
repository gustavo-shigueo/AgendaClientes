<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../font/css/all.css">
        <link rel="stylesheet" href="../css/main.min.css">
        <script src="../js/script.js" defer></script>
        <script src="../js/priority.js" defer></script>
        <script src="../js/sorting.js" defer></script>
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

                        <li><a href="./" class="menu-link active">A fazer</a></li>
                        <li><a href="clientes.php" class="menu-link">Clientes</a></li>
                        <li><a href="./proprietarios.php" class="menu-link">Proprietários</a></li>
                        <li><a href="./locacao.php" class="menu-link">Locação</a></li>

                    </ul>

                </div>

            </nav>

        </header>
        <section class="schedule">

            <div class="schedule-header">

                <div class="title-row">

                    <span class="title">Agendados</span>
                    <span class="button"><a href="agendar.php">+ Adicionar agendamento</a></span>

                </div>
                <div class="category-names">

                    <span data-category-name>Nome<i class="fas fa-caret-down"></i></span>
                    <span data-category-priority>Prioridade<i class="fas fa-caret-down"></i></span>
                    <span data-category-date class="active">Data<i class="fas fa-caret-down"></i></span>
                    <span data-category-finish>Concluir</span>

                </div>

            </div>
            <div class="schedule-body">

                <?php

                    require_once ('conexao/conexao.php');

                    $query = $conexao -> prepare("SELECT * FROM afazer");
                    $query -> execute();
                    $resultados = $query -> fetchAll();

                    foreach($resultados as $exibir){

                        $ID         = $exibir[0];
                        $nome       = $exibir[1];
                        $prioridade = $exibir[2];
                        $data       = $exibir[3];

                        $prioridade_str = null;
                        if($prioridade == 0){
                            $prioridade_str = 'Baixa';
                        } else if($prioridade == 1){
                            $prioridade_str = 'Média';
                        } else{
                            $prioridade_str = 'Alta';
                        }

                        $data_array = explode('-', $data);
                        $new_data   = $data_array[2] . '/' . $data_array[1] . '/' . $data_array[0];

                ?>

                        <div class="row" data-id="<?php print $ID;?>">

                            <div class="column" data-name><?php print $nome; ?></div>
                            <div class="column" data-priority="<?php print $prioridade; ?>"><?php print $prioridade_str; ?></div>
                            <div class="column" data-date><?php print $new_data; ?></div>
                            <div class="column" data-finish></div>

                        </div>

                <?php

                    }

                ?>

            </div>

        </section>

    </body>

</html>