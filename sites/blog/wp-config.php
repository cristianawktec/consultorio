<?php

/** Permite que a reparação do banco pelo configurador online**/
define('WP_ALLOW_REPAIR', true);

/**
 * As configurações básicas do WordPress.
 *
 * Esse arquivo contém as seguintes configurações: configurações de MySQL, Prefixo de Tabelas,
 * Chaves secretas, Idioma do WordPress, e ABSPATH. Você pode encontrar mais informações
 * visitando {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. Você pode obter as configurações de MySQL de seu servidor de hospedagem.
 *
 * Esse arquivo é usado pelo script ed criação wp-config.php durante a
 * instalação. Você não precisa usar o site, você pode apenas salvar esse arquivo
 * como "wp-config.php" e preencher os valores.
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar essas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define('DB_NAME', 'admin_');

/** Usuário do banco de dados MySQL */
define('DB_USER', 'admin_');

/** Senha do banco de dados MySQL */
define('DB_PASSWORD', 'hgfRT33bvc3G');

/** nome do host do MySQL */
define('DB_HOST', 'admin_.mysql.dbaas.com.br');

/** Conjunto de caracteres do banco de dados a ser usado na criação das tabelas. */
define('DB_CHARSET', 'utf8');

/** O tipo de collate do banco de dados. Não altere isso se tiver dúvidas. */
define('DB_COLLATE', '');

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * Você pode alterá-las a qualquer momento para desvalidar quaisquer cookies existentes. Isto irá forçar todos os usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', 'TSH-;]tm)yxrHVCT[I*<Ee?ZMgL(R^eUUMxv*QQYR&DG1jKx3~nV:!?>=yXuW =m');

define('SECURE_AUTH_KEY', 'zsmaRzGqlGkzX1K,;@O{dr#(&[y2|dh~3xF@Z9w=)bKT;DDcZvd9 Ei!Q7sf]EOD');

define('LOGGED_IN_KEY', '8pRF1^Usl>LU@FEQYD[$/-bYRcB=(3KofiW&+1]bCSlDT}8P(,E&Ri`J|f|3.YPv');

define('NONCE_KEY', '-@Bs3%FfmM} %bDHM&1~N.^6L7%k?(-$+so@zn2D8<@bAoqa/d0*|07[E{zRo`+L');

define('AUTH_SALT', 'Q|x_S!!&LE5mc,&{k`4wkHf7}/s|a1}d[)a8s:o+jx()%hhpWeE6Ck|!&sTa^xiR');

define('SECURE_AUTH_SALT', '4Gcg13b6h7)Gt|yjweZ0X1LaIjX yduNh*tI(Ju0wE$[9USiR&j(G0:Z[<NP|{zH');

define('LOGGED_IN_SALT', 'PJHQGqfWakeVj||E 7G`yN+|*fo?tqkCE}%VfCiY2Nen.1*&>C7Y@{ku[Cs+Z;Lk');

define('NONCE_SALT', 'bVWW<MZT|8g,>LxbRb(?Lzww[aPZ@/Wg|A6B2ZWk;6e}}4sz|gLC62l,?6H6=@{/');


/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der para cada um um único
 * prefixo. Somente números, letras e sublinhados!
 */
$table_prefix  = 'wp_';



/**
 * Para desenvolvedores: Modo debugging WordPress.
 *
 * altere isto para true para ativar a exibição de avisos durante o desenvolvimento.
 * é altamente recomendável que os desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 */
define('WP_DEBUG', false);

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
	
/** Configura as variáveis do WordPress e arquivos inclusos. */
require_once(ABSPATH . 'wp-settings.php');
