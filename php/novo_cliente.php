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

            <form action="novo_clientebd.php" method="post" class="formulario">

                <span class="form-title">Adicionar cliente</span><br>
                <div class="input-div">

                    <label for="nome">Nome</label><br>
                    <input type="text" name="nome" id="nome" placeholder="Nome completo do cliente">

                </div>
                <div class="input-div">

                    <label for="fone">Telefone celular</label><br>
                    <input type="text" name="fone" id="fone" placeholder="(00) 00000-0000">

                </div>
                <div class="input-div">

                    <label for="email">E-mail</label><br>
                    <input type="email" name="email" id="email" placeholder="exemplo@email.com">

                </div>
                <div class="input-div">

                    <label for="cpf">CPF</label><br>
                    <input type="text" name="cpf" id="cpf" placeholder="000.000.000-00">

                </div>
                <div class="input-div">

                    <label for="data">Data de nascimento</label><br>
                    <input type="date" id="data" name="nasc">

                </div>
                <div class="input-div">

                    <label for="obs">Informações adicionais</label><br>
                    <textarea name="obs" id="obs" placeholder="Simulações, outros meios de contato, anotações sobre o cliente..."></textarea>

                </div>
                <input type="submit" value="Salvar" class="save">

            </form>

        </section>

    </body>

</html>