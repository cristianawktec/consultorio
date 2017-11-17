<?

    $pg['titulo'] = 'Hosts';
    $pg['colspan'] = '1';

    @shell_exec('cp /etc/hosts /var/www/smvs/modulos/hosts.txt');

    $hosts = null;
    foreach (file('modulos/hosts.txt') as $linha) if (trim($linha)) {
        $hosts .= "$linha\n";
    }

    @$pg['topico'][] = 'Hosts de '.trim(shell_exec('hostname'));
    $pg['texto'][] = "<pre>$hosts</pre>";

?>
    <table width="500" border="1" align="center">
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
