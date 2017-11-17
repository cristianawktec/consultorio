<?php 
session_start();

$acao = $_GET["acao"];


if($acao == "cadastra"){

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



$data_obs = $_POST["data_obs"];

require_once('conexao.php');

$atendentes = mysql_query("SELECT * FROM usuarios where id = '$atendente'");
$row_atendentes = mysql_fetch_array($atendentes);

$atendentes2 = mysql_query("SELECT * FROM usuarios where id = '$atendente'");
$row_atendentes2 = mysql_fetch_array($atendentes2);

$user2 = $row_atendentes2["nome"];

$user = $row_atendentes["nome"];


$query = mysql_query("INSERT INTO clientes (cliente_nome, cliente_responsavel, cliente_email, cliente_tel_fixo, cliente_tel_fixo2, cliente_tel_fixo3, cliente_tel_cel, cliente_tel_cel2, cliente_tel_cel3, cliente_endereco, cliente_complemento, cliente_bairro, cliente_cep, cliente_nasc, cliente_origem, cliente_cidade, cliente_cidade2, cliente_cidade3, cliente_cidade4, cliente_cidade5, cliente_cidade6, cliente_uf, cliente_uf2, cliente_uf3, cliente_uf4, cliente_uf5, cliente_uf6, cliente_data_mod, cliente_atendente, cliente_atendente_id, cliente_atendente_edita, cliente_atendente_edita_id) VALUES ('$nome', '$responsavel', '$email', '$tel_fixo', '$tel_fixo2', '$tel_fixo3', '$tel_cel', '$tel_cel2', '$tel_cel3', '$endereco', '$complemento', '$bairro', '$cep', '$data_nasc', '$origem', '$cidade', '$cidade2', '$cidade3', '$cidade4', '$cidade5', '$cidade6', '$estado', '$estado2', '$estado3', '$estado4', '$estado5', '$estado6', '$data2', '$user2', '$atendente', '$user', '$atendente')") or die(mysql_error());



include("conexao.php");

$query_cli = mysql_query("SELECT * FROM clientes ORDER BY cliente_id DESC LIMIT 1");
$row_cli = mysql_fetch_array($query_cli);

$id4 = $row_cli["cliente_id"];

$check_id = $row_cli["cliente_id"];

$query_prosp = mysql_query("SELECT * FROM prospectos ORDER BY prospecto_id DESC LIMIT 1");

$row_prosp = mysql_fetch_array($query_prosp);

$id_prosp = $row_prosp["prospecto_id"];

// CHECA SE O ID DO CLIENTE JÁ EXISTE NOS PROSPECTOS

if($check_id < $id_prosp){

$check_id1 = $id_prosp+1;

mysql_query("UPDATE clientes SET cliente_id = '$check_id1' where cliente_id = '$check_id' ");

}

// FIM CHECAGEM
$prospectos = mysql_query("SELECT * FROM prospectos");





echo "<script>alert('Cadastro efetuado com sucesso!'); window.location='edita_cliente.php?id4=$id4'; </script>";
//header('Location: lista_prospectos.php');




mysql_close($con);

/*echo "<script>
         alert('Prospecto alterado com sucesso!');
		 	 
		
	 window.location='index.php';
	 		 
         </script>";*/
//header('Location: lista_prospectos.php');
}
$data = date("d/m/Y");

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<META NAME="robots" CONTENT="noindex, nofollow">

<META NAME="robots" CONTENT="noarchive">

<META NAME="robots" CONTENT="index, nofollow, noarchive">
<title>CADASTRAR CLIENTE</title>

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
</style>

</head>

<body>

<div id="TabbedPanels1" class="TabbedPanels">
  <ul class="TabbedPanelsTabGroup">
    <li class="TabbedPanelsTab" tabindex="0">Dados Cadastrais</li>
  </ul>
  <div class="TabbedPanelsContentGroup">
    <div class="TabbedPanelsContent"><form name="prospecto" id="prospecto" action="<?php $_SERVER['PHP_SELF']; ?>?acao=cadastra" method="POST">

<table width="400" border="0" align="center">
  <tr>
    <td colspan="2">
   <input type="hidden" name="id" id="id" />
    <label>Nome do Cliente</label>
      <input type="text" name="nome" id="nome" class="texto" style="height: 15px;" />
    </td>
	<td colspan="2"><label>Nome do Responsavel</label>
      <input type="text" name="responsavel" id="responsavel" class="texto" style="height: 15px;" /></td>
  </tr>
  </tr>
  <tr>
    <td colspan="2"><label>E-mail</label><br />
  <input type="text" name="email" id="email" class="texto" style="height: 15px;"/></td>
    <td colspan="2"><label>Data de Nascimento</label><br />
      <input type="text" name="data_nasc" id="data_nasc" OnKeyUp="mascaraData(this);" class="texto1"  maxlength="10"/></td>
  </tr>
  <tr>
    <td colspan="2"><label>Telefone Fixo</label><br />
<input type="text" name="tel_fixo" id="tel_fixo" class="texto1" maxlength="14" /><br />
<input type="text" name="tel_fixo2" id="tel_fixo2" class="texto1" maxlength="14" /><br />
<input type="text" name="tel_fixo3" id="tel_fixo3" class="texto1" maxlength="14" />
  </td>
    <td colspan="2"><label>Telefone Celular</label><br />
      <input type="text" name="tel_cel" id="tel_cel" class="texto1" maxlength="14" /><br />
      <input type="text" name="tel_cel2" id="tel_cel2" class="texto1" maxlength="14" /><br />
      <input type="text" name="tel_cel3" id="tel_cel3" class="texto1" maxlength="14" />
    </td>
  </tr>
  <tr>
    <td colspan="2"><label>Endere&ccedil;o</label>
      <br />
  <input type="text" name="endereco" id="endereco"  class="texto"/></td>
    <td colspan="2"><label>Bairro</label>
      <br />
  <input type="text" name="bairro" id="bairro"  class="texto"/></td>
  </tr>
  <tr>
    <td><label>Cidade</label><br /><input type="text" name="cidade" id="cidade" class="texto" />
   
    <td><label>UF</label><br />
<select name="estado" id="estado" style="border: 1px solid #ccc; height: 27px;">

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
  <option value="Facebook">Facebook</option>
  <option value="Indica&ccedil;&atilde;o">Indica&ccedil;&atilde;o</option>
  <option value="Site">Site</option>
  <option value="Liga&ccedil;&atilde;o Direta">Liga&ccedil;&atilde;o Direta</option>
  <option value="E-mail Marketing">E-mail Marketing</option>
    
    
</select></td>

  </tr>

  <tr>
    <td colspan="2">

    
    </select></td>
    <td colspan="2"><div id="Indicação" class="invisivel"><label>Indicado por</label>
      <br />
      
  <input type="text" name="indica" id="indica"  class="texto"/></div></td>
  </tr>
  <tr>
    <td colspan="2">Data de Cadastro<br />
<input type="text" name="data" disabled="disabled" class="texto1" /></td>
    <td colspan="2">&Uacute;ltima Modifica&ccedil;&atilde;o<br />
      
  <input type="text" name="data_mod" disabled="disabled" class="texto1" /></td>
  </tr>
  <tr>
    <td colspan="2"><input type="submit" name="envia_prospecto" id="envia_prospecto" value="Salvar" /><input type="button" name="cancela_prospecto" id="cancela_prospecto" value="Cancelar" onclick="fechar();" /></td>
        <td colspan="2"></td>
  </tr>
</table>

    </form>
    </div></div>
   
  </div>

<script type="text/javascript">
<!--
var TabbedPanels1 = new Spry.Widget.TabbedPanels("TabbedPanels1");
//-->
</script>
</body>
</html>