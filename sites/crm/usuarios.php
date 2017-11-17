<?php
//echo"<br> usuario...";
include("../crm/Connections/conexao.php");
$host="localhost"; // Host name
$username="root"; // Mysql username
$password=""; // Mysql password
$db_name="crm"; // Database name


$con = mysql_connect($host,$username,$password) or die(mysql_error());

mysql_select_db($db_name, $con) or die(mysql_error());

session_start();

$atendente = $_SESSION['usuarioID'];//echo"<br> atendente: ".$atendente;
$nivel = $_SESSION['usuarioNivel'];//echo"<br> nivel: ".$nivel;

echo"<br>";

if($nivel == "1"){

$query = mysql_query("SELECT * FROM usuarios") or die(mysql_error());
$row = mysql_fetch_array($query);
    //echo"<br>resultado: <pre>";print_r($row);echo"</pre>";exit;
mysql_close($con);

}else{
	
	echo "
	<script>
	alert('Você não tem permissão para acessar esta página!');
	window.location.href='index.php';
	 </script>
	";
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>GERENCIAR USUÁRIOS</title>

<style type="text/css">

body{ background-color: #EEE;}

</style>


<script>

function popUPadd(nome, url, settings){
    var  w, h, left, top
    
    w=screen.width
    h=screen.height    
        
    left=(w-230)/2
    top=(h-200)/2
    
    settings+=", left="+left+", top="+top
    	
    window.open(url, nome, settings)
}

</script>

</head>

<body>

<table border="0" align="center" style="font-family:Arial, Helvetica, sans-serif; font-size: 12px; text-align: center; width: 200px; background-color:  #EEE; border: 1px solid #CCC; ">
  <tr bgcolor="#CCCCCC";>
    <td colspan="4"><a href="javascript:popUPadd('janelaUsuarios1', 'add_user.php', 'width=230,height=140,toolbar=no,menubar=no,status=no,scrollbars=no,resizable=no')">Adicionar Usuario</a></td>
  </tr>
  <tr bgcolor="#CCCCCC";>
    <td>Nome</td>
    <td>Usuario</td>
    <td colspan="2">A&ccedil;&atilde;o</td>
  </tr>
  <?php while($row = mysql_fetch_array($query)){ ?>
  <tr>
    <td><?php echo $row["nome"]; ?></td>
    <td><?php echo $row["usuario"]; ?></td>
    <td><a href="edita_user.php?id=<?php echo $row["id"]; ?>"><img src="images/icon-edit.gif" width="14" border="0" /></a></td>
    <td><a href="del_user.php?id=<?php echo $row["id"]; ?>"><img src="images/icon_excluir.png" width="14" border="0"/></a></td>
  </tr>
  <?php } ?>

</table>


</body>
</html>