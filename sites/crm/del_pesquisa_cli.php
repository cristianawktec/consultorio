<?php  session_start();

$id = $_GET["id"];

include_once('conexao.php');

$cli_id = $_GET["cli_id"];

mysql_query("DELETE from pesquisas where pesquisa_id='$id'");

echo "

<script>
alert('Pesquisa Excluida com Sucesso!');
window.location.href='edita_cliente.php?id4=$cli_id';
</script>

";

?>