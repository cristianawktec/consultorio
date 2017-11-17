<?

    $telefones_texto = "
 (48)8453-2035	Bruno Blazius	CIO ClickConsultório Gestor de TI.
 (34)6263-07141	Cristian Marques	CEO ClickConsultório Gestor de Projetos.
 (34)6552-18213	Rosana Fransetto	SEO Diretora de marketing.
";

    $linhas = explode("\n", $telefones_texto);
    foreach ($linhas as $i => $linha) {
        $campos = explode("\t", $linha);
        $regs[$i]['ntc'] = $campos[0];
        $regs[$i]['usuario'] = $campos[1];
        $regs[$i]['cargo'] = $campos[2];
    }

echo "<pre>"; print_r($telefones); echo "</pre>";




?>
<link rel="stylesheet" type="text/css" href="smvs.css">
<table width="800" align="center" border="0" >
<? $colspan = 3; $valor=1;?>
    <tr>
        <th>CONTATO</th>
        <th>USU&Aacute;RIO</th>
        <th>CARGO</th>
    </tr>
    <? foreach ($regs as $i => $reg) { ?>

	<?switch ($valor){
	  case 1: $cor_linha = 'background_color3'; $valor=2;break;
	  case 2: $cor_linha = 'background_color1'; $valor=3;break;
	  case 3: $cor_linha = 'background_color2'; $valor=1;break;
	  break;
	}
?>
 
        <tr class="<?=$cor_linha?>" >
            <!-- Telefone -->
            <td align="center"><?=$reg[ntc]?>&nbsp;</td>
            <!-- Nome -->
            <td><?=$reg[usuario]?>&nbsp;</td>
            <!-- Lotacao -->
            <td><?=$reg[cargo]?>&nbsp;</td>
        </tr>
    <? } ?>
    <tr><th colspan="<?=$colspan?>" >Colaboradores/Awk</th></tr>
</table>

















