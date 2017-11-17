<?php  session_start();

$id = $_GET["id"];

include_once('conexao.php');


mysql_query("UPDATE prospectos SET prospecto_status = '0' where prospecto_id='$id'");

echo "

<script>
alert('Prospecto Excluido com Sucesso!');
window.location.href='edita_prospectos.php';
</script>

";

?>