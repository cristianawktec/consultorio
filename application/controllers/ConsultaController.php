<?php

/**
 * Created by PhpStorm.
 * User: bruno
 * Date: 11/21/15
 * Time: 10:17 AM
 */
defined('BASEPATH') OR exit('No direct script access allowed');
class ConsultaController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Especialidade_Model', 'especializacao');
        $this->load->model('Medico_Model', 'medico');
        $this->load->model('Agenda_Model', 'agenda');
        $this->load->model('Endereco_Model', 'endereco');
        $this->load->model('Usuario_model', 'usuario');
        $this->load->model('Consulta_Model', 'consulta');
        $this->load->model('Paciente_Model', 'paciente');
        $this->load->model('AgendaConsulta_Model','agendaConsulta');
        $this->load->model('ConsultaHistorico_Model','historico');
        $this->load->model('Planos_Model','planos');
    }

    public function index()
    {
        $data['especializacoes'] = $this->especializacao->getAllEspecialidade();
        $this->load->view('layout_principal/top');
        $this->load->view('template_consulta/consulta', $data);
        $this->load->view('layout_principal/footer');
    }

    public function pesquisa()
    {
        $this->load->library('googlemaps');
        $especilidade = $this->input->get('especialidade');

        $cep = $this->input->get('cep');
        $data['especializacoes'] = $this->especializacao->getAllEspecialidade();
        $cont = $this->medico->searchMedico($cep, $especilidade);

        if(empty($cont)){
            $cont = 0;
        } else {
            $cont = $cont;
        }
        $data['contMedico'] = $cont;
        $data['medicos'] = $this->medico->searchMedico($cep, $especilidade);
        $data['notas'] = $this->medico->avaliacao();

        foreach($data['medicos'] as $enderecoGoogle){
            //echo $enderecoGoogle->nm_endereco;die;
            $endereco = $enderecoGoogle->nm_endereco.",".$enderecoGoogle->nr_endereco.",".$enderecoGoogle->nm_cidade.",".$enderecoGoogle->nr_cep;
            $config['center'] = $endereco;
            $marker = array();
            $marker['position'] = $endereco;
            $this->googlemaps->add_marker($marker);
        }

        $config['zoom'] = 'auto';
        $config['region'] = 'brazil';
        $config['places'] = TRUE;
        $this->googlemaps->initialize($config);

        $data['map'] = $this->googlemaps->create_map();

        $this->load->view('layout_principal/top');
        $this->load->view('template_consulta/resultado_consulta', $data);
        $this->load->view('layout_principal/footer');
    }

    public function marcar()
    {
        $agenda = $this->input->get('agenda');
        $doctor = $this->input->get('doctor');

        $data['endereco'] = $this->endereco->getEnderecoUsuarioById($doctor);
        $data['agenda'] = $this->agenda->getAgendaById($agenda);
        $data['medico'] = $this->medico->getMedicoById($doctor);
        if($this->session->logado){
            $id = $this->session->usuario->id_usuario;
            $data['paciente'] = $this->usuario->getUsuarioById($id);
            $data['endereços'] = $this->endereco->getEnderecoUsuarioById($id);
            $data['consultas'] = $this->usuario->getNumeroConsultas($doctor);
            $data['numPacientes'] = $this->usuario->getNumeroPacientes($doctor);
        }
        //echo"contrloler: <pre>";print_r($data);echo"</pre>";exit;
        $this->load->view('layout_principal/top');
        $this->load->view('template_consulta/marcar_consulta', $data);
        $this->load->view('layout_principal/footer');
    }

    public function agendarConsulta()
    {
        $data['id_medico'] = $this->input->post('id_medico');
        $data['id_paciente'] = $this->input->post('id_paciente');
        $data['nm_consulta'] = $this->input->post('nm_consulta');
        $date = explode('/', $this->input->post('data'));
        //echo"<pre>";print_r($date);echo"</pre>";die;
        $datadb = $date['2']."-".$date['1']."-".$date['0'];
        //$date = date_create_from_format('d/m/y', $date);
        //$date = strtotime(str_replace('/', '-', $date));
        $data['dt_consulta'] = $datadb;
        $data['hr_inicio'] = $this->input->post('horario');
        $data['ch_confirmacao'] = 3;

        $usuario['paciente']    = $this->paciente->getPacienteById($data['id_paciente']);

        $nome_paciente = $usuario['paciente'][0]->nm_paciente;
        $email_paciente = $usuario['paciente'][0]->email;
        $subject = 'Confirmação de Consulta - ClickConsultório';
        $message = 'Olá '. $nome_paciente.', sua consulta foi marcada com sucesso, aguarde a confirmação de seu médico! ';
        //$message = utf8_encode($messagem);
        //var_dump($data);die;

        $dados = array(
            'id_medico'=>$data['id_medico'],
            'id_paciente'=>$data['id_paciente']
        );

        if ($this->consulta->create_consult($data)) {
            $this->sendMailConfirmatio2($message,$subject,$email_paciente);
            $this->medico->medicoxpaciente($dados);
            return redirect('consulta/agendar/success');
        }
    }

    public function agendarConsultaSuccess()
    {
        $this->load->view('layout_principal/top');
        $this->load->view('template_consulta/consulta_sucesso');
        $this->load->view('layout_principal/footer');
    }

    public function confirmarConsulta()
    {
        $id_consulta = $this->input->post('id_consulta');
        $id_paciente = $this->input->post('id_paciente');
        $data['ch_confirmacao'] = 1;
        $data['dt_confirmacao'] = date('Y-m-d H:i:s', time());
        $usuario['paciente']    = $this->paciente->getPacienteById($id_paciente);

        $nome_paciente = $usuario['paciente'][0]->nm_paciente;
        $email_paciente = $usuario['paciente'][0]->email;
        $subject = 'Confirmação de Consulta - ClickConsultório';
        $message = 'Olá '. $nome_paciente.', Sua consulta foi confirmada! ';


        if($this->consulta->confirmConsult($id_consulta, $data)){
            if($this->agendaConsulta->addAgenda($id_consulta)) {

            }
            $this->sendMailConfirmatio($message,$subject,$email_paciente);
            return "Confirmado com sucesso!";
        } else {
            return "error!";
        }

    }

    public function sendMailConfirmatio($message,$subject,$email)
    {
        $this->load->library("my_phpmailer");
        $mail = new PHPMailer();
        $mail->IsSMTP(); //Definimos que usaremos o protocolo SMTP para envio.
        $mail->SMTPAuth = true; //Habilitamos a autenticação do SMTP. (true ou false)
        //$mail->SMTPSecure = "ssl"; //Estabelecemos qual protocolo de segurança será usado.
        $mail->Host = "smtp.clickconsultorio.com";//"smtp.awktec.com"; //Podemos usar o servidor do gMail para enviar.
        $mail->Port = 587; //Estabelecemos a porta utilizada pelo servidor do gMail.
        $mail->Username = "enviar@clickconsultorio.com"; //Usuário do gMail
        $mail->Password = "clickloca17";//"awktec2016"; //Senha do gMail
        $mail->SetFrom('contato@clickconsultorio.com', 'Webmaster Awk'); //Quem está enviando o e-mail.
        $mail->AddReplyTo("cristianms.awk@gmail.com","ClickConsultorio"); //Para que a resposta será enviada.
        $mail->Subject = utf8_decode($subject); //Assunto do e-mail.
        $mail->Body = $this->htmlEmail($message);
        $mail->AltBody = $message;
        $destino = $email;
        $mail->AddAddress($destino, "Paciente ClickConsultório");


        if(!$mail->Send()) {
            $data["message"] = "ocorreu um erro durante o envio: " . $mail->ErrorInfo;
            echo $mail->ErrorInfo;die;
        } else {
            $data["message"] = "Mensagem enviada com sucesso!";
        }

    }

    public function sendMailConfirmatio2($message,$subject,$email)
    {

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
        $mail->Body =  $this->htmlEmail($message);
        $mail->AltBody = $message;
        $destino = $email;
        $mail->AddAddress($destino, "Paciente ClickConsultório");

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

    public function changeDateConsult($id)
    {
        $data['consulta'] = $this->consulta->getConsultaById($id);
        $this->load->view('layout_principal/top');
        $this->load->view('template_consulta/consulta_mudar_data', $data);
        $this->load->view('layout_principal/footer');
    }

    /**
     * @param $id
     * @return string|void
     */
    public function updateDateConsult($id)
    {
        $id_paciente            = $this->input->post('id_paciente');
        $data['ch_confirmacao'] = 4;
        $data['dt_confirmacao'] = date('Y-m-d H:i:s', time());

        $data2 = explode('/', $this->input->post('dt_consulta'));
        $data['dt_consulta'] = $data2['2']."-".$data2['1']."-".$data2['0'];

        $usuario['paciente']    = $this->paciente->getPacienteById($id_paciente);
        $email_paciente         = $usuario['paciente'][0]->email;
        $nome_paciente          = $usuario['paciente'][0]->nm_paciente;
        $subject                = 'Mudança de Data de Consulta - ClickConsultório';
        $message                = 'Bom dia '. $nome_paciente.', a consulta para qual você marcou esta sendo mudada a data para o dia: '.$this->input->post('dt_consulta');

        if ($this->consulta->updateDateConsult($id, $data)) {
            $this->sendMailConfirmatio($message,$subject,$email_paciente);
            return redirect('medico/perfil');
        } else {
            return "error";
        }
    }

    public function updateDayConsult()
    {
        $id = $this->input->post('id');
        $data_inicio = explode('T', $this->input->post('data'));
        $data_inicio = $data_inicio[0] . " " . $data_inicio[1];

        $data_final = explode('T', $this->input->post('data2'));
        $data_final = $data_final[0] . " " . $data_final[1];

        $data['data_inicio'] = $data_inicio;
        $data['data_final'] = $data_final;

        $consulta = $this->consulta->getConsultaById($id);
        $usuario['paciente']    = $this->paciente->getPacienteById($consulta[0]->id_paciente);
        $email_paciente         = $usuario['paciente'][0]->email;
        $nome_paciente          = $usuario['paciente'][0]->nm_paciente;
        $subject                = 'Mudança de Data de Consulta - ClickConsultório';
        $message                = 'Bom dia '. $nome_paciente.', sua consulta foi remarca para: '.$this->input->post('data');
        $this->sendMailConfirmatio($message,$subject,$email_paciente);

        if ($this->agendaConsulta->updateDay($id, $data)) {
            return "Atualizado com sucesso";
        } else {
            return "error";
        }
    }

    public function editar($id)
    {
        $data['consulta'] = $this->agendaConsulta->getAgendaConsultById($id);
        $data['historicos'] = $this->historico->getHistoricoById($id);
        $this->load->view('layout_principal/top');
        $this->load->view('template_consulta/editar_consulta', $data);
        $this->load->view('layout_principal/footer');
    }

    public function updateDay()
    {
        $id = $this->input->post('id_consulta');
        $data['descricao'] = $this->input->post('descricao');
        $data['data_inicio'] = $this->input->post('data_inicio');
        $data['data_final'] = $this->input->post('data_final');

        if ($this->agendaConsulta->updateDay($id, $data)) {
            if ($this->input->post('obs')){
                $data2['id_consulta'] = $this->input->post('id_consulta');
                $data2['observacao']  = $this->input->post('obs');
                $data2['dt_cadastro'] = date('Y-m-d H:i:s', time());
                $this->db->insert('consulta_historico', $data2);
            }
            return redirect('medico/perfil');
        } else {
            return "error";
        }

    }

    public function historico_consulta_paciente($id_paciente)
    {
        $data['consultas'] = $this->consulta->getConsultaPacienteId($id_paciente);
        $this->load->view('layout_principal/top');
        $this->load->view('template_medico/meus_dados', $data);
        $this->load->view('layout_principal/footer');
    }

    public function consulta_paciente($id_paciente)
    {
        $data['consultas'] = $this->consulta->getConsultaPacienteId($id_paciente);
        $this->load->view('layout_principal/top');
        $this->load->view('template_consulta/paciente', $data);
        $this->load->view('layout_principal/footer');
    }

    /*
     * Estado de consultas
     * 1 = confirmado / 2 = Cancelado / 3 = Nova / 4 = Consulta Remarcada
     */

    public function cancelar_consulta($id_consulta, $id_paciente){
        if($this->consulta->updateStatus($id_consulta)){
            $this->session->set_flashdata('mesage', 'Consulta Cancelada com Sucesso!');

            if($this->session->usuario->id_perfil == 1) {
                $usuario['paciente']    = $this->paciente->getPacienteById($id_paciente);
                $email_paciente         = $usuario['paciente'][0]->email;
                $nome_paciente          = $usuario['paciente'][0]->nm_paciente;
                $subject                = 'Cancelamento de Consulta - ClickConsultório';
                $message                = 'Olá '. $nome_paciente.', você acabou de cancelar sua consulta com seu médico.';
                $this->sendMailConfirmatio($message,$subject,$email_paciente);
                return redirect('paciente/perfil');
            } else {
                $usuario['paciente']    = $this->paciente->getPacienteById($id_paciente);
                $email_paciente         = $usuario['paciente'][0]->email;
                $nome_paciente          = $usuario['paciente'][0]->nm_paciente;
                $subject                = 'Cancelamento de Consulta - ClickConsultório';
                $message                = 'Olá '. $nome_paciente.', sua consulta foi cancelada pelo Médico.';
                $this->sendMailConfirmatio($message,$subject,$email_paciente);
                return redirect('medico/perfil?profile=s');
            }
        } else {
            return "Não foi possivel cancelar a consulta!";
        }
    }

    public function htmlEmail($message)
    {
        $html = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	<!-- If you delete this meta tag, Half Life 3 will never be released. -->
	<meta name="viewport" content="width=device-width" />
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Click Consultório</title>
	<link rel="stylesheet" type="text/css" href="'.base_url('assets').'/css/email.css" />
	</head>
	<body bgcolor="#FFFFFF">
	<!-- HEADER -->
	<table class="head-wrap">
		<tr>
			<td></td>
			<td class="header container" >
					<div class="content">
					<table>
						<tr>
							<td><img src="http://clickconsultorio.com/assets/img/logo_trans.png" style="width: 110px; height: 60px;"/></td>
						</tr>
					</table>
					</div>
			</td>
			<td></td>
		</tr>
	</table><!-- /HEADER -->
	<!-- BODY -->
	<table class="body-wrap">
		<tr>
			<td></td>
			<td class="container" bgcolor="#FFFFFF">
				<div class="content">
				<table>
					<tr>
						<td>
							<h3>Olá,</h3>
							<p>'.$message.'</p>
							<!-- Callout Panel -->
							<p class="callout">
							    Para acessar sua área <a href="http://clickconsultorio.com/login">Clique aqui! &raquo;</a>
							</p><!-- /Callout Panel -->
							<!-- social & contact -->
							<table class="social" width="100%">
								<tr>
									<td>
										<!-- column 1 -->
										<table align="left" class="column">
											<tr>
												<td>
													<h5 class="">Siga-nos:</h5>
													<p class=""><a href="https://www.facebook.com/ClickConsult%C3%B3rio-457104751143587/?fref=ts" class="fa fa-facebook">Facebook</a> <a href="https://clickconsultorio.blogspot.com" class="fa fa-rss-square fa-5x">Blogger</a> <a href="skype://clickconsultorio?chat" class="fa fa-skype">Skype</a></p>
												</td>
											</tr>
										</table><!-- /column 1 -->
										<!-- column 2 -->
										<table align="left" class="column">
											<tr>
												<td>
													<h5 class="">Entre em contato:</h5>
	                Email: <strong><a href="emailto:contato@clickconsultorio.com">contato@clickconsultorio.com</a></strong></p>
												</td>
											</tr>
										</table><!-- /column 2 -->
										<span class="clear"></span>
									</td>
								</tr>
							</table><!-- /social & contact -->
						</td>
					</tr>
				</table>
				</div><!-- /content -->
			</td>
			<td></td>
		</tr>
	</table><!-- /BODY -->
	<!-- FOOTER -->
	<table class="footer-wrap">
		<tr>
			<td></td>
			<td class="container">
					<!-- content -->
					<div class="content">
					<table>
					<tr>
						<td align="center">
							<p>
								<a href="#">Terms</a> |
								<a href="#">Privacy</a> |
								<a href="#"><unsubscribe>Unsubscribe</unsubscribe></a>
							</p>
						</td>
					</tr>
				</table>
					</div><!-- /content -->
			</td>
			<td></td>
		</tr>
	</table><!-- /FOOTER -->
	</body>
	</html>';
        return $html;
    }

    public function limitarConsulta($id)
    {   //echo"<br>id: ".$id;exit;
        $dados = $this->usuario->getMedicoById($id);
        $dado = $dados['0'];
        $email = $dado->email;//email do medico
        $medico = $dado->nm_login;

        $subject = 'Limite de Consultas excedido neste mês!';
        $message = 'Bom dia, '. $medico.', seu Limite de Consultas foi Excedido! ';
        //$message = utf8_encode($messagem);

        $this->load->library("my_phpmailer");
        $mail = new PHPMailer();
        $mail->IsSMTP(); //Definimos que usaremos o protocolo SMTP para envio.
        $mail->SMTPAuth = true; //Habilitamos a autenticação do SMTP. (true ou false)
        //$mail->SMTPSecure = "ssl"; //Estabelecemos qual protocolo de segurança será usado.
        $mail->Host = "smtp.clickconsultorio.com";//"smtp.awktec.com"; //Podemos usar o servidor do gMail para enviar.
        $mail->Port = 587; //Estabelecemos a porta utilizada pelo servidor do gMail.
        $mail->Username = "enviar@clickconsultorio.com"; //Usuário do gMail
        $mail->Password = "clickloca17";//"clickloca17"; //Senha do gMail
        $mail->SetFrom('contato@clickconsultorio.com', 'Webmaster ClickConsultorio'); //Quem está enviando o e-mail.
        $mail->AddReplyTo("contato@clickconsultorio.com","Limite Consultas Excedido"); //Para que a resposta será enviada.
        $mail->Subject = utf8_decode($subject); //Assunto do e-mail.
        $mail->Body = $this->htmlEmailLimiteConsulta($message);
        $mail->AltBody = $message;
        $destino = $email;
        $mail->AddAddress($destino, "Paciente ClickConsultorio");

        if(!$mail->Send()) {
            $data["message"] = "ocorreu um erro durante o envio: " . $mail->ErrorInfo;
            echo $mail->ErrorInfo;die;
        } else {
            $data["message"] = "Mensagem enviada com sucesso!";
        }
        return redirect('/login');
    }

    public function htmlEmailLimiteConsulta($message)
    {
        $html = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	<!-- If you delete this meta tag, Half Life 3 will never be released. -->
	<meta name="viewport" content="width=device-width" />
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Click Consultório</title>
	<link rel="stylesheet" type="text/css" href="'.base_url('assets').'/css/email.css" />
	</head>
	<body bgcolor="#FFFFFF">
	<!-- HEADER -->
	<table class="head-wrap">
		<tr>
			<td></td>
			<td class="header container" >
					<div class="content">
					<table>
						<tr>
							<td><img src="http://clickconsultorio.com/assets/img/logo_trans.png" style="width: 110px; height: 60px;"/></td>
						</tr>
					</table>
					</div>
			</td>
			<td></td>
		</tr>
	</table><!-- /HEADER -->
	<!-- BODY -->
	<table class="body-wrap">
		<tr>
			<td></td>
			<td class="container" bgcolor="#FFFFFF">
				<div class="content">
				<table>
					<tr>
						<td>
							<h3>Bom dia,</h3>
							<p>'.$message.'</p>
							<!-- Callout Panel -->
							<p class="callout">
							    Para acessar o seu perfil <a href="http://clickconsultorio.com/login">Clique aqui! </a>
							</p><!-- /Callout Panel -->
							<!-- social & contact -->
							<table class="social" width="100%">
								<tr>
									<td>
										<!-- column 1 -->
										<table align="left" class="column">
											<tr>
												<td>
													<h5 class="">Siga-nos:</h5>
													<p class=""><a href="https://www.facebook.com/ClickConsult%C3%B3rio-457104751143587/?fref=ts" class="fa fa-facebook">Facebook</a> <a href="https://clickconsultorio.blogspot.com" class="fa fa-rss-square fa-5x">Blogger</a> <a href="skype://clickconsultorio?chat" class="fa fa-skype">Skype</a></p>
												</td>
											</tr>
										</table><!-- /column 1 -->
										<!-- column 2 -->
										<table align="left" class="column">
											<tr>
												<td>
													<h5 class="">Entre em contato:</h5>
	                Email: <strong><a href="emailto:contato@clickconsultorio.com">contato@clickconsultorio.com</a></strong></p>
												</td>
											</tr>
										</table><!-- /column 2 -->
										<span class="clear"></span>
									</td>
								</tr>
							</table><!-- /social & contact -->
						</td>
					</tr>
				</table>
				</div><!-- /content -->
			</td>
			<td></td>
		</tr>
	</table><!-- /BODY -->
	<!-- FOOTER -->
	<table class="footer-wrap">
		<tr>
			<td></td>
			<td class="container">
					<!-- content -->
					<div class="content">
					<table>
					<tr>
						<td align="center">
							<p>
								<a href="#">Terms</a> |
								<a href="#">Privacy</a> |
								<a href="#"><unsubscribe>Unsubscribe</unsubscribe></a>
							</p>
						</td>
					</tr>
				</table>
					</div><!-- /content -->
			</td>
			<td></td>
		</tr>
	</table><!-- /FOOTER -->
	</body>
	</html>';
        return $html;
    }

}