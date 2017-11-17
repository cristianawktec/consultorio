<?

    $pg['titulo'] = 'PHP';
    $pg['colspan'] = '1';

    $pg['topico'][] = '';
    $pg['texto'][] = '<pre>
	</pre>';

    $pg['topico'][] = 'PostgreSQL 8.4 com codificação LATIN1';
    $pg['texto'][] = '<pre>
PostgreSQL com encoding LATIN1

Testado no ubuntu

1º PASSO - Instalar o postgresql-8.4

# apt-get install postgresql-8.4

2º PASSO - Apagar todo o conteudo do diretório "/var/lib/postgresql/8.4/main"

# rm -rf /var/lib/postgresql/8.4/main/*

3º PASSO - Faça o login com o usuário postgres

# su - postgres

4º PASSO - Gerar o novo conteudo do diretório "/var/lib/postgresql/8.4/main" com a codificação LATIN1

$ /usr/lib/postgresql/8.4/bin/initdb --pgdata=/var/lib/postgresql/8.4/main/ --encoding=LATIN1 --locale=C --username=postgres -W

Obs: vai pedir uma senha para o super-usuario do banco. Digite \'postgres\'.

5º PASSO - Saia do usuario \'postgres\' e crie os links simbolicos

$ exit

# ln -s /etc/postgresql-common/root.crt /var/lib/postgresql/8.4/main/root.crt
# ln -s /etc/ssl/certs/ssl-cert-snakeoil.pem /var/lib/postgresql/8.4/main/server.crt
# ln -s /etc/ssl/private/ssl-cert-snakeoil.key /var/lib/postgresql/8.4/main/server.key

6º PASSO - Reiniciar a maquina

# reboot;
</pre>';

require './modulos/corpo.php';

?>