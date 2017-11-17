<?php 

$id = $_GET["pesquisa"];
include_once('conexao.php');


$query = mysql_query("SELECT * FROM pesquisa_gerente where pesquisa_gerente_id = '$id'");
$row = mysql_fetch_array($query);
$action = $_GET["action"];

if($action == "ATUALIZAR"){

$id = $_GET["id"];

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

$query = mysql_query("UPDATE pesquisa_gerente SET pesquisa_gerente_n_escolas='$numero_escolas', pesquisa_gerente_f_escolas='$escolas_faltaram', pesquisa_gerente_aceitacao_alunos='$aceitacao_alunos', pesquisa_gerente_aceitacao_pais='$aceitacao_pais', pesquisa_gerente_perfil_cliente='$perfil_cliente', pesquisa_gerente_suporte='$teve_suporte', pesquisa_gerente_perfil_cidade='$perfil_cidade', pesquisa_gerente_satisfacao_cliente='$satisfacao_campanha', pesquisa_gerente_valores='$valores_campanha', pesquisa_gerente_convite='$valores_campanha', pesquisa_gerente_informacao_adicional='$informacao_adicional', pesquisa_gerente_cliente_reagendou='$nova_data' WHERE pesquisa_gerente_id='$id' ") or die(mysql_error());

echo "<script>

alert('Pesquisa atualizada com sucesso.');

window.location.href='ver_satisfacao_gerente.php?pesquisa=$id';

</script>";
	
}


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Pesquisa de Satisfação do Gerente de Vendas</title>


<style type="text/css">

body{background-color: #EEE;}

table {padding: 10px;font-family:Arial, Helvetica, sans-serif; font-size: 12px; width: 400px; margin: 0 auto;  line-height: 20px;}

.texto {width: 200px; border: 1px solid #CCC; height: 15px; padding: 5px; min-height: 15px;}
.textarea {width: 200px; height: 80px; border: 1px solid #CCC; padding: 5px; font-family:Arial, Helvetica, sans-serif; font-size: 12px; min-height: 80px; max-height: 80px; max-width: 200px; min-width: 200px;}
#tabela {border: 1px solid #CCC; width: 500px;}
td {border-bottom: 1px solid #CCC;}

</style>
</head>

<body>

<table width="488" border="0" id="tabela">
 </form>
  <form id="pesquisa_gerente" name="pesquisa_gerente" method="POST" action="<?php $_SERVER["PHP_SELF"]; ?>?id=<?php echo $row["pesquisa_gerente_id"]; ?>&action=ATUALIZAR">
  <tr>
    <td colspan="2" style="background-color: #666; color: #fff;"><strong>PESQUISA DE SATISFA&Ccedil;&Atilde;O - GERENTE DE VENDAS</strong></td>
    </tr>
  <tr>
    <td style="font-size: 14px;"><strong>Cliente:</strong> <?php echo $row["pesquisa_gerente_cli"]; ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>N&uacute;mero de escolas divulgadas</td>
    <td>Quantas escolas faltaram?</td>
  </tr>
  <tr>
    <td><input type="text" name="numero_escolas" class="texto" value="<?php echo $row["pesquisa_gerente_n_escolas"]; ?>" /></td>
    <td><input type="text" name="escolas_faltaram" class="texto" value="<?php echo $row["pesquisa_gerente_f_escolas"]; ?>" /></td>
  </tr>
  <tr>
    <td>Aceita&ccedil;&atilde;o dos alunos</td>
    <td>Aceita&ccedil;&atilde;o dos pais. Quantos n&atilde;o fizeram?</td>
  </tr>
  <tr>
    <td><input type="text" name="aceitacao_alunos" class="texto"  value="<?php echo $row["pesquisa_gerente_aceitacao_alunos"]; ?>" /></td>
    <td><input type="text" name="aceitacao_pais" class="texto" value="<?php echo $row["pesquisa_gerente_aceitacao_pais"]; ?>"  /></td>
  </tr>
  <tr>
    <td>Perfil do Cliente</td>
    <td>Teve suporte na semana?</td>
  </tr>
  <tr>
    <td><input type="text" name="perfil_cliente"  class="texto" value="<?php echo $row["pesquisa_gerente_perfil_cliente"]; ?>" /></td>
    <td><input type="text" name="teve_suporte" class="texto" value="<?php echo $row["pesquisa_gerente_suporte"]; ?>"  /></td>
  </tr>
  <tr>
    <td>Perfil da Cidade</td>
    <td>Satisfa&ccedil;&atilde;o do Cliente na Campanha</td>
  </tr>
  <tr>
    <td><input type="text" name="perfil_cidade" class="texto" value="<?php echo $row["pesquisa_gerente_perfil_cidade"]; ?>"  /></td>
    <td><input type="text" name="satisfacao_campanha" class="texto" value="<?php echo $row["pesquisa_gerente_satisfacao_cliente"]; ?>"  /></td>
  </tr>
  <tr>
    <td>Valores Aplicados na Campanha</td>
    <td>Convite da Campanha</td>
  </tr>
  <tr>
    <td><input type="text" name="valores_campanha" class="texto" value="<?php echo $row["pesquisa_gerente_valores"]; ?>"  /></td>
    <td><input type="text" name="convite_campanha" class="texto" value="<?php echo $row["pesquisa_gerente_convite"]; ?>" /></td>
  </tr>
  <tr>
    <td>Alguma informa&ccedil;&atilde;o adicional sobre a cidade?</td>
    <td>Cliente reagendou nova data?</td>
  </tr>
  <tr>
    <td><input type="text" name="informacao_adicional" class="texto" value="<?php echo $row["pesquisa_gerente_informacao_adicional"]; ?>"  /></td>
    <td><input type="text" name="nova_data" class="texto" value="<?php echo $row["pesquisa_gerente_cliente_reagendou"]; ?>"  /></td>
  </tr>
  <tr>
    <td><input type="submit" name="envia_gerente" value="Atualizar" /></td>
        <td><input type="button" name="fechar" value="Fechar" onclick="javascript:window.close();" /></td>
  </tr>
  
  </form>
</table>

</body>
</html>