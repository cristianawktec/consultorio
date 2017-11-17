<?

    $pg['titulo'] = 'Erros e Falhas no ClicConsultório';
    $pg['colspan'] = '1';


    $pg['topico'][] = 'Erro Duplicate entry \' : BD com chave primaria estourada \'ID\' ';
    $pg['texto'][] = '<pre>


Aviso: <b>Se não sabe não mexa!!!</b>

Tags: 

\'ID\'
Paciente/Médico
Duplicate entry \'2147483647\' for key 1
Duplicate entry \'xxxxx\' for key 1  

1 Entrar no servidor e ordernar a chave em ordem decrescente e ver o maior registro.
2 Apagar o Maior registro.TODOS se repetidos.
3 Em Operações alterar a cahve do Alto Incremento (AUTO_INCREMENT) para o número seguinte ao maior número a chave válida!
4 Rebotar o mysql.

Motivos do problema: Ao criar um campo no Banco de Dados este tem um tamanho que não pode ser ultrapassado. Se o campo é INTEIRO , FLOAT, DOUBLE

</pre>';

    $pg['topico'][] = 'Erros no PDF';
    $pg['texto'][] = '<pre>

<b>Não é possível gerar o PDF</b>
Possível solução para validar a geração de pdf (console):
chown -R www-data:www-data /var/www/ 

<b>PDF é gerado sem valores ou informação</b>
Possível solução: copiar o .php correspondente de uma máquina que está gerando corretamente.
</pre>';

    $pg['topico'][] = 'NA PRIMEIRA NO BIND ANONIMO';
    $pg['texto'][] = '<pre>

Possível solução:
1 Verificar ip e hostname
2 Verificar ip e hostname do banco vim /conexao.php
3 Ou olhar o resolv.conf
</pre>';


    $pg['topico'][] = 'Outros';
    $pg['texto'][] = '<pre>

<b>SE O PROBLEMA NÃO TEVE UM SOLUÇÃO, RELAXE! VÁ TOMAR UM CAFÉ E AREJAR SUA CABEÇA. ÓTIMAS IDÉIAS VIRÃO E LOGO UMA SOLUÇÃO APARECERÁ!</b>
</pre>';
    
require './modulos/corpo.php';

?>