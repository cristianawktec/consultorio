<?php

/**
 * Created by PhpStorm.
 * User: bruno
 * Date: 12/28/15
 * Time: 4:27 PM
 */
class Tools extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pagamento_Model','pagamento');

    }



    public function message($to = 'World')
    {
        $dados = $this->db->query("SELECT * FROM cron")->result();
        foreach($dados as $send){
            $config = Array(
                'protocol' => 'smtp',
                'smtp_host' => 'smtp.clickconsultorio.com',
                'smtp_port' => 587,
                'smtp_user' => 'financeiro@clickconsultorio.com', // change it to yours
                'smtp_pass' => 'awkfin16', // change it to yours
                'mailtype' => 'html',
                'charset' => 'iso-8859-1',
                'wordwrap' => TRUE
            );

            $message = '';
            $this->load->library('email', $config);
            $this->email->set_newline("\r\n");
            $this->email->from($send->to); // change it to yours
            $this->email->to($send->to);// change it to yours
            $this->email->subject($send->subject);
            $this->email->message($send->message);
            if($this->email->send() && $send->send != "1")
            {
                $data['send']=1;
                $this->db->where('idcron', $send->idcron);
                $this->db->update('cron', $data);
                echo 'E-mail enviado.';
            }
            else
            {
                show_error($this->email->print_debugger());
            }
        }

    }
    /*
     * Function para realizar validação dos status de todos os pagamentos realizados.
     */
    public function analise_pagamentos(){
        $this->db->select('*');
        $this->db->from('pagamentos');
        $pagamentos =  $this->db->get()->result();
        foreach($pagamentos as $p){
            $this->pagamento->consultaPagamento($p->reference_transection);
        }
    }

    public function send_mail() {
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
        $mail->Subject = "Assunto"; //Assunto do e-mail.
        $mail->Body = "Corpo do e-mail em HTML.<br />";
        $mail->AltBody = "Corpo em texto puro.";
        $destino = "cristian@clickconsultorio.com";
        $mail->AddAddress($destino, "Nicholas Lopes Leite");

        /*Também é possível adicionar anexos.*/
        //$mail->AddAttachment("images/phpmailer.gif");
       // $mail->AddAttachment("images/phpmailer_mini.gif");

        if(!$mail->Send()) {
            $data["message"] = "ocorreu um erro durante o envio: " . $mail->ErrorInfo;
            echo $mail->ErrorInfo;die;
        } else {
            $data["message"] = "Mensagem enviada com sucesso!";
        }

    }

}