<?php
/**
 * Created by PhpStorm.
 * User: cristian
 * Date: 29/12/15
 * Time: 11:41
 */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class ContatoLancamentoControler extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->helper('form');
    }

    public function index(){
        $dados_header = array(
            'titulo' => 'Lançamento - Fale Conosco',
            'descricao' => 'Fale conosco.',
            'palavras_chave' => 'Contato, fale conosco, atendimento'
        );
        $dados_cabecalho = array('titulo_h2' => 'Fale Conosco');
        $this->layout->region('html_header', 'view_html_header', $dados_header);
        $this->layout->region('cabecalho', 'view_cabecalho', $dados_cabecalho);
        $this->layout->region('corpo', 'contato');
        $this->layout->region('rodape', 'view_rodape');
        $this->layout->region('html_footer', 'view_html_footer');
        $this->layout->show('layout');
    }

    public function enviar(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nome', 'Nome', 'required');
        $this->form_validation->set_rules('email', 'E-mail', 'required|valid_email');
        $this->form_validation->set_rules('mensagem', 'Mensagem', 'required');
        if ($this->form_validation->run() == FALSE){
            $this->index();
        }
        else{

            $dados['nome'] = $this->input->post('nome');
            $dados['email'] = $this->input->post('email');
            $dados['mensagem'] = $this->input->post('mensagem');

            $mensagem = $this->load->view('mensagem',$dados,TRUE);

            $this->load->library('email');
            $this->email->from($this->input->post('email'), $this->input->post('nome'));
            $this->email->to('contato@clickconsultorio.com');
            //$this->email->cc('copia_para@meudominio.com.br');
            //$this->email->bcc('copia_oculta@meudominio.com.br');
            $this->email->subject('Mensagem encaminhada pelo Lançamento por:' . $this->input->post('nome'));
            $this->email->message($mensagem);
            if($this->email->send()){
                $this->sucesso();
            }
            else{
                $this->falha();
            }

        }
    }

    public function envia(){


        $nome    =$_POST['nome'];
        $email   =$_POST['email'];
        $perfil  =$_POST['perfil'];
        $message =$_POST['mensagem'];
        $destino ='contato@clickconsultorio.com';
        $subject = 'Mensagem encaminhada pelo Lançamento por:'.$nome.' / Perfil: '.$pefil.' / email: '.$email;

        $this->load->library("my_phpmailer");
        $mail = new PHPMailer();
        $mail->IsSMTP(); //Definimos que usaremos o protocolo SMTP para envio.
        $mail->SMTPAuth = true; //Habilitamos a autenticação do SMTP. (true ou false)
//$mail->SMTPSecure = "ssl"; //Estabelecemos qual protocolo de segurança será usado.
        $mail->Host = "smtp.clickconsultorio.com";//"smtp.awktec.com"; //Podemos usar o servidor do gMail para enviar.
        $mail->Port = 587; //Estabelecemos a porta utilizada pelo servidor do gMail.
        $mail->Username = "enviar@clickconsultorio.com"; //Usuário do gMail
        $mail->Password = "clickloca17";//"awk123"; //Senha do gMail
        $mail->SetFrom($email, $nome); //Quem está enviando o e-mail.
        $mail->AddReplyTo($email,$nome); //Para que a resposta será enviada.
        $mail->Subject = utf8_decode($subject); //Assunto do e-mail.
        $mail->Body = $message;
        $mail->AltBody = $message;
        $mail->AddAddress($destino, "Paciente Doctor");


        var_dump($mail);die;
        if(!$mail->Send()) {
            $data["message"] = "ocorreu um erro durante o envio: " . $mail->ErrorInfo;
            echo $mail->ErrorInfo;die;
        } else {
            $data["message"] = "Mensagem enviada com sucesso!";
        }
    }

    public function sucesso(){
        $dados_header = array(
            'titulo' => 'Doctor - Mensagem encaminhada com sucesso',
            'descricao' => 'Fale conosco.',
            'palavras_chave' => 'Contato, fale conosco, atendimento'
        );
        $dados_cabecalho = array('titulo_h2' => 'Fale Conosco');
        $dados_cabecalho['categorias'] = $this->categorias->listar_categorias();
        $this->layout->region('html_header', 'view_html_header', $dados_header);
        $this->layout->region('cabecalho', 'view_cabecalho', $dados_cabecalho);
        $this->layout->region('corpo', 'contato_sucesso');
        $this->layout->region('rodape', 'view_rodape');
        $this->layout->region('html_footer', 'view_html_footer');
        $this->layout->show('layout');
    }

    public function falha(){
        $dados_header = array(
            'titulo' => 'Doctor - Fale Conosco',
            'descricao' => 'Fale conosco.',
            'palavras_chave' => 'Contato, fale conosco, atendimento'
        );
        $dados_cabecalho = array('titulo_h2' => 'Fale Conosco');
        $dados_cabecalho['categorias'] = $this->categorias->listar_categorias();
        $this->layout->region('html_header', 'view_html_header', $dados_header);
        $this->layout->region('cabecalho', 'view_cabecalho', $dados_cabecalho);
        $this->layout->region('corpo', 'contato_falha');
        $this->layout->region('rodape', 'view_rodape');
        $this->layout->region('html_footer', 'view_html_footer');
        $this->layout->show('layout');
    }
}