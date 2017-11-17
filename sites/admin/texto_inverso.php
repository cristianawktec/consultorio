<?

$texto = $_POST['txt_texto'];
for($i=strlen($texto); $i>-1; $i--) echo $texto[$i];
echo "<br>";

?>

<form name="form1" method="post">
<input type="text" name="txt_texto" size="100"><br>
<input type="submit" name="tbn_inverter" value="Inverter">
</form>
