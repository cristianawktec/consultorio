<?

    $pg['titulo'] = 'Linux';
    $pg['colspan'] = '1';

    $pg['topico'][] = 'Encontrar arquivos';
    $pg['texto'][] = '<pre>

<b>Encontrar arquivos com determinado conteúdo</b>

Certa vez, após instalar o GLPI (sistema de helpdesk), houve a necessidade de customiza-lo para ficar
de acordo com as necessidades da empresa. O grande problema, era saber em qual arquivo encontrar o 
conteúdo que deveria ser alterado.

Segue abaixo um exemplo de como efetuar a busca:

# grep -R texto_procurado /diretorio_raiz_da_busca/ 2 > /dev/null | cut -f 1 -d ?:? | uniq

<b>Encontrar arquivos pelo seu respectivo nome</b>

# find /diretorio_raiz_da_busca/ -name nome_do_arquivo*
</pre>';

    $pg['topico'][] = 'Instalando plugins do Flash';
    $pg['texto'][] = '<pre>
<b>Atualizar o sources.list</b>

# vi /etc/apt/sources.list

deb http://ftp.br.debian.org/debian/ lenny main
deb-src http://ftp.br.debian.org/debian/ lenny main

deb http://security.debian.org/ lenny/updates main
deb-src http://security.debian.org/ lenny/updates main

deb http://volatile.debian.org/debian-volatile lenny/volatile main
deb-src http://volatile.debian.org/debian-volatile lenny/volatile main

deb http://ftp.br.debian.org/debian/ etch main
deb-src http://ftp.br.debian.org/debian/ etch main

deb http://security.debian.org/ etch/updates main contrib
deb-src http://security.debian.org/ etch/updates main contrib

deb http://www.debian-multimedia.org lenny main
deb-src http://ftp.br.debian.org/debian/ lenny main contrib non-free

deb http://ftp.br.debian.org/debian lenny main non-free
deb http://www.backports.org/debian lenny-backports main contrib

deb http://ftp.br.debian.org/debian/ lenny-proposed-updates contrib non-free main

<b> Executar comandos</b>

# apt-get update
# apt-get install debian-multimedia-keyring debian-backports-keyring
# apt-get update
# apt-get install flashplugin-nonfree

<b>Reiniciar o Firefox</b>
    </pre>';


    $pg['topico'][] = 'Configurar rede usando DHCP';
    $pg['texto'][] = '<pre>
vi /etc/network/interfaces

auto lo eth0
iface lo inet loopback
allow-hotplug eth0
iface eth0 inet dhcp
    </pre>';

    $pg['topico'][] = 'Configurar rede fixando o IP';
    $pg['texto'][] = '<pre>
vi /etc/network/interfaces

auto lo eth0
iface lo inet loopback
iface eth0 inet static
address 10.193.4.ip_desejado
netmask 255.255.255.0
network 10.193.4.0
broadcast 10.193.4.255
gateway 10.193.4.254

    </pre>';

    $pg['topico'][] = 'Comandos B&aacute;sicos';
    $pg['texto'][] = '<pre>
ln -s /var/www/ /home/marceloawk/Desktop/paginas
touch /home/marceloawk/Desktop/teste.txt
nmap localhost
scp -R origem usuario@host/destino
ssh usuario@host:/destino
rsync -CravzpE origem destino
fish://usuario@host/destino
ls -lha
lspci
lsusb
traceroute host
ifconfig
ifconfig eth0:1 host netmask 255.255.255.0
ifconfig eth0:1 down
mount -f auto /dev/hdc1 /mnt/disco1
chsh    trocar a shell
whoami
su usuario
terminar a linha de comando com & (processo em background)
PAM (Pluggable Authentication Modules)
date -s 14:25 (alterar hora)
date -s "08/24/2009 11:04" (alterar data e hora)
hostname
uname -a
    </pre>';

    $pg['topico'][] = 'Arquivos de configura&ccedil;&atilde;o no etc';
    $pg['texto'][] = '<pre>
passwd      usu&aacute;rios que podem logar no sistema
shadow      registro das senhas cifradas dos usu&aacute;rios
fstab       tabela de par&acirc;metros para a montagem de discos
group       define os grupos aos quais os usu&aacute;rios pertencem
    </pre>';

    $pg['topico'][] = 'Rsync sem senha';
    $pg['texto'][] = '<pre>
# ssh-keygen -t rsa -b 1024     gerar a chave p&uacute;blica RSA
ser&aacute; criado um arquivos dentro da pasta .ssh do usu&aacute;rio com o nome id_rsa.pub
Copie esta chave para o outro servidor
#  cat ~/.ssh/id_dsa.pub | ssh root@maquina_remota 
\'cat - >> ~/.ssh/authorized_keys\'
copie o conte&uacute;do da chave RSA para dentro do arquivo authorized_key remoto
#  cat ~/.ssh/id_dsa.pub >> ~/.ssh/authorized_keys
Reinicie o servidor remoto

<b>Autorizar entrada sem digitar senha</b>

ssh-keygen -b 1024 -t rsa -f ~/.ssh/id_rsa
cat ~/.ssh/id_rsa.pub | ssh $1@$2  \'cat - >> ~/.ssh/authorized_keys\'


    </pre>';

    $pg['topico'][] = 'Permiss&otilde;es de acesso root via SSH';
    $pg['texto'][] = "<pre>
# vi /etc/ssh/sshd_config
PermitRootLogin no/yes
Agora reinicie o servi&ccedil;o de ssh
    </pre>";

    $pg['topico'][] = 'VIm Colorido';
    $pg['texto'][] = "<pre>
# apt-get install vi
# vi /etc/vim/vimrc
'syntax on'
color ron
set number
    </pre>";

    $pg['topico'][] = 'Comandos Diversos';
    $pg['texto'][] = "<pre>
Desmontar cdrom
# /media/umount cdrom0

Configurar o sudo
# vi /etc/sudoers
usuario ALL=NOPASSWD: ALL

Testar interface gr&aacute;fica OpenGL
# glxgears

Mostrar espa&ccedil;o em disco
# du --max-depth=1 -h /diretorio

Gerador de iso a partir de um cd
# dd if=/dev/cdrom of=dvd4.iso

Converte todos os caracteres de mai&uacute;sculo para min&uacute;sculo do 
arquivo1 para o arquivo2
# dd if=arquivo1 of=arquivo2 conv=lcase

Converte todos os caracteres de min&uacute;sculo para mai&uacute;sculo do 
arquivo1 para o arquivo2
# dd if=arquivo2 of=arquivo3 conv=ucase

Renomear todos os arquivos de um diret&oacute;rio com seu nome equivalente em 
letras min&uacute;sculas
#!/bin/sh
for file in \"\"ls\"\"
do
mv $file \"\"echo $file | dd conv=lcase\"\"
done
    </pre>";

    $pg['topico'][] = 'Como montar hd';
    $pg['texto'][] = "<pre>
criar o local onde ser&aacute; montado o hd
# mkdir /media/hdd1

para que o usu&aacute;rio no qual uso constantemente, no caso n&atilde;o o root 
(minha conta de usu&aacute;rio), 
para que ele possa ter acesso de leitura e execu&ccedil;&atilde;o no diret&oacute;rio que 
foi montado, voc&ecirc; precisa 
pegar o id do usu&aacute;rio e do grupo, usando o comando, funciona usando 
a conta de usu&aacute;rio
# id 

saber qual o tipo de hd que est&aacute; usando, caso n&atilde;o saiba, tipo se &eacute; 
SATA, ATA ou SCSI
# dmesg | grep hd

mount -t ntfs /dev/hdxx /local -o uid= , gid=

Onde:

    * /dev/hdxx: &eacute; o endere&ccedil;o do seu hd, no meu caso &eacute; /dev/hdd1
    * /local: &eacute; onde ser&aacute; montado o hd, no diret&oacute;rio que voc&ecirc; criou 
ou onde achar melhor, 
no meu caso &eacute; /media /hdd1
    * uid= : &eacute; a informa&ccedil;&atilde;o que peguei do id do meu usu&aacute;rio, no meu 
caso &eacute; 1000
    * gid= : &eacute; a informa&ccedil;&atilde;o que peguei do id do grupo, no meu caso &eacute; 1000 

# mount -t ntfs /dev/hdd1 /media/hdd1 -o uid=1000, gid=1000

Isso montaria meu hd em /media /hdd1, onde poderia ouvir meu mp3. Caso queira 
ver meus filmes, 
eu montaria a segunda parti&ccedil;&atilde;o da seguinte forma:

# mount -t ntfs /dev/hdd2 /media/hdd2 -o uid=1000, gid=1000

Coment&aacute;rio enviado por linux.juice em 26/05/2008 - 12:36h:
Pessoal , verificando esta dica, notei que errei colocando espa&ccedil;o onde n&atilde;o 
deve ter, exemplo:
Coloquei o seguinte exemplo:
# mount -t ntfs /dev/hdd1 /media/hdd1 -o uid=1000, gid=1000
quando na verdade deve ser:
# mount -t ntfs /dev/hdd1 /media/hdd1 -o uid=1000,gid=1000
n&atilde;o deve constar espa&ccedil;o entre uid=1000 e o gid=1000
Desculpe...    
    </pre>";

    $pg['topico'][] = 'Atualiza&ccedil;&atilde;o e Instala&ccedil;&atilde;o de programas';
    $pg['texto'][] = "<pre>
apt-get update
apt-get upgrade
apt-get install <i>programa</i>
apt-cache search <i>programa</i>

apt-get install w32codecs       codecs diversos
    </pre>";

    $pg['topico'][] = 'Instalando o KDE no Debian';
    $pg['texto'][] = "<pre>

Certifique-se que sua sources.list cont&eacute;m os seguintes reposit&oacute;rios:

# vi /etc/apt/sources.list
deb http://security.debian.org/ sarge/updates main
deb http://linorg.usp.br/debian/ sarge main

Assim voc&ecirc; est&aacute; apto a rodar:

# apt-get update
# apt-get install x-window-system xserver-xfree86 kdebase kde-i18n-ptbr kdm
    </pre>";

    $pg['topico'][] = 'Instalar Skype 64 bits - skype';
    $pg['texto'][] = "<pre>
Instalar o Skype no Ubuntu 7.10 plataforma amd64. 
Pacotes necess?rios:
    * Skype
    * libqt4-core
    * libqt4-gui
    * GetLibs 

Reposit&oacute;rios do Ubuntu, baixe em:
    * http://www.skype.com/go/getskype-linux-ubuntu 

Procedimento

$ sudo aptitude install libqt4-core libqt4-gui

Depois de instaladas, vamos instalar o Skype 32bits no seu Ubuntu 64bits.

Abra um terminal (Aplica&ccedil;&otilde;es -> Acess&oacute;rios -> Terminal) e 
v&aacute; at&eacute; a pasta onde se localiza o Skype que voc&ecirc; acabou de 
fazer download. Digite o comando:

$ sudo dpkg --force-architecture -i skype*deb

Ir&aacute; pedir a senha de seu usu&aacute;rio. Digite-a ;p

--force-architecture, como j&aacute; nos faz entender, for&ccedil;a a 
instala&ccedil;&atilde;o de um pacote determinado a uma certa arquitetura, 
em uma diferente. No caso, um pacote de i386 sendo instalado num amd64 :D

Depois de instalado, tente executar. Ir&aacute; dar um erro de libraries.
Fa&ccedil;a o download s&oacute; script GetLibs em:

    * http://www.boundlesssupremacy.com/Cappy/getlibs/getlibs-all.deb 

Instale-o. Ap&oacute;s isso, digite, novamente no terminal:

$ sudo getlibs /usr/bin/skype

No terminal, ir&aacute; rodar algumas mensagens dizendo que algumas libraries 
foram instaladas e, possivelmente, lhe solicitar&aacute; autoriza&ccedil;&atilde;o 
para fazer downloads de algumas que faltam. N&atilde;o hesite em aceit&aacute;-las. 
Depois de tudo instalado, pronto!

Rode o Skype em Aplica&ccedil;&otilde;es -> Internet -> Skype, ou digitando skype 
no terminal.

    </pre>";


    $pg['topico'][] = 'Atualizar e verificar data e hora';
    $pg['texto'][] = "<pre>

Para atualizar a data e hora do pc :
[root@Centos ~]# ntpdate -u ntp.cbm.sc.gov.br
14 Sep 16:24:29 ntpdate[16819]: adjust time server 10.193.4.75 offset
0.012011 sec

Para verificar o horário no servidor :
[root@Centos ~]# ntpdate -q ntp.cbm.sc.gov.br
server 10.193.4.75, stratum 3, offset 0.000253, delay 0.02583
14 Sep 16:25:19 ntpdate[16823]: adjust time server 10.193.4.75 offset
0.000253 sec
    </pre>";


    $pg['topico'][] = 'Estrutura de Diretórios do Linux';
    $pg['texto'][] = "<pre>

Diretório  	Descrição
/bin 		Arquivos binários de comandos essenciais do sistema.
/boot 		Arquivos de boot (inicialização; boot-loader; Grub); kernel do Linux.
/dev 		Dispositivos (devices) de entrada/saída: floppy, hardisk, cdrom, modem .
/etc 		Arquivos de configuração (scripts) e inicialização.
/home 		Diretório local (home) de usuários.
/lib 		Bibliotecas e módulos(drives): compartilhadas com frequência.
/mnt 		Diretório de montagem de dispositivos, sistemas de arquivos e partição.
/opt 		Para instalação de programas não oficiais da distribuição.
/proc 		Diretório virtual (RAM) onde rodam os processos ativos.
/root 		Diretório local do superusuário (root).
/sbin 		Arquivos de sistema essenciais (binários do superusuário).
/tmp 		Arquivos temporários gerados por alguns utilitários.
/usr 		Arquivos de usuários nativos da distribuição (Unix System Resources).
/usr/local 	Para instalação de programas não oficiais da distribuição.
/usr/src 	Arquivos fontes do sistema necessários para compilar o kernel.
/var 		Arquivos de log e outros arquivos variáveis.
    </pre>";

require ('modulos/corpo.php');

?>