<?

    $pg['titulo'] = 'Aprenda com o Guru';
    $pg['colspan'] = '1';


    $pg['topico'][] = 'Criar link simbólico';
    $pg['texto'][] = '<pre>

ln -s gnome-screensaver-preferences.desktop gnome-screensaver-prefs.desktop

</pre>';

    $pg['topico'][] = 'Instalar o PgAdmin3 no BigLinux';
    $pg['texto'][] = '<pre>

Nesta distribuição, para funcionar o PostgreSQL é necessário também:

apt-get install xscreensaver-data-extra xscreensaver-gl-extra
apt-get install pgadmin3

</pre>';

    $pg['topico'][] = 'Executar rsync sem senha';
    $pg['texto'][] = '<pre>

O Rsync usa a senha do ssh, portanto.

1 - apt-get install ssh sshpass rsync
2 - ssh usuario@10.193.x.y (para pegar criptografia)
3 - sshpass -p senha rsync -Cravzp usuario@10.193.x.y/diretorio /diretorio

obs: mais fácil que isso não existe na internet. No linux, o pouco que você sabe, faça bem.

</pre>';

require './modulos/corpo.php';

?>