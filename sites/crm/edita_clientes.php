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
$busca = $_GET["busca"];
$escola = $_POST["escola"];
$responsavel = $_POST["responsavel"];
$email = $_POST["email"];


if(!empty($_POST["atendente"])){
$atendente_id = $_POST["atendente"];

}

$action = $_GET["action"];


if($action == 'del'){
$id = $_GET["id"];
echo "<script>confirma = window.confirm ('Tem certeza que deseja excluir este Cliente?');
if (confirma) window.location.href='deleta_cli.php?id=$id';
else{

window.location.href='edita_clientes.php'; }


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

$result = mysql_query("SELECT * FROM clientes WHERE cliente_status = '1' ORDER BY cliente_historico_data DESC");
$result1 = mysql_query("SELECT * FROM historico ORDER BY historico_prospecto_id DESC");
$row1 = mysql_fetch_array($result1);

//$busca = mysql_query("SELECT * FROM historico WHERE historico_data BETWEEN '$data_i2' AND '$data_f2' order by historico_data DESC");


//$row2 = mysql_fetch_array($busca);

if($nivel == "0"){

if($data_i and $data_f != ""){
$busca2 = mysql_query("SELECT * FROM clientes WHERE cliente_historico_data BETWEEN '$data_i2' AND '$data_f2' and cliente_status = '1' ORDER BY cliente_historico_data DESC");

}else{
	
if($busca != ""){

$busca2 = mysql_query("SELECT * FROM clientes where cliente_status = '1' and cliente_nome LIKE '%$escola%' and cliente_responsavel LIKE '%$responsavel%' and cliente_email LIKE '%$email%' ORDER BY cliente_historico_data DESC");
	
}

if($busca == "" and $data_id == "" and $data_f == ""){	
$busca2 = mysql_query("SELECT * FROM clientes where cliente_status = '1' ORDER BY cliente_historico_data DESC");
}

}

}

if($nivel == "1"){
	
	if($data_i and $data_f != ""){
$busca2 = mysql_query("SELECT * FROM clientes WHERE cliente_historico_data BETWEEN '$data_i2' AND '$data_f2' and cliente_status != '0' ORDER BY cliente_historico_data DESC");

}else{
	
	if($busca != ""){
$busca2 = mysql_query("SELECT * FROM clientes where cliente_status != '0' and cliente_nome LIKE '%$escola%' and cliente_responsavel LIKE '%$responsavel%' and cliente_email LIKE '%$email%' ORDER BY cliente_historico_data DESC");

	}
	
		if($busca == "atendente" and $atendente_id != ""){
$busca2 = mysql_query("SELECT * FROM clientes where cliente_status != '0' and cliente_atendente_id = '$atendente_id' ORDER BY cliente_historico_data DESC");

$busca45 = mysql_query("SELECT * from usuarios where id = $atendente_id");
$row45 = mysql_fetch_array($busca45);
	}
	
	if($busca == "" and $data_id == "" and $data_f == ""){	
	
	$busca2 = mysql_query("SELECT * FROM clientes where cliente_status != '0' ORDER BY cliente_historico_data DESC");
	
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
<title>LISTA DE CLIENTES - GERENCIAMENTO DE RELACIONAMENTO COM O CLIENTE EDUCA GENESIS [Vers&atilde;o 1.0]</title>
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
        
    left=(w-580)/2
    top=(h-560)/2
    
    settings+=", left="+left+", top="+top
    
	window.open(url, nome, settings)
}



</script>



</head>

<body>
<div id="topo"> </div>


  
	<table align="center" style="border: 1px solid #CCC; width:auto; font-family: Arial, Helvetica, sans-serif; font-size: 12px; ">
  <tr style="border: none; background-color:#EEE; text-align:center;">
    <td colspan="9"><a href="<?php $_SERVER['PHP_SELF']; ?>" class="botao" style="font-size:14px">Atualizar</a></td>
  </tr>
  <tr style="border: none; background-color:#EEE; text-align:center;">
    <td colspan="9"><a href="index.php" class="botao" style="font-size:14px">Voltar</a></td>
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
  <tr style="border: none; background-color:#EEE; text-align:center;">
    <td colspan="9"><strong>Op&ccedil;&otilde;es de Exporta&ccedil;&atilde;o</strong></td>
  </tr>
  <tr style="border: none; background-color:#EEE; text-align:center;">
    <td colspan="9"><a href="gera_pdf_tudo.php?acao=download" target="_blank" class="botao"><input type="button" value="Baixar Arquivo" /></a><a href="gera_pdf_tudo.php?acao=view&data_i=<?php echo $data_i2; ?>&data_f=<?php echo $data_f2; ?>" target="_blank" class="botao"><input type="button" value="Visualizar Arquivo" /></a></td>
  </tr>
  <tr style="border: none; background-color:#EEE; text-align:center;">
  <td colspan="9">&nbsp;</td></tr>
  <tr style="border: none; background-color:#CCC; text-align:center;">
    <td colspan="9">Resultado</td>
    </tr>
  <tr style="border: none; background-color:#CCC; text-align:center;">
    <td><form name="busca_escola" method="POST" action="<?php $_SERVER['PHP_SELF']; ?>?busca=escola"><input type="text" name="escola"><br />
<input type="submit" value="Filtrar" name="filtro_escola" /></form></td>
    <td><form name="busca_responsavel" method="POST" action="<?php $_SERVER['PHP_SELF']; ?>?busca=responsavel"><input type="text" name="responsavel"><br />
<input type="submit" value="Filtrar" name="filtro_responsavel" /></form></td>
    
    <td>Filtrar por Vendedor<br />
<?php if($nivel == "1"){ ?><form name="busca_atendente" method="POST" action="<?php $_SERVER['PHP_SELF']; ?>?busca=atendente"><select name="atendente">
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
    <td width="500">Observa&ccedil;ao</td>
    <td>Origem</td>
    <td>&Uacute;ltimo Hist&oacute;rico</td>
    <td>A&ccedil;&atilde;o</td>

  </tr>
	<?php while($row3 = mysql_fetch_array($busca2))
  { if ($contacor % 2 == 1){
$coratual = "#DDDDDD";
}else{
$coratual = "#EEEEEE"; }
$contacor++;	
  
$data = $row3["cliente_historico_data"];

$aux3 = explode('-',$data);
 
$data_i1 = $aux3[2]."/".$aux3[1]."/".$aux3[0];

//echo $data_i1." ".$row3["prospecto_ultimo_historico"]."<br>";
    
  $id = $row3['cliente_id'];
  ?>  


	<?php if($row3["cliente_standby"] == '0'){ ?>

    <tr  bgcolor="<?=$coratual?>" style="text-align:center; color: #CCC;">
    
  <?php }else{ ?>
  
  <tr  bgcolor="<?=$coratual?>" style="text-align:center;">
  
  <?php } ?>
    <td><a href="javascript:popUP('EditaCliente1', 'edita_cliente.php?id4=<?php echo $row3["cliente_id"]; ?>&idd=<?php echo $row3["cliente_prospecto_id"]; ?>', 'width=580,height=560,toolbar=no,menubar=no,status=no,scrollbars=no,resizable=yes')"><?php  echo $row3['cliente_nome']; ?></a></td>
     <td><?php  echo $row3['cliente_responsavel']; ?></td>
    <td><?php  echo $row3['cliente_email']; ?></td>
    <td><?php  echo $row3['cliente_tel_fixo']; ?></td>
    <td><?php  echo $row3['cliente_tel_cel']; ?></td>
    <td style="max-height: 50px; overflow: hidden;"><?php if($row3['cliente_ultimo_historico'] != ""){ ?><a href="javascript:popUP('minhaJanela1', 'historico_cli.php?id=<?php echo $row3['cliente_id']; ?>&idd=<?php echo $row3["cliente_prospecto_id"]; ?>', 'width=550,height=500,toolbar=no,menubar=no,status=no,scrollbars=no,resizable=yes')"><?php echo limitar($row3['cliente_ultimo_historico'], 180); ?></a><?php }else{ ?>
	<a href="javascript:popUP('minhaJanela1', 'historico_cli.php?id=<?php echo $row3["cliente_id"]; ?>', 'width=550,height=500,toolbar=no,menubar=no,status=no,scrollbars=no,resizable=yes')">Adicionar Observa��o</a><?php } ?></td>
    <td><?php  echo $row3['cliente_origem']; ?></td>
    <td><?php  echo $data_i1; ?></td>
    <td>
        <a href="gera_pdf.php?id=<?php echo $row3["cliente_id"]; ?>" target="_blank">
            <img src="images/view.png" width="21" />
        </a>
        <?php if($row3["cliente_standby"] == '1' ){ ?>
        <a href="standby.php?id=<?php echo $row3["cliente_id"]; ?>">
                <img src="images/emoticon_sad.png" width="20" title="N�o deseja ser mais ser cliente" border="0" />
            </a>
        <?php }else{ ?>
        <a href="voltar_cliente.php?id=<?php echo $row3["cliente_id"]; ?>">
                <img src="images/emoticon_smile.png" width="20" style="padding-right: 5px;" alt="Enviar Para Clientes" title="Quer voltar a ser cliente" border="0"/>
            </a>
        <?php } ?>

        <?php if($nivel == "1"){ ?><a href="<?php $_SERVER['PHP_SELF']; ?>?id=<?php echo $row3["cliente_id"]; ?>&action=del" >
                <img src="images/icon_excluir.png" width="17" />
            </a><?php } ?>
    </td>
 
 
  </tr>

<?php
  }
?>
  </tr>
  <tr style="border: none; background-color:#CCC; text-align:center;">
    <td colspan="9">&nbsp;</td>
  </tr>

</table>
<div id="rodape" style="font-family:Arial, Helvetica, sans-serif; font-size: 9px; position: absolute; top: 0px; right: 1000px; color:#EEE;"><tr>
      <a href="http://www.awktec.com"><img src="./imagens/logo_awk.png" border="0"></a><i>GERENCIAMENTO DE RELACIONAMENTO COM O CLIENTE <strong>AWK</strong> [Vers�o 1.0]</i>
    </tr>
    
    </div>
</body>
</html>