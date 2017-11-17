<?php
/**
 * Created by PhpStorm.
 * User: cristian
 * Date: 03/03/16
 * Time: 12:43
 */

include("./config/conexao.php");
include("./config/default.php");

echo"<br> Cadastra2: <pre>";print_r($_POST);echo"</pre><br>";die;
/*
Array
(
    [id_perfil] => 2
    [ch_ativo] => 0
    [ch_prospecto] => 1
    [acaoForm] => cadastra_prospect
    [nm_medico] => Dr. Awk
    [email] => cristianms.awk@gmail.com
)
 */

if(trim($_POST['acaoForm'])=="cadastra_prospect") {
    $mod="medicos";
    $_POST['data'] = date("Y-m-d H:i:s");
    //$_POST['senha'] = Seguranca::encriptar($_POST['senha'],Seguranca::chave("infiniti"));

    insert($_POST,$mod);

}