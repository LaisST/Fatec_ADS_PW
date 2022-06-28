<?php 
define('HOST', 'localhost');
define('USUARIO', 'id19125896_root');
define('SENHA','%]&SdJ>Eb_jYC$s0');
define('DB','id19125896_cinema');

$conexao =mysqli_connect(HOST,USUARIO,SENHA,DB)
or 
die ('Não foi possivel conectar');

echo "<script language='javascript' type='text/javascript'>
    alert('A conexão foi efetuada com sucesso!')
    window.location.href='crudCinema.php</script>";

?>