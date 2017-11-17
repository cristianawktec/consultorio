<?php 

$_SG['conectaServidor'] = true;    // Abre uma conexão com o servidor MySQL?
$_SG['abreSessao'] = true;         // Inicia a sessão com um session_start()?

$_SG['caseSensitive'] = false;     

$_SG['validaSempre'] = true;       // Deseja validar o usuário e a senha a cada carregamento de página?
// Evita que, ao mudar os dados do usuário no banco de dado o mesmo contiue logado.

//$_SG['servidor'] = 'mysql.awktec.com';    // Servidor MySQL
//$_SG['usuario'] = 'awktec02';          // Usuário MySQL
//$_SG['senha'] = 'crmadmin';                // Senha MySQL
//$_SG['banco'] = 'awktec02';            // Banco de dados MySQL

$_SG['servidor'] = 'localhost';
$_SG['usuario'] = '';          // Usuário MySQL
$_SG['senha'] = '';                // Senha MySQL
$_SG['banco'] = 'crm';            // Banco de dados MySQL

$_SG['paginaLogin'] = 'login.php'; // Página de login

$_SG['tabela'] = 'usuarios_arquivos';       // Nome da tabela onde os usuários são salvos
// ==============================

// ======================================
//   ~ Não edite a partir deste ponto ~
// ======================================

// Verifica se precisa fazer a conexão com o MySQL

$con = mysql_connect("localhost","crm","");

if (!$con) {
	die('Could not connect: ' . mysql_error());
}
mysql_select_db("crm", $con);

/*
if ($_SG['conectaServidor'] == true) {
$_SG["link"] = mysql_connect("mysql.awktec.com", "awktec02", "crmadmin") or die("MySQL: Não foi possível conectar-se ao servidor [".$_SG['servidor']."].");
mysql_select_db($_SG['banco'], $_SG['link']) or die("MySQL: Não foi possível conectar-se ao banco de dados [".$_SG['banco']."].");
}
*/

// Verifica se precisa iniciar a sessão
if ($_SG['abreSessao'] == true) {
session_start();
}

/**
* Função que valida um usuário e senha
*
* @param string $usuario - O usuário a ser validado
* @param string $senha - A senha a ser validada
*
* @return bool - Se o usuário foi validado ou não (true/false)
*/
function validaUsuario($usuario, $senha) {
	echo"<br>validando usuario<br><pre>";print_r($_POST);echo"</pre>";//exit;
	global $_SG;
	$cS = ($_SG['caseSensitive']) ? 'BINARY' : '';

	// Usa a função addslashes para escapar as aspas
	$nusuario = addslashes($usuario);
	$nsenha = addslashes($senha);

	// Monta uma consulta SQL (query) para procurar um usuário
	$sql = mysql_query("SELECT * FROM usuarios WHERE usuario = '$nusuario' AND senha ='$nsenha' LIMIT 1");
	//$sql2 = ("SELECT * FROM usuarios_arquivos WHERE usuarios_arquivos_login = '$nusuario' AND usuarios_arquivos_senha ='$nsenha' LIMIT 1");
	//echo"<br>sql: <pre>";print_r($sql);echo"</pre>";exit;
	$resultado = "1";//mysql_fetch_assoc($sql);

	// Verifica se encontrou algum registro
	if (empty($resultado)) {
	// Nenhum registro foi encontrado => o usuário é inválido
	return false;

	} else {
	// O registro foi encontrado => o usuário é valido

	// Definimos dois valores na sessão com os dados do usuário
	$_SESSION['usuarioIDa'] = "13";//$resultado['usuarios_arquivos_id'];
	$_SESSION['usuarioNivela'] = "1";//$resultado['usuarios_arquivos_nivel'];// Pega o valor da coluna 'id do registro encontrado no MySQL
	$_SESSION['usuarioNomea'] = "admin";//$resultado['usuarios_arquivos_nome']; // Pega o valor da coluna 'nome' do registro encontrado no MySQL

	// Verifica a opção se sempre validar o login
	if ($_SG['validaSempre'] == true) {
	// Definimos dois valores na sessão com os dados do login
	$_SESSION['usuarioLogina'] = $usuario;
	$_SESSION['usuarioSenhaa'] = $senha;
}

return true;
}
}

/**
* Função que protege uma página
*/
function protegePagina() {
global $_SG;

if (!isset($_SESSION['usuarioIDa']) OR !isset($_SESSION['usuarioNomea'])) {
// Não há usuário logado, manda pra página de login
expulsaVisitante();
} else if (!isset($_SESSION['usuarioIDa']) OR !isset($_SESSION['usuarioNomea'])) {
// Há usuário logado, verifica se precisa validar o login novamente
if ($_SG['validaSempre'] == true) {
// Verifica se os dados salvos na sessão batem com os dados do banco de dados
if (!validaUsuario($_SESSION['usuarioLogina'], $_SESSION['usuarioSenha'])) {
// Os dados não batem, manda pra tela de login
expulsaVisitante();
}
}
}
}

/**
* Função para expulsar um visitante
*/
function expulsaVisitante() {
global $_SG;

// Remove as variáveis da sessão (caso elas existam)
unset($_SESSION['usuarioIDa'], $_SESSION['usuarioNomea'], $_SESSION['usuarioLogina'], $_SESSION['usuarioSenhaa'], $_SESSION['usuarioNivela']);

// Manda pra tela de login
header("Location: ".$_SG['paginaLogin']);
}


?>