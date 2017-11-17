<?

    $pg['titulo'] = 'Migrar Dados';
    $pg['colspan'] = '1';

    $pg['topico'][] = 'Migrar dados de um servidor para outro';
    $pg['texto'][] = "<pre>

<b>1 dump completo do banco destino</b>

linux:~# mysqldump -u marceloawk -p --all-databases > /root/XXXXmysqlaaaammdd.sql
linux:~# mysqldump -u marceloawk -p --all-databases > /root/tro1mysql20100219.sql

<b>2 desligar o banco de dados do Sigat da máquina destino</b>

linux:~# vi /home/bicudo/object_libs/lib/conf/conf_bd.php

<b>3 selecionar lista de cidades que sairão do servidor origem e irão para o servidor destino</b>

8029	ARMAZEM
8053	BRACO DO NORTE
5545	CAPIVARI DE BAIXO
8121	GRAVATAL
8141	IMARUI
8173	JAGUARUNA
8185	LAGUNA
8243	PEDRAS GRANDES
5547	SANGAO
8313	SAO BONIFACIO
8337	SAO MARTINHO
4368	TRÊS DE MAIO

<b>4 Usar a ferramenta de dump dos dados da cidade na máquina de homologacao</b>

https://10.193.4.53/sigat/modulos/gerencial/portabilidade.php

Siga com os procedimentos do sistema para extração dos dados...

Aparecerá um relatório parecido como o abaixo

Portabilidade logado no banco fns1
PORTABILIDADE

Cidades 8029 8053 5545 8121 8141 8173 8185 8243 5547 8313 8337 4368
Bancos ACESSOS COBRANCA EDIFICACOES FUNCIONAMENTO HABITESE MANUTENCAO PROJETO SOLICITACAO

Exclusão dos dados

SET FOREIGN_KEY_CHECKS=0
delete from ACESSOS.CIDADES_GBM where ID_CIDADE in (8029, 8053, 5545, ...
SET FOREIGN_KEY_CHECKS=1

Exclusão dos usuários

delete from ACESSOS.CIDADES_USR where ACESSOS.CIDADES_USR.ID_USUARIO = 'al...

Gerando o dumping, aguarde por favor...
OK
dumping completo Arquivo SQL 

<b>5 Criar o arquivo com os ID das cidades</b>

dumping20100219_8029_8053_5545_8121_8141_8173_8185_8243_5547_8313_8337_4368.sql

<b>6 Mandar o dump dos dados das cidades da máquina de origem para a máquina de destino</b>

origem# scp dumping20100219_8029_8053_5545_8121_8141_8173_8185_8243_5547_8313_8337_4368.sql root@tro1:

<b>7 Excluir do banco de origem os relacionamentos dos usuários e cidades em questão</b>

Executar o código de exclusão gerado no sistema de portabilidade usando o phpmyadmin da homolog

delete from ACESSOS.CIDADES_USR where ACESSOS.CIDADES_USR.ID_USUARIO = 'alessandro' and ACESSOS.CIDADES_USR.ID_CIDADE = 8029;
delete from ACESSOS.CIDADES_USR where ACESSOS.CIDADES_USR.ID_USUARIO = 'amartins' and ACESSOS.CIDADES_USR.ID_CIDADE = 8029;
delete from ACESSOS.CIDADES_USR where ACESSOS.CIDADES_USR.ID_USUARIO = 'diogo' and ACESSOS.CIDADES_USR.ID_CIDADE = 8029;
delete from ACESSOS.CIDADES_USR where ACESSOS.CIDADES_USR.ID_USUARIO = 'eron' and ACESSOS.CIDADES_USR.ID_CIDADE = 8029;
...
delete from ACESSOS.CIDADES_USR where ACESSOS.CIDADES_USR.ID_USUARIO = 'oscar' and ACESSOS.CIDADES_USR.ID_CIDADE = 8337;
delete from ACESSOS.CIDADES_USR where ACESSOS.CIDADES_USR.ID_USUARIO = 'pavanati' and ACESSOS.CIDADES_USR.ID_CIDADE = 8337;
delete from ACESSOS.CIDADES_USR where ACESSOS.CIDADES_USR.ID_USUARIO = 'rabelo' and ACESSOS.CIDADES_USR.ID_CIDADE = 8337;
delete from ACESSOS.CIDADES_USR where ACESSOS.CIDADES_USR.ID_USUARIO = 'viana' and ACESSOS.CIDADES_USR.ID_CIDADE = 8337;

<b>8 Excluir do banco destino os dados antigos pertencentes as cidades em questão</b>

Criar o arquivo sh de exclusão:

destino# echo \"SET FOREIGN_KEY_CHECKS=0;
delete from ACESSOS.CIDADES_GBM where ID_CIDADE in (8029, 8053, 5545, 8121, 8141, 8173, 8185, 8243, 5547, 8313, 8337, 4368);
delete from ACESSOS.CIDADES_USR where ID_CIDADE in (8029, 8053, 5545, 8121, 8141, 8173, 8185, 8243, 5547, 8313, 8337, 4368);
delete from COBRANCA.COBRANCA_BOLETO where ID_CIDADE in (8029, 8053, 5545, 8121, 8141, 8173, 8185, 8243, 5547, 8313, 8337, 4368);
...
delete from SOLICITACAO.SOLIC_FUNCIONAMENTO where ID_CIDADE in (8029, 8053, 5545, 8121, 8141, 8173, 8185, 8243, 5547, 8313, 8337, 4368);
delete from SOLICITACAO.SOLIC_HABITESE where ID_CIDADE in (8029, 8053, 5545, 8121, 8141, 8173, 8185, 8243, 5547, 8313, 8337, 4368);
delete from SOLICITACAO.SOLIC_MANUTENCAO where ID_CIDADE in (8029, 8053, 5545, 8121, 8141, 8173, 8185, 8243, 5547, 8313, 8337, 4368);
SET FOREIGN_KEY_CHECKS=1;\" > /root/excluir20100219_8029_8053_5545_8121_8141_8173_8185_8243_5547_8313_8337_4368.sh

Entrar no banco
destino# mysql -u marceloawk -p

mysql> source /root/excluir20100219_8029_8053_5545_8121_8141_8173_8185_8243_5547_8313_8337_4368.sh
Query OK, 0 rows affected (0.00 sec)
Query OK, 0 rows affected (0.02 sec)
Query OK, 437 rows affected (0.23 sec)
Query OK, 8 rows affected (0.03 sec)
Query OK, 161 rows affected (0.45 sec)
Query OK, 1742 rows affected (20.88 sec)
Query OK, 365 rows affected (0.08 sec)
Query OK, 394 rows affected (0.70 sec)
Query OK, 42 rows affected (0.05 sec)
Query OK, 367 rows affected (0.06 sec)
Query OK, 622 rows affected (10.72 sec)
Query OK, 1831 rows affected (1 min 3.98 sec)
Query OK, 381 rows affected (2.07 sec)
Query OK, 1418 rows affected (14.92 sec)
Query OK, 0 rows affected (0.11 sec)
Query OK, 0 rows affected (0.05 sec)
Query OK, 1585 rows affected (13.30 sec)
Query OK, 1704 rows affected (20.90 sec)
Query OK, 111 rows affected (1.71 sec)
Query OK, 155 rows affected (3.37 sec)
Query OK, 1 row affected (0.46 sec)
Query OK, 0 rows affected (1.67 sec)
Query OK, 408 rows affected (10.23 sec)
Query OK, 259 rows affected (4.10 sec)
Query OK, 0 rows affected (0.10 sec)
Query OK, 1634 rows affected (5.33 sec)
Query OK, 0 rows affected (0.07 sec)
Query OK, 289 rows affected (13.95 sec)
Query OK, 1609 rows affected (43.47 sec)
Query OK, 111 rows affected (1.89 sec)
Query OK, 3 rows affected (0.57 sec)
Query OK, 0 rows affected (0.00 sec)
mysql>

<b>9 Colocar os novos dados no banco destino</b>

mysql> source dumping20100219_8029_8053_5545_8121_8141_8173_8185_8243_5547_8313_8337_4368.sql
Query OK, 0 rows affected (0.02 sec)
Query OK, 0 rows affected (0.00 sec)
Query OK, 0 rows affected (0.00 sec)
...
ERROR 1046 (3D000): No database selected
ERROR 1046 (3D000): No database selected
ERROR 1046 (3D000): No database selected
ERROR 1046 (3D000): No database selected
Query OK, 0 rows affected (0.00 sec)
Query OK, 0 rows affected (0.00 sec)
Query OK, 0 rows affected (0.00 sec)
mysql>

<b>10 Trocar no banco FNS1 a associação de cidades X servidores</b>

Servidor: fns1.cb.sc.gov.br  -   Banco de Dados: CADASTROS  -   Tabela: TP_SERVIDOR 

ID_SERVIDOR 	    NM_SERVIDOR 		    NM_IP 	    NM_HOST

 2  		Operacional - FNS1  		10.193.255.6  	fns1.cb.sc.gov.br
 3 		Florianópolis (Trindade) 	10.193.55.253 	tde1.cb.sc.gov.br
12 		Criciúma 			10.194.1.121 	cua1.cb.sc.gov.br
 5 		Lages 				10.193.66.251 	lgs1.cb.sc.gov.br
 6 		Chapecó 			10.193.72.251 	cco1.cb.sc.gov.br
 7 		Blumenau 			10.194.1.253 	bnu1.cb.sc.gov.br
 8 		Brusque 			10.193.83.251 	bqe1.cb.sc.gov.br
 9 		Curitibanos 			10.193.67.251 	cbs1.cb.sc.gov.br
10 		Itajaí 				10.193.78.251 	iai1.cb.sc.gov.br
11 		Balneário Camboriú 		10.193.61.251 	bcu1.cb.sc.gov.br
14 		Tubarão 			10.194.2.251 	tro1.cb.sc.gov.br
15 		Canoinhas 			10.193.18.251 	cna1.cb.sc.gov.br

Usando o phpmyadmin, executar o comando abaixo utilizando as referidas cidades e o código
do novo servidor. Neste caso o servidor é o de Tubarão ID_SERVIDOR = 14.

consulta SQL:
UPDATE CADASTROS.CIDADE_SERVIDOR SET ID_SERVIDOR = '14' WHERE CIDADE_SERVIDOR.ID_CIDADE 
in (8029,8053,5545,8121,8141,8173,8185,8243,5547,8313,8337,4368);
Registro(s) afetado(s): 12 (Consulta levou 0.0005 segundos)

<b>11 Atualizar a tabela de privilégios dos usuários do banco destino</b>

mysql> flush privileges;


<b>12 Levantar o sigat da máquina destino</b>

destino# vi /home/bicudo/object_libs/lib/conf/conf_bd.php

 <center>- - - - - - F i m - - - - - - </center>
    </pre>";

require './modulos/corpo.php';

?>