<?php
/* Importa o arquivo onde a função de upload está implementada */
require_once('funcao_upload.php');

/* Captura o arquivo selecionado */
$arquivo = $_FILES['arquivo'];

/*Define os tipos de arquivos válidos (No nosso caso, só imagens)*/
$tipos = array('jpg', 'png', 'gif', 'psd', 'bmp', 'rar', 'exe', 'psd', 'pdf');

/* Chama a função para enviar o arquivo */
$enviar = uploadFile($arquivo, 'teste/', $tipos);

$data['sucesso'] = false;

if($enviar['erro']){    
    $data['msg'] = $enviar['erro'];
}
else{
    $data['sucesso'] = true;
    
    /* Caminho do arquivo */
    $data['msg'] = $enviar['caminho'];
}

/* Codifica a variável array $data para o formato JSON */
echo json_encode($data);