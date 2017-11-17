<?php 
include("conexao.php");

$id = $_GET["id"];


$query = mysql_query("DELETE FROM banco_arquivos where arquivo_id = '$id'") or die(mysql_error());

echo "<script> alert('excluido com sucesso'); 
window.location.href='exibe-arquivos.php?id=1';


</script>";

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sem t&iacute;tulo</title>
</head>

<body>
</body>
</html>