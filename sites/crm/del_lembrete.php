<?php  session_start();


$id = $_GET["id"];

include_once('conexao.php');

mysql_query("DELETE FROM lembretes where lembrete_id='$id'");

echo "

<script>
alert('Lembrete Excluido com Sucesso!');
window.location.href='lembretes.php';
</script>

";

?>