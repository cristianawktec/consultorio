<?php 
session_start();

if($_GET["id"] != ""){
$id = $_GET["id"];

$aux = explode('-',$id);
 
$id1 = $aux[0];

}else{
$id1 = $_GET["id4"];	
}

$id_prosp = $_GET["idd"];

$nome = $_POST["nome"];
$responsavel = $_POST["responsavel"];
$email = $_POST["email"];
$tel_fixo = $_POST["tel_fixo"];
$tel_fixo2 = $_POST["tel_fixo2"];
$tel_fixo3 = $_POST["tel_fixo3"];
$tel_cel = $_POST["tel_cel"];
$tel_cel2 = $_POST["tel_cel2"];
$tel_cel3 = $_POST["tel_cel3"];
$obs = $_POST["obs"];
$data1 = $_POST["data"]; 
$data2 = date("d/m/Y");
$origem = $_POST["origem"];
$cidade = $_POST["cidade"];
$cidade2 = $_POST["cidade2"];
$cidade3 = $_POST["cidade3"];
$cidade4 = $_POST["cidade4"];
$cidade5 = $_POST["cidade5"];
$cidade6 = $_POST["cidade6"];
$estado = $_POST["estado"];
$estado2 = $_POST["estado2"];
$estado3 = $_POST["estado3"];
$estado4 = $_POST["estado4"];
$estado5 = $_POST["estado5"];
$estado6 = $_POST["estado6"];
$edita = $_GET["id2"];
$salvar = $_GET["salva"];
$edita1 = $_GET["id3"];
$atendente = $_SESSION['usuarioID'];
$data_nasc = $_POST["data_nasc"];
$endereco = $_POST["endereco"];
$complemento = $_POST["complemento"];
$bairro = $_POST["bairro"];
$cep = $_POST["cep"];
$atendente1 = $_POST["atendente"];

$_SESSION["id"] = $edita.$edita1;

$IDsessao = $_SESSION["id"];


$data_obs = $_POST["data_obs"];

include_once('conexao.php');

$atendentes = mysql_query("SELECT * FROM usuarios where id = '$atendente'");
$row_atendentes = mysql_fetch_array($atendentes);

$atendentes2 = mysql_query("SELECT * FROM usuarios where id = '$atendente1'");
$row_atendentes2 = mysql_fetch_array($atendentes2);
$user2 = $row_atendentes2["nome"];

$user = $row_atendentes["nome"];

if($id1 != "" or $id2 != ""){	

$result = mysql_query("SELECT * FROM clientes where cliente_id = '$id1'");

$pesquisas = mysql_query("SELECT * FROM pesquisas where pesquisa_cli_id = '$id1'");

$pesquisas_gerente = mysql_query("SELECT * FROM pesquisa_gerente where pesquisa_gerente_cli_id = '$id1'");

$entrevista_campanha = mysql_query("SELECT * FROM entrevista_campanha where entrevista_campanha_cliente_id = '$id1'");

$query = mysql_query("SELECT * FROM clientes where cliente_id = '$id1'");
$row4 = mysql_fetch_array($query);

$id_atende = $row4["cliente_atendente_id"];


$atende = mysql_query("SELECT * from usuarios");

$atende1 = mysql_query("SELECT * from usuarios where id = '$id_atende'");
$row_atende1 = mysql_fetch_array($atende1);

$result1 = mysql_query("SELECT * FROM historico where historico_prospecto_id = '$id_prosp'");

$result2 = mysql_query("SELECT * FROM clientes where cliente_id = '$id1'");
$query_cli = mysql_fetch_array($result2);

$arquivos = mysql_query("SELECT * FROM documentos where documento_cli_id = '$id1' and documento_tipo = '1'");

$arquivos2 = mysql_query("SELECT * FROM documentos where documento_cli_id = '$id1' and documento_tipo = '2'");

$arquivos3 = mysql_query("SELECT * FROM documentos where documento_cli_id = '$id1' and documento_tipo = '3'");

}

if($edita !=""){	

$query = mysql_query("UPDATE clientes SET cliente_nome='$nome', cliente_responsavel = '$responsavel', cliente_email='$email', cliente_tel_fixo='$tel_fixo', cliente_tel_fixo2='$tel_fixo2', cliente_tel_fixo3='$tel_fixo3', cliente_tel_cel='$tel_cel', cliente_tel_cel2='$tel_cel2', cliente_tel_cel3='$tel_cel3', cliente_endereco='$endereco', cliente_complemento='$complemento', cliente_bairro='$bairro', cliente_cep='$cep', cliente_nasc='$data_nasc', cliente_origem='$origem', cliente_cidade='$cidade', cliente_cidade2='$cidade2', cliente_cidade3='$cidade3', cliente_cidade4='$cidade4', cliente_cidade5='$cidade5', cliente_cidade6='$cidade6', cliente_uf='$estado', cliente_uf2='$estado2', cliente_uf3='$estado3', cliente_uf4='$estado4', cliente_uf5='$estado5', cliente_uf6='$estado6', cliente_data_mod='$data2', cliente_atendente = '$user2', cliente_atendente_id = '$atendente1', cliente_atendente_edita = '$user', cliente_atendente_edita_id = '$atendente' WHERE cliente_id='$IDsessao' ") or die(mysql_error());

if($salvar != ""){

echo "<script>
         alert('Alteração salva com sucesso!');
		  window.location='edita_cliente.php?id3=$IDsessao';
		 
         </script>";
		 
}
//header('Location: lista_prospectos.php');

}

if($edita1 != ""){
	$result = mysql_query("SELECT * FROM clientes where cliente_id = '$edita1'");
	
	$result2 = mysql_query("SELECT * FROM clientes where cliente_id = '$id1'");
$query_cli = mysql_fetch_array($result2);
	
	$query = mysql_query("SELECT * FROM clientes where cliente_id = '$edita1'");
$row4 = mysql_fetch_array($query);

$id_atende = $row4["cliente_atendente_id"];

$pesquisas = mysql_query("SELECT * FROM pesquisas where pesquisa_cli_id = '$id1'");
$atende = mysql_query("SELECT * from usuarios");

$atende1 = mysql_query("SELECT * from usuarios where id = '$id_atende'");
$row_atende1 = mysql_fetch_array($atende1);
}


if($id1 !="" or $edita !="" or $edita1 !=""){	

$arquivos = mysql_query("SELECT * FROM documentos where documento_cli_id = '$id1' and documento_tipo = '1'");

$arquivos2 = mysql_query("SELECT * FROM documentos where documento_cli_id = '$id1' and documento_tipo = '2'");

$arquivos3 = mysql_query("SELECT * FROM documentos where documento_cli_id = '$id1' and documento_tipo = '3'");

if($obs != ""){
$hora = date("H:i:s");
mysql_query("INSERT INTO historico (historico_prospecto_id, historico_mensagem, historico_data, historico_hora, historico_atendente, historico_atendente_id ) VALUES ('$id1','$obs', CURDATE(), '$hora', '$user', '$atendente')");
mysql_query("UPDATE clientes SET cliente_historico_data = CURDATE(), cliente_ultimo_historico = '$obs' WHERE cliente_id='$id1'");



}
$result1 = mysql_query("SELECT * FROM historico where historico_prospecto_id = '$id_prosp' ORDER BY historico_id DESC LIMIT 1");
$row2 = mysql_fetch_array($result1);

$aux = explode("-", $row2["historico_data"]);

$data_certa = $aux[2]."/".$aux[1]."/".$aux[0];

}

mysql_close($con);

/*echo "<script>
         alert('Prospecto alterado com sucesso!');
		 	 
		
	 window.location='index.php';
	 		 
         </script>";*/
//header('Location: lista_prospectos.php');

$data = date("d/m/Y");

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<META NAME="robots" CONTENT="noindex, nofollow">

<META NAME="robots" CONTENT="noarchive">

<META NAME="robots" CONTENT="index, nofollow, noarchive">
<title>EDITAR CLIENTE</title>

<script src="SpryAssets/SpryTabbedPanels.js" type="text/javascript"></script>
<script language="javascript">

function volta(){
	confirma = confirm ("Sair sem finalizar o cadastro?");
	 if(confirma){
	 window.location="prospectos.php";
	 }	
}


/*function cadastra(){
	confirma1 = confirm ("Confirmar inserção de prospecto?");
	 if(confirma1 == false){
		
	 window.location="index.php";
	 
	 }	
}*/

</script>

<script type="text/javascript">  
/* Máscaras ER */  
function mascara(o,f){  
    v_obj=o  
    v_fun=f  
    setTimeout("execmascara()",1)  
}  
function execmascara(){  
    v_obj.value=v_fun(v_obj.value)  
}  
function mtel(v){  
    v=v.replace(/\D/g,"");             //Remove tudo o que não é dígito  
    v=v.replace(/^(\d{2})(\d)/g,"($1) $2"); //Coloca parênteses em volta dos dois primeiros dígitos  
    v=v.replace(/(\d)(\d{4})$/,"$1-$2");    //Coloca hífen entre o quarto e o quinto dígitos  
    return v;  
}  
function id( el ){  
    return document.getElementById( el );  
}  
window.onload = function(){  
    id('tel_fixo').onkeypress = function(){  
        mascara( this, mtel );  
	}
	    id('tel_fixo2').onkeypress = function(){  
        mascara( this, mtel );  
	}
	    id('tel_fixo3').onkeypress = function(){  
        mascara( this, mtel );  
	}
	
	
		id('tel_cel').onkeypress = function(){  
        mascara( this, mtel );  
    }  
	
		id('tel_cel2').onkeypress = function(){  
        mascara( this, mtel );  
    }  
	
		id('tel_cel3').onkeypress = function(){  
        mascara( this, mtel );  
    }  
}  
</script>  

<script language="Javascript">
function fechar (){
confirma = window.confirm ("Deseja mesmo fechar a janela?");
if (confirma) window.close();
}
</script>

<script type="text/javascript">
   function mascaraData(campodata_nasc){
              var data_nasc = campodata_nasc.value;
              if (data_nasc.length == 2){
                  data_nasc = data_nasc + '/';
                  document.forms[0].data_nasc.value = data_nasc;
      return true;              
              }
              if (data_nasc.length == 5){
                  data_nasc = data_nasc + '/';
                  document.forms[0].data_nasc.value = data_nasc;
                  return true;
              }
         }
		 
		 
		 
function mascaraCEP(campocep)
{

var cep = campocep.value;
if (cep.length == 5)
{

cep = cep + '-';
document.forms[0].cep.value = cep;
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
    top=(h-250)/2
    
    settings+=", left="+left+", top="+top
    
	w=document.getElementById("id").value;
	
	window.open(url, nome+"cli="+w, settings)
}

</script>

<script language="Javascript">

function showDiv(div)
{
document.getElementById("Indicação").className = "invisivel";

document.getElementById(div).className = "visivel";
}

</script>


<link href="css/estilo.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryTabbedPanels.css" rel="stylesheet" type="text/css" />
<style>
.invisivel { display: none; }
.visivel { visibility: visible; }

#documentos {font-family:Arial, Helvetica, sans-serif; font-size: 12px; text-align: center;}
#documentos tr {border: 1px solid #666;}
#documentos td {border: 1px solid #999;}
</style>

</head>

<body>

<div id="TabbedPanels1" class="TabbedPanels">
  <ul class="TabbedPanelsTabGroup">
    <li class="TabbedPanelsTab" tabindex="0">Dados Cadastrais</li>
    <li class="TabbedPanelsTab" tabindex="0">Hist&oacute;rico</li>
    <li class="TabbedPanelsTab" tabindex="0">Documenta&ccedil;&atilde;o</li>
    <li class="TabbedPanelsTab" tabindex="0">Pesquisa de Satisfa&ccedil;&atilde;o</li>
  </ul>
  <div class="TabbedPanelsContentGroup">
    <div class="TabbedPanelsContent"><form name="prospecto" id="prospecto" action="<?php $_SERVER['PHP_SELF']; ?>?id2=<?php echo $id1.$edita.$edita1; ?>&salva=ok" method="POST">
<?php while($row = mysql_fetch_array($result))
  { ?>
<table width="400" border="0" align="center">
  <tr>
    <td colspan="2">
   <input type="hidden" name="id" id="id" />
    <label>Nome da Escola</label>
      <input type="text" name="nome" id="nome" class="texto" style="height: 15px;" value="<?php echo $row["cliente_nome"]; ?>" />
    </td>
    <td colspan="2"><label>Nome do Responsavel</label>
      <input type="text" name="responsavel" id="responsavel" class="texto" style="height: 15px;" value="<?php echo $row["cliente_responsavel"]; ?>" /></td>
  </tr>
  <tr>
    <td colspan="2"><label>E-mail</label><br />
  <input type="text" name="email" id="email" class="texto" style="height: 15px;" value="<?php echo $row["cliente_email"]; ?>"/></td>
    <td colspan="2"><label>Data de Nascimento</label><br />
      <input type="text" name="data_nasc" id="data_nasc" OnKeyUp="mascaraData(this);" class="texto1"  maxlength="10" value="<?php echo $row["cliente_nasc"]; ?>"/></td>
  </tr>
  <tr>
    <td colspan="2"><label>Telefone Fixo</label><br />
  <input type="text" name="tel_fixo" id="tel_fixo" class="texto1" maxlength="14" value="<?php echo $row["cliente_tel_fixo"]; ?>" /><br />
  <input type="text" name="tel_fixo2" id="tel_fixo2" class="texto1" maxlength="14" value="<?php echo $row["cliente_tel_fixo2"]; ?>" /><br />
  <input type="text" name="tel_fixo3" id="tel_fixo3" class="texto1" maxlength="14" value="<?php echo $row["cliente_tel_fixo3"]; ?>" /></td>
    <td colspan="2"><label>Telefone Celular</label><br />
      <input type="text" name="tel_cel" id="tel_cel" class="texto1" maxlength="14" value="<?php echo $row["cliente_tel_cel"]; ?>" /><br />
      <input type="text" name="tel_cel2" id="tel_cel2" class="texto1" maxlength="14" value="<?php echo $row["cliente_tel_cel2"]; ?>" /><br />
      <input type="text" name="tel_cel3" id="tel_cel3" class="texto1" maxlength="14" value="<?php echo $row["cliente_tel_cel3"]; ?>" /></td>
  </tr>
  <tr>
    <td colspan="2"><label>Endere&ccedil;o</label>
      <br />
  <input type="text" name="endereco" id="endereco"  class="texto" value="<?php echo $row["cliente_endereco"]; ?>"/></td>
    <td colspan="2"><label>Bairro</label>
      <br />
  <input type="text" name="bairro" id="bairro"  class="texto" value="<?php echo $row["cliente_bairro"]; ?>"/></td>
  </tr>
  <tr>
    <td><label>Cidade</label><br /><input type="text" name="cidade" id="cidade" value="<?php echo $row["cliente_cidade"]; ?>" class="texto" />
    <input type="text" name="cidade2" id="cidade2" value="<?php echo $row["cliente_cidade2"]; ?>" class="texto" />
      <input type="text" name="cidade3" id="cidade3" value="<?php echo $row["cliente_cidade3"]; ?>" class="texto" /></td>
    <td><label>UF</label><br />
<select name="estado" id="estado" style="border: 1px solid #ccc; height: 27px;">
<option value="<?php echo $row["cliente_uf"]; ?>"><?php echo $row["cliente_uf"]; ?></option>
<option value="AC">AC</option>
<option value="AL">AL</option>
<option value="AM">AM</option>
<option value="AP">AP</option>
<option value="BA">BA</option>
<option value="CE">CE</option>
<option value="DF">DF</option>
<option value="ES">ES</option>
<option value="GO">GO</option>
<option value="MA">MA</option>
<option value="MG">MG</option>
<option value="MS">MS</option>
<option value="MT">MT</option>
<option value="PA">PA</option>
<option value="PB">PB</option>
<option value="PE">PE</option>
<option value="PI">PI</option>
<option value="PR">PR</option>
<option value="RJ">RJ</option>
<option value="RN">RN</option>
<option value="RO">RO</option>
<option value="RR">RR</option>
<option value="RS">RS</option>
<option value="SC">SC</option>
<option value="SE">SE</option>
<option value="SP">SP</option>
<option value="TO">TO</option>
</select>
<select name="estado2" id="estado2" style="border: 1px solid #ccc; height: 27px;">
<option value="<?php echo $row["cliente_uf2"]; ?>"><?php echo $row["cliente_uf2"]; ?></option>
<option value="AC">AC</option>
<option value="AL">AL</option>
<option value="AM">AM</option>
<option value="AP">AP</option>
<option value="BA">BA</option>
<option value="CE">CE</option>
<option value="DF">DF</option>
<option value="ES">ES</option>
<option value="GO">GO</option>
<option value="MA">MA</option>
<option value="MG">MG</option>
<option value="MS">MS</option>
<option value="MT">MT</option>
<option value="PA">PA</option>
<option value="PB">PB</option>
<option value="PE">PE</option>
<option value="PI">PI</option>
<option value="PR">PR</option>
<option value="RJ">RJ</option>
<option value="RN">RN</option>
<option value="RO">RO</option>
<option value="RR">RR</option>
<option value="RS">RS</option>
<option value="SC">SC</option>
<option value="SE">SE</option>
<option value="SP">SP</option>
<option value="TO">TO</option>
</select>
<select name="estado3" id="estado3" style="border: 1px solid #ccc; height: 27px;">
<option value="<?php echo $row["cliente_uf3"]; ?>"><?php echo $row["cliente_uf3"]; ?></option>
<option value="AC">AC</option>
<option value="AL">AL</option>
<option value="AM">AM</option>
<option value="AP">AP</option>
<option value="BA">BA</option>
<option value="CE">CE</option>
<option value="DF">DF</option>
<option value="ES">ES</option>
<option value="GO">GO</option>
<option value="MA">MA</option>
<option value="MG">MG</option>
<option value="MS">MS</option>
<option value="MT">MT</option>
<option value="PA">PA</option>
<option value="PB">PB</option>
<option value="PE">PE</option>
<option value="PI">PI</option>
<option value="PR">PR</option>
<option value="RJ">RJ</option>
<option value="RN">RN</option>
<option value="RO">RO</option>
<option value="RR">RR</option>
<option value="RS">RS</option>
<option value="SC">SC</option>
<option value="SE">SE</option>
<option value="SP">SP</option>
<option value="TO">TO</option>
</select></td>
    <td><label>Cidade</label><br />
  
      <input type="text" name="cidade4" id="cidade4" value="<?php echo $row["cliente_cidade4"]; ?>" class="texto" />
      <input type="text" name="cidade5" id="cidade5" value="<?php echo $row["cliente_cidade5"]; ?>" class="texto" />
      <input type="text" name="cidade6" id="cidade6" value="<?php echo $row["cliente_cidade6"]; ?>" class="texto" /></td>
    <td><label>UF</label><br />
<select name="estado4" id="estado4" style="border: 1px solid #ccc; height: 27px;">
<option value="<?php echo $row["cliente_uf4"]; ?>"><?php echo $row["cliente_uf4"]; ?></option>
<option value="AC">AC</option>
<option value="AL">AL</option>
<option value="AM">AM</option>
<option value="AP">AP</option>
<option value="BA">BA</option>
<option value="CE">CE</option>
<option value="DF">DF</option>
<option value="ES">ES</option>
<option value="GO">GO</option>
<option value="MA">MA</option>
<option value="MG">MG</option>
<option value="MS">MS</option>
<option value="MT">MT</option>
<option value="PA">PA</option>
<option value="PB">PB</option>
<option value="PE">PE</option>
<option value="PI">PI</option>
<option value="PR">PR</option>
<option value="RJ">RJ</option>
<option value="RN">RN</option>
<option value="RO">RO</option>
<option value="RR">RR</option>
<option value="RS">RS</option>
<option value="SC">SC</option>
<option value="SE">SE</option>
<option value="SP">SP</option>
<option value="TO">TO</option>
</select>
<select name="estado5" id="estado5" style="border: 1px solid #ccc; height: 27px;">
<option value="<?php echo $row["cliente_uf5"]; ?>"><?php echo $row["cliente_uf5"]; ?></option>
<option value="AC">AC</option>
<option value="AL">AL</option>
<option value="AM">AM</option>
<option value="AP">AP</option>
<option value="BA">BA</option>
<option value="CE">CE</option>
<option value="DF">DF</option>
<option value="ES">ES</option>
<option value="GO">GO</option>
<option value="MA">MA</option>
<option value="MG">MG</option>
<option value="MS">MS</option>
<option value="MT">MT</option>
<option value="PA">PA</option>
<option value="PB">PB</option>
<option value="PE">PE</option>
<option value="PI">PI</option>
<option value="PR">PR</option>
<option value="RJ">RJ</option>
<option value="RN">RN</option>
<option value="RO">RO</option>
<option value="RR">RR</option>
<option value="RS">RS</option>
<option value="SC">SC</option>
<option value="SE">SE</option>
<option value="SP">SP</option>
<option value="TO">TO</option>
</select>
<select name="estado6" id="estado6" style="border: 1px solid #ccc; height: 27px;">
<option value="<?php echo $row["cliente_uf6"]; ?>"><?php echo $row["cliente_uf6"]; ?></option>
<option value="AC">AC</option>
<option value="AL">AL</option>
<option value="AM">AM</option>
<option value="AP">AP</option>
<option value="BA">BA</option>
<option value="CE">CE</option>
<option value="DF">DF</option>
<option value="ES">ES</option>
<option value="GO">GO</option>
<option value="MA">MA</option>
<option value="MG">MG</option>
<option value="MS">MS</option>
<option value="MT">MT</option>
<option value="PA">PA</option>
<option value="PB">PB</option>
<option value="PE">PE</option>
<option value="PI">PI</option>
<option value="PR">PR</option>
<option value="RJ">RJ</option>
<option value="RN">RN</option>
<option value="RO">RO</option>
<option value="RR">RR</option>
<option value="RS">RS</option>
<option value="SC">SC</option>
<option value="SE">SE</option>
<option value="SP">SP</option>
<option value="TO">TO</option>
</select></td>
  </tr>
  <tr>
    <td colspan="2"><label>CEP</label>
      <br />
<input type="text" name="cep" id="cep"  class="texto1" OnKeyUp="mascaraCEP(this);" maxlength="9" value="<?php echo $row["cliente_cep"]; ?>"/></td>
    
     <td colspan="2"><label>Origem</label><br />
  <select name="origem" style="border: 1px solid #ccc; height: 27px;" id="origem" onchange="showDiv(this.value);">
  <option value="<?php echo $row["cliente_origem"]; ?>"><?php echo $row["cliente_origem"]; ?></option>
  <option value="Facebook">Facebook</option>
  <option value="Indica&ccedil;&atilde;o">Indica&ccedil;&atilde;o</option>
  <option value="Site">Site</option>
  <option value="Liga&ccedil;&atilde;o Direta">Liga&ccedil;&atilde;o Direta</option>
  <option value="E-mail Marketing">E-mail Marketing</option>
    
    
</select></td>

  </tr>


  <tr>
  <?php if($row_atendentes["nivel"] == '1'){ ?>
    <td colspan="2">
    Atendente<br />
    <select name="atendente"  style="border: 1px solid #ccc; height: 27px;">
    <option value="<?php echo $row_atende1["id"]; ?>"><?php echo $row_atende1["nome"]; ?></option>
    <?php while($row_atende = mysql_fetch_array($atende)){ ?>
    <option value="<?php echo $row_atende["id"]; ?>"><?php echo $row_atende["nome"]; ?></option>
    
    <?php } ?>
    
    </select></td><?php } ?>
    <td colspan="2"><div id="Indicação" class="invisivel"><label>Indicado por</label>
      <br />
      
<input type="text" name="indica" id="indica"  class="texto"/></div></td>
  </tr>
  <tr>
    <td colspan="2">Data de Cadastro<br />
<input type="text" name="data" value="<?php echo $row["cliente_data"]; ?>" disabled="disabled" class="texto1" /></td>
    <td colspan="2">&Uacute;ltima Modifica&ccedil;&atilde;o<br />
      
  <input type="text" name="data_mod" value="<?php echo $row["cliente_data_mod"]; ?>" disabled="disabled" class="texto1" /></td>
  </tr>
  <tr>
    <td colspan="2"><input type="submit" name="envia_prospecto" id="envia_prospecto" value="Salvar" /><input type="button" name="cancela_prospecto" id="cancela_prospecto" value="Cancelar" onclick="fechar();" /></td>
        <td colspan="2"></td>
  </tr>
</table>

<?php
  }
?>
    </form></div>
    <div class="TabbedPanelsContent"> 
    <form name="historico" id="historico" method="POST" action="<?php $_SERVER['PHP_SELF']; ?>?id4=<?php echo $id1.$edita.$edita1; ?>">
    <strong>&Uacute;ltima observa&ccedil;&atilde;o</strong><br style="margin-bottom: 10px;" />

   <span style="width: 100px;"><strong><?php echo $row2["historico_atendente"]?> em <?php echo $data_certa; ?> às <?php echo $row2["historico_hora"]; ?> -</strong> <?php echo $row2["historico_mensagem"]."\r"; ?></span>
  
 <br />

<a href="javascript:popUP('minhaJanela1', 'historico_cli.php?id=<?php echo $id1; ?>&idd=<?php echo $id_prosp; ?> ', 'width=550,height=580,toolbar=no,menubar=no,status=no,scrollbars=no,resizabl
e=yes')" style="font-size:12px;">Ver mais</a><br />
<br />

    <label>Adicionar Observa&ccedil;&otilde;es:</label><br />

    <textarea name="obs" id="obs"></textarea>
    <input type="hidden" name="data_obs" value="<?php echo $data; ?>" /><br />

    <input type="submit" name="envia_historico" id="envia_historico" value="Salvar" /><input type="button" name="cancela_prospecto" id="cancela_prospecto" value="Cancelar" onclick="fechar();" />
    </form></div>
     
     
     <div class="TabbedPanelsContent"> 
   
     <div id="TabbedPanels2" class="TabbedPanels">
       <ul class="TabbedPanelsTabGroup">
         <li class="TabbedPanelsTab" tabindex="0" style="color:#009;">CONTRATOS</li>
         <li class="TabbedPanelsTab" tabindex="0" style="color:#009;">FORMUL&Aacute;RIOS</li>
         <li class="TabbedPanelsTab" tabindex="0" style="color:#009;">PESQUISAS FINANCEIRAS</li>
       </ul>
       <div class="TabbedPanelsContentGroup">
         <div class="TabbedPanelsContent">
         
           <form name="envia_arquivo" method="POST" enctype="multipart/form-data" action="envia_arquivo.php?id=<?php echo $query_cli["cliente_id"]; ?>&tipo=1" style="font-family: Arial, Helvetica, sans-serif; font-size: 12px;">
             <p>Adicionar Contrato<br />
               <input type="file" name="arquivo" />
               
               <input type="hidden" name="radio" value="copy" checked="copy();" /><br>
  <input type="hidden" name="radio1" value="move_uploaded_file1" checked="move_uploaded_file();" />
  <input type="submit" value="Enviar" />
               
             </p>
             <p>&nbsp;</p>
           </form>
         <table width="500" style="border: 1px solid #333;" id="documentos">
       <tr style="background-color:#666; color: #FFF;">
         <td colspan="3"><strong>CONTRATOS</strong></td>
         </tr>
       <tr style="background-color:#666; color: #FFF;">
    <td><strong>Data</strong></td>
      <td><strong>Arquivo</strong></td>
      <td>&nbsp;</td>
  
  </tr>
  <?php 
while($row_arquivos = mysql_fetch_array($arquivos)){ 
?>
    <tr>
    <td><?php echo $row_arquivos["documento_data"]; ?></td>
       <td><a href="download.php?arquivo=<?php echo $row_arquivos["documento_id"]; ?>"><?php echo $row_arquivos["documento_nome"]; ?></a></td>
       <td><a href="del_arquivo.php?id=<?php echo $row_arquivos["documento_id"]; ?>&cli_id=<?php echo $row_arquivos["documento_cli_id"]; ?>"><img src="images/icon_excluir.png" /></a></td>

    </tr>
  <?php } ?>
  <tr>
    
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>

</table></div>
         <div class="TabbedPanelsContent"><form name="envia_arquivo2" method="POST" enctype="multipart/form-data" action="envia_arquivo.php?id=<?php echo $query_cli["cliente_id"]; ?>&tipo=2" style="font-family: Arial, Helvetica, sans-serif; font-size: 12px;">
             <p>Adicionar Formul&aacute;rio<br />
               <input type="file" name="arquivo" />
               
               <input type="hidden" name="radio" value="copy" checked="copy();" /><br>
  <input type="hidden" name="radio1" value="move_uploaded_file1" checked="move_uploaded_file();" />
  <input type="submit" value="Enviar" />
               
             </p>
             <p>&nbsp;</p>
           </form>
         <table width="500" style="border: 1px solid #333;" id="documentos">
       <tr style="background-color:#666; color: #FFF;">
         <td colspan="3"><strong>FORMUL&Aacute;RIOS</strong></td>
         </tr>
       <tr style="background-color:#666; color: #FFF;">
    <td><strong>Data</strong></td>
      <td><strong>Arquivo</strong></td>
      <td>&nbsp;</td>
  
  </tr>
  <?php 
while($row_arquivos2 = mysql_fetch_array($arquivos2)){ 
?>
    <tr>
    <td><?php echo $row_arquivos2["documento_data"]; ?></td>
       <td><a href="download.php?arquivo=<?php echo $row_arquivos2["documento_id"]; ?>"><?php echo $row_arquivos2["documento_nome"]; ?></a></td>
       <td><a href="del_arquivo.php?id=<?php echo $row_arquivos2["documento_id"]; ?>&cli_id=<?php echo $row_arquivos2["documento_cli_id"]; ?>"><img src="images/icon_excluir.png" /></a></td>

    </tr>
  <?php } ?>
  <tr>
    
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>

</table></div>
            <div class="TabbedPanelsContent"><form name="envia_arquivo3" method="POST" enctype="multipart/form-data" action="envia_arquivo.php?id=<?php echo $query_cli["cliente_id"]; ?>&tipo=3" style="font-family: Arial, Helvetica, sans-serif; font-size: 12px;">
             <p>Adicionar Pesquisa Financeira<br />
               <input type="file" name="arquivo" />
               
               <input type="hidden" name="radio" value="copy" checked="copy();" /><br>
  <input type="hidden" name="radio1" value="move_uploaded_file1" checked="move_uploaded_file();" />
  <input type="submit" value="Enviar" />
               
             </p>
             <p>&nbsp;</p>
           </form>
         <table width="500" style="border: 1px solid #333;" id="documentos">
       <tr style="background-color:#666; color: #FFF;">
         <td colspan="3"><strong>PESQUISAS FINANCEIRAS</strong></td>
         </tr>
       <tr style="background-color:#666; color: #FFF;">
    <td><strong>Data</strong></td>
      <td><strong>Arquivo</strong></td>
      <td>&nbsp;</td>
  
  </tr>
  <?php 
while($row_arquivos3 = mysql_fetch_array($arquivos3)){ 
?>
    <tr>
    <td><?php echo $row_arquivos3["documento_data"]; ?></td>
       <td><a href="download.php?arquivo=<?php echo $row_arquivos3["documento_id"]; ?>"><?php echo $row_arquivos3["documento_nome"]; ?></a></td>
       <td><a href="del_arquivo.php?id=<?php echo $row_arquivos3["documento_id"]; ?>&cli_id=<?php echo $row_arquivos3["documento_cli_id"]; ?>"><img src="images/icon_excluir.png" /></a></td>

    </tr>
  <?php } ?>
  <tr>
    
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>

</table></div>
       </div>
     </div>
     <p>&nbsp;</p>
     <p><br />
     </p>
     

  
  





<br />
<br />

     </div>
     
     <div class="TabbedPanelsContent"> 
   <table style="border: 1px solid #333;" width="500" id="documentos">
   <tr>
     <td colspan="3">&nbsp;</td>
   </tr>
   <tr>
   <td colspan="3"><a href="satisfacao_cliente.php?id=<?php echo $query_cli["cliente_id"]; ?>" target="_blank"><input type="button" value="Adicionar Nova Pesquisa" name="botao" />
</a></td>
</tr>


      <td colspan="3" style="background-color:#666; color: #FFF;"><strong>Cliente</strong></td>
 
  </tr>
  <tr>
    <td><strong>Data</strong></td>
      <td><strong>Pesquisa</strong></td>
      <td>&nbsp;</td>
  
  </tr>
<?php while($row_pesquisas = mysql_fetch_array($pesquisas)){  ?>
    <tr>
    <td><?php echo $row_pesquisas["pesquisa_data"]; ?></td>
       <td><a href="ver_satisfacao_cli.php?pesquisa=<?php echo $row_pesquisas["pesquisa_id"]; ?>" target="_blank">Visualizar Pesquisa</a></td>
       <td><a href="del_pesquisa_cli.php?id=<?php echo $row_pesquisas["pesquisa_id"]; ?>&cli_id=<?php echo $row_pesquisas["pesquisa_cli_id"]; ?>"><img src="images/icon_excluir.png" /></a></td>

    </tr>
  <?php } ?>
  <tr>
    
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>

<tr>
    <td colspan="3" style="background-color:#666; color: #FFF;"><strong>Gerente de Vendas</strong></td>
 
  </tr>
  <tr>
    <td><strong>Data</strong></td>
      <td><strong>Pesquisa</strong></td>
      <td>&nbsp;</td>
  
  </tr>
  <?php 
while($row_pesquisas_gerente = mysql_fetch_array($pesquisas_gerente)){ 
?>
    <tr>
 <td><?php echo $row_pesquisas_gerente["pesquisa_gerente_data"]; ?></td>
       <td><a href="ver_satisfacao_gerente.php?pesquisa=<?php echo $row_pesquisas_gerente["pesquisa_gerente_id"]; ?>" target="_blank">Visualizar Pesquisa</a></td>
       <td><a href="del_pesquisa_gerente.php?id=<?php echo $row_pesquisas_gerente["pesquisa_gerente_id"]; ?>&cli_id=<?php echo $row_pesquisas_gerente["pesquisa_gerente_cli_id"]; ?>"><img src="images/icon_excluir.png" /></a></td>

    </tr>
  <?php } ?>
  <tr>
    
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" style="background-color:#666; color: #FFF;"><strong>Entrevista de Campanha</strong></td>
 
  </tr>
  <tr>
    <td><strong>Data</strong></td>
      <td><strong>Entrevista</strong></td>
      <td>&nbsp;</td>
  
  </tr>
  <?php 
while($row_entrevista_campanha = mysql_fetch_array($entrevista_campanha)){ 
?>
    <tr>
 <td><?php echo $row_entrevista_campanha["entrevista_campanha_data"]; ?></td>
       <td><a href="ver_entrevista_campanha.php?entrevista=<?php echo $row_entrevista_campanha["entrevista_campanha_id"]; ?>" target="_blank">Visualizar Entrevista</a></td>
       <td><a href="del_entrevista.php?id=<?php echo $row_entrevista_campanha["entrevista_campanha_id"]; ?>&cli_id=<?php echo $row_entrevista_campanha["entrevista_campanha_cliente_id"]; ?>"><img src="images/icon_excluir.png" /></a></td>

    </tr>
  <?php } ?>
  <tr>
    
    <td colspan="3"><a href="add_entrevista.php?id=<?php echo $query_cli["cliente_id"]; ?>" target="_blank"><input type="button" value="Nova Entrevista" /></a></td>
    </tr>

</table>
     </div>
    
  </div>
</div>

<script type="text/javascript">
<!--
var TabbedPanels1 = new Spry.Widget.TabbedPanels("TabbedPanels1");
var TabbedPanels2 = new Spry.Widget.TabbedPanels("TabbedPanels2");
//-->
</script>
</body>
</html>