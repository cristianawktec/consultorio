<?php 


$cli_id = $_GET["id"];

$cliente = $_POST["cliente"];
$semana = $_POST["semana"];
$matriculas = $_POST["matriculas"];
$matriculas1 = $_POST["matriculas1"];
$oquefaltou = $_POST["oquefaltou"];
$entrar_escolas = $_POST["entrar_escolas"];
$obs = $_POST["obs"];
$semana_aproveitada = $_POST["semana_aproveitada"];
$matricula_pais = $_POST["matricula_pais"];
$numero_pct = $_POST["numero_pct"];
$projeto_inovador_cli = $_POST["projeto_inovador_cli"];
$projeto_inovador_alunos = $_POST["projeto_inovador_alunos"];
$nota = $_POST["nota"];
$obs_gerente = $_POST["obs_gerente"];
$indica = $_POST["indica"];
$data = date("d/m/Y");


include_once('conexao.php');


mysql_query("INSERT INTO pesquisas (pesquisa_cli_id, pesquisa_data, pesquisa_cli, pesquisa_semana, pesquisa_matriculas, pesquisa_50matriculas, pesquisa_oquefaltou, pesquisa_entrar_escolas, pesquisa_obs_entrar_escolas, pesquisa_semana_aproveitada, pesquisa_matricula_pais, pesquisa_matricula_pct, pesquisa_projeto_inovador_cli, pesquisa_projeto_inovador_alunos, pesquisa_nota, pesquisa_obs_gerente, pesquisa_indica) VALUES ('$cli_id','$data', '$cliente', '$semana', '$matriculas', '$matriculas1', '$oquefaltou', '$entrar_escolas', '$obs', '$semana_aproveitada', '$matricula_pais', '$numero_pct', '$projeto_inovador_cli', '$projeto_inovador_alunos', '$nota', '$obs_gerente', '$indica')");



mysql_close($con);

echo "<script>
	alert('Pesquisa enviada com sucesso');
	window.close();

</script>";

?>