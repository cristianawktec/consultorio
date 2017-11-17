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
		//$aux = str_replace('1', '2', $aux[0]);
		//$rs[$aux] = $r['NM_SERVIDOR'] . " - backup";
	}

    //echo "<pre>"; print_r($rs); echo "</pre>"; 

?><font size="3"><pre>
#!/bin/sh
clear
echo '*** Script para backup dos fontes do sigat de todos os servidores ***'
DATA=`date +%Y-%m-%d`
DIR="/var/www/backup_sigat/$DATA"
echo 'Criando diretorio ... '
mkdir $DIR
echo 'OK'
<? 
    $data = date("Y-m-d");

	foreach ($rs as $v => $r) {

		echo "echo 'Backup de $v'<br>";
		echo "sshpass -p cbmsc#e193* rsync -CravzpE --exclude tutorial root@$v:/var/www/sigat/ /var/www/backup_sigat/\$DATA/$v/<br>";


	} 
?>
echo '*** Final de Script ***'
</pre></font>
