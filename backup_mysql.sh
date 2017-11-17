#!/bin/bash

#Variaveis
server="mysql01.clickconsultorio1.hospedagemdesites.ws"    #Servidor mysql
login="clickconsultor"  			                       #login da base
pw="clickloca17"                                            #senha
nome_temp="all"                   	#nome do arquivo temporário mysql
bk="$HOME/backup_mysql/"          	#Diretório para salvar arquivos de backup
nw=$(date "+%Y%m%d")              	#Buscar pela data
nb=3                              	#número de cópias do banco de dados
hs="backup"                       	#nome do arquivo compactado
function backup()
{
 echo "Realizando backup do servidor mysql"
 mysqldump -u$login -p$pw -h$server --add-drop-table --quote-names --all-databases --add-drop-database > "$HOME/$hs.sql"
 echo "Compactando arquivo de backup $hs.sql.gz ..."
 gzip -f "$HOME/"$hs.sql
 if [ ! -d $bk ]; then
   mkdir $bk
 fi
 cp -f "$HOME/"$hs.sql.gz "$bk/$nw.sql.gz"

 a=0
 b=$(ls -t $bk)
 c=$nb

 for arq in $b; do
   a=$(($a+1))
   if [ "$a" -gt $c ];  then
     rm -f "$bk/$arq"
   fi
 done
}
backup