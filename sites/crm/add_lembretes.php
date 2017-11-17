<?php
//echo"<br> adiciona lembretes...";
include("../crm/Connections/conexao.php");
$host="localhost"; // Host name
$username="root"; // Mysql username
$password=""; // Mysql password
$db_name="crm"; // Database name

$con = mysql_connect($host,$username,$password) or die(mysql_error());

mysql_select_db($db_name, $con) or die(mysql_error());

if(isset($_POST["data"]) and !empty($_POST["data"])){

session_start();

$atendente = $_SESSION['usuarioID'];
$nivel = $_SESSION['usuarioNivel'];
$titulo = $_POST["titulo"];
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

mysql_query("INSERT INTO lembretes (lembrete_titulo, lembrete_data_cadastro, lembrete_mensagem, lembrete_data, lembrete_hora, lembrete_minuto, lembrete_atendente, lembrete_atendente_id) VALUES ('$titulo', '$data_cadastro1', '$lembrete', '$data1', '$hora', '$minuto', '$atendente_nome', '$atendente')") or die(mysql_error());

echo "<script>alert('Lembrete Cadastrado com Sucesso');

window.close();

</script>";

} 


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Adicionar Lembretes</title>

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

<form name="lembretes" id="lembretes" action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">

  <table border="0" align="center" style="font-family:Arial, Helvetica, sans-serif; font-size: 12px; background-color: #EEE; border: 1px solid #CCC; padding: 10px;">
  <tr>
    <td align="center">T&iacute;tulo</td>
  </tr>
  <tr>
    <td align="center"><input type="text" name="titulo"  class="texto" id="titulo" /></td>
  </tr>
  <tr>
    <td align="center">Data</td>
  </tr>
  <tr>
    <td align="center"><input type="text" name="data"  class="texto" id="calendario" /></td>
  </tr>
  <tr>
    <td align="center">Hor&aacute;rio</td>
  </tr>
  <tr>
    <td align="center"><input type="text" name="hora" class="texto" maxlength="2" id="hora" style="width:30px;" />Horas<input type="text" class="texto" maxlength="2" name="minutos" style="width:30px" />Minutos</td>
  </tr>
  <tr>
    <td align="center">Lembrete</td>
  </tr>
  <tr>
    <td align="center"><textarea name="lembrete" id="lembrete" style="width: 140px; min-width:140px; max-width: 140px; min-height: 80px; max-height: 80px; border: 1px solid #CCC;"></textarea></td>
  </tr>
  <tr>
    <td align="center"><input type="submit" name="enviar" value="Cadastrar" /></td>
  </tr>
</table>




</form> 

</body>
</html>