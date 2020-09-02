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
        <script src="../js/edit.js" defer></script>
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

            <form action="editar_locacaobd.php" method="post" class="formulario">

                <?php

                    require_once ('conexao/conexao.php');

                    $idL = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_MAGIC_QUOTES);

                    if(empty($idL) || is_nan($idL)) {
                        header('location: locacao.php');
                        exit();
                    }

                    $query = $conexao -> prepare("SELECT * FROM locacao WHERE IDL = :i");
                    $query -> bindParam(':i', $idL);
                    $query -> execute();
                    
                    $resultado = $query -> fetch();
                    $data      = $resultado[1];
                    $valor     = $resultado[2];
                    $dimob     = $resultado[3];
                    $carencia  = $resultado[4];
                    $agua      = $resultado[5];
                    $luz       = $resultado[6];
                    $idC       = $resultado[7];
                    $nomeC     = $resultado[8];

                ?>
                <div class="form-title">
                    <span class="title">Visualizar locação</span>
                    <span class="title-btn"><i class="fas fa-edit"></i> Editar</span>
                </div>
                <input type="hidden" name="IDL" value="<?php print $idL?>">
                <div class="input-div">

                    <label for="cliente">Cliente</label><br>
                    <select name="cliente" id="cliente" class="input" disabled>
                        
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

                                <option <?php if($idC === $id){ print 'selected'; } ?> value="<?php print $id . ' | ' . $nome; ?>"><?php print $nome; ?></option>

                        <?php

                            }

                        ?>                        
                        
                    </select>

                </div>
                <div class="input-div">

                    <label for="data">Data de início do contrato</label><br>
                    <input type="date" id="data" name="data" class="input" disabled value="<?php print $data; ?>">

                </div>
                <div class="input-div">

                    <label for="valor">Valor (R$)</label><br>
                    <input type="text" name="valor" id="valor" placeholder="R$ 0,00" class="input" disabled value="<?php print $valor; ?>">

                </div>
                <div class="input-div">
                    
                    <label for="dimob">Dimob</label><br>
                    <select name="dimob" id="dimob" class="input" disabled>
                        
                        <option>Selecione</option>
                        <option value="1" <?php if($dimob) {print 'selected';}?>>Sim</option>
                        <option value="0" <?php if(!$dimob) {print 'selected';}?>>Não</option>
                        
                    </select>
                    
                </div>
                <div class="input-div">
                    
                    <label for="carencia">Carência</label><br>
                    <input type="text" name="carencia" id="carencia" placeholder="Carência" class="input" disabled value="<?php print $carencia; ?>">

                </div>
                <div class="input-div">

                    <label for="agua">Água (R$)</label><br>
                    <input type="text" name="agua" id="agua" placeholder="R$ 0,00" class="input" disabled value="<?php print $agua; ?>">

                </div>
                <div class="input-div">

                    <label for="luz">Luz (R$)</label><br>
                    <input type="text" name="luz" id="luz" placeholder="R$ 0,00" class="input" disabled value="<?php print $luz; ?>">

                </div>
                <input type="button" value="Salvar" class="save">

            </form>

        </section>

    </body>

</html>