<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/main.css">

    <title>FILMES CINETOPIA</title>
</head>


<body>
    <header>
        <div class="container">
            <h2 class="logo"><a href="index.php" style='text-decoration: none; color: #E50914;'>CINETOPIA</a></h2>
            <nav>
                <a href="index.php">Início</a>
                <a href="crudCinema.php?acao=selecionar">Cinemas</a>
                <a href="crudFilme.php?acao=selecionar">Filmes</a>
                <a href="crudAtor.php?acao=selecionar">Atores</a>
                <a href="crudDiretor.php?acao=selecionar">Diretores</a>
            </nav>
        </div>

    </header>
    <div>
        <div class="container">
            <h1  style="text-align: center; color: white;  font-family: Georgia, serif; margin:20px ">Filmes</h1>
        </div>
    </div>
        
    <?php
        #Chamando o arquivo conexao.php
        include_once"conexao.php";
        #pegando o valor da ação via URL
        $acao = $_GET['acao'];
        #Comparando se o valor da URL é do tipo GET
        if(isset($_GET['id'])){
            #Criando uma variavel para armazenar o valor obtido no GET
            $id = $_GET['id'];
        }
        

switch($acao){
case 'selecionar':
        date_default_timezone_set('America/Sao_Paulo');
        #header("Content-type: text/html;charset=utf-8");
        include_once "conexao.php";
        
        echo "<meta charset='UTF-8'>";
        echo "
        <div class='botoes'>
        <a class='botao'style='text-decoration: none; margin:20px;' href='crudFilme.php?acao=formInserir'>CADASTRAR NOVO</a>
        </div>
        ";
        echo "<center><table border=1>";
        echo "<tr>";
        echo "<th><a style='margin: 10px;'>CÓDIGO</a></th>";
        echo "<th><a style='margin: 10px;'>NOME ORIGINAL </a></th>";
        echo "<th><a style='margin: 10px;'>NOME PORTUGUÊS </a></th>";
        echo "<th><a style='margin: 10px;'>TIPO</a></th>";
        echo "<th><a style='margin: 10px;'>_______________DESCRIÇÃO_______________</a></th>";
        echo "<th><a style='margin: 10px;'>DURAÇÃO</a></th>";
        echo "<th><a style='margin: 10px;'>PRODUTORA</a></th>";
        echo "<th><a style='margin: 10px;'>LANÇAMENTO</a></th>";
        echo "<th><a style='margin: 10px;'>GÊNERO</a></th>";
        echo "<th><a style='margin: 10px;'>CLASSIFICAÇÃO</a></th>";
        echo "<th><a style='margin: 10px;'>IDIOMA</a></th>";
        echo "<th><a style='margin: 10px;'>DIRETOR</a></th>";
        echo "<th><a style='margin: 10px;'>FOTO</a></th>";
        echo "<th><a style='margin: 10px;'>AÇÃO</a></th>";
        
        echo "</tr>";
        
        $sqlSelect = "SELECT * , Generos.Genero, Classificacoes.Classificacao, Idiomas.Idioma, Diretores.NomeDiretor FROM Filmes 
        inner join Classificacoes on (Classificacoes.IdClassificacao = Filmes.IdClassificacao) 
        inner join Generos on (Generos.IdGenero = Filmes.IdGenero) 
        inner join Idiomas on (Idiomas.IdIdioma = Filmes.IdIdioma)
        inner join Diretores on (Diretores.IdDiretor = Filmes.IdDiretor) ";
        
        $resultado = mysqli_query($conexao, $sqlSelect) or die ("Erro ao retornar dados");
        
        echo "</br>";
        
        while ($registro = mysqli_fetch_array($resultado)){
            $id = $registro['IdFilme'];
            $nomeOriginal = $registro['NomeOriginal'];
            $nomePortugues = $registro['NomePortugues'];
            $tipo = $registro['Tipo'];
            $descricao = $registro['Descricao'];
            $duracao = $registro['Duracao'];
            $produtora = $registro['Produtora'];
            $lancamento = $registro['Lancamento'];
            $genero = $registro['Genero'];
            $classificacao = $registro['Classificacao'];
            $idioma = $registro['Idioma'];
            $diretor = $registro['NomeDiretor'];
            $foto = $registro['Foto'];       
     
            echo "<tr>";
            echo "<td style='text-align: center;'><a style='margin: 10px;'>". $id . "</a></td>";
            echo "<td style='text-align: center;'><a style='margin: 10px;'>". $nomeOriginal . "</a></td>";
            echo "<td style='text-align: center;'><a style='margin: 10px;'>". $nomePortugues . "</a></td>";
            echo "<td style='text-align: center;'><a style='margin: 10px;'>". $tipo . "</a></td>";
            echo "<td style='text-align: center;'><a style='margin: 10px;'>". $descricao . "</a></td>";
            echo "<td style='text-align: center;'><a style='margin: 10px;'>". $duracao . "</a></td>";
            echo "<td style='text-align: center;'><a style='margin: 10px;'>". $produtora . "</a></td>";
            echo "<td style='text-align: center;'><a style='margin: 10px;'>". date("d/m/y", strtotime($lancamento)) . "</a></td>";
            echo "<td style='text-align: center;'><a style='margin: 10px;'>". $genero . "</a></td>";
            echo "<td style='text-align: center;'><a style='margin: 10px;'>". $classificacao . "</a></td>";
            echo "<td style='text-align: center;'><a style='margin: 10px;'>". $idioma . "</a></td>";
            echo "<td style='text-align: center;'><a style='margin: 10px;'>". $diretor . "</a></td>";
            echo "<td style='text-align: center;'><a style='margin: 10px;'><img height='150' width='100' src='". $foto . "'></a></td>";
            
            
            echo "<td ><a style='text-decoration: none; color: #AAA; margin: 10px;'  href='crudFilme.php?acao=deletar&id=$id'>Deletar</a>
            <a style='text-decoration: none; color: #AAA; margin: 10px;' href='crudFilme.php?acao=montar&id=$id'>Atualizar</a>           
            ";
            
        }
        echo "</table>";

        mysqli_close($conexao);
        break;
        
}        
        
        
    ?>
    <!--<div>-->
    <!--    <br>-->
    <!--    <br>-->
    <!--    <footer>-->
    <!--    <p> Copyright 2022 - by Lais Costa ST<br/>-->
    <!--    <a style='text-decoration: none; color: #AAA;' href='https://github.com/LaisST' target='_blank'>GitHub</a>|<a style='text-decoration: none; color: #AAA;' href='https://www.linkedin.com/in/lais-costa-santos-teixeira/' target=_blank> Linkedin </a></p>-->
    <!--    </footer>  -->
    <!--</div>-->
</body>
</html>
