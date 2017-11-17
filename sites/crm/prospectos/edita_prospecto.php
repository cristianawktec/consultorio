<?php 
session_start();



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
$tel_cel = $_POST["tel_cel"];
$obs = $_POST["obs"];
$data1 = $_POST["data"]; 
$data2 = date("d/m/Y");
$origem = $_POST["origem"];
$cidade = $_POST["cidade"];
$estado = $_POST["estado"];
$edita = $_GET["id2"];
$salvar = $_GET["salva"];
$edita1 = $_GET["id3"];
$atendente = $_SESSION['usuarioID'];

$_SESSION["id"] = $edita.$edita1;

$IDsessao = $_SESSION["id"];


$data_obs = $_POST["data_obs"];

$con = mysql_connect("localhost","root","genesis2012");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("crm", $con);
$atendentes = mysql_query("SELECT * FROM usuarios where id = '$atendente'");
$row_atendentes = mysql_fetch_array($atendentes);

$user = $row_atendentes["nome"];

if($id1 != "" or $id2 != ""){	

$result = mysql_query("SELECT * FROM prospectos where prospecto_id = '$id1'");

$result1 = mysql_query("SELECT * FROM historico where historico_prospecto_id = '$id1'");

}

if($edita !=""){	

$query = mysql_query("UPDATE prospectos SET prospecto_nome='$nome', prospecto_responsavel = '$responsavel', prospecto_email='$email', prospecto_tel_fixo='$tel_fixo', prospecto_tel_cel='$tel_cel', prospecto_origem='$origem', prospecto_cidade='$cidade', prospecto_uf='$estado', prospecto_data_mod='$data2', prospecto_atendente_edita = '$user', prospecto_atendente_edita_id = '$atendente' WHERE prospecto_id='$IDsessao' ") or die(mysql_error());

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
	
}


if($id1 !="" or $edita !="" or $edita1 !=""){	

if($obs != ""){
mysql_query("INSERT INTO historico (historico_prospecto_id, historico_mensagem, historico_data) VALUES ('$id1','$obs', CURDATE())") or die(mysql_error());

$query1 = mysql_query("UPDATE prospectos SET prospecto_historico_data = CURDATE(), prospecto_ultimo_historico = '$obs' WHERE prospecto_id='$id1' ") or die(mysql_error());
}
$result1 = mysql_query("SELECT * FROM historico where historico_prospecto_id = '$id1' ORDER BY historico_id DESC LIMIT 1");
$row2 = mysql_fetch_array($result1);

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


<link href="css/estilo.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryTabbedPanels.css" rel="stylesheet" type="text/css" />
</head>

<body>

<div id="TabbedPanels1" class="TabbedPanels">
  <ul class="TabbedPanelsTabGroup">
    <li class="TabbedPanelsTab" tabindex="0">Dados Cadastrais</li>
    <li class="TabbedPanelsTab" tabindex="0">Histórico</li>
  </ul>
  <div class="TabbedPanelsContentGroup">
    <div class="TabbedPanelsContent"><form name="prospecto" id="prospecto" action="<?php $_SERVER['PHP_SELF']; ?>?id2=<?php echo $id1.$edita.$edita1; ?>&salva=ok" method="POST">
<?php while($row = mysql_fetch_array($result))
  { ?>
<table width="400" border="0" align="center">
  <tr>
    <td><label>Nome da Escola:</label>
      <input type="text" name="nome" id="nome" class="texto" style="height: 15px;" value="<?php echo $row["prospecto_nome"]; ?>" />
    </td>
    <td><label>Nome do Responsavel:</label>
      <input type="text" name="responsavel" id="responsavel" class="texto" style="height: 15px;" value="<?php echo $row["prospecto_responsavel"]; ?>" /></td>
  </tr>
  <tr>
    <td><label>E-mail:</label><br />
<input type="text" name="email" id="email" class="texto" style="height: 15px;" value="<?php echo $row["prospecto_email"]; ?>"/></td>
    <td><label>Telefone Fixo:</label><br />
<input type="text" name="tel_fixo" id="tel_fixo" class="texto" maxlength="14" value="<?php echo $row["prospecto_tel_fixo"]; ?>" /></td>
  </tr>
  <tr>
    <td><label>Telefone Celular:</label><br />
<input type="text" name="tel_cel" id="tel_cel" class="texto" maxlength="14" value="<?php echo $row["prospecto_tel_cel"]; ?>" /></td>
    <td><label>Origem</label><br />
<select name="origem">
<option value="<?php echo $row["prospecto_origem"]; ?>"><?php echo $row["prospecto_origem"]; ?></option>
<option value="facebook">Facebook</option>
<option value="site">Site</option>
<option value="ligação direta">Ligação Direta</option>

</select></td>
    </tr>
  <tr>
    <td><label>Cidade</label><br />
  <input type="text" name="cidade" id="cidade" value="<?php echo $row["prospecto_cidade"]; ?>" /></td>
    
   
    
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
</select></td>


  </tr>

  <tr>
    <td>Data de Cadastro:<br />
<input type="text" name="data" value="<?php echo $row["prospecto_data"]; ?>" disabled="disabled" /></td>
    <td>&Uacute;ltima Modifica&ccedil;&atilde;o:<br />

<input type="text" name="data_mod" value="<?php echo $row["prospecto_data_mod"]; ?>" disabled="disabled" /></td>
  </tr>
  <tr>
    <td><input type="submit" name="envia_prospecto" id="envia_prospecto" value="Salvar" /><input type="button" name="cancela_prospecto" id="cancela_prospecto" value="Cancelar" onclick="fechar();" /></td>
        <td><input type="button" name="botao2" value="Enviar para Clientes" /></td>
  </tr>
</table>

<?php
  }
?>
    </form></div>
    <div class="TabbedPanelsContent"> 
    <form name="historico" id="historico" method="POST" action="<?php $_SERVER['PHP_SELF']; ?>?id4=<?php echo $id1.$edita.$edita1; ?>">
    <strong>Última observação</strong><br style="margin-bottom: 10px;" />

   <span style="width: 100px;"><?php echo $row2["historico_data"]."\r"; ?> - <?php echo $row2["historico_mensagem"]."\r"; ?></span>
  
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