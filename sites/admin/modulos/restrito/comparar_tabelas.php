<? 	//echo "<pre>"; print_r($_POST); echo "</pre>"; exit;

	if (!$_SESSION['logado']) {
		echo "<meta http-equiv=\"refresh\" content=\"0;URL=http://$_SERVER[HTTP_HOST]/smvs/sistema/bloquear_link_direto.php\">";
		exit;
	}

	$versao = '1.3';

	$link = mysql_connect('fns1', 'marceloawk', 'oraculo');

	$sql = "select * from CADASTROS.TP_SERVIDOR";
	$res = mysql_query($sql);
	$servidores = null;
	$i = 0;
	while ($r = mysql_fetch_assoc($res)) {

		$servidores[$i]['id_srv'] = substr($r['ID_SERVIDOR'],0,4);
		$servidores[$i]['sigla'] = substr($r['NM_HOST'],0,4);
		$servidores[$i]['nome'] = trim($r['NM_SERVIDOR']);

		$i++;

		// Gerador das máquinas reservas

		$servidores[$i]['id_srv'] = '';
		$servidores[$i]['sigla'] = str_replace('1','2',substr($r['NM_HOST'],0,4));
		$servidores[$i]['nome'] = trim($r['NM_SERVIDOR']). ' bkp';

		$i++;

	}

	// Lista de bancos válidos a serem analizados

	$bancos_validos = array (
		'ACESSOS', 
		'CADASTROS', 
		'COBRANCA', 
		'EDIFICACOES', 
		'FUNCIONAMENTO', 
		'HABITESE', 
		//'IMPORTACAO', 
		'MANUTENCAO', 
		'PROJETO', 
		'SOLICITACAO'
	);

	if ($_POST['btn_comparar']) {
	
		$srv_origem = $_POST['sel_srv_origem'];
		$srv_destino = $_POST['sel_srv_destino'];
	
		// Conexão com o banco do servidor e consulta dos bancos e tabelas
	
		$tabelas_validas = array (
			'CARACTERISTICA_EDIFICACAO', 
			'EDIFICACAO'
		);
	
		// Executar comando no servidor destino no banco

		if ($_POST['btn_executar'] and $_POST['sel_srv_destino'] and $_POST['txa_comandos']) {

			echo "Conectando com <b><i>$srv_destino</i></b> ... "; flush();
			$link = mysql_connect($srv_destino, 'marceloawk', 'oraculo');
			echo "ok! <br>";
			$aux = $_POST['txa_comandos'];
			$aux = explode("\r",trim($aux));
			$comandos = null;
			foreach ($aux as $i => $v) {
				$sql = trim($v);
				if (strlen($v) > 10) {
					echo "Executando <i>$sql</i> aguarde... "; flush();
					$res = mysql_query($sql);
					echo " <b>ok</b><br>"; flush();
				}
			}

		}


		// Bancos
	
		$srvs = array ($_POST['sel_srv_origem'],$_POST['sel_srv_destino']);
	
		foreach ($srvs as $v) {
	
			// Conexao com o banco
	
			$link = mysql_connect($v, 'marceloawk', 'oraculo');
	
			$res = mysql_list_dbs();
			while ($r = mysql_fetch_array($res)) {
				$res2 = mysql_list_tables($r[0]);
				while ($r2 = mysql_fetch_array($res2)) {
					$res3 = mysql_query("show columns from $r[0].$r2[0]");
					while ($r3 = mysql_fetch_array($res3)) {
						if (in_array($r[0],$bancos_validos))
							//if (in_array($r2[0],$tabelas_validas)) 
								//if (in_array($r2[0],$campos_validos)) 
									$dados['banco'][$v][$r[0]][$r2[0]][] = $r3[0];
					}
				}
			}
	
		}
	
		$cont = 0;
		foreach ($dados['banco'][$_POST['sel_srv_origem']] as $banco => $tabelas) {
			foreach ($tabelas as $tabela => $campos) {
				foreach ($campos as $i => $campo_origem) {
					$campo_destino = $dados['banco'][$_POST['sel_srv_destino']][$banco][$tabela][$i];
					if ($campo_origem != $campo_destino) {
						$diferencas[$cont]['banco'] = $banco;
						$diferencas[$cont]['tabela'] = $tabela;
						$diferencas[$cont]['pos'] = $i;
						$diferencas[$cont]['campo_origem'] = $campo_origem;
						$diferencas[$cont]['campo_destino'] = $campo_destino;
						$cont++;
					}
				}
			}
		}
	
		// Mensagens de erro
		
		if (!trim($srv_origem)) $mesg['erro'][] = 'Favor entrar com o servidor de origem';
		if (!trim($srv_destino)) $mesg['erro'][] = 'Favor entrar com o servidor de destino';
	
		$cor1 = '#E0EEEE';
		$cor2 = '';
	
	}

?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="./../mvs_ebombeiro/css/ebombeiro.css">
<title>=[M.v.$]= comparador</title>
<script>

	function visualizar_bancos (f) {
		f.hdn_visualizar.value = "visualizar";
		f.submit();
	}

	function testar_campos(f) {
		var mesg = "";
		if (f.sel_srv_origem.value == "" || f.sel_srv_destino.value == "") {
			mesg = "Campo obrigatório:\n";
			if (f.sel_srv_origem.value == "") mesg += " * Servidor origem\n";
			if (f.sel_srv_destino.value == "") mesg += " * Servidor destino\n";
			alert(mesg);
			return false;
		} else {
			return true;
		}
	}

	function txa_onfocus(txa) {
		if (txa.value == "<?=$txa_exemplo?>") {
			txa.value = "";
		}
	}
	function txa_onblur(txa) {
		if (txa.value == "") {
			txa.value = "<?=$txa_exemplo?>";
		}
	}

</script>
<head>
<body>

<table align="center" width="100%" boerder="1">
	<tr>
		<td height="400" valign="top">
			<table align="center" width="100%" border="0">

<? if ($_POST and $mesg['erro']) { ?>

		<tr>
			<td>
				<h3><center>Erros Encontrados</center></h3>
				<? foreach ($mesg['erro'] as $aux) echo "$aux<br>"; ?>
				<a onclick="history.back();" style="cursor:pointer">voltar</a>
			</td>
		</tr>

<? } elseif ($_POST['sel_srv_origem'] and $_POST['sel_srv_destino']) { ?>

		<!-- Comparação das Tabelas -->

		<form name="form2" method="post">

		<input type="hidden" name="hdn_opcao" value="comparar_tabelas">

		<input type="hidden" name="hdn_visualizar">
		<? foreach ($_POST as $i => $v) { ?><input type="hidden" name="<?=$i?>" value="<?=$v?>">

		<? } ?>

		<tr>
			<td height="400" valign="top">
				<table align="center" cellspacing="0" cellpadding="2" width="90%" border="0">
					<? if ($diferencas) { ?>
						<tr>
							<th align="left">Banco</th>
							<th align="left">Tabela</th>
							<th>Pos</th>
							<th align="left"><?=$srv_origem?></th>
							<th align="left"><?=$srv_destino?></th>
						</tr>
						<?
							$valor_anterior['banco'] = null;
							$valor_anterior['tabela'] = null;
						?>
						<? foreach ($diferencas as $v) { ?>
							<? if ($valor_anterior['banco'] != $v['banco'])  { echo "<tr><td colspan='5'><hr size='1'></tr>"; } ?>
							<? 
								//if (!$valor_anterior or $valor_anterior['banco'] != $v['banco']) 
								if ($cor == $cor1) $cor = $cor2; else $cor = $cor1; 
							?>
							<tr bgcolor="<?=$cor?>">
								<td><? if (!$valor_anterior or $valor_anterior['banco'] != $v['banco']) echo $v['banco'];?>&nbsp;</td>
								<td><? if (!$valor_anterior or $valor_anterior['tabela'] != $v['tabela']) echo $v['tabela'];?>&nbsp;</td>
								<td align="center"><? if ($v['pos'] < 10) echo '0'; echo $v['pos']; ?></td>
								<td><?=$v['campo_origem']?>&nbsp;</td>
								<td><?=$v['campo_destino']?>&nbsp;</td>
							</tr>
							<? 
								$valor_anterior['banco'] = $v['banco'];
								$valor_anterior['tabela'] = $v['tabela'];
							?>

						<? } ?>

						<!-- Formulário para executar comando no banco destino -->

						<tr><th colspan="5"><hr width="90%" size="1"></td></tr>
						<tr><th colspan="5" align="center">Executar comando no banco do servidor <b><i><?=$srv_destino;?></i></b> </td></tr>
						<tr><td  colspan="5" align="center">Comandos SQL&nbsp;</td></tr>
						<tr><td colspan="5" align="center"><textarea name="txa_comandos" cols="100" rows="5"></textarea></td></tr>
						<tr><td colspan="5" align="center"><input type="submit" name="btn_executar" value="Executar Comandos" class="botao"></td></tr>

					<? } else { echo "<tr><th>Verificação concluída. Nenhum erro encontrado.</th><tr>"; } ?>

					<? if ($_POST['hdn_visualizar']) { ?>

					<!-- Visualizar Bancos -->

					<tr><th colspan="5"><hr width="90%" size="1"></td></tr>
					<tr>
						<td colspan="5">
							<table align="center" border="0">
								<tr>
									<td valign="top"><pre><? print_r($dados['banco'][$srv_origem]); ?></pre></td>
									<td valign="top"><pre><? print_r($dados['banco'][$srv_destino]); ?></pre></td>
								</tr>
							</table>
						</td>
					</tr>

					<? } ?>

				</table>

				<tr>
					<td align="right"><font size="2">
						<a onclick="visualizar_bancos(form2);" style="cursor:pointer">visualizar bancos</a> |
						<a href="javascript:history.back();">voltar</a>
					</font></td>
				</tr>

			</td>
		</tr>

		</form>

<? } else { ?>

		<!-- Formulário inicial para comparar as tabelas dos servidores -->

		<form name="form1" method="post">

		<input type="hidden" name="hdn_opcao" value="comparar_tabelas">

		<tr><td colspan="2">&nbsp;</td></tr>
		<tr>
			<td valign="top">

				<table align="center" sellspacing="5" sellpadding="2" width="450" border="0">

					<tr>
						<th colspan="2">Comparar as tabelas dos servidores abaixo<br></th>
					<tr>
						<td colspan="2" align="center">Os seguintes bancos serão comparados:<br><? foreach ($bancos_validos as $v) echo "$v<br> "; ?></td>
					</tr>
					</tr>
					<tr><td colspan="2">&nbsp;</td></tr>
			
					<!-- Servidores -->
			
					<tr>
						<td align="right">Servidores&nbsp;</td>
						<td>
							<select name="sel_srv_origem">
								<option value=""> Servidor de origem </option>
								<? foreach ($servidores as $arr) { ?>
									<option><?=$arr['sigla']?></option>
								<? } ?>
							</select>
							<select name="sel_srv_destino">
								<option value=""> Servidor de destino </option>
								<? foreach ($servidores as $arr) { ?>
									<option><?=$arr['sigla']?></option>
								<? } ?>
							</select>
						</td>
					</tr>

					<tr><td colspan="2">&nbsp;</td></tr>
			
					<tr>
						<td>&nbsp;</td>
						<td><input type="submit" name="btn_comparar" value="Comparar tabelas" onclick="return testar_campos(this.form);" class="botao"></td>
					</tr>

				</table>
			</td>
		</tr>



		</form>

<? } ?>

		</table>
	<tr><td align="right"><font size="1">versão <?=$versao?></font></td></tr>
</table>
<!--
ALTER TABLE COBRANCA.COBRANCA_BOLETO ADD ST_GERADO SET( '0', '1' ) NOT NULL AFTER MOTIVO ;
ALTER TABLE COBRANCA.COBRANCA_BOLETO ADD SICOOB INT NULL AFTER ID_COBRANCA_BOLETO ;
ALTER TABLE CADASTROS.CIDADE ADD VIABILIDADE_AUTOMATICA ENUM( 'S', 'N' ) NOT NULL DEFAULT 'S' AFTER id_banco ;
ALTER TABLE FUNCIONAMENTO.VIST_ESTAB ADD ID_EDIFICACAO_ANTIGO INT NULL AFTER ID_CIDADE_ESTAB ;
ALTER TABLE HABITESE.VISTORIA_HABITESE ADD ID_EDIFICACAO_ANTIGO INT NOT NULL AFTER ID_USUARIO ;
ALTER TABLE MANUTENCAO.VISTORIA_MANUTENCAO ADD ID_EDIFICACAO_ANTIGO INT NOT NULL AFTER ID_USUARIO ;
ALTER TABLE PROJETO.ANALISE ADD ID_EDIFICACAO_ANTIGO INT NOT NULL AFTER DT_ANALISE ;
ALTER TABLE SOLICITACAO.SOLICITACAO ADD ID_LOGRADOURO_ANTIGO INT NOT NULL AFTER ID_USUARIO ;
ALTER TABLE SOLICITACAO.SOLIC_FUNCIONAMENTO ADD ID_LOGRADOURO_ANTIGO INT NOT NULL AFTER PROTOCOLO_REGIN ;
ALTER TABLE SOLICITACAO.SOLIC_HABITESE ADD ID_LOGRADOURO_ANTIGO INT NOT NULL AFTER ID_USUARIO ;
ALTER TABLE SOLICITACAO.SOLIC_MANUTENCAO ADD ID_LOGRADOURO_ANTIGO INT NOT NULL AFTER ID_SITUACAO ;
ALTER TABLE EDIFICACOES.EDIFICACAO ADD ID_LOGRADOURO_ANTIGO INT NOT NULL AFTER ID_CIDADE_CEP ;
ALTER TABLE EDIFICACOES.ESTABELECIMENTO ADD ID_EDIFICACAO_ANTIGO INT NOT NULL AFTER DT_CADASTRO ;
ALTER TABLE EDIFICACOES.CARACTERISTICA_EDIFICACAO ADD NR_DETEC_FUMACA INT NULL AFTER DE_PLANO_ACAO ;
ALTER TABLE EDIFICACOES.CARACTERISTICA_EDIFICACAO ADD NR_DETEC_VEL INT NULL AFTER NR_DETEC_FUMACA ;
ALTER TABLE EDIFICACOES.CARACTERISTICA_EDIFICACAO ADD NR_DETEC_QMC INT NULL AFTER NR_DETEC_VEL ;
ALTER TABLE EDIFICACOES.CARACTERISTICA_EDIFICACAO ADD NR_PONTOS INT NULL AFTER NR_DETEC_QMC ;
ALTER TABLE EDIFICACOES.CARACTERISTICA_EDIFICACAO ADD NR_PQS INT NULL AFTER NR_PONTOS ;
ALTER TABLE EDIFICACOES.CARACTERISTICA_EDIFICACAO ADD NR_AGUA INT NULL AFTER NR_PQS ;
ALTER TABLE EDIFICACOES.CARACTERISTICA_EDIFICACAO ADD NR_ESPUMA INT NULL AFTER NR_AGUA ;
ALTER TABLE EDIFICACOES.CARACTERISTICA_EDIFICACAO ADD NR_CO2 INT NULL AFTER NR_ESPUMA ;
ALTER TABLE EDIFICACOES.CARACTERISTICA_EDIFICACAO ADD QTD_GLP INT NULL AFTER NR_CO2 ;
ALTER TABLE EDIFICACOES.CARACTERISTICA_EDIFICACAO ADD QTD_GN INT NULL AFTER QTD_GLP ;

CREATE TABLE CADASTROS.LOGRADOURO_ANTIGO (
ID_CIDADE INT( 11 ) NOT NULL ,
ID_LOGRADOURO INT( 11 ) NOT NULL ,
NM_LOGRADOURO VARCHAR( 100 ) NOT NULL ,
ID_BAIRROS INT( 11 ) NULL ,
ID_CIDADE_BAIRROS INT( 11 ) NULL ,
ID_TP_LOGRADOURO INT( 11 ) NOT NULL ,
ID_LOGRA INT( 11 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
ID_LOGRADOURO_ANTIGO INT( 11 ) NULL
);

Versões:
0.1		Protótipo
1.0		Formulário de consulta
		Relatório comparativo
1.1		Comandos no mysql destino
1.2		Visualização total dos bancos
1.3		Complemento de alterações padrões
	  

-->
</body>
</html>