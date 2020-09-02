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
        <script src="../js/cep.js" defer></script>
        <script src="../js/edit.js" defer></script>
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
        <section class="novo_cliente">

            <form action="editar_proprietariobd.php" method="post" class="formulario">

                <?php

                    require_once ('conexao/conexao.php');

                    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_MAGIC_QUOTES);

                    if(empty($id) || is_nan($id)) {
                        header('location: proprietarios.php');
                        exit();
                    }

                    $query = $conexao -> prepare("SELECT * FROM proprietario WHERE IDP = :i");
                    $query -> bindParam(':i', $id);
                    $query -> execute();
                    
                    $resultado = $query -> fetch();
                    $id    = $resultado[0];
                    $nome  = $resultado[1];
                    $fone  = $resultado[2];
                    $cpf   = $resultado[3];
                    $end   = $resultado[4];
                    $nasc  = $resultado[5];
                    $email = $resultado[6];
                    $obs   = $resultado[7];

                    $end_array = explode(' - ', $end);
                    $log_array = explode(', ', $end_array[0]);
                    $cid_array = explode(', ', $end_array[1]);

                    $rua = $log_array[0];
                    $num = $log_array[1];

                    $bairro = $cid_array[0];
                    $cep    = $cid_array[1];
                    
                    $compl  = '';
                    if(isset($cid_array[2]) && strlen($cid_array[2]) > 0){
                        $compl  = $cid_array[2];
                    }

                ?>

                <div class="form-title">
                    <span class="title">Visualizar proprietário</span>
                    <span class="title-btn"><i class="fas fa-edit"></i> Editar</span>
                </div>

                <input type="hidden" name="id" value="<?php print $id; ?>">
                <div class="input-div">

                    <label for="nome">Nome</label><br>
                    <input class="input" type="text" name="nome" placeholder="Nome completo do cliente" id="nome" value="<?php print $nome; ?>" disabled>

                </div>
                <div class="input-div">

                    <label for="fone">Telefone celular</label><br>
                    <input class="input" type="text" name="fone" placeholder="(00) 00000-0000" id="fone" value="<?php print $fone; ?>" disabled>

                </div>
                <div class="input-div">

                    <label for="cep">CEP</label><br>
                    <input class="input" type="text" name="cep" id="cep" value="<?php print $cep; ?>" disabled placeholder="00000-000">

                </div>
                <div class="input-div">

                    <label for="bairro">Bairro</label><br>
                    <input class="input" type="text" name="bairro" id="bairro" placeholder="Bairro" value="<?php print $bairro; ?>" disabled>

                </div>
                <div class="input-div">

                    <label for="rua">Logradouro</label><br>
                    <input class="input" type="text" name="rua" id="rua" value="<?php print $rua; ?>" disabled placeholder="Rua, avenida, rodovia...">

                </div>
                <div class="input-div">

                    <label for="num">Número</label><br>
                    <input class="input" type="text" name="num" id="num" placeholder="Número" value="<?php print $num; ?>" disabled>

                </div>
                <div class="input-div">

                    <label for="comp">Complemento</label><br>
                    <input class="input" type="text" name="comp" id="comp" placeholder="Complemento" value="<?php print $compl; ?>" disabled>

                </div>
                <div class="input-div">

                    <label for="email">E-mail</label><br>
                    <input class="input" type="email" name="email" placeholder="exemplo@email.com" id="email" value="<?php print $email; ?>" disabled>

                </div>
                <div class="input-div">

                    <label for="cpf">CPF</label><br>
                    <input class="input" type="text" name="cpf" placeholder="000.000.000-00" id="cpf" value="<?php print $cpf; ?>" disabled>

                </div>
                <div class="input-div">

                    <label for="data">Data de nascimento</label><br>
                    <input class="input" type="date" id="data" name="nasc" value="<?php print $nasc; ?>" disabled>

                </div>
                <div class="input-div">

                    <label for="obs">Informações adicionais</label><br>
                    <textarea class="input" name="obs" id="obs" placeholder="Simulações, outros meios de contato, anotações sobre o cliente..." disabled><?php print $obs; ?></textarea>

                </div>
                <input type="button" value="Salvar" class="save">

            </form>

        </section>

    </body>

</html>