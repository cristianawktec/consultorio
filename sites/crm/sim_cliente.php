<?php 

$prospID = $_GET["prospID"];

if($prospID != ""){

$con = mysql_connect("mysql.awktec.com","awktec02","crmadmin");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("awktec02", $con);

$query = mysql_query("SELECT * FROM prospectos where prospecto_id = '$prospID'");
$row = mysql_fetch_array($query);

$cli_id = $row["prospecto_id"];
$nome = $row["prospecto_nome"];
$responsavel = $row["prospecto_responsavel"];
$email = $row["prospecto_email"];
$tel_fixo = $row["prospecto_tel_fixo"];
$tel_fixo2 = $row["prospecto_tel_fixo2"];
$tel_fixo3 = $row["prospecto_tel_fixo3"];
$tel_cel = $row["prospecto_tel_cel"];
$tel_cel2 = $row["prospecto_tel_cel2"];
$tel_cel3 = $row["prospecto_tel_cel3"];
$origem = $row["prospecto_origem"];
$cidade = $row["prospecto_cidade"];
$estado = $row["prospecto_uf"];
$data1 = $row["prospecto_data"];
$user = $row["prospecto_atendente"];
$user_id = $row["prospecto_atendente_id"];
$atendente = $row["prospecto_atendente_edita"];
$atendente_id = $row["prospecto_atendente_edita_id"];
$historico_data = $row["prospecto_historico_data"];
$prospecto_ultimo_historico = $row["prospecto_ultimo_historico"];
$data_hj = date("d/m/Y");
$hora = date("h:i:s");
$data_nasc = $row["prospecto_data_nasc"];


$query1 = mysql_query("INSERT INTO clientes (cliente_prospecto_id, cliente_responsavel, cliente_nome, cliente_email, cliente_tel_fixo, cliente_tel_fixo2, cliente_tel_fixo3, cliente_tel_cel, cliente_tel_cel2, cliente_tel_cel3, cliente_nasc, cliente_origem, cliente_cidade, cliente_cidade2, cliente_cidade3, cliente_cidade4, cliente_cidade5, cliente_cidade6, cliente_uf, cliente_uf2, cliente_uf3, cliente_uf4, cliente_uf5, cliente_uf6, cliente_data, cliente_historico_data, cliente_ultimo_historico, cliente_atendente, cliente_atendente_edita, cliente_atendente_id, cliente_atendente_edita_id) VALUES ('$cli_id', '$responsavel', '$nome', '$email', '$tel_fixo', '$tel_fixo2', '$tel_fixo3', '$tel_cel', '$tel_cel2', '$tel_cel3', '$data_nasc', '$origem', '$cidade', '$cidade2', '$cidade3', '$cidade4', '$cidade5', '$cidade6', '$estado', '$estado2', '$estado3', '$estado4', '$estado5', '$estado6', '$data1', CURDATE(), 'Movido de Prospectos para Clientes','$user', '$atendente', '$user_id', '$atendente_id')") or die(mysql_error());





$query_exibe = mysql_query("SELECT cliente_id FROM clientes where cliente_prospecto_id = '$cli_id'");

$row = mysql_fetch_array($query_exibe);

$id_cliente = $row["cliente_id"];

$query_update = mysql_query("UPDATE historico SET historico_prospecto_id = '$id_cliente' where historico_prospecto_id = '$cli_id'");

$query3 = mysql_query("INSERT INTO historico (historico_prospecto_id, historico_mensagem, historico_data, historico_hora, historico_atendente, historico_atendente_id) VALUES ('$id_cliente', 'Movido de Prospectos para Clientes', CURDATE(), '$hora', '$user', '$user_id')") or die(mysql_error());


$query2 = mysql_query("DELETE FROM prospectos where prospecto_id = '$prospID'");

mysql_close($con);

header("Location: edita_cliente.php?id4=$id_cliente");

}else{
	echo "<script>alert('Parâmetro incorreto, você será redirecionado para a página principal.');
		  window.location.href = 'index.php'; 
		  </script>";

}
?>