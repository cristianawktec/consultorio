<?php 

include("conexao.php");

if(isset($_GET["entrevista"]) and !empty($_GET["entrevista"])){
$id = $_GET["entrevista"];
$query = mysql_query("SELECT * FROM entrevista_campanha where entrevista_campanha_id = '$id'");
$row = mysql_fetch_array($query);

}

if(isset($_GET["action"]) and $_GET["action"] == "atualiza"){

$id = $_GET["id"];
$data = date("d/m/Y");
$local = $_POST["local"];
$datashow = $_POST["datashow"];
$impressoes = $_POST["impressoes"];
$premio = $_POST["premio"];
$escolas = $_POST["escolas"];
$contrato = $_POST["contrato"];
$pendencias = $_POST["pendencias"];
$acompanhante = $_POST["acompanhante"];
$perfil = $_POST["perfil"];
$proximidade = $_POST["proximidade"];


mysql_query("UPDATE entrevista_campanha SET entrevista_campanha_local='$local', entrevista_campanha_datashow='$datashow', entrevista_campanha_impressoes='$impressoes', entrevista_campanha_premio='$premio', entrevista_campanha_escolas='$escolas', entrevista_campanha_contrato='$contrato', entrevista_campanha_pendencias='$pendencias', entrevista_campanha_acompanhante='$acompanhante', entrevista_campanha_perfil='$perfil', entrevista_campanha_proximidade='$proximidade' where entrevista_campanha_id = '$id'");

echo "<script>
alert('Entrevista atualizada com sucesso.');
window.location.href='ver_entrevista_campanha.php?entrevista=$id';


</script>";


$query = mysql_query("SELECT * FROM entrevista_campanha where entrevista_campanha_id = '$id'");
$row = mysql_fetch_array($query);

}



?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Entrevistra de Campanha</title>


<style type="text/css">
.texto {width: 200px; border: 1px solid #CCC; height: 15px; padding: 5px; min-height: 15px;}
.textarea {width: 200px; height: 80px; border: 1px solid #CCC; padding: 5px; font-family:Arial, Helvetica, sans-serif; font-size: 12px; min-height: 80px; max-height: 80px; max-width: 200px; min-width: 200px;}

</style>
</head>

<body>

<form name="entrevista" id="entrevista" method="POST" action="<?php $_SERVER['PHP_SELF']; ?>?action=atualiza&id=<?php echo $id; ?>">
<table width="200" border="0" align="center" style="font-size: 12px; font-family:Arial, Helvetica, sans-serif; background-color: #E5E5E5; border: 1px solid #CCC;">
  <tr>
     <td colspan="2" align="center" style="background-color: #666; color: #fff;"><strong>ENTREVISTA DE CAMPANHA</strong></td>
    </tr>
  <tr>
    <td valign="bottom">
     Local de atendimento centralizado, conhecido e de facil acesso?<br />
<input type="text" name="local" class="texto" value="<?php echo $row["entrevista_campanha_local"]; ?>"></td>
    <td valign="bottom"> Local tem parede branca para Datashow? Conseguiu Datashow com cliente?<br />
<input type="text" name="datashow" class="texto" value="<?php echo $row["entrevista_campanha_datashow"]; ?>"/></td>
  </tr>
  <tr>
    <td valign="bottom">As impressões do convite estão prontas?<br />
<input type="text" name="impressoes" class="texto" value="<?php echo $row["entrevista_campanha_impressoes"]; ?>"/></td>
    <td valign="bottom"> Conseguiu o PR&Ecirc;MIO para os alunos? A cidade j&aacute; teve esse pr&ecirc;mio em outras campanhas?<br />
    <input type="text" name="premio" class="texto" value="<?php echo $row["entrevista_campanha_premio"]; ?>"/></td>
  </tr>
  <tr>
    <td valign="bottom">Quantas escolas abriu para campanha? Todas em nosso padrão de palestras?<br />
<input type="text" name="escolas" class="texto" value="<?php echo $row["entrevista_campanha_escolas"]; ?>"/></td>
    <td valign="bottom">Contrato da empresa ja está assinado pelo cliente?<br />
<input type="text" name="contrato" class="texto" value="<?php echo $row["entrevista_campanha_contrato"]; ?>"/></td>
  </tr>
  <tr>
    <td valign="bottom">Algumas pendência na lista de providências?<br />
<input type="text" name="pendencias" class="texto" value="<?php echo $row["entrevista_campanha_pendencias"]; ?>"/></td>
    <td valign="bottom"> Conseguiu uma pessoa para acompanhar nas palestras?<br />
<input type="text" name="acompanhante" class="texto" value="<?php echo $row["entrevista_campanha_acompanhante"]; ?>"/></td>
  </tr>
  <tr>
    <td valign="bottom">Como é o perfil do cliente e da escola?<br />
<input type="text" name="perfil" class="texto" value="<?php echo $row["entrevista_campanha_perfil"]; ?>"/></td>
    <td valign="bottom">As escolas para divulgação são próximas ao local do atendimento?<br />
<input type="text" name="proximidade" class="texto" value="<?php echo $row["entrevista_campanha_proximidade"]; ?>"/>

</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="center"><input type="submit" name="enviar" value="Atualizar" /></td>
    <td align="center"><input type="submit" name="fechar" value="Fechar" onclick="javascript:window.close();" /></td>
    </tr>
</table>



</form>

</body>
</html>