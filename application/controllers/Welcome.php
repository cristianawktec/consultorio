<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('layout_principal/top');
		$this->load->view('welcome_message');
		$this->load->view('layout_principal/footer');
	}

	public function planos()
	{
		$this->load->view('layout_principal/top');
		$this->load->view('planos');
		$this->load->view('layout_principal/footer');
	}

	public function contato()
	{
		//echo"<pre>";print_r($_POST);echo"</pre>";exit;
		$subject = 'Mensagem encaminhada pelo Contato do Site';
		//echo"<pre>";print_r($GLOBALS);echo"</pre>";die;
		$this->load->library("my_phpmailer");
		$mail = new PHPMailer();
		$mail->IsSMTP(); //Definimos que usaremos o protocolo SMTP para envio.
		$mail->SMTPAuth = true; //Habilitamos a autenticação do SMTP. (true ou false)
		//$mail->SMTPSecure = "ssl"; //Estabelecemos qual protocolo de segurança será usado.
		$mail->Host = "smtp.clickconsultorio.com";//"smtp.awktec.com"; //Podemos usar o servidor do gMail para enviar.
		$mail->Port = 587; //Estabelecemos a porta utilizada pelo servidor do gMail.
		$mail->Username = "enviar@clickconsultorio.com"; //Usuário do gMail
		$mail->Password = "clickloca17";//"awk123"; //Senha do gMail
		$nome = $this->input->post('nome'); //Quem está enviando o e-mail.
		$mail->SetFrom('contato@clickconsultorio.com',utf8_decode($nome));
		$mail->AddReplyTo($this->input->post('email')); //Para que a resposta será enviada.
		$mail->Subject = utf8_decode($subject); //Assunto do e-mail.

		//$mail->Body =  $this->htmlEmail($message);
		//$mail->AltBody = $message;

		$mensagem = $this->input->post('message');
		//$mail->Body = $this->input->post('message');
		//$mail->AltBody = $this->input->post('message');
		$mail->Body 	= utf8_decode($mensagem);utf8_decode($mensagem);
		$mail->AltBody  = utf8_decode($mensagem);

		//$destino = $email;
		$destino = "contato@clickconsultorio.com";
		$mail->AddAddress($destino, "Contato ClickConsultório");


		//$mail->SMTPSecure = "tls"; //Estabelecemos qual protocolo de segurança será usado.
		$this->session->set_flashdata('msg', '');
		if(!isset($_POST['check1'])){
			$this->session->set_flashdata('msg', 'Error! - Todos os campos devem ser preenchidos!');
			//header("Location: javascript:history.back(1)");
			return redirect('/#contact');
		}

		if(!$mail->Send()) {
			$data["message"] = "ocorreu um erro durante o envio: " . $mail->ErrorInfo;
			echo $mail->ErrorInfo;die;
		} else {
			$data["message"] = "Mensagem enviada com sucesso!";
		}
		return redirect('/');
	}
}
