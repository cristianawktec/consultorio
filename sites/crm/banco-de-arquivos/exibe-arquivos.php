<?php include("seguranca.php"); // Inclui o arquivo com o sistema de seguran�a



protegePagina(); // Chama a fun��o que protege a p�gina



session_start();



$nivel = $_SESSION['usuarioNivela'];





$id = $_GET["id"];



?>

<?php include_once("conexao.php"); ?>





<?php 

$query = mysql_query("SELECT * FROM arquivos where setor_id = '$id'");



$query2 = mysql_query("SELECT * FROM arquivos where arquivo_id ='$id'");

$row2 = mysql_fetch_array($query2);



?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">



<html xmlns="http://www.w3.org/1999/xhtml">



<head>



<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />



<META NAME="robots" CONTENT="noindex, nofollow">



<META NAME="robots" CONTENT="noarchive">



<META NAME="robots" CONTENT="index, nofollow, noarchive">



<title>GERENCIAMENTO DE RELACIONAMENTO COM O CLIENTE - CRM GENESIS [Vers&atilde;o 1.0] </title>

















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



#topo {width:auto; height: 40px; background-color:#090; margin-top: -10px; margin-left: -10px; margin-right: -10px; margin-bottom: 50px; overflow:hidden; }





#tabela {

margin-top: 100px;

border: 1px dotted #ccc;

padding: 10px;	

}



#tabela a{

font-family: Arial, Helvetica, sans-serif;

color: #333;

display: block;

text-decoration: none;	

padding: 5px;

}







#tabela a:hover{

	color: #FFF;

	background-color: #333;

	

	display: block;



}

.link a{
color: #393939;
font-family: arial;
font-size: 12px;
text-decoration: none;
}

.link a:hover{

color: #00a3ea;
}

table{
color: #393939;
font-family: arial;
font-size: 12px;	
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







<table border="0" align="CENTER" style="text-align:center; margin-top: 50px; BORDER: 1px solid #E5E5E5;">

<form id="arquivo" name="arquivo" enctype="multipart/form-data" action="envia_arquivo.php?id=<?php echo $id; ?>" method="POST">

  <tr>

    <td colspan="4"><a href="index.php"><button type="button">VOLTAR</button></a></td>

  </tr>

  <?php if($nivel == '1'){ ?><tr style="background-color: #00a3ea; color: #fff; font-family: Arial, Helvetica, sans-serif;">

    <td colspan="4">Enviar novo arquivo<br /><br />



               <input type="file" name="arquivo" />

               

               <input type="hidden" name="radio" value="copy" checked="copy();" /><br>

  <input type="hidden" name="radio1" value="move_uploaded_file1" checked="move_uploaded_file();" /><br />



  <input type="submit" value="Enviar" />

  <br />

  <br /></td>

    </tr>

</form>

 <?php } ?>

  <tr style="font-family:Arial, Helvetica, sans-serif; background-color: #5ec9f8; color: #FFF;">

    <td colspan="4"><strong>ARQUIVOS  <?php echo $row2["setor_arquivo_nome"]; ?></strong></td>

  </tr>

  <tr style="font-family:Arial, Helvetica, sans-serif; background-color: #FFF; color: #00a3ea;">

    <td><strong>Arquivo</strong></td>

    <td><strong>Usuario</strong></td>

      <td><strong>Data</strong></td>

  </tr>

	<?php while($row = mysql_fetch_array($query)){ 
	
	if ($contacor % 2 == 1){
$coratual = "#FFF";
}else{
$coratual = "#cee6f1"; }
$contacor++;	
	
	?>





   <tr  bgcolor="<?=$coratual?>">

    <td class="link"><a href="download.php?id=<?php echo $row["arquivo_id"]; ?>"><?php echo $row["arquivo_nome"]; ?></a></td>

    <td><?php echo $row["arquivo_usuario"]; ?></td>

    <td><?php echo $row["arquivo_data"]; ?></td>

     <?php if($nivel == '1'){ ?><td> <a href="remover.php?id=<?php echo $row["arquivo_id"]; ?>"><img src="images/remove-icon.png" border="0" /></a> </td><?php } ?>

  </tr>

	<?php } ?>



</table>
</body>



</html>