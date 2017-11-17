<?php

//echo"<br> lembretes...";
include("../crm/Connections/conexao.php");
$host="localhost"; // Host name
$username="root"; // Mysql username
$password=""; // Mysql password
$db_name="crm"; // Database name

$con = mysql_connect($host,$username,$password) or die(mysql_error());

mysql_select_db($db_name, $con) or die(mysql_error());

$query = mysql_query("SELECT * FROM lembretes");
$row = mysql_fetch_array($query);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="refresh" content="5;URL=lembretes.php">
<title>Lembretes</title>


<script>

function popUPadd(nome, url, settings){
    var  w, h, left, top
    w=screen.width
    h=screen.height
    left=(w-230)/2
    top=(h-200)/2
    settings+=", left="+left+", top="+top
    window.open(url, nome, settings)
}

</script>
<style type="text/css">
body{ background-color: #EEE;}
</style>
</head>

<body>

<table border="0" align="center" style="font-family:Arial, Helvetica, sans-serif; font-size: 12px; text-align: center; width: 400px; background-color:  #EEE; border: 1px solid #CCC; ">
  <tr>
      <td colspan="5">
          <a href="javascript:popUPadd('janelaUsuarios1', 'add_lembretes.php', 'width=300,height=300,toolbar=no,menubar=no,status=no,scrollbars=no,resizable=no')">Adicionar Lembrete</a>
      </td>
  </tr>
   <tr style="background-color: #666; color: #FFF;">
    <td>Data/Hora</td>
    <td>Lembrete</td>
    <td colspan="2">Ação</td>
  </tr>
  <?php
  //echo"<br><pre>rows2: ";print_r($rows);echo"</pre><br>";
  //while($row = mysql_fetch_array($query)){
  if($row!=""){
      $data = $row["lembrete_data"];
      $aux = explode('-', $data);
      $data1 = $aux[2]."/".$aux[1]."/".$aux[0];

      if (@$contacor % 2 == 1){
        $coratual = "#DDDDDD";
      }else{
        $coratual = "#EEEEEE";
      }
        @$contacor++;

      ?>
      <tr bgcolor="<?=$coratual?>">
        <td><?php echo $data1; ?> às <?php echo $row["lembrete_hora"]; ?>:<?php echo $row["lembrete_minuto"]; ?> hrs</td>
        <td><?php echo $row["lembrete_titulo"]; ?></td>
        <td><a href="edita_lembrete.php?id=<?php echo $row["lembrete_id"]; ?>">
                <img src="images/icon-edit.gif" width="14" border="0" /></a>
        </td>
            <td><a href="del_lembrete.php?id=<?php echo $row["lembrete_id"]; ?>">
                    <img src="images/icon_excluir.png" width="14" border="0"/></a>
            </td>
      </tr>
  <?php } ?>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
  </tr>
</table>
</body>
</html>