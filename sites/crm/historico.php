<?php 

session_start();



$id = $_GET["id"];

$idd = $_GET["idd"];

$mensagem = $_POST["mensagem"];

$atendente = $_SESSION['usuarioID'];

$nivel = $_SESSION['usuarioNivel'];

include_once('conexao.php');

$atendentes = mysql_query("SELECT * FROM usuarios where id = '$atendente'");

$row_atendentes = mysql_fetch_array($atendentes);

$user = $row_atendentes["nome"];

if($idd != ""){

$hora = date("H:i:s");

mysql_query("INSERT INTO historico (historico_prospecto_id, historico_mensagem, historico_data, historico_hora, historico_atendente, historico_atendente_id, historico_atendente_nivel ) VALUES ('$idd','$mensagem', CURDATE(), '$hora', '$user', '$atendente', '$nivel')");

mysql_query("UPDATE prospectos SET prospecto_historico_data = CURDATE(), prospecto_ultimo_historico = '$mensagem' WHERE prospecto_id='$idd'");



$result = mysql_query("SELECT * FROM historico where historico_prospecto_id = '$idd' ORDER BY historico_id DESC");



$result1 = mysql_query("SELECT * FROM prospectos where prospecto_id = '$idd'");

$row1 = mysql_fetch_array($result1);


$result2 = mysql_query("SELECT * FROM usuarios where usuario_id = '$atendente'");
$row2 = mysql_fetch_array($result2);

echo "<script>

window.location.href='historico.php?id=$idd';

</script>";

}else{



$result = mysql_query("SELECT * FROM historico where historico_prospecto_id = '$id' ORDER BY historico_id DESC");



$result1 = mysql_query("SELECT * FROM prospectos where prospecto_id = '$id'");
$row1 = mysql_fetch_array($result1);

}


mysql_close($con);


?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />



<META NAME="robots" CONTENT="noindex, nofollow">



<META NAME="robots" CONTENT="noarchive">



<META NAME="robots" CONTENT="index, nofollow, noarchive">



<title>Hist&oacute;rico de <?php echo $row1["prospecto_nome"]; ?> </title>



<style type="text/css">



body{font-family:Arial, Helvetica, sans-serif; font-size: 12px; }



</style>



</head>



<body>



<div id="tabela" style="overflow:scroll; height:580px; width:540px;">

Historico do prospecto <?php echo $row1["prospecto_nome"]; ?><br /><br />









<table width="530" border="0" style="width: 523px;">



<tr>

<td>

<form id="historico" name="historico" method="POST" action="<?php $_SERVER['PHP_SELF']; ?>?idd=<?php echo $row1["prospecto_id"]; ?>">

<textarea id="mensagem" name="mensagem" style="width: 300px; height:100px; min-height:100px; min-width:300px; max-height:100px; max-width: 300px;"></textarea><br />

<input type="submit" name="envia" value="Enviar" />

</form>

</td>

</tr>

<tr >

<td>&nbsp;



</td>

</tr>

<?php while($row = mysql_fetch_array($result)){ 



if ($contacor % 2 == 1){

$coratual = "#B7DEE8";

}else{

$coratual = "#DAEEF3"; }

$contacor++;	



$aux2 = explode('-',$row["historico_data"]);



 

$data_f2 = $aux2[2]."/".$aux2[1]."/".$aux2[0];



?>

  <tr>

  <?php if($row["historico_atendente_nivel"] == "1"){ ?>

    <td bgcolor="<?=$coratual?>" style="color:#F00;"><strong><?php echo $row["historico_atendente"]; ?> em <?php echo $data_f2; ?> as <?php echo $row["historico_hora"]; ?>- </strong><?php echo $row["historico_mensagem"]; ?> </td>

    <?php }else{ ?>

    <td bgcolor="<?=$coratual?>"><strong><?php echo $row["historico_atendente"]; ?> em <?php echo $data_f2; ?> as <?php echo $row["historico_hora"]; ?></strong> - <?php echo $row["historico_mensagem"]; ?> </td>

    <?php } ?>

    <td>&nbsp;</td>

  </tr>

<?php } ?>

</table>







</div>





</body>

</html>