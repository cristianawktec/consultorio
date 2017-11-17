<?

if (!$_SESSION['perfil'] > 2) {
	echo "<meta http-equiv=\"refresh\" content=\"0;URL=http://$_SERVER[HTTP_HOST]/smvs/sistema/bloquear_link_direto.php\">";
	exit;
}

$versao = '0.1';

// diretórios

$dir_origem = '/var/www/e193-web/';
$dir_destino = '/var/www/e193-web/';

// servidores

$servidores = array (array (
	'usuario' => 'root', 'senha' => 'cbmsc#e193*', 'nome' => 'fns4', 'desc' => 'Florianopolis'),array (
	'usuario' => 'root', 'senha' => 'cbmsc#e193*', 'nome' => 'cua1', 'desc' => 'Criciuma'),array (
	'usuario' => 'root', 'senha' => 'cbmsc#e193*', 'nome' => 'tro1', 'desc' => 'Tubarao'),array (
	'usuario' => 'root', 'senha' => 'cbmsc#e193*', 'nome' => 'lgs1', 'desc' => 'Lages'),array (
	'usuario' => 'root', 'senha' => 'cbmsc#e193*', 'nome' => 'cco1', 'desc' => 'Chapeco'),array (
	'usuario' => 'root', 'senha' => 'cbmsc#e193*', 'nome' => 'cbs1', 'desc' => 'Curitibanos'),array (
	'usuario' => 'root', 'senha' => 'cbmsc#e193*', 'nome' => 'bqe1', 'desc' => 'Brusque'),array (
	'usuario' => 'root', 'senha' => 'linuxnota1000', 'nome' => 'iai1', 'desc' => 'Itajai'),array (
	'usuario' => 'root', 'senha' => 'cbmsc#e193*', 'nome' => 'bnu1', 'desc' => 'Blumenau'),array (
	'usuario' => 'root', 'senha' => 'cleri1998!',    'nome' => 'bcu1', 'desc' => 'Balneario Caboriu'),array (
	'usuario' => 'root', 'senha' => 'cbmsc#e193*', 'nome' => 'cna1', 'desc' => 'Canoinhas'),array (
	'usuario' => 'root', 'senha' => 'cbmsc#e193*', 'nome' => 'rsl1', 'desc' => 'Rio do Sul')
);

// Cabecalho e menu

echo '<pre>
#include &#60;stdio.h&#62;

int main() {

	int i;
	int op;
	int op2;
	int op3;

	system("clear");
	printf("\n\033[1m*** Escolha uma das opcoes para fazer a atualizacao do e193-web [versao '.$versao.'] ***\033[0;0m\n\n");
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

echo "<br>	switch(op) {<br><br>";

	foreach ($servidores as $i => $v) {
	
		$indice = $i + 1;
		echo "	    case $indice:<br>";
		echo "		printf(\"\\n\\033[31m\\033 *** Atualizando e193-web do servidor $v[nome] - $v[desc] *** \\033[0;0m \\033[32m \\n\\n\");<br>";
		echo "		system(\"sshpass -p '$v[senha]' rsync -CravzpE --delete $dir_origem $v[usuario]@".$v['nome'].":$dir_destino\");<br>";
		echo "	    break;<br><br>";
	
	}
	echo "	    case 99:<br><br>" .
		 "		printf(\"\\n\\033[31m\\033 *** Atencao! Todas as cidades serao atualizadas! *** \\033[0;0m \\033[32m \\n\\nDigite '99' para confirmar: \");<br>" .
		 "		scanf(\"%i\",&op2);<br><br>" .
		 "		if(op2 == 99) {<br><br>";

		foreach ($servidores as $i => $v) {
			$indice = $i + 1;
			echo "		    printf(\"\\n\\033[31m\\033 *** Atualizando e193-web do servidor $v[nome] - $v[desc] *** \\033[0;0m \\033[32m \\n\\n\");<br>";
			echo "		    system(\"sshpass -p '$v[senha]' rsync -CravzpE --delete $dir_origem $v[usuario]@".$v['nome'].":$dir_destino\");<br>";
			echo "<br>";
		}
	echo "		} else {<br><br>" .
		 "		    printf(\"\\n\\033[31m\\033 Operacao abortada! \\033[0;0m \\033[32m \\n\\n\");<br><br>" .
		 "		}<br><br>";

	echo "        break;<br>";

echo "    }<br>" .
	 "    printf(\"\\033[0;0m\\n\\033[1m *** Final de rotina ***\\033[0;0m\\n\\n\");<br>" .
	 "    return 0;<br>" .
	 "}<br><br>" .
	 "// echo '' > /root/scripts/c/e193-web-atualizar.c<br>" .
	 "// vi /root/scripts/c/e193-web-atualizar.c<br>" .
	 "// gcc -o /usr/bin/e193-web-atualizar /root/scripts/c/e193-web-atualizar.c";

?>
