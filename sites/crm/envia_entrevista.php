<?php 

include("conexao.php");

if(!empty($_POST["cliente"])){
$cliente_id = $_POST["cliente"];
$data = date("d/m/Y");
$local = $_POST["local"];
$datashow = $_POST["datashow"];
$impressoes = $_POST["impressoes"];
$premio = $_POST["premio"];
$escolas = $_POST["escolas"];
$contrato = $_POST["contrato"];
$pendencias = $_POST["pendencias"];
$acompanhante = $_POST["acompanhante"];
$perfil = $_POST["perfil"];
$proximidade = $_POST["proximidade"];


$query = mysql_query("INSERT INTO entrevista_campanha (entrevista_campanha_cliente_id, entrevista_campanha_data, entrevista_campanha_local, entrevista_campanha_datashow, entrevista_campanha_impressoes, entrevista_campanha_premio, entrevista_campanha_escolas, entrevista_campanha_contrato, entrevista_campanha_pendencias, entrevista_campanha_acompanhante, entrevista_campanha_perfil, entrevista_campanha_proximidade) VALUES ('$cliente_id', '$data', '$local', '$datashow', '$impressoes', '$premio', '$escolas', '$contrato', '$pendencias', '$acompanhante', '$perfil', '$proximidade')") or die(mysql_error());

echo "<script>
alert('Entrevista cadastrada com sucesso.');
window.close();

</script>";

}

?>