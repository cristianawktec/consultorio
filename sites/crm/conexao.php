<?php

$con = mysql_connect("localhost","crm","");

if (!$con) {
  die('Could not connect: ' . mysql_error());
}
mysql_select_db("crm", $con);

?>