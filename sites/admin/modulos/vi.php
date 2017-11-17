<?
$texto001 = '<pre>

O editor de texto preferido de 9 entre cada 10 usuarios UNIX eh o vi.
A sintaxe para executar o vi eh a seguinte:

$ vi nome_do_arquivo

Uma vez carregado o vi, veja abaixo uma lista dos principais comandos:

Observacao:
Para passar para o modo comando pressione ESC.

Comandos basicos de insercao de texto:
i	Insere texto antes do cursor
a	Insere texto depois do cursor
r	Insere texto no início da linha onde se encontra o cursor
A	Insere texto no final da linha onde se encontra o cursor
o	Adiciona linha abaixo da linha atual
O	Adiciona linha acima da linha atual
Ctrl + h	Apaga o ultimo caracter

Comandos basicos de movimentacao:
Ctrl+f	Move o cursor para a proxima tela
Ctrl+b	Move o cursor para a tela anterior
H	Move o cursor para a primeira linha da tela
M	Move o cursor para o meio da tela
L	Move o cursor para a ultima linha da tela
h	Move o cursor um caracter a esquerda
j	Move o cursor para a proxima linha
k	Move o cursor para linha anterior
l	Move o cursor um caracter a direita
w	Move o cursor para o inicio da proxima palavra (Ignora a pontuacao)
W	Move o cursor para o inicio da proxima palavra (Nao ignora a pontuacao)
b	Move o cursor para o inicio da palavra anterior (Ignora a pontuacao)
B	Move o cursor para o inicio da palavra anterior (Nao ignora a pontuacao
0	Move o cursor para o inicio da linha atual
^	Move o cursor para o primeiro caracter nao branco da linha atual
$	Move o cursor para o final da linha atual
nG	Move o cursor para a linha n
G	Move o cursor para a ultima linha do arquivo

Comandos basicos para localizar texto:
/palavra	Busca pela palavra ou caracter em todo o texto
?palavra	Move o cursor para a ocorrencia anterior da palavra
n	Repete o ultimo comando / ou ?
N	Repete o ultimo comando / ou ? , na direcao reversa
Ctrl+g	Mostra o nome do arquivo, o numero da linha corrente e o total de 
linhas

Comandos basicos para alteracao de texto:
x	Deleta o caracter que esta sob o cursor
dw	Deleta a palavra, da posicao atual do cursor ate o final
dd	Deleta a linha atual
D	Deleta a linha a partir da posicao atual do cursor ate o final
rx	Substitui o caracter sob o cursor pelo especificado em x(é opcional 
indicar 
o caracter)
Rx	Substitui a palavra sob o cursor pela palavra indicada em x
u	Desfaz a ultima modificacao
U	Desfaz todas as modificacoes feitas na linha atual
J	Une a linha corrente a proxima
s:/palavra1/palavra2	Substitui a primeira ocorrencia de "palavra1" por 
"palavra2"

Comandos para salvar o texto:
:wq	Salva o arquivo e sai do editor
:w nome_do_arquivo 	Salva o arquivo corrente com o nome especificado
:w! nome_do_arquivo	Salva o arquivo corrente no arquivo especificado
:q	Sai do editor
:q!	Sai do editor sem salvar as alteracoes realizadas


</pre>';
?>
<fieldset>
<legend>Comandos VI</legend>
    <table width="100%" border="0">
        <? $cs = 1; ?>
        <tr>
            <th colspan="<?=$cs?>">VI - comandos</th>
        <tr>
        <tr> 
            <td valign="top"><?=$texto001?>&nbsp;</td>
        </tr> 
    </table>
</fildset>
