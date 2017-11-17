<?php

session_start();

$id = $_GET["id"];

$atendente = $_SESSION["usuarioID"];

/*
INICIO DO CODIGO PHP
NA METADE DE BAIXO (SEGUNDA METADE) HA SOMENTE HTML (FORMULARIO DE UPLOAD)
*/
 
if (isset($_FILES[arquivo])) {
	if ($_FILES[arquivo][size] > 1024 * 1024) {
		$tamanho = round(($_FILES[arquivo][size] / 1024 / 1024), 2);
		$med = "MB";
	} else if ($_FILES[arquivo][size] > 1024) {
		$tamanho = round(($_FILES[arquivo][size] / 1024), 2);
		$med = "KB";
	} else {
		$tamanho = $_FILES[arquivo][size];
		$med = "Bytes";
	}
 
	/* Defina aqui o tamanho máximo do arquivo em bytes: */
 
	if($_FILES[arquivo][size] > 5242880) { //Limite: 5MB
		print "<script> alert('Tamanho: $tamanho $med! Seu arquivo não poderá ser maior que 5MB!'); window.history.go(-1); </script>\n";
		exit;
	}
 
	/* Defina aqui o diretório destino do upload */
 
	if (is_file($_FILES[arquivo][tmp_name])) {
		$arquivo = $_FILES[arquivo][tmp_name];
		$caminho="./arquivos/".$id."/";
		$caminho=$caminho.$_FILES[arquivo][name];
 
		/* Defina aqui o tipo de arquivo suportado */
		if (!(eregi(".php$", $_FILES[arquivo][name]))) {
			if ($_POST['radio'] == "copy") {
				copy($arquivo,$caminho).'</p>';
			} else if ($_POST['radio'] == "move_uploaded_file") {
				move_uploaded_file($arquivo,$caminho).'
					</p>';
			}
		
		} else {

		}
	}

}

$arquivo1 = $_FILES[arquivo][name];

$con = mysql_connect("186.202.152.65","educagenesis1","genesis1995");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("educagenesis1", $con);


$query = mysql_query("INSERT INTO documentos (documento_nome, documento_cli_id, documento_atendente_id) VALUES ('$arquivo1', '$id', '$atendente')");


mysql_close($con);

header("Location: edita_cliente.php?id4=$id");

?>