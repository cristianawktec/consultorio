<?php
/**
 * Created by PhpStorm.
 * User: cristian
 * Date: 03/03/16
 * Time: 12:43


//include("../config/conexao.php");
include("../config/default.php");

//echo"<br> Cadastra1: <pre>";print_r($_POST);echo"</pre><br>";die;

    $mod="prospectos";
    $_POST['data_cadastro'] = date("Y-m-d H:i:s");
    $_POST['fonte'] = "QueroUmSite";
    //$_POST['senha'] = Seguranca::encriptar($_POST['senha'],Seguranca::chave("infiniti"));

    insert($_POST,$mod);
 *
 * */

    //redirect('http://www.clickconsultorio.com/medico/registro');
    //header('Location: http://www.clickconsultorio.com/medico/registro');

echo "<meta HTTP-EQUIV='Refresh' CONTENT='0;URL=http://www.clickconsultorio.com/medico/registro'>";
