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
                    <a href="index.php">Inicio</a>
                    <a href="crudProgramacao.php?acao=selecionar">Programação</a>
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
        case 'formInserir':
            echo "
                               
            <form  method='post' action='crudFilme.php?acao=inserir' name='dados' onSubmit='return enviardados();'>
            <center><table width='588' border='0' align='center'>

            <tr>
            <td width='200'>
            <font size='2' face='Verdana, Arial, Helvetica, sans-serif'>TÍTULO: </font>
            </td>
            <td width='460'>
            <input name='titulo' type='text' class='formbutton' id='titulo' size='52' maxlength='150'>
            </td>
            </tr>
            
            <tr>
            <td width='200'>
            <font size='2' face='Verdana, Arial, Helvetica, sans-serif'>DURAÇÃO: </font>
            </td>
            <td width='460'>
            <input name='duracao' type='text' class='formbutton' id='duracao' size='52' maxlength='150'>
            </td>
            </tr>

            <tr>
            <td width='200'>
            <font size='2' face='Verdana, Arial, Helvetica, sans-serif'>PRODUTORA: </font>
            </td>
            <td width='460'>
            <input name='produtora' type='text' class='formbutton' id='produtora' size='52' maxlength='150'>
            </td>
            </tr>
            
            <tr>
            <td>
            <font size='2' face='Verdana, Arial, Helvetica, sans-serif'>LANÇAMENTO:</font>
            </td>
            <td>
            <font size='2'>
            <input name='lancamento' type='date' id='lancamento' class='formbutton'>
            </font>
            </td>
            </tr>
            
            <tr>
            <td>
            <font size='2' face='Verdana, Arial, Helvetica, sans-serif'>GÊNERO: </font>
            </td>
            <td>
            <font size='2'>
            <select name='genero' id='genero'>
            <option disabled selected>Escolha uma opção</option>
            ";
            
                $result_genero = 'SELECT * FROM Generos';
                $resultado_genero = mysqli_query ($conexao, $result_genero) or die ("Erro ao retornar dados");
                while($row_genero = mysqli_fetch_assoc($resultado_genero)){ 
                echo "<option style='color: black;' value='";
                echo $row_genero['IdGenero'];
                echo "'>";
                echo $row_genero['Genero'];
                echo "</option>";
                 
                }
            echo "
            </select>
            </font>
            </td>
            
            <tr>
            <td>
            <font size='2' face='Verdana, Arial, Helvetica, sans-serif'>CLASSIFICAÇÃO: </font>
            </td>
            <td>
            <font size='2'>
            <select name='classificacao' id='classificacao'>
            <option disabled selected>Escolha uma opção</option>
            ";
            
                $result_classificacao = 'SELECT * FROM Classificacoes';
                $resultado_classificacao = mysqli_query ($conexao, $result_classificacao) or die ("Erro ao retornar dados");
                while($row_classificacao = mysqli_fetch_assoc($resultado_classificacao)){ 
                echo "<option style='color: black;' value='";
                echo $row_classificacao['IdClassificacao'];
                echo "'>";
                echo $row_classificacao['Classificacao'];
                echo "</option>";
                 
                }
            echo "
            </select>
            </font>
            </td>
            
            <tr>
            <td>
            <font size='2' face='Verdana, Arial, Helvetica, sans-serif'>IDIOMA: </font>
            </td>
            <td>
            <font size='2'>
            <select name='idioma' id='idioma'>
            <option disabled selected>Escolha uma opção</option>
                ";
            
                $result_idioma = 'SELECT * FROM Idiomas';
                $resultado_idioma = mysqli_query ($conexao, $result_idioma) or die ("Erro ao retornar dados");
                while($row_idioma = mysqli_fetch_assoc($resultado_idioma)){ 
                echo "<option style='color: black;' value='";
                echo $row_idioma['IdIdioma'];
                echo "'>";
                echo $row_idioma['Idioma'];
                echo "</option>";
                 
                }
            echo "
            </select>
            </font>
            </td>
            
            <tr>
            <td>
            <font size='2' face='Verdana, Arial, Helvetica, sans-serif'>DIRETOR: </font>
            </td>
            <td>
            <font size='2'>
            <select name='diretor' id='diretor'>
            <option disabled selected>Escolha uma opção</option>
            ";
            
                $result_diretor = 'SELECT * FROM Diretores';
                $resultado_diretor = mysqli_query ($conexao, $result_diretor) or die ("Erro ao retornar dados");
                while($row_diretor = mysqli_fetch_assoc($resultado_diretor)){ 
                echo "<option style='color: black;' value='";
                echo $row_diretor['IdDiretor'];
                echo "'>";
                echo $row_diretor['NomeDiretor'];
                echo "</option>";
                 
                }
            echo "
            </select>
            </font>
            </td>
            
           <tr>
            <td>
            <font size='2' face='Verdana, Arial, Helvetica, sans-serif'>ATORES: </font>
            </td>
            <td>
            <font size='2'>
            <select name='ator1' id='ator1'>
            <option value='9' selected> </option>
            ";
            
                $result_ator = 'SELECT * FROM Atores';
                $resultado_ator = mysqli_query ($conexao, $result_ator) or die ("Erro ao retornar dados");
                while($row_ator = mysqli_fetch_assoc($resultado_ator)){ 
                echo "<option value='";
                echo $row_ator['IdAtor'];
                echo "'>";
                echo $row_ator['Nome'];
                echo "</option>";
                }
            echo "
            </select>
            </font>
            </td>
            
            <TR>
            <td>
            <font size='2' face='Verdana, Arial, Helvetica, sans-serif'> </font>
            </td>
            <td>
            <font size='2'>
            <select name='ator2' id='ator2'>
            <option value='9' selected> </option>
            ";
            
                $result_ator = 'SELECT * FROM Atores';
                $resultado_ator = mysqli_query ($conexao, $result_ator) or die ("Erro ao retornar dados");
                while($row_ator = mysqli_fetch_assoc($resultado_ator)){ 
                echo "<option value='";
                echo $row_ator['IdAtor'];
                echo "'>";
                echo $row_ator['Nome'];
                echo "</option>";
                 
                }
            echo "
            </select>
            </font>
            </td>
            
            <tr>
            <td>
            <font size='2' face='Verdana, Arial, Helvetica, sans-serif'> </font>
            </td>
            <td>
            <font size='2'>
            <select name='ator3' id='ator3'>
            <option value='9' selected> </option>
            ";
            
                $result_ator = 'SELECT * FROM Atores';
                $resultado_ator = mysqli_query ($conexao, $result_ator) or die ("Erro ao retornar dados");
                while($row_ator = mysqli_fetch_assoc($resultado_ator)){ 
                echo "<option value='";
                echo $row_ator['IdAtor'];
                echo "'>";
                echo $row_ator['Nome'];
                echo "</option>";
                 
                }
            echo "
            </select>
            </font>
            </td>
            


            <tr>
            <td width='200'>
            <font size='2' face='Verdana, Arial, Helvetica, sans-serif'>DESCRIÇÃO: </font>
            </td>
            <td width='460'>
            <textarea name='descricao' cols='50' rows='3'  id='descricao' input></textarea>
            </td>
            </tr>
            
            <tr>
            <td width='200'>
            <font size='2' face='Verdana, Arial, Helvetica, sans-serif'>LINK DA FOTO(url): </font>
            </td>
            <td width='460'>
            <input name='foto' type='text' class='formbutton' id='foto' size='52' maxlength='150'>
            </td>
            </tr>

            
            <tr>
            <td height='22'></td>
            <td>
            <br>
            <input name='Submit' type='submit' class='botao' value='Cadastrar'>
            <input name='Reset' type='reset' class='botao' value='Limpar campos'>
            <button class='botao' type='submit' formaction='crudFilme.php?acao=selecionar'>Voltar</button>
            </td>
            </tr>
            </table>
            </form>
            ";
            
        mysqli_close($conexao);
        break;
 
 #////////////////////////////////////////////////////////////////////////////////////////////////////////////       
        case 'inserir':

        $titulo = $_POST['titulo'];
        $duracao = $_POST['duracao'];
        $produtora = $_POST['produtora'];
        $lancamento = $_POST['lancamento'];
        $genero = $_POST['genero'];
        $classificacao = $_POST['classificacao'];
        $idioma = $_POST['idioma'];
        $diretor = $_POST['diretor'];
        $descricao = $_POST['descricao'];
        $ator1 = $_POST['ator1'];
        $ator2 = $_POST['ator2'];
        $ator3 = $_POST['ator3'];
        $foto = $_POST['foto'];
        
    
        $sqlInsert = "INSERT INTO Filmes (Titulo, Descricao, Duracao, Produtora, Lancamento, IdGenero, IdClassificacao, IdIdioma, IdDiretor, Ator1, Ator2, Ator3,  Foto) 
        values ( '$titulo', '$descricao', '$duracao', '$produtora', '$lancamento', '$genero', '$classificacao',  '$idioma', '$diretor', '$ator1' ,'$ator2' , '$ator3' ,'$foto' )";
            
        if (!mysqli_query($conexao,$sqlInsert)) {
            die("Erro ao cadastrar o novo Filme: ".mysqli_error($conexao));
        }else{
            echo "<script language='javascript' type='text/javascript'>
        alert('Filme cadastrado com sucesso!')
        window.location.href='crudFilme.php?acao=selecionar'</script>";
        }
        
        

        break;
        
#////////////////////////////////////////////////////////////////////////////////////////////////////////

case 'montar':
        $id = $_GET['id'];
        $sql = 'SELECT * , Generos.Genero, Classificacoes.Classificacao, Idiomas.Idioma, Diretores.NomeDiretor, A.Nome as Ator1, AA.Nome as Ator2, AAA.Nome as Ator3
        FROM Filmes 
        inner join Classificacoes on (Classificacoes.IdClassificacao = Filmes.IdClassificacao) 
        inner join Generos on (Generos.IdGenero = Filmes.IdGenero) 
        inner join Idiomas on (Idiomas.IdIdioma = Filmes.IdIdioma)
        inner join Diretores on (Diretores.IdDiretor = Filmes.IdDiretor)
        inner join Atores as A on (A.IdAtor = Filmes.Ator1)
        inner join Atores as AA on (AA.IdAtor = Filmes.Ator2)
        inner join Atores as AAA on (AAA.IdAtor = Filmes.Ator3)
         WHERE IdFilme ='. $id;
        $resultado = mysqli_query($conexao, $sql) or die ("Erro ao retornar dados");
        
        //Montando o formulário 

        echo "<form method='post' name='dados' action='crudFilme.php?acao=atualizar' onSubmit='return enviardados();'>";
        echo "<center><table width='588' border='0' >";
        
         while ($registro = mysqli_fetch_array($resultado)){
            echo "<tr>";
            echo "<td width='118'><font size='2' face='Verdana, Arial, Helvetica, sans-serif'>ID DO FILME:</font></td>";
            echo "<td width='400'>";
            echo "<input name='id' type='text' class='formbutton' id='id' size='5' maxlenght='10' value=" . $id . " readonly>";
            echo "</td>";
            echo "</tr>";
            
            echo "<tr>";
            echo "<td width='200'><font size='2' face='Verdana, Arial, Helvetica, sans-serif'>TÍTULO:</font></td>";
            echo "<td rowspan='2'><font size='2'>";
            echo "<style>textarea{resize:none;}</style>";
            echo "<textarea name='titulo' cols='50' rows='1' >" . htmlspecialchars($registro['Titulo']) . "</textarea>";
            echo "</font></td>";
            echo "</tr>";
            
            echo "<tr>";
            echo "<tr>";
            echo "<td width='118'><font size='2' face='Verdana, Arial, Helvetica, sans=serif'>DURAÇÃO: </font></td>";
            echo "<td width='460'>";
            echo "<input name='duracao' type='text'  id='duracao' size='52' maxlenght='150' value=" . $registro['Duracao'] . " ";
            echo "</td>";
            echo "</tr>";
            
            echo "<tr>";
            echo "<tr>";
            echo "<td width='118'><font size='2' face='Verdana, Arial, Helvetica, sans=serif'>PRODUTORA: </font></td>";
            echo "<td width='460'>";
            echo "<input name='produtora' type='text' id='produtora' size='52' maxlenght='150' value=" . $registro['Produtora'] . " ";
            echo "</td>";
            echo "</tr>";
            
            echo "<tr>";
            echo "
            <td>
            <font size='2' face='Verdana, Arial, Helvetica, sans-serif'>LANÇAMENTO: </font>
            </td>";
            echo "<td width='460'>";
            echo "<input name='lancamento' type='date'  id='lancamento' size='52' maxlenght='150' value=" . $registro['Lancamento'] . " ";
            echo "</td>";
            echo "</tr>";
            
            echo "<tr>";
            echo "<tr>";
            echo "<td width='118'><font size='2' face='Verdana, Arial, Helvetica, sans=serif'> GÊNERO: </font></td>";
            echo "<td width='460'>";
            echo "  <font size='2'>
                    <select name='genero' id='genero'>
                    <option value='" . htmlspecialchars($registro['IdGenero']) . "'  selected>" . htmlspecialchars($registro['Genero']) . "</option>
            ";
            
                $result_genero = 'SELECT * FROM Generos';
                $resultado_genero = mysqli_query ($conexao, $result_genero) or die ("Erro ao retornar dados");
                while($row_genero = mysqli_fetch_assoc($resultado_genero)){ 
                echo "<option value='";
                echo $row_genero['IdGenero'];
                echo "'>";
                echo $row_genero['Genero'];
                echo "</option>";
                 
                }
            echo "
            </select>
            </font>
            </td>   
                 </select>
                   </font>";
                echo "</td>";
                echo "</tr>";
                
                echo "
                
                <tr>
                <td>
                <font size='2' face='Verdana, Arial, Helvetica, sans-serif'>CLASSIFICAÇÃO: </font>
                </td>
                <td>
                <font size='2'>
                <select name='classificacao' id='classificacao'>
                <option value='" . htmlspecialchars($registro['IdClassificacao']) . "'  selected>" . htmlspecialchars($registro['Classificacao']) . "</option>
                ";
                
                    $result_classificacao = 'SELECT * FROM Classificacoes';
                    $resultado_classificacao = mysqli_query ($conexao, $result_classificacao) or die ("Erro ao retornar dados");
                    while($row_classificacao = mysqli_fetch_assoc($resultado_classificacao)){ 
                    echo "<option style='color: black;' value='";
                    echo $row_classificacao['IdClassificacao'];
                    echo "'>";
                    echo $row_classificacao['Classificacao'];
                    echo "</option>";
                     
                    }
                echo "
                </select>
                </font>
                </td>
                
                <tr>
                <td>
                <font size='2' face='Verdana, Arial, Helvetica, sans-serif'>IDIOMA: </font>
                </td>
                <td>
                <font size='2'>
                <select name='idioma' id='idioma'>
                <option value='" . htmlspecialchars($registro['IdIdioma']) . "'  selected>" . htmlspecialchars($registro['Idioma']) . "</option>
                    ";
                
                    $result_idioma = 'SELECT * FROM Idiomas';
                    $resultado_idioma = mysqli_query ($conexao, $result_idioma) or die ("Erro ao retornar dados");
                    while($row_idioma = mysqli_fetch_assoc($resultado_idioma)){ 
                    echo "<option style='color: black;' value='";
                    echo $row_idioma['IdIdioma'];
                    echo "'>";
                    echo $row_idioma['Idioma'];
                    echo "</option>";
                     
                    }
                echo "
                </select>
                </font>
                </td>
                
                <tr>
                <td>
                <font size='2' face='Verdana, Arial, Helvetica, sans-serif'>DIRETOR: </font>
                </td>
                <td>
                <font size='2'>
                <select name='diretor' id='diretor'>
                <option value='" . htmlspecialchars($registro['IdDiretor']) . "'  selected>" . htmlspecialchars($registro['NomeDiretor']) . "</option>
                ";
                
                    $result_diretor = 'SELECT * FROM Diretores';
                    $resultado_diretor = mysqli_query ($conexao, $result_diretor) or die ("Erro ao retornar dados");
                    while($row_diretor = mysqli_fetch_assoc($resultado_diretor)){ 
                    echo "<option style='color: black;' value='";
                    echo $row_diretor['IdDiretor'];
                    echo "'>";
                    echo $row_diretor['NomeDiretor'];
                    echo "</option>";
                     
                    }
                echo "
                </select>
                </font>
                </td>
                
               <tr>
                <td>
                <font size='2' face='Verdana, Arial, Helvetica, sans-serif'>ATORES: </font>
                </td>
                <td>
                <font size='2'>
                <select name='ator1' id='ator1'>
                <option value='" . htmlspecialchars($registro['IdAtor']) . "'  selected>" . htmlspecialchars($registro['Ator1']) . "</option>
                ";
                
                    $result_ator = 'SELECT * FROM Atores';
                    $resultado_ator = mysqli_query ($conexao, $result_ator) or die ("Erro ao retornar dados");
                    while($row_ator = mysqli_fetch_assoc($resultado_ator)){ 
                    echo "<option value='";
                    echo $row_ator['IdAtor'];
                    echo "'>";
                    echo $row_ator['Nome'];
                    echo "</option>";
                    }
                echo "
                </select>
                </font>
                </td>
                
                <TR>
                <td>
                <font size='2' face='Verdana, Arial, Helvetica, sans-serif'> </font>
                </td>
                <td>
                <font size='2'>
                <select name='ator2' id='ator2'>
                <option value='" . htmlspecialchars($registro['IdAtor']) . "'  selected>" . htmlspecialchars($registro['Ator2']) . "</option>
                ";
                
                    $result_ator = 'SELECT * FROM Atores';
                    $resultado_ator = mysqli_query ($conexao, $result_ator) or die ("Erro ao retornar dados");
                    while($row_ator = mysqli_fetch_assoc($resultado_ator)){ 
                    echo "<option value='";
                    echo $row_ator['IdAtor'];
                    echo "'>";
                    echo $row_ator['Nome'];
                    echo "</option>";
                     
                    }
                echo "
                </select>
                </font>
                </td>
                
                <tr>
                <td>
                <font size='2' face='Verdana, Arial, Helvetica, sans-serif'> </font>
                </td>
                <td>
                <font size='2'>
                <select name='ator3' id='ator3'>
                <option value='" . htmlspecialchars($registro['IdAtor']) . "'  selected>" . htmlspecialchars($registro['Ator3']) . "</option>
                ";
                
                    $result_ator = 'SELECT * FROM Atores';
                    $resultado_ator = mysqli_query ($conexao, $result_ator) or die ("Erro ao retornar dados");
                    while($row_ator = mysqli_fetch_assoc($resultado_ator)){ 
                    echo "<option value='";
                    echo $row_ator['IdAtor'];
                    echo "'>";
                    echo $row_ator['Nome'];
                    echo "</option>";
                     
                    }
                echo "
                </select>
                </font>
                </td>
                ";
                
            echo "<tr>";
            echo "<tr>";
            echo "<td width='118'><font size='2' face='Verdana, Arial, Helvetica, sans=serif'>DESCRIÇÃO: </font></td>";
            echo "<td width='460'>";
            echo "<input name='descricao' type='text' id='descricao' size='52' maxlenght='150' value=" . $registro['Descricao'] . " ";
            echo "</td>";
            echo "</tr>";
                
            echo "<tr>";
            echo "<tr>";
            echo "<td width='118'><font size='2' face='Verdana, Arial, Helvetica, sans=serif'>LINK DA FOTO(url): </font></td>";
            echo "<td width='460'>";
            echo "<input name='foto' type='text' id='foto' size='52' maxlenght='150' value=" . $registro['Foto'] . " ";
            echo "</td>";
            echo "</tr>";
            
            echo "<tr>";
            echo "<td height='22'></td>";
            echo "<td>";
            echo "<input name='Submit' type='submit' class='botao' value='Atualizar'>";
            echo "<input name='Reset' type='reset' class='botao' value='Limpar campos'>";
            echo "<button class='botao' type='submit' formaction='crudFilme.php?acao=selecionar'>Voltar</button>";
            echo "</td>";
            echo "</tr>";
            echo "</tr>";
            

        }
        echo "</table>";
        echo "</form>";
        
        echo "
            <div>
            <br>
                <footer>
                <p> Copyright 2022 - by Lais Costa ST<br/>
                <a style='text-decoration: none; color: #AAA;' href='https://github.com/LaisST' target='_blank'>GitHub</a>|<a style='text-decoration: none; color: #AAA;' href='https://www.linkedin.com/in/lais-costa-santos-teixeira/' target=_blank> Linkedin </a></p>
            </footer>  
            </div>
        ";
        

        
        mysqli_close($conexao);
        
        break;
        
    #/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        
    case 'atualizar':
        $id = $_POST['id']; 
        $titulo = $_POST['titulo'];
        $duracao = $_POST['duracao'];
        $produtora = $_POST['produtora'];
        $lancamento = $_POST['lancamento'];
        $genero = $_POST['genero'];
        $classificacao = $_POST['classificacao'];
        $idioma = $_POST['idioma'];
        $diretor = $_POST['diretor'];
        $descricao = $_POST['descricao'];
        $ator1 = $_POST['ator1'];
        $ator2 = $_POST['ator2'];
        $ator3 = $_POST['ator3'];
        $foto = $_POST['foto'];
        
        $sqlUpdate = "UPDATE Filmes SET Titulo = '" . $titulo . "', Descricao = '" . $descricao . "', Duracao = '" . $duracao . "', Produtora = '" . $produtora . "', Lancamento = '" . $lancamento . "', IdGenero = '" . $genero . "', IdClassificacao = '" . $classificacao . "', IdIdioma = '" . $idioma . "', IdDiretor = '" . $diretor . "', Ator1 = '" . $ator1 . "', Ator2 = '" . $ator2 . "', Ator3 = '" . $ator3 . "', Foto = '" . $foto . "' WHERE IdFilme = '" . $id . "'";
        
        if (!mysqli_query($conexao, $sqlUpdate)){
            die('</br> Erro no comando SQL UPDATE: ' . mysqli_error($conexao));
        }else{
            echo "<script language='javascript' type='text/javascript'>
            alert('Dados Atualizados com Sucesso!')
            window.location.href='crudFilme.php?acao=selecionar'</script>";
        }
        
        mysqli_close($conexao);
        
        
        break;
        
    #////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    case 'deletar':
        $sqlDelete = "DELETE FROM Filmes WHERE IdFilme = '" . $id . "'";
        
        if (!mysqli_query($conexao, $sqlDelete)){
            die ('Error: '.mysqli_error($conexao));
        }else{
            echo "<script language='javascript' type='text/javascript'>
            alert('Filme excluído com sucesso!')
            window.location.href='crudFilme.php?acao=selecionar'</script>";
        }
        mysqli_close($conexao);
        header("Location:crudFilme.php?acao=selecionar");
       
       
        

        
        break;
        
#//////////////////////////////////////////////////////////////////////////////////////////////////////////////
        
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
        
        
        
        $sqlSelect = "SELECT * , Generos.Genero, Classificacoes.Classificacao, Idiomas.Idioma, Diretores.NomeDiretor, A.Nome as Ator1, AA.Nome as Ator2, AAA.Nome as Ator3
        FROM Filmes 
        inner join Classificacoes on (Classificacoes.IdClassificacao = Filmes.IdClassificacao) 
        inner join Generos on (Generos.IdGenero = Filmes.IdGenero) 
        inner join Idiomas on (Idiomas.IdIdioma = Filmes.IdIdioma)
        inner join Diretores on (Diretores.IdDiretor = Filmes.IdDiretor)
        inner join Atores as A on (A.IdAtor = Filmes.Ator1)
        inner join Atores as AA on (AA.IdAtor = Filmes.Ator2)
        inner join Atores as AAA on (AAA.IdAtor = Filmes.Ator3)
        order by Titulo
        ";
        
        $resultado = mysqli_query($conexao, $sqlSelect) or die ("Erro ao retornar dados");
        
        echo "</br>";
        
        while ($registro = mysqli_fetch_array($resultado)){
            $id = $registro['IdFilme'];
            $titulo = $registro['Titulo'];
            $descricao = $registro['Descricao'];
            $duracao = $registro['Duracao'];
            $produtora = $registro['Produtora'];
            $lancamento = $registro['Lancamento'];
            $genero = $registro['Genero'];
            $classificacao = $registro['Classificacao'];
            $idioma = $registro['Idioma'];
            $diretor = $registro['NomeDiretor'];
            $ator1 = $registro['Ator1'];
            $ator2 = $registro['Ator2'];
            $ator3 = $registro['Ator3'];

            $foto = $registro['Foto'];       
     
            echo "<center>";
            echo "</br>";
            echo "<h2 style='text-align: center';'margin: 10px;'>". $titulo . "</h2>";
            echo "<a style='margin: 10px;'><img height='250' width='200' src='". $foto . "'></a><br>";
            echo "<a style=margin: 10px;'><b>ID:</b> ". $id . "</a></br>";
            echo "<a style='margin: 10px;'><b>DURAÇÃO:</b>". $duracao . "</a></br>";
            echo "<a style='margin: 10px;'><b>GÊNERO: </b>". $genero . "</a></br>";
            echo "<a style='margin: 10px;'><b>CLASSIFICAÇÃO: </b>". $classificacao . "</a></br>";
            echo "<a style='margin: 10px;'><b>IDIOMA: </b>". $idioma . "</a><br>";
            echo "<a style='margin: 10px;'><b>DATA DE LANÇAMENTO:</b>". date("d/m/y", strtotime($lancamento)) . "</a><br>";
            echo "<br>";
            echo "<a style='margin: 10px;'><b>PRODUTORA: </b>". $produtora . "</a></br>";
            echo "<a style='margin: 10px;'><b>DIRETOR: </b>". $diretor . "</a></br>";
            echo "<a style='margin: 10px;'><b>Atores</b></br>";
            echo "<a style='margin: 10px;'>". $ator1 . "</a></br>";
            echo "<a style='margin: 10px;'>". $ator2 ."</a></br>";
            echo "<a style='margin: 10px;'>". $ator3 ."</a></br>";
           

          
            echo "<br>";
            echo "<p style='margin: 10px;'><b>DESCRIÇÃO:</b> ". $descricao . "</p>";
            echo "<br>";

            echo "<a style='text-decoration: none; color: #AAA; margin: 10px;'  href='crudFilme.php?acao=deletar&id=$id'>Deletar</a>
            <a style='text-decoration: none; color: #AAA; margin: 10px;' href='crudFilme.php?acao=montar&id=$id'>Atualizar</a> 
            <br>
            <br>
            ";
    
            echo "<hr WIDTH=90%>";
        }
        echo "<br>";
        echo "<p> Copyright 2022 - by Lais Costa ST<br/>";
        echo "<p style='text-decoration: none; color: #AAA;' href='https://github.com/LaisST' target='_blank'>GitHub</p>
        <p style='text-decoration: none; color: #AAA;' href='https://www.linkedin.com/in/lais-costa-santos-teixeira/' target=_blank> Linkedin </p>";

        mysqli_close($conexao);
        break;
        
        
}        
        
        
    ?>

</body>
</html>
