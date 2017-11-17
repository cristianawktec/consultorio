<?php

//echo"<br> edita lembretes...";
include("../crm/Connections/conexao.php");
$host="localhost"; // Host name
$username="root"; // Mysql username
$password=""; // Mysql password
$db_name="crm"; // Database name

$con = mysql_connect($host,$username,$password) or die(mysql_error());

mysql_select_db($db_name, $con) or die(mysql_error());

$id = $_GET["id"];

$query1 = mysql_query("SELECT * FROM lembretes where lembrete_id = '$id'");
$row1 = mysql_fetch_array($query1);

$data_exibe = $row1["lembrete_data"];
$aux2 = explode("-", $data_exibe);
$data_exibe1 = $aux2[2]."/".$aux2[1]."/".$aux2[0]; 

?>



<?php if(isset($_POST["data"]) and !empty($_POST["data"])){
    //echo"<br>post: <pre>";print_r($_POST);echo"</pre>";
session_start();

$atendente = $_SESSION['usuarioID'];
$nivel = $_SESSION['usuarioNivel'];
$titulo = $_POST["titulo"];
$mensagem = $_POST["lembrete"];
$data = $_POST["data"];
$hora = $_POST["hora"];
$minuto = $_POST["minutos"];
$lembrete = $_POST["lembrete"];
$horario = $hora.":".$minuto.":00";
$data_cadastro = date("d/m/Y");
$aux = explode('/', $data_cadastro);
$data_cadastro1 = $aux[2]."-".$aux[1]."-".$aux[0];

$aux1 = explode('/', $data);
$data1 = $aux1[2]."-".$aux1[1]."-".$aux1[0];


$query = mysql_query("SELECT * FROM usuarios where id = '$atendente'");
$row = mysql_fetch_array($query);

$atendente_nome = $row["nome"];

mysql_query("UPDATE lembretes SET lembrete_titulo = '$titulo', lembrete_mensagem='$mensagem', lembrete_data='$data1', lembrete_hora='$hora', lembrete_minuto='$minuto' where lembrete_id = '$id'") or die(mysql_error());

echo "<script>alert('Lembrete Atualizado com Sucesso');

window.location.href='lembretes.php';

</script>";

} 


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Editar Lembretes</title>

<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script>
$(function() {
    $( "#calendario" ).datepicker({
		dateFormat: 'dd/mm/yy',
		changeMonth: true,
        changeYear: true,
		dayNames: ['Domingo','Segunda','Ter�a','Quarta','Quinta','Sexta','S�bado','Domingo'],
        dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
        dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','S�b','Dom'],
        monthNames: ['Janeiro','Fevereiro','Mar�o','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
        monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez']
		
		


		 //showButtonPanel:true
        /*showOn: "button",
        buttonImage: "images/icone-calendario.png",
        buttonImageOnly: true*/
    });
});
</script>

<style type="text/css">

body {background-color:#EEE;}

.texto {border:1px solid #CCC; height: 20px;}

.ui-datepicker {
    font-size: 10px;
}

</style>

</head>

<body>

<form name="lembretes" id="lembretes" action="<?php $_SERVER['PHP_SELF']; ?>?id=<?php echo $id; ?>" method="POST">

  <table border="0" align="center" style="font-family:Arial, Helvetica, sans-serif; font-size: 12px; background-color: #EEE; border: 1px solid #CCC; padding: 10px;">
  <tr>
    <td align="center">T&iacute;tulo</td>
  </tr>
  <tr>
    <td align="center"><input type="text" name="titulo"  class="texto" id="titulo" value="<?php echo $row1["lembrete_titulo"]; ?>" /></td>
  </tr>
  <tr>
    <td align="center">Data</td>
  </tr>
  <tr>
    <td align="center"><input type="text" name="data"  class="texto" value="<?php echo $data_exibe1; ?>" id="calendario" /></td>
  </tr>
  <tr>
    <td align="center">Hor&aacute;rio</td>
  </tr>
  <tr>
    <td align="center"><input type="text" name="hora"  value="<?php echo $row1["lembrete_hora"]; ?>" class="texto" maxlength="2" id="hora" style="width:30px;" />Horas<input type="text" class="texto" maxlength="2" name="minutos"  value="<?php echo $row1["lembrete_minuto"]; ?>" style="width:30px" />Minutos</td>
  </tr>
  <tr>
    <td align="center">Lembrete</td>
  </tr>
  <tr>
    <td align="center"><textarea name="lembrete" id="lembrete" style="width: 140px; min-width:140px; max-width: 140px; min-height: 80px; max-height: 80px; border: 1px solid #CCC;"><?php echo $row1["lembrete_mensagem"]; ?></textarea></td>
  </tr>
  <tr>
    <td align="center"><input type="submit" name="enviar" value="Salvar" /></td>
  </tr>
</table>




</form> 

</body>
</html>