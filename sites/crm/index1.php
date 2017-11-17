<?php include("seguranca.php"); // Inclui o arquivo com o sistema de segurança

protegePagina(); // Chama a função que protege a página

session_start();

$nivel = $_SESSION['usuarioNivel'];

?>

<?php include ("autoCompleteMain.php"); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<META NAME="robots" CONTENT="noindex, nofollow">

<META NAME="robots" CONTENT="noarchive">

<META NAME="robots" CONTENT="index, nofollow, noarchive">

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

<script type="text/javascript">

$().ready(function() {

$("#course1").autocomplete("autoCompleteMain_clientes.php", {

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

<script>

function popUP(nome, url, settings){

    var  w, h, left, top 
    w=screen.width
    h=screen.height        
    left=(w-550)/2
    top=(h-250)/2    
    settings+=", left="+left+", top="+top
	// w=document.getElementById("course").value;
	window.open(url, nome, settings)

}

function popUP1(nome, url, settings){

    var  w, h, left, top
    w=screen.width
    h=screen.height    
    left=(w-550)/2
    top=(h-250)/2
    settings+=", left="+left+", top="+top
    w=document.getElementById("course").value;
	window.open(url+"?id="+w, nome, settings)

}

function popUP2(nome, url, settings){

    var  w, h, left, top
    w=screen.width
    h=screen.height    
    left=(w-560)/2
    top=(h-530)/2
    settings+=", left="+left+", top="+top
	w=document.getElementById("course1").value;
    window.open(url+"?id="+w, nome, settings)

}



function popUPedita(nome, url, settings){

    var  w, h, left, top
    w=screen.width
    h=screen.height       
    left=(w-230)/2
    top=(h-300)/2
    settings+=", left="+left+", top="+top
    window.open(url, nome, settings)

}

function popUPusuarios(nome, url, settings){

    var  w, h, left, top
    w=screen.width
    h=screen.height
	left=(w-230)/2
    top=(h-300)/2
    settings+=", left="+left+", top="+top
    window.open(url, nome, settings)

}



</script>



<style type="text/css">

body {background:url(imagens/fundo.jpg);}

#tudo {width: 1000px; margin: 0 auto;}

#menu {margin: 0 auto; width: 600px;}

#menu ul {border: 1px dotted #CCC; width: 650px; padding: 5px; text-align:center; font-size:12px; height: 30px; line-height: 30px;}

#menu li {font-family: Arial, Helvetica, sans-serif; list-style: none; display: inline;}

#prospecto {width: 490px;  height: 400px; float:left; background-image:url(imagens/prospectos.png); background-repeat: no-repeat; background-position:center;}

h1 {padding-left: 10px; font-family:Arial, Helvetica, sans-serif; color:#030; font-size: 20px;}

label {padding-left: 10px;}

#b_novo_prospecto {padding: 30px; margin-left: 150px; }

#b_novo_cliente {padding: 30px; margin-left: 150px; }

#clientes {width: 490px; height: 400px; float: left; margin-left: 10px;background-image:url(imagens/clientes.png); background-repeat: no-repeat; background-position:center;}

.botao {text-decoration: none;}

.cadastro {float: left; margin: 0 auto; text-decoration: none; border: 1px dashed #FFF; color:#666; margin-left: 100px;}

.cadastro:hover {border: 1px dashed #999;}

.edita {float: left; margin-left: 40px; text-decoration: none; border: 1px dashed #FFF; padding-left: 15px; padding-right: 15px; color:#666; margin-top: -18px;}

.edita:hover {border: 1px dashed #999; }

#topo {width:auto; height: 40px; background-color:#090; margin-top: -10px; margin-left: -10px; margin-right: -10px; margin-bottom: 50px; overflow:hidden; }

</style>

</head>

<body>

<div id="topo"> </div>

<div id="tudo">

<div id="menu">

<ul>

	<?php if($nivel == "1"){?>

    <li>| <a href="javascript:popUPedita('janelaUsuarios', 'usuarios.php', 'width=230,height=200,toolbar=no,menubar=no,status=no,scrollbars=yes,resizable=yes')">Gerenciar Usuários</a> </li>

   
	<li>| <a href="javascript:popUPedita('janelaEdita', 'edita.php', 'width=230,height=150,toolbar=no,menubar=no,status=no,scrollbars=no,resizabl

e=yes')">Alterar Senha</a> </li>

	<li>| <a href="exportar.php">Exportar Prospectos</a></li>

    <li>| <a href="exportar_cli.php">Exportar Clientes</a></li><?php }?>

    <li>| <a href="javascript:popUP('janelaAniversariantes', 'aniversariantes.php', 'width=450,height=350,toolbar=no,menubar=no,status=no,scrollbars=no,resizabl

e=yes')">Aniversariantes</a> </li>

    <li>| <a href="#">Lembretes</a> </li>

    <li>| <a href="logout.php">Sair</a> |</li>

</ul> 

</div>


<div id="prospecto"> 

<div id="content" style="font-family: arial; font-size: 13px;">

<form autocomplete="off"  name="busca_prospecto" method="POST" id="busca_prospecto" action="javascript:popUP1('janelaBusca', 'edita_prospecto.php', 'width=565,height=450,toolbar=no,menubar=no,status=no,scrollbars=no,resizable=no')">

<br />

<br />

<br />

<br />

<br />

<br />

<p>

<label style="margin-left: 45px;">Buscar Prospecto :</label>

<input type="text" name="course" id="course"  />

<input type="submit" name="envia" value="Acessar" />

</p>

</form>

</div>

<br />

<br />

<a href="javascript:popUP('janelaCadastro', 'novo_prospecto.php', 'width=565,height=500,toolbar=no,menubar=no,status=no,scrollbars=no,resizabl

e=yes')" class="cadastro"><img src="imagens/add_male_user_98364.jpg" width="100" border="0" style="margin-left: 15px;" /><br />

<span style="text-align:center; font-family:Arial, Helvetica, sans-serif; font-size: 13px;">Cadastrar Prospecto</span></a> <br />

<a href="edita_prospectos.php" class="edita"><img src="imagens/edit_clear_list.png" width="100" border="0" style="margin-left: 2px;"/><br />

<span style="text-align:center; font-family:Arial, Helvetica, sans-serif; font-size: 13px;">Listar Prospectos</span></a> 

</div>

</div>

<div id="clientes" style="font-family: arial; font-size: 13px;">

<div id="content" style="font-family: arial; font-size: 13px;">

<form autocomplete="off"  name="busca_cliente" method="POST" id="busca_cliente" action="javascript:popUP2('janelaBusca2', 'edita_cliente.php', 'width=565,height=560,toolbar=no,menubar=no,status=no,scrollbars=no,resizable=no')">

<br />

<br />

<br />

<br />

<br />

<br />

<p>

<label style="margin-left: 45px;">Buscar Cliente :</label>

<input type="text" name="course1" id="course1"  />

<input type="submit" name="envia" value="Acessar" />

</p>

</form>

</div>

<br />

<br />

<a href="javascript:popUP('janelaCadastro', 'novo_cliente.php', 'width=560,height=530,toolbar=no,menubar=no,status=no,scrollbars=no,resizabl

e=yes')" class="cadastro"><img src="imagens/add_male_user_98364.jpg" width="100" border="0" style="margin-left: 15px;" /><br />

<span style="text-align:center; font-family:Arial, Helvetica, sans-serif; font-size: 13px;">Cadastrar Cliente</span></a> <br />



<a href="edita_clientes.php" class="edita"><img src="imagens/edit_clear_list.png" width="100" border="0" style="margin-left: 2px;"/><br />

<span style="text-align:center; font-family:Arial, Helvetica, sans-serif; font-size: 13px;">Listar Clientes</span></a> 



</div>



</div>





<div id="rodape" style="font-family:Arial, Helvetica, sans-serif; font-size: 9px; position: absolute; bottom: 0px; right: 10px; color:#666;"><tr>

      <td align="center"><i>GERENCIAMENTO DE RELACIONAMENTO COM O CLIENTE <strong>EDUCA GENESIS</strong> [Versão 1.0]</i></td>

    </tr>

</div>

</body>

</html>