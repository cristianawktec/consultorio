<?

    $pg['titulo'] = 'PHP';
    $pg['colspan'] = '1';

    $pg['topico'][] = 'Desabilitar controle de chaves';
    $pg['texto'][] = '<pre>

SET FOREIGN_KEY_CHECKS=0;
SET FOREIGN_KEY_CHECKS=1;

</pre>';

$pg['topico'][] = 'utf-8 charset de uma aplicação PHP';
$pg['texto'][] = '<pre>
<b>O que é charset?</b>

Charset, Character Set, é o conjunto de caracteres que são utilizados para criação de documentos,
bancos de dados, sites etc. Cada charset possui uma lista de caracteres disponíveis, sendo estes
representados por uma posição de referência.

Confira alguns caracteres disponíveis no charset ASCII.

Posição	Caractere
65	A
66	B
67	C
68	D
69	E
70	F


<b>Qual é a importância do charset?</b>

O charset de um documento indica ao browser qual codificação foi utilizada, possibilitando que o documento seja interpretado,
exibindo suas informações corretamente ao usuário. Caso exista algum tipo de incompatibilidade entre o conteúdo,
o charset declarado e o charset utilizado para salvar o documento no seu editor – como Eclipse -,
isso poderá comprometer sua exibição, gerando possíveis problemas, como erro na codificação do documento ou caracteres
incorretos sendo exibidos na aplicação.


<b>Configurando charset de uma aplicação PHP</b>

Existem 127 charsets disponíveis para uso na Internet, e os mais utilizados são ISO-8859-1 e UTF-8.
Se você está desenvolvendo algum conteúdo, terá que decidir qual codificação irá utilizar.
O charset UTF-8 é uma recomendação, pois cobre quase todos os caracteres e símbolos do mundo.

Confira os passos recomendados para configurar o charset de sua aplicação.

Recomendações para configurar o navegador


<b>Script PHP</b>

Informar o charset na declaração dos formulários, caso exista.Informar o charset no início do script,
junto ao tipo do conteúdo, nesse caso html.

<code class="plain">&lt;?php header(</code><code class="string">"Content-type: text/html; charset=utf-8"</code><code class="plain">); ?&gt;</code>


<b>Metatag HTML</b>

Informar o charset através da metatag no cabeçalho do código html.

<code class="keyword">&lt;meta</code><code class="color1">http-equiv</code><code class="plain">=</code><code class="string">"Content-Type"</code><code class="color1">content</code><code class="plain">=</code><code class="string">"text/html; charset=utf-8"</code><code class="plain">/&gt;</code>


<b>Formulário</b>
<code class="plain">&lt;form accept-charset="utf-8" ...&gt;</code>


<b>Recomendações para configurar o banco de dados<b/>

Verificar se as tabelas e os campos de caracteres estão configurados para utilizar coleção utf8_general_ci,
além de informar o charset ao abrir conexão com banco de dados.

<b>Conexão MySQL</b>

<code class="plain">mysql_set_charset(</code><code class="string">\'utf8\'</code><code class="plain">);</code>


</pre>';

    $pg['topico'][] = 'Enviar emails';
    $pg['texto'][] = '<pre>

<b>Enviar emails: descrição</b>
bool mail ( string $to , string $subject , string $message [, string $additional_headers [, string $additional_parameters ]] )

<b>Script #1</b>

$assunto = "Este é o assunto do email"; // assunto do email
$mensagem = "Este é o texto do email..."; // corpo do email

$origem_nome = "Awk"; // nome de quem envia
$origem_email = "correio@awktec.com"; //e-mail de quem envia

$destino_nome = "Cristian Marques"; // nome de quem recebe
$destino_email = "pessoa@dominio.com.br"; // e-mail de quem recebe

$cabecalho = "From: $origem_nome \r\n";
$cabecalho .= "To: $destino_nome \r\n";
$cabecalho .= "Cc: pessoa2@dominio.com.br \r\n";
$cabecalho .= "Bcc: pessoa_oculta@dominio.com.br \r\n";

mail($destino_email, $assunto, $mensagem, $cabecalho); // comando

Caso este script #1 não funcione, tente o Script #2

<b>Script #2</b>

$Name = "Da Duder"; //senders name
$email = "email@adress.com"; //senders e-mail adress
$recipient = "PersonWhoGetsIt@emailadress.com"; //recipient
$mail_body = "The text for the mail..."; //mail body
$subject = "Subject for reviever"; //subject
$header = "From: ". $Name . " <" . $email . ">\r\n"; //optional headerfields

ini_set(\'sendmail_from\', \'me@domain.com\');

mail($recipient, $subject, $mail_body, $header); //mail command :)

<b>Para enviar emails HTML</b>

$headers  = \'MIME-Version: 1.0\' . "\r\n";
$headers .= \'Content-type: text/html; charset=iso-8859-1\' . "\r\n";

<b>Cabeçalhos adicionais</b>

$headers .= \'To: Mary <mary@example.com>, Kelly <kelly@example.com>\' . "\r\n";
$headers .= \'From: Birthday Reminder <birthday@example.com>\' . "\r\n";
$headers .= \'Cc: birthdayarchive@example.com\' . "\r\n";
$headers .= \'Bcc: birthdaycheck@example.com\' . "\r\n";

// Mail it
mail($to, $subject, $message, $headers);

<b>Mensagens mais complexas</b>

Atenção se você pretende inserir numa variável uma mensagem html mais
complexa do que essa sem precisar escapar os carateres 
necessários pode ser feito o uso da sintaxe heredoc, consulte tipos-string-sintaxe-heredoc


</pre>';

    $pg['topico'][] = 'Funções Diversas';
    $pg['texto'][] = '<pre>

<b>number_format</b>

$numero = 10000 / 3;
$numero_formatado = number_format($numero, 2, \',\', \'.\');
echo $numero_formatado;

Saída: 3.333,33

</pre>';

    $pg['topico'][] = 'Constantes Mágicas';
    $pg['texto'][] = '<pre>

<b>Algumas constantes "mágicas" do PHP</b>

__LINE__        A linha atual do script.
__FILE__        O caminho completo e nome do arquivo. Se utilizado dentro de um include, o nome do arquivo incluído será retornado.
                Desde o PHP 4.0.2, __FILE__ sempre contém um caminho absoluto com links simbólicos resolvidos enquanto em versões
                antigas ela continha um caminho relativo sob certas circunstâncias.
__DIR__         O diretório do arquivo. Se usado dentro de um include, o diretório do arquivo incluído é retornado.
                Isto é equivalente a dirname(__FILE__). Este nome do diretório não possui barra no final, a não ser que seja o diretório raiz.
                (Adicionado no PHP 5.3.0.)
__FUNCTION__    O nome da função (Acrescentado no PHP 4.3.0). A partir do PHP 5 esta constante retorna o nome da função como ela foi declarada
                (sensível a maiúsculas e minúsculas). No PHP 4 sempre retorna o nome em minúsculas.
__CLASS__       O nome da classe (Acrescentado no PHP 4.3.0). A partir do PHP 5 esta constante retorna o nome da função como ela foi declarada
                (sensível a maiúsculas e minúsculas). No PHP 4 sempre retorna o nome em minúsculas.
__METHOD__      O nome do método de classe. (Acrescentado no PHP 5.0.0). O nome do método é retornado como foi declarado (sensível a maiúsculas e minúsculas).
__NAMESPACE__   O nome do atual namespace (sensível a maiúsculas e minúsculas). Esta constante é definida em tempo de compilação (Adicionada no PHP 5.3.0).

</pre>';

    $pg['topico'][] = 'Instala&ccedil;&atilde;o do SSH no PHP para Ubuntu 9.10';
    $pg['texto'][] = '<pre>
root:~# apt-get install libssh2-1 libssh2-php
root:~# /etc/init.d/apache2 restart

By Roger
</pre>';

    $pg['topico'][] = 'Orienta&ccedil;&atilde;o a Objetos';
    $pg['texto'][] = '<pre>

<b>Defini&ccedil;&atilde;o da classe</b>

class <i>nome_classe</i> {

    function  <i>nome_funcao_classe</i> () {
   	$this->variavel = \'valor\';
        return true;
    }

<b>Defini&ccedil;&atilde;o de método</b>

function <i>nome_funcao</i>(<i>par&acirc;metros</i>) {
        <i>c&oacute;digo</i>
}

<b>Chamada da fun&ccedil;&atilde;o</b>

<i>nome_funcao</i>(<i>par&acirc;metros</i>);

<b>Chamada do método por uma instância da classe</b>

$objeto_classe = new <i>nome_classe</i>;
$objeto_classe-><i>nome_funcao_classe</i>();

</pre>';

    $pg['topico'][] = 'Definição de Constantes';
    $pg['texto'][] = '<pre>

<b>Definição de Constantes</b>

define(\'TEST_CONSTANT\',\'Works!\');

</pre>';

    $pg['topico'][] = 'Funções para Sessão';
    $pg['texto'][] = '<pre>
<b>Funções para Sessão</b>

    * session_cache_expire - Retorna o prazo do cache atual
    * session_cache_limiter - Obtém e/ou define o limitador do cache atual
    * session_commit - Sinônimo de session_write_close
    * session_decode - Decifra dado de sessão de uma string
    * session_destroy - Destrói todos os dados registrados em uma sessão
    * session_encode - Codifica os dados da sessão atual como uma string
    * session_get_cookie_params - Obtém os parâmetros do cookie da sessão
    * session_id - Obtém e/ou define o id de sessão atual
    * session_is_registered - Descobre se uma variável global está registrada numa sessão
    * session_module_name - Obtém e/ou define o módulo da sessão atual
    * session_name - Obtém e/ou define o nome da sessão atual
    * session_regenerate_id - Atualiza o id da sessão atual com um novo gerado
    * session_register - Registrar uma ou mais variáveis globais na sessão atual
    * session_save_path - Obtém e/ou define o save path da sessão atual
    * session_set_cookie_params - Define os parâmetros do cookie de sessão
    * session_set_save_handler - Define a sequência de funções de armazenamento
    * session_start - Inicia dados de sessão
    * session_unregister - Desregistra uma variável global da sessão atual
    * session_unset - Libera todas as variáveis de sessão
    * session_write_close - Escreve dados de sessão e termina a sessão

<b>Exemplos</b>

session_cache_expire: ' . session_cache_expire() . '
session_cache_limiter: ' . session_cache_limiter() . '
session_id: ' . session_id() . '
session_module_name: ' . session_module_name() . '
session_name: ' . session_name() . '
session_save_path: ' . session_save_path() . '
</pre>';

    $pg['topico'][] = 'Leitura e grava&ccedil;&atilde;o de arquivos';
    $pg['texto'][] = '<pre>

$arquivo_nome = \'../textos/teste2.txt\';

if ($arquivo = fopen($arquivo_nome, \'w\')) {

    $mesg[\'ok\'][] = "Arquivo <b><i>$arquivo_nome</i></b> pronto para escrita";

    $shell_comando = \'ls -lh\';
    $shell_resposta = shell_exec($shell_comando);

    if (fwrite($arquivo, $shell_resposta) == false) {

        $mesg[\'erro\'][] = "Erro na escrita do arquivo <b><i>$arquivo_nome</i></b>";

    } else {

        $mesg[\'ok\'][] = "Arquivo <b><i>$arquivo_nome</i></b> escrito com sucesso";

    }

    if (!fclose($arquivo)) {

        $mesg[\'erro\'][] = "Erro no fechamento do arquivo <b><i>$arquivo_nome</i></b>";

    } else {

        $mesg[\'ok\'][] = "Arquivo <b><i>$arquivo_nome</i></b> fechado com sucesso";

    }

} else {

    $mesg[\'erro\'][] = "Erro na gravacao ou criacao do arquivo <b><i>$arquivo_nome</i></b>";

}
</pre>';

require './modulos/corpo.php';

?>