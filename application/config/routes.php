<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
//
//$route['default_controller'] = 'LancamentoControler';//inicia na pagina de lancamento
$route['default_controller'] = 'welcome';//inicia no site
$route['contato_site'] = 'welcome/contato';
//$route['contato'] = 'test/recaptcha';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['planos'] = 'welcome/planos';
$route['paciente/registro'] = "usuario/registroPaciente";
$route['paciente/adicionar'] = "usuario/registroPacienteAdd";
$route['paciente/perfil'] = "PacienteController/perfil";
$route['paciente/atualiza_senha/(\d+)'] = "usuario/update_pass/$1";
$route['paciente/mudar_senha/(\d+)'] = "usuario/update_password/$1";
$route['paciente/endereco-editar/(\d+)'] = "usuario/update_address/$1";
$route['paciente/atualizar_endereco/(\d+)'] = "usuario/update_addresses/$1";
$route['paciente/avalia_medico'] = "PacienteController/note_doctor";
$route['usuario/recuperar_senha'] = 'usuario/recuperar_senha';
$route['usuario/mudar_senha'] = "usuario/update_senha";

//para logar no sistema em: /views/template_login/form_login.php:28
//$route['/login/auth'] = "controller/Login.php":25;

/* router medicos */
$route['medico/registro'] = "usuario/registroMedico";
//$route['medico/registro/plano1'] = "usuario/registroMedicoPlanos";
$route['medico/registro/plano/(\d+)'] = "usuario/registroMedico/$1";
$route['medico/adicionar'] = "usuario/registroMedicoAdd";
$route['medico/perfil'] = "MedicoController/perfil";
$route['medico/atualiza_foto'] = "MedicoController/update_image";
$route['medico/endereco-editar/(\d+)'] = "usuario/update_addressM/$1";
$route['medico/atualizar_endereco/(\d+)'] = "usuario/update_addresses/$1";
$route['medico/atualiza_dados/(\d+)'] = "usuario/updated_doctor/$1";
$route['medico/atualiza_especialidade/(\d+)'] = "MedicoController/updated_specialty/$1";
$route['medico/atualiza/(\d+)'] = "usuario/update_doctor/$1";
$route['medico/nova_especialidade'] = "MedicoController/new_specialty";
$route['medico/removeSpecialty'] = "MedicoController/removeSpecialty";
$route['medico/mudar_senha/(\d+)'] = "usuario/update_password2/$1";
$route['medico/atualiza_senha/(\d+)'] = "usuario/update_pass2/$1";
$route['medico/atualiza_foto/(\d+)'] = "usuario/update_foto/$1";
$route['medico/plano-editar/(\d+)'] = "MedicoController/update_plano/$1";
$route['medico/mudar_plano/(\d+)'] = "MedicoController/mudar_plano/$1";
$route['medico/valorConsutla1-editar/(\d+)'] = "MedicoController/mudar_valorConsutla1/$1";
$route['medico/atualizar_valor1/(\d+)'] = "MedicoController/updated_valor1/$1";
$route['medico/valorConsutla2-editar/(\d+)'] = "MedicoController/mudar_valorConsutla2/$1";
$route['medico/atualizar_valor2/(\d+)'] = "MedicoController/updated_valor2/$1";

/* router Consultas */
$route['consulta/nova'] = "ConsultaController/index";
$route['consulta/pesquisa'] = "ConsultaController/pesquisa";
$route['consulta/marcar'] = "ConsultaController/marcar";
$route['consulta/limite/(\d+)'] = "ConsultaController/limitarConsulta/$1";
$route['consulta/agendar'] = "ConsultaController/agendarConsulta";
$route['consulta/agendar/success'] = "ConsultaController/agendarConsultaSuccess";
$route['consulta/confirmar'] = "ConsultaController/confirmarConsulta";
$route['consulta/mudarData/(\d+)'] = "ConsultaController/changeDateConsult/$1";
$route['consulta/mudar_data/(\d+)'] = "ConsultaController/updateDateConsult/$1";
$route['consulta/mudar_dia_consulta'] = "ConsultaController/updateDayConsult";
$route['consulta/editar/(\d+)'] = "ConsultaController/editar/$1";
$route['consulta/atualiza_dia'] = "ConsultaController/updateDay";
$route['consulta/paciente/(\d+)'] = "ConsultaController/consulta_paciente/$1";
$route['consulta/paciente/historico/(\d+)'] = "ConsultaController/historico_consulta_paciente/$1";
$route['consulta/cancelar/(:any)/(:any)'] = "ConsultaController/cancelar_consulta/$1/$2";

/* router Agenda */
$route['agenda/novo'] = "AgendaController/create";
$route['agenda/adicionar'] = "AgendaController/add";
$route['agenda/editar/(\d+)'] = "AgendaController/edit/$1";
$route['agenda/atualizar/(\d+)'] = "AgendaController/update/$1";
$route['agenda/remover/(\d+)'] = "AgendaController/remove/$1";

/* router pagamento */
$route['pagamento'] = "PagamentoController/pagamento2";
$route['pagamento/medico/(:any)/(:any)'] = "PagamentoController/renovarPagamento/$1/$2";
$route['pagamento-valida'] = "PagamentoController/retorno_pagseguro";
$route['notifica'] = "PagamentoController/notifica";

/* router lancamento */
$route['lancamento'] = "LancamentoControler/index";
$route['lancamento_email'] = "LancamentoControler/contato";
$route['lancamento/envia'] = "LancamentoControler/envia";

/* router landingpage */
$route['landingpage'] = "LandingpageController/index";
$route['landingpage_email'] = "LandingpageController/contato";
$route['landingpage/envia'] = "LandingpageController/envia";
//$route['landingpage/cadastra'] = "LandingpageController/cad_Prospect";
$route['landingpage/cadastra'] = "usuario/registroMedicoAdd";

/* router Admin Painel */
$route['admin'] = "LoginAdminController/index";
$route['admin/login'] = "LoginAdminController/login";
$route['admin/logout'] = "LoginAdminController/logout";

/* router Admin Painel */
$route['admin/dashboard'] = "DashboardController/index";

/* router Admin Painel - Financeiro */
$route['admin/transacoes'] = "FinanceiroController/index";
$route['admin/transacoes/detalhe/(\d+)'] = "FinanceiroController/detalhe/$1";

/* router Admin Painel - Financeiro */
$route['admin/noticias'] = "NoticiaController/index";
$route['admin/noticias/adicionar'] = "NoticiaController/create";
$route['admin/noticias/salvar'] = "NoticiaController/add";
$route['admin/noticias/remover/(\d+)'] = "NoticiaController/remove/$1";
$route['admin/noticias/editar/(\d+)'] = "NoticiaController/edit/$1";
$route['admin/noticias/atualizar/(\d+)'] = "NoticiaController/update/$1";

/*
 * router para relatorios
 */
$route['relatorio/pacientes'] = "RelatorioController/pacientReport";
$route['relatorio/financeiro'] = "RelatorioController/financeiroReport";
$route['relatorio/consultas_confirmadas'] = "RelatorioController/confirmReport";
$route['relatorio/consultas_canceladas'] = "RelatorioController/cancelReport";

/*
 * router para pesquisa
 */
$route['pesquisar'] = "PesquisaController/index";

/*
* router para Checkout
*/
$route['checkout'] = "CheckoutController/checkout";

/* router ebook faltas */
$route['ebook-faltas'] = "EbookFaltasControler/index";
$route['lancamento_email'] = "LancamentoControler/contato";
$route['lancamento/envia'] = "LancamentoControler/envia";

/* router CRM login */
$route['crm'] = "LoginCrmController/index";
$route['crm/login'] = "LoginCrmController/login";
$route['crm/logout'] = "LoginCrmController/logout";

/* router CRM Painel */
$route['crm/dashboard'] = "DashboardCrmController/index";
$route['crm/dashboard/usuario'] = "DashboardCrmController/usuario";
$route['crm/dashboard/senha'] = "DashboardCrmController/usuario_senha";
$route['crm/dashboard/lembretes'] = "DashboardCrmController/lembretes";
$route['crm/dashboard/editar_lembrete/(\d+)'] = "DashboardCrmController/editarLembrete/$1";
$route['crm/dashboard/atualizar_lembrete'] = "DashboardCrmController/atualizar_lembrete";
$route['crm/dashboard/NovoLembrete'] = "DashboardCrmController/NovoLembrete";
$route['crm/dashboard/AdicionarLembrete'] = "DashboardCrmController/AdicionarLembrete";
$route['crm/dashboard/remover_lembrete/(\d+)'] = "DashboardCrmController/deletarLembrete/$1";
$route['crm/usuario/editar/(\d+)'] = "DashboardCrmController/editar/$1";
$route['crm/usuario/atualizar'] = "DashboardCrmController/atualizar";
$route['crm/usuario/novo'] = "DashboardCrmController/novo";
$route['crm/usuario/adicionar'] = "DashboardCrmController/adicionar";
$route['crm/usuario/remover/(\d+)'] = "DashboardCrmController/deletar/$1";
$route['crm/dashboard/bancoArquivos'] = "DashboardCrmController/bancoArquivos";
$route['crm/dashboard/NovoArquivo'] = "DashboardCrmController/NovoArquivo";
$route['crm/dashboard/AdicionarArquivo'] = "DashboardCrmController/adicionarArquivos";
$route['crm/dashboard/download_arquivo/(:any)/(:any)'] = "DashboardCrmController/Download/$1/$2";
$route['crm/dashboard/remover_arquivo/(\d+)'] = "DashboardCrmController/remover_arquivo/$1";

/* router CRM Paciente */
$route['crm/paciente/novo'] = "PacienteCrmController/index";
$route['crm/paciente/adicionar'] = "PacienteCrmController/adicionar";
$route['crm/paciente/editar/(\d+)'] = "PacienteCrmController/editar/$1";
$route['crm/paciente/atualizar'] = "PacienteCrmController/atualizar";
$route['crm/paciente/listar'] = "PacienteCrmController/listar";
$route['crm/paciente/remover/(\d+)'] = "PacienteCrmController/deletar/$1";
$route['crm/paciente/baixar'] = "PacienteCrmController/baixar";
$route['crm/paciente/exportar'] = "PacienteCrmController/exportar";
$route['crm/paciente/cidades'] = "PacienteCrmController/busca_cidades_estado";
$route['crm/paciente/aniversariante'] = "PacienteCrmController/aniversariante";

/* router CRM Prospecto */
$route['crm/prospecto/novo'] = "ProspectoCrmController/index";
$route['crm/prospecto/adicionar'] = "ProspectoCrmController/adicionar";
$route['crm/prospecto/editar/(\d+)'] = "ProspectoCrmController/editar/$1";
$route['crm/prospecto/atualizar'] = "ProspectoCrmController/atualizar";
$route['crm/prospecto/listar'] = "ProspectoCrmController/listar";
$route['crm/prospecto/remover/(\d+)'] = "ProspectoCrmController/deletar/$1";
$route['crm/prospecto/baixar'] = "ProspectoCrmController/baixar";
$route['crm/prospecto/exportar'] = "ProspectoCrmController/exportar";
$route['crm/prospecto/cidades'] = "ProspectoCrmController/busca_cidades_estado";


/* router Suporte Painel */
$route['suporte/dashboard'] = "DashboardSuporte/index";