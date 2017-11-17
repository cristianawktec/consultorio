<?php $origem = $_GET["origem"];

if($origem == "prospecto"){

$nome = $_POST["nome"];
$email = $_POST["email"];
$tel_fixo = $_POST["tel_fixo"];
$tel_cel = $_POST["tel_cel"];
$origem = $_POST["origem"];
$cidade = $_POST["cidade"];
$estado = $_POST["estado"];
$obs = $_POST["obs"];


echo $nome;

$con = mysql_connect("localhost","root","genesis2012");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("CRM", $con);

mysql_query("INSERT INTO prospectos VALUES ($nome, $email, $tel_fixo, $tel_cel, $obs)");



mysql_close($con);

//header('Location: lista_prospectos.php');
}

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
</body>
</html>