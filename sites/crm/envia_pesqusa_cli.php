<?php 
session_start();


$cli_id = $_GET["cli_id"];
$cliente = $_POST["cliente"];
$semana = $_POST["semana"];
$matriculas = $_POST["matriculas"];
$50matriculas = $_POST["50matriculas"];
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
$data = date("d/m/Y");


$con = mysql_connect("localhost","root","genesis2012");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("crm", $con);


mysql_query("INSERT INTO pesquisas (pesquisa_cli_id, pesquisa_data, pesquisa_cli, pesquisa_semana, pesquisa_matriculas, pesquisa_50matriculas, pesquisa_oquefaltou, pesquisa_entrar_escolas, pesquisa_obs_entrar_escolas, pesquisa_semana_aproveitada, pesquisa_matricula_pais, pesquisa_matricula_pct, pesquisa_projeto_inovador_cli, pesquisa_projeto_inovador_alunos, pesquisa_nota, pesquisa_obs_gerente) VALUES ('$data', '$cli_id', '$cliente', '$semana', '$matriculas', '$50matriculas', '$oquefaltou', '$entrar_escolas', '$obs', '$semana_aproveitada', '$matricula_pais', '$numero_pct', '$projeto_inovador_cli', '$projeto_inovador_alunos', '$nota', '$obs_gerente')") or die(mysql_error());



mysql_close($con);

echo "cadastrado com sucesso";

?>