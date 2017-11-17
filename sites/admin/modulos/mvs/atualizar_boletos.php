<?

if ($_SESSION['perfil'] > 1) {
	echo "<meta http-equiv=\"refresh\" content=\"0;URL=http://$_SERVER[HTTP_HOST]/smvs/sistema/bloquear_link_direto.php\">";
	exit;
}

$versao = '2.1';

// diretórios

$dir_origem = '/var/www/sigat_sincronia/';
$dir_destino = '/var/www/sigat/';

// arquivos

$arquivos = array (
	'modulos/besc/dados_bancarios.php',
	'modulos/besc/dados_bancarios_p.php',
	'modulos/besc/upload_bancoob.php',
	'modulos/besc/upload_bb.php',
	'modulos/besc/upload_besc.php',
	'modulos/besc/upload_bradesco.php',
	'modulos/besc/upload_cef.php'
);

// servidores

$servidores = array (array (
	'usuario' => 'root',  'senha' => 'gestapo',    	 'nome' => 'fns1', 'desc' => 'Outras Cidades'),array (
	'usuario' => 'root', 'senha' => 'linuxnota1000', 'nome' => 'tde1', 'desc' => 'Florianopolis/Trindade'),array (
	'usuario' => 'root', 'senha' => 'linuxnota1000', 'nome' => 'cua1', 'desc' => 'Criciuma'),array (
	'usuario' => 'root', 'senha' => 'linuxnota1000', 'nome' => 'tro1', 'desc' => 'Tubarao'),array (
	'usuario' => 'root', 'senha' => 'linuxnota1000', 'nome' => 'lgs1', 'desc' => 'Lages'),array (
	'usuario' => 'root', 'senha' => 'linuxnota1000', 'nome' => 'cco1', 'desc' => 'Chapeco'),array (
	'usuario' => 'root', 'senha' => 'linuxnota1000', 'nome' => 'cbs1', 'desc' => 'Curitibanos'),array (
	'usuario' => 'root', 'senha' => 'linuxnota1000', 'nome' => 'bqe1', 'desc' => 'Brusque'),array (
	'usuario' => 'root', 'senha' => 'linuxnota1000', 'nome' => 'iai1', 'desc' => 'Itajai'),array (
	'usuario' => 'root', 'senha' => 'linuxnota1000', 'nome' => 'bnu1', 'desc' => 'Blumenau'),array (
	'usuario' => 'root', 'senha' => 'cleri1998!',    'nome' => 'bcu1', 'desc' => 'Balneario Caboriu'),array (
	'usuario' => 'root', 'senha' => 'linuxnota1000', 'nome' => 'cna1', 'desc' => 'Canoinhas'),array (
	'usuario' => 'root', 'senha' => 'linuxnota1000', 'nome' => 'rsl1', 'desc' => 'Rio do Sul')
);

foreach($arquivos as $v) $arquivos_lista .= "  $v \\n";

// Cabecalho e menu

echo '<pre>
#include &#60;stdio.h&#62;

int main() {

	int i;
	int op;
	int op2;
	int op3;

	system("clear");
	printf("\n\033[1mLista dos arquivos: \033[0;0m\n'.$arquivos_lista.'\n");
	printf("\n\033[1m*** Escolha uma das opcoes para fazer a atualizacao dos BOLETOS [versao '.$versao.'] ***\033[0;0m\n\n");
	printf("   --------------------------------------------- \n");
	printf("   \033[32m 0\033[0;0m   xxxx  \033[31m Sair do programa\033[0;0m \n");
';

// Menu

foreach ($servidores as $i => $v) {

	$indice = $i + 1;
	if ($i < 9) $espaco = ' '; else $espaco = null;

	echo "        printf(\"   \\033[32m $indice\\033[0;0m  $espaco$v[nome]  \\033[31m $v[desc]\\033[0;0m \\n\");<br>";

}

echo '	printf("   \033[32m 99\033[0;0m  xxxx  \033[31m Todas as cidades\033[0;0m \n");
	printf("   --------------------------------------------- \n\n");

	printf("Entre com o codigo do servidor a ser atualizado: ");
	scanf("%i",&op);
';


// Gerador do switch

echo "<br>    switch(op) {<br><br>";

	foreach ($servidores as $i => $v) {
	
		$indice = $i + 1;
		echo "        case $indice:<br>";
		echo "            printf(\"\\n\\033[31m\\033 *** Atualizando boletos do servidor $v[nome] - $v[desc] *** \\033[0;0m \\033[32m \\n\\n\");<br>";
		foreach ($arquivos as $v2) {
			echo "            system(\"sshpass -p '$v[senha]' rsync -CravzpE $dir_origem$v2 $v[usuario]@".$v['nome'].":$dir_destino$v2\");<br>";
		}
		echo "        break;<br>";
	
	}
	echo "<br>        case 99:<br><br>" .
		 "          printf(\"\\n\\033[31m\\033 *** Atencao! Todas as cidades serao atualizadas! *** \\033[0;0m \\033[32m \\n\\nDigite '99' para confirmar: \");<br>" .
		 "          scanf(\"%i\",&op2);<br><br>" .
		 "          if(op2 == 99) {<br><br>";

		foreach ($servidores as $i => $v) {
			$indice = $i + 1;
			echo "            printf(\"\\n\\033[31m\\033 *** Atualizando boletos do servidor $v[nome] - $v[desc] *** \\033[0;0m \\033[32m \\n\\n\");<br>";
			foreach ($arquivos as $v2) {
				echo "            system(\"sshpass -p '$v[senha]' rsync -CravzpE $dir_origem$v2 $v[usuario]@".$v['nome'].":$dir_destino$v2\");<br>";
			}
			echo "<br>";
		}
	echo "          } else {<br><br>" .
		 "              printf(\"\\n\\033[31m\\033 Operacao abortada! \\033[0;0m \\033[32m \\n\\n\");<br><br>" .
		 "          }<br><br>";

	echo "        break;<br>";

echo "    }<br>" .
	 "    printf(\"\\033[0;0m\\n\\033[1m *** Final de rotina ***\\033[0;0m\\n\\n\");<br>" .
	 "    return 0;<br>" .
	 "}<br><br>" .
	 "// echo '' > /root/scripts/c/boleto.c<br>" .
	 "// vi /root/scripts/c/boleto.c<br>" .
	 "// gcc -o /usr/bin/boleto /root/scripts/c/boleto.c";

?>