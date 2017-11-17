<?php
/**
 * Created by PhpStorm.
 * User: cristian
 * Date: 15/04/16
 * Time: 12:07
 */

include("../config/default.php");

echo"<br> Cidade: <pre>";print_r($_GET);echo"</pre><br>";die;
    $mod="cidades";
    $estado = $_GET['cod_estados'];
    echo select($estado,$mod);
