<?

    $enderecos = array (
        array (
            'titulo' => 'VoIP',
            'descricao' => 'Voz sobre IP',
            'link' => 'http://10.193.4.8/ramais'
        ), array (
            'titulo' => 'Telefones',
            'descricao' => 'Telefones &uacute;teis do efetivo do CBMSC',
            'link' => 'mvs/telefones.php'

		), array (
            'titulo' => 'Sincronizar Sistemas',
            'descricao' => 'Sincronia remota dos sistemas Awk',
            'link' => 'http://10.193.4.53/mvs/sincronizar_sistemas.php'
        )
    );

    //echo "<pre>"; print_r($enderecos); echo "</pre>";

?>
<fieldset>
<legend>Awk</legend>
    <table width="100%" border="0">
        <? $cs = 1; ?>
        <tr>
            <th colspan="<?=$cs?>">Ferramentas da Awk<br><br></th>
        <tr>
        <tr align="center"> 
            <td valign="top">
                <p>
                    <? foreach ($enderecos as $asdf => $r) { ?>
						<? if (!$r['link']) { ?>
							<? foreach ($r as $r2) { ?>
		                        <a href="<?=$r2['link']?>"><?=$asdf?> <?=$r2['titulo']?></a><br>
							<? } ?>
						<? } else { ?>
	                        <a href="<?=$r['link']?>"><?=$r['titulo']?></a><br>
						<? } ?>
                    <? } ?>
                </p>
            </td>
        </tr> 
    </table>
</fildset>
