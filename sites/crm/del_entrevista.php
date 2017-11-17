<?php 

include("conexao.php");

if(isset($_GET["id"]) and !empty($_GET["id"])){

$id = $_GET["id"];

$cli_id = $_GET["cli_id"];

mysql_query("DELETE FROM entrevista_campanha where entrevista_campanha_id = '$id'") or die(mysql_error());

echo "<script>
alert('Entrevista excluida com sucesso.');
window.location.href='edita_cliente.php?id4=$cli_id';


</script>";

}
?>