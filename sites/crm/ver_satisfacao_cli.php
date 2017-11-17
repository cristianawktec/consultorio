<?php 

$id = $_GET["pesquisa"];
include_once('conexao.php');


$query = mysql_query("SELECT * FROM pesquisas where pesquisa_id = '$id'");
$row = mysql_fetch_array($query);
$action = $_GET["action"];

if($action == "ATUALIZAR"){

$id = $_GET["id"];

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
$data = date("d/m/Y");
$indica = $_POST["indica"];

$query = mysql_query("UPDATE pesquisas SET pesquisa_cli='$cliente', pesquisa_semana='$semana', pesquisa_matriculas='$matriculas', pesquisa_50matriculas='$matriculas1', pesquisa_oquefaltou='$oquefaltou', pesquisa_entrar_escolas='entrar_escolas', pesquisa_obs_entrar_escolas='$obs', pesquisa_semana_aproveitada='$semana_aproveitada', pesquisa_matricula_pais='$matricula_pais', pesquisa_matricula_pct='$numero_pct', pesquisa_projeto_inovador_cli='$projeto_inovador_cli', pesquisa_projeto_inovador_alunos='$projeto_inovador_alunos', pesquisa_nota='$nota', pesquisa_obs_gerente='$obs_gerente', pesquisa_indica='$indica' WHERE pesquisa_id='$id' ") or die(mysql_error());

echo "<script>

alert('Pesquisa atualizada com sucesso.');

window.location.href='ver_satisfacao_cli.php?pesquisa=$id';

</script>";
	
}


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Pesquisa de Satisfação do Cliente</title>


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
 <form id="pesquisa_cli" name="pesquisa_cli" method="POST" action="<?php $_SERVER['PHP_SELF'] ?>?id=<?php echo $row["pesquisa_id"]; ?>&action=ATUALIZAR">
  <tr>
    <td colspan="2" style="background-color: #666; color: #fff;"><strong>PESQUISA DE SATISFA&Ccedil;&Atilde;O - CLIENTE</strong></td>
    </tr>
  <tr>
    <td width="243">Conversei com:<br />
<input type="text" name="cliente" class="texto" value="<?php echo $row["pesquisa_cli"]; ?>" /></td>
    <td width="233">
Semana Atendida:<br />
<input type="text" name="semana" class="texto" OnKeyUp="mascaraData(this);" maxlength="10" value="<?php echo $row["pesquisa_semana"]; ?>" /></td>
  </tr>
  <tr>
    <td>Quantos alunos credenciados: <br />
<input type="text" name="matriculas" class="texto" value="<?php echo $row["pesquisa_matriculas"]; ?>" /></td>
    <td>Acha que poderia chegar a 50 alunos credenciados em sua escola?<br />
<select name="matriculas1" style="border: 1px solid #ccc; height: 27px;">
<option value="<?php echo $row["pesquisa_50matriculas"]; ?>"><?php echo $row["pesquisa_50matriculas"]; ?></option>
<option value="Sim">Sim</option>
<option value="Não">N&atilde;o</option>

</select></td>
  </tr>
  <tr>
    <td>O que faltou na sua vis&atilde;o?<br />
<textarea name="oquefaltou" class="textarea"><?php echo $row["pesquisa_oquefaltou"]; ?></textarea></td>
    <td>Conforme o senhor combinou conosco, chegando a&iacute;, conseguimos realizar o projeto em todas as escolas?<br />
<select name="entrar_escolas" style="border: 1px solid #ccc; height: 27px;">
<option value="<?php echo $row["pesquisa_entrar_escolas"]; ?>"><?php echo $row["pesquisa_entrar_escolas"]; ?></option>
<option value="Sim">Sim</option>
<option value="Não">N&atilde;o</option>
</select><br />
Se n&atilde;o, por que?
<input type="text" name="obs"  class="texto" value="<?php echo $row["pesquisa_obs_entrar_escolas"]; ?>"/></td>
  </tr>
  <tr>
    <td>Na semana, foi tudo bem planejado pelo nosso representante para divulgar seus cursos:<br />

<select name="semana_aproveitada" style="border: 1px solid #ccc; height: 27px;">
<option value="<?php echo $row["pesquisa_semana_aproveitada"]; ?>"><?php echo $row["pesquisa_semana_aproveitada"]; ?></option>
<option value="Sim">Sim</option>
<option value="Não">N&atilde;o</option>
</select></td>
    <td>No S&aacute;bado, todos os pais que compareceram realizaram o credenciamento?<br />
<select name="matricula_pais" style="border: 1px solid #ccc; height: 27px;">
<option value="<?php echo $row["pesquisa_matricula_pais"]; ?>"><?php echo $row["pesquisa_matricula_pais"]; ?></option>
<option value="Sim">Sim</option>
<option value="Não">N&atilde;o</option>
</select><br />
Se for n&atilde;o: Consegue estimar um n&uacute;mero ou porcentagem?<br />
<input type="text" name="numero_pct" class="texto" value="<?php echo $row["pesquisa_matricula_pct"]; ?>" /></td>
  </tr>
  <tr>
    <td>Voc&ecirc; achou nosso refor&ccedil;o escolar inovador?<br />
<select name="projeto_inovador_cli" style="border: 1px solid #ccc; height: 27px;">
<option value="<?php echo $row["pesquisa_projeto_inovador_cli"]; ?>"><?php echo $row["pesquisa_projeto_inovador_cli"]; ?></option>
<option value="Sim">Sim</option>
<option value="Não">N&atilde;o</option>
</select></td>
    <td>E os alunos? Acha que foi algo novo para eles?<br />
<select name="projeto_inovador_alunos" style="border: 1px solid #ccc; height: 27px;">
<option value="<?php echo $row["pesquisa_projeto_inovador_alunos"]; ?>"><?php echo $row["pesquisa_projeto_inovador_alunos"]; ?></option>
<option value="Sim">Sim</option>
<option value="Não">N&atilde;o</option>
</select></td>
  </tr>
  <tr>
    <td>De 5 a 10, qual a sua nota para o Representante que realizou o credenciamento?<br />
<input type="text" name="nota" class="texto"  value="<?php echo $row["pesquisa_nota"]; ?>"/></td>
    <td>Alguma observa&ccedil;&atilde;o sobre o trabalho do mesmo?<br />
<textarea name="obs_gerente" class="textarea"><?php echo $row["pesquisa_obs_gerente"]; ?></textarea></td>
  </tr>
  <tr>
    <td>Voc&ecirc; indicaria a EDUCA GENESIS para alguma outra escola de inform&aacute;tica se credenciar:<br />
    <select name="indica">
    <option value="<?php echo $row["pesquisa_indica"]; ?>"><?php echo $row["pesquisa_indica"]; ?></option>
    <option value="sim">Sim</option>
    <option value="nao">Não</option>
    </select></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><input type="submit" name="enviar" value="Atualizar" /></td>
    <td><input type="button" name="fechar" value="Fechar" onclick="javascript:window.close();" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  
  </form>
  
  </table>

</body>
</html>