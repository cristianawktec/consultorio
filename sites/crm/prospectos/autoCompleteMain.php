<?php

session_start();


$host="localhost"; // Host name
$username="root"; // Mysql username
$password="genesis2012"; // Mysql password
$db_name="crm"; // Database name

$con = mysql_connect($host,$username,$password) or die(mysql_error());
mysql_select_db($db_name, $con) or die(mysql_error());

$q = strtolower($_GET["q"]);
if (!$q) return;

$sql = "select DISTINCT prospecto_nome as prospecto_nome, prospecto_id from prospectos where prospecto_nome LIKE '%$q%'";
$rsd = mysql_query($sql);
while($rs = mysql_fetch_array($rsd)) {
$cname = $rs['prospecto_nome'];
$cid = $rs['prospecto_id'];

echo "$cid - $cname\n";

}
?>