<?php

if(!empty($_GET["id"])){
$id = $_GET["id"];
}


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Incluir Entrevista de Campanha</title>

<style type="text/css">
.texto {width: 200px; border: 1px solid #CCC; height: 15px; padding: 5px; min-height: 15px;}
.textarea {width: 200px; height: 80px; border: 1px solid #CCC; padding: 5px; font-family:Arial, Helvetica, sans-serif; font-size: 12px; min-height: 80px; max-height: 80px; max-width: 200px; min-width: 200px;}

</style>
</head>

<body>
<form name="entrevista" id="entrevista" method="POST" action="envia_entrevista.php">
<table width="200" border="0" align="center" style="font-size: 12px; font-family:Arial, Helvetica, sans-serif; background-color: #E5E5E5; border: 1px solid #CCC;">
  <tr>
     <td colspan="2" align="center" style="background-color: #666; color: #fff;"><strong>ENTREVISTA DE CAMPANHA</strong></td>
    </tr>
  <tr>
    <td valign="bottom">
     Local de atendimento centralizado, conhecido e de facil acesso?<br />
<input type="text" name="local" class="texto"/></td>
    <td valign="bottom"> Local tem parede branca para Datashow? Conseguiu Datashow com cliente?<br />
<input type="text" name="datashow" class="texto"/></td>
  </tr>
  <tr>
    <td valign="bottom">As impressões do convite estão prontas?<br />
<input type="text" name="impressoes" class="texto"/></td>
    <td valign="bottom"> Conseguiu o PR&Ecirc;MIO para os alunos? A cidade j&aacute; teve esse pr&ecirc;mio em outras campanhas?<br />
    <input type="text" name="premio" class="texto"/></td>
  </tr>
  <tr>
    <td valign="bottom">Quantas escolas abriu para campanha? Todas em nosso padrão de palestras?<br />
<input type="text" name="escolas" class="texto"/></td>
    <td valign="bottom">Contrato da empresa ja está assinado pelo cliente?<br />
<input type="text" name="contrato" class="texto"/></td>
  </tr>
  <tr>
    <td valign="bottom">Algumas pendência na lista de providências?<br />
<input type="text" name="pendencias" class="texto"/></td>
    <td valign="bottom"> Conseguiu uma pessoa para acompanhar nas palestras?<br />
<input type="text" name="acompanhante" class="texto"/></td>
  </tr>
  <tr>
    <td valign="bottom">Como é o perfil do cliente e da escola?<br />
<input type="text" name="perfil" class="texto"/></td>
    <td valign="bottom">As escolas para divulgação são próximas ao local do atendimento?<br />
<input type="text" name="proximidade" class="texto"/>

<input type="hidden" name="cliente" value="<?php echo $id; ?>" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" align="center"><input type="submit" name="enviar" value="Enviar" /></td>
    </tr>
</table>



</form>

</body>
</html>