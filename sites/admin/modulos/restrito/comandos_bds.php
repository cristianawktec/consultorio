<?  //echo "<pre>"; print_r($_POST); echo "</pre>";

	if (!$_SESSION['logado']) {
		echo "<meta http-equiv=\"refresh\" content=\"0;URL=http://$_SERVER[HTTP_HOST]/smvs/sistema/bloquear_link_direto.php\">";
		exit;
	}

	$versao = '3.0';

	if (!$_SESSION['logado']) {

		echo '<center>'; 
		echo '<a style="cursor:pointer" onclick="history.back();">voltar</a><br>';
		die ("Acesso Negado");
		echo '</center>'; 

	}

	require 'lib/loader.php';

	$conn = new BD (BD_HOST, BD_USER, BD_PASS, BD_NOME_ACESSOS);
	$conn_fns1 = new BD ('fns1', BD_USER, BD_PASS, BD_NOME_ACESSOS);

	$sql = "SELECT ID_CIDADE, NM_CIDADE FROM ".TBL_CIDADE." WHERE ID_UF IN ('SC') AND ".TBL_CIDADE.".ID_CIDADE IN (SELECT ID_CIDADE FROM ".TBL_CIDADES_USR." WHERE ID_USUARIO = '$usuario') ORDER BY NM_CIDADE";
	$conn->query($sql);
	if ($conn->get_status()==false) die($conn->get_msg());
	while ($r = $conn->fetch_row()) $dados['usuario']['cidades'][] = $r;

	foreach ($_POST as $i => $v) {
		$$i = trim($v);
		$aux = explode('_',$i);
		if ($aux[0].$aux[1] == 'cbxservidores') $cbx_servidores[] = trim($aux[2]);
		elseif ($aux[0].$aux[1] == 'txacomandos') $comandos = explode("\n", strtoupper($v));
	}

	// servidores de bds cadastrados no fns1

	$sql = "select NM_HOST from CADASTROS.TP_SERVIDOR";
	$conn_fns1->query($sql);
	$servidores = null;
	$servidores['homolog'] = 'homolog';
	while ($r = $conn_fns1->fetch_row($res)) {
		if (trim($r['NM_HOST'])) {
			$aux = $r['NM_HOST'];
			$aux = explode('.',$aux);
			$servidores[$aux[0]] = $aux[0];
		}
	}

?>

    <form name="form_comandos_bd" method="post">

		<input type="hidden" name="hdn_opcao" value="comandos_bds">

        <table width="90%" align="center" cellspacing="2" cellpadding="3" border="0">

			<!-- resposta e validacao -->

			<tr>
				<td align="right"><font size="2">

					<!-- resposta -->

                    <?
                    if ($cbx_servidores and $btn_executar and $txa_comandos) {
                
                        foreach ($cbx_servidores as $v) {
                
                            echo $v.' ';
                
                            if (trim($v) == 'iai1') {
                                $conn = new BD ("$v", 'marceloawk', 'bloqueiocbm', BD_NOME_ACESSOS);
                            } else {
                                $conn = new BD ("$v", 'marceloawk', 'oraculo', BD_NOME_ACESSOS);
                            }
                
                            foreach ($comandos as $comando) {
                
                                $conn->query($comando);

								while ($r = $conn->fetch_row()) $rs[$v][] = $r;

								if (false) {//if ($conn->get_status() == false) {

									echo '<font color="#990000"><b>falhou</b></font>&nbsp;&nbsp;&nbsp;'; flush();
									$rs[$v][] = $conn->get_msg();

								} else {

									echo '<font color="#009900"><b>ok</b></font>&nbsp;&nbsp;&nbsp;'; flush();

								}
    
                            }
                
                        }
                
                    }
                	?>

				</font></td>
			</tr>

			<tr><td height="490" valign="top">
			<table width="80%" border="0" align="center"><tr><td>

            <? $colspan = '2'; ?>

            <!-- Resposta -->

            <tr>
                <td colspan="<?=$colspan?>" align="center"><font size="2">
                </font></td>
            </tr>

            <!-- Servidores -->

            <tr>
                <td valign="top" align="right">Servidores&nbsp;</td>
                <td>
                    <table>

                        <tr>
							&nbsp;<input type="checkbox" name="cbx_todos" onchange="marcar_todos(this.form, this, 'cbx_servidores');">&nbsp;<font color="#990000">marcar todos</font><br>
                            <?
                            $colunas = 7; 
                            $aux = 0; 
                            foreach ($servidores as $i => $v) { 
                                $aux++; 
                                ?>
                                <td nowrap>

                                    <? 
                                        $aux_cbx = 'cbx_servidores_'.$i; 
                                        if (isset($$aux_cbx)) $checked = 'checked="checked"'; else $checked = null; 
                                    ?>

                                    <input type="checkbox" name="cbx_servidores_<?=$i?>" <?=$checked?> >&nbsp;<?=$v?>
                                </td>
                                <? if ($aux == $colunas) {$aux = 0; echo '</tr><tr>'; } ?>
                            <? } ?>
                        </tr>
                    </table>
                </td>
            </tr>

            <!-- Comandos -->

            <tr>
                <td valign="top" align="right">Comandos&nbsp;</td>
                <td>
                    <textarea name="txa_comandos" class="campo" cols="100" rows="10"><?=$txa_comandos?></textarea>
                </td>
            </tr>

			<!-- Executar Comandos -->

            <tr align="center">
                <td colspan="<?=$colspan?>">
                    <input type="submit" name="btn_executar" value="Executar Comandos">
                </td>
            </tr>

			<!-- Resposta dos Comandos -->

            <tr>
                <td valign="top" align="right">Resposta&nbsp;</td>
                <td>
                    <textarea name="txa_resposta" class="campo" cols="100" rows="10"><? print_r($rs); ?></textarea>
                </td>
            </tr>

			</td></tr></table>


			<tr><td align="right"><font size="1">versão <?=$versao?></font></td></tr>

        </table>
</body>
</html>