<?

    $pg['titulo'] = 'Crontab';
    $pg['colspan'] = '1';

	$texto001 = '<pre>

O "cron" é um programa de "agendamento de tarefas". Com ele você pode programar para ser executado 
qualquer coisa numa certa periodicidade ou até mesmo em um exato dia, numa exata hora. Um uso bem 
comum do cron é o agendamento de tarefas administrativas de manutenção do seu sistema, como por 
exemplo, procura por links simbólicos quebrados, análise de segurança do sistema, backup, entre 
outros. Estas tarefas são programadas para todo dia, toda semana ou todo mês, serem automaticamente 
executadas através do crontab e um script shell comum. A configuração do cron geralmente é chamada de crontab.

Os sistemas Linux possuem o cron sempre presente. Pelo menos eu nunca vi nenhuma distribuição que não 
incluísse o tão útil cron. A configuração tem duas partes: Uma global, e uma por usuário. Na global, 
que é o root quem controla, o crontab pode ser configurado para executar qualquer tarefa de qualquer 
lugar, como qualquer usuário. Já na parte por usuário, cada usuário tem seu próprio crontab, sendo 
restringido apenas ao que o usuário pode fazer (e não tudo, como é o caso do root).

Para configurar um crontab por usuário, utiliza-se o comando "crontab", junto com um parâmetro, 
dependendo do que você quiser fazer. Abaixo uma relação:

Comando	Função
crontab -e	Edita o crontab atual do usuário
crontab -l	Exibe o atual conteúdo do crontab do usuário
crontab -r	Remove o crontab do usuário

Se você quiser verificar os arquivos crontab dos usuários, você precisará ser root. O comando crontab coloca 
os arquivos dos usuários no diretório:

/var/spool/cron/usuario

Onde "usuario" corresponde ao usuário dono do arquivo crontab.

Agora se você quiser editar o crontab global, este fica no arquivo "/etc/crontab", e só pode ser manipulado pelo root. 
E agora que já sabemos onde ficam os arquivos de configuração, vamos estudar o formato da linha do crontab, que é 
quem vai dizer o que executar e quando. Vamos ver um exemplo:

0	4	*	*	*	who

Então como se pode ver, a linha é dividida em 6 campos separados por tabs ou espaço:
Campo	Função
1o.	Minuto
2o.	Hora
3o.	Dia do mês
4o.	Mês
5o.	Dia da semana
6o.	Programa pra execução

Todos estes campos, sem contar com o 6o., são especificados por números. Veja a tabela abaixo para os valores destes campos:
Campo	Função
Minuto	0-59
Hora	0-23
Dia do mês	1-31
mês	1-12
Dia da semana	0-6 (o "0" é domingo, "1" segunda, etc)

Então o que nosso primeiro exemplo estava dizendo? A linha está dizendo: "Execute o comando \'who\' todo dia de 
todo mês sendo o dia qualquer dia da semana, às 4 horas e 0 minutos.". Vamos pegar mais exemplos para analisar:

1,21,41	*	*	*	*	echo "Meu crontab rodou mesmo!"

Aqui está dizendo: "Executar o comando do sexto campo toda hora, todo dia, nos minutos 1, 21 e 41".

30	4	*	*	1	rm -rf /tmp/*

Aqui está dizendo: "Apagar todo conteúdo do diretório /tmp toda segunda-feira, as 4:30 da manhã.".

45	19	1,15	*	*	/usr/local/bin/backup

Aqui está dizendo: "Executar o comando \'backup\' todo dia 1 e 15 às 19:45.".

E assim você pode ir montando inúmeros jeitos de agendamento possível. No arquivo do crontab global, o sexto campo 
pode ser substituído pelo nome do usuário, e um sétimo campo adicionado com o programa para a execução, como mostro 
no exemplo a seguir:

0-59/5 * * * * root /usr/bin/mrtg /etc/mrtg/mrtg.cfg

Aqui está dizendo: "Executar o mrtg como usuário root, durante 5 e 5 minutos dos minutos 0-59. Ou seja, executar 
de 5 em 5 minutos o mrtg sempre.".

Em alguma distribuições, os agendamentos mais comuns estão programados para serem executados. Veja as linhas abaixo:

01	*	*	*	*	root	run-parts /etc/cron.hourly
02	4	*	*	*	root	run-parts /etc/cron.daily
22	4	*	*	0	root	run-parts /etc/cron.weekly
42	4	1	*	*	root	run-parts /etc/cron.monthly

O programa "run-parts" executa todos os scripts executáveis dentro de um certo diretório. Então com essas linhas, 
temos diretórios programados para executar programas de hora em hora, diariamente, semanalmente ou mensalmente. 
Abaixo a tabela:
diretório	Período
/etc/cron.hourly	De hora em hora
/etc/cron.daily	Diariamente
/etc/cron.weekly	Semanalmente
/etc/cron.monthly	Mensalmente

Então todos os arquivos executáveis dentro de cada diretório serão executados no seu correspondente período. 
Ou seja, posso colocar um certo conteúdo no arquivo "/etc/cron.daily/teste", depois torná-lo executável através 
do comando "chmod +x /etc/cron.daily/teste", e Então ele será executado todo dia as 4:02 da manhã.

Parâmetros

-l usuário -- lista as tarefas agendadas para o usuário
-e usuário -- edita o agendador
-d usuário -- apaga o arquivo do usuário
-c diretório -- especifica um diretório para o Crontab

Sintaxe:

Dentro do arquivo que se abre após o comando existe uma sintaxe conforme a seguir:

mm hh dd MM ss script

onde

mm = minuto(0-59)
hh = hora(0-23)
dd = dia(1-31)
MM = mes(1-12)
ss = dia_da_semana(1-7)
script = comando a ser executado.
Obs 1: Em dia_da_Semana, 1 refere-se a domingo; e 7, ao sábado. 
       No caso de dia da semana funciona também as trás primeiras letras 
       (em inglês) do dia da semana (SUN,MON,TUE,WED,THU,FRI,SAT)
Obs 2: Em qualquer posição pode-se usar o * (asterisco) quando não se 
       importar com o campo em questão.
Obs 3: Pode-se utilizar intervalos nesses campos. O caracter para intervalo
       é o - (hifen).
Obs 4: Pode-se utilizar lista de valores nesses campos. O caracter para a
       lista á a , (vírgula).
Obs 5: Qualquer texto colocado após o programa que será executado será
       considerado comentário e não será interpretado pelo cron

Seguem alguns exemplos:

Todo dia de hora em hora (hora cheia)
  00 * * * * /bin/script
De cinco em cinco minutos todos os dias (note a divisão por 5 do intervalo 00-59)
  00-59/5 * * * * /bin/script
Nas seguintes horas: 10, 12, 16, 18, 22 aos 15 minutos da hora
  15 10,12,16,18,22 * * * /bin/script
Nos primeiros cinco dias do mês às 19:25
  25 19 01-05 * * /bin/script
De segunda a sexta ao meio-dia e a meia-noite
  00 00,12 * * 2-6 /bin/script
Script rodar Segunda,Quarta,Sexta às 2 horas
   0 2 * * mon,wed,fri /bin/script
Script para rodar Terça,Quinta às 3 horas
   0 3 * * tue,thu /bin/script

</pre>';

//require './modulos/corpo.php';

?>
<fieldset>
<legend><?=$pg['titulo']?></legend>
    <table width="100%" border="0">
        <? $cs = 1; ?>
        <tr> 
            <td valign="top"><?=$texto001?>&nbsp;</td>
        </tr> 
    </table>
</fildset>