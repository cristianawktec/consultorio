<?php 



if($_POST["nome"] != "" and  $_POST["email"] != "" and $_POST["tel_fixo"] != "" and $_POST["tel_cel"] != "" and $_POST["obs"] != ""){

$nome = $_POST["nome"];
$email = $_POST["email"];
$tel_fixo = $_POST["tel_fixo"];
$tel_cel = $_POST["tel_cel"];
$obs = $_POST["obs"];
$data1 = $_POST["data"]; 


$con = mysql_connect("localhost","root","genesis2012");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("crm", $con);

mysql_query("UPDATE prospectos SET prospecto_nome= '$nome', prospecto_email= '$email', prospecto_tel_fixo='$tel_fixo', prospecto_tel_cel='$tel_cel', prospecto_obs='$obs', prospecto_data='$data1'") or die(mysql_error());



mysql_close($con);

echo "<script>
         alert('Prospecto alterado com sucesso!');
		 	 
		
	 window.location='index.php';
	 
		
		 
         </script>";
//header('Location: lista_prospectos.php');





}


$data = date("d/m/Y");

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>EDITAR PROSPECTO</title>

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
		    id('tel_cel').onkeypress = function(){  
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


<style type="text/css">

.texto {width: 200px; border: 1px solid #CCC; height: 15px; padding: 5px; min-height: 15px;}

textarea {width: 200px; border: 1px solid #CCC; height: 100px; padding: 5px; min-width: 200px; max-width: 200px; min-height:100px; }
body {background-color:#EEE;}
#topo {width:auto; height: 40px; background-color:#090; margin-top: -10px; margin-left: -10px; margin-right: -10px; margin-bottom: 25px; overflow:hidden;}
</style>

<link href="SpryAssets/SpryTabbedPanels.css" rel="stylesheet" type="text/css" />
</head>

<body>


<div id="TabbedPanels1" class="TabbedPanels">
  <ul class="TabbedPanelsTabGroup">
    <li class="TabbedPanelsTab" tabindex="0">Dados Cadastrais</li>
    <li class="TabbedPanelsTab" tabindex="0">Histórico</li>
  </ul>
  <div class="TabbedPanelsContentGroup">
    <div class="TabbedPanelsContent"><form name="prospecto" id="prospecto" action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">

<table width="400" border="0" align="center">
  <tr>
    <td><label>Nome:</label>
      <input type="text" name="nome" id="nome" class="texto" style="height: 15px;" />
    </td>
    <td colspan="2"><label>E-mail:</label><br />
<input type="text" name="email" id="email" class="texto" style="height: 15px;"/></td>
  </tr>
  <tr>
    <td>
<label>Telefone Fixo:</label><br />
<input type="text" name="tel_fixo" id="tel_fixo" class="texto" maxlength="14" /></td>
    <td colspan="2"><label>Telefone Celular:</label><br />
<input type="text" name="tel_cel" id="tel_cel" class="texto" maxlength="14" /></td>
  </tr>
  <tr>
    <td><label>Origem</label><br />
<select name="origem">
<option value="facebook">Facebook</option>
<option value="site">Site</option>
<option value="ligação direta">Ligação Direta</option>

</select></td>
    <td><label>Cidade</label><br />
<input type="text" name="cidade" id="cidade" /></td>
    <td><label>UF</label><br />
<select name="estado" id="estado">
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

</td>
  </tr>
  <tr>
    <td></td>
    <td colspan="2">&nbsp;</td>
  </tr>

  <tr>
    <td></td>
        <td colspan="2"><input type="submit" name="envia_prospecto" id="envia_prospecto" value="Salvar" /><input type="button" name="cancela_prospecto" id="cancela_prospecto" value="Cancelar" onclick="fechar();" /></td>
  </tr>
</table>
</form></div>
    <div class="TabbedPanelsContent"> 
    <form name="historico" id="historico" method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
    <label>Observa&ccedil;&otilde;es:</label>
    <textarea name="obs" id="obs"></textarea>
    <input type="submit" name="envia_historico" id="envia_historico" value="Salvar" /><input type="button" name="cancela_prospecto" id="cancela_prospecto" value="Cancelar" onclick="fechar();" />
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