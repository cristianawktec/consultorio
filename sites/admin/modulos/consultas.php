<?

    require ('./../sistema/requires.php');

	switch ($_GET['op']) {

		case 'consutar_servidores_cidades': 

			$titulo = "Dados do servidor <b>FNS1</b>";
			$rs = $obj_consulta->consutar_servidores_cidades($link_fns1, 'SC'); 
		break;
		default: $rs = 'Tipo de consulta inválida ou não selecionada';
	}

	$cor1 = "dedede";
	$cor2 = "fefefe";

?> 
<head>
<title>Consultas</title>
<link rel="stylesheet" type="text/css" href="./../css/smvs.css" />
<link rel="stylesheet" type="text/css" href="./../css/menu.css" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF8" />
</head>
<body>
	<table align="center" width="90%" border="0">
		<tr>
			<td class="cabecalho"><?=$titulo?></td>
		</tr>
		<tr>
			<td>
				<table width="100%" border="0">
					<? foreach ($rs as $i => $v) { ?>
						<? if ($bgcolor == "bgcolor='#$cor1'") $bgcolor = "bgcolor='#$cor2'"; else $bgcolor = "bgcolor='#$cor1'"; ?>
						<tr>
							<td valign="top" align="right" <?=$bgcolor?> ><?=$i?>&nbsp;</td>
							<td <?=$bgcolor?> >
								<? if (!is_array($v)) echo $v; else { ?>
									<? foreach ($v as $i2 => $v2) echo "$i2 $v2<br>"; ?>
								<? } ?>
							</td>
						</tr>
					<? } ?>
				</table>
			</td>
		</tr>
		<tr>
			<td class="rodape">&nbsp;</td>
		</tr>
	</table>
</body>
</head>
