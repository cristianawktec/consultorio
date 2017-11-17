<?php
//echo"<br> exportar...";
//echo"<br><pre>del: ";print_r($GLOBALS);echo"</pre>";
include("../crm/Connections/conexao.php");
$host="localhost"; // Host name
$username="root"; // Mysql username
$password=""; // Mysql password
$db_name="crm"; // Database name

//echo"<br>post: <pre>";print_r($_POST);echo"</pre>";
//echo"<br>get: <pre>";print_r($_GET);echo"</pre>";exit;

$con = mysql_connect($host,$username,$password) or die(mysql_error());

mysql_select_db($db_name, $con) or die(mysql_error());


$query = mysql_query("SELECT * FROM prospectos where prospecto_origem = 'Indicação' ORDER BY prospecto_nome ASC");

$query1 = mysql_query("SELECT * FROM prospectos where prospecto_origem = 'site' ORDER BY prospecto_nome ASC");

$query2 = mysql_query("SELECT * FROM prospectos where prospecto_origem = 'ligação direta' ORDER BY prospecto_nome ASC");
 
 mysql_close($con);
 

$data = date("d-m-Y");
 
$arquivo = "prospectos_".$data;
 
$html = '';
$html .= '<table border="1" align="center" style="text-align: center;">';
$html .= '<tr>';
$html .= '<td colspan="8" align="center" style="background-color: #00C; color: #FFF;"><b>Indicação</b></td>';
$html .= '</tr>';
$html .= '<tr style="text-align: center;">';
$html .= '<td style="background-color: #B7DEE8;"><b>Cliente</b></td>';
$html .= '<td style="background-color: #B7DEE8;"><b>Responsável</b></td>';
$html .= '<td style="background-color: #B7DEE8;"><b>E-mail</b></td>';
$html .= '<td style="background-color: #B7DEE8;"><b>Telefone Fixo</b></td>';
$html .= '<td style="background-color: #B7DEE8;"><b>Telefone Celular</b></td>';
$html .= '<td style="background-color: #B7DEE8;"><b>Cidade</b></td>';
$html .= '<td style="background-color: #B7DEE8;"><b>UF</b></td>';
$html .= '<td style="background-color: #B7DEE8;"><b>Data de Cadastro</b></td>';
$html .= '</tr>';

while($row = mysql_fetch_array($query)){

$html .= '<tr style="text-align: center;">';
$html .= '<td>'.$row["prospecto_nome"].'</td>';
$html .= '<td>'.$row["prospecto_responsavel"].'</td>';
$html .= '<td>'.$row["prospecto_email"].'</td>';
$html .= '<td>'.$row["prospecto_tel_fixo"].'</td>';
$html .= '<td>'.$row["prospecto_tel_cel"].'</td>';
$html .= '<td>'.$row["prospecto_cidade"].'</td>';
$html .= '<td>'.$row["prospecto_uf"].'</td>';
$html .= '<td>'.$row["prospecto_data"].'</td>';
$html .= '</tr>';

	
}

$html .= '<tr>';
$html .= '<td colspan="8"></td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td colspan="8" align="center" style="background-color: #093; color: #FFF;"><b>Site</b></td>';
$html .= '</tr>';
$html .= '<tr style="text-align: center;">';
$html .= '<td style="background-color: #D8E4BC;"><b>Cliente</b></td>';
$html .= '<td style="background-color: #D8E4BC;"><b>Responsável</b></td>';
$html .= '<td style="background-color: #D8E4BC;"><b>E-mail</b></td>';
$html .= '<td style="background-color: #D8E4BC;"><b>Telefone Fixo</b></td>';
$html .= '<td style="background-color: #D8E4BC;"><b>Telefone Celular</b></td>';
$html .= '<td style="background-color: #D8E4BC;"><b>Cidade</b></td>';
$html .= '<td style="background-color: #D8E4BC;"><b>UF</b></td>';
$html .= '<td style="background-color: #D8E4BC;"><b>Data de Cadastro</b></td>';
$html .= '</tr>';

while($row1 = mysql_fetch_array($query1)){
$html .= '<tr style="text-align: center;">';
$html .= '<td>'.$row1["prospecto_nome"].'</td>';
$html .= '<td>'.$row1["prospecto_responsavel"].'</td>';
$html .= '<td>'.$row1["prospecto_email"].'</td>';
$html .= '<td>'.$row1["prospecto_tel_fixo"].'</td>';
$html .= '<td>'.$row1["prospecto_tel_cel"].'</td>';
$html .= '<td>'.$row1["prospecto_cidade"].'</td>';
$html .= '<td>'.$row1["prospecto_uf"].'</td>';
$html .= '<td>'.$row1["prospecto_data"].'</td>';
$html .= '</tr>';
	
}

$html .= '<tr>';
$html .= '<td colspan="8"></td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td colspan="8" align="center" style="background-color: #C60; color: #FFF;"><b>Ligação Direta</b></td>';
$html .= '</tr>';
$html .= '<tr style="text-align: center;">';
$html .= '<td style="background-color: #FCD5B4;"><b>Cliente</b></td>';
$html .= '<td style="background-color: #FCD5B4;"><b>Responsável</b></td>';
$html .= '<td style="background-color: #FCD5B4;"><b>E-mail</b></td>';
$html .= '<td style="background-color: #FCD5B4;"><b>Telefone Fixo</b></td>';
$html .= '<td style="background-color: #FCD5B4;"><b>Telefone Celular</b></td>';
$html .= '<td style="background-color: #FCD5B4;"><b>Cidade</b></td>';
$html .= '<td style="background-color: #FCD5B4;"><b>UF</b></td>';
$html .= '<td style="background-color: #FCD5B4;"><b>Data de Cadastro</b></td>';
$html .= '</tr>';

while($row2 = mysql_fetch_array($query2)){
$html .= '<tr style="text-align: center;">';
$html .= '<td>'.$row2["prospecto_nome"].'</td>';
$html .= '<td>'.$row2["prospecto_responsavel"].'</td>';
$html .= '<td>'.$row2["prospecto_email"].'</td>';
$html .= '<td>'.$row2["prospecto_tel_fixo"].'</td>';
$html .= '<td>'.$row2["prospecto_tel_cel"].'</td>';
$html .= '<td>'.$row2["prospecto_cidade"].'</td>';
$html .= '<td>'.$row2["prospecto_uf"].'</td>';
$html .= '<td>'.$row2["prospecto_data"].'</td>';
$html .= '</tr>';
	
}


$html .= '</table>';
 


header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
header ("Cache-Control: no-cache, must-revalidate");
header ("Pragma: no-cache");
header ("Content-type: application/x-msexcel");
header ("Content-Disposition: attachment; filename=\"{$arquivo}\"" );
header ("Content-Description: PHP Generated Data" );

echo $html;
exit;
 
?>