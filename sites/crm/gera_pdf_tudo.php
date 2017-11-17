<?php

session_start();

$data_i2 = $_GET["data_i"];
$data_f2 = $_GET["data_f"];

$atendente = $_SESSION['usuarioID'];
$nivel = $_SESSION['usuarioNivel'];

$con = mysql_connect("186.202.152.65","educagenesis1","genesis1995");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("educagenesis1", $con);


//CONTINUAR DAQUI
if($nivel == '0'){
$query = mysql_query("SELECT * FROM clientes where cliente_atendente_id = '$atendente' ORDER BY cliente_id DESC");
$row = mysql_fetch_array($query);
}

if($nivel == '1'){
	
	if($data_i2 != "--" and $data_f2 != "--"){
		$query = mysql_query("SELECT * FROM clientes WHERE cliente_historico_data BETWEEN '$data_i2' AND '$data_f2' ORDER BY cliente_historico_data DESC");
		}else{
	$query = mysql_query("SELECT * FROM clientes ORDER BY cliente_id DESC");
$row = mysql_fetch_array($query);
}
}
//$id = $row["cliente_id"];




if($nivel == '0'){
$query2 = mysql_query("SELECT * FROM clientes where cliente_atendente_id = '$atendente' ORDER BY cliente_nome ASC");
} else

if($nivel == '1'){
	if($data_i2 != "--" and $data_f2 != "--"){
			$query2 = mysql_query("SELECT * FROM clientes WHERE cliente_historico_data BETWEEN '$data_i2' AND '$data_f2' ORDER BY cliente_historico_data DESC");
		}else{
$query2 = mysql_query("SELECT * FROM clientes ORDER BY cliente_nome ASC");
		}
}

require_once("fpdf/fpdf.php");
 
$pdf= new FPDF("P","pt","A4");
while($row2 = mysql_fetch_array($query2)){	

$nome = $row2["cliente_nome"];
$responsavel = $row2["cliente_responsavel"];
$email = $row2["cliente_email"];
$telefone = $row2["cliente_tel_fixo"];
$celular = $row2["cliente_tel_cel"];
$skype = $row2["cliente_skype"];
$endereco = $row2["cliente_endereco"];
$bairro = $row2["cliente_bairro"];
$cep = $row2["cliente_cep"];
$origem = $row2["cliente_origem"];
$cidade = $row2["cliente_cidade"];
$uf = $row2["cliente_uf"];

$pdf->SetMargins(10, 10, 10);
$pdf->SetY(1);
$pdf->SetTextColor('70,70,70');
$pdf->Cell(575,822,"",1,1,'');
$pdf->Image('images/logo.jpg',40,25,'');
$pdf->SetTitle('RELATÓRIO GERENCIAL EDUCA GENESIS', '');
$pdf->SetFont('arial','',14);
$pdf->SetTextColor('70,70,70');
$pdf->SetX(550);
//$pdf->Cell(0,5,$pdf->PageNo(),0,1,'L');
$pdf->SetFont('arial','B',20);
$pdf->SetTextColor('70,70,70');
$pdf->Ln(15);
$pdf->SetY(50);
$pdf->SetX(240);
$pdf->Cell(0,5,$row2["cliente_nome"],0,1,'L');

//CAMPOS NOME ESCOLA/RESPONSAVEL/EMAIL
$pdf->Ln(40);


$pdf->SetTextColor(246,246,246);
$pdf->SetFont('arial','B',10);
$pdf->SetFillColor(100,100,100);
$pdf->SetX(11);
$pdf->Cell(190,20,"Nome da Escola",0,1,'C',1);
$pdf->Ln(0);
$pdf->SetFont('arial','',10);
$pdf->SetX(11);
$pdf->SetFillColor(246,246,246);
$pdf->SetTextColor(100,100,100);
$pdf->Cell(190,20,$nome,0,1,'C',1);

$pdf->SetFont('arial','B',10);
$pdf->SetFillColor(100,100,100);
$pdf->SetTextColor(246,246,246);
$pdf->SetY(95);
$pdf->SetX(202);
$pdf->Cell(180,20,"Responsavel",0,1,'C',1);
$pdf->SetFont('arial','',10);
$pdf->SetX(202);
$pdf->SetFillColor(246,246,246);
$pdf->SetTextColor(100,100,100);
$pdf->Cell(180,20,$responsavel,0,1,'C',1);

$pdf->SetY(95);
$pdf->SetX(383);
$pdf->SetFont('arial','B',10);
$pdf->SetFillColor(100,100,100);
$pdf->SetTextColor(246,246,246);
$pdf->Cell(200,20,"E-mail",0,1,'C',1);
$pdf->SetFont('arial','',10);
$pdf->SetX(383);
$pdf->SetFillColor(246,246,246);
$pdf->SetTextColor(100,100,100);
$pdf->Cell(200,20,$email,0,1,'C',1);

//CAMPOS TELEFONE/CELULAR/MSN-SKYPE

$pdf->Ln(2);
$pdf->SetTextColor(246,246,246);
$pdf->SetFont('arial','B',10);
$pdf->SetFillColor(100,100,100);
$pdf->SetX(11);
$pdf->Cell(190,20,"Telefone Fixo",0,1,'C',1);
$pdf->Ln(0);
$pdf->SetFont('arial','',10);
$pdf->SetX(11);
$pdf->SetFillColor(246,246,246);
$pdf->SetTextColor(100,100,100);
$pdf->Cell(190,20,$telefone,0,1,'C',1);

$pdf->SetFont('arial','B',10);
$pdf->SetFillColor(100,100,100);
$pdf->SetTextColor(246,246,246);
$pdf->SetY(137);
$pdf->SetX(202);
$pdf->Cell(180,20,"Telefone Celular",0,1,'C',1);
$pdf->SetFont('arial','',10);
$pdf->SetX(202);
$pdf->SetFillColor(246,246,246);
$pdf->SetTextColor(100,100,100);
$pdf->Cell(180,20,$celular,0,1,'C',1);

$pdf->SetY(137);
$pdf->SetX(383);
$pdf->SetFont('arial','B',10);
$pdf->SetFillColor(100,100,100);
$pdf->SetTextColor(246,246,246);
$pdf->Cell(200,20,"Msn/Skype",0,1,'C',1);
$pdf->SetFont('arial','',10);
$pdf->SetX(383);
$pdf->SetFillColor(246,246,246);
$pdf->SetTextColor(100,100,100);
$pdf->Cell(200,20,$skype,0,1,'C',1);

//CAMPOS ENDEREÇO/CIDADE/UF

$pdf->Ln(2);
$pdf->SetTextColor(246,246,246);
$pdf->SetFont('arial','B',10);
$pdf->SetFillColor(100,100,100);
$pdf->SetX(11);
$pdf->Cell(372,20,"Endereço",0,1,'C',1);
$pdf->Ln(0);
$pdf->SetFont('arial','',10);
$pdf->SetX(11);
$pdf->SetFillColor(246,246,246);
$pdf->SetTextColor(100,100,100);

if($endereco != ""){
$pdf->Cell(372,20,$endereco." - ".$bairro." - CEP: ".$cep,0,1,'C',1);
}else{
$pdf->Cell(372,20,"N/D",0,1,'C',1); }	
	

$pdf->SetFont('arial','B',10);
$pdf->SetFillColor(100,100,100);
$pdf->SetTextColor(246,246,246);
$pdf->SetY(179);
$pdf->SetX(384);
$pdf->Cell(168,20,"Cidade",0,1,'C',1);
$pdf->SetFont('arial','',10);
$pdf->SetX(384);
$pdf->SetFillColor(246,246,246);
$pdf->SetTextColor(100,100,100);
$pdf->Cell(168,20,$cidade,0,1,'C',1);

$pdf->SetY(179);
$pdf->SetX(553);
$pdf->SetFont('arial','B',10);
$pdf->SetFillColor(100,100,100);
$pdf->SetTextColor(246,246,246);
$pdf->Cell(30,20,"UF",0,1,'C',1);
$pdf->SetFont('arial','',10);
$pdf->SetX(553);
$pdf->SetFillColor(246,246,246);
$pdf->SetTextColor(100,100,100);
$pdf->Cell(30,20,$uf,0,1,'C',1);

//HISTORICO

$pdf->Ln(2);
$pdf->SetTextColor(246,246,246);
$pdf->SetFont('arial','B',10);
$pdf->SetFillColor(100,100,100);
$pdf->SetX(11);
$pdf->Cell(572.5,20,"Histórico do Cliente",0,1,'C',1);

$id = $row2["cliente_id"];

$query3 = mysql_query("SELECT * FROM historico where historico_prospecto_id = '$id' ORDER BY historico_id DESC");

while($row3 = mysql_fetch_array($query3)){

$aux = explode('-',$row3["historico_data"]);
 
$data = $aux[2]."/".$aux[1]."/".$aux[0];
	
$pdf->Ln(0);
$pdf->SetFont('arial','',10);
$pdf->SetX(11);
$pdf->SetFillColor(246,246,246);
$pdf->SetTextColor(100,100,100);
$pdf->Cell(572.5,20,$row3["historico_atendente"]." em ".$data." as ".$row3["historico_hora"],0,1,'C',1);
$pdf->SetFillColor(255,255,255); 
$pdf->SetTextColor(100,100,100);
$pdf->SetX(11.5);
$pdf->Cell(572.5,20,$row3["historico_mensagem"],0,1,'C',1);
}
}

mysql_close($con);
$pdf->Ln(8);
$acao = $_GET["acao"];

if($acao == "view"){
$pdf->Output();
}else{
$pdf->Output("arquivo.pdf","D"); 
}

?>