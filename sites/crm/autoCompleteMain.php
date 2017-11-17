<?php

@session_start();

$host="localhost"; // Host name
$username="root"; // Mysql username
$password=""; // Mysql password
$db_name="crm"; // Database name


$con = mysql_connect($host,$username,$password) or die(mysql_error());

mysql_select_db($db_name, $con) or die(mysql_error());


//echo"<br>aqui:<pre>";print_r($GLOBALS);echo"</pre>";
$q = "1";//strtolower($_GET["q"]);

if (!$q) return;


$sql = "select DISTINCT prospecto_nome as prospecto_nome, prospecto_id from prospectos where prospecto_nome LIKE '%$q%' OR prospecto_responsavel LIKE '%$q%' OR prospecto_cidade LIKE '%$q%' and prospecto_status = '1'";
//echo"<br>sql: ".$sql;
$rsd = mysql_query($sql);

    while(@$rs = mysql_fetch_array(@$rsd)) {
        $cname = $rs['prospecto_nome'];
        $cid = $rs['prospecto_id'];

        echo "$cid - $cname\n";
    }

?>