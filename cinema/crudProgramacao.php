<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/main.css">

    <title>PROGRAMAÇÃO CINETOPIA</title>
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
            <h1  style="text-align: center; color: white;  font-family: Georgia, serif; margin:20px ">Programação Cinetopia</h1>
        </div>
    </div>
        
    <div class="container">

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
                           

        <form  method='post' action='crudProgramacao.php?acao=inserir' name='dados' onSubmit='return enviardados();'>
        <center><table width='588' border='0' align='center'>

        <tr>
        <td>
        <font size='2' face='Verdana, Arial, Helvetica, sans-serif'>CINEMA: </font>
        </td>
        <td>
        <font size='2'>
        <select name='cinema' id='cinema'>
        <option disabled selected>Escolha uma opção</option>
            ";
            
                $result_cinema = 'SELECT * FROM Cinemas';
                $resultado_cinema = mysqli_query ($conexao, $result_cinema) or die ("Erro ao retornar dados");
                while($row_cinema = mysqli_fetch_assoc($resultado_cinema)){ 
                echo "<option value='";
                echo $row_cinema['IdCinema'];
                echo "'>";
                echo $row_cinema['NomeCinema'];
                echo "</option>";
                 
                }
            echo "
        </select>
        </font>
        </td>
        
        <tr>
        <td>
        <font size='2' face='Verdana, Arial, Helvetica, sans-serif'>FILME: </font>
        </td>
        <td>
        <font size='2'>
        <select name='filme' id='filme'>
        <option disabled selected>Escolha uma opção</option>
            ";
            
                $result_filme = 'SELECT * FROM Filmes';
                $resultado_filme = mysqli_query ($conexao, $result_filme) or die ("Erro ao retornar dados");
                while($row_filme = mysqli_fetch_assoc($resultado_filme)){ 
                echo "<option value='";
                echo $row_filme['IdFilme'];
                echo "'>";
                echo $row_filme['Titulo'];
                echo "</option>";
                 
                }
            echo "
        </select>
        </font>
        </td>   
        
        
        <tr>
        <td>
        <font size='2' face='Verdana, Arial, Helvetica, sans-serif'>DIA: </font>
        </td>
        <td>
        <font size='2'>
        <select name='dia' id='dia'>
        <option disabled selected>Escolha uma opção</option>
            ";
            
                $result_dia = 'SELECT * FROM Dias';
                $resultado_dia = mysqli_query ($conexao, $result_dia) or die ("Erro ao retornar dados");
                while($row_dia = mysqli_fetch_assoc($resultado_dia)){ 
                echo "<option value='";
                echo $row_dia['IdDia'];
                echo "'>";
                echo $row_dia['Dia'];
                echo "</option>";
                 
                }
            echo "
        </select>
        </font>
        </td> 
        
        <tr>
        <td>
        <font size='2' face='Verdana, Arial, Helvetica, sans-serif'>HORA: </font>
        </td>
        <td>
        <font size='2'>
        <select name='hora' id='hora'>
        <option disabled selected>Escolha uma opção</option>
            ";
            
                $result_hora = 'SELECT * FROM Horas';
                $resultado_hora = mysqli_query ($conexao, $result_hora) or die ("Erro ao retornar dados");
                while($row_hora = mysqli_fetch_assoc($resultado_hora)){ 
                echo "<option value='";
                echo $row_hora['IdHora'];
                echo "'>";
                echo $row_hora['Hora'];
                echo "</option>";
                 
                }
            echo "
        </select>
        </font>
        </td> 

         <tr>
        <td height='22'></td>
        <td>
        <br>
        <input name='Submit' type='submit' class='botao' value='Cadastrar'>
        <input name='Reset' type='reset' class='botao' value='Limpar campos'>
        <button class='botao' type='submit' formaction='crudProgramacao.php?acao=selecionar'>Voltar</button>
        </td>
        </tr>
        </table>
        </form>
        
        ";
        mysqli_close($conexao);
        break;
        
    #////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    case 'inserir':

        $cinema = $_POST['cinema'];
        $filme = $_POST['filme'];
        $dia = $_POST['dia'];
        $hora = $_POST['hora'];
        
    
        $sqlInsert = "INSERT INTO CinemaFilme (IdCinema, IdFilme, IdDia, IdHora) 
        values ('$cinema', '$filme', '$dia', '$hora')";
            
        if (!mysqli_query($conexao,$sqlInsert)) {
            die("Erro ao cadastrar a nova Programação: ".mysqli_error($conexao));
        }else{
            echo "<script language='javascript' type='text/javascript'>
        alert('Programação cadastrado com sucesso!')
        window.location.href='crudProgramacao.php?acao=selecionar'</script>";
        }

        
        break;

    
#///////////////////////////////////////////////////////////////////////////////////
        case 'montar':
        $id = $_GET['id'];
        $sql = 'SELECT * , Cinemas.NomeCinema , Filmes.Titulo, Dias.Dia, Horas.Hora FROM CinemaFilme inner join Cinemas on (Cinemas.IdCinema = CinemaFilme.IdCinema) inner join Filmes on (Filmes.IdFilme = CinemaFilme.IdFilme) inner join Dias on (Dias.IdDia = CinemaFilme.IdDia) inner join Horas on (Horas.IdHora = CinemaFilme.IdHora)  WHERE IdCinemaFilme ='. $id;
        $resultado = mysqli_query($conexao, $sql) or die ("Erro ao retornar dados");
        
        //Montando o formulário 

        echo "<form method='post' name='dados' action='crudProgramacao.php?acao=atualizar' onSubmit='return enviardados();'>";
        echo "<center><table width='588' border='0' >";
        
         while ($registro = mysqli_fetch_array($resultado)){
            echo "<tr>";
            echo "<td width='118'><font size='2' face='Verdana, Arial, Helvetica, sans-serif'>ID:</font></td>";
            echo "<td width='400'>";
            echo "<input name='id' type='text' class='formbutton' id='id' size='5' maxlenght='10' value=" . $id . " readonly>";
            echo "</td>";
            echo "</tr>";
            echo "
        <tr>
        <td>
        <font size='2' face='Verdana, Arial, Helvetica, sans-serif'>CINEMA: </font>
        </td>
        <td>
        <font size='2'>
        <select name='cinema' id='cinema'>
        <option value='" . htmlspecialchars($registro['IdCinema']) . "'  selected>" . htmlspecialchars($registro['NomeCinema']) . "</option>
            ";
            
                $result_cinema = 'SELECT * FROM Cinemas ';
                $resultado_cinema = mysqli_query ($conexao, $result_cinema) or die ("Erro ao retornar dados");
                while($row_cinema = mysqli_fetch_assoc($resultado_cinema)){ 
                echo "<option value='";
                echo $row_cinema['IdCinema'];
                echo "'>";
                echo $row_cinema['NomeCinema'];
                echo "</option>";
                 
                }
            echo "
        </select>
        </font>
        </td>
        
        <tr>
        <td>
        <font size='2' face='Verdana, Arial, Helvetica, sans-serif'>FILME: </font>
        </td>
        <td>
        <font size='2'>
        <select name='filme' id='filme'>
        <option value='" . htmlspecialchars($registro['IdFilme']) . "'  selected>" . htmlspecialchars($registro['Titulo']) . "</option>
            ";
            
                $result_filme = 'SELECT * FROM Filmes';
                $resultado_filme = mysqli_query ($conexao, $result_filme) or die ("Erro ao retornar dados");
                while($row_filme = mysqli_fetch_assoc($resultado_filme)){ 
                echo "<option value='";
                echo $row_filme['IdFilme'];
                echo "'>";
                echo $row_filme['Titulo'];
                echo "</option>";
                 
                }
            echo "
        </select>
        </font>
        </td>   
        
        
        <tr>
        <td>
        <font size='2' face='Verdana, Arial, Helvetica, sans-serif'>DIA: </font>
        </td>
        <td>
        <font size='2'>
        <select name='dia' id='dia'>
        <option value='" . htmlspecialchars($registro['IdDia']) . "'  selected>" . htmlspecialchars($registro['Dia']) . "</option>
            ";
            
                $result_dia = 'SELECT * FROM Dias';
                $resultado_dia = mysqli_query ($conexao, $result_dia) or die ("Erro ao retornar dados");
                while($row_dia = mysqli_fetch_assoc($resultado_dia)){ 
                echo "<option value='";
                echo $row_dia['IdDia'];
                echo "'>";
                echo $row_dia['Dia'];
                echo "</option>";
                 
                }
            echo "
        </select>
        </font>
        </td> 
        
        <tr>
        <td>
        <font size='2' face='Verdana, Arial, Helvetica, sans-serif'>HORA: </font>
        </td>
        <td>
        <font size='2'>
        <select name='hora' id='hora'>
        <option value='" . htmlspecialchars($registro['IdHora']) . "'  selected>" . htmlspecialchars($registro['Hora']) . "</option>
            ";
            
                $result_hora = 'SELECT * FROM Horas';
                $resultado_hora = mysqli_query ($conexao, $result_hora) or die ("Erro ao retornar dados");
                while($row_hora = mysqli_fetch_assoc($resultado_hora)){ 
                echo "<option value='";
                echo $row_hora['IdHora'];
                echo "'>";
                echo $row_hora['Hora'];
                echo "</option>";
                 
                }
            echo "
        </select>
        </font>
        </td> 
            ";
            echo "<tr>";
            echo "<td>";
            echo "</td>";
            echo "</tr>";
            
            
            echo "<tr>";
            echo "<td height='22'></td>";
            echo "<td>";
            echo "<input name='Submit' type='submit' class='botao' value='Atualizar'>";
            // echo "<input name='Reset' type='reset' class='botao' value='Limpar campos'>";
            echo "<button class='botao' type='submit' formaction='crudProgramacao.php?acao=selecionar'>Voltar</button>";
            echo "</td>";
            echo "</tr>";
            echo "</tr>";
            
        }
        echo "</table>";
        echo "</form>";
    
                
    mysqli_close($conexao);
    
    break;
    
    #/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    
    case 'atualizar':
        $id = $_POST['id']; 
        $cinema = $_POST['cinema'];
        $filme = $_POST['filme'];
        $dia = $_POST['dia'];
        $hora = $_POST['hora'];

        $sqlUpdate = "UPDATE CinemaFilme SET IdCinema = '" . $cinema . "', IdFilme = '" . $filme ."', IdDia = '" . $dia ."', IdHora = '" . $hora ."' WHERE IdCinemaFilme = '" . $id . "'";
        
        if (!mysqli_query($conexao, $sqlUpdate)){
            die('</br> Erro no comando SQL UPDATE: ' . mysqli_error($conexao));
        }else{
            echo "<script language='javascript' type='text/javascript'>
            alert('Dados Atualizados com Sucesso!')
            window.location.href='crudProgramacao.php?acao=selecionar'</script>";
        }
        
        mysqli_close($conexao);
              
        break;
        
    #/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    case 'deletar':
        $sqlDelete = "DELETE FROM CinemaFilme WHERE IdCinemaFilme = '" . $id . "'";
        
        if (!mysqli_query($conexao, $sqlDelete)){
            die ('Error: '.mysqli_error($conexao));
        }else{
            echo "<script language='javascript' type='text/javascript'>
            alert('Dados excluídos com sucesso!')
            window.location.href='crudProgramacao.php?acao=selecionar'</script>";
        }
        mysqli_close($conexao);
        header("Location:crudProgramacao.php?acao=selecionar");
             
        break;
        
    #//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    case 'selecionar':
        date_default_timezone_set('America/Sao_Paulo');
        #header("Content-type: text/html;charset=utf-8");
        include_once "conexao.php";
        
        echo "<meta charset='UTF-8'>";
        echo "
        <div class='botoes'>
        <a class='botao'style='text-decoration: none; margin:20px;' href='crudProgramacao.php?acao=formInserir'>CADASTRAR NOVO</a>
        </div>
        ";
        echo "<center><table border=1>";
        echo "<tr>";
        echo "<th><a style='margin: 10px;'>CÓDIGO</a></th>";
        echo "<th><a style='margin: 10px;'>CINEMA</a></th>";
        echo "<th><a style='margin: 10px;'>FILME</a></th>";
        echo "<th><a style='margin: 10px;'>PROGRAMAÇÃO</a></th>";
        echo "<th><a style='margin: 10px;'>AÇÃO</a></th>";
        
        echo "</tr>";
        
        $sqlSelect = "SELECT * , Cinemas.NomeCinema, Filmes.Titulo, Dias.Dia, Horas.Hora FROM CinemaFilme inner join Cinemas on (Cinemas.IdCinema = CinemaFilme.IdCinema) inner join Filmes on (Filmes.IdFilme = CinemaFilme.IdFilme) inner join Dias on (Dias.IdDia = CinemaFilme.IdDia) inner join Horas on (Horas.IdHora = CinemaFilme.IdHora) order by Cinemas.NomeCinema, Filmes.Titulo ";
        
        $resultado = mysqli_query($conexao, $sqlSelect) or die ("Erro ao retornar dados");
        
        
        echo "</br>";
        
        while ($registro = mysqli_fetch_array($resultado)){
            $id = $registro['IdCinemaFilme'];
            $cinema = $registro['NomeCinema'];
            $filme = $registro['Titulo'];
            $dia = $registro['Dia'];
            $hora = $registro['Hora'];

            
            echo "<tr>";
            echo "<td style='text-align: center;'><a style='margin: 10px;'>". $id . "</a></td>";
            echo "<td style='text-align: center;'><a style='margin: 10px;'>". $cinema . "</a></td>";
            echo "<td style='text-align: center;'><a style='margin: 10px;'>". $filme ."</a></td>";
            echo "<td style='text-align: center;'><a style='margin: 10px;'>". $dia . " - " . $hora ."</a></td>";
            
 
            echo "<td ><a style='text-decoration: none; color: #AAA; margin: 10px;'  href='crudProgramacao.php?acao=deletar&id=$id'>Deletar</a>
            <a style='text-decoration: none; color: #AAA; margin: 10px;' href='crudProgramacao.php?acao=montar&id=$id'>Atualizar</a>
            
            ";
            
        }
        echo "</table>";
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
    

    
    
        
        
        
        
        
}

?>
    <div>
        <br>
        <br>
        <footer>
        <p> Copyright 2022 - by Lais Costa ST<br/>
        <a style='text-decoration: none; color: #AAA;' href='https://github.com/LaisST' target='_blank'>GitHub</a>|<a style='text-decoration: none; color: #AAA;' href='https://www.linkedin.com/in/lais-costa-santos-teixeira/' target=_blank> Linkedin </a></p>
        </footer>  
    </div>
</body>
</html>