<?

$pg['titulo'] = 'PHP';
$pg['colspan'] = '1';

$pg['topico'][] = 'MySQL: Failed Registration of InnoDB as a Storage Engine';
$pg['texto'][] = '<pre>

    [root@root]$ /etc/init.d/mysql start
    Satarting MySQL......                  [FAILED]
    [root@root]$


    <b>While the cause of MySQL’s failure to start is obvious from the log file, this is often overlooked.</b>

<b>There are two solutions to this particular problem:</b>

Restore the my.cnf file to its original state, with an innodb_log_file_size equal to the <p>
actual size of the existing InnoDB log files.
<p>
Rename or move both the ./ib_logfile0 and ./ib_logfile1 files, and then start the MySQL server.

</pre>';

$pg['topico'][] = 'utf-8 charset de uma aplicação PHP';
$pg['texto'][] = '<pre>

    * Definir o que &eacute; um TRIGGER;
    * Definir dados de antes (OLD) e depois (NEW);
    * Criar um TRIGGER;
    * Excluir um TRIGGER;
    * Restri&ccedil;&otilde;es em rela&ccedil;&atilde;o a TRIGGERS.

 - trabalham antes ou depois do evento
 - pode-se definir apenas um TRIGGER para cada evento

mysql> CREATE TABLE account (acct_num INT, amount DECIMAL(10,2));
Query OK, 0 rows affected (0.03 sec)

CREATE
  [DEFINER = { user | CURRENT_USER }]
  TRIGGER trigger_name trigger_time trigger_event
  ON tbl_name FOR EACH ROW trigger_stmt

    * DEFINER: Quando o TRIGGER for disparado, esta opção será checada para 
checar com quais privilégios este será disparado. Utilizará os privilégios 
do usuário informado em user (´wagner´@´localhost´) ou os privilégios do 
usuário atual (CURRENT_USER). Caso essa sentença seja omitida da criação do 
TRIGGER, o valor padrão desta opção é CURRENT_USER();
    * trigger_name: define o nome do procedimento, por exemplo, trg_test;
    * trigger_time: define se o TRIGGER será ativado antes (BEFORE) ou depois 
(AFTER) do comando que o disparou;
    * trigger_event: aqui se define qual será o evento, INSERT, REPLACE, 
DELETE ou UPDATE;
    * tbl_name: nome da tabela onde o TRIGGER ficará "pendurado" aguardando o 
trigger_event;
    * trigger_stmt: as definições do que o o TRIGGER deverá fazer quando for 
disparado.


mysql> CREATE TRIGGER ins_sum BEFORE INSERT ON account
-> FOR EACH ROW SET @sum = @sum + NEW.amount;
Query OK, 0 rows affected (0.06 sec)

mysql> show triggers \G
*************************** 1. row *********************
  Trigger: ins_sum
    Event: INSERT
    Table: account
Statement: SET @sum = @sum + NEW.amount
   Timing: BEFORE
  Created: NULL
 sql_mode:
  Definer: marceloawk@localhost
1 row in set (0.00 sec)

<b>Corrigir problemas de socket e reduzir o banco</b>

root:~# cd /var/lib/mysql  

-rw-rw---- 1 mysql mysql  10M 2010-05-12 16:32 ibdata1
-rw-rw---- 1 mysql mysql 5,0M 2010-05-12 16:32 ib_logfile0
-rw-rw---- 1 mysql mysql 5,0M 2010-05-12 16:32 ib_logfile1


</pre>';

require './modulos/corpo.php';
?>
