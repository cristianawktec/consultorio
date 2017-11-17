
<?php
session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>GERENCIAMENTO DE RELACIONAMENTO COM O CLIENTE - CRM GENESIS [Vers&atilde;o 1.0] </title>



<script type="text/javascript" src="js/jquery-1.4.2.js"></script>
<script type='text/javascript' src="js/jquery.autocomplete.js"></script>
<link rel="stylesheet" type="text/css" href="js/jquery.autocomplete.css" />

<script type="text/javascript">
$().ready(function() {
$("#course").autocomplete("autoCompleteMain.php", {
width: 260,
matchContains: true,
//mustMatch: true,
//minChars: 0,
//multiple: true,
//highlight: false,
//multipleSeparator: ",",
selectFirst: false
});
});
</script>

<style type="text/css">

#tudo {width: 1000px; margin: 0 auto;}
#menu {margin: 0 auto; width: 500px;}
#menu ul {border: 1px dotted #CCC; width: 380px; padding: 5px; text-align:center; font-size:12px;}
#menu li {font-family: Arial, Helvetica, sans-serif; list-style: none; display: inline;}
#prospecto {width: 498px;  height: 400px; border: 1px solid #CCC; float:left;}
h1 {padding-left: 10px;}
label {padding-left: 10px;}
#b_novo_prospecto {padding: 30px; margin-left: 150px; }
#b_novo_cliente {padding: 30px; margin-left: 150px; }
#clientes {width: 498px; height: 400px; border: 1px solid #CCC; float: left;}
.botao {text-decoration: none;}

</style>

</head>

<body>

<div id="tudo">

<div id="menu">

<ul>
	<li>| <a href="#">Exportar Contatos</a> </li>
    <li>| <a href="#">Aniversariantes</a> </li>
    <li>| <a href="#">Lembretes Gerais</a> </li>
    <li>| <a href="#">Sair</a> |</li>
</ul> 

   
</div>

<div id="prospecto"><h1>PROSPECTOS</h1> 


<div id="content">
<form autocomplete="off" action="prospecto.php" name="busca_prospecto" method="POST">
<p>
Buscar Prospecto <label>:</label>
<input type="text" name="course" id="course" />

<input type="submit" name="b_busca_prospecto" id="b_busca_prospecto" value="Acessar" /></p>
</form>
</div>

<br />
<br />
<a href="prospectos.php" class="botao"><input type="button" name="b_novo_prospecto" id="b_novo_prospecto" value="GERENCIAR" /></a>
</div>

<div id="clientes"> <h1>CLIENTES</h1>

<label>Buscar Cliente</label>&nbsp; <input type="text" name="busca_cliente" id="busca_cliente" />
<input type="submit" name="b_busca_cliente" id="b_busca_cliente" value="Buscar" /><br />
<br />
<br />
<a href="#" class="botao"><input type="button" name="b_novo_cliente" id="b_novo_cliente" value="GERENCIAR" /></a>

</div>

</div>

</body>
</html>