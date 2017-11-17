<?

	$rs = $obj_consulta->consutar_servidores_cidades2($link_fns1, 'SC');

	$cidades = null;
	foreach ($rs as $nm_servidor => $arr) {
		foreach ($arr as $nm_ip => $arr2) {
			foreach ($arr2 as $id_cidade => $nm_cidade) {
				if (@in_array($nm_cidade, $cidades)) $cidades_ja_cadastrada[$id_cidade." $nm_cidade"] = $servidores[$id_cidade] . " | $nm_servidor";
				$cidades[$id_cidade] = $nm_cidade;
				$servidores[$id_cidade] = $nm_servidor;
			}
		}
	}

?><table align="center" width="98%" cellspacing="10" cellpadding="5" border="0">

	<? $colspan = 4; ?>

	<? if ($cidades_ja_cadastrada) { ?>
		<tr>
			<th colspan="<?=$colspan?>" align="left">
				Problema detectado! Cidades cadastradas em mais de um servidor!
			</th>
		</tr>
		<tr>
			<td colspan="<?=$colspan?>">
				<? foreach ($cidades_ja_cadastrada as $i => $v) echo "$i => $v<br>"; ?><br>
			</td>
		</tr>
	<? } ?>

	<tr>
		<? $aux = null; foreach ($rs as $nm_servidor => $arr) { $aux++; ?>
			<? foreach ($arr as $nm_ip => $arr2) { ?>
				<? if ($bgcolor == COR01) $bgcolor = COR02; else $bgcolor = COR01; ?>
				<td valign="top" bgcolor="<?=$bgcolor?>" >
					<center>
						<b>
							<? if ($nm_ip) { ?>
								<a href="https://<?=$nm_ip?>/sigat/">
									<?=$nm_servidor?><br>
									<font size="1"><?=$nm_ip?></font>
								</a></b><br><br>
							<? } else { ?>
									<?=$nm_servidor?></b><br><br><br>
							<? } ?>
					</center>
					<? foreach ($arr2 as $ID_CIDADE => $NM_CIDADE) echo "$ID_CIDADE $NM_CIDADE<br>"; ?>
				</td>
				<? if ($aux == $colspan) {echo "</tr><tr>"; $aux=0; } ?>

			<? } ?>
		<? } ?>
	</tr>

</table>