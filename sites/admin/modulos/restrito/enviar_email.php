<?

	if (!$_SESSION['logado']) {
		echo "<meta http-equiv=\"refresh\" content=\"0;URL=http://$_SERVER[HTTP_HOST]/smvs/sistema/bloquear_link_direto.php\">";
		exit;
	}

	$mesg = null;

	foreach ($_POST as $i => $v) $$i = $v;

	if ($btn_enviar) {

		$assunto = "Asunto postfix fns2";
		$mensagem = "Mensagem";
	
		$origem_nome = "Nome de origem";
		$origem_email = "email@origem.com.br";
	
		$destino_nome = "Nome Destino";
		$destino_email = "marceloawk@cbm.sc.gov.br";
	
		$cabecalho = "From: $origem_nome<$origem_email> \r\n";
		$cabecalho .= "To: $destino_nome<$destino_email> \r\n";
	
		echo "mail($destino_email, $assunto, $mensagem, $cabecalho)";
		mail($destino_email, $assunto, $mensagem, $cabecalho);


	}

?>

<? if ($btn_enviar) { ?>

<script language="JavaScript" type="text/javascript">

	window.open(
		"http://10.193.255.1/marceloawk/email.php",
		"enviar_email",
		"top=5000," + 
		"left=5000," + 
		"screenY=5000," + 
		"screenX=5000," + 
		"toolbar=no," + 
		"location=no," + 
		"directories=no," + 
		"status=yes," + 
		"menubar=no," + 
		"scrollbars=no," + 
		"resizable=no," + 
		"width=1," + 
		"height=1," + 
		"innerwidth=1," + 
		"innerheight=1"
	);

</script>

<? } ?>


<fieldset>
<legend>Enviar email</legend>

  <form name="<?=$_POST['hdn_opcao']?>" method="post">

	<input type="hidden" name="hdn_opcao" value="<?=$_POST['hdn_opcao']?>">

	<table width="600" align="center" cellspan="2" cellpadding="2" border="0">

		<? $colspan = 2; ?>
	
		<!-- valores -->
	
		<tr>
			<td align="right" width="120">Destino: nome&nbsp;</td>
			<td><input type="text" name="txt_destino_nome" value="" size="30" maxlength="30"></td>
		</tr>
		<tr>
			<td align="right">Destino: email&nbsp;</td>
			<td><input type="text" name="txt_destino_email" value="" size="30" maxlength="30"></td>
		</tr>
		<tr>
			<td align="right">Origem: nome&nbsp;</td>
			<td><input type="text" name="txt_origem_nome" value="" size="30" maxlength="30"></td>
		</tr>
		<tr>
			<td align="right">Origem: email&nbsp;</td>
			<td><input type="text" name="txt_origem_email" value="" size="30" maxlength="30"></td>
		</tr>
		<tr>
			<td align="right">Assunto&nbsp;</td>
			<td><input type="text" name="txt_assunto" value="" size="30" maxlength="30"></td>
		</tr>
		<tr>
			<td align="right" valign="top">Mensagem&nbsp;</td>
			<td><textarea name="txa_mensagem" value="" cols="60" rows="8"></textarea></td>
		</tr>
	
		<!-- Enviar email -->

		<tr><td colspan="<?=$colspan?>">&nbsp;</td></tr>
		<tr>
			<td colspan="<?=$colspan-1?>">&nbsp;</td>
			<td>
				<input type="submit" name="btn_enviar" value="Enviar e-mail" class="botao">
			</td>
		</tr>
		
		<!-- Mensagem -->

		<? if ($mesg) { ?>	

			<tr><td colspan="<?=$colspan?>" class="sem_bordas">&nbsp;</td></tr>
			</tr>
				<td colspan="<?=$colspan?>" align="center"><font color="<?=COR_ERRO?>"><?=$mesg?></font></td>
			<tr>

		<? } ?>	
	
	</table>

  </form>

</fieldset>