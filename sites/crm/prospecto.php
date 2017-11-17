<?php 

$nome = $_POST["course"];

include_once('conexao.php');

$result = mysql_query("SELECT * FROM prospectos where prospecto_nome = '$nome'");




mysql_close($con);


?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>CADASTRO DE NOVO PROSPECTO</title>





</head>

<body>
    <?php while($row = mysql_fetch_array($result))
  { 
  
  $id = $row['prospecto_id'];
  ?>  
Nome: <?php  echo $row['prospecto_nome']; ?><br />
E-mail: <?php  echo $row['prospecto_email']; ?><br />
Telefone: <?php  echo $row['prospecto_tel_fixo']; ?><br />
Celular: <?php  echo $row['prospecto_tel_cel']; ?><br />
Observação: <?php  echo $row['prospecto_obs']; ?><br />
Data de cadastro: <?php  echo $row['prospecto_data']; ?>

<br />


<a href="editar_prospecto.php?id=<?php echo $id; ?>"><input type="button" value="Editar" /></a><a href="index.php"><input type="button" value="Voltar" /></a>

<?php
  }
?>



</body>
</html>