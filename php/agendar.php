<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../font/css/all.css">
        <link rel="stylesheet" href="../css/main.min.css">
        <script src="../js/script.js" defer></script>
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
                        <li><a href="./clientes.php" class="menu-link">Clientes</a></li>

                    </ul>

                </div>

            </nav>

        </header>
        <section class="agendar">

            <form action="agendarbd.php" method="post" class="formulario">

                <span class="form-title">Novo agendamento</span><br>
                <div class="input-div">

                    <label for="nome">Nome</label><br>
                    <input type="text" name="nome" id="nome" placeholder="Título">
                
                </div>
                <div class="input-div">
                
                    <label for="prioridade">Prioridade</label><br>
                    <select name="prioridade" id="prioridade">

                        <option>Nível de prioridade</option>
                        <option value="0">Baixa</option>
                        <option value="1">Média</option>
                        <option value="2">Alta</option>

                    </select>

                </div>
                <div class="input-div">

                    <label for="data">Data</label><br>
                    <input type="date" name="data">
                
                </div>
                <input type="submit" value="Salvar" class="save">

            </form>

        </section>

    </body>

</html>