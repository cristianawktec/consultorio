<?php 

$id = $_GET["id"];



?> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Pesquisa de Satisfa&ccedil;&atilde;o Cliente</title>

<style type="text/css">

body{background-color: #EEE;}

#pesquisa_cliente {padding: 10px;font-family:Arial, Helvetica, sans-serif; font-size: 12px; width: 400px; margin: 0 auto;  line-height: 20px;}

.texto {width: 200px; border: 1px solid #CCC; height: 15px; padding: 5px; min-height: 15px;}
.textarea {width: 200px; height: 80px; border: 1px solid #CCC; padding: 5px; font-family:Arial, Helvetica, sans-serif; font-size: 12px; min-height: 80px; max-height: 80px; max-width: 200px; min-width: 200px;}
#tabela {border: 1px solid #CCC; width: 500px;}
td {border-bottom: 1px solid #CCC;}

</style>

<script type="text/javascript">
   function mascaraData(camposemana){
              var semana = camposemana.value;
              if (semana.length == 2){
                  semana = semana + '/';
                  document.forms[0].semana.value = semana;
      return true;              
              }
              if (semana.length == 5){
                  semana = semana + '/';
                  document.forms[0].semana.value = semana;
                  return true;
              }
         }
		 
		 </script>

</head>

<body>


<div id="pesquisa_cliente">


<table border="0" id="tabela">.
<form id="pesquisa_cli" name="pesquisa_cli" method="POST" action="envia_pesquisa_cli.php?id=<?php echo $id; ?>">
  <tr>
    <td colspan="2"><strong>PESQUISA DE SATISFA&Ccedil;&Atilde;O</strong> </td>
    </tr>
  <tr>
    <td>Conversei com:<br />
<input type="text" name="cliente" class="texto" /></td>
    <td>
Semana Atendida:<br />
<input type="text" name="semana" class="texto" OnKeyUp="mascaraData(this);" maxlength="10" /></td>
  </tr>
  <tr>
    <td> Quantos alunos credenciados:
<br />
<input type="text" name="matriculas" class="texto" />
<br />
<strong>&Oacute;TIMO,  S&Atilde;O                    (n&ordm; alunos)&nbsp; ALUNOS QUE VAO SEM DUVIDA RECEBER UMA                  CAPACITA&Ccedil;&Atilde;O PARA UM FUTURO MELHOR:</strong></td>
    <td>
Acha que poderia chegar a 50 alunos credenciados em sua escola?<br />
<select name="matriculas1" style="border: 1px solid #ccc; height: 27px;">

<option value="Sim">Sim</option>
<option value="Não">N&atilde;o</option>

</select>
<br />
<strong>ENTENDO,  TAMB&Eacute;M                    ESPERAMOS, PORQUE EM OUTRAS REGI&Otilde;ES CHEGAMOS AO DOBRO                  DESSE CREDENCIAMENTO, MAS TUDO BEM..</strong></td>
  </tr>
  <tr>
    <td>O que faltou na sua vis&atilde;o?<br />
<textarea name="oquefaltou" class="textarea"></textarea></td>
    <td>Conforme o senhor combinou conosco, chegando a&iacute;, conseguimos realizar o projeto em todas as escolas?<br />
<select name="entrar_escolas"  style="border: 1px solid #ccc; height: 27px;">
<option value="Sim">Sim</option>
<option value="Não">N&atilde;o</option>
</select><br />
Se for n&atilde;o, por que?<br />
<input type="text" name="obs"  class="texto"/>
<br />
<strong>ENTENDO,  QUANTO                    MAIS ESCOLAS, MAIOR &Eacute; O NUMERO DE ALUNOS CREDENCIADOS AO                  PORTAL E NA SUA ESCOLA.</strong></td>
  </tr>
  <tr>
    <td valign="top">Na semana, foi tudo bem planejado pelo nosso representante para divulgar seus cursos:<br />

<select name="semana_aproveitada" style="border: 1px solid #ccc; height: 27px;">
<option value="Sim">Sim</option>
<option value="Não">N&atilde;o</option>
</select></td>
    <td>No Sábado, todos os pais que compareceram realizaram o credenciamento?<br />
<select name="matricula_pais" style="border: 1px solid #ccc; height: 27px;">
<option value="Sim">Sim</option>
<option value="Não">N&atilde;o</option>
</select><br />
Se for n&atilde;o: Consegue estimar um número ou porcentagem?<br />
<input type="text" name="numero_pct" class="texto" />
<br />
<strong>ESSES  S&Atilde;O                    OS PAIS QUE DIFICILMENTE VISAM O FUTURO, INCLUSIVE                  REAFIRMAMOS NOSSO COMPROMISSO DE SEMPRE FAZER                  CREDENCIAMENTOS COM ALUNOS POTENCIAIS, MUITOS N&Atilde;O FAZEM                  NA HORA E NEM FOR&Ccedil;AMOS, POIS SERIA UM ALUNO RUIM AO                  NOSSO PORTAL E TAMB&Eacute;M PARA SUA ESCOLA, ENTENDE</strong></td>
  </tr>
  <tr>
    <td>Você achou nosso refor&ccedil;o escolar inovador?<br />
<select name="projeto_inovador_cli" style="border: 1px solid #ccc; height: 27px;">
<option value="Sim">Sim</option>
<option value="Não">N&atilde;o</option>
</select></td>
    <td>E os alunos? Acha que foi algo novo para eles?<br />
<select name="projeto_inovador_alunos" style="border: 1px solid #ccc; height: 27px;">
<option value="Sim">Sim</option>
<option value="Não">N&atilde;o</option>
</select></td>
  </tr>
  <tr>
    <td>De 5 a 10, qual a sua nota para o Representante que realizou o credenciamento?<br />
<input type="text" name="nota" class="texto" /></td>
    <td>Alguma observa&ccedil;&atilde;o sobre o trabalho do mesmo?<br />
<textarea name="obs_gerente" class="textarea"></textarea></td>
  </tr>
  <tr>
    <td>Você indicaria a EDUCA GENESIS para alguma outra escola de informática se credenciar:<br />
<select name="indica"><option value="sim">Sim</option>
<option value="nao">Nâo</option>
</select>
<br />
<br /></td>
    <td> </td>
  </tr>
  <tr>
    <td colspan="2"><p><strong>INCLUSIVE                    PRETENDEMOS VOLTAR EM SUA CIDADE PARA TERMINAR O                  TRABALHO NA SEMANA DO ( falar a semana livre), PORQUE                  ESSA FOI A PRIMEIRA ETAPA, PARA VOC&Ecirc; VER O RESULTADO                  FINAL &Eacute; RECOMENDADO FAZER A ULTIMA PARTE DO                  CREDENCIAMENTO, NESSA ETAPA VOC&Ecirc; TER&Aacute; MUITO MAIS                  BENEFICIOS:</strong></p>
      <p><strong>-                  ISENTO PASSAGEM DE IDA</strong></p>
      <strong> </strong>
      <p><strong>-                  ALIMENTA&Ccedil;&Atilde;O</strong></p>
      <strong> </strong>
      <p><strong>-                  NOVA CAMPANHA E UMA NOVA EQUIPE DIFERENCIADA</strong></p>
      <strong> </strong>
      <p><strong>-                  MENOS CUSTO COM MATERIAL: CLUBE ESTUDANTIL R$ 0,25                  adesivo - EDUCA&Ccedil;&Atilde;O EM FOCO R$ 0,30 E N&Atilde;O PRECISA                  IMPRIMIR MAIS NADA</strong></p>
      <strong> </strong>
      <p><strong>- E LEMBRA AQUELE MATERIAL </strong><strong>&nbsp;</strong><strong>ASSESSORIA, AGENDANDO ESSA                    SEGUNDA ETAPA EU LIBERO ELE AGORA DE PRESENTE PARA SUA                    ESCOLA</strong></p></td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" name="enviar" value="Enviar" /></td>
  </tr>
  </form>
   <form id="pesquisa_gerente" name="pesquisa_gerente" method="POST" action="envia_pesquisa_gerente.php?id=<?php echo $id; ?>" target="_blank">
  <tr>
    <td colspan="2" style="background-color: #666; color: #fff;"><strong>PESQUISA DE SATISFA&Ccedil;&Atilde;O - GERENTE DE VENDAS</strong></td>
  </tr>
  <tr>
    <td>N&uacute;mero de escolas divulgadas</td>
    <td>Quantas escolas faltaram?</td>
  </tr>
  <tr>
    <td><input type="text" name="numero_escolas" class="texto" /></td>
    <td><input type="text" name="escolas_faltaram" class="texto" /></td>
  </tr>
  <tr>
    <td>Aceita&ccedil;&atilde;o dos alunos</td>
    <td>Aceita&ccedil;&atilde;o dos pais. Quantos n&atilde;o fizeram?</td>
  </tr>
  <tr>
    <td><input type="text" name="aceitacao_alunos" class="texto" /></td>
    <td><input type="text" name="aceitacao_pais" class="texto" /></td>
  </tr>
  <tr>
    <td>Perfil do Cliente</td>
    <td>Teve suporte na semana?</td>
  </tr>
  <tr>
    <td><input type="text" name="perfil_cliente"  class="texto"/></td>
    <td><input type="text" name="teve_suporte" class="texto" /></td>
  </tr>
  <tr>
    <td>Perfil da Cidade</td>
    <td>Satisfa&ccedil;&atilde;o do Cliente na Campanha</td>
  </tr>
  <tr>
    <td><input type="text" name="perfil_cidade" class="texto" /></td>
    <td><input type="text" name="satisfacao_campanha" class="texto" /></td>
  </tr>
  <tr>
    <td>Valores Aplicados na Campanha</td>
    <td>Convite da Campanha</td>
  </tr>
  <tr>
    <td><input type="text" name="valores_campanha" class="texto" /></td>
    <td><input type="text" name="convite_campanha"  class="texto"/></td>
  </tr>
  <tr>
    <td>Alguma informa&ccedil;&atilde;o adicional sobre a cidade?</td>
    <td>Cliente reagendou nova data?</td>
  </tr>
  <tr>
    <td><input type="text" name="informacao_adicional" class="texto" /></td>
    <td><input type="text" name="nova_data" class="texto" /></td>
  </tr>
  <tr>
    <td></td>
    <td><input type="submit" name="envia_gerente" value="Enviar" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  </form>
</table>



</div>
</body>
</html>