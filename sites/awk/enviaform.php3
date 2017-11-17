<?php

	$nome = $_POST['nome'];
	$telefone = $_POST['telefone'];
	$email = $_POST['email'];
	$dominio = $_POST['dominio'];			
	$endereco = $_POST['endereco'];			
	$bairro = $_POST['bairro'];	
	$estado = $_POST['estado'];		
	$cep = $_POST['cep'];			
	$info = $_POST['info'];		
	$assunto = $_POST['assunto'];		

	if ( empty($nome) )
	{
		echo "<script>alert('Você não digitou NOME no formulário'); history.go(-1);</script>";
		exit;
	}
	
	if ( empty($telefone) )
	{
		echo "<script>alert('Você não digitou TELEFONE no formulário'); history.go(-1);</script>";
		exit;
	}		
	
	if ( empty($email) )
	{
		echo "<script>alert('Você não digitou E-MAIL no formulário'); history.go(-1);</script>";
		exit;
	}

	if ( empty($info) )
	{
		echo "<script>alert('Você não digitou INFO no formulário'); history.go(-1);</script>";
		exit;
	}

	$to = "cristian@awktec.com";
		
	$headers = "From: $email \n";
	$headers .= "X-Mailer: AWK Tecnologia\n";

	$hoje = date("Y-m-d"); 
	$hora = date("H:i:s");

	$subject = "[$hoje] Contatos para a AWK Tecnologia";

	$msg  = $hoje . " / " .$hora . "\n";
	$msg .= $nome . "\n";
	$msg .= $email . "\n";
	$msg .= $telefone . "\n";	
	$msg .= $endereco . "\n";
	$msg .= $assunto . "\n";	
	$msg .= $bairro . "\n";
	$msg .= $cep . '/' . $estado . "\n\n";		
	$msg .= $info . "\n";	

	//mail($to, $subject, $msg, $headers);
	mail($to, $subject, $msg, $headers);
		
	mail($email, $subject, $msg, $headers);

	header("location:http://www.awktec.com");
	exit;

?> 

