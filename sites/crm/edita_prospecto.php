<?php 
session_start();

$atendente = $_SESSION['usuarioID'];
$prospID = $_GET["prospID"];
if($prospID != ""){
echo "<script>confirma = window.confirm ('Confirmar envio de prospecto para Clientes?');
if (confirma) window.location.href='sim_cliente.php?prospID=$prospID'; 
else{

window.close(); }
</script>
";	
	
}

if($_GET["id"] != ""){
$id = $_GET["id"];

$aux = explode('-',$id);
 
$id1 = $aux[0];

}else{
$id1 = $_GET["id4"];	
}

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
$data_nasc = $_POST["data_nasc"];

if($_POST["indica"] != "" and $_POST["origem"] == "Indicação"){
$indicado = $_POST["indica"];
}else{
$indicado = "--/--";
}
$atendente1 = $_POST["atendente"];

$_SESSION["id"] = $edita.$edita1;

$IDsessao = $_SESSION["id"];


$data_obs = $_POST["data_obs"];

include_once('conexao.php');

$atendentes = mysql_query("SELECT * FROM usuarios where id = '$atendente'");
$row_atendentes = mysql_fetch_array($atendentes);

$user = $row_atendentes["nome"];

$atendentes2 = mysql_query("SELECT * FROM usuarios where id = '$atendente1'");
$row_atendentes2 = mysql_fetch_array($atendentes2);
$user2 = $row_atendentes2["nome"];

if($id1 != "" or $id2 != ""){	

$result = mysql_query("SELECT * FROM prospectos where prospecto_id = '$id1'");

$result1 = mysql_query("SELECT * FROM historico where historico_prospecto_id = '$id1'");

$query = mysql_query("SELECT * FROM prospectos where prospecto_id = '$id1'");
$row4 = mysql_fetch_array($query);

$id_atende = $row4["prospecto_atendente_id"];


$atende = mysql_query("SELECT * from usuarios");

$atende1 = mysql_query("SELECT * from usuarios where id = '$id_atende'");
$row_atende1 = mysql_fetch_array($atende1);

}


if($edita !=""){	

$query = mysql_query("UPDATE prospectos SET prospecto_nome='$nome', prospecto_responsavel = '$responsavel', prospecto_email='$email', prospecto_data_nasc='$data_nasc', prospecto_tel_fixo='$tel_fixo', prospecto_tel_fixo2='$tel_fixo2', prospecto_tel_fixo3='$tel_fixo3', prospecto_tel_cel='$tel_cel', prospecto_tel_cel2='$tel_cel2', prospecto_tel_cel2='$tel_cel3', prospecto_origem='$origem', prospecto_indicado='$indicado', prospecto_cidade='$cidade', prospecto_cidade2='$cidade2', prospecto_cidade3='$cidade3', prospecto_cidade4='$cidade4', prospecto_cidade5='$cidade5', prospecto_cidade6='$cidade6', prospecto_uf='$estado', prospecto_uf2='$estado2', prospecto_uf3='$estado3', prospecto_uf4='$estado4', prospecto_uf5='$estado5', prospecto_uf6='$estado6', prospecto_data_mod='$data2', prospecto_atendente = '$user2', prospecto_atendente_id = '$atendente1', prospecto_atendente_edita = '$user', prospecto_atendente_edita_id = '$atendente' WHERE prospecto_id='$IDsessao'") or die(mysql_error());

if($salvar != ""){

echo "<script>
         alert('Alteração salva com sucesso!');
		  window.location='edita_prospecto.php?id3=$IDsessao';
		 
         </script>";
		 
}
//header('Location: lista_prospectos.php');

}

if($edita1 != ""){
	$result = mysql_query("SELECT * FROM prospectos where prospecto_id = '$edita1'");
	
	$query = mysql_query("SELECT * FROM prospectos where prospecto_id = '$edita1'");
$row4 = mysql_fetch_array($query);

$id_atende = $row4["prospecto_atendente_id"];


$atende = mysql_query("SELECT * from usuarios");

$atende1 = mysql_query("SELECT * from usuarios where id = '$id_atende'");
$row_atende1 = mysql_fetch_array($atende1);
	
}


if($id1 !="" or $edita !="" or $edita1 !=""){	

if($obs != ""){
$hora = date("H:i:s");
mysql_query("INSERT INTO historico (historico_prospecto_id, historico_mensagem, historico_data, historico_hora, historico_atendente, historico_atendente_id ) VALUES ('$id1','$obs', CURDATE(), '$hora', '$user', '$atendente')");
mysql_query("UPDATE prospectos SET prospecto_historico_data = CURDATE(), prospecto_ultimo_historico = '$obs' WHERE prospecto_id='$id1'");


}
$result1 = mysql_query("SELECT * FROM historico where historico_prospecto_id = '$id1' ORDER BY historico_id DESC LIMIT 1");
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

<script>
function popUP(nome, url, settings){
    var  w, h, left, top
    
    w=screen.width
    h=screen.height    
        
    left=(w-550)/2
    top=(h-250)/2
    
    settings+=", left="+left+", top="+top
    
	window.open(url, nome, settings)
}

</script>


<script language="Javascript">

function showDiv(div)
{
document.getElementById("Indicação").className = "invisivel";

document.getElementById(div).className = "visivel";
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
    <li class="TabbedPanelsTab" tabindex="0">Hist&oacute;rico</li>
  </ul>
  <div class="TabbedPanelsContentGroup">
    <div class="TabbedPanelsContent"><form name="prospecto" id="prospecto" action="<?php $_SERVER['PHP_SELF']; ?>?id2=<?php echo $id1.$edita.$edita1; ?>&salva=ok" method="POST">
<?php while($row = mysql_fetch_array($result))
  { ?>
<table width="400" border="0" align="center">
  <tr>
    <td colspan="2"><label>Nome do Cliente:</label>
      <input type="text" name="nome" id="nome" class="texto" style="height: 15px;" value="<?php echo $row["prospecto_nome"]; ?>" />
    </td>
    <td colspan="2"><label>Nome do Responsavel:</label>
      <input type="text" name="responsavel" id="responsavel" class="texto" style="height: 15px;" value="<?php echo $row["prospecto_responsavel"]; ?>" /></td>
  </tr>
  <tr>
    <td colspan="2"><label>Telefone Celular:</label><br />
<input type="text" name="tel_cel" id="tel_cel" class="texto1" maxlength="14" value="<?php echo $row["prospecto_tel_cel"]; ?>" />
<input type="text" name="tel_cel2" id="tel_cel2" class="texto1" maxlength="14" value="<?php echo $row["prospecto_tel_cel2"]; ?>" />
<input type="text" name="tel_cel3" id="tel_cel3" class="texto1" maxlength="14" value="<?php echo $row["prospecto_tel_cel3"]; ?>" /></td>
    <td colspan="2"><label>Telefone Fixo:</label><br />
  <input type="text" name="tel_fixo" id="tel_fixo" class="texto1" maxlength="14" value="<?php echo $row["prospecto_tel_fixo"]; ?>" />
  <input type="text" name="tel_fixo2" id="tel_fixo2" class="texto1" maxlength="14" value="<?php echo $row["prospecto_tel_fixo2"]; ?>" />
  <input type="text" name="tel_fixo3" id="tel_fixo3" class="texto1" maxlength="14" value="<?php echo $row["prospecto_tel_fixo3"]; ?>" /></td>
  </tr>
  <tr>
    <td colspan="2"><label>E-mail:</label><br />
<input type="text" name="email" id="email" class="texto" style="height: 15px;" value="<?php echo $row["prospecto_email"]; ?>"/></td>
    <td><label>Origem</label><br />
  <select name="origem" id="origem" onchange="showDiv(this.value);"  style="border: 1px solid #ccc; height: 27px;" >
  <option value="<?php echo $row["prospecto_origem"]; ?>"><?php echo $row["prospecto_origem"]; ?></option>
  <option value="Facebook">Facebook</option>
  <option value="Indicação">Indica&ccedil;&atilde;o</option>
  <option value="Site">Site</option>
  <option value="Ligação Direta">Liga&ccedil;&atilde;o Direta</option>
  <option value="E-mail Marketing">E-mail Marketing</option>
    
</select></td>



    
    </tr>
  <tr></tr>
   <?php if($row_atendentes["nivel"] == '1'){ ?>
    <tr>
      <td colspan="2">
    Atendente<br />
    <select name="atendente"  style="border: 1px solid #ccc; height: 27px;">
    <option value="<?php echo $row_atende1["id"]; ?>"><?php echo $row_atende1["nome"]; ?></option>
    <?php while($row_atende = mysql_fetch_array($atende)){ ?>
    <option value="<?php echo $row_atende["id"]; ?>"><?php echo $row_atende["nome"]; ?></option>
    
    <?php } ?>
    
    </select></td><?php } ?>
  
  <td><label>Indicado por:</label>
      <br />
      
<input type="text" name="indica" id="indica"  class="texto3" value="<?php echo $row["prospecto_indicado"]; ?>"/></td>
  <tr>
  
    <td><label>Cidade</label><br />
  <input type="text" name="cidade" id="cidade" value="<?php echo $row["prospecto_cidade"]; ?>" /><br />
<input type="text" name="cidade2" id="cidade2" value="<?php echo $row["prospecto_cidade2"]; ?>" /><br />
<input type="text" name="cidade3" id="cidade3" value="<?php echo $row["prospecto_cidade3"]; ?>" /><br />
</td>
    <td><label>UF</label><br />
<select name="estado" id="estado">
<option value="<?php echo $row["prospecto_uf"]; ?>"><?php echo $row["prospecto_uf"]; ?></option>
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
<select name="estado2" id="estado2">
<option value="<?php echo $row["prospecto_uf2"]; ?>"><?php echo $row["prospecto_uf2"]; ?></option>
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
<select name="estado3" id="estado3">
<option value="<?php echo $row["prospecto_uf3"]; ?>"><?php echo $row["prospecto_uf3"]; ?></option>
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
    
   
    
    <td><label>Cidade</label><br /><input type="text" name="cidade4" id="cidade4" value="<?php echo $row["prospecto_cidade4"]; ?>" /><br />
<input type="text" name="cidade5" id="cidade5" value="<?php echo $row["prospecto_cidade5"]; ?>" /><br />
<input type="text" name="cidade6" id="cidade6" value="<?php echo $row["prospecto_cidade6"]; ?>" /></td>
    <td><label>UF</label><br /><select name="estado4" id="estado4">
<option value="<?php echo $row["prospecto_uf4"]; ?>"><?php echo $row["prospecto_uf4"]; ?></option>
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
<select name="estado5" id="estado5">
<option value="<?php echo $row["prospecto_uf5"]; ?>"><?php echo $row["prospecto_uf5"]; ?></option>
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
<select name="estado6" id="estado6">
<option value="<?php echo $row["prospecto_uf6"]; ?>"><?php echo $row["prospecto_uf6"]; ?></option>
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
    <td colspan="2"><label>Data de Nascimento</label><br />
      <input type="text" name="data_nasc" id="data_nasc" value="<?php echo $row["prospecto_data_nasc"]; ?>" OnKeyUp="mascaraData(this);" class="texto"  maxlength="10"/></td>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2">Data de Cadastro:<br />
<input type="text" name="data" value="<?php echo $row["prospecto_data"]; ?>" disabled="disabled" /></td>
    <td colspan="2">&Uacute;ltima Modifica&ccedil;&atilde;o:<br />
      
  <input type="text" name="data_mod" value="<?php echo $row["prospecto_data_mod"]; ?>" disabled="disabled" /></td>
  </tr>
  <tr>
    <td colspan="2"><input type="submit" name="envia_prospecto" id="envia_prospecto" value="Salvar" /><input type="button" name="cancela_prospecto" id="cancela_prospecto" value="Cancelar" onclick="fechar();" /></td>
        <td colspan="2"><a href="<?php $_SERVER['PHP_SELF']; ?>?prospID=<?php echo $row["prospecto_id"]; ?>"><input type="button" name="botao2" value="Enviar para Clientes" /></a></td>
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

<a href="javascript:popUP('minhaJanela1', 'historico.php?id=<?php echo $id1; ?>', 'width=550,height=580,toolbar=no,menubar=no,status=no,scrollbars=no,resizabl
e=yes')" style="font-size:12px;">Ver mais</a><br />
<br />

    <label>Adicionar Observa&ccedil;&otilde;es:</label><br />

    <textarea name="obs" id="obs"></textarea>
    <input type="hidden" name="data_obs" value="<?php echo $data; ?>" /><br />

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