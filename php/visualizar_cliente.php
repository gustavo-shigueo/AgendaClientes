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
                        <li><a href="./clientes.php" class="menu-link active">Clientes</a></li>
                        <li><a href="./proprietarios.php" class="menu-link">Proprietários</a></li>
                        <li><a href="./locacao.php" class="menu-link">Locação</a></li>

                    </ul>

                </div>

            </nav>

        </header>
        <section class="novo_cliente">

            <form action="editar_clientebd.php" method="post" class="formulario">

                <?php

                    require_once ('conexao/conexao.php');

                    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_MAGIC_QUOTES);

                    if(empty($id) || is_nan($id)) {
                        header('location: clientes.php');
                        exit();
                    }

                    $query = $conexao -> prepare("SELECT * FROM cliente WHERE IDC = :i");
                    $query -> bindParam(':i', $id);
                    $query -> execute();
                    
                    $resultado = $query -> fetch();
                    $id    = $resultado[0];
                    $nome  = $resultado[1];
                    $fone  = $resultado[2];
                    $cpf   = $resultado[3];
                    $nasc  = $resultado[4];
                    $email = $resultado[5];
                    $obs   = $resultado[6];

                ?>

                <div class="form-title">
                    <span class="title">Visualizar cliente</span>
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