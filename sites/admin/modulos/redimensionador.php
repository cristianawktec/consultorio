<?

	foreach($_POST as $i => $v) $$i = $v;

	if ($txt_diretorio) {

		if ($btn_redimensionar) {
			$novos_arquivos = $obj_imagem->redimensionar_imagens($txt_diretorio, $txt_arquivo, $sel_extensao, $txt_proporcao, $txt_qualidade, $txt_altura, $txt_largura);
		} elseif ($btn_listar) {
			$arquivos_lista = $obj_imagem->arquivos($txt_diretorio, $txt_arquivo, $sel_extensao);
		}

	}

	$op_extensao = array (
		'jpg' => 'jpg',
		'JPG' => 'JPG'
//		'gif' => 'gif',
//		'GIF' => 'GIF',
//		'png' => 'png',
//		'PNG' => 'PNG'
	);


?>
<fieldset>
<legend>Redimensionador de Imagens</legend>

<form name="form_redimensionador" method="post">

	<input type="hidden" name="hdn_opcao" value="redimensionador">

	<table width="600" cellspacing="2" cellpadding="2" align="center" border="0">

	<? $colspan = 2; ?>

	<tr><th colspan="<?=$colspan?>">Redimensionador de Imagens</th></tr>
	<tr><td colspan="<?=$colspan?>">&nbsp;</td></tr>

	<!-- Diretorio -->

	<tr>
		<td align="right">Diretório&nbsp;</td>
		<td><input type="text" name="txt_diretorio" value="<?=$txt_diretorio?>" size="50"></td>
	</tr>

	<!-- Arquivos -->

	<tr>
		<td align="right">Arquivo&nbsp;</td>
		<td>
			<input type="text" name="txt_arquivo" value="<? if ($txt_arquivo) echo $txt_arquivo; else echo '*'; ?>" size="20">
			&nbsp;.&nbsp;&nbsp;
			<select name="sel_extensao">
				<? foreach ($op_extensao as $i => $v) { ?>
					<? if ($i == $sel_extensao) $selected = 'selected="selected"'; else $selected = null; ?>
					<option value="<?=$i?>" <?=$selected?> ><?=$i?></option>
				<? } ?>
			</select>
		</td>
	</tr>

	<!-- Qualidade -->

	<tr>
		<td align="right">Qualidade&nbsp;</td>
		<td><input type="text" name="txt_qualidade" value="<? if ($txt_qualidade) echo $txt_qualidade; else echo '100'; ?>" size="3" maxlength="3"> %</td>
	</tr>

	<!-- Dimensções -->

	<tr>
		<td align="right" valign="top">Dimensções&nbsp;</td>
		<td>
			<? if ($rdo_dimensoes == "proporcao" or !$rdo_dimensoes) $checked = 'checked="checked"'; else $checked = null; ?>
			<input type="radio" name="rdo_dimensoes" value="proporcao" <?=$checked?> >Proporção
			<input type="text" name="txt_proporcao" value="<? if ($txt_proporcao) echo $txt_proporcao; else echo '100'; ?>" size="3" maxlength="3"> %<br>
			<? if ($rdo_dimensoes == "absoluto") $checked = 'checked="checked"'; else $checked = null; ?>
			<input type="radio" name="rdo_dimensoes" value="absoluto"  <?=$checked?> >Valor absoluto&nbsp;
			<? if ($cbx_proporcional) $checked = 'checked="checked"'; else $checked = null; ?>
			<input type="checkbox" name="cbx_proporcional" value="sim" <?=$checked?> >Manter proporção&nbsp;&nbsp;&nbsp;
			<input type="text" name="txt_altura" value="<? if ($txt_altura) echo $txt_altura; ?>" size="5">&nbsp;largura&nbsp;&nbsp;
			<input type="text" name="txt_largura" value="<? if ($txt_largura) echo $txt_largura; ?>" size="5">&nbsp;altura
		</td>
	</tr>

	<!-- Botoes -->

	<tr><td colspan="<?=$colspan?>">&nbsp;</td></tr>
	<tr>
		<td align="right">&nbsp;</td>
		<td>
			<input type="submit" name="btn_listar" value="Listar Arquivos" class="botao">
			<input type="submit" name="btn_redimensionar" value="Redimensionar" class="botao">
		</td>
	</tr>

	<? if (is_array($novos_arquivos)) { ?>

		<tr><td colspan="<?=$colspan?>">&nbsp;</td></tr>
		<tr>
			<td align="right" valign="top">Resposta&nbsp;</td>
			<td><textarea cols="55" rows="<?=count($novos_arquivos)+1;?>"><? foreach($novos_arquivos as $arquivo) echo "$arquivo\n"; ?></textarea></td>
		</tr>

	<? } elseif (is_array($arquivos_lista)) { ?>

		<tr><td colspan="<?=$colspan?>">&nbsp;</td></tr>
		<tr>
			<td align="right" valign="top">Resposta&nbsp;</td>
			<td><textarea cols="55" rows="<?=count($arquivos_lista)+1;?>"><? foreach($arquivos_lista as $arquivo) echo "$arquivo\n"; ?></textarea></td>
		</tr>

	<? } ?>

	</table>

</form>
</fieldset>