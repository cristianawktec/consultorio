<html>
<head>
<script language="Javascript">
function showDiv(div)
{
document.getElementById("plano1").className = "invisivel";
document.getElementById("plano2").className = "invisivel";
document.getElementById("plano3").className = "invisivel";

document.getElementById(div).className = "visivel";
}
</script>
<style>
.invisivel { display: none; }
.visivel { visibility: visible; }
</style>
</head>
<body>
<select id="combobox" name="combobox" onchange="showDiv(this.value);">
        <option value="plano1">plano 01</option>
        <option value="plano2">plano 02</option>
        <option value="plano3">plano 03</option>
</select>
<div id="plano1" class="invisivel">Opções para o PLANO 01</div>
<div id="plano2" class="invisivel">O plano 2 vai aqui</div>
<div id="plano3" class="invisivel">Se qeuiser um terceiro plano, este é o espaço</div>
</body>
</html>