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
$data_nasc = $_POST["data_nasc"];
$endereco = $_POST["endereco"];
$complemento = $_POST["complemento"];
$bairro = $_POST["bairro"];
$cep = $_POST["cep"];
$atendente1 = $_POST["atendente"];

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



$atendentes2 = mysql_query("SELECT * FROM usuarios where id = '$atendente1'");
$row_atendentes2 = mysql_fetch_array($atendentes2);
$user2 = $row_atendentes2["nome"];

$user = $row_atendentes["nome"];

if($id1 != "" or $id2 != ""){	

$result = mysql_query("SELECT * FROM clientes where cliente_id = '$id1'");

$pesquisas = mysql_query("SELECT * FROM pesquisas where pesquisa_cli_id = '$id1'");

$query = mysql_query("SELECT * FROM clientes where cliente_id = '$id1'");
$row4 = mysql_fetch_array($query);

$id_atende = $row4["cliente_atendente_id"];


$atende = mysql_query("SELECT * from usuarios");

$atende1 = mysql_query("SELECT * from usuarios where id = '$id_atende'");
$row_atende1 = mysql_fetch_array($atende1);

$result1 = mysql_query("SELECT * FROM historico where historico_prospecto_id = '$id1'");

$result2 = mysql_query("SELECT * FROM clientes where cliente_id = '$id1'");
$query_cli = mysql_fetch_array($result2);

$arquivos = mysql_query("SELECT * FROM documentos where documento_cli_id = '$id1'");

}

if($edita !=""){	

$query = mysql_query("UPDATE clientes SET cliente_nome='$nome', cliente_responsavel = '$responsavel', cliente_email='$email', cliente_tel_fixo='$tel_fixo', cliente_tel_cel='$tel_cel', cliente_endereco='$endereco', cliente_complemento='$complemento', cliente_bairro='$bairro', cliente_cep='$cep', cliente_nasc='$data_nasc', cliente_origem='$origem', cliente_cidade='$cidade', cliente_uf='$estado', cliente_data_mod='$data2', cliente_atendente = '$user2', cliente_atendente_id = '$atendente1', cliente_atendente_edita = '$user', cliente_atendente_edita_id = '$atendente' WHERE cliente_id='$IDsessao' ") or die(mysql_error());

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

if($obs != ""){
mysql_query("INSERT INTO historico (historico_prospecto_id, historico_mensagem, historico_data) VALUES ('$id1','$obs', CURDATE())") or die(mysql_error());

$query1 = mysql_query("UPDATE clientes SET cliente_historico_data = CURDATE(), cliente_ultimo_historico = '$obs' WHERE cliente_id='$id1' ") or die(mysql_error());
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
    <li class="TabbedPanelsTab" tabindex="0">Histórico</li>
    <li class="TabbedPanelsTab" tabindex="0">Documentação</li>
    <li class="TabbedPanelsTab" tabindex="0">Pesquisa de Satisfação</li>
  </ul>
  <div class="TabbedPanelsContentGroup">
    <div class="TabbedPanelsContent"><form name="prospecto" id="prospecto" action="<?php $_SERVER['PHP_SELF']; ?>?id2=<?php echo $id1.$edita.$edita1; ?>&salva=ok" method="POST">
<?php while($row = mysql_fetch_array($result))
  { ?>
<table width="400" border="0" align="center">
  <tr>
    <td>
   <input type="hidden" name="id" id="id" />
    <label>Nome da Escola</label>
      <input type="text" name="nome" id="nome" class="texto" style="height: 15px;" value="<?php echo $row["cliente_nome"]; ?>" />
    </td>
    <td><label>Nome do Responsavel</label>
      <input type="text" name="responsavel" id="responsavel" class="texto" style="height: 15px;" value="<?php echo $row["cliente_responsavel"]; ?>" /></td>
  </tr>
  <tr>
    <td><label>E-mail</label><br />
  <input type="text" name="email" id="email" class="texto" style="height: 15px;" value="<?php echo $row["cliente_email"]; ?>"/></td>
    <td><label>Data de Nascimento</label><br />
      <input type="text" name="data_nasc" id="data_nasc" OnKeyUp="mascaraData(this);" class="texto1"  maxlength="10" value="<?php echo $row["cliente_nasc"]; ?>"/></td>
  </tr>
  <tr>
    <td><label>Telefone Fixo</label><br />
  <input type="text" name="tel_fixo" id="tel_fixo" class="texto1" maxlength="14" value="<?php echo $row["cliente_tel_fixo"]; ?>" /></td>
    <td><label>Telefone Celular</label><br />
  <input type="text" name="tel_cel" id="tel_cel" class="texto1" maxlength="14" value="<?php echo $row["cliente_tel_cel"]; ?>" /></td>
  </tr>
  <tr>
    <td><label>Endere&ccedil;o</label>
      <br />
  <input type="text" name="endereco" id="endereco"  class="texto" value="<?php echo $row["cliente_endereco"]; ?>"/></td>
    <td><label>Bairro</label>
      <br />
<input type="text" name="bairro" id="bairro"  class="texto" value="<?php echo $row["cliente_bairro"]; ?>"/></td>
  </tr>
  <tr>
    <td><label>CEP</label>
      <br />
<input type="text" name="cep" id="cep"  class="texto1" OnKeyUp="mascaraCEP(this);" maxlength="9" value="<?php echo $row["cliente_cep"]; ?>"/></td>
    <td><label>Cidade</label><br />
  <input type="text" name="cidade" id="cidade" value="<?php echo $row["cliente_cidade"]; ?>" class="texto" /></td>
  </tr>
  <tr>
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
</select></td>
    
     <td><label>Origem</label><br />
<select name="origem" style="border: 1px solid #ccc; height: 27px;" id="origem" onchange="showDiv(this.value);">
<option value="<?php echo $row["cliente_origem"]; ?>"><?php echo $row["cliente_origem"]; ?></option>
<option value="Facebook">Facebook</option>
<option value="Indicação">Indicação</option>
<option value="Site">Site</option>
<option value="Ligação Direta">Ligação Direta</option>
<option value="E-mail Marketing">E-mail Marketing</option>

</select></td>

  </tr>

  <tr>
    <td>
    Vendedor<br />
    <select name="atendente"  style="border: 1px solid #ccc; height: 27px;">
    <option value="<?php echo $row_atende1["id"]; ?>"><?php echo $row_atende1["nome"]; ?></option>
    <?php while($row_atende = mysql_fetch_array($atende)){ ?>
    <option value="<?php echo $row_atende["id"]; ?>"><?php echo $row_atende["nome"]; ?></option>
    
    <?php } ?>
    
    </select></td>
    <td><div id="Indicação" class="invisivel"><label>Indicado por</label>
      <br />
      
<input type="text" name="indica" id="indica"  class="texto"/></div></td>
  </tr>
  <tr>
    <td>Data de Cadastro<br />
<input type="text" name="data" value="<?php echo $row["cliente_data"]; ?>" disabled="disabled" class="texto1" /></td>
    <td>&Uacute;ltima Modifica&ccedil;&atilde;o<br />

<input type="text" name="data_mod" value="<?php echo $row["cliente_data_mod"]; ?>" disabled="disabled" class="texto1" /></td>
  </tr>
  <tr>
    <td><input type="submit" name="envia_prospecto" id="envia_prospecto" value="Salvar" /><input type="button" name="cancela_prospecto" id="cancela_prospecto" value="Cancelar" onclick="fechar();" /></td>
        <td></td>
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

<a href="javascript:popUP('minhaJanela1', 'historico_cli.php?id=<?php echo $id1; ?>', 'width=550,height=580,toolbar=no,menubar=no,status=no,scrollbars=no,resizabl
e=yes')" style="font-size:12px;">Ver mais</a><br />
<br />

    <label>Adicionar Observa&ccedil;&otilde;es:</label><br />

    <textarea name="obs" id="obs"></textarea>
    <input type="hidden" name="data_obs" value="<?php echo $data; ?>" /><br />

    <input type="submit" name="envia_historico" id="envia_historico" value="Salvar" /><input type="button" name="cancela_prospecto" id="cancela_prospecto" value="Cancelar" onclick="fechar();" />
    </form></div>
     
     
     <div class="TabbedPanelsContent"> 
     Adicionar Arquivo<br />
     <form name="envia_arquivo" method="POST" enctype="multipart/form-data" action="envia_arquivo.php?id=<?php echo $query_cli["cliente_id"]; ?>">
     <input type="file" name="arquivo" />
     
     <input type="hidden" name="radio" value="copy" checked="copy();" /><br>
<input type="hidden" name="radio1" value="move_uploaded_file1" checked="move_uploaded_file();" />
<input type="submit" value="Enviar" />
     
     </form>
     
     Arquivos
    <br />
<?php 
while($row_arquivos = mysql_fetch_array($arquivos)){ 
?>
<a href="download.php?arquivo=<?php echo $row_arquivos["documento_id"]; ?>"><?php echo $row_arquivos["documento_nome"]; ?></a>

<?php } ?>

<br />
<br />

     </div>
     
     <div class="TabbedPanelsContent"> 
     Pesquisas de Satisfação<br />
<a href="satisfacao_cliente.php?id=<?php echo $query_cli["cliente_id"]; ?>" target="_blank">Adicionar Nova Pesquisa</a>

Cliente<br />
<?php while($row_pesquisas = mysql_fetch_array($pesquisas)){ 
echo $row_pesquisas["pesquisa_data"]."<br>";

} ?>

Gerente de Vendas
     </div>
    
  </div>
</div>

<script type="text/javascript">
<!--
var TabbedPanels1 = new Spry.Widget.TabbedPanels("TabbedPanels1");
//-->
</script>
</body>
</html>