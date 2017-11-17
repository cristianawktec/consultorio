<?

	if ($_SESSION['perfil'] > 1) {
		echo "<meta http-equiv=\"refresh\" content=\"0;URL=http://$_SERVER[HTTP_HOST]/smvs/sistema/bloquear_link_direto.php\">";
		exit;
	}

	$link_fns1 = mysql_connect('fns1','usuariodump','dumpcbm');
	$sql = "select ID_SERVIDOR, NM_SERVIDOR, NM_IP, NM_HOST from CADASTROS.TP_SERVIDOR ";
	$res = mysql_query($sql, $link_fns1);
	while ($r = mysql_fetch_assoc($res)) {
		$aux = explode('.', $r['NM_HOST']);
		$rs[$aux[0]] = $r['NM_SERVIDOR'];
		$aux = str_replace('1', '2', $aux[0]);
		$rs[$aux] = $r['NM_SERVIDOR'] . " - backup";
	}

?><font size="3"><pre>
#!/bin/sh
clear
echo '*** Script para atulizar o arquivo de hosts dos servidores ***'
<? 
	foreach ($rs as $v => $r) {

		echo "echo 'Atualizando $v'<br>";
		echo "sshpass -p cbmsc#e193* scp /etc/hosts $v:/etc/hosts<br>";
	} 
?>
echo '*** Final de Script ***'
</pre></font>
