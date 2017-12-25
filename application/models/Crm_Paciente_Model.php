<?php
/**
 * Created by PhpStorm.
 * User: cristian
 * Date: 08/08/2017
 * Time: 21:06
 */

class Crm_Paciente_Model extends CI_Model{

    var $id_usuario;
    var $nm_paciente;
    var $ch_sexo;
    var $ds_estado_civil;
    var $nr_cpf;
    var $nr_rg;
    var $dt_nascimento;
    var $nm_pai;
    var $nm_mae;

    public function __construct()
    {
        parent::__construct();
        // Load form helper library
        $this->load->helper('form');

        // Load validation library
        $this->load->library('form_validation');
        $this->load->model('Endereco_Model', 'endereco');
        $this->load->model('Usuario_model', 'usuario');
        $this->load->model('Paciente_Model', 'paciente');
        $this->load->library('email');
    }

    public  function getMedico()
    {
        return $this->session->userdata('usuarioCrm')->nome;
    }

    public function getPacienteMedico($id)
    {
        $this->db->select('DISTINCT(u.id_usuario), p.nm_paciente, p.nm_mae, u.email, p.nr_telefone, p.nr_celular, u.ds_observacao, u.id_origem, u.data_modificacao');
        $this->db->from('medicos_pacientes as m');
        $this->db->join('usuarios as u', 'u.id_usuario = m.id_paciente');
        $this->db->join('pacientes as p', 'p.id_usuario = m.id_paciente');
        $this->db->where('m.id_medico', $id);
        $this->db->where('u.ch_remocao', '');
        return $this->db->get()->result();
    }

    public function getArquivoPacienteMedico($id)
    {
        $this->db->select('p.id_usuario, p.nm_paciente');
        $this->db->from('pacientes as p');
        $this->db->join('medicos_pacientes as m', 'm.id_paciente = p.id_usuario');
        $this->db->where('m.id_medico', $id);
        return $this->db->get()->result();
    }

    public function getPacienteById($id)
    {
        $this->db->select('*');
        $this->db->from('usuarios as u');
        $this->db->join('pacientes as p', 'p.id_usuario = u.id_usuario');
        $this->db->where('u.id_usuario', $id);
        return $this->db->get()->result();
    }

    public function getAllPaciente()
    {
        $this->db->select('*');
        $this->db->from('usuarios as u');
        $this->db->join('pacientes as p', 'p.id_usuario = u.id_usuario');
        $this->db->order_by('u.id_usuario','asc');
        return $this->db->get()->result();
    }

    public function adicionar()
    {
        $dadosEndereco['nm_endereco'] = $this->input->post('nm_endereco');
        $dadosEndereco['nr_cep'] = $this->input->post('nr_cep');
        $dadosEndereco['nm_bairro'] = $this->input->post('nm_bairro');
        $dadosEndereco['nm_cidade'] = $this->input->post('nm_cidade');
        $dadosEndereco['nm_estado'] = $this->input->post('nm_estado');

        if ($this->endereco->adicionar($dadosEndereco)) {
            $endereco = $this->endereco->getLastEndereco();
        } else {
            return "Error";
        }

        $ps_login = 'clickmudar';
        $dadosUsuario['id_endereco'] = $endereco[0]->id_endereco;
        $dadosUsuario['id_perfil'] = $this->input->post('id_perfil');
        $dadosUsuario['data_cadastro'] = date('d/m/Y H:i:s', time());
        $dadosUsuario['data_modificacao'] = date('d/m/Y H:i:s', time());

        $dadosUsuario['nm_login']= $this->input->post('nm_paciente');
        $dadosUsuario['nm_login_hash'] = md5($this->input->post('nm_login'));
        $dadosUsuario['ps_login'] =  md5($ps_login);
        $dadosUsuario['ps_login_hash'] = md5($ps_login);
        $dadosUsuario['email'] = $this->input->post('ds_email');
        $dadosUsuario['id_origem'] = $this->input->post('id_origem');

        if ($this->usuario->adicionar($dadosUsuario)) {
            $usuario = $this->usuario->getLastUsuario();
        } else {
            return "Error";
            die;
        }

        $dadosPaciente['id_usuario'] = $usuario[0]->id_usuario;
        $dadosPaciente['nm_paciente'] = $this->input->post('nm_paciente');
        $dadosPaciente['nm_mae'] = $this->input->post('nm_mae');
        //$dadosPaciente['ds_email'] = $this->input->post('ds_email');
        $dataNacimento = explode('/', $this->input->post('dt_nascimento'));
        $dataNacimento = $dataNacimento[2] . "-" . $dataNacimento[1] . "-" . $dataNacimento[0];
        $dadosPaciente['dt_nascimento'] = $dataNacimento;
        $dadosPaciente['nr_telefone'] = $this->input->post('nr_telefone');
        $dadosPaciente['nr_celular'] = $this->input->post('nr_celular');
        //$dadosPaciente['id_origem']= $this->input->post('id_origem');

        $email = $dadosUsuario['email'];
        $name = $dadosPaciente['nm_paciente'];
        if ($this->paciente->adicionar($dadosPaciente)) {
            $this->sendMailConfirmatio($email, $name, $dadosPaciente['nm_paciente'], $ps_login);
            return redirect('/crm/dashboard');
        } else {
            return "Error";
        }
    }

    function editar($id)
    {//tem qeu trazar todos os dados da tabela de enderecos, pacientes e usuario
        //echo"id: ".$id;
        $this->db->select('u.id_usuario, p.nm_paciente, p.nm_mae, u.email, p.nr_telefone, p.nr_celular, u.ds_observacao, u.id_origem, u.data_modificacao');
        $this->db->from('pacientes as p');
        $this->db->join('usuarios as u', 'u.id_usuario = p.id_usuario');
        $this->db->where('p.id_usuario', $id);
        //$res = $this->db->get()->result();echo"<pre><br>resultado model: ";print_r($res);echo"</pre>";exit;
        return $this->db->get()->result();
    }

    function excluir($id)
    {//evitar de excluir registros da base de dados, vamos usar flags
        $this->db->set('ch_remocao', '1');
        $this->db->where('id_usuario', $id);
        $this->db->update('usuarios');
    }

    function atualizar()
    {   //echo"<pre>";print_r($_POST);echo"</pre>";exit;
        $usuario = array(
            'email'=>$_POST['email'],
            'ds_observacao'=>$_POST['ds_observacao'],
            'id_origem'=>$_POST['id_origem'],
            'data_modificacao'=>$_POST['data_modificacao']
        );
        $this->db->where('id_usuario', $_POST['id']);
        $this->db->update('usuarios', $usuario);

        $paciente = array(
            'nm_paciente'=>$_POST['nm_paciente'],
            'nm_mae'=>$_POST['nm_mae'],
            'nr_telefone'=>$_POST['nr_telefone'],
            'nr_celular'=>$_POST['nr_celular']
        );
        $this->db->where('id_usuario', $_POST['id']);
        $this->db->update('pacientes', $paciente);
    }

    function origem($id){
        $this->db->select('nm_origem');
        $this->db->from('usuarios as u');
        $this->db->join('origem as o', 'o.id_origem = u.id_origem');
        $this->db->where('u.id_origem',$id);
        $this->db->get()->result();
    }

    function getCidadesEstado() {
        //$estado = $this->db->get('estados')->result(); echo"<pre><br>estado: ";print_r($estado);echo"</pre>";exit;
        $cod_estados = $this->input->post("cod_estados");
        $this->db->select('*');
        $this->db->from('cidades');
        $this->db->where("estados_cod_estados", $cod_estados);
        $this->db->order_by("nome", "asc");
        $consulta = $this->db->get()->result();
        //echo"<pre>consulta: ";print_r($consulta);echo"</pre>";exit;
        return $consulta;
        //$estado = $this->db->get()->result(); echo"<pre><br>estado: ";print_r($estado);echo"</pre>";exit;
    }

    public function retorna_estados()
    {
        $this->db->select('*');
        $this->db->from('estados');
        $this->db->order_by("nome", "asc");
        $consulta = $this->db->get()->result();

        return $consulta;
    }

    function getCidades($id) {
        $this->db->select('cidades.cod_cidades, cidades.nome');
        $this->db->from('estados');
        $this->db->join('cidades', 'cidades.estados_cod_estados = estados.cod_estados');
        $this->db->where( array('estados.cod_estados' => $id) );
        return $this->db->get()->result();
    }

    public function getAniversariante($id)
    {
        $this->db->select('DISTINCT(u.id_usuario), p.nm_paciente, u.email, p.nr_celular,  p.dt_nascimento');
        $this->db->from('medicos_pacientes as m');
        $this->db->join('usuarios as u', 'u.id_usuario = m.id_paciente');
        $this->db->join('pacientes as p', 'p.id_usuario = m.id_paciente');
        $this->db->where('m.id_medico', $id);
        $this->db->where('u.ch_remocao', '');
        return $this->db->get()->result();
    }

    public function sendAniversariante($id)
    {
        $this->db->select('DISTINCT(u.id_usuario), p.nm_paciente, u.email, p.dt_nascimento');
        $this->db->from('medicos_pacientes as m');
        $this->db->join('usuarios as u', 'u.id_usuario = m.id_paciente');
        $this->db->join('pacientes as p', 'p.id_usuario = m.id_paciente');
        $this->db->where('m.id_paciente', $id);
        return $this->db->get()->result();
    }

    public function upload_image($id_usuario,$data)
    {
        $this->db->where('id_usuario', $id_usuario);
        return $this->db->update('medicos', $data);
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

}