<?

    $pg['titulo'] = 'MONTAGEM DE SERVIDORES E193-SIGAT';
    $pg['colspan'] = '1';

    $pg['topico'][] = '';
    $pg['texto'][] = '<pre>

MONTAGEM DE SERVIDORES E193-SIGAT


1 Instalar Sistema operacional (Ubuntu-Server 10.04 - 32/64bits)

   - Instalar primeiramente o segundo hd para depois o primeiro hd, fazendo assim que o GRUB reconheça e crie os links corretos;

   - Criar um diretório no primeiro hd, para poder montar o segundo hd dentro dele;

mkdir /mnt/reserva

     - Inserir a linha no arquivo fstab para ao iniciar a máquina o próprio só monte os dados do segundo hd no primeiro hd;

vim /etc/fstab

   UUID="digite aqui o id do segundo hd" /mnt/reserva    ext4    rw,user           0       1 

2 Instalar programas

apt-get update

apt-get upgrade

apt-get install vim nmap apache2 mysql-server php5 php5-mysql php5-pgsql php5-ldap php-fpdf openssl ssl-cert rsync ntpdate postgresql-8.4 postgresql-server-dev-8.4 sshpass apcupsd bsd-mailx postfix 

   - Criar diretórios para salvar os backups;

mkdir /var/backupe193

mkdir /var/www/backupe193

mkdir /var/sigat

mkdir /var/www/backupfull

3 Copiar códigos fonte do SIGAT/E193

scp -r root@ip_para_buscar_dados:/var/www/sigat /var/www/  ( Floripa ? 10.193.4.55 )

scp -r root@ip_para_buscar_dados:/var/www/e193-web /var/www/ ( Floripa ? 10.193.4.55 )

scp -r root@ip_para_buscar_dados:/home/bicudo /home/ ( Floripa ? 10.193.4.55 )

chmod -R 755 /var/www/sigat /var/www/e193-web

chown -R www-data:www-data /var/www/        

chmod 777 /home/bicuo/XXX_excluidos.sigat    Obs.: XXX sigla da cidade

4 Configurações do Servidor:

a) Apache 2

   - Adicionar linha na configuração do apache;

echo \'AddDefaultCharset ISO-8859-1\' >>  /etc/apache2/apache2.conf

   - Excluir a seguinte linha no arquivo de configuração default;

vim /etc/apache2/sites-available/default

Indexes => Options Indexes FollowSymLinks MultiViews

   - Reinicie o apache;

/etc/init.d/apache2 restart

b) PHP5

   - Adicionar a seguinte linha na configuração do PHP;

echo \'include_path = ".:/home/bicudo/object_libs/"\' >> /etc/php5/apache2/php.ini

   - Criar certificação web;

mkdir /etc/apache2/ssl

make-ssl-cert /usr/share/ssl-cert/ssleay.cnf /etc/apache2/ssl/apache.pem

   - Após este comando ira pedir para adicionar uma informação, inserir informação abaixo;

CBMSC - cidade do servidor / BR SC    ( Neste caso Florianopolis)

   - Continuar configurações;

a2enmod ssl

scp /etc/apache2/sites-available/default /etc/apache2/sites-available/ssl

   - Alterar dentro do arquivo ssl as seguintes informações;

vim /etc/apache2/sites-available/ssl

Alterar ? *:80 " para \'" *:443 \"

   - No mesmo arquivo inserir as seguintes linhas após a linha ? ServerAdmin webmaster@localhost ";
 
SSLEngine On
SSLCertificateFile /etc/apache2/ssl/apache.pem

   - Continuar as configurações;

a2ensite ssl

   - Reinicie o apache;

/etc/init.d/apache2 force-reload

c) PostgreSQL

   - Como o postgresql 8.4 não vêm com a fonte Latin1 como padrão, vamos executar alguns comando;

rm -rf /var/lib/postgresql/8.4/main/\*

su ? postgres

/usr/lib/postgresql/8.4/bin/initdb --pgdata=/var/lib/postgresql/8.4/main/ --encoding=LATIN1 --locale=C --username=postgres -W

   Obs: vai pedir uma senha para o super-usuario do banco. Digite \'postgres\'.

exit

ln -s /etc/ssl/certs/ssl-cert-snakeoil.pem /var/lib/postgresql/8.4/main/server.crt

ln -s /etc/ssl/private/ssl-cert-snakeoil.key /var/lib/postgresql/8.4/main/server.key

   - Reinicie o Postgresql;

/etc/init.d/postgresql-8.4 restart

   - Procure a linha ? listen_addresses ?, descomente ela e deixe ? * ? como valor;

vim /etc/postgresql/8.4/main/postgresql.conf  

   listen_addresses = \'*\'     

   - Modifique o arquivo ? conf_bd.php ? alterando o ip do servidor como segue abaixo;

vim /home/bicudo/object_libs/libe193/conf/conf_bd.php

   define (\'BD_HOST\'  ,\'ip_do_servidor\');

   - Copie o arquivo pg_hba.conf de um servidor pronto;      (Neste caso ? Floripa / 10.193.4.55)

scp root@ip_para_buscar_dados:/etc/postgresql/8.4/main/pg_hba.conf  /etc/postgresql/8.1/main/   

c) Mysql

   - Altere o arquivo conf_bd.php definindo o servidor local como segue abaixo;

vim /home/bicudo/object_libs/lib/conf/conf_bd.php

   define (\'BD_HOST\',  \'localhost\');

5 Importar DADOS:

   - Copiar arquivos de backup dos bancos de dados;      (Neste caso ? Floripa / 10.193.4.55)

scp root@ip_para_buscar_dados:/var/md0/backupe193/backup/2010-11-29/e193_fns1.sql /home/

scp root@ip_para_buscar_dados:/var/md0/backupsigat/backup/fns1-2010-11-29.sql /home/


a) Postgres (quando pedir senha digite ? postgres" )

su ? postgres

createdb -E LATIN1 e193

createuser -s -E -P scott

psql -d e193 < /home/e193_fns1.sql

exit

/etc/init.d/postgresql-8.4 restart

b) MySQL
 
mysql -u marceloawk -p < /home/fns1-2010-11-29.sql    

   - Altere o usuário e senha do banco de dados como segue abaixo;

vim /etc/mysql/debian.cnf 
   
   (altere usuário e senha em ambas as linhas ) marceloawk    oraculo

   - Comente a linha bind-address conforme mostra abaixo;

vim /etc/mysql/my.cnf 

   #(bind-address           = 127.0.0.1 )

   - Agora vamos setar os privilégios de usuários, digite o seguinte comando;   

mysql

   - Agora de dentro do banco ( mysql> ) digite os seguintes comandos;

flush privileges;

exit;

6 Alterar configurações CRONTAB:

   - Segue abaixo como deve ficar a crontab do servidor principal;

vim /etc/crontab

# RESPONSAVEL PELO BACKUP 

00      22      *       *       *       root    diario 
00      11      *       *       *       root    geradorbackup 
30      21      *       *       *       root    /var/backupe193/diario_e193 
30      9       *       *       *       root    /var/www/backupe193/gerador_e193 

# EXCLUI OS BACKUPS COM MAIS DE 60 DIAS DO HD RESERVA 

00      2       *       *       *       root    rm_reserva 

# FAZ COPIA DO HD PRIMARIO PARA O HD SECUNDARIO 

00      *       *       *       *       root    rsync -Cravzp /var/ /mnt/reserva/var/ 

# FAZ COPIA DA PRIMEIRA MAQUINA PARA SEGUNDA MAQUINA 

50      11      *       *       *       root    sshpass -p \'senha_servidor\' rsync -Cravzp /var/ root@10.193.78.250:/var/ 

# ATUALIZA A HORA DO SERVIDOR 

00      1       *       *       *       root    ntpdate -u 10.193.4.75 

   - Segue abaixo como deve ficar a crontab do servidor reserva;

vim /etc/crontab

# Script responsavel pelos backups dos bancos do Sigat 
# 
00      *       *       *       *       root    rsync -Cravzp /var/ /mnt/reserva/var/ 
50     22       *       *       *       root    sshpass -p \'senha_servidor\' rsync -Cravzp root@10.193.78.251:/var/ /var/ 
30      2       *       *       *       root    rm_reserva 

00      1       *       *       *       root    ntpdate -u ntp.cbm.sc.gov.br 

# Ativa o backup 
# 
50     12       *       *       *       root    importacao_01 
50     23       *       *       *       root    importacao_02 



7 Criando Scripts de backup máquina principal: (cuidado com a sigla da cidade)

vim /usr/local/bin/diario

#SQL para backups 
hoje=\'date +%Y-%m-%d\' 
ontem=\'date --date "1 day ago" +%Y-%m-%d\' 
teste=\'ls /var/sigat/fns1-\$ontem.sql\' 
if [ -n \$teste ] 
then 
mysqldump -u marceloawk -poraculo --all-databases > /var/sigat/fns1-\$hoje.sql 
tamhoje=\'wc -c /var/sigat/fns1-\$hoje.sql | awk \'{print \$1}\'\' 
tamontem=\'wc -c /var/sigat/fns1-\$ontem.sql | awk \'{print \$1}\'\' 
fi 
if [ \$tamhoje -le \$tamontem ] 
then 
rm -rf /var/sigat/fns1-\$hoje.sql 
mysqldump -u marceloawk -poraculo --all-databases > /var/sigat/fns1-\$hoje.sql 
else 
mysqldump -u marceloawk -poraculo --all-databases > /var/sigat/fns1-\$hoje.sql 
fi 
#exclui arquivos na pasta com tempo superior aos dias. 
find /var/sigat/ -mtime +59 -exec rm {} + 

exit 0 

vim /usr/local/bin/geradorbackup

#SQL para backups 
hoje=\'date +%Y-%m-%d\' 
ontem=\'date --date "1 day ago" +%Y-%m-%d\' 
teste=\'ls /var/www/backupfull/fns1-\$ontem.sql\' 
if [ -n \$teste ] 
then 
mysqldump -u marceloawk -poraculo --all-databases > /var/www/backupfull/fns1-\$hoje.sql 
tamhoje=\'wc -c /var/www/backupfull/fns1-\$hoje.sql | awk \'{prit \$1}\'\' 
tamontem=\'wc -c /var/www/backupfull/fns1-\$ontem.sql | awk \'{print \$1}\'\' 
if [ \$tamhoje -le \$tamontem ] 
then 
rm -rf /var/www/backupfull/fns1-\$hoje.sql 
mysqldump -u marceloawk -poraculo --all-databases > /var/www/backupfull/fns1-\$hoje.sql 
fi 
else 
mysqldump -u marceloawk -poraculo --all-databases > /var/www/backupfull/fns1-\$hoje.sql 
fi 
#exclui arquivos na pasta com tempo superior aos dias. 
find /var/www/backupfull/ -mtime +59 -exec rm {} + 
exit 0 

vim /usr/local/bin/rm_reserva

#!/bin/sh 
# Gerador de SQL 
data=\'date +%Y-%m-%d\' 
 remove=\'date --date "60 day ago" +%Y-%m-%d\' 

rm -rf /mnt/reserva/var/backupe193/\$remove 
rm -rf /mnt/reserva/var/www/backupe193/\$remove 

find /mnt/reserva/var/sigat/ -mtime +60 -exec rm {} + 
find /mnt/reserva/var/www/backupfull/ -mtime +60 -exec rm {} + 

exit 0              

vim /var/backupe193/diario_e193 

#!/bin/sh 
# Gerador de SQL 

data=\'date +%Y-%m-%d\' 

remove=\'date --date "60 day ago" +%Y-%m-%d\' 

mkdir /var/backupe193/\$data 

pg_dump -i -U scott -p 5432 e193 > /var/backupe193/\$data/e193_fns.sql # 

rm -rf \$remove 

exit 0 

vim /var/www/backupe193/gerador_e193

#!/bin/sh 
# Gerador de SQL 

data=\'date +%Y-%m-%d\' 

remove=\'date --date "60 day ago" +%Y-%m-%d\' 

mkdir /var/www/backupe193/\$data 

pg_dump -i -U scott -p 5432 e193 > /var/www/backupe193/\$data/e193_fns.sql # 

rm -rf \$remove 

exit 0 

8 Criando Scripts de backup máquina reserva: (cuidado com a sigla da cidade)

vim /usr/local/bin/rm_reserva

#!/bin/sh 
data=\'date +%Y-%m-%d\' 
remove=\'date --date "60 day ago" +%Y-%m-%d\' 

rm -rf /var/backupe193/\$remove 
rm -rf /var/www/backupe193/\$remove 
rm -rf /mnt/reserva/var/backupe193/\$remove 
rm -rf /mnt/reserva/var/www/backupe193/\$remove 

find /mnt/reserva/var/sigat/ -mtime +60 -exec rm {} + 
find /mnt/reserva/var/www/backupfull/ -mtime +60 -exec rm {} + 
find /var/sigat/ -mtime +60 -exec rm {} + 
find /var/www/backupfull/ -mtime +60 -exec rm {} + 

exit 0 

vim /usr/local/bin/importacao_01

#SQL para importacao 

hoje=\'date +%Y-%m-%d\' 

mysql -u marceloawk -poraculo < /var/www/backupfull/fns1-\$hoje.sql 

exit 0 

vim /usr/local/bin/importacao_02

#SQL para importacao 

hoje=\'date +%Y-%m-%d\' 

mysql -u marceloawk -poraculo < /var/sigat/fns1-\$hoje.sql 

exit 0 


SERVIDOR PRONTO REINICIE O MESMO E FAÇA TESTES ANTES DE COLOCAR NO AR!!!


</pre>';


require './modulos/corpo.php';

?> 

