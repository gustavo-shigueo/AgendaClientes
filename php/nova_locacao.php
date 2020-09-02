<!DOCTYPE html>
<html lang="en">

    <head>
   
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../font/css/all.css">
        <link rel="stylesheet" href="../css/main.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js" defer></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js" defer></script>
        <script src="../js/script.js" defer></script>
        <script src="../js/mask.js" defer></script>
        <script src="https://cdn.rawgit.com/plentz/jquery-maskmoney/master/dist/jquery.maskMoney.min.js" defer></script>
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
        <section class="novo_cliente">

            <form action="nova_locacaobd.php" method="post" class="formulario">

                <span class="form-title">Adicionar locação</span><br>
                <div class="input-div">

                    <label for="cliente">Cliente</label><br>
                    <select name="cliente" id="cliente">
                        
                        <option value="" selected>Selecione</option>
                        <?php

                            require_once ('conexao/conexao.php');

                            $query = $conexao -> prepare("SELECT IDC, nomeC FROM cliente");
                            $query -> execute();
                            $resultados = $query -> fetchAll();

                            foreach($resultados as $exibir){

                                $id   = $exibir[0];
                                $nome = $exibir[1];

                        ?>

                                <option value="<?php print $id . ' | ' . $nome; ?>"><?php print $nome; ?></option>

                        <?php

                            }

                        ?>                        
                        
                    </select>

                </div>
                <div class="input-div">

                    <label for="data">Data de início do contrato</label><br>
                    <input type="date" id="data" name="data">

                </div>
                <div class="input-div">

                    <label for="valor">Valor (R$)</label><br>
                    <input type="text" name="valor" id="valor" placeholder="R$ 0,00">

                </div>
                <div class="input-div">
                    
                    <label for="dimob">Dimob</label><br>
                    <select name="dimob" id="dimob">
                        
                        <option>Selecione</option>
                        <option value="1">Sim</option>
                        <option value="0">Não</option>
                        
                    </select>
                    
                </div>
                <div class="input-div">
                    
                    <label for="carencia">Carência</label><br>
                    <input type="text" name="carencia" id="carencia" placeholder="Carência">

                </div>
                <div class="input-div">

                    <label for="agua">Água (R$)</label><br>
                    <input type="text" name="agua" id="agua" placeholder="R$ 0,00">

                </div>
                <div class="input-div">

                    <label for="luz">Luz (R$)</label><br>
                    <input type="text" name="luz" id="luz" placeholder="R$ 0,00">

                </div>
                <input type="submit" value="Salvar" class="save">

            </form>

        </section>

    </body>

</html>