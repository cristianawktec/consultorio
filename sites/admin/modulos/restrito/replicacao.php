<?  //echo "<pre>"; print_r($_POST); echo "</pre>";

	if (!$_SESSION['logado']) {
		echo "<meta http-equiv=\"refresh\" content=\"0;URL=http://$_SERVER[HTTP_HOST]/smvs/sistema/bloquear_link_direto.php\">";
		exit;
	}

	require 'lib/loader.php';

    //	$conn_tremulus = new BD ('tremulus', BD_USER, BD_PASS, BD_NOME_ACESSOS);
	$conn_tremulus = new BD ('tremulus', 'marceloawk', 'bloqueiocbm', BD_NOME_ACESSOS);

    // Usuarios

    $conn = 'conn_tremulus';
    $sql = "select user, host, password from mysql.user order by user";
    $$conn->query($sql);
    $r = null;
//    while ($r = $$conn->fetch_row()) $rs['usuarios'][] = $r;

    // Stauts Master

    $conn = 'conn_tremulus';
    $sql = "show master status;";
//    $$conn->query($sql);
    $r = null;
//    while ($r = $$conn->fetch_row()) $rs['master'][] = $r;

    // Status Slave


    $r1 = mysql_query("select 1+1");
    $r1 = mysql_query("show master status");
    while ($r2 = mysql_fetch_array($r1)) $rs['asdf'][] = $r2;
    

    //while ($r = $$conn->fetch_row()) $rs['slave'][] = $r;

    // Mostar respostas

    echo "<pre>"; print_r($rs); echo "</pre>";

?>

