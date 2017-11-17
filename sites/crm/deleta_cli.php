<?php  session_start();

$id = $_GET["id"];

include_once('conexao.php');


mysql_query("UPDATE clientes SET cliente_status = '0' where cliente_id='$id'");

echo "

<script>
alert('Cliente Excluido com Sucesso!');
window.location.href='edita_clientes.php';
</script>

";

?>