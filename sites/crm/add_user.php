<?php

//echo"<br> adiciona usuario...";
//echo"<br><pre>del: ";print_r($GLOBALS);echo"</pre>";
include("../crm/Connections/conexao.php");
$host="localhost"; // Host name
$username="root"; // Mysql username
$password=""; // Mysql password
$db_name="crm"; // Database name

//echo"<br>post: <pre>";print_r($_POST);echo"</pre>";
//echo"<br>get: <pre>";print_r($_GET);echo"</pre>";exit;

$con = mysql_connect($host,$username,$password) or die(mysql_error());

mysql_select_db($db_name, $con) or die(mysql_error());

session_start();

$atendente = $_SESSION['usuarioID'];
$nivel = $_SESSION['usuarioNivel'];
if($nivel == "1"){
$nome = @$_POST["nome"];
$usuario = @$_POST["usuario"];
$nivel1 = @$_POST["nivel"];
$senha = @$_POST["senha"];


if($usuario != ""){

mysql_query("INSERT INTO usuarios (nome, usuario, senha, nivel) VALUES ('$nome', '$usuario', '$senha', '$nivel1')") or die(mysql_error());

  echo "
  <script>
  alert('Paciente inserido com sucesso!');
  window.location.href='usuarios.php';
  </script>
  ";

}

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
<title>Adicionar Usuario</title>

<style type="text/css">

body {background-color:#EEE;}

.texto {border:1px solid #CCC; height: 20px;}

</style>
</head>

<body>
<?php

if($_SESSION['PHP_SELF']=='') {
  $_SESSION['PHP_SELF'] = add_user.php;
}

?>
<form id="add_user" name="add_user" method="POST" action="<?php $_SESSION['PHP_SELF']; ?>">
  <table border="0" align="center" style="font-family:Arial, Helvetica, sans-serif; font-size: 12px; background-color: #EEE; border: 1px solid #CCC;">
    <tr>
    <td>Nome</td>
    <td><input type="text" name="nome" class="texto" /></td>
  </tr>
  <tr>
    <td>Usuario</td>
    <td><input type="text" name="usuario" class="texto" /></td>
  </tr>
    <tr>
    <td>Senha</td>
    <td><input type="password" name="senha" class="texto" /></td>
  </tr>
  <tr>
    <td>Nivel de Acesso</td>
    <td><select name="nivel">
      <option value="0">Operador</option>
      <option value="1">Administrador</option>
    </select></td>
  </tr>
  <tr>
    <td><input type="button" name="voltar" value="Voltar" onclick="window.location.href='usuarios.php'" /></td>
    <td><input type="submit" name="envia" value="Cadastrar" /></td>
  </tr>
  </table>

</form>

</body>
</html>