<?

    require ('./sistema/requires.php');

	$hdn_opcao = null;

	if (!$obj_seguranca->usuario_existe($_SESSION['login']) and $_SESSION['logado'] and $_SESSION['perfil'] > -1) {

		session_destroy();

	} else {

		if (@$_POST['hdn_opcao']) $hdn_opcao = $_POST['hdn_opcao'];
	
		if (strpos($hdn_opcao,'://') > 0) header("location: $hdn_opcao");

	}

//printr($_SESSION);

?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
    <title><?=HTML_TITLE?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1"> 
    <meta name="description" content="Sistema WEB AwkAdmin" />
    <meta name="keywords" content="sitemas, awk, programacao, desenvolvimento, php, mysql, javascript" />
    <meta name="Author" content="Cristian Marques, Bruno Blazius" />
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
				<?=HTML_TITLE?><font size="2">&nbsp;<?=HOSTNAME?></font><br>
				<font size="1">&nbsp;<?=strtoupper(str_replace('_',' ',$hdn_opcao));?></font>
			</td>
        </tr>

		<!-- menu -->

		<tr><td><? require './sistema/menu.php'; ?></td></tr>

		<tr>
			<td>
				<table width="99%" align="center" cellspacing="0" cellpadding="0" border="0">
					<tr>
						<td><font color="#444444"><?=CIDADE?>, <?=DATA?>,&nbsp;<?=SEMANA?> - <?=FRASE?></td>

						<!-- usuario logado -->

						<? if ($_SESSION['logado']) { ?>

							<td align="right">
								<?=$_SESSION['nome'];?>&nbsp;|&nbsp;<a onclick="logout(form_logout);">Sair</a>
							</td>

						<? } ?>

					</tr>
				</table>
			</td>
		</tr>

		<!-- testes -->

		<?

			if ($mostrar) {

				echo "<tr><td>";
				if ($mostrar['get']) { echo "get"; printr($_GET); }
				if ($mostrar['post']) { echo "post"; printr($_POST); }
				if ($mostrar['request']) { echo "request"; printr($_REQUEST); }
				if ($mostrar['session']) { echo "session"; printr($_SESSION); }
				if ($mostrar['env']) { echo "env"; printr($_ENV); }
				if ($mostrar['server']) { echo "env"; printr($_SERVER); }
				echo "</td></tr>";

			}

		?>


		<!-- principal -->

        <tr height="400" valign="top">

            <td valign="top">
                <?
					if (file_exists('./modulos/'.$hdn_opcao.'.php'))
						require ('./modulos/'.$hdn_opcao.'.php'); 
					elseif (file_exists('./modulos/restrito/'.$hdn_opcao.'.php'))
						require ('./modulos/restrito/'.$hdn_opcao.'.php'); 
					elseif (file_exists('./modulos/mvs/'.$hdn_opcao.'.php'))
						require ('./modulos/mvs/'.$hdn_opcao.'.php'); 
					elseif (file_exists('./sistema/'.$hdn_opcao.'.php'))
						require ('./sistema/'.$hdn_opcao.'.php'); 
					else {
						if (false) //if (!$_SESSION['logado']) 
						require ("./modulos/login.php"); else require ("./modulos/inicial.php");
					}
				?>
            </td>
        </tr>

		<!-- rodap� -->

        <tr>
            <td colspan="<?=$colspan?>" class="rodape"><?=RODAPE?></td>
        </tr>
        <tr>
            <td height="300" valign="top" align="right" colspan="<?=$colspan?>">vers&atilde;o <?=VERSAO?>&nbsp;</td>
        </tr>
    </table>
</body>
</html>
