<?php

@session_start();

$host="localhost"; // Host name
$username="root"; // Mysql username
$password=""; // Mysql password
$db_name="crm"; // Database name


$con = mysql_connect($host,$username,$password) or die(mysql_error());

mysql_select_db($db_name, $con) or die(mysql_error());


$q = strtolower($_GET["q"]);
if (!$q) return;


$sql = "select DISTINCT cliente_nome as cliente_nome, cliente_id from clientes where cliente_nome LIKE '%$q%' OR cliente_responsavel LIKE '%$q%' OR cliente_cidade LIKE '%$q%' and cliente_status='1'";
$rsd = mysql_query($sql);

    while($rs = mysql_fetch_array($rsd)) {
        $cname = $rs['cliente_nome'];
        $cid = $rs['cliente_id'];
        echo "$cid - $cname\n";
    }

?>