<?php

//echo"<br> usuario...";
include("../crm/Connections/conexao.php");
$host="localhost"; // Host name
$username="root"; // Mysql username
$password=""; // Mysql password
$db_name="crm"; // Database name

$con = mysql_connect($host,$username,$password) or die(mysql_error());

mysql_select_db($db_name, $con) or die(mysql_error());

ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', dirname(__FILE__) . '/error_log.txt');

error_reporting(E_ALL);

$mes_atual = date("m");

if(isset($_POST["mes"]) and !empty($_POST["mes"])){
$mes = $_POST["mes"];
}else{
	$mes = $mes_atual;
}

$query = mysql_query("SELECT * FROM clientes order by cliente_nasc ASC");
$row = mysql_fetch_array($query);

//$data_nasc = $row["cliente_data_nasc"]; 

$data_nasc = "25/12/1986";

$aux = explode('/',$data_nasc);
 
//$mes = $aux[1];
if($mes == "todos"){
$query1 = mysql_query("SELECT * FROM clientes where cliente_nasc > '0' order by cliente_nome ASC");
}else{
	$query1 = mysql_query("SELECT * FROM clientes where cliente_nasc LIKE '___$mes%'");}

/*while($row1 = mysql_fetch_array($query1)){
	echo $row1["cliente_id"]."<br>";
	
};*/


	
	
if($mes == "01"){
	$mes1 = "Janeiro";
	}elseif($mes == "02"){
	$mes1 = "Fevereiro";
	}elseif($mes == "03"){
	$mes1 = "Março";
	}elseif($mes == "04"){
	$mes1 = "Abril";
	}elseif($mes == "05"){
	$mes1 = "Maio";
	}elseif($mes == "06"){
	$mes1 = "Junho";
	}elseif($mes == "07"){
	$mes1 = "Julho";
	}elseif($mes == "08"){
	$mes1 = "Agosto";
	}elseif($mes == "09"){
	$mes1 = "Setembro";
	}elseif($mes == "10"){
	$mes1 = "Outubro";
	}elseif($mes == "11"){
	$mes1 = "Novembro";
	}elseif($mes == "12"){
	$mes1 = "Dezembro";
	}elseif($mes = "Todos"){
	$mes1 = "Todos os Meses";
	}
	
	
	





?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<style type="text/css">

#aniversariantes {
	font-family: Arial, Helvetica, sans-serif; font-size: 12px;
	}

</style>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Aniversariantes</title>
</head>

<body>

<div id="aniversariantes">

<table style="width: auto;  border: 1px solid #CCC; min-width: 300px;" align="center">
  <tr>
    <td colspan="2" align="center" style="font-size: 14px; background-color: #666; color: #FFF;"><strong><?php echo "Aniversariantes de ".$mes1; ?></strong></td>
    </tr>
  <tr align="center"><td align="center"><form id="mes1" name="mes1" method="POST" action="<?php $_SERVER["PHP_SELF"]; ?>">
  <select name="mes" id="mes">
  <option value="">Escolha o mês</option>
  <option value="todos">Todos</option>
  <option value="01">Janeiro</option>
  <option value="02">Fevereiro</option>
  <option value="03">Março</option>
  <option value="04">Abril</option>
  <option value="05">Maio</option>
  <option value="06">Junho</option>
  <option value="07">Julho</option>
  <option value="08">Agosto</option>
  <option value="09">Setembro</option>
  <option value="10">Outubro</option>
  <option value="11">Novembro</option>
  <option value="12">Dezembro</option>
  
  </select>
  
  <input type="submit" value="Enviar" name="enviar" />
  </form>
  
  </td>
    </tr>
  <tr>
    <td style="width:auto;"><strong>Cliente</strong></td>
    <td align="right"><strong>Nascimento</strong></td>
    </tr>
    <?php while($row1 = mysql_fetch_array($query1)){ ?>
  <tr>
    <td><?php echo $row1["cliente_nome"]; ?></td>
    <td align="right"><?php echo $row1["cliente_nasc"]; ?></td>
    </tr>
    
    <?php } ?>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>

</div>

</body>
</html>