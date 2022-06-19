<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/main.css">

    <title>DIRETORES CINETOPIA</title>
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
            <h1  style="text-align: center; color: white;  font-family: Georgia, serif; margin:20px ">Diretores</h1>
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
                               
            <form  method='post' action='crudDiretor.php?acao=inserir' name='dados' onSubmit='return enviardados();'>
            <center><table width='588' border='0' align='center'>
            <tr >
            <td width='118'>
            <font size='2' face='Verdana, Arial, Helvetica, sans-serif' >ID DO DIRETOR:</font>
            </td>
            <td width='460'>
            <input name='id' type='number' class='formbutton' id='id' size='52' maxlength='150'>
            </td>
            </tr>
            
            <tr>
            <td width='200'>
            <font size='2' face='Verdana, Arial, Helvetica, sans-serif'>NOME:</font>
            </td>
            <td width='460'>
            <input name='nome' type='text' class='formbutton' id='nome' size='52' maxlength='150'>
            </td>
            </tr>
            
            <tr>
            <td height='22'></td>
            <td>
            <br>
            <input name='Submit' type='submit' class='botao' value='Cadastrar'>
            <input name='Reset' type='reset' class='botao' value='Limpar campos'>
            <button class='botao' type='submit' formaction='crudDiretor.php?acao=selecionar'>Voltar</button>
            </td>
            </tr>
            </table>
            </form>
            ";
            
        mysqli_close($conexao);
        break;
        
        #////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            
        case 'inserir':
        $id = $_POST['id']; 
        $nome = $_POST['nome'];
    
        $sqlInsert = "INSERT INTO Diretores (IdDiretor, NomeDiretor) 
        values ('$id', '$nome')";
            
        if (!mysqli_query($conexao,$sqlInsert)) {
            die("Erro ao cadastrar o novo Diretor: ".mysqli_error($conexao));
        }else{
            echo "<script language='javascript' type='text/javascript'>
        alert('Diretor cadastrado com sucesso!')
        window.location.href='crudDiretor.php?acao=selecionar'</script>";
        }

        break;
            
        #////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
        
        case 'montar':
        $id = $_GET['id'];
        $sql = 'SELECT * FROM Diretores  WHERE IdDiretor ='. $id;
        $resultado = mysqli_query($conexao, $sql) or die ("Erro ao retornar dados");
        
        //Montando o formulário 

        echo "<form method='post' name='dados' action='crudDiretor.php?acao=atualizar' onSubmit='return enviardados();'>";
        echo "<center><table width='588' border='0' >";
        
         while ($registro = mysqli_fetch_array($resultado)){
            echo "<tr>";
            echo "<td width='118'><font size='2' face='Verdana, Arial, Helvetica, sans-serif'>ID DO DIRETOR:</font></td>";
            echo "<td width='400'>";
            echo "<input name='id' type='text' class='formbutton' id='id' size='5' maxlenght='10' value=" . $id . " readonly>";
            echo "</td>";
            echo "</tr>";
            
            echo "<tr>";
            echo "<td width='200'><font size='2' face='Verdana, Arial, Helvetica, sans-serif'>NOME:</font></td>";
            echo "<td rowspan='2'><font size='2'>";
            echo "<style>textarea{resize:none;}</style>";
            echo "<textarea name='nome' cols='50' rows='1' class='formbutton'>" . htmlspecialchars($registro['NomeDiretor']) . "</textarea>";
            echo "</font></td>";
            echo "</tr>";
            
            echo "<tr>";
            echo "<td>";
            echo "</td>";
            echo "</tr>";
            
            
            echo "<tr>";
            echo "<td height='22'></td>";
            echo "<td>";
            echo "<input name='Submit' type='submit' class='botao' value='Atualizar'>";
            // echo "<input name='Reset' type='reset' class='botao' value='Limpar campos'>";
            echo "<button class='botao' type='submit' formaction='crudDiretor.php?acao=selecionar'>Voltar</button>";
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
        $nome = $_POST['nome'];

        $sqlUpdate = "UPDATE Diretores SET NomeDiretor = '" . $nome . "' WHERE IdDiretor = '" . $id . "'";
        
        if (!mysqli_query($conexao, $sqlUpdate)){
            die('</br> Erro no comando SQL UPDATE: ' . mysqli_error($conexao));
        }else{
            echo "<script language='javascript' type='text/javascript'>
            alert('Dados Atualizados com Sucesso!')
            window.location.href='crudDiretor.php?acao=selecionar'</script>";
        }
        
        mysqli_close($conexao);
              
        break;
        
    #/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    case 'deletar':
        $sqlDelete = "DELETE FROM Diretores WHERE IdDiretor = '" . $id . "'";
        
        if (!mysqli_query($conexao, $sqlDelete)){
            die ('Error: '.mysqli_error($conexao));
        }else{
            echo "<script language='javascript' type='text/javascript'>
            alert('Dados excluídos com sucesso!')
            window.location.href='crudDiretor.php?acao=selecionar'</script>";
        }
        mysqli_close($conexao);
        header("Location:crudDiretor.php?acao=selecionar");
             
        break;
        
    #//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        
        case 'selecionar':
            date_default_timezone_set('America/Sao_Paulo');
            #header("Content-type: text/html;charset=utf-8");
            include_once "conexao.php";
            
            echo "<meta charset='UTF-8'>";
            echo "
            <div class='botoes'>
            <a class='botao'style='text-decoration: none; margin:20px;' href='crudDiretor.php?acao=formInserir'>CADASTRAR NOVO</a>
            </div>
            ";
            echo "<center><table border=1>";
            echo "<tr>";
            echo "<th><a style='margin: 10px;'>CÓDIGO</a></th>";
            echo "<th><a style='margin: 10px;'>NOME </a></th>";
            echo "<th><a style='margin: 10px;'>AÇÃO</a></th>";
            echo "</tr>";
            
            $sqlSelect = "SELECT *  FROM Diretores ";
            
            $resultado = mysqli_query($conexao, $sqlSelect) or die ("Erro ao retornar dados");
            
            echo "</br>";
            
            while ($registro = mysqli_fetch_array($resultado)){
                $id = $registro['IdDiretor'];
                $nome = $registro['NomeDiretor'];
     
         
                echo "<tr>";
                echo "<td style='text-align: center;'><a style='margin: 10px;'>". $id . "</a></td>";
                echo "<td style='text-align: center;'><a style='margin: 10px;'>". $nome . "</a></td>";
                
                echo "<td ><a style='text-decoration: none; color: #AAA; margin: 10px;'  href='crudDiretor.php?acao=deletar&id=$id'>Deletar</a>
                <a style='text-decoration: none; color: #AAA; margin: 10px;' href='crudDiretor.php?acao=montar&id=$id'>Atualizar</a>           
                ";
                
            }
            echo "</table>";
           
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
