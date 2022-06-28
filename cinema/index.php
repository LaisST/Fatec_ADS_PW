<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style/main.css">

        <title>CINETOPIA</title>
    </head>


    <body>
        <header>
            <div class="container">
                <h2 class="logo"><a href="index.php" style='text-decoration: none; color: #E50914;'>CINETOPIA</a></h2>

            </div>
        </header>

        <main>
            <div class="filme-principal">
                <div class="container">
                    
                    <h3 class="titulo">Bem vindo!</h3>
                    <p class="descricao">Essa é a Plataforma de gerenciamento de Filmes e Cinemas da Distribuidora CINETOPIA.</br>
                    Aqui você pode Adicionar, Atualizar e Excluir Cinemas, Filmes, Atores, Diretores e Programação.</p></br>
                  
                    <div class="botoes">
                        <a class='botao'style='text-decoration: none; margin:20px;' href='crudProgramacao.php?acao=selecionar'>PROGRAMAÇÃO</a>
                        <a class='botao'style='text-decoration: none; margin:20px;'href="crudCinema.php?acao=selecionar">CINEMAS</a>
                        <a class='botao'style='text-decoration: none; margin:20px;'href="crudFilme.php?acao=selecionar">FILMES</a>
                        <a class='botao'style='text-decoration: none; margin:20px;'href="crudAtor.php?acao=selecionar">ATORES</a>
                        <a class='botao'style='text-decoration: none; margin:20px;'href="crudDiretor.php?acao=selecionar">DIRETORES</a>
              
                    </div>
                </div>
            </div>
        </main>
        <div style="align-items: center; justify-content: center;">
        <br>
            <footer >
            <p> Copyright 2022 - by Lais Costa ST<br/>
            <a style='text-decoration: none; color: #AAA;' href='https://github.com/LaisST' target='_blank'>GitHub</a>|<a style='text-decoration: none; color: #AAA;' href='https://www.linkedin.com/in/lais-costa-santos-teixeira/' target=_blank> Linkedin </a></p>
        </footer>  
        </div>



    </body>
</html>