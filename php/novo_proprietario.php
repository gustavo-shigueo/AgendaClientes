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

            <form action="novo_proprietariobd.php" method="post" class="formulario">

                <span class="form-title">Adicionar proprietário</span><br>
                <div class="input-div">

                    <label for="nome">Nome</label><br>
                    <input type="text" name="nome" id="nome" placeholder="Nome completo do proprietário">

                </div>
                <div class="input-div">

                    <label for="fone">Telefone celular</label><br>
                    <input type="text" name="fone" id="fone" placeholder="(00) 00000-0000">

                </div>
                <div class="input-div">

                    <label for="cep">CEP</label><br>
                    <input type="text" name="cep" id="cep" placeholder="00000-000">

                </div>
                <div class="input-div">

                    <label for="bairro">Bairro</label><br>
                    <input type="text" name="bairro" id="bairro" placeholder="Bairro">

                </div>
                <div class="input-div">

                    <label for="rua">Logradouro</label><br>
                    <input type="text" name="rua" id="rua" placeholder="Rua, avenida, rodovia...">

                </div>
                <div class="input-div">

                    <label for="num">Número</label><br>
                    <input type="text" name="num" id="num" placeholder="Número">

                </div>
                <div class="input-div">

                    <label for="comp">Complemento</label><br>
                    <input type="text" name="comp" id="comp" placeholder="Complemento">

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