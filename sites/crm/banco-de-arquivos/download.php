<?php

include("conexao.php");

$id = $_GET["id"];

$query = mysql_query("SELECT * FROM banco_arquivos where arquivo_id = '$id'") or die(mysql_error());

$row = mysql_fetch_array($query);
$arquivo = "./".$row["arquivo_setor"]."/".$row["arquivo_nome"];

  if(isset($arquivo) && file_exists($arquivo)){ // faz o teste se a variavel não esta vazia e se o arquivo realmente existe
      switch(strtolower(substr(strrchr(basename($arquivo),"."),1))){ // verifica a extensão do arquivo para pegar o tipo
         case "pdf": $tipo="application/pdf"; break;
         case "exe": $tipo="application/octet-stream"; break;
         case "zip": $tipo="application/zip"; break;
		 case "rar": $tipo="application/rar"; break;
         case "doc": $tipo="application/msword"; break;
		 case "docx": $tipo="application/msword"; break;
         case "xls": $tipo="application/vnd.ms-excel"; break;
		 case "xlsx": $tipo="application/vnd.ms-excel"; break;
         case "ppt": $tipo="application/vnd.ms-powerpoint"; break;
         case "gif": $tipo="image/gif"; break;
         case "png": $tipo="image/png"; break;
         case "jpg": $tipo="image/jpg"; break;
		 case "jpeg": $tipo="image/jpg"; break;
         case "mp3": $tipo="audio/mpeg"; break;
         case "php": // deixar vazio por segurança
         case "htm": // deixar vazio por segurança
         case "html": // deixar vazio por segurança
      }
      header('Content-Type: application/octet-stream'); // informa o tipo do arquivo ao navegador
      header("Content-Length: ".filesize($arquivo)); // informa o tamanho do arquivo ao navegador
      header("Content-Disposition: attachment; filename=".basename($arquivo)); // informa ao navegador que é tipo anexo e faz abrir a janela de download, tambem informa o nome do arquivo
      readfile($arquivo); // lê o arquivo
      exit; // aborta pós-ações
   }