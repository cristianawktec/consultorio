<?php


/**
 * Created by PhpStorm.
 * User: cristian
 * Date: 03/03/16
 * Time: 12:35
 */
##
# Classe de encriptação de dados com chave
# Estas funções impossibilitam o acesso aos texto sem a chave
##

class Seguranca
{
	function __construct() {}
	##
	# Codificação simples
	##
	function encriptar($texto, $chave)
	{
		$texto = str_split($texto, 1);
		$final = NULL;

		foreach($texto as $char)
		{
			$final .= sprintf("%03x", ord($char) + $chave);
		}

		return $final;
	}

	##
	# Decodificação simples
	##
	function decriptar($texto, $chave)
	{
		$final = NULL;
		$texto = str_split($texto, 3);
		foreach($texto as $char)
		{
			$final .= chr(hexdec($char) - $chave);
		}

		return $final;
	}

	##
	# Encontrar uma chave de acordo com um texto
	##
	function chave($texto)
	{
		$texto = str_split(md5($texto), 1);
		$sinal = 0;
		$soma = 0;
		foreach($texto as $char)
		{
			if($sinal)
			{
				$soma -= ord($char);
				$sinal = 0;
			}
			else
			{
				$soma += ord($char);
				$sinal = 1;
			}
		}
		if($soma < 0)
			$soma *= -1;

		return $soma;
	}
}

# Função responsável por conexão de Banco de Dados
function conexao() {
	$dbcon = mysql_connect("mysql01.clickconsultorio1.hospedagemdesites.ws","clickconsultor","clickloca17") // host, usuário bd, senha bd
	or die("Não foi possível conectar ao servidor msql: ".mysql_error()); // erro retornado no caso de erro de conexão

	mysql_select_db("clickconsultor", $dbcon) // banco de dados
	or die("Não foi possível selecionar o banco de dados desejado: ".mysql_error());  // erro retornado no caso de erro de conexão
}

conexao();


# Função responsável por proteção contra SQL INJECTION
function anti_injection($sql) {
	// remove palavras que contenham sintaxe sql
	$sql = preg_replace(sql_regcase("/(from|select|insert|delete|where|drop table|show tables|#|\*|--|\\\\)/"),"",$sql);
	$sql = trim($sql);//limpa espaços vazio
	$sql = strip_tags($sql);//tira tags html e php
	$sql = addslashes($sql);//Adiciona barras invertidas a uma string
	return $sql;
}

#$sysconfig = mysql_fetch_array(mysql_query("SELECT * FROM sysconfig"));
?>