<?php 

include("conexao.php");

$id = $_GET["id"];




$query = mysql_query("SELECT * FROM usuarios_arquivos");

$query3 = mysql_query("SELECT * FROM usuarios_arquivos where usuarios_arquivos_id = '$id'");
$row3 = mysql_fetch_array($query3);
  if($row3["usuarios_arquivos_nivel"] == '1'){
	  $nivel2 = "Administrador";
  }elseif($row3["usuarios_arquivos_nivel"] == '0'){
	  $nivel2 = "Usuário";
	  
  }


$setor_id = $row3["usuarios_arquivos_visualiza"]; 



$query2 = mysql_query("SELECT * FROM setores_arquivos");

$query4 = mysql_query("SELECT * FROM setores_arquivos where setor_arquivo_id = '$setor_id'");
$row4 = mysql_fetch_array($query4);

if($_GET["action"] == "edit"){
	
	$usuario = $_POST["usuario"];
	$senha = $_POST["senha"];
	$nivel1 = $_POST["nivel"];
	
	$visualiza = $_POST["visualiza"];
	
	mysql_query("UPDATE usuarios_arquivos SET usuarios_arquivos_login = '$usuario', usuarios_arquivos_senha = '$senha', usuarios_arquivos_nivel = '$nivel1', usuarios_arquivos_visualiza = '$visualiza' where usuarios_arquivos_id = '$id'") or die(mysql_error());
	
	echo "<script>alert('Usuário alterado com sucesso');
	window.location.href='usuarios.php';
	</script>";
	
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Gerenciar usuarios</title>
</head>

<body>



<table align="center" bordercolor="#999999" border="1" style="font-family: arial; font-size: 12px; border: 1px solid #000; color: #00a3ea;">
<form name="usuarios" id="usuarios" action="<?php $_SERVER['PHP_SELF']; ?>?action=edit&id=<?php echo $id; ?>" method="POST">
  <tr>
    <td colspan="2" align="center"><a href="index.php"><button type="button">VOLTAR</button></a></td>
  </tr>
  <tr>
    <td colspan="2"><strong>Usu&aacute;rio</strong><br />
		<input type="text" name="usuario" value="<?php echo $row3["usuarios_arquivos_login"]; ?>" style="border: 1px solid #CCC;" />
</td>
  </tr>
  <tr>
    <td colspan="2"><strong>Senha</strong><br />
<input type="password" name="senha" value="<?php echo $row3["usuarios_arquivos_senha"]; ?>" style="border: 1px solid #CCC;"/></td>
  </tr>
  <tr>
    <td colspan="2"><strong>Nivel</strong><br />
    <select name="nivel">
    	<option value="<?php echo $row3["usuarios_arquivos_nivel"]; ?>"><?php echo $nivel2; ?></option>
    	<option value="0">Usuário</option>
    	<option value="1">Administrador</option>
    </select>
</td>
  </tr>
  <tr>
    <td colspan="2"><strong>Pode Visualizar</strong><br />
    <select name="visualiza">
    <option value="<?php echo $row4["setor_arquivo_id"]; ?>"><?php echo $row4["setor_arquivo_nome"]; ?></option>
    <?php while($row2 = mysql_fetch_array($query2)){ ?>
   
 		<option value="<?php echo $row2["setor_arquivo_id"]; ?>"><?php echo $row2["setor_arquivo_nome"]; ?></option>
    <?php } ?>
    </select>
    </td>
  </tr>
  <tr>
    <td colspan="2" align="center"><input type="submit" value="Salvar" /></td>
  </tr>
  </form>
    <tr style="background-color: #00a3ea; color: #FFF;">
    <td colspan="2" align="center"><strong>USUÁRIOS CADASTRADOS</strong></td>
  </tr>


  <tr>
    <td align="center"><strong>Usu&aacute;rio</strong></td>
    <td align="center"><strong>N&iacute;vel</strong></td>
  </tr>
    <?php while($row = mysql_fetch_array($query)){  
  
  if($row["usuarios_arquivos_nivel"] == '1'){
	  $nivel = "Administrador";
  }elseif($row["usuarios_arquivos_nivel"] == '0'){
	  $nivel = "Usuário";
	  
  }
  
  ?>
  <tr>
    <td align="center"><a href="edita_user.php?id=<?php echo $row["usuarios_arquivos_id"]; ?> "><?php echo $row["usuarios_arquivos_login"]; ?></a></td>
    <td align="center"><?php echo $nivel; ?></td>
      
     <td><a href="remover_user.php?id=<?php echo $row["usuarios_arquivos_id"]; ?>"><img src="images/remove-icon.png" border="0" /></a></td>
  </tr>
  <?php } ?>
</table>


</body>
</html>