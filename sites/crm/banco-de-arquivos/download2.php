<?php

include("conexao.php");

$id = $_GET["id"];

$query = mysql_query("SELECT * FROM banco_arquivos where arquivo_id = '$id'") or die(mysql_error());

$row = mysql_fetch_array($query);

// Define o tempo mсximo de execuчуo em 0 para as conexѕes lentas
set_time_limit(0);

// Arqui vocъ faz as validaчѕes e/ou pega os dados do banco de dados

$aquivoNome = $row["arquivo_nome"]; // nome do arquivo que serс enviado p/ download
$arquivoLocal = "./".$row["arquivo_setor"]."/".$aquivoNome; // caminho absoluto do arquivo

// Verifica se o arquivo nуo existe
if (!file_exists($arquivoLocal)) {
// Exiba uma mensagem de erro caso ele nуo exista
exit;
}

// Aqui vocъ pode aumentar o contador de downloads

// Definimos o novo nome do arquivo
$novoNome = $aquivoNome;

// Configuramos os headers que serуo enviados para o browser
header('Content-Description: File Transfer');
header('Content-Disposition: attachment; filename="'.$aquivoNome.'"');
header('Content-Type: application/octet-stream');
header('Content-Transfer-Encoding: binary');
header('Content-Length: ' . filesize($aquivoNome));
header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
header('Pragma: public');
header('Expires: 0');

// Envia o arquivo para o cliente
readfile($aquivoNome);
?>