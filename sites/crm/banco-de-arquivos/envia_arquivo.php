<?php

session_start();

$id = $_GET["id"];

$data = date("d/m/Y");

include_once('conexao.php');
$usuario_id = $_SESSION["usuarioIDa"];
$usuario_n = $_SESSION["usuarioLogina"];

$query2 = mysql_query("SELECT * FROM setores_arquivos where setor_arquivo_id = '$id'");
$row2 = mysql_fetch_array($query2);
$setor = $row2["setor_arquivo_nome"];
$query3 = mysql_query("SELECT * FROM banco_arquivos ORDER BY arquivo_id DESC");
$row3 = mysql_fetch_array($query3);

$ultimo_id = $row3["arquivo_id"]+1;

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
 
	if($_FILES[arquivo][size] > 5000000) { //Limite: 5MB
		print "<script> alert('Tamanho: $tamanho $med! Seu arquivo não poderá ser maior que 5MB!'); window.history.go(-1); </script>\n";
		exit;
	}
 
	/* Defina aqui o diretório destino do upload */

	if (is_file($_FILES[arquivo][tmp_name])) {
		$arquivo = $_FILES[arquivo][tmp_name];
	
		$caminho="./".$setor."/";
	
		
 $string = $_FILES[arquivo][name];
 $string = str_replace(" ","-",$string);
 $nome = $ultimo_id."_".$string;

		
		$caminho=$caminho.$nome;
 
		/* Defina aqui o tipo de arquivo suportado */
		if (!(eregi(".php$", $nome))) {
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

$arquivo1 = $nome;




$query = mysql_query("INSERT INTO banco_arquivos (arquivo_setor, arquivo_setor_id, arquivo_nome, arquivo_usuario, arquivo_usuario_id, arquivo_data) VALUES ('$setor', '$id', '$arquivo1', '$usuario_n', '$usuario_id', '$data')") or die(mysql_error());


echo "<script>window.location.href='exibe-arquivos.php?id=$id';
</script>";

?>