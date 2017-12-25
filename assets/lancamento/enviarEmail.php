<?php
/**
 * Created by PhpStorm.
 * User: cristian
 * Date: 28/12/15
 * Time: 20:39
 *
 * */

/*
echo"<pre>";print_r($_POST);echo"</pre>";die;
Array
(
    [nome] => TesteLanc
    [email] => cristianms.awk@gmail.com
    [perfil] => paciente
    [mensagem] => asdf
)
*/
$nome    =$_POST['nome'];
$email   =$_POST['email'];
$perfil  =$_POST['perfil'];
$message =$_POST['mensagem'];
$destino ='contato@clickconsultorio.com';

$this->load->library("my_phpmailer");
$mail = new PHPMailer();
$mail->IsSMTP(); //Definimos que usaremos o protocolo SMTP para envio.
$mail->SMTPAuth = true; //Habilitamos a autenticação do SMTP. (true ou false)
//$mail->SMTPSecure = "ssl"; //Estabelecemos qual protocolo de segurança será usado.
$mail->Host = "smtp.clickconsultorio.com";//"smtp.awktec.com"; //Podemos usar o servidor do gMail para enviar.
$mail->Port = 587; //Estabelecemos a porta utilizada pelo servidor do gMail.
$mail->Username = "enviar@clickconsultorio.com"; //Usuário do gMail
$mail->Password = "clickloca17";//"awk123"; //Senha do gMail
$mail->SetFrom('contato@clickconsultorio.com', 'Webmaster Awk'); //Quem está enviando o e-mail.
$mail->AddReplyTo("cristianms.awk@gmail.com","ClickConsultorio"); //Para que a resposta será enviada.
$mail->Subject = utf8_decode($subject); //Assunto do e-mail.
$mail->Body = $message;
$mail->AltBody = $message;
$destino = $email;
$mail->AddAddress($destino, "Paciente Doctor");

/*Também é possível adicionar anexos.*/
//$mail->AddAttachment("images/phpmailer.gif");
// $mail->AddAttachment("images/phpmailer_mini.gif");

if(!$mail->Send()) {
    $data["message"] = "ocorreu um erro durante o envio: " . $mail->ErrorInfo;
    echo $mail->ErrorInfo;die;
} else {
    $data["message"] = "Mensagem enviada com sucesso!";
}