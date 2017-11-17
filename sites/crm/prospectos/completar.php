<?
include "conexao.php";

$q=strtolower ($_GET["q"]);

$sql = "SELECT * FROM lista_cargos WHERE nom_lista like '%" . $q . "%'";

$query = mysql_query($sql);// or die ("Erro". mysql_query());

while($reg=mysql_fetch_array($query)){

	//if (srtpos(strtolower($reg['nom_lista']),$q !== false){
		echo $reg["nom_lista"]."|".$reg["nom_lista"]."\n";
//	}
}
?>