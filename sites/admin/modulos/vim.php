<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 05/10/2016
 * Time: 20:25
 */

$texto001 = '<pre>

O editor de texto preferido de 1 entre cada 10 usuarios UNIX eh o vim :p
A sintaxe para executar o vim eh a seguinte:

$ vim nome_do_arquivo

Uma vez carregado o vim, veja abaixo uma lista dos principais comandos:

Observacao:
Para passar para o modo comando pressione ESC.

Comandos basicos de insercao de texto:
i	Insere texto antes do cursor
v	Passa para o modo visual.

Comandos basicos para localizar texto:
/ texto /	Buscar o texto indicado.
/palavra	Busca pela palavra ou caracter em todo o texto
?palavra	Move o cursor para a ocorrencia anterior da palavra
n	Repete o ultimo comando / ou ?
N	Repete o ultimo comando / ou ? , na direcao reversa
Ctrl+g	Mostra o nome do arquivo, o numero da linha corrente e o total de
linhas


Comandos para salvar o texto:
:wq	Salva o arquivo e sai do editor
:w nome_do_arquivo 	Salva o arquivo corrente com o nome especificado
:w! nome_do_arquivo	Salva o arquivo corrente no arquivo especificado
:q	Sai do editor
:q!	Sai do editor sem salvar as alteracoes realizadas


</pre>';
?>
<fieldset>
    <legend>Comandos VIM</legend>
    <table width="100%" border="0">
        <? $cs = 1; ?>
        <tr>
            <th colspan="<?=$cs?>">VIM - comandos</th>
        <tr>
        <tr>
            <td valign="top"><?=$texto001?>&nbsp;</td>
        </tr>
    </table>
    </fildset>
