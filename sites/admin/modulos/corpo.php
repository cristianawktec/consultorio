<a name="index"></a>
<fieldset>
<legend><?=$pg['titulo']?></legend>
    <table width="100%" border="0">
        <tr>
            <th colspan="<?=$pg['colspan']?>" align="center">
				<table align="" border="0">
					<tr>
						<th colspan="<?=$pg['colspan']?>" align="center">
							<? foreach ($pg['topico'] as $i => $topico) { ?>
								<? if ($topico) { ?><a href="#<?=$topico?>"><?=$topico?><br></a><? } ?>
							<? } ?>
						</th>
					<tr>
				</table>
				<hr size="1">
            </th>
        <tr>
        <? foreach ($pg['topico'] as $i => $topico) if ($topico) { ?>
        <tr>
            <th colspan="<?=$pg['colspan']?>"><a name="<?=$topico?>"></a><?=$topico?><br><br></th>
        <tr>
        <tr> 
            <td valign="top">
                <?=$pg['texto']["$i"]?>
                <div align="right"><a href="#index">[index]</a>
                </div>
            </td>
        </tr> 
        <? } ?>
    </table>
</fildset>