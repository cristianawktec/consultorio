<?php 


$cli_id = $_GET["id"];

$numero_escolas = $_POST["numero_escolas"];
$escolas_faltaram = $_POST["escolas_faltaram"];
$aceitacao_alunos = $_POST["aceitacao_alunos"];
$aceitacao_pais = $_POST["aceitacao_pais"];
$perfil_cliente = $_POST["perfil_cliente"];
$teve_suporte = $_POST["teve_suporte"];
$perfil_cidade = $_POST["perfil_cidade"];
$satisfacao_campanha = $_POST["satisfacao_campanha"];
$valores_campanha = $_POST["valores_campanha"];
$convite_campanha = $_POST["convite_campanha"];
$informacao_adicional = $_POST["informacao_adicional"];
$nova_data = $_POST["nova_data"];

$data = date("d/m/Y");


include_once('conexao.php');


$query = mysql_query("SELECT * FROM clientes where cliente_id = '$cli_id'");
$row = mysql_fetch_array($query);

$cliente = $row["cliente_nome"];

mysql_query("INSERT INTO pesquisa_gerente (pesquisa_gerente_cli_id, pesquisa_gerente_cli, pesquisa_gerente_n_escolas, pesquisa_gerente_f_escolas, pesquisa_gerente_aceitacao_alunos, pesquisa_gerente_aceitacao_pais, pesquisa_gerente_perfil_cliente, pesquisa_gerente_suporte, pesquisa_gerente_perfil_cidade, pesquisa_gerente_satisfacao_cliente, pesquisa_gerente_valores, pesquisa_gerente_convite, pesquisa_gerente_informacao_adicional, pesquisa_gerente_cliente_reagendou, pesquisa_gerente_data) VALUES ('$cli_id', '$cliente', '$numero_escolas', '$escolas_faltaram', '$aceitacao_alunos', '$aceitacao_pais', '$perfil_cliente', '$teve_suporte', '$perfil_cidade', '$satisfacao_campanha', '$valores_campanha', '$convite_campanha', '$informacao_adicional', '$nova_data', '$data')") or die(mysql_error());



mysql_close($con);

echo "<script>
	alert('Pesquisa enviada com sucesso');
	window.close();

</script>";

?>