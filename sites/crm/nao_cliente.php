<?php 
//echo"<br><pre>";print_r($_POST);echo"</pre>";exit;
$prospID = $_GET["prospID"];

$con = mysql_connect("mysql.awktec.com","awktec02","crmadmin");
if (!$con) {
  die('Could not connect: ' . mysql_error());
}

mysql_select_db("awktec02", $con);

$query = mysql_query("UPDATE prospectos SET prospecto_clienteagora = '1' where prospecto_id = '$prospID'") or die(mysql_error());
mysql_close($con);
header("Location: edita_prospectos.php");

?>

