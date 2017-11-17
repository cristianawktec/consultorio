<?php
/**
 * Created by PhpStorm.
 * User: cristian
 * Date: 03/03/16
 * Time: 12:43
 */

/*
 * Baixando o ebook
 */
header('Content-type: application/pdf');
header('Content-disposition: attachment; filename=filename.pdf');
readfile("http://www.clickconsultorio.com/assets/docs/EBOOK%20CLICKCONSULTORIO.pdf");

//include("../config/conexao.php");
include("../config/default.php");

//echo"<br> Cadastra1: <pre>";print_r($_POST);echo"</pre><br>";die;

    $mod="prospectos";
    $_POST['data_cadastro'] = date("Y-m-d H:i:s");
    //$_POST['senha'] = Seguranca::encriptar($_POST['senha'],Seguranca::chave("infiniti"));

    insert($_POST,$mod);

