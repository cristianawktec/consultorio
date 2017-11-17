<? 
if ($_SESSION['perfil'] > 1) {
	echo "<meta http-equiv=\"refresh\" content=\"0;URL=http://$_SERVER[HTTP_HOST]/smvs/sistema/bloquear_link_direto.php\">";
	exit;
}



echo '<pre>
#include &#60;stdio.h&#62;

int main() {

	int i;
	int op;
	int op2;
	int op3;

	system("clear");
	printf("\n\033[1m*** Escolha uma das opcoes para fazer a atualizacao das Bibliotecas do Sigat [versao 0.1] ***\033[0;0m\n\n");
	printf("   --------------------------------------------- \n");
	printf("   \033[32m 0\033[0;0m   xxxx  \033[31m Sair do programa\033[0;0m \n");
        printf("   \033[32m 1\033[0;0m   fns1  \033[31m Outras Cidades\033[0;0m \n");
        printf("   \033[32m 2\033[0;0m   tde1  \033[31m Florianopolis/Trindade\033[0;0m \n");
        printf("   \033[32m 3\033[0;0m   cua1  \033[31m Criciuma\033[0;0m \n");
        printf("   \033[32m 4\033[0;0m   tro1  \033[31m Tubarao\033[0;0m \n");
        printf("   \033[32m 5\033[0;0m   lgs1  \033[31m Lages\033[0;0m \n");
        printf("   \033[32m 6\033[0;0m   cco1  \033[31m Chapeco\033[0;0m \n");
        printf("   \033[32m 7\033[0;0m   cbs1  \033[31m Curitibanos\033[0;0m \n");
        printf("   \033[32m 8\033[0;0m   bqe1  \033[31m Brusque\033[0;0m \n");
        printf("   \033[32m 9\033[0;0m   iai1  \033[31m Itajai\033[0;0m \n");
        printf("   \033[32m 10\033[0;0m  bnu1  \033[31m Blumenau\033[0;0m \n");
        printf("   \033[32m 11\033[0;0m  bcu1  \033[31m Balneario Caboriu\033[0;0m \n");
        printf("   \033[32m 12\033[0;0m  cna1  \033[31m Canoinhas\033[0;0m \n");
        printf("   \033[32m 13\033[0;0m  rsl1  \033[31m Rio do Sul\033[0;0m \n");
	printf("   \033[32m 99\033[0;0m  xxxx  \033[31m Todas as cidades\033[0;0m \n");
	printf("   --------------------------------------------- \n\n");

	printf("Entre com o codigo do servidor para atualizar os arquivos de UPLOAD: ");
	scanf("%i",&op);

    switch(op) {

        case 1:
            printf("\n\033[31m\033 *** Atualizando bibliotecas do servidor fns1 - Outras Cidades *** \033[0;0m \033[32m \n\n");
            system("sshpass -p \'<b>Senha Do Servidor</b>\' rsync -CravzpE /var/www/sigat_sincronia/modulos/besc/upload_cef.php root@fns1:/var/www/sigat/modulos/besc/upload_cef.php\");
	    system("sshpass -p \'<b>Senha Do Servidor</b>\' rsync -CravzpE /var/www/sigat_sincronia/modulos/besc/upload_cef.php root@fns1:/var/www/sigat/modulos/besc/upload_cef.php\");
	    system("sshpass -p \'<b>Senha Do Servidor</b>\' rsync -CravzpE /var/www/sigat_sincronia/modulos/besc/upload_cef.php root@fns1:/var/www/sigat/modulos/besc/upload_cef.php\");
	    system("sshpass -p \'<b>Senha Do Servidor</b>\' rsync -CravzpE /var/www/sigat_sincronia/modulos/besc/upload_cef.php root@fns1:/var/www/sigat/modulos/besc/upload_cef.php\");
	    system("sshpass -p \'<b>Senha Do Servidor</b>\' rsync -CravzpE /var/www/sigat_sincronia/modulos/besc/upload_cef.php root@fns1:/var/www/sigat/modulos/besc/upload_cef.php\");
        break;
        case 2:
            printf("\n\033[31m\033 *** Atualizando bibliotecas do servidor tde1 - Florianopolis/Trindade *** \033[0;0m \033[32m \n\n");
            system("sshpass -p \'<b>Senha Do Servidor</b>\' rsync -CravzpE /var/www/sigat_sincronia/modulos/besc/upload_cef.php root@tde1:/var/www/sigat/modulos/besc/upload_cef.php");
	    system("sshpass -p \'<b>Senha Do Servidor</b>\' rsync -CravzpE /var/www/sigat_sincronia/modulos/besc/upload_cef.php root@tde1:/var/www/sigat/modulos/besc/upload_cef.php");
	    system("sshpass -p \'<b>Senha Do Servidor</b>\' rsync -CravzpE /var/www/sigat_sincronia/modulos/besc/upload_cef.php root@tde1:/var/www/sigat/modulos/besc/upload_cef.php");
	    system("sshpass -p \'<b>Senha Do Servidor</b>\' rsync -CravzpE /var/www/sigat_sincronia/modulos/besc/upload_cef.php root@tde1:/var/www/sigat/modulos/besc/upload_cef.php");
	    system("sshpass -p \'<b>Senha Do Servidor</b>\' rsync -CravzpE /var/www/sigat_sincronia/modulos/besc/upload_cef.php root@tde1:/var/www/sigat/modulos/besc/upload_cef.php");
        break;
        case 3:
            printf("\n\033[31m\033 *** Atualizando bibliotecas do servidor cua1 - Criciuma *** \033[0;0m \033[32m \n\n");
            system("sshpass -p \'<b>Senha Do Servidor</b>\' rsync -CravzpE /var/www/sigat_sincronia/modulos/besc/upload_cef.php root@cua1:/var/www/sigat/modulos/besc/upload_cef.php");
	    system("sshpass -p \'<b>Senha Do Servidor</b>\' rsync -CravzpE /var/www/sigat_sincronia/modulos/besc/upload_cef.php root@cua1:/var/www/sigat/modulos/besc/upload_cef.php");
	    system("sshpass -p \'<b>Senha Do Servidor</b>\' rsync -CravzpE /var/www/sigat_sincronia/modulos/besc/upload_cef.php root@cua1:/var/www/sigat/modulos/besc/upload_cef.php");
	    system("sshpass -p \'<b>Senha Do Servidor</b>\' rsync -CravzpE /var/www/sigat_sincronia/modulos/besc/upload_cef.php root@cua1:/var/www/sigat/modulos/besc/upload_cef.php");
	    system("sshpass -p \'<b>Senha Do Servidor</b>\' rsync -CravzpE /var/www/sigat_sincronia/modulos/besc/upload_cef.php root@cua1:/var/www/sigat/modulos/besc/upload_cef.php");
        break;
        case 4:
            printf("\n\033[31m\033 *** Atualizando bibliotecas do servidor tro1 - Tubarao *** \033[0;0m \033[32m \n\n");
            system("sshpass -p \'<b>Senha Do Servidor</b>\' rsync -CravzpE /var/www/sigat_sincronia/modulos/besc/upload_cef.php root@tro1:/var/www/sigat/modulos/besc/upload_cef.php");
	    system("sshpass -p \'<b>Senha Do Servidor</b>\' rsync -CravzpE /var/www/sigat_sincronia/modulos/besc/upload_cef.php root@tro1:/var/www/sigat/modulos/besc/upload_cef.php");
	    system("sshpass -p \'<b>Senha Do Servidor</b>\' rsync -CravzpE /var/www/sigat_sincronia/modulos/besc/upload_cef.php root@tro1:/var/www/sigat/modulos/besc/upload_cef.php");
	    system("sshpass -p \'<b>Senha Do Servidor</b>\' rsync -CravzpE /var/www/sigat_sincronia/modulos/besc/upload_cef.php root@tro1:/var/www/sigat/modulos/besc/upload_cef.php");
	    system("sshpass -p \'<b>Senha Do Servidor</b>\' rsync -CravzpE /var/www/sigat_sincronia/modulos/besc/upload_cef.php root@tro1:/var/www/sigat/modulos/besc/upload_cef.php");
        break;
        case 5:
            printf("\n\033[31m\033 *** Atualizando bibliotecas do servidor lgs1 - Lages *** \033[0;0m \033[32m \n\n");
            system("sshpass -p \'<b>Senha Do Servidor</b>\' rsync -CravzpE /var/www/sigat_sincronia/modulos/besc/upload_cef.php root@lgs1:/var/www/sigat/modulos/besc/upload_cef.php");
	    system("sshpass -p \'<b>Senha Do Servidor</b>\' rsync -CravzpE /var/www/sigat_sincronia/modulos/besc/upload_cef.php root@lgs1:/var/www/sigat/modulos/besc/upload_cef.php");
	    system("sshpass -p \'<b>Senha Do Servidor</b>\' rsync -CravzpE /var/www/sigat_sincronia/modulos/besc/upload_cef.php root@lgs1:/var/www/sigat/modulos/besc/upload_cef.php");
	    system("sshpass -p \'<b>Senha Do Servidor</b>\' rsync -CravzpE /var/www/sigat_sincronia/modulos/besc/upload_cef.php root@lgs1:/var/www/sigat/modulos/besc/upload_cef.php");
	    system("sshpass -p \'<b>Senha Do Servidor</b>\' rsync -CravzpE /var/www/sigat_sincronia/modulos/besc/upload_cef.php root@lgs1:/var/www/sigat/modulos/besc/upload_cef.php");
        break;
        case 6:
            printf("\n\033[31m\033 *** Atualizando bibliotecas do servidor cco1 - Chapeco *** \033[0;0m \033[32m \n\n");
            system("sshpass -p \'<b>Senha Do Servidor</b>\' rsync -CravzpE /var/www/sigat_sincronia/modulos/besc/upload_cef.php root@cco1:/var/www/sigat/modulos/besc/upload_cef.php");
	    system("sshpass -p \'<b>Senha Do Servidor</b>\' rsync -CravzpE /var/www/sigat_sincronia/modulos/besc/upload_cef.php root@cco1:/var/www/sigat/modulos/besc/upload_cef.php");
	    system("sshpass -p \'<b>Senha Do Servidor</b>\' rsync -CravzpE /var/www/sigat_sincronia/modulos/besc/upload_cef.php root@cco1:/var/www/sigat/modulos/besc/upload_cef.php");
	    system("sshpass -p \'<b>Senha Do Servidor</b>\' rsync -CravzpE /var/www/sigat_sincronia/modulos/besc/upload_cef.php root@cco1:/var/www/sigat/modulos/besc/upload_cef.php");
	    system("sshpass -p \'<b>Senha Do Servidor</b>\' rsync -CravzpE /var/www/sigat_sincronia/modulos/besc/upload_cef.php root@cco1:/var/www/sigat/modulos/besc/upload_cef.php");
        break;
        case 7:
            printf("\n\033[31m\033 *** Atualizando bibliotecas do servidor cbs1 - Curitibanos *** \033[0;0m \033[32m \n\n");
            system("sshpass -p \'<b>Senha Do Servidor</b>\' rsync -CravzpE /var/www/sigat_sincronia/modulos/besc/upload_cef.php root@cbs1:/var/www/sigat/modulos/besc/upload_cef.php");
	    system("sshpass -p \'<b>Senha Do Servidor</b>\' rsync -CravzpE /var/www/sigat_sincronia/modulos/besc/upload_cef.php root@cbs1:/var/www/sigat/modulos/besc/upload_cef.php");
	    system("sshpass -p \'<b>Senha Do Servidor</b>\' rsync -CravzpE /var/www/sigat_sincronia/modulos/besc/upload_cef.php root@cbs1:/var/www/sigat/modulos/besc/upload_cef.php");
	    system("sshpass -p \'<b>Senha Do Servidor</b>\' rsync -CravzpE /var/www/sigat_sincronia/modulos/besc/upload_cef.php root@cbs1:/var/www/sigat/modulos/besc/upload_cef.php");
	    system("sshpass -p \'<b>Senha Do Servidor</b>\' rsync -CravzpE /var/www/sigat_sincronia/modulos/besc/upload_cef.php root@cbs1:/var/www/sigat/modulos/besc/upload_cef.php");
        break;
        case 8:
            printf("\n\033[31m\033 *** Atualizando bibliotecas do servidor bqe1 - Brusque *** \033[0;0m \033[32m \n\n");
            system("sshpass -p \'<b>Senha Do Servidor</b>\' rsync -CravzpE /var/www/sigat_sincronia/modulos/besc/upload_cef.php root@bqe1:/var/www/sigat/modulos/besc/upload_cef.php");
	    system("sshpass -p \'<b>Senha Do Servidor</b>\' rsync -CravzpE /var/www/sigat_sincronia/modulos/besc/upload_cef.php root@bqe1:/var/www/sigat/modulos/besc/upload_cef.php");
	    system("sshpass -p \'<b>Senha Do Servidor</b>\' rsync -CravzpE /var/www/sigat_sincronia/modulos/besc/upload_cef.php root@bqe1:/var/www/sigat/modulos/besc/upload_cef.php");
	    system("sshpass -p \'<b>Senha Do Servidor</b>\' rsync -CravzpE /var/www/sigat_sincronia/modulos/besc/upload_cef.php root@bqe1:/var/www/sigat/modulos/besc/upload_cef.php");
	    system("sshpass -p \'<b>Senha Do Servidor</b>\' rsync -CravzpE /var/www/sigat_sincronia/modulos/besc/upload_cef.php root@bqe1:/var/www/sigat/modulos/besc/upload_cef.php");
        break;
        case 9:
            printf("\n\033[31m\033 *** Atualizando bibliotecas do servidor iai1 - Itajai *** \033[0;0m \033[32m \n\n");
            system("sshpass -p \'<b>Senha Do Servidor</b>\' rsync -CravzpE /var/www/sigat_sincronia/modulos/besc/upload_cef.php root@iai1:/var/www/sigat/modulos/besc/upload_cef.php");
	    system("sshpass -p \'<b>Senha Do Servidor</b>\' rsync -CravzpE /var/www/sigat_sincronia/modulos/besc/upload_cef.php root@iai1:/var/www/sigat/modulos/besc/upload_cef.php");
	    system("sshpass -p \'<b>Senha Do Servidor</b>\' rsync -CravzpE /var/www/sigat_sincronia/modulos/besc/upload_cef.php root@iai1:/var/www/sigat/modulos/besc/upload_cef.php");
	    system("sshpass -p \'<b>Senha Do Servidor</b>\' rsync -CravzpE /var/www/sigat_sincronia/modulos/besc/upload_cef.php root@iai1:/var/www/sigat/modulos/besc/upload_cef.php");
	    system("sshpass -p \'<b>Senha Do Servidor</b>\' rsync -CravzpE /var/www/sigat_sincronia/modulos/besc/upload_cef.php root@iai1:/var/www/sigat/modulos/besc/upload_cef.php");
        break;
        case 10:
            printf("\n\033[31m\033 *** Atualizando bibliotecas do servidor bnu1 - Blumenau *** \033[0;0m \033[32m \n\n");
            system("sshpass -p \'<b>Senha Do Servidor</b>\' rsync -CravzpE /var/www/sigat_sincronia/modulos/besc/upload_cef.php root@bnu1:/var/www/sigat/modulos/besc/upload_cef.php");
	    system("sshpass -p \'<b>Senha Do Servidor</b>\' rsync -CravzpE /var/www/sigat_sincronia/modulos/besc/upload_cef.php root@bnu1:/var/www/sigat/modulos/besc/upload_cef.php");
	    system("sshpass -p \'<b>Senha Do Servidor</b>\' rsync -CravzpE /var/www/sigat_sincronia/modulos/besc/upload_cef.php root@bnu1:/var/www/sigat/modulos/besc/upload_cef.php");
	    system("sshpass -p \'<b>Senha Do Servidor</b>\' rsync -CravzpE /var/www/sigat_sincronia/modulos/besc/upload_cef.php root@bnu1:/var/www/sigat/modulos/besc/upload_cef.php");
	    system("sshpass -p \'<b>Senha Do Servidor</b>\' rsync -CravzpE /var/www/sigat_sincronia/modulos/besc/upload_cef.php root@bnu1:/var/www/sigat/modulos/besc/upload_cef.php");
        break;
        case 11:
            printf("\n\033[31m\033 *** Atualizando bibliotecas do servidor bcu1 - Balneario Caboriu *** \033[0;0m \033[32m \n\n");
            system("sshpass -p \'<b>Senha Do Servidor</b>\' rsync -CravzpE /var/www/sigat_sincronia/modulos/besc/upload_cef.php root@bcu1:/var/www/sigat/modulos/besc/upload_cef.php");
	    system("sshpass -p \'<b>Senha Do Servidor</b>\' rsync -CravzpE /var/www/sigat_sincronia/modulos/besc/upload_cef.php root@bcu1:/var/www/sigat/modulos/besc/upload_cef.php");
	    system("sshpass -p \'<b>Senha Do Servidor</b>\' rsync -CravzpE /var/www/sigat_sincronia/modulos/besc/upload_cef.php root@bcu1:/var/www/sigat/modulos/besc/upload_cef.php");
	    system("sshpass -p \'<b>Senha Do Servidor</b>\' rsync -CravzpE /var/www/sigat_sincronia/modulos/besc/upload_cef.php root@bcu1:/var/www/sigat/modulos/besc/upload_cef.php");
	    system("sshpass -p \'<b>Senha Do Servidor</b>\' rsync -CravzpE /var/www/sigat_sincronia/modulos/besc/upload_cef.php root@bcu1:/var/www/sigat/modulos/besc/upload_cef.php");
        break;
        case 12:
            printf("\n\033[31m\033 *** Atualizando bibliotecas do servidor cna1 - Canoinhas *** \033[0;0m \033[32m \n\n");
            system("sshpass -p \'<b>Senha Do Servidor</b>\' rsync -CravzpE /var/www/sigat_sincronia/modulos/besc/upload_cef.php root@cna1:/var/www/sigat/modulos/besc/upload_cef.php");
	    system("sshpass -p \'<b>Senha Do Servidor</b>\' rsync -CravzpE /var/www/sigat_sincronia/modulos/besc/upload_cef.php root@cna1:/var/www/sigat/modulos/besc/upload_cef.php");
	    system("sshpass -p \'<b>Senha Do Servidor</b>\' rsync -CravzpE /var/www/sigat_sincronia/modulos/besc/upload_cef.php root@cna1:/var/www/sigat/modulos/besc/upload_cef.php");
	    system("sshpass -p \'<b>Senha Do Servidor</b>\' rsync -CravzpE /var/www/sigat_sincronia/modulos/besc/upload_cef.php root@cna1:/var/www/sigat/modulos/besc/upload_cef.php");
	    system("sshpass -p \'<b>Senha Do Servidor</b>\' rsync -CravzpE /var/www/sigat_sincronia/modulos/besc/upload_cef.php root@cna1:/var/www/sigat/modulos/besc/upload_cef.php");
        break;
        case 13:
            printf("\n\033[31m\033 *** Atualizando bibliotecas do servidor rsl1 - Rio do Sul *** \033[0;0m \033[32m \n\n");
            system("sshpass -p \'<b>Senha Do Servidor</b>\' rsync -CravzpE /var/www/sigat_sincronia/modulos/besc/upload_cef.php root@rsl1:/var/www/sigat/modulos/besc/upload_cef.php");
            system("sshpass -p \'<b>Senha Do Servidor</b>\' rsync -CravzpE /var/www/sigat_sincronia/modulos/besc/upload_cef.php root@rsl1:/var/www/sigat/modulos/besc/upload_cef.php");
	    system("sshpass -p \'<b>Senha Do Servidor</b>\' rsync -CravzpE /var/www/sigat_sincronia/modulos/besc/upload_cef.php root@rsl1:/var/www/sigat/modulos/besc/upload_cef.php");
	    system("sshpass -p \'<b>Senha Do Servidor</b>\' rsync -CravzpE /var/www/sigat_sincronia/modulos/besc/upload_cef.php root@rsl1:/var/www/sigat/modulos/besc/upload_cef.php");
	    system("sshpass -p \'<b>Senha Do Servidor</b>\' rsync -CravzpE /var/www/sigat_sincronia/modulos/besc/upload_cef.php root@rsl1:/var/www/sigat/modulos/besc/upload_cef.php");
	    
        break;

        case 99:

          printf("\n\033[31m\033 *** Atencao! Todas as cidades serao atualizadas! *** \033[0;0m \033[32m \n\nDigite \'99\' para confirmar: ");
          scanf("%i",&op2);

          if(op2 == 99) {

            printf("\n\033[31m\033 *** Atualizando bibiotecas do servidor fns1 - Outras Cidades *** \033[0;0m \033[32m \n\n");
            system("sshpass -p \'<b>Senha Do Servidor</b>\' rsync -CravzpE /var/www/sigat_sincronia/modulos/besc/upload_cef.php root@fns1:/var/www/sigat/modulos/besc/upload_cef.php");
	    system("sshpass -p \'<b>Senha Do Servidor</b>\' rsync -CravzpE /var/www/sigat_sincronia/modulos/besc/upload_bradesco.php root@fns1:/var/www/sigat/modulos/besc/upload_bradesco.php");
	    system("sshpass -p \'<b>Senha Do Servidor</b>\' rsync -CravzpE /var/www/sigat_sincronia/modulos/besc/upload_bb.php root@fns1:/var/www/sigat/modulos/besc/upload_bb.php");
	    system("sshpass -p \'<b>Senha Do Servidor</b>\' rsync -CravzpE /var/www/sigat_sincronia/modulos/besc/upload_bb6.php root@fns1:/var/www/sigat/modulos/besc/upload_bb6.php");
	    system("sshpass -p \'<b>Senha Do Servidor</b>\' rsync -CravzpE /var/www/sigat_sincronia/modulos/besc/upload_besc.php root@fns1:/var/www/sigat/modulos/besc/upload_besc.php");

            printf("\n\033[31m\033 *** Atualizando bibiotecas do servidor tde1 - Florianopolis/Trindade *** \033[0;0m \033[32m \n\n");
            system("sshpass -p \'<b>Senha Do Servidor</b>\' rsync -CravzpE /var/www/sigat_sincronia/modulos/besc/upload_cef.php root@tde1:/var/www/sigat/modulos/besc/upload_cef.php");
	    system("sshpass -p \'<b>Senha Do Servidor</b>\' rsync -CravzpE /var/www/sigat_sincronia/modulos/besc/upload_bradesco.php root@tde1:/var/www/sigat/modulos/besc/upload_bradesco.php");
	    system("sshpass -p \'<b>Senha Do Servidor</b>\' rsync -CravzpE /var/www/sigat_sincronia/modulos/besc/upload_bb.php root@tde1:/var/www/sigat/modulos/besc/upload_bb.php");
	    system("sshpass -p \'<b>Senha Do Servidor</b>\' rsync -CravzpE /var/www/sigat_sincronia/modulos/besc/upload_bb6.php root@tde1:/var/www/sigat/modulos/besc/upload_bb6.php");
	    system("sshpass -p \'<b>Senha Do Servidor</b>\' rsync -CravzpE /var/www/sigat_sincronia/modulos/besc/upload_besc.php root@tde1:/var/www/sigat/modulos/besc/upload_besc.php");

            printf("\n\033[31m\033 *** Atualizando bibiotecas do servidor cua1 - Criciuma *** \033[0;0m \033[32m \n\n");
            system("sshpass -p \'<b>Senha Do Servidor</b>\' rsync -CravzpE /var/www/sigat_sincronia/modulos/besc/upload_cef.php root@cua1:/var/www/sigat/modulos/besc/upload_cef.php");
	    system("sshpass -p \'<b>Senha Do Servidor</b>\' rsync -CravzpE /var/www/sigat_sincronia/modulos/besc/upload_bradesco.php root@cua1:/var/www/sigat/modulos/besc/upload_bradesco.php");
	    system("sshpass -p \'<b>Senha Do Servidor</b>\' rsync -CravzpE /var/www/sigat_sincronia/modulos/besc/upload_bb.php root@cua1:/var/www/sigat/modulos/besc/upload_bb.php");
	    system("sshpass -p \'<b>Senha Do Servidor</b>\' rsync -CravzpE /var/www/sigat_sincronia/modulos/besc/upload_bb6.php root@cua1:/var/www/sigat/modulos/besc/upload_bb6.php");
	    system("sshpass -p \'<b>Senha Do Servidor</b>\' rsync -CravzpE /var/www/sigat_sincronia/modulos/besc/upload_besc.php root@cua1:/var/www/sigat/modulos/besc/upload_besc.php");

            printf("\n\033[31m\033 *** Atualizando bibiotecas do servidor tro1 - Tubarao *** \033[0;0m \033[32m \n\n");
            system("sshpass -p \'<b>Senha Do Servidor</b>\' rsync -CravzpE /var/www/sigat_sincronia/modulos/besc/upload_cef.php root@tro1:/var/www/sigat/modulos/besc/upload_cef.php");
	    system("sshpass -p \'<b>Senha Do Servidor</b>\' rsync -CravzpE /var/www/sigat_sincronia/modulos/besc/upload_bradesco.php root@tro1:/var/www/sigat/modulos/besc/upload_bradesco.php");
	    system("sshpass -p \'<b>Senha Do Servidor</b>\' rsync -CravzpE /var/www/sigat_sincronia/modulos/besc/upload_bb.php root@tro1:/var/www/sigat/modulos/besc/upload_bb.php");
	    system("sshpass -p \'<b>Senha Do Servidor</b>\' rsync -CravzpE /var/www/sigat_sincronia/modulos/besc/upload_bb6.php root@tro1:/var/www/sigat/modulos/besc/upload_bb6.php");
	    system("sshpass -p \'<b>Senha Do Servidor</b>\' rsync -CravzpE /var/www/sigat_sincronia/modulos/besc/upload_besc.php root@tro1:/var/www/sigat/modulos/besc/upload_besc.php");

            printf("\n\033[31m\033 *** Atualizando bibiotecas do servidor lgs1 - Lages *** \033[0;0m \033[32m \n\n");
            system("sshpass -p \'<b>Senha Do Servidor</b>\' rsync -CravzpE /var/www/sigat_sincronia/modulos/besc/upload_cef.php root@lgs1:/var/www/sigat/modulos/besc/upload_cef.php");
	    system("sshpass -p \'<b>Senha Do Servidor</b>\' rsync -CravzpE /var/www/sigat_sincronia/modulos/besc/upload_bradesco.php root@lgs1:/var/www/sigat/modulos/besc/upload_bradesco.php");
	    system("sshpass -p \'<b>Senha Do Servidor</b>\' rsync -CravzpE /var/www/sigat_sincronia/modulos/besc/upload_bb.php root@lgs1:/var/www/sigat/modulos/besc/upload_bb.php");
	    system("sshpass -p \'<b>Senha Do Servidor</b>\' rsync -CravzpE /var/www/sigat_sincronia/modulos/besc/upload_bb6.php root@lgs1:/var/www/sigat/modulos/besc/upload_bb6.php");
	    system("sshpass -p \'<b>Senha Do Servidor</b>\' rsync -CravzpE /var/www/sigat_sincronia/modulos/besc/upload_besc.php root@lgs1:/var/www/sigat/modulos/besc/upload_besc.php");

            printf("\n\033[31m\033 *** Atualizando bibiotecas do servidor cco1 - Chapeco *** \033[0;0m \033[32m \n\n");
            system("sshpass -p \'<b>Senha Do Servidor</b>\' rsync -CravzpE /var/www/sigat_sincronia/modulos/besc/upload_cef.php root@cco1:/var/www/sigat/modulos/besc/upload_cef.php");
	    system("sshpass -p \'<b>Senha Do Servidor</b>\' rsync -CravzpE /var/www/sigat_sincronia/modulos/besc/upload_bradesco.php root@cco1:/var/www/sigat/modulos/besc/upload_bradesco.php");
	    system("sshpass -p \'<b>Senha Do Servidor</b>\' rsync -CravzpE /var/www/sigat_sincronia/modulos/besc/upload_bb.php root@cco1:/var/www/sigat/modulos/besc/upload_bb.php");
	    system("sshpass -p \'<b>Senha Do Servidor</b>\' rsync -CravzpE /var/www/sigat_sincronia/modulos/besc/upload_bb6.php root@cco1:/var/www/sigat/modulos/besc/upload_bb6.php");
	    system("sshpass -p \'<b>Senha Do Servidor</b>\' rsync -CravzpE /var/www/sigat_sincronia/modulos/besc/upload_besc.php root@cco1:/var/www/sigat/modulos/besc/upload_besc.php");

            printf("\n\033[31m\033 *** Atualizando bibiotecas do servidor cbs1 - Curitibanos *** \033[0;0m \033[32m \n\n");
            system("sshpass -p \'<b>Senha Do Servidor</b>\' rsync -CravzpE /var/www/sigat_sincronia/modulos/besc/upload_cef.php root@cbs1:/var/www/sigat/modulos/besc/upload_cef.php");
	    system("sshpass -p \'<b>Senha Do Servidor</b>\' rsync -CravzpE /var/www/sigat_sincronia/modulos/besc/upload_bradesco.php root@cbs1:/var/www/sigat/modulos/besc/upload_bradesco.php");
	    system("sshpass -p \'<b>Senha Do Servidor</b>\' rsync -CravzpE /var/www/sigat_sincronia/modulos/besc/upload_bb.php root@cbs1:/var/www/sigat/modulos/besc/upload_bb.php");
	    system("sshpass -p \'<b>Senha Do Servidor</b>\' rsync -CravzpE /var/www/sigat_sincronia/modulos/besc/upload_bb6.php root@cbs1:/var/www/sigat/modulos/besc/upload_bb6.php");
	    system("sshpass -p \'<b>Senha Do Servidor</b>\' rsync -CravzpE /var/www/sigat_sincronia/modulos/besc/upload_besc.php root@cbs1:/var/www/sigat/modulos/besc/upload_besc.php");

            printf("\n\033[31m\033 *** Atualizando bibiotecas do servidor bqe1 - Brusque *** \033[0;0m \033[32m \n\n");
            system("sshpass -p \'<b>Senha Do Servidor</b>\' rsync -CravzpE /var/www/sigat_sincronia/modulos/besc/upload_cef.php root@bqe1:/var/www/sigat/modulos/besc/upload_cef.php");
	    system("sshpass -p \'<b>Senha Do Servidor</b>\' rsync -CravzpE /var/www/sigat_sincronia/modulos/besc/upload_bradesco.php root@bqe1:/var/www/sigat/modulos/besc/upload_bradesco.php");
	    system("sshpass -p \'<b>Senha Do Servidor</b>\' rsync -CravzpE /var/www/sigat_sincronia/modulos/besc/upload_bb.php root@bqe1:/var/www/sigat/modulos/besc/upload_bb.php");
	    system("sshpass -p \'<b>Senha Do Servidor</b>\' rsync -CravzpE /var/www/sigat_sincronia/modulos/besc/upload_bb6.php root@bqe1:/var/www/sigat/modulos/besc/upload_bb6.php");
	    system("sshpass -p \'<b>Senha Do Servidor</b>\' rsync -CravzpE /var/www/sigat_sincronia/modulos/besc/upload_besc.php root@bqe1:/var/www/sigat/modulos/besc/upload_besc.php");

            printf("\n\033[31m\033 *** Atualizando bibiotecas do servidor iai1 - Itajai *** \033[0;0m \033[32m \n\n");
            system("sshpass -p \'<b>Senha Do Servidor</b>\' rsync -CravzpE /var/www/sigat_sincronia/modulos/besc/upload_cef.php root@iai1:/var/www/sigat/modulos/besc/upload_cef.php");
	    system("sshpass -p \'<b>Senha Do Servidor</b>\' rsync -CravzpE /var/www/sigat_sincronia/modulos/besc/upload_bradesco.php root@iai1:/var/www/sigat/modulos/besc/upload_bradesco.php");
	    system("sshpass -p \'<b>Senha Do Servidor</b>\' rsync -CravzpE /var/www/sigat_sincronia/modulos/besc/upload_bb.php root@iai1:/var/www/sigat/modulos/besc/upload_bb.php");
	    system("sshpass -p \'<b>Senha Do Servidor</b>\' rsync -CravzpE /var/www/sigat_sincronia/modulos/besc/upload_bb6.php root@iai1:/var/www/sigat/modulos/besc/upload_bb6.php");
	    system("sshpass -p \'<b>Senha Do Servidor</b>\' rsync -CravzpE /var/www/sigat_sincronia/modulos/besc/upload_besc.php root@iai1:/var/www/sigat/modulos/besc/upload_besc.php");

            printf("\n\033[31m\033 *** Atualizando bibiotecas do servidor bnu1 - Blumenau *** \033[0;0m \033[32m \n\n");
            system("sshpass -p \'<b>Senha Do Servidor</b>\' rsync -CravzpE /var/www/sigat_sincronia/modulos/besc/upload_cef.php root@bnu1:/var/www/sigat/modulos/besc/upload_cef.php");
	    system("sshpass -p \'<b>Senha Do Servidor</b>\' rsync -CravzpE /var/www/sigat_sincronia/modulos/besc/upload_bradesco.php root@bnu1:/var/www/sigat/modulos/besc/upload_bradesco.php");
	    system("sshpass -p \'<b>Senha Do Servidor</b>\' rsync -CravzpE /var/www/sigat_sincronia/modulos/besc/upload_bb.php root@bnu1:/var/www/sigat/modulos/besc/upload_bb.php");
	    system("sshpass -p \'<b>Senha Do Servidor</b>\' rsync -CravzpE /var/www/sigat_sincronia/modulos/besc/upload_bb6.php root@bnu1:/var/www/sigat/modulos/besc/upload_bb6.php");
	    system("sshpass -p \'<b>Senha Do Servidor</b>\' rsync -CravzpE /var/www/sigat_sincronia/modulos/besc/upload_besc.php root@bnu1:/var/www/sigat/modulos/besc/upload_besc.php");

            printf("\n\033[31m\033 *** Atualizando bibiotecas do servidor bcu1 - Balneario Caboriu *** \033[0;0m \033[32m \n\n");
            system("sshpass -p \'<b>Senha Do Servidor</b>\' rsync -CravzpE /var/www/sigat_sincronia/modulos/besc/upload_cef.php root@bcu1:/var/www/sigat/modulos/besc/upload_cef.php");
	    system("sshpass -p \'<b>Senha Do Servidor</b>\' rsync -CravzpE /var/www/sigat_sincronia/modulos/besc/upload_bradesco.php root@bcu1:/var/www/sigat/modulos/besc/upload_bradesco.php");
	    system("sshpass -p \'<b>Senha Do Servidor</b>\' rsync -CravzpE /var/www/sigat_sincronia/modulos/besc/upload_bb.php root@bcu1:/var/www/sigat/modulos/besc/upload_bb.php");
	    system("sshpass -p \'<b>Senha Do Servidor</b>\' rsync -CravzpE /var/www/sigat_sincronia/modulos/besc/upload_bb6.php root@bcu1:/var/www/sigat/modulos/besc/upload_bb6.php");
	    system("sshpass -p \'<b>Senha Do Servidor</b>\' rsync -CravzpE /var/www/sigat_sincronia/modulos/besc/upload_besc.php root@bcu1:/var/www/sigat/modulos/besc/upload_besc.php");

            printf("\n\033[31m\033 *** Atualizando bibiotecas do servidor cna1 - Canoinhas *** \033[0;0m \033[32m \n\n");
            system("sshpass -p \'<b>Senha Do Servidor</b>\' rsync -CravzpE /var/www/sigat_sincronia/modulos/besc/upload_cef.php root@cna1:/var/www/sigat/modulos/besc/upload_cef.php");
	    system("sshpass -p \'<b>Senha Do Servidor</b>\' rsync -CravzpE /var/www/sigat_sincronia/modulos/besc/upload_bradesco.php root@cna1:/var/www/sigat/modulos/besc/upload_bradesco.php");
	    system("sshpass -p \'<b>Senha Do Servidor</b>\' rsync -CravzpE /var/www/sigat_sincronia/modulos/besc/upload_bb.php root@cna1:/var/www/sigat/modulos/besc/upload_bb.php");
	    system("sshpass -p \'<b>Senha Do Servidor</b>\' rsync -CravzpE /var/www/sigat_sincronia/modulos/besc/upload_bb6.php root@cna1:/var/www/sigat/modulos/besc/upload_bb6.php");
	    system("sshpass -p \'<b>Senha Do Servidor</b>\' rsync -CravzpE /var/www/sigat_sincronia/modulos/besc/upload_besc.php root@cna1:/var/www/sigat/modulos/besc/upload_besc.php");

            printf("\n\033[31m\033 *** Atualizando bibiotecas do servidor rsl1 - Rio do Sul *** \033[0;0m \033[32m \n\n");
            system("sshpass -p \'<b>Senha Do Servidor</b>\' rsync -CravzpE /var/www/sigat_sincronia/modulos/besc/upload_cef.php root@rsl1:/var/www/sigat/modulos/besc/upload_cef.php");
	    system("sshpass -p \'<b>Senha Do Servidor</b>\' rsync -CravzpE /var/www/sigat_sincronia/modulos/besc/upload_bradesco.php root@rsl1:/var/www/sigat/modulos/besc/upload_bradesco.php");
	    system("sshpass -p \'<b>Senha Do Servidor</b>\' rsync -CravzpE /var/www/sigat_sincronia/modulos/besc/upload_bb.php root@rsl1:/var/www/sigat/modulos/besc/upload_bb.php");
	    system("sshpass -p \'<b>Senha Do Servidor</b>\' rsync -CravzpE /var/www/sigat_sincronia/modulos/besc/upload_bb6.php root@rsl1:/var/www/sigat/modulos/besc/upload_bb6.php");
	    system("sshpass -p \'<b>Senha Do Servidor</b>\' rsync -CravzpE /var/www/sigat_sincronia/modulos/besc/upload_besc.php root@rsl1:/var/www/sigat/modulos/besc/upload_besc.php");

          } else {

              printf("\n\033[31m\033 Operacao abortada! \033[0;0m \033[32m \n\n");

          }

        break;
    }
    printf("\033[0;0m\n\033[1m *** Final de rotina ***\033[0;0m\n\n");
    return 0;
}


// echo \'\' > /root/scripts/c/atualizar_upload.c
// vi /root/scripts/c/atualizar_upload.c
// gcc -o /usr/bin/atualizar_upload /root/scripts/c/atualizar_upload.c  
</pre>';

?>
