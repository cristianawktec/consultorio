<?php 

include("seguranca.php"); // Inclui o arquivo com o sistema de seguran�a

protegePagina(); // Chama a fun��o que protege a p�gina

@session_start();

$nivel = $_SESSION['usuarioNivela'];
$usuario_id = $_SESSION['usuarioIDa'];

include_once("conexao.php");

$query2 = mysql_query("SELECT * FROM usuarios where id ='$usuario_id'");
$row2 = mysql_fetch_array($query2);
$setor_id = $row2["usuarios_arquivos_visualiza"];

if($nivel == "0"){

$query = mysql_query("SELECT * FROM arquivos where arquivo_id =''");
}elseif($nivel == "1"){
	
	$query = mysql_query("SELECT * FROM arquivos");
	
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<META NAME="robots" CONTENT="noindex, nofollow">

<META NAME="robots" CONTENT="noarchive">

<META NAME="robots" CONTENT="index, nofollow, noarchive">

<title>GERENCIAMENTO DE RELACIONAMENTO COM O CLIENTE - CRM AWK [Vers&atilde;o 1.0] </title>

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
#menu {margin: 0 auto; width: 100%;}
#menu ul {border: 1px dotted #CCC; width: 100%; padding: 5px; text-align:center; font-size:12px; height: 30px; line-height: 30px;}
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
#topo {width:auto; height: 40px; background-color:#002599; margin-top: -10px; margin-left: -10px; margin-right: -10px; margin-bottom: 50px; overflow:hidden; }

#tabela {
margin-top: 50px;
border: 1px dotted #ccc;
padding: 10px;
background-color: #fff;	
}

#tabela a{
font-family: Arial, Helvetica, sans-serif;
color: #00a3ea;
display: block;
text-decoration: none;	
padding: 5px;
}

#tabela a:hover{
	color: #FFF;
	background-color: #00a3ea;
	
	display: block;

}

#menu_arquivos {
	color: #333;
	font-family: Arial, Helvetica, sans-serif;
	width: 200px;
	text-align: center;
	margin: 0 auto;
	margin-top: 50px;
}

#menu_arquivos a{
	color: #00a3ea;
	font-family: Arial, Helvetica, sans-serif;
text-decoration: none;
	text-align: center;

}

#menu_arquivos a:hover{
	text-decoration: underline;
}
</style>
</head>
<body onload="moveRelogio()">
<div id="topo"> </div>
<div id="tudo">
<div id="menu">
<ul>
<li>| <a href="../index.php">P�gina Principal</a> </li>
	<?php if($nivel == "1"){?>
    <li>| <a href="javascript:popUPedita('janelaUsuarios', 'usuarios.php', 'width=230,height=200,toolbar=no,menubar=no,status=no,scrollbars=yes,resizable=yes')">Gerenciar Usu�rios</a> </li>
	<li>| <a href="javascript:popUPedita('janelaEdita', 'edita.php', 'width=230,height=150,toolbar=no,menubar=no,status=no,scrollbars=no,resizabl
e=yes')">Alterar Senha</a> </li>
	<li>| <a href="exportar.php">Exportar Prospectos</a></li>
    <li>| <a href="exportar_cli.php">Exportar Clientes</a></li><?php }?>
    <li>| <a href="javascript:popUP('janelaAniversariantes', 'aniversariantes.php', 'width=450,height=350,toolbar=no,menubar=no,status=no,scrollbars=no,resizabl
e=yes')">Aniversariantes</a> </li>
    <li>| <a href="javascript:popUP('janelaAniversariantes', 'lembretes.php', 'width=450,height=350,toolbar=no,menubar=no,status=no,scrollbars=no,resizabl
e=yes')">Lembretes</a> </li>
    <li>| <a href="logout.php">Sair</a> |</li>
</ul> 
</div>

</div>

<?php if($nivel == '1'){ ?><div id="menu_arquivos"><a href="usuarios.php">Gerenciar Usu�rios</a></li></div><?php } ?>

<table width="200" border="0" align="CENTER" style="text-align:center;" id="tabela">

	<?php while(@$row = mysql_fetch_array($query)){ ?>
  <tr>
    <td><a href="exibe-arquivos.php?id=<?php echo $row["setor_arquivo_id"]; ?>"><?php echo $row["setor_arquivo_nome"]; ?></a></td>
  </tr>
	<?php } ?>
</table>

<div id="rodape" style="font-family:Arial, Helvetica, sans-serif; font-size: 9px; position: absolute; bottom: 0px; right: 10px; color:#666;"><tr>
      <td align="center"><i>GERENCIAMENTO DE RELACIONAMENTO COM O CLIENTE <strong>EDUCA GENESIS</strong> [Vers�o 1.0]</i></td>
    </tr>
</div>
</body>
</html>