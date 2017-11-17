<?php require_once('../../Connections/conexao.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

mysql_select_db($database_conexao, $conexao);
$query_Recordset = "SELECT * FROM prospectos";
$Recordset = mysql_query($query_Recordset, $conexao) or die(mysql_error());
$row_Recordset = mysql_fetch_assoc($Recordset);
$totalRows_Recordset = mysql_num_rows($Recordset);

$q = strtolower($_GET["q"]);
if (!$q) return;
$items = array(
	"Maciel"=>"peter@pan.de",
	"Molly"=>"molly@yahoo.com",
	"Forneria Marconi"=>"live@japan.jp",
	"Master Sync"=>"205bw@samsung.com",
	"Dr. Tech de Log"=>"g15@logitech.com",
	"Don Corleone"=>"don@vegas.com",
	"Mc Chick"=>"info@donalds.org",
	"Donnie Darko"=>"dd@timeshift.info",
	"Quake The Net"=>"webmaster@quakenet.org",
	"Dr. Write"=>"write@writable.com"
);

$result = array();
foreach ($items as $key=>$value) {
	if (strpos(strtolower($key), $q) !== false) {
		array_push($result, array(
			"name" => $key,
			"to" => $value
		));
	}
}
echo json_encode($result);

mysql_free_result($Recordset);
?>
