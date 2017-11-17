<?

    $pg['titulo'] = 'Shell Script';
    $pg['colspan'] = '1';


    $pg['topico'][] = 'Criação de datas';
    $pg['texto'][] = '<pre>
data=`date +%d/%m/%Y`
data_dois_dias_atras=`date +%d/%m/%Y -d "-2 days"`

echo "$data $data_dois_dias_atras"
</pre>';


    $pg['topico'][] = 'Laço For e While a partir de um arquivo';
    $pg['texto'][] = '<pre>
<b>Arquivo servidores.sh</b>

#!/bin/sh
clear

echo "
* * * Laco de repeticao FOR * * *
"

servidores=(fns1 tde1 tro1 cua1 lgs1 cco1 cbs1 bqe1 iai1 bnu1 bcu1 rsl1 cna1)

for((i=0; i<${#servidores[@]};i++)); do
	echo "${servidores[$i]}"
done

echo "
* * * Contando de 0 a 100 com o While * * *
"

i=0;
while test $i -le 100
do
	echo "$i "
	i=$((i+1));
done

echo "
* * * Leitura de arquivo * * *
"

IFS=:
while read servidor descricao; do
	echo "$servidor $descricao"
done < servidores.txt

echo "
* * * Script Finalizado * * *

<b>Arquivo servidores.txt</b>

Awk: Site Corporativo
Locaweb: ClickConsultório
Amazon: SocialInCompany
</pre>';

require './modulos/corpo.php';

?>