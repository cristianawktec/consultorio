<?php 

$id = $_GET["id"];

if(isset($_GET["id"]) and !empty($id)){

require_once("conexao.php");

mysql_query("UPDATE clientes SET cliente_standby= '1' where cliente_id = '$id' ");

mysql_close($con);

header("Location: edita_clientes.php");
}



?>