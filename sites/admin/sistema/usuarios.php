<?

	if ($_SESSION['perfil'] > 1 or !$_SESSION['perfil']) {
		echo "<meta http-equiv=\"refresh\" content=\"0;URL=http://$_SERVER[HTTP_HOST]/smvs/sistema/bloquear_link_direto.php\">";
		exit;
	}

	$mesg = null;

	foreach ($_POST as $i => $v) $$i = $v;

	if (@$btn_inserir and $txt_login and $sel_perfil and $txt_nome and $txt_senha) {

		$mesg = $obj_seguranca->cadastrar_usuario($sel_perfil, $txt_login, $txt_senha, $txt_nome);

	} elseif (@$btn_excluir and $txt_login) {

		$mesg = $obj_seguranca->excluir_usuario($txt_login);

	} elseif (@$btn_alterar and $txt_login) {

		$mesg = $obj_seguranca->alterar_usuario($sel_perfil, $txt_login, $hdn_login, $txt_senha, $txt_nome);

	} elseif (@$btn_inserir or @$btn_excluir or @$btn_alterar) {

		$mesg = 'Campos obrigatórios não preenchidos';

	}

	$usuarios = $obj_seguranca->usuarios();

	$perfis = array (
		'1' => 'Master',
		'2' => 'Administrador'
	);

?>
<script>

	function carregar_usuario(frm, login, perfil, nome) {

		frm.txt_login.value = login;
		frm.sel_perfil.value = perfil;
		frm.txt_nome.value = nome;
		frm.txt_login.value = login;
		frm.hdn_login.value = login;

	}

</script>
<form name="form_usuarios" method="post">

	<input type="hidden" name="hdn_opcao" value="usuarios">
	<input type="hidden" name="hdn_login">

	<table width="500" align="center" cellspan="2" cellpadding="2" border="1">
		<? $colspan = 3; ?>
	
	
		<? if (!$usuarios) { ?>

			<tr><th colspan="<?=$colspan?>">Nenhum usuário cadastrado</th></tr>

		<? } else { ?>

			<!-- cabecalhos -->
	
			<tr>
				<th>Login</th>
				<th>Perfil</th>
				<th>Nome</th>
			</tr>
		
			<!-- usuarios -->
		
			<? foreach ($usuarios as $login => $v) { ?>
	
				<tr onclick="carregar_usuario(form_usuarios,'<?=$login?>','<?=$v['perfil']?>','<?=$v['nome']?>');" style="cursor:pointer">
					<td align="center"><?=$login?></td>
					<td align="center"><?=$perfis[$v['perfil']];?></td>
					<td><?=$v['nome']?></td>
				</tr>
			<? } ?>

		<? } ?>

		<!-- adicionar -->
	
		<tr><td colspan="<?=$colspan?>" class="sem_bordas">&nbsp;</td></tr>
		<tr>
			<td class="sem_bordas" align="center">
				<input type="text" name="txt_login" size="10" maxlength="10">
			</td>
			<td class="sem_bordas" align="center">
				<select name="sel_perfil">
					<option value=""> - - - perfil - - - </option>
					<? foreach ($perfis as $i => $v) { ?>
						<option value="<?=$i?>"><?=$v?></option>
					<? } ?>
				</select>
			</td>
			<td class="sem_bordas" align="center">
				<input type="text" name="txt_nome" size="30" maxlength="50">
			</td>
		</tr>
		<tr>
			<td class="sem_bordas">&nbsp;</td>
			<td class="sem_bordas" align="right">Senha&nbsp;</td>
			<td class="sem_bordas" align="center">
				<input type="password" name="txt_senha" size="30">
			</td>
		</tr>
		<tr>
			<td class="sem_bordas" colspan="<?=$colspan-1?>">&nbsp;</td>
			<td class="sem_bordas" align="center">
				<input type="submit" name="btn_inserir" value="Inserir" class="botao">
				<? if ($usuarios) { ?>
					<input type="submit" name="btn_alterar" value="Alterar" class="botao">
					<input type="submit" name="btn_excluir" value="Excluir" class="botao">
				<? } ?>
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