<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 15/12/2016
 * Time: 20:17
 */
$pg['titulo'] = 'GIT';
$pg['colspan'] = '1';

$pg['topico'][] = 'Gerando Sua Chave Pública SSH';
$pg['texto'][] = '<pre>

    <b>Gerando Sua Chave Pública SSH</b>
<p>
    Vários servidores Git autenticam usando chaves públicas SSH. Para fornecer uma chave pública,</br>
    cada usuário no seu sistema deve gerar uma se eles ainda não a possuem. Este processo é similar</br>
    entre os vários sistemas operacionais. Primeiro, você deve checar para ter certeza que você ainda não</br>
    possui uma chave. Por padrão, as chaves SSH de um usuário são armazenadas no diretório ~/.ssh. Você pode</br>
    facilmente verificar se você tem uma chave indo para esse diretório e listando o seu conteúdo:</br>
            <p>
            $ cd ~/.ssh
            $ ls
            authorized_keys2  id_dsa       known_hosts
            config            id_dsa.pub
<p><p>

    Você está procurando por um par de arquivos chamados algo e algo.pub, onde algo é normalmente id_dsa ou id_rsa.
    O arquivo .pub é a sua chave pública, e o outro arquivo é a sua chave privada. Se você não tem estes arquivos
    (ou não tem nem mesmo o diretório .ssh), você pode criá-los executando um programa chamado ssh-keygen, que é fornecido
    com o pacote SSH em sistemas Linux/Mac e vem com o pacote MSysGit no Windows:
    <p>
            $ ssh-keygen
            Generating public/private rsa key pair.
            Enter file in which to save the key (/Users/schacon/.ssh/id_rsa):
            Enter passphrase (empty for no passphrase):
            Enter same passphrase again:
            Your identification has been saved in /Users/schacon/.ssh/id_rsa.
            Your public key has been saved in /Users/schacon/.ssh/id_rsa.pub.
            The key fingerprint is:
            43:c5:5b:5f:b1:f1:50:43:ad:20:a6:92:6a:1f:9a:3a schacon@agadorlaptop.local

     <p><p>
     Primeiro ele confirma onde você quer salvar a chave (.ssh/id_rsa), e então pergunta duas vezes por uma senha,
     que você pode deixar em branco se você não quiser digitar uma senha quando usar a chave.

    Agora, cada usuário que executar o comando acima precisa enviar a chave pública para você ou para o administrador
    do seu servidor Git (assumindo que você está usando um servidor SSH cuja configuração necessita de chaves públicas).
    Tudo o que eles precisam fazer é copiar o conteúdo do arquivo .pub e enviar para você via e-mail. As chaves públicas
    são parecidas com isso.<p><p>

                $ cat ~/.ssh/id_rsa.pub
                ssh-rsa AAAAB3NzaC1yc2EAAAABIwAAAQEAklOUpkDHrfHY17SbrmTIpNLTGK9Tjom/BWDSU
                GPl+nafzlHDTYW7hdI4yZ5ew18JH4JW9jbhUFrviQzM7xlELEVf4h9lFX5QVkbPppSwg0cda3
                Pbv7kOdJ/MTyBlWXFCR+HAo3FXRitBqxiX1nKhXpHAZsMciLq8V6RjsNAQwdsdMFvSlVK/7XA
                t3FaoJoAsncM1Q9x5+3V0Ww68/eIFmb1zuUFljQJKprrX88XypNDvjYNby6vw/Pb0rwert/En
                mZ+AW4OZPnTPI89ZPmVMLuayrD2cE86Z/il8b+gw3r3+1nKatmIkjn2so1d01QraTlMqVSsbx
                NrRFi9wrf+M7Q== schacon@agadorlaptop.local

</pre>';

$pg['topico'][] = 'Básico de Branch e Merge';
$pg['texto'][] = '<pre>

    <b>Básico de Branch e Merge</b>

    Vamos ver um exemplo simples de uso de branch e merge com um fluxo de trabalho que você
    pode usar no mundo real. Você seguirá esses passos:</br>

        1. Trabalhar em um web site.
        2. Criar um branch para uma nova história em que está trabalhando.
        3. Trabalhar nesse branch.
        <p>
        Nesse etapa, você receberá um telefonema informando que outro problema crítico existe
        e precisa de correção. Você fará o seguinte:
        <p>
        1. Voltar ao seu branch de produção.
        2. Criar um branch para adicionar a correção.
        3. Depois de testado, fazer o merge do branch da correção, e enviar para produção.
        4. Retornar à sua história anterior e continuar trabalhando.




</pre>';

require './modulos/corpo.php';
?>
