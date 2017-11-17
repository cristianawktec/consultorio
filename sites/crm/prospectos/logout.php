<?php 

session_destroy();
unset($_SESSION['usuarioLogin']);
unset($_SESSION['usuarioSenha']);
unset($_POST["usuario"]);
unset($_POST["senha"]);
header("Location: login.php");


?>
