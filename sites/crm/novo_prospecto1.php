<?php 
session_start();
$atendente = $_SESSION['usuarioID'];
$data = date("d/m/Y");

$cadastro = $_GET["cadastro"];

if($cadastro != ""){

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
$data_nasc = $_POST["data_nasc"];

$prospectoID2 = $_POST["id"];
$prospectoID3 = $_GET["id"];
if($_POST["indica"] != ""){
$indicado = $_POST["indica"];
}else{
$indicado = "--/--";
}

require_once('conexao.php');

if($_POST["nome"] != "" and  $_POST["email"] != "" and $_POST["tel_fixo"] != "" and $_POST["tel_cel"] != "" and $_POST["cidade"] != "" and $_POST["estado"] != "" ){

$atendentes = mysql_query("SELECT * FROM usuarios where id = '$atendente'");
$row_atendentes = mysql_fetch_array($atendentes);

$user = $row_atendentes["nome"];

mysql_query("INSERT INTO prospectos (prospecto_nome, prospecto_responsavel, prospecto_email, prospecto_data_nasc, prospecto_tel_fixo, prospecto_tel_fixo2, prospecto_tel_fixo3, prospecto_tel_cel, prospecto_tel_cel2, prospecto_tel_cel3, prospecto_origem, prospecto_indicado, prospecto_cidade, prospecto_cidade2, prospecto_cidade3, prospecto_cidade4, prospecto_cidade5, prospecto_cidade6, prospecto_uf, prospecto_uf2, prospecto_uf3, prospecto_uf4, prospecto_uf5, prospecto_uf6, prospecto_data, prospecto_data_mod, prospecto_atendente, prospecto_atendente_id) VALUES ('$nome', '$responsavel', '$email', '$data_nasc', '$tel_fixo', '$tel_fixo2', '$tel_fixo3', '$tel_cel', '$tel_cel2', '$tel_cel3', '$origem', '$indicado', '$cidade', '$cidade2', '$cidade3', '$cidade4', '$cidade5', '$cidade6', '$estado', '$estado2', '$estado3', '$estado4', '$estado5', '$estado6', '$data1', '$data', '$user', '$atendente')");


$query = mysql_query("SELECT * FROM prospectos ORDER BY prospecto_id DESC");
$row = mysql_fetch_array($query);

$id4 = $row["prospecto_id"];


echo "<script>alert('Cadastro efetuado com sucesso!'); window.location='edita_prospecto.php?id4=$id4'; </script>";
//header('Location: lista_prospectos.php');

}else{
$_SESSION["nome"] = $nome;	
$_SESSION["responsavel"] = $responsavel;
$_SESSION["email"] = $email;
$_SESSION["tel_fixo"] = $tel_fixo;
$_SESSION["tel_fixo2"] = $tel_fixo2;
$_SESSION["tel_fixo3"] = $tel_fixo3;
$_SESSION["tel_cel"] = $tel_cel;
$_SESSION["tel_cel2"] = $tel_cel2;
$_SESSION["tel_cel3"] = $tel_cel3;
echo "<script>alert('Por favor preencha todos os dados');
window.location.href='novo_prospecto.php';
 </script>";

}
mysql_close($con);
}

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>CADASTRO DE NOVO PROSPECTO</title>

<script src="SpryAssets/SpryTabbedPanels.js" type="text/javascript"></script>
<script language="javascript">

function volta(){
	confirma = confirm ("Sair sem finalizar o cadastro?");
	 if(confirma){
	 window.location="index.php";
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
		 
		 </script>

<script language="Javascript">
function fechar (){
confirma = window.confirm ("Deseja mesmo fechar a janela?");
if (confirma) window.close();
}
</script>

<script language="Javascript">

function showDiv(div)
{
document.getElementById("Indicação").className = "invisivel";

document.getElementById(div).className = "visivel";
}

</script>


<style type="text/css">
#prospecto {font-family: Arial, Helvetica, sans-serif; font-size: 14px;}
.texto {width: 200px; border: 1px solid #CCC; height: 15px; padding: 5px; min-height: 15px;}

textarea {width: 200px; border: 1px solid #CCC; height: 100px; padding: 5px; min-width: 200px; max-width: 200px; min-height:100px; }
body {background-color:#EEE;}
#topo {width:auto; height: 40px; background-color:#090; margin-top: -10px; margin-left: -10px; margin-right: -10px; margin-bottom: 25px; overflow:hidden;}
.uf { border: 1px solid #CCC; height:27px; padding-top: 4px;}

.invisivel { display: none; }
.visivel { visibility: visible; }
</style>

<link href="SpryAssets/SpryTabbedPanels.css" rel="stylesheet" type="text/css" />
</head>

<body>


<div id="TabbedPanels1" class="TabbedPanels">
  <ul class="TabbedPanelsTabGroup">
    <li class="TabbedPanelsTab" tabindex="0">Dados Cadastrais</li>
   
  </ul>
  <div class="TabbedPanelsContentGroup">
    <div class="TabbedPanelsContent"><form name="prospecto" id="prospecto" action="<?php $_SERVER['PHP_SELF']; ?>?cadastro=OK" method="POST">

<table width="400" border="0" align="center">
  <tr>
    <td colspan="2"><label>Nome da Escola:</label>
      <input type="text" name="nome" id="nome" class="texto" style="height: 15px;" value="<?php echo $_SESSION["nome"]; ?>" />
    </td>
    <td colspan="2"><label>Respons&aacute;vel:</label>
      <input type="text" name="responsavel" id="responsavel" class="texto" style="height: 15px;" value="<?php echo $_SESSION["responsavel"]; ?>" /></td>
  </tr>

  <tr>
    <td colspan="2"><label>Telefone Celular:</label><br />
<input type="text" name="tel_cel" id="tel_cel" class="texto" maxlength="15" value="<?php echo $_SESSION["tel_cel"]; ?>" />
<input type="text" name="tel_cel2" id="tel_cel2" class="texto" maxlength="15" value="<?php echo $_SESSION["tel_cel2"]; ?>" />
<input type="text" name="tel_cel3" id="tel_cel3" class="texto" maxlength="15" value="<?php echo $_SESSION["tel_cel3"]; ?>" /></td>
    <td colspan="2"><p>
      <label>Telefone Fixo:</label>
      <br />
      <input type="text" name="tel_fixo" id="tel_fixo" class="texto" maxlength="14" value="<?php echo $_SESSION["tel_fixo"]; ?>"/>
      <input type="text" name="tel_fixo2" id="tel_fixo2" class="texto" maxlength="14" value="<?php echo $_SESSION["tel_fixo2"]; ?>"/>
      <input type="text" name="tel_fixo3" id="tel_fixo3" class="texto" maxlength="14" value="<?php echo $_SESSION["tel_fixo3"]; ?>"/></td>
  </tr>
  <tr>
    <td colspan="2"><label>E-mail:</label><br />
<input type="text" name="email" id="email" class="texto" style="height: 15px;" value="<?php echo $_SESSION["email"]; ?>"/></td>
<input type="hidden" name="data" value="<?php echo $data; ?>" />
    <td><label>Origem</label><br />
<select name="origem" class="texto" style="height: 30px;" onchange="showDiv(this.value);" id="origem">
<option value="Facebook">Facebook</option>
<option value="Indica&ccedil;&atilde;o">Indica&ccedil;&atilde;o</option>
<option value="Site">Site</option>
<option value="Liga&ccedil;&atilde;o Direta">Liga&ccedil;&atilde;o Direta</option>
<option value="E-mail Marketing">E-mail Marketing</option>

</select></td>

  </tr>

  <tr>
    <td colspan="2"></td>
    <td colspan="2">  <div id="Indicação" class="invisivel"><label>Indicado por:</label>
      <br />      
  <input type="text" name="indica" id="indica"  class="texto"/></div></td>
  </tr>
  
  <tr>
    <td><label>Data de Nascimento</label><br />
      <input type="text" name="data_nasc" id="data_nasc" OnKeyUp="mascaraData(this);" class="texto"  maxlength="10"/></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><label>Cidade</label><br />
<input type="text" name="cidade" id="cidade" class="texto"  style="height: 15px;" /><br />
<input type="text" name="cidade2" id="cidade2" class="texto"  style="height: 15px;" /><br />
<input type="text" name="cidade3" id="cidade3" class="texto"  style="height: 15px;" /></td>
    <td><label>UF</label><br />
  <select name="estado" id="estado" class="uf">
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
  </select><br />
<select name="estado2" id="estado2" class="uf">
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
  </select><br />
<select name="estado3" id="estado3" class="uf">
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
<input type="text" name="cidade4" id="cidade4" class="texto"  style="height: 15px;" /><br />
<input type="text" name="cidade5" id="cidade5" class="texto"  style="height: 15px;" /><br />
<input type="text" name="cidade6" id="cidade6" class="texto"  style="height: 15px;" />
</td>
    <td><label>UF</label><br />
  <select name="estado4" id="estado4" class="uf">
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
  </select><br />
<select name="estado5" id="estado5" class="uf">
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
  </select><br />
<select name="estado6" id="estado6" class="uf">
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
    <td colspan="2"></td>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="4" align="center"><input type="submit" name="envia_prospecto" id="envia_prospecto" value="Salvar" />  <input type="button" name="cancela_prospecto" id="cancela_prospecto" value="Cancelar" onclick="fechar();" /></td>
        </tr>
</table>
</form></div>

  </div>
</div>
<script type="text/javascript">
<!--
var TabbedPanels1 = new Spry.Widget.TabbedPanels("TabbedPanels1");
//-->
</script>
</body>
</html>