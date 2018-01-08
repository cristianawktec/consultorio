<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: bruno
 * Date: 10/31/15
 * Time: 11:42 AM
 */
class Usuario extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Endereco_Model', 'endereco');
        $this->load->model('Usuario_model', 'usuario');
        $this->load->model('Paciente_Model', 'paciente');
        $this->load->model('Medico_Model', 'medico');
        $this->load->model('Pagamento_Model', 'pagamento');
        $this->load->library('email');
        $this->load->library('pagseguro');
    }

    public function sendMailConfirmatio($email, $name, $login, $senha)
    {
        $subject = 'Confirmação de Cadastro - Click Consultório';
        $message = nl2br("Bem vindo " . $name . " ao Click Consultório! \n Seus dados de acesso: \n Login: " . $login . "\n Senha: " . $senha);

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
        $mail->AddReplyTo("contato@clickconsultorio.com","ClickConsultorio"); //Para que a resposta será enviada.
        $mail->addBCC("contato@clickconsultorio.com","Cadastro de Usuarios");//Copia Oculta de registro de paciente no sistema
        $mail->Subject = utf8_decode($subject); //Assunto do e-mail.
        $mail->Body = $this->htmlEmail($name, $login, $senha);
        $mail->AltBody = $message;
        $destino = $email;
        $mail->AddAddress($destino, "Paciente ClickConsultorio");



        if (!$mail->Send()) {
            $data["message"] = "ocorreu um erro durante o envio: " . $mail->ErrorInfo;
            echo $mail->ErrorInfo;
            die;
        } else {
            $data["message"] = "Mensagem enviada com sucesso!";
        }


    }

    public function htmlEmail($name, $login, $senha)
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
							<td><img src="http://clickconsultorio.com/assets/img/logo_trans.png" style="width: 55%; height: 55%"/></td>
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
							<h3>Olá, '.$name.'</h3>
							<p>Cadastro realizado com sucesso! <br /> Seu login de acesso é: '.$login.' <br /> Sua Senha de acesso é: '.$senha.' </p>
							<p>Bem-vindo ao CLickConsultório</p>
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
													<p class=""><a href="#" class="soc-btn fb">Facebook</a> <a href="#" class="soc-btn tw">Twitter</a> <a href="#" class="soc-btn gp">Google+</a></p>
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

    public function registroPaciente()
    {
        $this->load->view('layout_principal/top');
        $this->load->view("template_paciente/paciente_registro.php");
        $this->load->view('layout_principal/footer');
    }

    public function buscaCep()
    {
        $cep = $this->input->post('cep');

        $reg = simplexml_load_file("http://cep.republicavirtual.com.br/web_cep.php?formato=xml&cep=" . $cep);
        $dados['sucesso'] = (string)$reg->resultado;
        $dados['rua'] = (string)$reg->tipo_logradouro . ' ' . $reg->logradouro;
        $dados['bairro'] = (string)$reg->bairro;
        $dados['cidade'] = (string)$reg->cidade;
        $dados['estado'] = (string)$reg->uf;

        echo json_encode($dados);
    }

    public function registroPacienteAdd()
    {
        $dadosEndereco['nm_endereco'] = $this->input->post('nm_endereco');
        $dadosEndereco['nr_endereco'] = $this->input->post('nr_endereco');
        $dadosEndereco['nr_cep'] = $this->input->post('nr_cep');
        $dadosEndereco['nm_bairro'] = $this->input->post('nm_bairro');
        $dadosEndereco['nm_cidade'] = $this->input->post('nm_cidade');
        $dadosEndereco['nm_estado'] = $this->input->post('nm_estado');
        $dadosEndereco['ds_observacao'] = $this->input->post('ds_observacao');

        if ($this->endereco->adicionar($dadosEndereco)) {
            $endereco = $this->endereco->getLastEndereco();
        } else {
            return "Error";
        }

        $dadosUsuario['nm_login'] = $this->input->post('nm_login');
        $dadosUsuario['nm_login_hash'] = md5($this->input->post('nm_login'));
        $dadosUsuario['ps_login'] = md5($this->input->post('ps_login'));
        $dadosUsuario['ps_login_hash'] = $dadosUsuario['ps_login'];
        $dadosUsuario['id_endereco'] = $endereco[0]->id_endereco;
        $dadosUsuario['id_perfil'] = $this->input->post('id_perfil');
        $dadosUsuario['email'] = $this->input->post('email');
        $dadosUsuario['data_cadastro'] = date('d/m/Y H:i:s', time());

        if ($this->usuario->adicionar($dadosUsuario)) {
            $usuario = $this->usuario->getLastUsuario();
        } else {
            return "Error";
            die;
        }

        $dadosPaciente['id_usuario'] = $usuario[0]->id_usuario;
        $dadosPaciente['nm_paciente'] = $this->input->post('nm_paciente');
        $dadosPaciente['ch_sexo'] = $this->input->post('ch_sexo');
        $dadosPaciente['ds_estado_civil'] = $this->input->post('ds_estado_civil');
        //$dadosPaciente['nr_cpf'] = $this->input->post('nr_cpf');
        //$dadosPaciente['nr_rg'] = $this->input->post('nr_rg');
        $dataNacimento = explode('/', $this->input->post('dt_nascimento'));
        $dataNacimento = $dataNacimento[2] . "-" . $dataNacimento[1] . "-" . $dataNacimento[0];
        $dadosPaciente['dt_nascimento'] = $dataNacimento;
        $dadosPaciente['nm_pai'] = $this->input->post('nm_pai');
        $dadosPaciente['nm_mae'] = $this->input->post('nm_mae');

        $email = $dadosUsuario['email'];
        $name = $dadosPaciente['nm_paciente'];
        if ($this->paciente->adicionar($dadosPaciente)) {
            $this->sendMailConfirmatio($email, $name, $this->input->post('nm_login'), $this->input->post('ps_login'));
            return redirect('/');
        } else {
            return "Error";
        }

    }

    public function registroMedico()
    {
        //echo"<br>registro medico: <pre>";print_r($_POST);echo"</pre>";exit;
        $data['especializacoes'] = $this->db->get('especializacao')->result();
        $this->load->view('layout_principal/top');
        $this->load->view("template_medico/medico_registro.php", $data);
        $this->load->view('layout_principal/footer');
    }

    public function registroMedicoPlanos()
    {
        $data['planos'] = $this->db->get('planos')->result();
        $this->load->view('layout_principal/top');
        $this->load->view("template_medico/medico_registro.php", $data);
        $this->load->view('layout_principal/footer');
    }

    /**
     * @return string|void
     */
    public function registroMedicoAdd()
    {
        //se entrou pela promoção do template entra aqui e faz o cadastro em prospectos
        if ($this->input->post('template')!="") {

            $_POST['data_cadastro'] = date("Y-m-d H:i:s");
            $dadosProspectos['data_cadastro'] = $_POST['data_cadastro'];
            $dadosProspectos['nome'] = $_POST['nm_medico'];
            $dadosProspectos['email'] = $_POST['email'];
            $dadosProspectos['id_perfil'] = $_POST['id_perfil'];
            $dadosProspectos['template'] = $_POST['template'];
            $dadosProspectos['fonte'] = "QueroUmSite";
            $estado = $this->input->post('nm_estado');
            $cidade = $this->input->post('nm_cidade');

            $cd_estado = $this->db->query("SELECT cod_estados as cod FROM estados WHERE sigla='$estado'")->result();
            foreach($cd_estado as $result){
                $codEstado = $result->cod;
            }
            $cd_cidade = $this->db->query("SELECT cod_cidades as cod FROM cidades WHERE nome='$cidade'")->result();
            foreach($cd_cidade as $result){
                $codCidade = $result->cod;
            }

            //echo"<pre>";print_r($cd_estado['0']);echo"</pre>";//die;

            $dadosProspectos['cod_estados'] = $codEstado;
            $dadosProspectos['cod_cidades'] = $codCidade;

            //echo"<pre>";print_r($dadosProspectos);echo"</pre>";die;

            $this->db->insert('prospectos', $dadosProspectos);
        }

        $dadosEndereco['nm_endereco'] = $this->input->post('nm_endereco');
        $dadosEndereco['nr_endereco'] = $this->input->post('nr_endereco');
        $dadosEndereco['nr_cep'] = $this->input->post('nr_cep');
        $dadosEndereco['nm_bairro'] = $this->input->post('nm_bairro');
        $dadosEndereco['nm_cidade'] = $this->input->post('nm_cidade');
        $dadosEndereco['nm_estado'] = $this->input->post('nm_estado');
        $dadosEndereco['ds_observacao'] = $this->input->post('ds_observacao');
        //$dadosEndereco['pagina_web'] = $this->input->post('pagina_web');

        if ($this->endereco->adicionar($dadosEndereco)) {
            $endereco = $this->endereco->getLastEndereco();
        } else {
            return "Error";
        }

        $dadosUsuario['nm_login'] = $this->input->post('nm_login');
        $dadosUsuario['nm_login_hash'] = md5($this->input->post('nm_login'));
        $dadosUsuario['ps_login'] = md5($this->input->post('ps_login'));
        $dadosUsuario['ps_login_hash'] = $dadosUsuario['ps_login'];
        $dadosUsuario['id_endereco'] = $endereco[0]->id_endereco;
        $dadosUsuario['id_perfil'] = $this->input->post('id_perfil');
        $dadosUsuario['email'] = $this->input->post('email');
        $dadosUsuario['data_cadastro'] = date('d/m/Y H:i:s', time());

        if ($this->usuario->adicionar($dadosUsuario)) {
            $usuario = $this->usuario->getLastUsuario();
        } else {
            return "Error";
            die;
        }

        $dadosMedico['id_usuario'] = $usuario[0]->id_usuario;
        $dadosMedico['nm_medico'] = $this->input->post('nm_medico');
        $dadosMedico['ch_sexo'] = $this->input->post('ch_sexo');

        //$dadosMedico['nr_cpf'] = $this->input->post('nr_cpf');
        //$dadosMedico['nr_rg'] = $this->input->post('nr_rg');

        $dadosMedico['nm_conselho'] = $this->input->post('nm_conselho');
        $dadosMedico['nr_conselho'] = $this->input->post('nr_conselho');
        $dadosMedico['nr_cnes'] = $this->input->post('nr_cnes');
        $dadosMedico['ds_observacao'] = "";
        $dadosMedico['nr_cnes'] = $this->input->post('nr_cnes');
        $dadosMedico['ch_ativo'] = $this->input->post('ch_ativo');
        $dadosMedicoEspecializacao['id_especializacao'] = $this->input->post('id_especializacao');

        $name = $dadosMedico['nm_medico'];
        $email = $dadosUsuario['email'];
        if ($this->medico->adicionar($dadosMedico)) {
            $medico = $this->medico->getLastMedico();
            $dadosMedicoEspecializacao['id_medico'] = $medico[0]->id_usuario;
            $dadosMedicoEspecializacao['id_especializacao'] = $dadosMedicoEspecializacao['id_especializacao'];
            $this->db->insert('medicos_especializacao', $dadosMedicoEspecializacao);

            $this->sendMailConfirmatio($email, $name, $this->input->post('nm_login'), $this->input->post('ps_login'));
            $reference = rand(999, 9999);
            if ($this->pagamento->add($usuario[0]->id_usuario, $reference)) {//validar o plano
                //definicao do valor do boleto
                return redirect('https://www.moip.com.br/PagamentoMoIP.do?id_carteira=cristian@awktec.com&valor=3490&nome=Cristian Marques Santos&descricao=cadastro&id_transacao='.$reference);
                //return redirect('https://www.moip.com.br/PagamentoMoIP.do?id_carteira=cristianms.awk@gmail.com&valor=490&nome=Cristian Marques Santos&descricao=cadastro&id_transacao='.$reference);
            }
            //$this->checkout($dadosMedico);
        } else {
            return "Error";
        }
    }


    public function update_pass($id)
    {
        $data['id'] = $id;
        $this->load->view('layout_principal/top');
        $this->load->view("template_paciente/update_senha.php", $data);
        $this->load->view('layout_principal/footer');
    }

    public function update_pass2($id)
    {
        $data['id'] = $id;
        $this->load->view('layout_principal/top');
        $this->load->view("template_medico/update_senha.php", $data);
        $this->load->view('layout_principal/footer');
    }

    public function update_password($id)
    {
        $ps_login = $this->input->post('ps_login');
        if ($this->usuario->update_password($id, $ps_login)) {
            return redirect('/paciente/perfil');
        } else {
            return "error";
        }
    }

    public function update_address($id)
    {
        $data['endereco'] = $this->endereco->getEnderecoById($id);
        $this->load->view('layout_principal/top');
        $this->load->view("template_paciente/update_address", $data);
        $this->load->view('layout_principal/footer');
    }

    public function update_addressM($id)
    {
        $data['endereco'] = $this->endereco->getEnderecoById($id);
        $this->load->view('layout_principal/top');
        $this->load->view("template_medico/update_address", $data);
        $this->load->view('layout_principal/footer');
    }

    public function update_addresses($id)
    {
        if ($id) {
            $this->db->where('id_endereco', $id);
            $this->db->update('enderecos', $this->input->post());
            if ($this->session->usuario->id_perfil == 2) {
                return redirect('/medico/perfil');
            } else {
                return redirect('/paciente/perfil');
            }
        } else {
            return "error";
        }
    }

    public function updated_doctor($id)
    {
        $data['medico'] = $this->medico->getMedicoById($id);
        $this->load->view('layout_principal/top');
        $this->load->view("template_medico/editar_dados", $data);
        $this->load->view('layout_principal/footer');
    }

    public function update_doctor($id)
    {

        if ($this->medico->update($id, $this->input->post())) {
            return redirect('/medico/perfil');
        } else {
            return "erro ao atualizar";
        }
    }

    public function checkout($array)
    {

        $this->load->view('layout_principal/top');
        $this->load->view("template_checkout/checkout");
        $this->load->view('layout_principal/footer');
    }

    public function update_foto($id)
    {
        $data['id'] = $id;
        $this->load->view('layout_principal/top');
        $this->load->view("template_medico/update_foto.php", $data);
        $this->load->view('layout_principal/footer');
    }

}