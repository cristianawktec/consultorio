<?

    $pg['titulo'] = 'Aprenda a ler os RET\'s dos Uploads';
    $pg['colspan'] = '1';

    $pg['topico'][] = 'RET - UPLOAD BANCO DO BRASIL  convênio 6 / carteira 18';

    $pg['texto'][] = '<pre>

Agen     - Agencia
G        - DV Agencia
Contacor - Conta CC
X        - DV CC
Conven   - Convenio
Cida     - Cidade
T        - Tipo Funcionamento-Manutenção-Projeto-Habitese
21       - identifica o RET como 6/18


                          <u>Agen</u><b>G</b>Contacor<b>X</b><u>Conven</u>
02RETORNO01COBRANCA       <u>1489</u><b>3</b>00057121<b>0</b><u>597804</u>PREFEITURA MUNICIPAL DE BALNEA001BANCO DO BRASIL2605100000336  000000559204800417 000001

                 <u>Agen</u><b>G</b>Contacor<b>X</b><u>Conven</u><b>21</b>      <u>Cida</u><b>T</b>  
10000000000000000<u>1489</u><b>3</b>00057121<b>0</b><u>597804</u><b>21</b>      <u>8039</u><b>1</b>01894707355400000000000010000001   019000000 0000000000 1806260510000000000000100000
01000000000000000547100117078002705100000280000000000000000000000000000000000000000000000000000000000000000000000000005650000000000017
000000000000000000000000000000000000537020000000000000          0000000000000000000000000000000000000000000000000008000002

</pre>';


    $pg['topico'][] = 'RET - UPLOAD CAIXA ECONÔMICA FEDERAL';

    $pg['texto'][] = '<pre>

Ban           - Banco
Agenc         - Agencia
G             - DV Agencia
C             - Tipo da empresa CNPJ(2) CPF(1) 
Inscricaoempr - Inscricao da empresa
Conven        - Convênio


HEADER
<u>Ban</u>              <b>C</b><u>Inscricaoempre</u>                    <u>Agenc</u><b>G</b><u>Conven</u>
<u>104</u>00000         <b>2</b><u>83102384000180</u>00000000000000000000<u>00413</u><b>8</b><u>220431</u>00000000PM  DE CANOINHAS C ECON FEDERAL    21904201001534300002104000000  
RETORNO-PRODUCAO 000

SEGMENTO 1            
<u>Ban</u>              <b>C</b> <u>Inscricaoempr</u>                     <u>Agenc</u><b>G</b><u>Conven</u>
<u>104</u>00011T0100030 <b>2</b>0<u>8310238400018</u>000000000000000000000<u>00413</u><b>8</b><u>220431</u>00000000PM  DE CANOINHAS   00000021190420100000000000   00   

SEGMENTO T            
<u>Ban</u>                    <u>Conven</u>  
<u>104</u>0001300001T 06000000<u>220431</u>0000000   240000008073150737100000000000000022042010000000000006385000004130000000000000000 09 0000000000000
000 000000000000 320030100                     

SEGMENTO U
<u>Ban</u>
<u>104</u>0001300002U 06000000000000000000000000000000000000000000000000000000000000000000000006385000000000006385000000000000000000000000000000
190420101904201000001904201000000000000000000000000000000000000000000000000000000000000000000000    

</pre>';


require './modulos/corpo.php';

?>