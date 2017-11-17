<?PHP

	$menu['Inicial']['Pagina Inicial'] = 'inicial';
	if (!$_SESSION['logado']) $menu['Inicial']['Area Restrita'] = 'login';
	$menu['Awk']['Frases'] = 'frases';
	$menu['Awk']['Hosts'] = 'hosts';
	$menu['Awk']['Telefones'] = 'telefones';
	$menu['Awk']['Piadas'] = 'piadas';
	$menu['phpMyAdmin'] = 'http://mysql.awktec.com/login.php?phpMyAdmin=3dae3eeb39699b3ad6e5418c9c3653f7026caeb5';
	$menu['Sistemas']['ClickConsultorio']['HOMOLOGACAO'] = 'http://homologa.clickconsultorio.com/';
	$menu['Sistemas']['Redimensionador'] = 'redimensionador';

	$menu['Sistemas']['PHPinfo'] = 'http://awktec.com/phpinfo.php';
	$menu['Desenvolvimento']['ERROS DO SISTEMA'] = 'errostratados';
	$menu['Desenvolvimento']['GIT'] = 'git';
	$menu['Desenvolvimento']['Aprenda com o Guru'] = 'dudu';
	$menu['Desenvolvimento']['Crontab'] = 'crontab';
	$menu['Desenvolvimento']['Diversos'] = 'desenvolvimento';
	$menu['Desenvolvimento']['Editor VI'] = 'vi';
	$menu['Desenvolvimento']['Editor VIM'] = 'vim';
	$menu['Desenvolvimento']['Linux'] = 'linux';
	$menu['Desenvolvimento']['MySQL'] = 'mysql';
	$menu['Desenvolvimento']['PHP'] = 'php';
	$menu['Desenvolvimento']['Sesion'] = 'session';
	$menu['Desenvolvimento']['Shell Script'] = 'shell_script';
	$menu['Desenvolvimento']['Tabela de cores'] = 'cores';


	if ($_SESSION['logado']) $menu['Inicial']['Sair'] = 'logout';

	if ($_SESSION['logado'] and $_SESSION['perfil'] <= '2') {

		$menu['Area Restrita']['Comandos BDs'] = 'comandos_bds';
		$menu['Area Restrita']['Comparar Tabelas'] = 'comparar_tabelas';
		$menu['Area Restrita']['Enviar email'] = 'enviar_email';
		$menu['Area Restrita']['Estrutura BD'] = 'estrutura_bd';
		$menu['Area Restrita']['Portabilidade'] = 'portabilidade';
		$menu['Area Restrita']['Replicacao'] = 'replicacao';
		$menu['Area Restrita']['Scripts']['Atualizar e193-web'] = 'e193-web-atualizar';

	}

	if ($_SESSION['logado'] and $_SESSION['perfil'] <= '1') {

		$menu['Master']['Scripts']['Atualizar Boletos'] = 'atualizar_boletos';
		$menu['Master']['Scripts']['Atualizar Hosts'] = 'atualizar_hosts';
		$menu['Master']['Scripts']['Atualizar Lib'] = 'atualizar_lib';
		$menu['Master']['Scripts']['Atualizar Sigat'] = 'atualizar_sigat';
		$menu['Master']['Scripts']['Atualizar Upload'] = 'atualizar_upload';
		$menu['Master']['Scripts']['Backup Sigat'] = 'backup_sigat';
		$menu['Master']['Scripts']['Trocar Chaves'] = 'trocar_chaves';
		$menu['Master']['Usuarios'] = 'usuarios';

	}
	if ($_SESSION['logado'] and $_SESSION['perfil'] <= '1') {

		$menu['Contatos']['Telefones'] = 'contatos';

	}

	if ($_SESSION['logado'] and $_SESSION['perfil'] <= '1') {

		$menu['DiTI 11'] = 'http://10.193.190.11/diti/';

	}

	if ($_SESSION['logado'] and $_SESSION['perfil'] <= '1') {

		$menu['Spma'] = 'https://10.193.190.75/pma/';

	}


	if ($_SESSION['logado'] and $_SESSION['perfil'] < '1') {

		$menu['MvS']['links']['WebInf'] = 'http://www.inf.ufsc.br/webmail';
		$menu['MvS']['links']['Google'] = 'http://www.google.com';
		$menu['MvS']['links']['Gmail'] = 'http://www.gamail.com';
		$menu['MvS']['links']['Hotmail'] = 'http://www.hotmail.com';

	}

?><script language="javascript" type="text/javascript" action="">

	function submeter(op) {

		if (op) {

			var frm = this.document.frm_menu;
			frm.hdn_opcao.value = op;
			frm.submit();

		}

	}

</script>

<form name="frm_menu" method="post">
	<input type="hidden" name="hdn_opcao">
</form>

<table align="center" width="100%" cellpading="0" cellspacing="0">
	<tr>
		<td>

			<?PHP if (is_array($menu)) { ?>

				<ul class="menu2">
					<?PHP foreach ($menu as $rotulo1 => $link1) if (!is_array($link1)) { ?>

						<!-- nivel 1 -->

						<li class="top">
							<a onclick="submeter('<?PHP echo $link1?>')" class="top_link"><span><?PHP echo$rotulo1?></span></a>
						</li>

					<?PHP } else { ?>

						<!-- nivel 1 link -->

						<li class="top">
							<a class="top_link"><span class="down"><?PHP echo $rotulo1?></span></a>
							<ul class="sub">
								<?PHP foreach ($link1 as $rotulo2 => $link2) if (!is_array($link2)) { ?>

									<!-- nivel 2 -->

									<li>
										<a onclick="submeter('<?PHP echo $link2?>')" style="cursor:pointer"><?PHP echo $rotulo2?></a>
									</li>
								<?PHP } else { ?>

									<!-- nivel 2 link -->

									<li>
										<a class="fly"><?PHP echo $rotulo2?></a>
										<ul>
											<?PHP foreach ($link2 as $rotulo3 => $link3) { ?>
												<!-- nivel 3 link -->
												<li style="cursor:pointer">
													<span><a onclick="submeter('<?PHP echo $link3?>')"><?PHP echo $rotulo3?></a></span>
												</li>
											<?PHP } ?>
										</ul>
									</li>

								<?PHP } ?>

							</ul>
						</li>

					<?PHP } ?>

				</ul>

			<?PHP }else { ?>

				<?PHP $mesg['erro'][] = 'Nenhum menu selecionado'; ?>

			<?PHP } ?>

		</td>
	</tr>
</table>
