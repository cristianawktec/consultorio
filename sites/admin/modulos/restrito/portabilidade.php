<?	//echo "<pre>"; print_r($_POST); echo "</pre>";

	if (!$_SESSION['logado']) {
		echo "<meta http-equiv=\"refresh\" content=\"0;URL=http://$_SERVER[HTTP_HOST]/smvs/sistema/bloquear_link_direto.php\">";
		exit;
	}

	$versao = '2.3';
	$versoes[] = "<!--";
	$versoes[] = "2.0 ";
	$versoes[] = "Formulário de pesquisa";
	$versoes[] = "Criação do arquivo de dump";
	$versoes[] = "2.1";
	$versoes[] = "Inserção de engenheiros";
	$versoes[] = "Controle do id do servidor remotamente";
	$versoes[] = "2.2";
	$versoes[] = "Exclusão de todos os relacionamentos user x cidades";
	$versoes[] = "2.3";
	$versoes[] = "Nome de arquivo reduzido";
	$versoes[] = "-->";

	// Servidores

	$sql = "select * from CADASTROS.TP_SERVIDOR";
	$res = mysql_query($sql,$link_fns1);
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

if ($_POST['sel_srv_origem'] and $_POST['sel_srv_destino']) {

	// Conexão com o banco para excluir o relacionamento usuário X cidades
	
	$link = mysql_connect($_POST['sel_srv_origem'], 'marceloawk', 'oraculo');


	/******************************/
	/*** Início da configuração ***/
	/******************************/
	
	$dir_scripts = '/root/';
	
	$srv_origem = $_POST['sel_srv_origem'];
	$srv_destino = $_POST['sel_srv_destino'];

	// Data atual ao contrário
	
	$data = date('Ymd');

	// Hora(24) minuto segundo

	$hms = date("His");

	// Padrão do nome do arquivo para relátório
	
	$padrao = $srv_origem."_".$srv_destino."_".$data."_".$hms;

	$arquivo['gerador'] = $dir_scripts.$padrao."_gerador.sh";
	$arquivo['relatorio'] = $dir_scripts.$padrao."_relatorio.html";
	$arquivo['dump_completo_destino'] = $dir_scripts.$srv_destino."_".$data."_".$hms."_dump_completo.sql";
	$arquivo['dump_cidades'] = $dir_scripts.$padrao."_dump_cidades.sql";
	$arquivo['exclusao'] = $dir_scripts.$padrao."_exclusao.sql";
	$arquivo['engenheiros'] = $dir_scripts.$padrao."_engenheiros.sql";


	/******************************/
	/******************************/
	/******************************/

	
	$aux = $_POST['txa_cidades'];
	$aux = explode("\r",trim($aux));
	$cidades = null;
	foreach ($aux as $i => $v) {
		$v = trim($v);
		$id_cidade = trim(substr($v,0,4));
		$nm_cidade = trim(substr($v,4));
		if (is_numeric($id_cidade) and $nm_cidade) {
			$cidades["$id_cidade"] = $nm_cidade;
		}
	}
	
	// Padrão dos arquivos e cidades pra SQL
	
	if ($cidades) foreach($cidades as $i => $v) {
		$cidades_underscore .= "_$i";
		$cidades_virgula .= ",$i";
	} $cidades_virgula = substr($cidades_virgula,1);


	// Criar a exclusão do relacionamento cidades X usuario

	$sql = "select ACESSOS.CIDADES_USR.ID_USUARIO, ACESSOS.CIDADES_USR.ID_CIDADE, ID_PERFIL from ACESSOS.CIDADES_USR ".
		"left join ACESSOS.USUARIO USING (ID_USUARIO) ".
		"where ACESSOS.CIDADES_USR.ID_CIDADE in ($cidades_virgula) and ID_USUARIO != 'solicitacao' ".
		"order by ID_USUARIO";
	$res = mysql_query($sql, $link_origem);
	$excluir_usuarios = null;
	$inserir_usuarios = null;
	$adms = null;
	while ($r = mysql_fetch_assoc($res)) {
		if ($r['ID_PERFIL'] == 1) {
			$adms[$r['ID_CIDADE']][] = $r['ID_USUARIO'];
		} else {
			$excluir_usuarios .= "delete from ACESSOS.CIDADES_USR where ACESSOS.CIDADES_USR.ID_USUARIO = '$r[ID_USUARIO]' ".
				"and ACESSOS.CIDADES_USR.ID_CIDADE = $r[ID_CIDADE];\n";
			$inserir_usuarios .= "('$r[ID_USUARIO]',$r[ID_CIDADE]), ";
		}
	}

	// Mostrar os administradores

	$administradores = "<b>Administradores do sistema. Não serão excluídos</b><br>";
	if ($adms) foreach ($adms as $ID_CIDADE => $arr) {
		$administradores .= "<b>Cidade: $ID_CIDADE</b><br>";
		foreach ($arr as $ID_USUARIO) {
			$administradores .= "$ID_USUARIO ";
		}
		$administradores .= "<br>";
	}
	$administradores .= "<br><b>Obs.:</b> Usuário <b><i>solicitacao</i></b> foi retirado da lista de exclusão";

	// Inserção do relacionamento usuario X cidades

	$inserir_usuarios = substr($inserir_usuarios,0,-2).';';
	$inserir_usuarios = "SET FOREIGN_KEY_CHECKS=0;<br>".
		"insert into ACESSOS.CIDADES_USR (ACESSOS.CIDADES_USR.ID_USUARIO, ACESSOS.CIDADES_USR.ID_CIDADE) <br>values $inserir_usuarios<br>".
		"SET FOREIGN_KEY_CHECKS=1;";

	// Inserção dos Engenheiros

	$sql = "select distinct " .
			"EDIFICACOES.ENGENHEIRO.ID_CREA , ".
			"EDIFICACOES.ENGENHEIRO.NM_ENGENHEIRO, ".
			"EDIFICACOES.ENGENHEIRO.NM_ENGENHEIRO_FONETICA ".
		"from EDIFICACOES.ENGENHEIRO ".
			"left join EDIFICACOES.ENG_EDIFICACAO using (ID_CREA) ".
		"where EDIFICACOES.ENG_EDIFICACAO.ID_CIDADE in ($cidades_virgula)".
	";";

	$txa_rows_eng = $novos_engenheiros = $aux = $aux2 = null;

	$res = mysql_query($sql, $link_destino);
	while ($r = mysql_fetch_assoc($res)) $aux[$r['ID_CREA']] = $r['ID_CREA'];
	$res = mysql_query($sql, $link_origem);
	while ($r = mysql_fetch_assoc($res))  {
		if (!in_array($r['ID_CREA'],$aux)) {
			$aux2[] = $r;
			$txa_rows_eng++;
		}
	}

	if ($aux2) foreach ($aux2 as $v) {
		$novos_engenheiros .= "insert into EDIFICACOES.ENGENHEIRO (ID_CREA, NM_ENGENHEIRO, NM_ENGENHEIRO_FONETICA) ".
			 "value ('$v[ID_CREA]','$v[NM_ENGENHEIRO]','$v[NM_ENGENHEIRO_FONETICA]');\n";
	} else {
		$novos_engenheiros = 'Nenhum novo engenheiro a ser cadastrado';
	}

	// Geração automática de exclusão de registros antigos do banco de destino
	
	$excluir_dados = "SET FOREIGN_KEY_CHECKS=0;\n".
		"delete from ACESSOS.CIDADES_GBM where ID_CIDADE in ($cidades_virgula);\n".
		//"delete from ACESSOS.CIDADES_USR where ID_CIDADE in ($cidades_virgula);\n".
		//"delete from ACESSOS.USUARIO where ID_CIDADE in ($cidades_virgula);\n".
		"delete from CADASTROS.BAIRROS where ID_CIDADE in ($cidades_virgula);\n".
		"delete from CADASTROS.CEP where ID_CIDADE in ($cidades_virgula);\n".
		"delete from CADASTROS.CIDADE where ID_CIDADE in ($cidades_virgula);\n".
		"delete from CADASTROS.CIDADE_SERVIDOR where ID_CIDADE in ($cidades_virgula);\n".
		"delete from CADASTROS.GRUPAMENTO where ID_CIDADE in ($cidades_virgula);\n".
		"delete from CADASTROS.LOGRADOURO where ID_CIDADE in ($cidades_virgula);\n".
		"delete from CADASTROS.LOGRADOURO_ANTIGO where ID_CIDADE in ($cidades_virgula);\n".
		"delete from CADASTROS.PESSOA where ID_CIDADE in ($cidades_virgula);\n".
		"delete from COBRANCA.ARQUIVO_BESC where ID_CIDADE in ($cidades_virgula);\n".
		"delete from COBRANCA.COBRANCA_BOLETO where ID_CIDADE in ($cidades_virgula);\n".
		"delete from COBRANCA.COTACAO where ID_CIDADE in ($cidades_virgula);\n".
		"delete from COBRANCA.FORMULA where ID_CIDADE in ($cidades_virgula);\n".
		"delete from COBRANCA.SERVICO where ID_CIDADE in ($cidades_virgula);\n".
		"delete from COBRANCA.TP_SERVICO where ID_CIDADE in ($cidades_virgula);\n".
		"delete from EDIFICACOES.CARACTERISTICA_EDIFICACAO where ID_CIDADE in ($cidades_virgula);\n".
		"delete from EDIFICACOES.EDIFICACAO where ID_CIDADE in ($cidades_virgula);\n".
		"delete from EDIFICACOES.ENG_EDIFICACAO where ID_CIDADE in ($cidades_virgula);\n".
		"delete from EDIFICACOES.ESTABELECIMENTO where ID_CIDADE in ($cidades_virgula);\n".
		"delete from FUNCIONAMENTO.ANALISE_FUNC where ID_CIDADE in ($cidades_virgula);\n".
		"delete from FUNCIONAMENTO.PROT_ANALISE_FUNC where ID_CIDADE in ($cidades_virgula);\n".
		"delete from FUNCIONAMENTO.PROT_FUNCIONAMENTO where ID_CIDADE in ($cidades_virgula);\n".
		"delete from FUNCIONAMENTO.VISTORIA_FUNCIONAMENTO where ID_CIDADE in ($cidades_virgula);\n".
		"delete from FUNCIONAMENTO.VIST_ANALISE_ESTAB where ID_CIDADE_ESTAB in ($cidades_virgula);\n".
		"delete from FUNCIONAMENTO.VIST_ESTAB where ID_CIDADE_ESTAB in ($cidades_virgula);\n".
		"delete from HABITESE.PROT_HABITESE where ID_CIDADE in ($cidades_virgula);\n".
		"delete from HABITESE.VISTORIA_HABITESE where ID_CIDADE in ($cidades_virgula);\n".
		"delete from MANUTENCAO.PROT_MANUTENCAO where ID_CIDADE in ($cidades_virgula);\n".
		"delete from MANUTENCAO.VISTORIA_MANUTENCAO where ID_CIDADE in ($cidades_virgula);\n".
		"delete from PROJETO.ANALISE where ID_CIDADE in ($cidades_virgula);\n".
		"delete from PROJETO.PROTOCOLOS where ID_CIDADE in ($cidades_virgula);\n".
		"delete from SOLICITACAO.DESC_ANALISE_FUNC where ID_CIDADE in ($cidades_virgula);\n".
		"delete from SOLICITACAO.DESC_FUNCIONAMENTO where ID_CIDADE in ($cidades_virgula);\n".
		"delete from SOLICITACAO.DESC_VISTORIAS where ID_CIDADE in ($cidades_virgula);\n".
		"delete from SOLICITACAO.SOLICITACAO where ID_CIDADE in ($cidades_virgula);\n".
		"delete from SOLICITACAO.SOLIC_FUNCIONAMENTO where ID_CIDADE in ($cidades_virgula);\n".
		"delete from SOLICITACAO.SOLIC_HABITESE where ID_CIDADE in ($cidades_virgula);\n".
		"delete from SOLICITACAO.SOLIC_MANUTENCAO where ID_CIDADE in ($cidades_virgula);\n".
		"SET FOREIGN_KEY_CHECKS=1;";
	
	// Id do servidor destino

	$id_srv_destino = null;
	$sql = "select ID_SERVIDOR from CADASTROS.TP_SERVIDOR where NM_HOST like '$srv_destino%'";
	$res = mysql_query($sql, $link_fns1);
	if ($r = mysql_fetch_assoc($res)) $id_srv_destino = $r['ID_SERVIDOR'];

	// Gerador do mysqldump e do arquivo dump_sql

	$where = $where_b = null;
	
	foreach ($cidades as $id_cidade => $nm_cidade) {
		$where .= "ID_CIDADE = $id_cidade or ";
		$where_b .= "ID_CIDADE_ESTAB = $id_cidade or ";
	}
	$where = substr($where,0,-4);
	$where_b = substr($where_b,0,-4);
	
	$dump_sql = $arquivo['dump_cidades'];
	
	$acesso = 'mysqldump -u marceloawk -poraculo -t -n -f';
	$dump_sh = "echo '' > $dump_sql
echo 'use ACESSOS' >> $dump_sql
$acesso --databases ACESSOS --tables CIDADES_GBM CIDADES_USR USUARIO  --where='$where' >> $dump_sql
echo 'use CADASTROS' >> $dump_sql
$acesso --databases CADASTROS --tables BAIRROS CEP CIDADE CIDADE_SERVIDOR GRUPAMENTO LOGRADOURO LOGRADOURO_ANTIGO PESSOA  --where='$where' >> $dump_sql
echo 'use COBRANCA' >> $dump_sql
$acesso --databases COBRANCA --tables ARQUIVO_BESC COBRANCA_BOLETO COTACAO FORMULA SERVICO TP_SERVICO  --where='$where' >> $dump_sql
echo 'use EDIFICACOES' >> $dump_sql
$acesso --databases EDIFICACOES --tables CARACTERISTICA_EDIFICACAO EDIFICACAO ENG_EDIFICACAO ESTABELECIMENTO  --where='$where' >> $dump_sql
echo 'use FUNCIONAMENTO' >> $dump_sql
$acesso --databases FUNCIONAMENTO --tables ANALISE_FUNC PROT_ANALISE_FUNC PROT_FUNCIONAMENTO VISTORIA_FUNCIONAMENTO  --where='$where' >> $dump_sql
$acesso --databases FUNCIONAMENTO --tables VIST_ANALISE_ESTAB VIST_ESTAB  --where='$where_b' >> $dump_sql
echo 'use HABITESE' >> $dump_sql
$acesso --databases HABITESE --tables PROT_HABITESE VISTORIA_HABITESE  --where='$where' >> $dump_sql
echo 'use MANUTENCAO' >> $dump_sql
$acesso --databases MANUTENCAO --tables PROT_MANUTENCAO VISTORIA_MANUTENCAO  --where='$where' >> $dump_sql
echo 'use PROJETO' >> $dump_sql
$acesso --databases PROJETO --tables ANALISE PROTOCOLOS  --where='$where' >> $dump_sql
echo 'use SOLICITACAO' >> $dump_sql
$acesso --databases SOLICITACAO --tables DESC_ANALISE_FUNC DESC_FUNCIONAMENTO DESC_VISTORIAS SOLICITACAO SOLIC_FUNCIONAMENTO SOLIC_HABITESE SOLIC_MANUTENCAO  --where='$where' >> $dump_sql";
	

// * * * GERADOR DO SCRIPT * * * //


$txa_cols = '150';
$txa_rows = '15';

$comandos["$srv_origem - Criar script da geração do dump"] = 
"echo '' > $arquivo[gerador]<br>vi $arquivo[gerador]<br><br>Copiar script abaixo no arquivo $arquivo[gerador]<br><textarea cols=\"$txa_cols\" rows=\"$txa_rows\">$dump_sh</textarea>";

$comandos["$srv_origem - Executar o script de geração do dump"] = 
"Tornar o arquivo executábel e executá-lo<br>
chmod +x $arquivo[gerador]
. $arquivo[gerador]";

$comandos["$srv_origem - Excluir relacionamentos usuários X cidades"] = 
"Executar no <b>$srv_origem</b> e no <b>$srv_destino</b>
<i>Melhor seria executar em todos os servidores ;-)</i><br><br>$excluir_usuarios<br>$administradores";

$comandos["$srv_destino - Buscar dump de $srv_destino para $srv_origem"] = 
"<b>Executar no shell do servidor $srv_destino</b><br>
scp root@".$srv_origem.":".$arquivo[dump_cidades]." $dir_scripts";

$comandos["$srv_destino - Desabilitar Sigat"] = 
"<b>Executar no shell do servidor $srv_destino</b><br>
mv /var/www/sigat /var/www/sigat_port";

$comandos["$srv_destino - Dump completo"] = 
"<b>Executar no shell do servidor $srv_destino</b><br>
mysqldump -u marceloawk -p --all-databases > $arquivo[dump_completo_destino]";

$comandos["$srv_destino - Criar arquivo de exclusão"] = 
"<b>Executar no shell do servidor $srv_destino</b><br>
echo \"".$excluir_dados."\" > $arquivo[exclusao]";

$comandos["$srv_destino - Excluir dados antigos"] = 
"<b>Executar no banco do servidor $srv_destino</b><br>
mysql> source $arquivo[exclusao]<br><br>Caso apareça a mensagem: <i>You are using safe update mode and you tried to update a table without a WHERE that uses a KEY column</i><br>Comentar a linha  safe-updates<br><br>vi /etc/mysql/my.cnf<br><br>[mysql]<br>#safe-updates";

$comandos["$srv_destino - Inserir dados"] = 
"<b>Executar no banco do servidor $srv_destino</b><br>
mysql> source $arquivo[dump_cidades]";

$comandos["$srv_destino - Inserir engenheiros"] = 
"Criar arquivo abaixo, inserir o código e executar dentro do banco <b>$srv_destino</b><br>
echo '' > $arquivo[engenheiros]
vi $arquivo[engenheiros]<br>
mysql> source $arquivo[engenheiros]<br>
<textarea cols=\"$txa_cols\" rows=\"".$txa_rows_eng."\">$novos_engenheiros</textarea>";

$comandos["$srv_destino - Inserir relacionamentos usuários X cidades"] = 
"<b>Executar no banco do servidor $srv_destino</b><br>
$inserir_usuarios";

$comandos["$srv_destino - Habilitar Sigat"] = 
"<b>Executar no shell do servidor $srv_destino</b><br>
mv /var/www/sigat_port /var/www/sigat";

$comandos["fns1 - Comando de alteração"] = 
"<b>Executar no banco do servidor FNS1</b><br>
mysql> UPDATE CADASTROS.CIDADE_SERVIDOR SET ID_SERVIDOR = '$id_srv_destino' WHERE CIDADE_SERVIDOR.ID_CIDADE in ($cidades_virgula);";
	
	// Cores alternadas
	
	$cor1 = '#E0EEEE';
	$cor2 = '';
	
	// Mensagens de erro
	
	if (!trim($srv_origem)) $mesg['erro'][] = 'Favor entrar com o servidor de origem';
	if (!trim($srv_destino)) $mesg['erro'][] = 'Favor entrar com o servidor de destino';
	if (!trim($cidades)) $mesg['erro'][] = 'Favor adicionar as cidades no formato <i>código<espaço>nome da cidade</i>';
	if (!trim($id_srv_destino)) $mesg['erro'][] = 'Servidor de origem não cadastrado no FNS1';

}

?>
<script>

	<? $txa_exemplo = "0000 FLORIANOPOLIS (entre com as cidadeas de acordo como o modelo)"; ?>

	function testar_campos(f) {
		var mesg = "";
		if (f.sel_srv_origem.value == "" || f.sel_srv_destino.value == "" || f.txa_cidades.value == "<?=$txa_exemplo?>") {
			mesg = "Campo obrigatório:\n";
			if (f.sel_srv_origem.value == "") mesg += " * Servidor origem\n";
			if (f.sel_srv_destino.value == "") mesg += " * Servidor destino\n";
			if (f.txa_cidades.value == "<?=$txa_exemplo?>") mesg += " * Cidades\n";
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

<table align="center" width="90%" cellspacing="0" cellpadding="0" border="0">

	<tr>
		<tr>
			<th>
				Procedimentos para a migração dos dados de <i><?=$srv_origem?></i> para <i><?=$srv_destino?></i><br>
			</th>
		</tr>
		<tr>
			<td align="center">
				<font size="2"><br><?=$arquivo_relatorio?></font>
			</td>
		</tr>
	</tr>


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

		<tr>
			<td>
				<h5><font color='#990000'><? foreach ($cidades as $i => $v) echo "<br>$i - $v"; ?></font></h5>
			</td>
		</tr>
		<? $aux2 = null; foreach ($comandos as $i => $v) { $aux2++; if ($bgcolor == 'bgcolor="'.$cor1.'"') $bgcolor = 'bgcolor="'.$cor2.'"'; else $bgcolor = 'bgcolor="'.$cor1.'"'; ?>
			<tr>
				<td <?=$bgcolor?> >
					<b><br>&nbsp;&nbsp;<?=$aux2?>&nbsp;:&nbsp;<?=$i?></b>
					<pre><? print_r($v); ?></pre>
				</td>
			</tr>
		<? } ?>

<? } else { ?>

		<form name="form1" method="post">

		<input type="hidden" name="hdn_opcao" value="portabilidade">

		<tr><td colspan="2">&nbsp;</td></tr>
		<tr>
			<th colspan="2">Dados para a geração do script</th>
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

		<!-- Cidades -->

		<tr>
			<td align="right" valign="top">Cidades&nbsp;</td>
			<td>
				<textarea name="txa_cidades" cols="70" rows="10" onfocus="txa_onfocus(this);" onblur="txa_onblur(this);"><?=$txa_exemplo?></textarea>
			</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>
				<a onclick="abrir_janela('servidores_cidades');">Consultar Cidades</a>
			</td>
		</tr>

		<tr><td colspan="2">&nbsp;</td></tr>

		<tr>
			<td>&nbsp;</td>
			<td><input type="submit" value="Gerar Script" onclick="return testar_campos(this.form);" class="botao"></td>
		</tr>


		</form>

<? } ?>

		</table>

<!-- Versao -->

		<tr>
			<td align="right"><font size="1">portabilidade <?=$versao?></font></td>
		</tr>

</table>
