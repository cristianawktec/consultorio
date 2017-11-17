<?php ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', dirname(__FILE__) . '/error_log.txt');
error_reporting(E_ALL);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>GERENCIAMENTO DE RELACIONAMENTO COM O CLIENTE - CRM GENESIS [Vers&atilde;o 1.0]</title>

<style type="text/css">
body {background:url(imagens/fundo.jpg);}
#tudo {width: 1000px; margin: 0 auto; font-family: Arial, Helvetica, sans-serif;}
#topo {width:auto; height: 40px; background-color:#090; margin-top: -10px; margin-left: -10px; margin-right: -10px; margin-bottom: 50px; overflow:hidden;}
</style>

</head>

<body>

<div id="topo"> </div>
<div id="tudo">
<table width="350" border="0" align="center";>

    <tr>
    <td width="300" style="font-size: 12px; text-align:center;">&nbsp;</td>
  </tr>

    <tr>
    <td align="center"><img src="images/logo1.png" style="width:200px;" /></td>
  </tr>
    <tr>
      <td align="center">&nbsp;</td>
    </tr>
</table>

<form method="post" action="valida.php">

<table width="200" border="0" align="center" style="border: 1px solid #CCC;">

  <tr>
    <td align="center"><label>Usu&aacute;rio</label></td>
  </tr>
  <tr>
    <td align="center"><input type="text" name="usuario" maxlength="50" /></td>
  </tr>
  <tr>
    <td align="center"><label>Senha</label></td>
  </tr>
  <tr>
    <td align="center"><input type="password" name="senha" maxlength="50" /></td>
  </tr>
  <tr>
    <td align="center"><input type="submit" value="Entrar" /></td>
  </tr>
</table>
</form>


</div>
<div id="rodape" style="font-family:Arial, Helvetica, sans-serif; font-size: 9px; position: absolute; bottom: 0px; right: 10px; color:#666;"><tr>
      <td align="center"><i>GERENCIAMENTO DE RELACIONAMENTO COM O CLIENTE GENESIS [Versão 1.0]</i></td>
    </tr>
    
    </div>

</body>
</html>