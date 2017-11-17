<?php

function limitar($string, $tamanho, $encode = 'UTF-8') {
    if( strlen($string) > $tamanho )
        $string = mb_substr($string, 0, $tamanho - 3, $encode) . '...';
    else
        $string = mb_substr($string, 0, $tamanho, $encode);
 
    return $string;
}

 
session_start();

$atendente = $_SESSION['usuarioID'];
$nivel = $_SESSION['usuarioNivel'];

if(!empty($_GET["busca"])){
$busca = $_GET["busca"];
}

$escola = $_POST["escola"];
$responsavel = $_POST["responsavel"];

if(!empty($_POST["atendente"])){
$atendente_id = $_POST["atendente"];

}

$action = $_GET["action"];

if($action == 'del'){
$id = $_GET["id"];
echo "<script>confirma = window.confirm ('Tem certeza que deseja excluir este prospecto?');
if (confirma) window.location.href='deleta.php?id=$id';
else{

window.location.href='edita_prospectos.php'; }


</script>";

}


$data_i = $_POST["data_inicial"];
$data_f = $_POST["data_final"];

$aux = explode('/',$data_i);
 
$data_i2 = $aux[2]."-".$aux[1]."-".$aux[0];

//secho $data_i2;

$aux2 = explode('/',$data_f);
 
$data_f2 = $aux2[2]."-".$aux2[1]."-".$aux2[0];

//echo $data_f2;

include_once('conexao.php');

$result = mysql_query("SELECT * FROM prospectos where prospecto_atendente_id = '$atendente' and prospecto_status = '1' ORDER BY prospecto_id DESC");
$result1 = mysql_query("SELECT * FROM historico ORDER BY historico_prospecto_id DESC");
$row1 = mysql_fetch_array($result1);

//$busca = mysql_query("SELECT * FROM historico WHERE historico_data BETWEEN '$data_i2' AND '$data_f2' order by historico_data DESC");

$prospID = $_GET["prospID"];

if($prospID != ""){
echo "<script>confirma = window.confirm ('Confirmar envio de prospecto para Clientes?');
if (confirma) window.location.href='sim_cliente.php?prospID=$prospID'; 
else{

window.close(); }
</script>
";	
	
}

//$row2 = mysql_fetch_array($busca);


if($nivel == "0"){

if($data_i != "" and $data_f != ""){
$busca2 = mysql_query("SELECT * FROM prospectos WHERE prospecto_historico_data BETWEEN '$data_i2' AND '$data_f2' AND prospecto_atendente_id = '$atendente' and prospecto_status = '1' ORDER BY prospecto_historico_data DESC");

}else{
if($busca != ""){

$busca2 = mysql_query("SELECT * FROM prospectos where prospecto_atendente_id = '$atendente' and prospecto_status = '1' and prospecto_nome LIKE '%$escola%' and prospecto_responsavel LIKE '%$responsavel%' and prospecto_email LIKE '%$email%' ORDER BY prospecto_historico_data DESC");
	
}

if(!isset($busca) and !isset($data_i) and !isset($data_f)){	
$busca2 = mysql_query("SELECT * FROM prospectos where prospecto_atendente_id = '$atendente' and prospecto_status = '1' ORDER BY prospecto_historico_data DESC");
}

}


}
if($nivel == "1"){
	
	if($data_i and $data_f != ""){
$busca2 = mysql_query("SELECT * FROM prospectos WHERE prospecto_historico_data BETWEEN '$data_i2' AND '$data_f2' and prospecto_status = '1' ORDER BY prospecto_historico_data DESC");

}else{

	if($busca != ""){
$busca2 = mysql_query("SELECT * FROM prospectos where prospecto_status = '1' and prospecto_nome LIKE '%$escola%' and prospecto_responsavel LIKE '%$responsavel%' and prospecto_email LIKE '%$email%' ORDER BY prospecto_historico_data DESC");

	}
	
	
			if($busca == "atendente" and $atendente_id != ""){
$busca2 = mysql_query("SELECT * FROM prospectos where prospecto_atendente_id = '$atendente_id' ORDER BY prospecto_historico_data DESC");

$busca45 = mysql_query("SELECT * from usuarios where id = $atendente_id");
$row45 = mysql_fetch_array($busca45);
	}
	
	if($busca == "" and $data_i == "" and $data_f == ""){	
	
	$busca2 = mysql_query("SELECT * FROM prospectos where prospecto_status = '1' ORDER BY prospecto_historico_data DESC");
	
	}

}
}
$atendentes = mysql_query("SELECT * FROM usuarios");
mysql_close($con);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<META NAME="robots" CONTENT="noindex, nofollow">

<META NAME="robots" CONTENT="noarchive">

<META NAME="robots" CONTENT="index, nofollow, noarchive">
<title>LISTA DE PROSPECTOS - GERENCIAMENTO DE RELACIONAMENTO COM O CLIENTE AWK [Vers&atilde;o 1.0]</title>
<style type="text/css">

.texto {width: 200px; border: 1px solid #CCC; height: 15px; padding: 5px; min-height: 15px;}

textarea {width: 200px; border: 1px solid #CCC; height: 100px; padding: 5px; min-width: 200px; max-width: 200px; min-height:100px; }
body {background-color:#EEE;}
#topo {width:auto; height: 40px; background-color:#002599; margin-top: -10px; margin-left: -10px; margin-right: -10px; margin-bottom: 50px; overflow:hidden;}
.form {border: 1px solid #CCC;}
.botao {text-decoration: none;}


td {padding: 0 10px 0 10px;}
</style>

<script type="text/javascript">
   function mascaraData(campodata_inicial){
              var data_inicial = campodata_inicial.value;
              if (data_inicial.length == 2){
                  data_inicial = data_inicial + '/';
                  document.forms[0].data_inicial.value = data_inicial;
      return true;              
              }
              if (data_inicial.length == 5){
                  data_inicial = data_inicial + '/';
                  document.forms[0].data_inicial.value = data_inicial;
                  return true;
              }
         }
</script>

<script type="text/javascript">
   function mascaraData1(campodata_final){
              var data_final = campodata_final.value;
              if (data_final.length == 2){
                  data_final = data_final + '/';
                  document.forms[0].data_final.value = data_final;
      return true;              
              }
              if (data_final.length == 5){
                  data_final = data_final + '/';
                  document.forms[0].data_final.value = data_final;
                  return true;
              }
         }
</script>

<script>
function popUP(nome, url, settings){
    var  w, h, left, top
    
    w=screen.width
    h=screen.height    
        
    left=(w-550)/2
    top=(h-500)/2
    
    settings+=", left="+left+", top="+top
    
	window.open(url, nome, settings)
}

function popUP2(nome, url, settings){
    var  w, h, left, top
    
    w=screen.width
    h=screen.height    
        
    left=(w-550)/2
    top=(h-250)/2
    
    settings+=", left="+left+", top="+top
    
	// w=document.getElementById("course").value;
	
   window.open(url, nome, settings)
}

</script>



</head>

<body>
<div id="topo"> </div>


  
	<table align="center" style="border: 1px solid #CCC; width:auto; font-family: Arial, Helvetica, sans-serif; font-size: 12px; ">
  <tr style="border: none; background-color:#EEE; text-align:center;">
    <td colspan="9"><a href="<?php $_SERVER['PHP_SELF']; ?>" style="font-size:14px">Atualizar</a></td>
  </tr>
  <tr style="border: none; background-color:#EEE; text-align:center;">
    <td colspan="9"><a href="index.php" style="font-size:14px">Voltar</a></td>
  </tr>
  <tr style="border: none; background-color:#CCC; text-align:center;">
    <td colspan="9">Filtrar Prospectos</td>
  </tr>
  <tr style="border: none;  text-align:center;">
    <td colspan="9"><form id="busca" name="busca" method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
Data Inicial<br />
<input type="text" name="data_inicial" OnKeyUp="mascaraData(this);" id="data_inicial" maxlength="10" class="form" /><br />
Data Final<br />
<input type="text" name="data_final" OnKeyUp="mascaraData1(this);" id="data_final" class="form" maxlength="10"/><br />
<input type="submit" name="buscar" value="Buscar" />


</form></td>
  </tr>
  <tr align="center">
   <td colspan="9"><strong>Op&ccedil;&otilde;es de Exporta&ccedil;&atilde;o</strong></td>
  </tr>
  <tr style="border: none; background-color:#EEE; text-align:center;">
    <td colspan="9"><a href="gera_pdf_tudo_prospecto.php?acao=download" target="_blank" class="botao"><input type="button" value="Baixar Arquivo" /></a><a href="gera_pdf_tudo_prospecto.php?acao=view" target="_blank" class="botao"><input type="button" value="Visualizar Arquivo" /></a></td>
  </tr>
   <tr style="border: none; background-color:#EEE; text-align:center;">
  <td colspan="9">&nbsp;</td>	</tr></tr>
  <tr style="border: none; background-color:#CCC; text-align:center;">
    <td colspan="9">Resultado</td>
    </tr>
      <tr style="border: none; background-color:#CCC; text-align:center;">
    <td><form name="busca_escola" method="POST" action="<?php $_SERVER['PHP_SELF']; ?>?busca=escola"><input type="text" name="escola"><br />
<input type="submit" value="Filtrar" name="filtro_escola" /></form></td>
    <td><form name="busca_responsavel" method="POST" action="<?php $_SERVER['PHP_SELF']; ?>?busca=responsavel"><input type="text" name="responsavel"><br />
<input type="submit" value="Filtrar" name="filtro_responsavel" /></form></td>
    <td><?php if($nivel == "1"){ ?>Filtrar por Vendedor<br />
<form name="busca_atendente" method="POST" action="<?php $_SERVER['PHP_SELF']; ?>?busca=atendente"><select name="atendente">
            <option value="<?php echo $row45["id"]; ?>"><?php echo $row45["nome"]; ?></option>
    
    <?php while($row_atendentes = mysql_fetch_array($atendentes)){?>

    <option value="<?php echo $row_atendentes["id"]; ?>"><?php echo $row_atendentes["nome"]; ?></option>

    <?php } ?>
  <br />
  <input type="submit" value="Filtrar" name="filtro_atendente" />
    </select>
    
    </form><?php } ?></td>
    <td><form name="busca_email" method="POST" action="<?php $_SERVER['PHP_SELF']; ?>?busca=todos">
<input type="submit" value="Exibir Todos" name="filtro_email" /></form></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr style="border: none; background-color:#CCC; text-align:center;">
    <td>Cliente</td>
    <td>Respons&aacute;vel</td>
    <td>E-mail</td>
    <td>Telefone</td>
    <td>Celular</td>
    <td>Observa&ccedil;ao</td>
    <td>Origem</td>
    <td>&Uacute;ltimo Hist&oacute;rico</td>
    <td>A&ccedil;&atilde;o</td>

  </tr>
	<?php while($row3 = mysql_fetch_array($busca2)){ 
	if ($contacor % 2 == 1){
$coratual = "#DDDDDD";
}else{
$coratual = "#EEEEEE"; }
$contacor++;	
  
$data = $row3["prospecto_historico_data"];

$aux3 = explode('-',$data);
 
$data_i1 = $aux3[2]."/".$aux3[1]."/".$aux3[0];

//echo $data_i1." ".$row3["prospecto_ultimo_historico"]."<br>";
    
  $id = $row3['prospecto_id'];
  ?>  

<?php if($row3["prospecto_clienteagora"] == "1"){ ?>

  <tr  bgcolor="<?=$coratual?>" style="text-align:center; color:#AAA;">
  
  <?php }else{ ?>
    <tr  bgcolor="<?=$coratual?>" style="text-align:center;">
    <?php } ?>
    <td><a href="javascript:popUP('JanelaEditaProspecto', 'edita_prospecto.php?id4=<?php echo $row3["prospecto_id"]; ?>', 'width=550,height=500,toolbar=no,menubar=no,status=no,scrollbars=no,resizable=yes')"><?php  echo $row3['prospecto_nome']; ?></a></td>
     <td align="right"><?php  echo $row3['prospecto_responsavel']; ?></td>
    <td><?php  echo $row3['prospecto_email']; ?></td>
    <td><?php  echo $row3['prospecto_tel_fixo']; ?></td>
    <td><?php  echo $row3['prospecto_tel_cel']; ?></td>
    <td><?php if($row3["prospecto_ultimo_historico"] != ""){ ?><a href="javascript:popUP('minhaJanela1', 'historico.php?id=<?php echo $row3["prospecto_id"]; ?>', 'width=550,height=500,toolbar=no,menubar=no,status=no,scrollbars=no,resizable=yes')"><?php echo limitar($row3['prospecto_ultimo_historico'], 180); ?></a><?php }else{ ?>
	<a href="javascript:popUP('minhaJanela1', 'historico.php?id=<?php echo $row3["prospecto_id"]; ?>', 'width=550,height=500,toolbar=no,menubar=no,status=no,scrollbars=no,resizable=yes')">Adicionar Observa&ccedil;&atilde;o</a><?php } ?></td>
    <td><?php  echo $row3['prospecto_origem']; ?></td>
    <td><?php  echo $data_i1; ?></td>
    
	<td>
	<a href="javascript:popUP('minhaJanela9', '<?php $_SERVER['PHP_SELF']; ?>?prospID=<?php echo $row3["prospecto_id"]; ?>', 
	'width=550,height=500,toolbar=no,menubar=no,status=no,scrollbars=no,resizable=yes')">
	<img src="images/emoticon_smile.png" width="20" style="padding-right: 5px;" alt="Enviar Para Clientes" 
	title="Enviar para Clientes =)" border="0"/></a>
	<?php //echo"<br>vamo mostra: ".$row3["prospecto_clienteagora"]; 
		if($row3["prospecto_clienteagora"] == "0"){  ?>
		<a href="nao_cliente.php?prospID=<?php echo $row3["prospecto_id"]; ?>">
		<img src="images/emoticon_sad.png" width="20" title="Não deseja ser Cliente agora =(" border="0" /></a>
	<?php } ?>
		<a href="gera_pdf_prospecto.php?id=<?php echo $row3["prospecto_id"]; ?>">
		<img src="images/view.png" width="21" /></a>
		<?php if($nivel == "1"){ ?>
			<a href="<?php $_SERVER['PHP_SELF']; ?>?id=<?php echo $row3["prospecto_id"]; ?>&action=del" >
			<img src="images/icon_excluir.png" width="17" /></a>
		<?php } ?></td>
 
 
  </tr>

<?php
  }
?>

</table>
<div id="rodape" style="font-family:Arial, Helvetica, sans-serif; font-size: 9px; position: absolute; top: 0px; right: 1000px; color:#EEE;"><tr>
      <a href="http://www.awktec.com"><img src="./imagens/logo_awk.png" border="0"></a><i>GERENCIAMENTO DE RELACIONAMENTO COM O CLIENTE <strong>AWK</strong> [Versão 1.0]</i>
    </tr>
    
    </div>
</body>
</html>