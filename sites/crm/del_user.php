<?php
//echo"<br> deleta usuario...";
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

$id = $_GET["id"];

mysql_query("DELETE FROM usuarios where id='$id'");

echo "

<script>
alert('Usuario Excluido com Sucesso!');
window.location.href='usuarios.php';
</script>

";

?>