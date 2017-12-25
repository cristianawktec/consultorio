<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: cristian
 * Date: 07/08/2017
 * Time: 22:28
 */

class PacienteCrmController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Usuario_model','usuario');
        $this->load->model('Endereco_Model','endereco');
        $this->load->model('Consulta_Model','consulta');
        $this->load->model('Paciente_Model', 'paciente');
        $this->load->model('Crm_Paciente_Model');
        $this->load->library('email');
    }

    public function index()
    {
        $this->load->helper('form');
        $this->load->view('layout_principal_crm/menu');

        $estado = $this->Crm_Paciente_Model->retorna_estados();
        //echo"<pre>estados: ";print_r($estado);echo"</pre>";exit;

        $option = "<option value=''></option>";
        foreach($estado as $linha) {
            $option .= "<option value='$linha->cod_estados'>$linha->nome</option>";
        }

        $variaveis['options_estado'] = $option;
        $this->load->view('template_dashboard_crm/adicionar_paciente', $variaveis);
    }

    public function busca_cidades_estado()
    {   //echo"estou chegando aqui";exit;
        $this->load->model("Crm_Paciente_Model");
        $cidades = $this->Crm_Paciente_Model->getCidadesEstado();
        $option = "<option value=''></option>";
        foreach($cidades as $linha) {
            //echo"<pre>estados: ";print_r($linha);echo"</pre>";exit;
            $option .= "<option value='$linha->cod_cidades'>$linha->nome</option>";
        }
        echo $option;
    }

    public function buscaPacienteMedico()
    {   //echo"estou chegando aqui";exit;
        $this->load->model("Crm_Paciente_Model");
        $pacientes = $this->Crm_Paciente_Model->getArquivoPacienteMedico();
        $option = "<option value=''></option>";
        foreach($pacientes as $linha) {
            //echo"<pre>estados: ";print_r($linha);echo"</pre>";exit;
            $option .= "<option value='$linha->id_usuario'>$linha->nm_paciente</option>";
        }
        echo $option;
    }

    public function listar()
    {
        $idmedico = $this->session->userdata('usuarioCrm')->id;
        $this->load->helper('form');
        $this->load->model('Crm_Paciente_Model');
        $data['registros'] = $this->Crm_Paciente_Model->getPacienteMedico($idmedico);
        $this->load->view('layout_principal_crm/menu');
        $this->load->view('template_dashboard_crm/listar_pacientes',$data);
    }

    function editar($id)
    {
        $this->load->helper('form');
        $this->load->model('Crm_Paciente_Model');
        $data['registros'] = $this->Crm_Paciente_Model->editar($id);
        $this->load->view('layout_principal_crm/menu');
        $this->load->view('template_dashboard_crm/editar_paciente',$data);
    }

    function atualizar()
    {
        $this->load->helper('form');
        $this->load->model('Crm_Paciente_Model');
        $this->Crm_Paciente_Model->atualizar();
        $this->load->view('layout_principal_crm/menu');
        $this->load->view('template_dashboard_crm/editar_paciente',$data);
        redirect('crm/paciente/listar');
    }

    function novo(){
        $this->load->helper('form');
        $this->load->view('layout_principal_crm/menu');
        $this->load->view('template_dashboard_crm/adicionar_paciente');
    }

    function exportar(){
        $idmedico = $this->session->userdata('usuarioCrm')->id;
        $this->load->helper('form');
        $this->load->model('Crm_Paciente_Model');
        $data['registros'] = $this->Crm_Paciente_Model->getPacienteMedico($idmedico);
        $this->load->view('template_dashboard_crm/exportar_paciente',$data);
        redirect('crm/dashboard');
    }

    function adicionar(){
        $this->load->helper('form');
        $this->load->model('Crm_Paciente_Model');
        $this->Crm_Paciente_Model->adicionar();
        //$this->load->view('layout_principal_crm/menu');
        //$this->load->view('template_dashboard_crm/adicionar_paciente',$data);
        redirect('/crm/dashboard');
    }

    function deletar($id){
        $this->load->helper('form');
        $this->load->model('Crm_Paciente_Model');
        $this->Crm_Paciente_Model->excluir($id);
        $this->load->view('layout_principal_crm/menu');
        //$this->load->view('template_dashboard_crm/usuario',$data);
        redirect('crm/paciente/listar');
    }

    public function aniversariante()
    {
        $idmedico = $this->session->userdata('usuarioCrm')->id;
        $this->load->helper('form');
        $this->load->model('Crm_Paciente_Model');
        $data['registros'] = $this->Crm_Paciente_Model->getAniversariante($idmedico);
        $this->load->view('layout_principal_crm/menu');
        $this->load->view('template_dashboard_crm/listar_aniversariantes',$data);
    }


    public function SendMailAniversariante($idpaciente)
    {
        $nmmedico = $this->session->userdata('usuarioCrm')->nome;
        $this->load->helper('form');
        $this->load->model('Crm_Paciente_Model');
        $data['registros'] = $this->Crm_Paciente_Model->sendAniversariante($idpaciente);
        foreach($data['registros'] as $dados) {
            $email = $dados->email;
            $name = $dados->nm_paciente;
            $dt_nascimento = $dados->dt_nascimento;
        }

        $this->sendMailNiver($email, $name, $dt_nascimento, $nmmedico);
        $idmedico = $this->session->userdata('usuarioCrm')->id;
        $this->load->helper('form');
        $this->load->model('Crm_Paciente_Model');
        $lista['registros'] = $this->Crm_Paciente_Model->getAniversariante($idmedico);
        $this->load->view('layout_principal_crm/menu');
        $this->load->view('template_dashboard_crm/listar_aniversariantes',$lista);
    }


    public function sendMailNiver($email, $name, $dt_nascimento, $nmmedico)
    {
        $subject = 'Feliz Aniversário '.$name;
        $message = nl2br("");

        $data2 = explode('-', $dt_nascimento);
        $dt_nascimento = $data2['2']."/".$data2['1']."/".$data2['0'];

        $this->load->library("my_phpmailer");
        $mail = new PHPMailer();
        $mail->isHTML(true);
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
        $mail->Body = $this->htmlEmail($name, $dt_nascimento, $nmmedico);
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

    public function htmlEmail($name, $dt_nascimento, $nmmedico)
    {
        $html = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	<!-- If you delete this meta tag, Half Life 3 will never be released. -->
	<meta name="viewport" content="width=device-width" />
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Click Consultório</title>
	<link rel="stylesheet" type="text/css" href="'.base_url('assets'). '/css/email.css" />
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
							<td><img src="http://clickconsultorio.com/assets/img/logo_trans.png" style="width: 120px;height: 80px;"/></td>
						</tr>
					</table>
					</div>
			</td>
			<td></td>
		</tr>
	</table><!-- /HEADER -->
	<!-- BODY -->
	<table align="center" border="0" cellpadding="0" cellspacing="0" style="width:600px">
	<tbody>
		<tr>
			<td>
			<table border="0" cellpadding="0" cellspacing="0" style="width:100%">
				<tbody>
					<tr>
						<td valign="top" style="width:160px"><img src="http://clickconsultorio.com/assets/img/1.jpg" border="0" style="display:block;"></td>
						<td valign="bottom">
							<table border="0" cellpadding="0" cellspacing="0" style="width:100%">
								<tbody>
									<tr>
										<td align="center" style="font-family:Arial;color:#0698e3;font-size:90px;font-weight:bold;">Feliz</td>
									</tr>
									<tr>
										<td align="center" style="font-family:Arial;color:rgba(61, 179, 29, 0.89);font-size:40px;font-weight:bold;">Aniversário</td>
									</tr>
								</tbody>
							</table>
						</td>
						<td valign="top" style="width:160px"><img src="http://clickconsultorio.com/assets/img/2.jpg" border="0" style="display:block;width: 100px;"></td>
					</tr>
				</tbody>
			</table>
			</td>
		</tr>
		<tr>
			<td style="font-family:Arial;color:#999999;font-size:20px;padding:15px;">
			    <h3>Olá, ' .$name.'</h3>
			    Nesta data '.$dt_nascimento.'<br>
				Comemoramos o seu aniversário, cheio de paz...<br>
				Que os sentimentos mais puros<br>
				se concretizem em gestos de bondade,<br>
				e o amor encontre abertas as portas<br>
				do seu coração.<br>
				Que você possa guardar deste aniversário<br>
				as melhores lembranças.<br>
				E que tudo contribua para sua felicidade.<br>
				E que continuemos juntos por mais um ano :)<br>
                <br>
				São os votos de <h3>'.$nmmedico.'</h3>.
			</td>
		</tr>
		<tr>
			<td align="center"><img src="http://clickconsultorio.com/assets/img/3.jpg" border="0" style="display:block;width: 150px;"></td>
		</tr>
		<tr>
			<td>
				<table border="0" cellpadding="0" cellspacing="0" style="width:600px">
					<tbody>
						<tr>
							<td style="width: 250px;padding:10px;" bgcolor="#0698e3"><img src="http://clickconsultorio.com/assets/img/logo_trans.png" border="0" style="display:block;width: 110px;"></td>
							<td bgcolor="#0698e3" style="padding:10px;font-family:Arial;color:#FFFFFF;font-size:16px;">
								CONTATO | CLICKCONSULTÓRIO
								Por uma qualidade Melhor!
								contato@clickconsultorio.com</td>
						</tr>
					</tbody>
				</table>
			</td>
		</tr>
	</tbody>
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


    function baixar()
    {
        //mostra se tem algum error
        while (ob_get_level())
            ob_end_clean();
        header("Content-Encoding: None", true);

        // Se carga la libreria fpdf
        $this->load->library('pdf');

        // Se busca os dados da lista de pacientes
        $idmedico = $this->session->userdata('usuarioCrm')->id;
        $this->load->helper('form');
        $this->load->model('Crm_Paciente_Model');
        $data = $this->Crm_Paciente_Model->getPacienteMedico($idmedico);
        // Creacion del PDF

        /*
         * Se crea un objeto de la clase Pdf, recuerda que la clase Pdf
         * heredó todos las variables y métodos de fpdf
         */
        // Aqui já podemos passar algumas variáveis.
        // O primeiro é a orientação da página:
        // ("P" ou "portrait" = retrato) ("L" ou "landscape" = paisagem)
        // O segundo é a unidade metrica que você irá utilizar:
        // ("pt" = pontos) ("mm" = milimetros) ("cm" = centimetros) ("in" = polegadas)
        // O terceiro é o tamanho da página/papel
        // "A3", "A4", "A5", "letter" e "legal" são os tamanho já pré-definidos, mas
        // também pode ser passado o tamanho por meio de um array array('largura','altura')
        // onde os valores largura e altura podem ser qualquer número real maior que '0'.
        // caso algum ou nenhum valor for passado, irá assumir o
        // Escopo: FPDF($orientation='P', $unit='mm', $size='A4')
        $this->pdf = new PDF("L");
        // Agregamos una página
        $this->pdf->AddPage();
        // Define el alias para el número de página que se imprimirá en el pie
        $this->pdf->AliasNbPages();

        /* Se define el titulo, márgenes izquierdo, derecho y
         * el color de relleno predeterminado
         */
        $this->pdf->SetTitle("Lista de pacientes");
        $this->pdf->SetLeftMargin(10);
        $this->pdf->SetRightMargin(10);
        $this->pdf->SetFillColor(200,200,200);

        // define formato da fonte: Arial, negrito, tamaho 9
        $this->pdf->SetFont('Arial', 'B', 8);
        /*
         * TITULOS DE COLUMNAS
         *
         * $this->pdf->Cell(Ancho, Alto,texto,borde,posición,alineación,relleno);
         */
        //$this->pdf->Cell(15,7,'NUM','TBL',0,'C','1');
        $this->pdf->Cell(35,7,'Paciente','TBL',0,'L','1');
        $this->pdf->Cell(30,7,'Responsável','TB',0,'L','1');
        $this->pdf->Cell(42,7,'E-mail','TB',0,'L','1');
        $this->pdf->Cell(15,7,'Telefone','TB',0,'L','1');
        $this->pdf->Cell(15,7,'Celular','TB',0,'C','1');
        $this->pdf->Cell(25,7,'Observação','TB',0,'L','1');
        $this->pdf->Cell(12,7,'Origem','TB',0,'L','1');
        $this->pdf->Cell(15,7,'Alterado','TBR',0,'L','1');
        $this->pdf->Ln(7);
        // La variable $x se utiliza para mostrar un número consecutivo
        $x = 1;
        foreach($data as $dados) {

            // se imprime el numero actual y despues se incrementa el valor de $x en uno
            //$this->pdf->Cell(15,5,$x++,'BL',0,'C',0);
            // Se imprimen los datos de cada alumno
            $this->pdf->Cell(35,5,$dados->nm_paciente,'BL',0,'L',0);
            $this->pdf->Cell(30,5,$dados->nm_mae,'B',0,'L',0);
            $this->pdf->Cell(42,5,$dados->email,'B',0,'L',0);
            $this->pdf->Cell(15,5,$dados->nr_telefone,'B',0,'L',0);
            $this->pdf->Cell(15,5,$dados->nr_celular,'B',0,'L',0);
            $this->pdf->Cell(25,5,$dados->ds_observacao,'B',0,'L',0);
            $this->pdf->Cell(12,5,$dados->id_origem,'B',0,'L',0);
            $this->pdf->Cell(16,5,substr($dados->data_modificacao,0,10),'BR',0,'L',0);
            //Se agrega un salto de linea
            $this->pdf->Ln(5);
        }
        /*
         * Se manda el pdf al navegador
         *
         * $this->pdf->Output(nombredelarchivo, destino);
         *
         * I = Muestra el pdf en el navegador
         * D = Envia el pdf para descarga
         *
         */
        $this->pdf->Output("Lista de pacientes.pdf", 'I');
    }

}