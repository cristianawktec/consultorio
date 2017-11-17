<?

    $pg['titulo'] = 'Instalar Sigat';
    $pg['colspan'] = '1';

    $pg['topico'][] = 'wget apt-get source list';
    $pg['texto'][] = "<pre>
<b>wget</b>

linux:~# vim /etc/wgetrc

http_proxy = http://aptget:dudu@10.193.4.253:3128 

<b>apt-get</b>

linux:~# vim /etc/apt/apt.conf

Acquire::http::proxy \"http://aptget:dudu@10.193.4.253:3128\";

<b>Source list</b>

linux:~# vim /etc/apt/sources.list // editar o arquivo source.list 

# deb cdrom: ... // comentar a linha de cdrom
adicione as seguintes linhas
deb http://ftp.br.debian.org/debian/ etch main
deb-src http://ftp.br.debian.org/debian/ etch main
</pre>";

    $pg['topico'][] = 'Pacotes Sigat';
    $pg['texto'][] = "<pre>

<b>Pacotes necessários</b>

apt-get -y install ssh
apt-get -y install nmap
apt-get -y install apache2
apt-get -y install php5
apt-get -y install mysql-server 
apt-get -y install php5-mysql
apt-get -y install php5-ldap
apt-get -y install php-fpdf
apt-get -y install openssl
apt-get -y install ssl-cert
apt-get -y install rsync
apt-get -y install sendemail
apt-get -y install ntpdate
apt-get -y install php5-gd
</pre>";

    $pg['topico'][] = 'Fixar IP';
    $pg['texto'][] = "<pre>
<b>Fixar IP</b>

linux:~# vi /etc/network/interfaces -- configuration file for ifup(8), ifdown(8)

# The loopback interface
# automatically added when upgrading
auto lo eth0
iface lo inet loopback
iface eth0 inet static
address 10.193.4.109
netmask 255.255.255.0
network 10.193.x.0
broadcast 10.193.x.255
gateway 10.193.x.254

<b>Configurar o dns</b>

linux:~# vi /etc/resolv.conf

#search cb.sc.gov.br
#nameserver 10.193.4.5
nameserver 4.2.2.2

<b>Reiniciar configurações de rede</b>
linux:~# /etc/init.d/networking restart 
</pre>";

    $pg['topico'][] = 'Configura&ccedil;&atilde;o do Apache';
    $pg['texto'][] = "<pre>
<b>Configurações do Apache</b>

linux:~# vi /etc/apache2/apache2.conf

AddDefaultCharset ISO-8859-1 // descomentar ou adicionar a linha

linux:~# vi /etc/apache2/sites-available/default 
e
linux:~# /etc/apache2/sites-available/ssl

Options Indexes FollowSymLinks MultiViews // retirar o Indexes
RedirectMatch ^/$ /sigat/ // Passar o diretório padrão para sigat

</pre>";

    $pg['topico'][] = 'Configura&ccedil;&atilde;o Mysql';
    $pg['texto'][] = "<pre>
<b>Corrigir o aquivo de usu&aacute;rio do debian para o MySQL</b>

linux:~# vi /etc/mysql/debian.cnf

user = usuario
password = senha

linux:~# vi /etc/mysql/my.cnf

# bind-address = 127.0.0.1 // comentar esta linha para aceitar conexão remota

<b>Banco de Dados</b>

linux:~# mysqldump -u usuario -p --all-databases > arquivo_backup.sql // backup
linux:~# mysql -u usuario -p < arquivo_backup.sql // importar dados

<b>Reiniciar o SGBD</b>

linux:~# /etc/init.d/mysql restart
</pre>";

    $pg['topico'][] = 'Configura&ccedil;&atilde;o do PHP';
    $pg['texto'][] = "<pre>

<b>Configuração do PHP</b>

linux:~# vi /etc/php5/apache2/php.ini

display_errors = Off // Dasabilitar mensagens de erros
include_path = \".:/home/bicudo/object_libs/\" // inserir arquivo de configuração do Sigat
magic_quotes_gpc = Off // desabilitar inclus&atilde;o de caracteres especiais

<b>Reiniciar o servidor Apache</b>

linux:~# /etc/init.d/apache2 restart

</pre>";

    $pg['topico'][] = 'Configura&ccedil;&atilde;o SSL';
    $pg['texto'][] = "<pre>

<b>Configuração do SSL</b>

linux:~# mkdir /etc/apache2/ssl
linux:~# make-ssl-cert /usr/share/ssl-cert/ssleay.cnf /etc/apache2/ssl/apache.pem

<b>Complete com os dados abaixo:</b>
----------------------------------------
BR
SC
Florianopolis // cidade do servidor
Corpo de Bombeiro Militar de Santa Catarina
Divisao de Tecnologia da Informacao DITI BMSC
10.193.4.109 // IP do servidor ( esse o mais importante )
----------------------------------------

linux:~# su -c 'echo Listen 443 >> /etc/apache2/ports.conf'
linux:~# a2enmod ssl
linux:~# cp /etc/apache2/sites-available/default /etc/apache2/sites-available/ssl

<b>Editar arquivo ssl</b>

linux:~# vim /etc/apache2/sites-available/ssl

NameVirtualHost *:443
&#60;VirtualHost *:443&#62;
ServerAdmin webmaster@localhost
SSLEngine On
SSLCertificateFile /etc/apache2/ssl/apache.pem
DocumentRoot /var/www/
 
<b>Executar na console</b>

linux:~# a2ensite ssl
linux:~# /etc/init.d/apache2 force-reload
</pre>";

    $pg['topico'][] = 'Configurações Finais';
    $pg['texto'][] = "<pre>
<b>Mudar a senha do servidor</b>

linux:~# passwd

<b>Copiar pasta lib do Sigat</b>

linux:~# rsync -CravzpE root@homolog:/home/bicudo/object_libs/lib /home/bicudo/object_libs/lib

<b>Mudar permissão do arquivo de exclusão do Sigat</b>

linux:~# chown www-data:www-data /home/sigat/excluidos.sigat

<b>Direcionar o Sigat para o banco de dados correto</b>

linux:~# vi /home/bicudo/object_libs/lib/conf/conf_bd.php 

define ('BD_HOST', 'maquina_onde_se_localiza_o_banco_do_sigat');

<b>Copiar arquivo hosts da máquina de homologação</b>

linux:~# scp root@homolog:/etc/hosts /etc/
</pre>";

    $pg['topico'][] = 'Desabilitar Ldap';
    $pg['texto'][] = "<pre>
<b>root# vi /home/bicudo/object_libs/lib/conf/conf_sistema.php</b>

(Adicionar bloco de código abaixo no conf_sistema.php)

/**
*  E obrigatorio usar LDAP para acessar o sistema?
*/
define ('CONF_REQUIRE_LDAP', true);

<b>root# vi /home/bicudo/object_libs/lib/misc/sigat.php</b>

(Alterar a a função checkldapuser para retornar true se CONF_REQUIRE_LDAP for false)

	if (CONF_REQUIRE_LDAP) {
	
		global \$erro_ldap;
		\$erro_ldap=\"\";
		
		... 
		&#60; código completo do validador LDAP &#62;
		...
		
		@ldap_close(\$connect);
		return(false);
	
	} else {
	
		return true;
	
	}

<b>root# vi /home/bicudo/object_libs/lib/class/class_sessao_sigat.php</b>

function authenticate (\$userlogin, \$passwd, \$rotina)
function get_id_by_login (\$str_login, \$str_pass)

	if (CONF_REQUIRE_LDAP) {

		$sql = \"SELECT ID_USUARIO,ID_PERFIL FROM \".TBL_USUARIO.\" WHERE ID_USUARIO = '$str_login'\";
	
	} else {
	
		$sql = \"SELECT ID_USUARIO,ID_PERFIL FROM \".TBL_USUARIOS.\" WHERE 
		ID_USUARIO = '$str_login' AND PS_SENHA='\".md5($str_pass).\"'\";
	
	}

<b>root# vi /var/www/sigat/modulos/acessos/usuario.php</b>

(Alterar o arquivo para que o campo Senha e Confirme esteja habilitado)

<b>root# vi /var/www/sigat/modulos/acessos/cons_usuario.php</b>
//  frm_cons.psw_ps_senha.disabled=true;
//  frm_cons.psw_ps_senha_confirma.disabled=true;

<b> Arquivos afetados </b>

rsync -CravzpE /home/cbmsc/bibliotecas/lib/conf/conf_sistema.php root@10.193.4.53:/home/bicudo/object_libs/lib/conf/conf_sistema.php
rsync -CravzpE /home/cbmsc/bibliotecas/lib/misc/sigat.php root@10.193.4.53:/home/bicudo/object_libs/lib/misc/sigat.php
rsync -CravzpE /home/cbmsc/bibliotecas/lib/class/class_sessao_sigat.php root@10.193.4.53:/home/bicudo/object_libs/lib/class/class_sessao_sigat.php
rsync -CravzpE /var/www/sigat/modulos/acessos/cons_usuario.php root@10.193.4.53:/var/www/sigat/modulos/acessos/cons_usuario.php
rsync -CravzpE /var/www/sigat/modulos/acessos/usuario.php root@10.193.4.53:/var/www/sigat/modulos/acessos/usuario.php


</pre>";


    $pg['topico'][] = 'CheckList de Instalação de Servidores SIGAT e E193';
    $pg['texto'][] = "<pre>

1 APÓS INSTALAÇÃO RECOMENDA-SE TESTES. PARA ISSO DEIXAR O SERVIDOR PELO MENOS UMA SEMANA EM OBSERVAÇÃO NA BANCADA.
2 DEVE-SE REALIZAR TESTES DE INSERÇÃO DE SOLICITAÇÕES PARA TODOS OS TIPOS (PROJETO, MANUTENÇÃO, FUNCIONAMENTO, HABITE-SE) NO NOVO SERVIDOR A TÍTULO DE TESTE!
3 PARA CADA TESTE VERIFICAR NO PHPMYADMIM SE OS MESMO FORAM INSERIDOS COM SUCESSO. VER BANCO SOLICITAÇÕES. PARA ACHAR AS ULTIMAS INSERÇÕES BASTA ORDENAR AS 
CHAVES PRIMARIA EM ORDEM DECRESCENTE. PARA CADA TIPO DE SOLICITAÇÃO REPETIR O PROCESSO.
4 NO SISTEMA APROVAR AS SOLICITAÇÕES PARA SEREM PROTOCOLANDAS E DEVE-SE REALIZAR OS MESMOS TESTE DO ITEM 3. VER NO PHPMYADMIM AS TABELAS DE PROTOCOLAMENTO 
DE CADA TIPO DE SOLICITAÇÃO.
5 FAZER O MESMO DO ITEM 4 PARA VISTORIAS DEFERIDAS. VER TABELAS DE VISTORIAS DE CADA TIPO DE SOLICITAÇÃO.
6 APÓS ESSES TESTES, DEVE-SE REALIZAR NOVO DUMP DO BANCO DE DADOS \"QUENTE\" DO SERVIDOR QUE SERÁ TROCADO E LEVANTA-LO NO MYSQL. DEVE-SE REALIZAR OS TESTE DE 
COMPARAÇÃO DOS DADOS. COLOCANDO A PÁGINA DE VISUALIZAÇÃO DE BUCKUPS A FUNCIONAR PARA COMPARAÇÃO REAL DOS BANCOS! ESSA TELA É IMPORTANTE E NÃO DEVER FICAR 
FORA DE OPERAÇÃO EM NENHUM SERVIDOR ATIVO.
7 PARA NÃO TER SURPRESAS DE FALTA DE DADOS NO BANCO DE DADOS, TODOS OS UPLOADS NO MYSQL DE BANCO DE DADOS \"QUENTES\" DEVE CONTER O BANCO DE DADOS REAL. OU 
SEJA, FAZER O MYSQLDUMP DO SERVIDOR QUE SERÁ TROCADO E LEVANTADO NO NOVO SERVIDOR. NÃO SE DEVE USAR QUALQUER BANCO MAIS!SÓ PARA INSTALAÇÃO E CONFIGURAÇÃO 
DO SIGAT NÃO SE DEVE USAR QUALQUER OUTRO BANCO QUE NÃO SEJA O DO SERVIDOR A SER TROCADO!EXEMPLO: O NOVO SERVIDOR DE FLORIANÓPOLIS (TDE1) DEVERÁ TER O 
MESMO BANCO DE DADOS DE TDE1 DO DIA. AO LEVARTAR O BANCO NO NOVO SERVIDOR O DUMP TEM QUE SER O DO DIA.

LINUX:~# MYSQLDUMP -U USUARIO -P --ALL-DATABASES > ARQUIVO_BACKUP.SQL // BACKUP
LINUX:~# MYSQL -U USUARIO -P < ARQUIVO_BACKUP.SQL // IMPORTAR DADOS

8 NA INSTALAÇÃO RETIRAR DO AR O LINK DE ACESSO AO SISTEMA. \"O SISTEMA ESTÁ EM MANUTENÇÃO\" E POR ISSO NIGUÉM USA ATÉ SUA LIBERAÇÃO TOTAL.
9 APÓS A MÁQUINA SERVIDORA SER ATIVADA DE FATO NA CIDADE , DEVE-SE SOLICITAR AOS USUÁRIOS DO SISTEMA - OS BOMBEIROS - QUE AVALIEM OS DADOS E QUE FAÇAM UM 
CHEK DAS INFORMAÇÕES JÁ INSERIDAS NO SISTEMA.
10 RECOMENDA-SE NÃO LIBERAR O LINK DO SERVIDOR PARA FUNCIONAMENTO SEM QUE SE TENHA CERTEZA DE SUA PLENA INTEGRIDADE E O AVAL DOS BMS QUE USAM O SISTEMA. 
11 APÓS A LIBERAÇÃO DADOS NOVOS SERÃO INSERIDOS E SUA MANUTENÇÃO CASO APRESENTE PROBLEMAS REQUER CUIDADOS ESPECIALIZADOS. POR ISSO O SERVIDOR DEVERÁ SE 
MONITORADO CONSTANTEMENTE.

NÃO HÁ MANEIRA DE IDENTIFICAR PROBLEMAS NO SIGAT OU MYSQL SE NÃO FOR POR TESTE HUMANO. AINDA NÃO HÁ UM SCRIPT DE VERIFICAÇÃO DE INTEGRIDADE DO BANCO DE 
DOIS BANCOS PARA O SIGAT. O MESMO PARA O E193. ENTÃO MÃOS A OBRA. A VERIFICAÇÃO É HUMANA! 

1 SEMANA DE MONITORAÇÃO NA BANCADA
2 TESTES DE INSERÇÃO
3 VALIDAÇÃO NO PHPMYADMIN
4 REALIZAR MYSQLDUMP QUENTE DO SQL DO SERVIDOR A SER SUBSTITUIDO.
5 NA SUBSTITUIÇÃO SÓ LIBERAR O LINK QUANDO TODAS AS DIRETRIZES FOREM EFETIVADAS.
6 OBSERVAÇÃO É O PONTO CRUCIAL PARA ACHAR ERROS. E USUÁRIOS SÃO ESPECIALISTAS NISSO. SOLICITEM VERIFICAÇÃO E TESTE DOS USUÁRIOS DA \"PONTA\".
</pre>";

require './modulos/corpo.php';
?>