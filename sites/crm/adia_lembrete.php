<?php
//echo"<br> adia lembretes...";
include("../crm/Connections/conexao.php");
$host="localhost"; // Host name
$username="root"; // Mysql username
$password=""; // Mysql password
$db_name="crm"; // Database name

$con = mysql_connect($host,$username,$password) or die(mysql_error());

mysql_select_db($db_name, $con) or die(mysql_error());

$id = $_GET["id1"];

$query = mysql_query("SELECT * FROM lembretes where lembrete_id = '$id'");
$row = mysql_fetch_array($query) or die(mysql_error());

if($row["lembrete_vezes"] < "3"){

$vezes = $row["lembrete_vezes"] + 1;

if($row["lembrete_minuto"] < "45"){

$minuto = $row["lembrete_minuto"]+15;
$hora = $row["lembrete_hora"];

}elseif($row["lembrete_minuto"] == "46"){
$minuto = "01";
$hora = $row["lembrete_hora"]+1;

}elseif($row["lembrete_minuto"] == "47"){
$minuto = "02";
$hora = $row["lembrete_hora"]+1;

}elseif($row["lembrete_minuto"] == "48"){
$minuto = "03";
$hora = $row["lembrete_hora"]+1;

}elseif($row["lembrete_minuto"] == "49"){
$minuto = "04";
$hora = $row["lembrete_hora"]+1;

}elseif($row["lembrete_minuto"] == "50"){
$minuto = "05";
$hora = $row["lembrete_hora"]+1;

}elseif($row["lembrete_minuto"] == "51"){
$minuto = "06";
$hora = $row["lembrete_hora"]+1;

}elseif($row["lembrete_minuto"] == "52"){
$minuto = "07";
$hora = $row["lembrete_hora"]+1;

}elseif($row["lembrete_minuto"] == "53"){
$minuto = "08";
$hora = $row["lembrete_hora"]+1;

}elseif($row["lembrete_minuto"] == "54"){
$minuto = "09";
$hora = $row["lembrete_hora"]+1;

}elseif($row["lembrete_minuto"] == "55"){
$minuto = "10";
$hora = $row["lembrete_hora"]+1;

}elseif($row["lembrete_minuto"] == "56"){
$minuto = "11";
$hora = $row["lembrete_hora"]+1;

}elseif($row["lembrete_minuto"] == "57"){
$minuto = "12";
$hora = $row["lembrete_hora"]+1;

}elseif($row["lembrete_minuto"] == "58"){
$minuto = "13";
$hora = $row["lembrete_hora"]+1;

}elseif($row["lembrete_minuto"] == "59"){
$minuto = "14";
$hora = $row["lembrete_hora"]+1;
}

}


mysql_query("UPDATE lembretes SET lembrete_hora = '$hora', lembrete_minuto = '$minuto', lembrete_vezes = '$vezes' where lembrete_id = '$id'") or die(mysql_error());

header("Location: index.php");

?>