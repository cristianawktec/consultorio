<?  //echo "<pre>"; print_r($_POST); echo "</pre>"; exit;

	if (!$_SESSION['logado']) {
		echo "<meta http-equiv=\"refresh\" content=\"0;URL=http://$_SERVER[HTTP_HOST]/smvs/sistema/bloquear_link_direto.php\">";
		exit;
	}

    require 'lib/loader.php';

    if (!$_POST['btn_limpar']) foreach ($_POST as $i => $v) if (is_array($v)) $$i = $v; else $$i = trim($v);

    $conn = new BD (BD_HOST, BD_USER, BD_PASS, BD_NOME_ACESSOS);

    if($conn->get_status()==false) die($conn->get_msg());

    $sql = "SELECT ID_CIDADE, NM_CIDADE FROM ".TBL_CIDADE." WHERE ID_UF IN ('SC') AND ".TBL_CIDADE.".ID_CIDADE IN (SELECT ID_CIDADE FROM ".TBL_CIDADES_USR." WHERE ID_USUARIO = '$usuario') ORDER BY NM_CIDADE";
    $conn->query($sql);
    if ($conn->get_status()==false) die($conn->get_msg());
    while ($r = $conn->fetch_row()) $dados['usuario']['cidades'][] = $r;

    // Bancos do Sigat para carregamento automatico

    $bancos_sigat = array(
        'ACESSOS',
        'CADASTROS',
        'COBRANCA',
        'EDIFICACOES',
        'FUNCIONAMENTO',
        'HABITESE',
        'MANUTENCAO',
        'PROJETO',
        'SOLICITACAO'
    );

    $cor_banco = '#03a';
    $cor_tabela = '#380';
    $cor_coluna = '#802';
    $cor_banco = '#802';
    $cor_tabela = '#03a';
    $cor_coluna = '#380';

    if ($bd_host) $BD_HOST = $bd_host; else $BD_HOST = BD_HOST;
    $conn = new BD ($BD_HOST, BD_USER, BD_PASS, BD_NOME_ACESSOS);

    // Gerador do script

    $res = mysql_list_dbs();
    while ($r = mysql_fetch_array($res)) {
        if (!$cbx_banco or $cbx_banco[$r[0]]) {
            $res2 = mysql_list_tables($r[0]);
            while ($r2 = mysql_fetch_array($res2)) {
                $res3 = mysql_query("show columns from $r[0].$r2[0]");
                while ($r3 = mysql_fetch_array($res3)) {
                    $dados['banco'][$r[0]][$r2[0]][] = $r3[0];
                }
            }
        }
    }

    $id_cidades = null;
    $aux = explode ('^',$hdn_cidades);
    foreach ($aux as $aux2) if (is_numeric(trim($aux2))) $id_cidades[] = trim($aux2);
    $cbm_id_cidades_marcados = $id_cidades;

    if (is_array($id_cidades)) {

        if ($btn_dumping) {
    
            $dumping_sh = null;
            $dumping_txt = null;
            $validacao = ' -u marceloawk -poraculo ';

			// Criando o arquivo vazio
            $dumping_sh = "echo '' > dumping.sql\n";

            foreach ($id_cidades as $id_cidade) {

				// Tabela CADASTROS.PESSOA
				$dumping_sh .= "mysqldump $validacao --databases CADASTROS --tables ".TBL_PESSOA." --where='ID_CIDADE = $id_cidade' >> dumping.sql\n";

                foreach ($cbx_banco as $banco) {

                    $tabelas = null;
    
                    foreach ($cbx_tabela as $tabela => $b) if ($banco == $b) $tabelas .= "$tabela ";
                    if ($tabelas) $tabelas = substr($tabelas,0,-1);

                    if ($tabelas) {
                        $dumping_sh .= "mysqldump $validacao --databases $banco --tables $tabelas --where='ID_CIDADE = $id_cidade' >> dumping.sql\n";
                        $dumping_txt_array[$id_cidade][$banco] = $tabelas;
                    }
                }

            }

            $dumping_txt = '<table border="0" align="center">';
            $dumping_txt .= '<caption>Dumping do Banco Sigat</caption><tr>';

            foreach ($dumping_txt_array as $id_cidade => $arr) {

                foreach ($dados['usuario']['cidades'] as $v) if ($v['ID_CIDADE'] == $id_cidade) {
                    $nm_cidade = $v['NM_CIDADE'];
                }
                
                $dumping_txt .= '<td><table border="0" cellspacing="2" cellpadding="3" align="center">';
                $dumping_txt .= '<tr bgcolor="#dddddd"><td>'.$id_cidade.' '.$nm_cidade.'</td></tr>';
                foreach ($arr as $banco => $tabelas) {
                    $dumping_txt .= '<tr bgcolor="#ddeeff"><td><b>'.$banco.'</td></tr>';
                    $dumping_txt .= '<tr bgcolor="#ffeedd"><td valign="top">&nbsp;&nbsp;'.str_replace(',','<br>&nbsp;',$tabelas).'</td><tr>';
                }
                
                $dumping_txt .= '</table></td>';
    
            }
    
            $dumping_txt .= '</tr></table>';
    
            $arquivo = fopen('dumping.htm', 'w');
            if (!fwrite($arquivo, $dumping_txt)) echo "Erro na gravacao do arquivo";
            fclose($arquivo);
    
            $arquivo = fopen('dumping.sh', 'w');
            if (!fwrite($arquivo, $dumping_sh)) echo "Erro na gravacao do arquivo";
            fclose($arquivo);
            shell_exec('chmod 755 dumping.sh');
            shell_exec('sh dumping.sh');
    
        } elseif ($btn_dados) {

            $arquivo_sql = 'dumping.sql';
            $arquivo_sh = 'dumping.sh';
			$validacao = ' -u marceloawk -poraculo -h '.$_POST['bd_host'].' ';
            $cidades = null;

			$dumping_sh = "echo '' > $arquivo_sql\n";

            foreach ($id_cidades as $id_cidade) {

                $cidades .= "ID_CIDADE = $id_cidade or ";

                $bancos = null;

                foreach ($cbx_banco as $banco) {

                    $bancos .= "$banco ";

                }

				$dumping_sh .= "mysqldump $validacao -t -n -f --databases CADASTROS --tables PESSOA --where='ID_CIDADE = $id_cidade' >> $arquivo_sql\n";

            }

            $cidades = substr($cidades,0,-4);
            $dumping_sh .= "mysqldump $validacao -t -n -f --databases $bancos --where='$cidades' >> $arquivo_sql\n";

        }

    } elseif ($btn_dumping or $btn_dados) {

        echo "escolher cidade";

    }

    // Controle dos select

    $conn->query("SELECT ".TBL_CIDADES_USR.". ID_CIDADE, ".TBL_CIDADE.".NM_CIDADE FROM ".TBL_CIDADES_USR." JOIN ".TBL_CIDADE." USING (ID_CIDADE) " ."WHERE  ".TBL_CIDADES_USR.".ID_USUARIO='$usuario' ORDER BY ".TBL_CIDADE.".NM_CIDADE");
    if ($conn->get_status()==false) die($conn->get_msg());
    if (!$btn_dados) while ($reg = $conn->fetch_row()) $cidades[] = $reg;

    /* Cidades pré selecionadas */

    if ($hdn_cidades) {

        $in = ' ID_CIDADE in (';
        $aux = explode ('^',$hdn_cidades);
        foreach ($aux as $id) if (is_numeric(trim($id))) $in .= "'$id', ";
        $in = substr($in,0,-2) . ') ';

        $conn->query("select ".TBL_CIDADE.".NM_CIDADE, ".TBL_USUARIO.".ID_CIDADE from ".TBL_CIDADE." JOIN ".TBL_USUARIO." USING (ID_CIDADE) WHERE $in group by ".TBL_CIDADE.".ID_CIDADE order by ".TBL_CIDADE.".NM_CIDADE");
        if ($conn->get_status()==false) die($conn->get_msg());
        while ($reg = $conn->fetch_row()) $cidades2[] = $reg;
    }

    if ($cidades2) $cidades = array_diff_key($cidades, $cidades2);

    /* */

    $sql = "select NM_HOST from ".TBL_TP_SERVIDOR." order by NM_HOST ";
    $conn->query($sql, $link_fns1);
    while ($r = $conn->fetch_row()) $rs[] = $r['NM_HOST'];

    $hosts['localhost'] = 'localhost';
    foreach ($rs as $v) {
        $v = explode('.',$v);
        $hosts[$v[0]] = $v[0];
    }


?>
<script language="javascript" type="text/javascript">

    function abrir_janela(arquivo) {
        window.open(arquivo,"janela","top=10,left=10,screenY=20,screenX=20,toolbar=no,location=no,directories=no,status=yes,menubar=no,scrollbars=yes,resizable=no,width=600,height=400,innerwidth=1,innerheight=1");
    }

    function move_item(from, to) {
 
        var f;
        var SI; /* selected Index */
        if(from.options.length>0) {
            for(i=0;i<from.length;i++) {
                if(from.options[i].selected) {
                    SI=from.selectedIndex;
                    f=from.options[SI].index;
                    if (f != 0) {
                        to.options[to.length]=new Option(from.options[SI].text,from.options[SI].value);
                        from.options[f]=null;
                        i--;
                    }
                }
            }
        }

      var valores="";
      var frm = document.form1;
      for (var i=0; i<frm.sel_cidades.length;i++) {
        valores+=frm.sel_cidades[i].value+"^";
      }
      if (valores!="") {
        frm.hdn_cidades.value = valores;
      }

    }

    function sbmit() {
      var valores="";
      var frm = document.form1;
      for (var i=0; i<frm.sel_cidades.length;i++) {
        valores+=frm.sel_cidades[i].value+"^";
      }
      if (valores!="") {
        frm.hdn_cidades.value=valores;
        return true;
      } else {
        alert("Os seguinte ERROS encontrados:\nCidade GBM\nVERIFIQUE!!!");
        return false;
      }
    }

</script>
<fieldset>
 <legend>Estrutura BD's<? if ($BD_HOST) echo " logado no banco <b>$BD_HOST"; ?></b></legend>

    <form name="form1" method="post">

      <input type="hidden" name="hdn_opcao" value="<?=$_POST['hdn_opcao']?>">
      <input type="hidden" name="bd_host" value="<?=$bd_host?>">

    <? if ($btn_dumping and is_array($id_cidades)) { ?>

        <table width="98%" align="center" cellspacing="2" cellpadding="3" border="0">
            <tr>
                <td align="center">
                    <a href="#" onclick="abrir_janela('dumping.htm');">Resumo Dumping</a><br>
                    <a href="#" onclick="abrir_janela('dumping.sql');">dumping</a><br><br>
                    <input type="button" name="btn_executar" value="Executar" class="botao">
                    <input type="button" name="btn_voltar" value="Voltar" class="botao" onclick="history.back();" >
                </td>
            </tr>
        </table>

    <? } elseif ($btn_dados and $hdn_cidades) { ?>

        <table width="98%" align="center" cellspacing="2" cellpadding="3" border="0">
            <tr>
                <td align="center">
                    <b>PORTABILIDADE</b><br><br>
                    <b>Cidades</b>
                    <? 
                        $where = 'where ID_CIDADE in ('; 
                        foreach ($id_cidades as $id_cidade) {
                            echo "$id_cidade "; 
                            $where .= "$id_cidade, ";
                        }
                        $where = substr($where,0,-2) . ')';
                    ?>
                    <br>

                    <b>Bancos</b> <? foreach ($cbx_banco as $banco) echo "$banco "; ?><br><br>
                    <b>Exclus&atilde;o dos dados</b><br><br>
						<div align="left">SET FOREIGN_KEY_CHECKS=0;<br>
						delete from CADASTROS.PESSOA <?=$where?>;<br>
						<? foreach ($_POST['cbx_tabela'] as $tabela => $banco) { ?>
							delete from <?=$banco?>.<?=$tabela?> <?=$where?>;<br>
						<? } ?>
						SET FOREIGN_KEY_CHECKS=1;</div>

                    <br><br>

                    <b>Exclus&atilde;o dos usu&aacute;rios</b><br><br>

					<?
					foreach ($id_cidades as $id_cidade) {
						$sql = "SELECT ".
							TBL_CIDADES_USR.".ID_USUARIO, ".
							TBL_CIDADES_USR.".ID_CIDADE, ".
							TBL_USUARIO.".ID_PERFIL ".
						"FROM ".TBL_CIDADES_USR." ".
							"LEFT JOIN ".TBL_USUARIO." ".
								"ON (".TBL_CIDADES_USR.".ID_USUARIO = ACESSOS.USUARIO.ID_USUARIO) ".
						"WHERE ".
							TBL_CIDADES_USR.".ID_CIDADE = $id_cidade and ".
							TBL_CIDADES_USR.".ID_USUARIO != 'solicitacao' and ".
							TBL_USUARIO.".ID_PERFIL != '1' ".
						";"; //echo "sql: $sql<br>";
					
						$conn->query($sql);
						while($r = $conn->fetch_row()) $rs3[$id_cidade][] = $r['ID_USUARIO'];
					
					}

					//echo "<pre><div align='left'>"; print_r($rs3); echo "</pre>";
					
					foreach ($rs3 as $id_cidade => $rs4) {
						foreach ($rs4 as $usuario) {
							echo "<div align='left'><font size='1'>delete from ".TBL_CIDADES_USR." where ".TBL_CIDADES_USR.".ID_USUARIO = '$usuario' and ".TBL_CIDADES_USR.".ID_CIDADE = $id_cidade; <br></font></div>"; 
						}
					}
					
					?>

                    <br><br>

                    <b>Inserir no banco destino os relacionamentos usu&aacute;rios X cidades</b><br><br>

					<?
					echo "<div align='left'><font size='1'>SET FOREIGN_KEY_CHECKS=0;<br>insert into ".TBL_CIDADES_USR." (".TBL_CIDADES_USR.".ID_USUARIO, ".TBL_CIDADES_USR.".ID_CIDADE) values ";
					$aux = '';
					foreach ($rs3 as $id_cidade => $rs4) foreach ($rs4 as $usuario) $aux .= "('$usuario', $id_cidade), "; 
					echo substr($aux,0,-2)."<br>SET FOREIGN_KEY_CHECKS=1;</font></div>";
					?>

                    <br><br>

                    <b>Gerando o dumping, aguarde por favor...<br>
                    <? 
                        flush(); 

						//echo $dumping_sh; exit;

                        shell_exec($dumping_sh);

						// Tabela CADASTROS.CIDADE
                        foreach ($id_cidades as $id_cidade) {
							$sql = "select * from ".TBL_CIDADE." where ID_CIDADE = $id_cidade";
							$conn->query($sql);
							if($r = $conn->fetch_row()) {
	
								//echo "<pre><div align='left'>"; print_r($r); echo "</pre>";
	
								$aux = "update ".TBL_CIDADE." set ".
									"NM_CIDADE = \'$r[NM_CIDADE]\', ".
									"ID_UF = \'$r[ID_UF]\', ".
									"AGENCIA = \'$r[AGENCIA]\', ".
									"CONTA = \'$r[CONTA]\', ".
									"CONVENIO = \'$r[CONVENIO]\', ".
									"carteira = \'$r[carteira]\', ".
									"CONTRATO = \'$r[CONTRATO]\', ".
									//"INSTRUCAO = \'".trim(str_replace("","",$r['INSTRUCAO']))."\', ".
									"ENDERECO = \'$r[ENDERECO]\', ".
									"CEDENTE = \'$r[CEDENTE]\', ".
									"CH_MAIL = \'$r[CH_MAIL]\', ".
									"id_banco = \'$r[id_banco]\', ".
									"VIABILIDADE_AUTOMATICA = \'$r[VIABILIDADE_AUTOMATICA]\' ".
									"where ".TBL_CIDADE.".ID_CIDADE = $id_cidade;";
									shell_exec("echo $aux >> dumping.sql\n");
							}
						}

                    ?>
                    <font color="#990000">OK</font></b>
                    <br>dumping completo <a href="<?=$arquivo_sql?>">Arquivo SQL</a>
                    <br><br>
                    <input type="button" name="btn_voltar" value="Voltar" class="botao" onclick="history.back();" >
                    <br><br>
                </td>
            </tr>
        </table>

    <? } else { ?>

        <table width="98%" align="center" cellspacing="2" cellpadding="3" border="0">
            <? $colspan = '3'; ?>

<!-- cidades -->

<? if (false) { //($cbx_tabela) { ?>

    <tr>
        <td colspan="<?=$colspan?>">
            <table width="100" align="center" border="0">
                <input type="hidden" name="hdn_cidades">
                <tr>
                    <td align="center"><b>Todas as cidades</b></td>
                    <td>&nbsp;</td>
                    <td align="center"><b>Cidades a serem consultadas</b></td>
                </tr>
                <tr>
                    <td width="100" align="left">
                        <select name="sel_cidade" size="10" multiple class="campo">
                            <option value=""> - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - </option>
                            <? foreach($cidades as $cidade) { ?>
                                <option value="<?=$cidade['ID_CIDADE']?>"><?=$cidade['NM_CIDADE']?></option>
                            <? } ?>
                        </select>
                    </td>
                    <td align="center">
                <input type="button" value = '>>>' onClick="move_item(sel_cidade,sel_cidades)" class="campo"><br><br>
                <input type="button" value = '<<<' onClick="move_item(sel_cidades,sel_cidade)" class="campo">
                    </td>
                    <td width="100" align="right">
                        <select name="sel_cidades" size="10" multiple class="campo">
                            <option value=""> - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - </option>
                            <? foreach($cidades2 as $cidade) { ?>
                                    <option value="<?=$cidade['ID_CIDADE']?>"><?=$cidade['NM_CIDADE']?></option>
                            <? } ?>
                        </select>
                    </td>
                </tr>
            </table>
        </td>
    </tr>

<? } ?>

<? if (!$bd_host) { ?>


    <tr>
        <td>
            Escolher o host do banco de dados
            <select name="bd_host" onchange="submit()">
                <option value=""> - - - escolher o host - - - </option>
                <? foreach ($hosts as $i => $v) { ?>
                    <option value="<?=$i?>"><?=$v?></option>
                <? } ?>
            </select>
        </td>
    </tr>


<? } else { ?>

<!-- fim cidades -->

    <?  if ($cbx_banco) { ?>
                <tr>
                    <td align="center" colspan="<?=$colspan?>">
                        Coluna: <input type="text" name="txt_coluna" value="<?=$txt_coluna?>" class="campo" >
                    </td>
                </tr>
    <? } ?>
    
    <!-- fim cidades -->

            <tr>
                <td colspan="<?=$colspan?>"><br>
                    <table width="100%" cellspacing="2" cellpadding="3" border="0">
                        <caption><h4>Bancos de Dados</h4></caption>
                        <tr>

                            <!-- bancos -->

                            <? $aux = 0; foreach ($dados['banco'] as $banco => $arr2) { $aux++; ?>
                                <td valign="top">
                                    <?
                                    if ($cbx_banco) {
                                        if ($cbx_banco[$banco]) $cb = 'checked="checked"'; else $cb = false;
                                    } else {
                                        if (in_array($banco,$bancos_sigat)) $cb = 'checked="checked"'; else $cb = false;
                                    }
                                    ?>
                                    <input type="checkbox" <?=$cb?> name="cbx_banco[<?=$banco?>]" value="<?=$banco?>" class="campo">
                                    <b><font color="<?=$cor_banco?>"><?=$banco?></font></b><br>

                                    <!-- tabelas -->

                                    <? foreach ($arr2 as $tabela => $arr3) if ($cbx_banco[$banco]) { ?>
                                        <? 
                                        if ($cbx_tabela) {
                                            if ($cbx_tabela[$tabela] and in_array($txt_coluna,$arr3)) $ct = 'checked="checked"'; else $ct = false; 
                                        } else {
                                            $ct = 'checked="checked"';
                                        }
                                        ?>
                                        <input type="checkbox" <?=$ct?> name="cbx_tabela[<?=$tabela?>]" value ="<?=$banco?>" class="campo">
                                        <b><font color="<?=$cor_tabela?>"><?=substr($tabela,0,20)?></font></b><br>

                                            <!-- colunas -->
                                            <font color="<?=$cor_coluna?>">
                                            <? foreach ($arr3 as $campo) { ?>
                                                <? 
                                                    if ($txt_coluna) {
                                                        if ($cbx_tabela[$tabela] and $btn_consultar and is_numeric(strpos($campo,$txt_coluna))) echo $campo.'<br>';
                                                    } else {
                                                        if ($cbx_tabela[$tabela] and $btn_consultar) echo $campo.'<br>';

                                                    }
                                                ?>
                                            <? } ?>
                                            </font>

                                    <? } ?>

                                </td>
                                <? if ($aux == 4) { echo '</tr><tr>'; $aux = 0; } ?>

                            <? } ?>

                        </tr>

                    </table>
                </td>
            </tr>
            <tr>
                <td align="center" colspan="<?=$colspan?>"><br>
                    <input type="submit" name="btn_consultar" value="consultar" class="botao">
                    <input type="submit" name="btn_limpar" value="Limpar" class="botao">
                    <!-- <input type="submit" name="btn_dumping" value="Dumping" onclick="sbmit()" class="botao"> -->
                    <!-- <input type="submit" name="btn_dados" value="Dados" onclick="sbmit()" class="botao"> -->
                </td>
            </tr>
<? } ?>
        </table>


    <? } ?>


    </form>
</fieldset>
