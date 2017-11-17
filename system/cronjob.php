<?php
/**
 * Created by PhpStorm.
 * User: bruno
 * Date: 1/1/16
 * Time: 12:55 PM
 */

$conecta = mysql_connect("mysql.euportal.com.br", "euportal14", "consultorio") or print (mysql_error());
mysql_select_db("euportal14", $conecta) or print(mysql_error());
print "Conexão e Seleção OK!";

message();

function message()
{
    $query = mysql_query("SELECT * FROM cron WHERE send != '1' ");

    while($dados = mysql_fetch_array($query)){
        $headers = "MIME-Version: 1.1\r\n";
        $headers .= "Content-type: text/plain; charset=iso-8859-1\r\n";
        $headers .= "From: webmaster@doctor.com\r\n"; // remetente
        //$headers .= "Return-Path: eu@seudominio.com\r\n"; // return-path
        $envio = mail($dados['to'], $dados['subject'], $dados['message'], $headers);

        if($envio) {
            echo "Mensagem enviada com sucesso";
        } else {
            echo "A mensagem não pode ser enviada";
        }
    }
}