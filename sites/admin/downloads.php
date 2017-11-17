<?

//printr($_SESSION);

	$hdn_opcao = null;



?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
    <title><?=HTML_TITLE?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1"> 
    <meta name="description" content="euportal" />
    <meta name="keywords" content="sitemas, euportal, programacao, desenvolvimento, php, mysql, javascript" />
    <meta name="Author" content="Cristian Marques Santos" />
    <link rel="stylesheet" type="text/css" href="./css/smvs.css" />
    <link rel="stylesheet" type="text/css" href="./css/menu.css" />
    <script type="text/javascript" src="./js/smvs.js"></script>
</head>
<body>

	<form name="form_logout" method="post"><input type="hidden" name="hdn_opcao"></form>

    <table width="90%" align="center" cellpadding="0" cellspacing="0" border="0">

		<!-- cabecalho -->

        <tr>
            <td colspan="<?=$colspan?>" class="cabecalho">
				<font size="2">&nbsp;DOWNLOADS</font><br>
			</td>
        </tr>

		<!-- menu -->

		<tr><td><? //require './sistema/menu.php'; ?></td></tr>

		<tr>
			<td>
				<table width="99%" align="center" cellspacing="0" cellpadding="0" border="0">
					<tr>
						<td><font color="#444444">Florianopolis, <?=date("d/m/Y")?></td>

						<!-- usuario logado -->



					</tr>
				</table>
			</td>
		</tr>

		<!-- testes -->

		<?

// 			if ($mostrar) {
// 
// 				echo "<tr><td>";
// 				if ($mostrar['get']) { echo "get"; printr($_GET); }
// 				if ($mostrar['post']) { echo "post"; printr($_POST); }
// 				if ($mostrar['request']) { echo "request"; printr($_REQUEST); }
// 				if ($mostrar['session']) { echo "session"; printr($_SESSION); }
// 				if ($mostrar['env']) { echo "env"; printr($_ENV); }
// 				if ($mostrar['server']) { echo "env"; printr($_SERVER); }
// 				echo "</td></tr>";
// 
// 			}

		?>


		<!-- principal -->

        <tr height="400" valign="top">

            <td valign="top"><a href="/download/serial win server 2003.doc">serial win server 2003.doc</a><br>
			     <a href="/download/windows_server.iso">windows server 2003</a><br>
                 <?
// 					if (file_exists('./modulos/'.$hdn_opcao.'.php'))
// 						require ('./modulos/'.$hdn_opcao.'.php'); 
// 					elseif (file_exists('./modulos/restrito/'.$hdn_opcao.'.php'))
// 						require ('./modulos/restrito/'.$hdn_opcao.'.php'); 
// 					elseif (file_exists('./modulos/mvs/'.$hdn_opcao.'.php'))
// 						require ('./modulos/mvs/'.$hdn_opcao.'.php'); 
// 					elseif (file_exists('./sistema/'.$hdn_opcao.'.php'))
// 						require ('./sistema/'.$hdn_opcao.'.php'); 
// 					else {
// 						if (false) //if (!$_SESSION['logado']) 
// 						require ("./modulos/login.php"); else require ("./modulos/inicial.php");
// 					}
// 				?>
            </td>
        </tr>

		<!-- rodapé -->

        <tr>
            <td colspan="<?=$colspan?>" class="rodape"><?=RODAPE?></td>
        </tr>
        <tr>
            <td height="300" valign="top" align="right" colspan="<?=$colspan?>">vers&atilde;o <?=VERSAO?>&nbsp;</td>
        </tr>
    </table>
</body>
</html>
<!--
rsync -CravzpE /var/www/smvs/ --delete --exclude usuarios.inc.php root@homolog:/var/www/smvs/
rsync -CravzpE /var/www/smvs/ --delete --exclude usuarios.inc.php marceloawk@10.193.255.1:/var/www/marceloawk/smvs/
-->