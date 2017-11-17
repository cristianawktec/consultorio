    <?php
    // Variavel $email recebendo o e-mail
    $meuemail = '34 - maciel';
    // Variavel aux fazendo o explode separando pelo caracter '@'
    $aux = explode('-',$meuemail);
    // Exibe o e-mail completo na tela sem cortes
    echo "E-mail completo: ".$meuemail."\n";
    // Exibe somente o username do e-mail
    echo "User do e-mail: ".$aux[0]."\n";
    // Exibe somente o hostname do e-mail
    echo "Hostname do e-mail: ".$aux[1];
    ?>