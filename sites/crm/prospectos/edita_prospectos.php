<?php 

$data_i = $_POST["data_inicial"];
$data_f = $_POST["data_final"];

$aux = explode('/',$data_i);
 
$data_i2 = $aux[2]."-".$aux[1]."-".$aux[0];

//secho $data_i2;




$aux2 = explode('/',$data_f);

 
$data_f2 = $aux2[2]."-".$aux2[1]."-".$aux2[0];

//echo $data_f2;


$con = mysql_connect("localhost","root","genesis2012");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("crm", $con);

$result = mysql_query("SELECT * FROM prospectos ORDER BY prospecto_id DESC");
$result1 = mysql_query("SELECT * FROM historico ORDER BY historico_prospecto_id DESC");
$row1 = mysql_fetch_array($result1);

//$busca = mysql_query("SELECT * FROM historico WHERE historico_data BETWEEN '$data_i2' AND '$data_f2' order by historico_data DESC");



//$row2 = mysql_fetch_array($busca);


if($data_i and $data_f != ""){
$busca2 = mysql_query("SELECT * FROM prospectos WHERE prospecto_historico_data BETWEEN '$data_i2' AND '$data_f2' ORDER BY prospecto_historico_data DESC");

}else{
$busca2 = mysql_query("SELECT * FROM prospectos ORDER BY prospecto_historico_data DESC");

}

mysql_close($con);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>LISTA DE PROSPECTOS</title>
<style type="text/css">

.texto {width: 200px; border: 1px solid #CCC; height: 15px; padding: 5px; min-height: 15px;}

textarea {width: 200px; border: 1px solid #CCC; height: 100px; padding: 5px; min-width: 200px; max-width: 200px; min-height:100px; }
body {background-color:#EEE;}
#topo {width:auto; height: 40px; background-color:#090; margin-top: -10px; margin-left: -10px; margin-right: -10px; margin-bottom: 50px; overflow:hidden;}
.form {border: 1px solid #CCC;}


td {padding: 0 10px 0 10px;}
</style>

<script type="text/javascript">
   function mascaraData(campodata_inicial){
              var data_inicial = campodata_inicial.value;
              if (data_inicial.length == 2){
                  data_inicial = data_inicial + '/';
                  document.forms[0].data_inicial.value = data_inicial;
      return true;              
              }
              if (data_inicial.length == 5){
                  data_inicial = data_inicial + '/';
                  document.forms[0].data_inicial.value = data_inicial;
                  return true;
              }
         }
</script>

<script type="text/javascript">
   function mascaraData1(campodata_final){
              var data_final = campodata_final.value;
              if (data_final.length == 2){
                  data_final = data_final + '/';
                  document.forms[0].data_final.value = data_final;
      return true;              
              }
              if (data_final.length == 5){
                  data_final = data_final + '/';
                  document.forms[0].data_final.value = data_final;
                  return true;
              }
         }
</script>

<script>
function popUP(nome, url, settings){
    var  w, h, left, top
    
    w=screen.width
    h=screen.height    
        
    left=(w-550)/2
    top=(h-250)/2
    
    settings+=", left="+left+", top="+top
    
	window.open(url, nome, settings)
}

</script>



</head>

<body>
<div id="topo"> </div>


  
	<table align="center" style="border: 1px solid #CCC; width:auto; font-family: Arial, Helvetica, sans-serif; font-size: 12px; ">
  <tr style="border: none; background-color:#EEE; text-align:center;">
    <td colspan="9"><a href="index.php"><input type="button" value="Voltar" /></a></td>
  </tr>
  <tr style="border: none; background-color:#CCC; text-align:center;">
    <td colspan="9">Filtrar Prospectos</td>
  </tr>
  <tr style="border: none;  text-align:center;">
    <td colspan="9"><form id="busca" name="busca" method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
Data Inicial<br />
<input type="text" name="data_inicial" OnKeyUp="mascaraData(this);" id="data_inicial" maxlength="10" class="form" /><br />
Data Final<br />
<input type="text" name="data_final" OnKeyUp="mascaraData1(this);" id="data_final" class="form" maxlength="10"/><br />
<input type="submit" name="buscar" value="Buscar" />


</form></td>
  </tr>
  <tr style="border: none; background-color:#CCC; text-align:center;">
    <td colspan="9">Resultado</td>
    </tr>
  <tr style="border: none; background-color:#CCC; text-align:center;">
    <td>Escola</td>
    <td>Responsável</td>
    <td>E-mail</td>
    <td>Telefone</td>
    <td>Celular</td>
    <td>Observa&ccedil;ao</td>
    <td>Origem</td>
    <td>Último Histórico</td>
    <td>Ação</td>

  </tr>
	<?php while($row3 = mysql_fetch_array($busca2))
  { if ($contacor % 2 == 1){
$coratual = "#DDDDDD";
}else{
$coratual = "#EEEEEE"; }
$contacor++;	
  
$data = $row3["prospecto_historico_data"];

$aux3 = explode('-',$data);
 
$data_i1 = $aux3[2]."/".$aux3[1]."/".$aux3[0];

//echo $data_i1." ".$row3["prospecto_ultimo_historico"]."<br>";
    
  $id = $row3['prospecto_id'];
  ?>  

  <tr  bgcolor="<?=$coratual?>" style="text-align:center;">
    <td><?php  echo $row3['prospecto_nome']; ?></td>
     <td><?php  echo $row3['prospecto_responsavel']; ?></td>
    <td><?php  echo $row3['prospecto_email']; ?></td>
    <td><?php  echo $row3['prospecto_tel_fixo']; ?></td>
    <td><?php  echo $row3['prospecto_tel_cel']; ?></td>
    <td><a href="javascript:popUP('minhaJanela1', 'historico.php?id=<?php echo $row3["prospecto_id"]; ?>', 'width=550,height=500,toolbar=no,menubar=no,status=no,scrollbars=no,resizable=yes')"><?php echo $row3['prospecto_ultimo_historico']; ?></a></td>
    <td><?php  echo $row3['prospecto_origem']; ?></td>
    <td><?php  echo $data_i1; ?></td>
    <td><img src="images/icone_sim.jpg" width="20" /><img src="images/icone_nao.jpg" width="20" /></td>
 
 
  </tr>

<?php
  }
?>

</table>
<div id="rodape" style="font-family:Arial, Helvetica, sans-serif; font-size: 9px; position: absolute; bottom: 0px; right: 10px; color:#666;"><tr>
      <td align="center"><i>GERENCIAMENTO DE RELACIONAMENTO COM O CLIENTE GENESIS [Versão 1.0]</i></td>
    </tr>
    
    </div>
</body>
</html>