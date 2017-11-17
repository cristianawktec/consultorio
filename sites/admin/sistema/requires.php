<?PHP
header('Content-Type: text/html; charset=utf-8');
    require ('configuracoes.php');
    require ('sessao.php');
    if (USAR_BD) require ('conexao.php');
    require ('classes.php');
?>