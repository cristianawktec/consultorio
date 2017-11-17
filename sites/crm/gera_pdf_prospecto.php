<?php
$id = $_GET["id"];

$con = mysql_connect("186.202.152.65","educagenesis1","genesis1995");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("educagenesis1", $con);


$query = mysql_query("SELECT * FROM prospectos");

$query2 = mysql_query("SELECT * FROM prospectos where prospecto_id = '$id'");
$row2 = mysql_fetch_array($query2);


$query3 = mysql_query("SELECT * FROM historico)");

$query4 = mysql_query("SELECT * FROM historico where historico_prospecto_id = '$id' ORDER BY historico_id DESC");
$row4 = mysql_fetch_array($query4);

$query5 = mysql_query("SELECT * FROM historico where historico_prospecto_id = '$id' ORDER BY historico_id DESC");

mysql_close($con);

$nome = $row2["prospecto_nome"];
$responsavel = $row2["prospecto_responsavel"];
$email = $row2["prospecto_email"];
$telefone = $row2["prospecto_tel_fixo"];
$celular = $row2["prospecto_tel_cel"];
$skype = $row2["prospecto_skype"];
$origem = $row2["prospecto_origem"];
$cidade = $row2["prospecto_cidade"];
$uf = $row2["prospecto_uf"];
$atendente = $row4["historico_atendente"];
$data_hst = $row4["historico_data"];
$historico = $row4["historico_mensagem"];

require_once("fpdf/fpdf.php");
 
$pdf= new FPDF("P","pt","A4");
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
$pdf->Cell(0,5,$nome,0,1,'L');

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

$pdf->Ln(2);
$pdf->SetTextColor(246,246,246);
$pdf->SetFont('arial','B',10);
$pdf->SetFillColor(100,100,100);
$pdf->SetX(11);
$pdf->Cell(372,20,"",0,1,'C',1);
$pdf->Ln(0);
$pdf->SetFont('arial','',10);
$pdf->SetX(11);
$pdf->SetFillColor(246,246,246);
$pdf->SetTextColor(100,100,100);
$pdf->Cell(372,20,'',0,1,'C',1);
$pdf->SetY(137);
$pdf->SetX(383);
$pdf->SetFont('arial','B',10);
$pdf->SetFillColor(100,100,100);
$pdf->SetTextColor(246,246,246);
$pdf->Cell(200,20,"Origem",0,1,'C',1);
$pdf->SetFont('arial','',10);
$pdf->SetX(383);
$pdf->SetFillColor(246,246,246);
$pdf->SetTextColor(100,100,100);
$pdf->Cell(200,20,$origem,0,1,'C',1);

//CAMPOS ENDEREÇO/CIDADE/UF

	

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

while($row5 = mysql_fetch_array($query5)){
$aux = explode('-',$row5["historico_data"]);
 
$data = $aux[2]."/".$aux[1]."/".$aux[0];
	
$pdf->Ln(0);
$pdf->SetFont('arial','',10);
$pdf->SetX(11);
$pdf->SetFillColor(246,246,246);
$pdf->SetTextColor(100,100,100);
$pdf->Cell(572.5,20,$row5["historico_atendente"]." em ".$data." as ".$row5["historico_hora"],0,1,'C',1);
$pdf->SetFillColor(255,255,255); 
$pdf->SetTextColor(100,100,100);
$pdf->SetX(0);
 $pdf->MultiCell(600, 20, utf8_decode($row5["historico_mensagem"]),0,'C');

}


$pdf->Ln(8);
$pdf->Output();
//$pdf->Output("arquivo.pdf","D"); 

?>