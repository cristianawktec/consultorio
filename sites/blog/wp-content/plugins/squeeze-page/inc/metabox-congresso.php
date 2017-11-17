<?php

$dia_1_data = array(
    'id' => 'dia_1_data',
    'label' => 'Dia 1',
    'type' => 'text',
    'description' => 'Insira aqui a data do dia 1 de palestras',
);

$dia_1_titulo = array(
    'id' => 'dia_1_titulo',
    'label' => 'Título do Dia 1',
    'type' => 'text',
    'description' => 'Insira aqui o título do dia 1 de palestras',
);

$dia1 = array($dia_1_data, $dia_1_titulo);

$dia_2_data = array(
    'id' => 'dia_2_data',
    'label' => 'Dia 2',
    'type' => 'text',
    'description' => 'Insira aqui a data do dia 2 de palestras',
);

$dia_2_titulo = array(
    'id' => 'dia_2_titulo',
    'label' => 'Título do Dia 2',
    'type' => 'text',
    'description' => 'Insira aqui o título do dia 2 de palestras',
);

$dia2 = array($dia_2_data, $dia_2_titulo);

$dia_3_data = array(
    'id' => 'dia_3_data',
    'label' => 'Dia 3',
    'type' => 'text',
    'description' => 'Insira aqui a data do dia 3 de palestras',
);

$dia_3_titulo = array(
    'id' => 'dia_3_titulo',
    'label' => 'Título do Dia 3',
    'type' => 'text',
    'description' => 'Insira aqui o título do dia 3 de palestras',
);

$dia3 = array($dia_3_data, $dia_3_titulo);

$dia_4_data = array(
    'id' => 'dia_4_data',
    'label' => 'Dia 4',
    'type' => 'text',
    'description' => 'Insira aqui a data do dia 4 de palestras',
);

$dia_4_titulo = array(
    'id' => 'dia_4_titulo',
    'label' => 'Título do Dia 4',
    'type' => 'text',
    'description' => 'Insira aqui o título do dia 4 de palestras',
);

$dia4 = array($dia_4_data, $dia_4_titulo);

$dia_5_data = array(
    'id' => 'dia_5_data',
    'label' => 'Dia 5',
    'type' => 'text',
    'description' => 'Insira aqui a data do dia 5 de palestras',
);

$dia_5_titulo = array(
    'id' => 'dia_5_titulo',
    'label' => 'Título do Dia 5',
    'type' => 'text',
    'description' => 'Insira aqui o título do dia 5 de palestras',
);

$dia5 = array($dia_5_data, $dia_5_titulo);

$dia_6_data = array(
    'id' => 'dia_6_data',
    'label' => 'Dia 6',
    'type' => 'text',
    'description' => 'Insira aqui a data do dia 6 de palestras',
);

$dia_6_titulo = array(
    'id' => 'dia_6_titulo',
    'label' => 'Título do Dia 6',
    'type' => 'text',
    'description' => 'Insira aqui o título do dia 6 de palestras',
);

$dia6 = array($dia_6_data, $dia_6_titulo);

$dia_7_data = array(
    'id' => 'dia_7_data',
    'label' => 'Dia 7',
    'type' => 'text',
    'description' => 'Insira aqui a data do dia 7 de palestras',
);

$dia_7_titulo = array(
    'id' => 'dia_7_titulo',
    'label' => 'Título do Dia 7',
    'type' => 'text',
    'description' => 'Insira aqui o título do dia 7 de palestras',
);

$dia7 = array($dia_7_data, $dia_7_titulo);

$dia_8_data = array(
    'id' => 'dia_8_data',
    'label' => 'Dia 8',
    'type' => 'text',
    'description' => 'Insira aqui a data do dia 8 de palestras',
);

$dia_8_titulo = array(
    'id' => 'dia_8_titulo',
    'label' => 'Título do Dia 8',
    'type' => 'text',
    'description' => 'Insira aqui o título do dia 8 de palestras',
);

$dia8 = array($dia_8_data, $dia_8_titulo);

$dia_9_data = array(
    'id' => 'dia_9_data',
    'label' => 'Dia 9',
    'type' => 'text',
    'description' => 'Insira aqui a data do dia 9 de palestras',
);

$dia_9_titulo = array(
    'id' => 'dia_9_titulo',
    'label' => 'Título do Dia 9',
    'type' => 'text',
    'description' => 'Insira aqui o título do dia 9 de palestras',
);

$dia9 = array($dia_9_data, $dia_9_titulo);

$titdias = array(
    'id' => 'titdias', // Obrigatório
    'label' => '<h2 class="titulo">Dias de Palestras</h2>',
    'type' => 'title', // Obrigatório
);

$dia_10_data = array(
    'id' => 'dia_10_data',
    'label' => 'Dia 10',
    'type' => 'text',
    'description' => 'Insira aqui a data do dia 10 de palestras',
);

$dia_10_titulo = array(
    'id' => 'dia_10_titulo',
    'label' => 'Título do Dia 10',
    'type' => 'text',
    'description' => 'Insira aqui o título do dia 10 de palestras',
);

$dia10 = array($dia_10_data, $dia_10_titulo);

$titdias = array($titdias, $sep);

$dias = array_merge($titdias, $dia1, array($sep), $dia2, array($sep), $dia3, array($sep), $dia4, array($sep), $dia5,
    array($sep), $dia6, array($sep), $dia7, array($sep), $dia8, array($sep), $dia9, array($sep), $dia10);

$palestrante_1_nome = array(
    'id' => 'palestrante_1_nome',
    'label' => 'Nome do Palestrante 1',
    'type' => 'text',
    'description' => 'Insira aqui o nome do palestrante',
);

$palestrante_1_bio = array(
    'id' => 'palestrante_1_bio',
    'label' => 'Biografia do Palestrante',
    'type' => 'editor',
    'description' => 'Insira aqui todas as informações do palestrante, inclusive redes sociais e outras informações',
);


$palestrante_1_tema = array(
    'id' => 'palestrante_1_tema',
    'label' => 'Tema ou Nome da Palestra',
    'type' => 'text',
    'description' => 'Insira aqui o tema ou o nome da palestra',
);

$palestrante_1_hora = array(
    'id' => 'palestrante_1_hora',
    'label' => 'Data e Hora da Palestra',
    'type' => 'text',
    'description' => 'Insira aqui a data e a hora da palestra',
);

$palestrante_1_foto = array(
    'id' => 'palestrante_1_foto',
    'label' => 'Foto do Palestrante',
    'type' => 'image',
);

$palestrante1 = array($palestrante_1_nome, $palestrante_1_bio, $palestrante_1_tema, $palestrante_1_hora, $palestrante_1_foto);

$palestrante_1_nome = array( 'id' => 'palestrante_1_nome', 'label' => 'Nome do Palestrante 1', 'type' => 'text', 
    'description' => 'Insira aqui o nome do palestrante', ); $palestrante_1_bio = array( 'id' => 'palestrante_1_bio', 'label' => 'Biografia do Palestrante', 'type' => 'editor', 'description' => 'Insira aqui todas as informações do palestrante, inclusive redes sociais e outras informações', ); $palestrante_1_tema = array( 'id' => 'palestrante_1_tema', 'label' => 'Tema ou Nome da Palestra', 'type' => 'text', 'description' => 'Insira aqui o tema ou o nome da palestra', ); $palestrante_1_hora = array( 'id' => 'palestrante_1_hora', 'label' => 'Data e Hora da Palestra', 'type' => 'text', 'description' => 'Insira aqui a data e a hora da palestra', ); $palestrante_1_foto = array( 'id' => 'palestrante_1_foto', 'label' => 'Foto do Palestrante', 'type' => 'image', ); $palestrante1 = array($palestrante_1_nome, $palestrante_1_bio, $palestrante_1_tema, $palestrante_1_hora, $palestrante_1_foto); $palestrante_2_nome = array( 'id' => 'palestrante_2_nome', 'label' => 'Nome do Palestrante 2', 'type' => 'text', 'description' => 'Insira aqui o nome do palestrante', ); $palestrante_2_bio = array( 'id' => 'palestrante_2_bio', 'label' => 'Biografia do Palestrante', 'type' => 'editor', 'description' => 'Insira aqui todas as informações do palestrante, inclusive redes sociais e outras informações', ); $palestrante_2_tema = array( 'id' => 'palestrante_2_tema', 'label' => 'Tema ou Nome da Palestra', 'type' => 'text', 'description' => 'Insira aqui o tema ou o nome da palestra', ); $palestrante_2_hora = array( 'id' => 'palestrante_2_hora', 'label' => 'Data e Hora da Palestra', 'type' => 'text', 'description' => 'Insira aqui a data e a hora da palestra', ); $palestrante_2_foto = array( 'id' => 'palestrante_2_foto', 'label' => 'Foto do Palestrante', 'type' => 'image', ); $palestrante2 = array($palestrante_2_nome, $palestrante_2_bio, $palestrante_2_tema, $palestrante_2_hora, $palestrante_2_foto); $palestrante_3_nome = array( 'id' => 'palestrante_3_nome', 'label' => 'Nome do Palestrante 3', 'type' => 'text', 'description' => 'Insira aqui o nome do palestrante', ); $palestrante_3_bio = array( 'id' => 'palestrante_3_bio', 'label' => 'Biografia do Palestrante', 'type' => 'editor', 'description' => 'Insira aqui todas as informações do palestrante, inclusive redes sociais e outras informações', ); $palestrante_3_tema = array( 'id' => 'palestrante_3_tema', 'label' => 'Tema ou Nome da Palestra', 'type' => 'text', 'description' => 'Insira aqui o tema ou o nome da palestra', ); $palestrante_3_hora = array( 'id' => 'palestrante_3_hora', 'label' => 'Data e Hora da Palestra', 'type' => 'text', 'description' => 'Insira aqui a data e a hora da palestra', ); $palestrante_3_foto = array( 'id' => 'palestrante_3_foto', 'label' => 'Foto do Palestrante', 'type' => 'image', ); $palestrante3 = array($palestrante_3_nome, $palestrante_3_bio, $palestrante_3_tema, $palestrante_3_hora, $palestrante_3_foto); $palestrante_4_nome = array( 'id' => 'palestrante_4_nome', 'label' => 'Nome do Palestrante 4', 'type' => 'text', 'description' => 'Insira aqui o nome do palestrante', ); $palestrante_4_bio = array( 'id' => 'palestrante_4_bio', 'label' => 'Biografia do Palestrante', 'type' => 'editor', 'description' => 'Insira aqui todas as informações do palestrante, inclusive redes sociais e outras informações', ); $palestrante_4_tema = array( 'id' => 'palestrante_4_tema', 'label' => 'Tema ou Nome da Palestra', 'type' => 'text', 'description' => 'Insira aqui o tema ou o nome da palestra', ); $palestrante_4_hora = array( 'id' => 'palestrante_4_hora', 'label' => 'Data e Hora da Palestra', 'type' => 'text', 'description' => 'Insira aqui a data e a hora da palestra', ); $palestrante_4_foto = array( 'id' => 'palestrante_4_foto', 'label' => 'Foto do Palestrante', 'type' => 'image', ); $palestrante4 = array($palestrante_4_nome, $palestrante_4_bio, $palestrante_4_tema, $palestrante_4_hora, $palestrante_4_foto); $palestrante_5_nome = array( 'id' => 'palestrante_5_nome', 'label' => 'Nome do Palestrante 5', 'type' => 'text', 'description' => 'Insira aqui o nome do palestrante', ); $palestrante_5_bio = array( 'id' => 'palestrante_5_bio', 'label' => 'Biografia do Palestrante', 'type' => 'editor', 'description' => 'Insira aqui todas as informações do palestrante, inclusive redes sociais e outras informações', ); $palestrante_5_tema = array( 'id' => 'palestrante_5_tema', 'label' => 'Tema ou Nome da Palestra', 'type' => 'text', 'description' => 'Insira aqui o tema ou o nome da palestra', ); $palestrante_5_hora = array( 'id' => 'palestrante_5_hora', 'label' => 'Data e Hora da Palestra', 'type' => 'text', 'description' => 'Insira aqui a data e a hora da palestra', ); $palestrante_5_foto = array( 'id' => 'palestrante_5_foto', 'label' => 'Foto do Palestrante', 'type' => 'image', ); $palestrante5 = array($palestrante_5_nome, $palestrante_5_bio, $palestrante_5_tema, $palestrante_5_hora, $palestrante_5_foto); $palestrante_6_nome = array( 'id' => 'palestrante_6_nome', 'label' => 'Nome do Palestrante 6', 'type' => 'text', 'description' => 'Insira aqui o nome do palestrante', ); $palestrante_6_bio = array( 'id' => 'palestrante_6_bio', 'label' => 'Biografia do Palestrante', 'type' => 'editor', 'description' => 'Insira aqui todas as informações do palestrante, inclusive redes sociais e outras informações', ); $palestrante_6_tema = array( 'id' => 'palestrante_6_tema', 'label' => 'Tema ou Nome da Palestra', 'type' => 'text', 'description' => 'Insira aqui o tema ou o nome da palestra', ); $palestrante_6_hora = array( 'id' => 'palestrante_6_hora', 'label' => 'Data e Hora da Palestra', 'type' => 'text', 'description' => 'Insira aqui a data e a hora da palestra', ); $palestrante_6_foto = array( 'id' => 'palestrante_6_foto', 'label' => 'Foto do Palestrante', 'type' => 'image', ); $palestrante6 = array($palestrante_6_nome, $palestrante_6_bio, $palestrante_6_tema, $palestrante_6_hora, $palestrante_6_foto); $palestrante_7_nome = array( 'id' => 'palestrante_7_nome', 'label' => 'Nome do Palestrante 7', 'type' => 'text', 'description' => 'Insira aqui o nome do palestrante', ); $palestrante_7_bio = array( 'id' => 'palestrante_7_bio', 'label' => 'Biografia do Palestrante', 'type' => 'editor', 'description' => 'Insira aqui todas as informações do palestrante, inclusive redes sociais e outras informações', ); $palestrante_7_tema = array( 'id' => 'palestrante_7_tema', 'label' => 'Tema ou Nome da Palestra', 'type' => 'text', 'description' => 'Insira aqui o tema ou o nome da palestra', ); $palestrante_7_hora = array( 'id' => 'palestrante_7_hora', 'label' => 'Data e Hora da Palestra', 'type' => 'text', 'description' => 'Insira aqui a data e a hora da palestra', ); $palestrante_7_foto = array( 'id' => 'palestrante_7_foto', 'label' => 'Foto do Palestrante', 'type' => 'image', ); $palestrante7 = array($palestrante_7_nome, $palestrante_7_bio, $palestrante_7_tema, $palestrante_7_hora, $palestrante_7_foto); $palestrante_8_nome = array( 'id' => 'palestrante_8_nome', 'label' => 'Nome do Palestrante 8', 'type' => 'text', 'description' => 'Insira aqui o nome do palestrante', ); $palestrante_8_bio = array( 'id' => 'palestrante_8_bio', 'label' => 'Biografia do Palestrante', 'type' => 'editor', 'description' => 'Insira aqui todas as informações do palestrante, inclusive redes sociais e outras informações', ); $palestrante_8_tema = array( 'id' => 'palestrante_8_tema', 'label' => 'Tema ou Nome da Palestra', 'type' => 'text', 'description' => 'Insira aqui o tema ou o nome da palestra', ); $palestrante_8_hora = array( 'id' => 'palestrante_8_hora', 'label' => 'Data e Hora da Palestra', 'type' => 'text', 'description' => 'Insira aqui a data e a hora da palestra', ); $palestrante_8_foto = array( 'id' => 'palestrante_8_foto', 'label' => 'Foto do Palestrante', 'type' => 'image', ); $palestrante8 = array($palestrante_8_nome, $palestrante_8_bio, $palestrante_8_tema, $palestrante_8_hora, $palestrante_8_foto); $palestrante_9_nome = array( 'id' => 'palestrante_9_nome', 'label' => 'Nome do Palestrante 9', 'type' => 'text', 'description' => 'Insira aqui o nome do palestrante', ); $palestrante_9_bio = array( 'id' => 'palestrante_9_bio', 'label' => 'Biografia do Palestrante', 'type' => 'editor', 'description' => 'Insira aqui todas as informações do palestrante, inclusive redes sociais e outras informações', ); $palestrante_9_tema = array( 'id' => 'palestrante_9_tema', 'label' => 'Tema ou Nome da Palestra', 'type' => 'text', 'description' => 'Insira aqui o tema ou o nome da palestra', ); $palestrante_9_hora = array( 'id' => 'palestrante_9_hora', 'label' => 'Data e Hora da Palestra', 'type' => 'text', 'description' => 'Insira aqui a data e a hora da palestra', ); $palestrante_9_foto = array( 'id' => 'palestrante_9_foto', 'label' => 'Foto do Palestrante', 'type' => 'image', ); $palestrante9 = array($palestrante_9_nome, $palestrante_9_bio, $palestrante_9_tema, $palestrante_9_hora, $palestrante_9_foto); $palestrante_10_nome = array( 'id' => 'palestrante_10_nome', 'label' => 'Nome do Palestrante 10', 'type' => 'text', 'description' => 'Insira aqui o nome do palestrante', ); $palestrante_10_bio = array( 'id' => 'palestrante_10_bio', 'label' => 'Biografia do Palestrante', 'type' => 'editor', 'description' => 'Insira aqui todas as informações do palestrante, inclusive redes sociais e outras informações', ); $palestrante_10_tema = array( 'id' => 'palestrante_10_tema', 'label' => 'Tema ou Nome da Palestra', 'type' => 'text', 'description' => 'Insira aqui o tema ou o nome da palestra', ); $palestrante_10_hora = array( 'id' => 'palestrante_10_hora', 'label' => 'Data e Hora da Palestra', 'type' => 'text', 'description' => 'Insira aqui a data e a hora da palestra', ); $palestrante_10_foto = array( 'id' => 'palestrante_10_foto', 'label' => 'Foto do Palestrante', 'type' => 'image', ); $palestrante10 = array($palestrante_10_nome, $palestrante_10_bio, $palestrante_10_tema, $palestrante_10_hora, $palestrante_10_foto); $palestrante_11_nome = array( 'id' => 'palestrante_11_nome', 'label' => 'Nome do Palestrante 11', 'type' => 'text', 'description' => 'Insira aqui o nome do palestrante', ); $palestrante_11_bio = array( 'id' => 'palestrante_11_bio', 'label' => 'Biografia do Palestrante', 'type' => 'editor', 'description' => 'Insira aqui todas as informações do palestrante, inclusive redes sociais e outras informações', ); $palestrante_11_tema = array( 'id' => 'palestrante_11_tema', 'label' => 'Tema ou Nome da Palestra', 'type' => 'text', 'description' => 'Insira aqui o tema ou o nome da palestra', ); $palestrante_11_hora = array( 'id' => 'palestrante_11_hora', 'label' => 'Data e Hora da Palestra', 'type' => 'text', 'description' => 'Insira aqui a data e a hora da palestra', ); $palestrante_11_foto = array( 'id' => 'palestrante_11_foto', 'label' => 'Foto do Palestrante', 'type' => 'image', ); $palestrante11 = array($palestrante_11_nome, $palestrante_11_bio, $palestrante_11_tema, $palestrante_11_hora, $palestrante_11_foto); $palestrante_12_nome = array( 'id' => 'palestrante_12_nome', 'label' => 'Nome do Palestrante 12', 'type' => 'text', 'description' => 'Insira aqui o nome do palestrante', ); $palestrante_12_bio = array( 'id' => 'palestrante_12_bio', 'label' => 'Biografia do Palestrante', 'type' => 'editor', 'description' => 'Insira aqui todas as informações do palestrante, inclusive redes sociais e outras informações', ); $palestrante_12_tema = array( 'id' => 'palestrante_12_tema', 'label' => 'Tema ou Nome da Palestra', 'type' => 'text', 'description' => 'Insira aqui o tema ou o nome da palestra', ); $palestrante_12_hora = array( 'id' => 'palestrante_12_hora', 'label' => 'Data e Hora da Palestra', 'type' => 'text', 'description' => 'Insira aqui a data e a hora da palestra', ); $palestrante_12_foto = array( 'id' => 'palestrante_12_foto', 'label' => 'Foto do Palestrante', 'type' => 'image', ); $palestrante12 = array($palestrante_12_nome, $palestrante_12_bio, $palestrante_12_tema, $palestrante_12_hora, $palestrante_12_foto); $palestrante_13_nome = array( 'id' => 'palestrante_13_nome', 'label' => 'Nome do Palestrante 13', 'type' => 'text', 'description' => 'Insira aqui o nome do palestrante', ); $palestrante_13_bio = array( 'id' => 'palestrante_13_bio', 'label' => 'Biografia do Palestrante', 'type' => 'editor', 'description' => 'Insira aqui todas as informações do palestrante, inclusive redes sociais e outras informações', ); $palestrante_13_tema = array( 'id' => 'palestrante_13_tema', 'label' => 'Tema ou Nome da Palestra', 'type' => 'text', 'description' => 'Insira aqui o tema ou o nome da palestra', ); $palestrante_13_hora = array( 'id' => 'palestrante_13_hora', 'label' => 'Data e Hora da Palestra', 'type' => 'text', 'description' => 'Insira aqui a data e a hora da palestra', ); $palestrante_13_foto = array( 'id' => 'palestrante_13_foto', 'label' => 'Foto do Palestrante', 'type' => 'image', ); $palestrante13 = array($palestrante_13_nome, $palestrante_13_bio, $palestrante_13_tema, $palestrante_13_hora, $palestrante_13_foto); $palestrante_14_nome = array( 'id' => 'palestrante_14_nome', 'label' => 'Nome do Palestrante 14', 'type' => 'text', 'description' => 'Insira aqui o nome do palestrante', ); $palestrante_14_bio = array( 'id' => 'palestrante_14_bio', 'label' => 'Biografia do Palestrante', 'type' => 'editor', 'description' => 'Insira aqui todas as informações do palestrante, inclusive redes sociais e outras informações', ); $palestrante_14_tema = array( 'id' => 'palestrante_14_tema', 'label' => 'Tema ou Nome da Palestra', 'type' => 'text', 'description' => 'Insira aqui o tema ou o nome da palestra', ); $palestrante_14_hora = array( 'id' => 'palestrante_14_hora', 'label' => 'Data e Hora da Palestra', 'type' => 'text', 'description' => 'Insira aqui a data e a hora da palestra', ); $palestrante_14_foto = array( 'id' => 'palestrante_14_foto', 'label' => 'Foto do Palestrante', 'type' => 'image', ); $palestrante14 = array($palestrante_14_nome, $palestrante_14_bio, $palestrante_14_tema, $palestrante_14_hora, $palestrante_14_foto); $palestrante_15_nome = array( 'id' => 'palestrante_15_nome', 'label' => 'Nome do Palestrante 15', 'type' => 'text', 'description' => 'Insira aqui o nome do palestrante', ); $palestrante_15_bio = array( 'id' => 'palestrante_15_bio', 'label' => 'Biografia do Palestrante', 'type' => 'editor', 'description' => 'Insira aqui todas as informações do palestrante, inclusive redes sociais e outras informações', ); $palestrante_15_tema = array( 'id' => 'palestrante_15_tema', 'label' => 'Tema ou Nome da Palestra', 'type' => 'text', 'description' => 'Insira aqui o tema ou o nome da palestra', ); $palestrante_15_hora = array( 'id' => 'palestrante_15_hora', 'label' => 'Data e Hora da Palestra', 'type' => 'text', 'description' => 'Insira aqui a data e a hora da palestra', ); $palestrante_15_foto = array( 'id' => 'palestrante_15_foto', 'label' => 'Foto do Palestrante', 'type' => 'image', ); $palestrante15 = array($palestrante_15_nome, $palestrante_15_bio, $palestrante_15_tema, $palestrante_15_hora, $palestrante_15_foto); $palestrante_16_nome = array( 'id' => 'palestrante_16_nome', 'label' => 'Nome do Palestrante 16', 'type' => 'text', 'description' => 'Insira aqui o nome do palestrante', ); $palestrante_16_bio = array( 'id' => 'palestrante_16_bio', 'label' => 'Biografia do Palestrante', 'type' => 'editor', 'description' => 'Insira aqui todas as informações do palestrante, inclusive redes sociais e outras informações', ); $palestrante_16_tema = array( 'id' => 'palestrante_16_tema', 'label' => 'Tema ou Nome da Palestra', 'type' => 'text', 'description' => 'Insira aqui o tema ou o nome da palestra', ); $palestrante_16_hora = array( 'id' => 'palestrante_16_hora', 'label' => 'Data e Hora da Palestra', 'type' => 'text', 'description' => 'Insira aqui a data e a hora da palestra', ); $palestrante_16_foto = array( 'id' => 'palestrante_16_foto', 'label' => 'Foto do Palestrante', 'type' => 'image', ); $palestrante16 = array($palestrante_16_nome, $palestrante_16_bio, $palestrante_16_tema, $palestrante_16_hora, $palestrante_16_foto); $palestrante_17_nome = array( 'id' => 'palestrante_17_nome', 'label' => 'Nome do Palestrante 17', 'type' => 'text', 'description' => 'Insira aqui o nome do palestrante', ); $palestrante_17_bio = array( 'id' => 'palestrante_17_bio', 'label' => 'Biografia do Palestrante', 'type' => 'editor', 'description' => 'Insira aqui todas as informações do palestrante, inclusive redes sociais e outras informações', ); $palestrante_17_tema = array( 'id' => 'palestrante_17_tema', 'label' => 'Tema ou Nome da Palestra', 'type' => 'text', 'description' => 'Insira aqui o tema ou o nome da palestra', ); $palestrante_17_hora = array( 'id' => 'palestrante_17_hora', 'label' => 'Data e Hora da Palestra', 'type' => 'text', 'description' => 'Insira aqui a data e a hora da palestra', ); $palestrante_17_foto = array( 'id' => 'palestrante_17_foto', 'label' => 'Foto do Palestrante', 'type' => 'image', ); $palestrante17 = array($palestrante_17_nome, $palestrante_17_bio, $palestrante_17_tema, $palestrante_17_hora, $palestrante_17_foto); $palestrante_18_nome = array( 'id' => 'palestrante_18_nome', 'label' => 'Nome do Palestrante 18', 'type' => 'text', 'description' => 'Insira aqui o nome do palestrante', ); $palestrante_18_bio = array( 'id' => 'palestrante_18_bio', 'label' => 'Biografia do Palestrante', 'type' => 'editor', 'description' => 'Insira aqui todas as informações do palestrante, inclusive redes sociais e outras informações', ); $palestrante_18_tema = array( 'id' => 'palestrante_18_tema', 'label' => 'Tema ou Nome da Palestra', 'type' => 'text', 'description' => 'Insira aqui o tema ou o nome da palestra', ); $palestrante_18_hora = array( 'id' => 'palestrante_18_hora', 'label' => 'Data e Hora da Palestra', 'type' => 'text', 'description' => 'Insira aqui a data e a hora da palestra', ); $palestrante_18_foto = array( 'id' => 'palestrante_18_foto', 'label' => 'Foto do Palestrante', 'type' => 'image', ); $palestrante18 = array($palestrante_18_nome, $palestrante_18_bio, $palestrante_18_tema, $palestrante_18_hora, $palestrante_18_foto); $palestrante_19_nome = array( 'id' => 'palestrante_19_nome', 'label' => 'Nome do Palestrante 19', 'type' => 'text', 'description' => 'Insira aqui o nome do palestrante', ); $palestrante_19_bio = array( 'id' => 'palestrante_19_bio', 'label' => 'Biografia do Palestrante', 'type' => 'editor', 'description' => 'Insira aqui todas as informações do palestrante, inclusive redes sociais e outras informações', ); $palestrante_19_tema = array( 'id' => 'palestrante_19_tema', 'label' => 'Tema ou Nome da Palestra', 'type' => 'text', 'description' => 'Insira aqui o tema ou o nome da palestra', ); $palestrante_19_hora = array( 'id' => 'palestrante_19_hora', 'label' => 'Data e Hora da Palestra', 'type' => 'text', 'description' => 'Insira aqui a data e a hora da palestra', ); $palestrante_19_foto = array( 'id' => 'palestrante_19_foto', 'label' => 'Foto do Palestrante', 'type' => 'image', ); $palestrante19 = array($palestrante_19_nome, $palestrante_19_bio, $palestrante_19_tema, $palestrante_19_hora, $palestrante_19_foto); $palestrante_20_nome = array( 'id' => 'palestrante_20_nome', 'label' => 'Nome do Palestrante 20', 'type' => 'text', 'description' => 'Insira aqui o nome do palestrante', ); $palestrante_20_bio = array( 'id' => 'palestrante_20_bio', 'label' => 'Biografia do Palestrante', 'type' => 'editor', 'description' => 'Insira aqui todas as informações do palestrante, inclusive redes sociais e outras informações', ); $palestrante_20_tema = array( 'id' => 'palestrante_20_tema', 'label' => 'Tema ou Nome da Palestra', 'type' => 'text', 'description' => 'Insira aqui o tema ou o nome da palestra', ); $palestrante_20_hora = array( 'id' => 'palestrante_20_hora', 'label' => 'Data e Hora da Palestra', 'type' => 'text', 'description' => 'Insira aqui a data e a hora da palestra', ); $palestrante_20_foto = array( 'id' => 'palestrante_20_foto', 'label' => 'Foto do Palestrante', 'type' => 'image', ); $palestrante20 = array($palestrante_20_nome, $palestrante_20_bio, $palestrante_20_tema, $palestrante_20_hora, $palestrante_20_foto); $palestrante_21_nome = array( 'id' => 'palestrante_21_nome', 'label' => 'Nome do Palestrante 21', 'type' => 'text', 'description' => 'Insira aqui o nome do palestrante', ); $palestrante_21_bio = array( 'id' => 'palestrante_21_bio', 'label' => 'Biografia do Palestrante', 'type' => 'editor', 'description' => 'Insira aqui todas as informações do palestrante, inclusive redes sociais e outras informações', ); $palestrante_21_tema = array( 'id' => 'palestrante_21_tema', 'label' => 'Tema ou Nome da Palestra', 'type' => 'text', 'description' => 'Insira aqui o tema ou o nome da palestra', ); $palestrante_21_hora = array( 'id' => 'palestrante_21_hora', 'label' => 'Data e Hora da Palestra', 'type' => 'text', 'description' => 'Insira aqui a data e a hora da palestra', ); $palestrante_21_foto = array( 'id' => 'palestrante_21_foto', 'label' => 'Foto do Palestrante', 'type' => 'image', ); $palestrante21 = array($palestrante_21_nome, $palestrante_21_bio, $palestrante_21_tema, $palestrante_21_hora, $palestrante_21_foto); $palestrante_22_nome = array( 'id' => 'palestrante_22_nome', 'label' => 'Nome do Palestrante 22', 'type' => 'text', 'description' => 'Insira aqui o nome do palestrante', ); $palestrante_22_bio = array( 'id' => 'palestrante_22_bio', 'label' => 'Biografia do Palestrante', 'type' => 'editor', 'description' => 'Insira aqui todas as informações do palestrante, inclusive redes sociais e outras informações', ); $palestrante_22_tema = array( 'id' => 'palestrante_22_tema', 'label' => 'Tema ou Nome da Palestra', 'type' => 'text', 'description' => 'Insira aqui o tema ou o nome da palestra', ); $palestrante_22_hora = array( 'id' => 'palestrante_22_hora', 'label' => 'Data e Hora da Palestra', 'type' => 'text', 'description' => 'Insira aqui a data e a hora da palestra', ); $palestrante_22_foto = array( 'id' => 'palestrante_22_foto', 'label' => 'Foto do Palestrante', 'type' => 'image', ); $palestrante22 = array($palestrante_22_nome, $palestrante_22_bio, $palestrante_22_tema, $palestrante_22_hora, $palestrante_22_foto); $palestrante_23_nome = array( 'id' => 'palestrante_23_nome', 'label' => 'Nome do Palestrante 23', 'type' => 'text', 'description' => 'Insira aqui o nome do palestrante', ); $palestrante_23_bio = array( 'id' => 'palestrante_23_bio', 'label' => 'Biografia do Palestrante', 'type' => 'editor', 'description' => 'Insira aqui todas as informações do palestrante, inclusive redes sociais e outras informações', ); $palestrante_23_tema = array( 'id' => 'palestrante_23_tema', 'label' => 'Tema ou Nome da Palestra', 'type' => 'text', 'description' => 'Insira aqui o tema ou o nome da palestra', ); $palestrante_23_hora = array( 'id' => 'palestrante_23_hora', 'label' => 'Data e Hora da Palestra', 'type' => 'text', 'description' => 'Insira aqui a data e a hora da palestra', ); $palestrante_23_foto = array( 'id' => 'palestrante_23_foto', 'label' => 'Foto do Palestrante', 'type' => 'image', ); $palestrante23 = array($palestrante_23_nome, $palestrante_23_bio, $palestrante_23_tema, $palestrante_23_hora, $palestrante_23_foto); $palestrante_24_nome = array( 'id' => 'palestrante_24_nome', 'label' => 'Nome do Palestrante 24', 'type' => 'text', 'description' => 'Insira aqui o nome do palestrante', ); $palestrante_24_bio = array( 'id' => 'palestrante_24_bio', 'label' => 'Biografia do Palestrante', 'type' => 'editor', 'description' => 'Insira aqui todas as informações do palestrante, inclusive redes sociais e outras informações', ); $palestrante_24_tema = array( 'id' => 'palestrante_24_tema', 'label' => 'Tema ou Nome da Palestra', 'type' => 'text', 'description' => 'Insira aqui o tema ou o nome da palestra', ); $palestrante_24_hora = array( 'id' => 'palestrante_24_hora', 'label' => 'Data e Hora da Palestra', 'type' => 'text', 'description' => 'Insira aqui a data e a hora da palestra', ); $palestrante_24_foto = array( 'id' => 'palestrante_24_foto', 'label' => 'Foto do Palestrante', 'type' => 'image', ); $palestrante24 = array($palestrante_24_nome, $palestrante_24_bio, $palestrante_24_tema, $palestrante_24_hora, $palestrante_24_foto); $palestrante_25_nome = array( 'id' => 'palestrante_25_nome', 'label' => 'Nome do Palestrante 25', 'type' => 'text', 'description' => 'Insira aqui o nome do palestrante', ); $palestrante_25_bio = array( 'id' => 'palestrante_25_bio', 'label' => 'Biografia do Palestrante', 'type' => 'editor', 'description' => 'Insira aqui todas as informações do palestrante, inclusive redes sociais e outras informações', ); $palestrante_25_tema = array( 'id' => 'palestrante_25_tema', 'label' => 'Tema ou Nome da Palestra', 'type' => 'text', 'description' => 'Insira aqui o tema ou o nome da palestra', ); $palestrante_25_hora = array( 'id' => 'palestrante_25_hora', 'label' => 'Data e Hora da Palestra', 'type' => 'text', 'description' => 'Insira aqui a data e a hora da palestra', ); $palestrante_25_foto = array( 'id' => 'palestrante_25_foto', 'label' => 'Foto do Palestrante', 'type' => 'image', ); $palestrante25 = array($palestrante_25_nome, $palestrante_25_bio, $palestrante_25_tema, $palestrante_25_hora, $palestrante_25_foto); $palestrante_26_nome = array( 'id' => 'palestrante_26_nome', 'label' => 'Nome do Palestrante 26', 'type' => 'text', 'description' => 'Insira aqui o nome do palestrante', ); $palestrante_26_bio = array( 'id' => 'palestrante_26_bio', 'label' => 'Biografia do Palestrante', 'type' => 'editor', 'description' => 'Insira aqui todas as informações do palestrante, inclusive redes sociais e outras informações', ); $palestrante_26_tema = array( 'id' => 'palestrante_26_tema', 'label' => 'Tema ou Nome da Palestra', 'type' => 'text', 'description' => 'Insira aqui o tema ou o nome da palestra', ); $palestrante_26_hora = array( 'id' => 'palestrante_26_hora', 'label' => 'Data e Hora da Palestra', 'type' => 'text', 'description' => 'Insira aqui a data e a hora da palestra', ); $palestrante_26_foto = array( 'id' => 'palestrante_26_foto', 'label' => 'Foto do Palestrante', 'type' => 'image', ); $palestrante26 = array($palestrante_26_nome, $palestrante_26_bio, $palestrante_26_tema, $palestrante_26_hora, $palestrante_26_foto); $palestrante_27_nome = array( 'id' => 'palestrante_27_nome', 'label' => 'Nome do Palestrante 27', 'type' => 'text', 'description' => 'Insira aqui o nome do palestrante', ); $palestrante_27_bio = array( 'id' => 'palestrante_27_bio', 'label' => 'Biografia do Palestrante', 'type' => 'editor', 'description' => 'Insira aqui todas as informações do palestrante, inclusive redes sociais e outras informações', ); $palestrante_27_tema = array( 'id' => 'palestrante_27_tema', 'label' => 'Tema ou Nome da Palestra', 'type' => 'text', 'description' => 'Insira aqui o tema ou o nome da palestra', ); $palestrante_27_hora = array( 'id' => 'palestrante_27_hora', 'label' => 'Data e Hora da Palestra', 'type' => 'text', 'description' => 'Insira aqui a data e a hora da palestra', ); $palestrante_27_foto = array( 'id' => 'palestrante_27_foto', 'label' => 'Foto do Palestrante', 'type' => 'image', ); $palestrante27 = array($palestrante_27_nome, $palestrante_27_bio, $palestrante_27_tema, $palestrante_27_hora, $palestrante_27_foto); $palestrante_28_nome = array( 'id' => 'palestrante_28_nome', 'label' => 'Nome do Palestrante 28', 'type' => 'text', 'description' => 'Insira aqui o nome do palestrante', ); $palestrante_28_bio = array( 'id' => 'palestrante_28_bio', 'label' => 'Biografia do Palestrante', 'type' => 'editor', 'description' => 'Insira aqui todas as informações do palestrante, inclusive redes sociais e outras informações', ); $palestrante_28_tema = array( 'id' => 'palestrante_28_tema', 'label' => 'Tema ou Nome da Palestra', 'type' => 'text', 'description' => 'Insira aqui o tema ou o nome da palestra', ); $palestrante_28_hora = array( 'id' => 'palestrante_28_hora', 'label' => 'Data e Hora da Palestra', 'type' => 'text', 'description' => 'Insira aqui a data e a hora da palestra', ); $palestrante_28_foto = array( 'id' => 'palestrante_28_foto', 'label' => 'Foto do Palestrante', 'type' => 'image', ); $palestrante28 = array($palestrante_28_nome, $palestrante_28_bio, $palestrante_28_tema, $palestrante_28_hora, $palestrante_28_foto); $palestrante_29_nome = array( 'id' => 'palestrante_29_nome', 'label' => 'Nome do Palestrante 29', 'type' => 'text', 'description' => 'Insira aqui o nome do palestrante', ); $palestrante_29_bio = array( 'id' => 'palestrante_29_bio', 'label' => 'Biografia do Palestrante', 'type' => 'editor', 'description' => 'Insira aqui todas as informações do palestrante, inclusive redes sociais e outras informações', ); $palestrante_29_tema = array( 'id' => 'palestrante_29_tema', 'label' => 'Tema ou Nome da Palestra', 'type' => 'text', 'description' => 'Insira aqui o tema ou o nome da palestra', ); $palestrante_29_hora = array( 'id' => 'palestrante_29_hora', 'label' => 'Data e Hora da Palestra', 'type' => 'text', 'description' => 'Insira aqui a data e a hora da palestra', ); $palestrante_29_foto = array( 'id' => 'palestrante_29_foto', 'label' => 'Foto do Palestrante', 'type' => 'image', ); $palestrante29 = array($palestrante_29_nome, $palestrante_29_bio, $palestrante_29_tema, $palestrante_29_hora, $palestrante_29_foto); $palestrante_30_nome = array( 'id' => 'palestrante_30_nome', 'label' => 'Nome do Palestrante 30', 'type' => 'text', 'description' => 'Insira aqui o nome do palestrante', ); $palestrante_30_bio = array( 'id' => 'palestrante_30_bio', 'label' => 'Biografia do Palestrante', 'type' => 'editor', 'description' => 'Insira aqui todas as informações do palestrante, inclusive redes sociais e outras informações', ); $palestrante_30_tema = array( 'id' => 'palestrante_30_tema', 'label' => 'Tema ou Nome da Palestra', 'type' => 'text', 'description' => 'Insira aqui o tema ou o nome da palestra', ); $palestrante_30_hora = array( 'id' => 'palestrante_30_hora', 'label' => 'Data e Hora da Palestra', 'type' => 'text', 'description' => 'Insira aqui a data e a hora da palestra', ); $palestrante_30_foto = array( 'id' => 'palestrante_30_foto', 'label' => 'Foto do Palestrante', 'type' => 'image', ); $palestrante30 = array($palestrante_30_nome, $palestrante_30_bio, $palestrante_30_tema, $palestrante_30_hora, $palestrante_30_foto); $palestrante_31_nome = array( 'id' => 'palestrante_31_nome', 'label' => 'Nome do Palestrante 31', 'type' => 'text', 'description' => 'Insira aqui o nome do palestrante', ); $palestrante_31_bio = array( 'id' => 'palestrante_31_bio', 'label' => 'Biografia do Palestrante', 'type' => 'editor', 'description' => 'Insira aqui todas as informações do palestrante, inclusive redes sociais e outras informações', ); $palestrante_31_tema = array( 'id' => 'palestrante_31_tema', 'label' => 'Tema ou Nome da Palestra', 'type' => 'text', 'description' => 'Insira aqui o tema ou o nome da palestra', ); $palestrante_31_hora = array( 'id' => 'palestrante_31_hora', 'label' => 'Data e Hora da Palestra', 'type' => 'text', 'description' => 'Insira aqui a data e a hora da palestra', ); $palestrante_31_foto = array( 'id' => 'palestrante_31_foto', 'label' => 'Foto do Palestrante', 'type' => 'image', ); $palestrante31 = array($palestrante_31_nome, $palestrante_31_bio, $palestrante_31_tema, $palestrante_31_hora, $palestrante_31_foto); $palestrante_32_nome = array( 'id' => 'palestrante_32_nome', 'label' => 'Nome do Palestrante 32', 'type' => 'text', 'description' => 'Insira aqui o nome do palestrante', ); $palestrante_32_bio = array( 'id' => 'palestrante_32_bio', 'label' => 'Biografia do Palestrante', 'type' => 'editor', 'description' => 'Insira aqui todas as informações do palestrante, inclusive redes sociais e outras informações', ); $palestrante_32_tema = array( 'id' => 'palestrante_32_tema', 'label' => 'Tema ou Nome da Palestra', 'type' => 'text', 'description' => 'Insira aqui o tema ou o nome da palestra', ); $palestrante_32_hora = array( 'id' => 'palestrante_32_hora', 'label' => 'Data e Hora da Palestra', 'type' => 'text', 'description' => 'Insira aqui a data e a hora da palestra', ); $palestrante_32_foto = array( 'id' => 'palestrante_32_foto', 'label' => 'Foto do Palestrante', 'type' => 'image', ); $palestrante32 = array($palestrante_32_nome, $palestrante_32_bio, $palestrante_32_tema, $palestrante_32_hora, $palestrante_32_foto); $palestrante_33_nome = array( 'id' => 'palestrante_33_nome', 'label' => 'Nome do Palestrante 33', 'type' => 'text', 'description' => 'Insira aqui o nome do palestrante', ); $palestrante_33_bio = array( 'id' => 'palestrante_33_bio', 'label' => 'Biografia do Palestrante', 'type' => 'editor', 'description' => 'Insira aqui todas as informações do palestrante, inclusive redes sociais e outras informações', ); $palestrante_33_tema = array( 'id' => 'palestrante_33_tema', 'label' => 'Tema ou Nome da Palestra', 'type' => 'text', 'description' => 'Insira aqui o tema ou o nome da palestra', ); $palestrante_33_hora = array( 'id' => 'palestrante_33_hora', 'label' => 'Data e Hora da Palestra', 'type' => 'text', 'description' => 'Insira aqui a data e a hora da palestra', ); $palestrante_33_foto = array( 'id' => 'palestrante_33_foto', 'label' => 'Foto do Palestrante', 'type' => 'image', ); $palestrante33 = array($palestrante_33_nome, $palestrante_33_bio, $palestrante_33_tema, $palestrante_33_hora, $palestrante_33_foto); $palestrante_34_nome = array( 'id' => 'palestrante_34_nome', 'label' => 'Nome do Palestrante 34', 'type' => 'text', 'description' => 'Insira aqui o nome do palestrante', ); $palestrante_34_bio = array( 'id' => 'palestrante_34_bio', 'label' => 'Biografia do Palestrante', 'type' => 'editor', 'description' => 'Insira aqui todas as informações do palestrante, inclusive redes sociais e outras informações', ); $palestrante_34_tema = array( 'id' => 'palestrante_34_tema', 'label' => 'Tema ou Nome da Palestra', 'type' => 'text', 'description' => 'Insira aqui o tema ou o nome da palestra', ); $palestrante_34_hora = array( 'id' => 'palestrante_34_hora', 'label' => 'Data e Hora da Palestra', 'type' => 'text', 'description' => 'Insira aqui a data e a hora da palestra', ); $palestrante_34_foto = array( 'id' => 'palestrante_34_foto', 'label' => 'Foto do Palestrante', 'type' => 'image', ); $palestrante34 = array($palestrante_34_nome, $palestrante_34_bio, $palestrante_34_tema, $palestrante_34_hora, $palestrante_34_foto); $palestrante_35_nome = array( 'id' => 'palestrante_35_nome', 'label' => 'Nome do Palestrante 35', 'type' => 'text', 'description' => 'Insira aqui o nome do palestrante', ); $palestrante_35_bio = array( 'id' => 'palestrante_35_bio', 'label' => 'Biografia do Palestrante', 'type' => 'editor', 'description' => 'Insira aqui todas as informações do palestrante, inclusive redes sociais e outras informações', ); $palestrante_35_tema = array( 'id' => 'palestrante_35_tema', 'label' => 'Tema ou Nome da Palestra', 'type' => 'text', 'description' => 'Insira aqui o tema ou o nome da palestra', ); $palestrante_35_hora = array( 'id' => 'palestrante_35_hora', 'label' => 'Data e Hora da Palestra', 'type' => 'text', 'description' => 'Insira aqui a data e a hora da palestra', ); $palestrante_35_foto = array( 'id' => 'palestrante_35_foto', 'label' => 'Foto do Palestrante', 'type' => 'image', ); $palestrante35 = array($palestrante_35_nome, $palestrante_35_bio, $palestrante_35_tema, $palestrante_35_hora, $palestrante_35_foto); $palestrante_36_nome = array( 'id' => 'palestrante_36_nome', 'label' => 'Nome do Palestrante 36', 'type' => 'text', 'description' => 'Insira aqui o nome do palestrante', ); $palestrante_36_bio = array( 'id' => 'palestrante_36_bio', 'label' => 'Biografia do Palestrante', 'type' => 'editor', 'description' => 'Insira aqui todas as informações do palestrante, inclusive redes sociais e outras informações', ); $palestrante_36_tema = array( 'id' => 'palestrante_36_tema', 'label' => 'Tema ou Nome da Palestra', 'type' => 'text', 'description' => 'Insira aqui o tema ou o nome da palestra', ); $palestrante_36_hora = array( 'id' => 'palestrante_36_hora', 'label' => 'Data e Hora da Palestra', 'type' => 'text', 'description' => 'Insira aqui a data e a hora da palestra', ); $palestrante_36_foto = array( 'id' => 'palestrante_36_foto', 'label' => 'Foto do Palestrante', 'type' => 'image', ); $palestrante36 = array($palestrante_36_nome, $palestrante_36_bio, $palestrante_36_tema, $palestrante_36_hora, $palestrante_36_foto); $palestrante_37_nome = array( 'id' => 'palestrante_37_nome', 'label' => 'Nome do Palestrante 37', 'type' => 'text', 'description' => 'Insira aqui o nome do palestrante', ); $palestrante_37_bio = array( 'id' => 'palestrante_37_bio', 'label' => 'Biografia do Palestrante', 'type' => 'editor', 'description' => 'Insira aqui todas as informações do palestrante, inclusive redes sociais e outras informações', ); $palestrante_37_tema = array( 'id' => 'palestrante_37_tema', 'label' => 'Tema ou Nome da Palestra', 'type' => 'text', 'description' => 'Insira aqui o tema ou o nome da palestra', ); $palestrante_37_hora = array( 'id' => 'palestrante_37_hora', 'label' => 'Data e Hora da Palestra', 'type' => 'text', 'description' => 'Insira aqui a data e a hora da palestra', ); $palestrante_37_foto = array( 'id' => 'palestrante_37_foto', 'label' => 'Foto do Palestrante', 'type' => 'image', ); $palestrante37 = array($palestrante_37_nome, $palestrante_37_bio, $palestrante_37_tema, $palestrante_37_hora, $palestrante_37_foto); $palestrante_38_nome = array( 'id' => 'palestrante_38_nome', 'label' => 'Nome do Palestrante 38', 'type' => 'text', 'description' => 'Insira aqui o nome do palestrante', ); $palestrante_38_bio = array( 'id' => 'palestrante_38_bio', 'label' => 'Biografia do Palestrante', 'type' => 'editor', 'description' => 'Insira aqui todas as informações do palestrante, inclusive redes sociais e outras informações', ); $palestrante_38_tema = array( 'id' => 'palestrante_38_tema', 'label' => 'Tema ou Nome da Palestra', 'type' => 'text', 'description' => 'Insira aqui o tema ou o nome da palestra', ); $palestrante_38_hora = array( 'id' => 'palestrante_38_hora', 'label' => 'Data e Hora da Palestra', 'type' => 'text', 'description' => 'Insira aqui a data e a hora da palestra', ); $palestrante_38_foto = array( 'id' => 'palestrante_38_foto', 'label' => 'Foto do Palestrante', 'type' => 'image', ); $palestrante38 = array($palestrante_38_nome, $palestrante_38_bio, $palestrante_38_tema, $palestrante_38_hora, $palestrante_38_foto); $palestrante_39_nome = array( 'id' => 'palestrante_39_nome', 'label' => 'Nome do Palestrante 39', 'type' => 'text', 'description' => 'Insira aqui o nome do palestrante', ); $palestrante_39_bio = array( 'id' => 'palestrante_39_bio', 'label' => 'Biografia do Palestrante', 'type' => 'editor', 'description' => 'Insira aqui todas as informações do palestrante, inclusive redes sociais e outras informações', ); $palestrante_39_tema = array( 'id' => 'palestrante_39_tema', 'label' => 'Tema ou Nome da Palestra', 'type' => 'text', 'description' => 'Insira aqui o tema ou o nome da palestra', ); $palestrante_39_hora = array( 'id' => 'palestrante_39_hora', 'label' => 'Data e Hora da Palestra', 'type' => 'text', 'description' => 'Insira aqui a data e a hora da palestra', ); $palestrante_39_foto = array( 'id' => 'palestrante_39_foto', 'label' => 'Foto do Palestrante', 'type' => 'image', ); $palestrante39 = array($palestrante_39_nome, $palestrante_39_bio, $palestrante_39_tema, $palestrante_39_hora, $palestrante_39_foto); $palestrante_40_nome = array( 'id' => 'palestrante_40_nome', 'label' => 'Nome do Palestrante 40', 'type' => 'text', 'description' => 'Insira aqui o nome do palestrante', ); $palestrante_40_bio = array( 'id' => 'palestrante_40_bio', 'label' => 'Biografia do Palestrante', 'type' => 'editor', 'description' => 'Insira aqui todas as informações do palestrante, inclusive redes sociais e outras informações', ); $palestrante_40_tema = array( 'id' => 'palestrante_40_tema', 'label' => 'Tema ou Nome da Palestra', 'type' => 'text', 'description' => 'Insira aqui o tema ou o nome da palestra', ); $palestrante_40_hora = array( 'id' => 'palestrante_40_hora', 'label' => 'Data e Hora da Palestra', 'type' => 'text', 'description' => 'Insira aqui a data e a hora da palestra', ); $palestrante_40_foto = array( 'id' => 'palestrante_40_foto', 'label' => 'Foto do Palestrante', 'type' => 'image', ); $palestrante40 = array($palestrante_40_nome, $palestrante_40_bio, $palestrante_40_tema, $palestrante_40_hora, $palestrante_40_foto);

$titpalestrantes = array(
    'id' => 'titpalestrantes', // Obrigatório
    'label' => '<h2 class="titulo">Palestrantes</h2>',
    'type' => 'title', // Obrigatório
);

$destaque_palestrante = array(
    'id' => 'destaque_palestrante',
    'label' => 'O que destacar mais?',
    'type' => 'select',
    'options' => array(
        '0' => 'Nome do Palestrante',
        '1' => 'Tema da Palestra',
    ),
);

$titpalestrantes = array($titpalestrantes, $sep);
$palestrantes = array_merge($titpalestrantes, array($destaque_palestrante), $palestrante1, $palestrante2, $palestrante3, $palestrante4,
    $palestrante5, $palestrante6, $palestrante7, $palestrante8, $palestrante9, $palestrante10, 
    $palestrante11, $palestrante12, $palestrante13, $palestrante14, $palestrante15, $palestrante16, 
    $palestrante17, $palestrante18, $palestrante19, $palestrante20, $palestrante21, $palestrante22, 
    $palestrante23, $palestrante24, $palestrante25, $palestrante26, $palestrante27, $palestrante28, 
    $palestrante29, $palestrante30, $palestrante31, $palestrante32, $palestrante33, $palestrante34, 
    $palestrante35, $palestrante36, $palestrante37, $palestrante38, $palestrante39, $palestrante40);

$exibir_entre_datas = array(
    'id' => 'exibir_entre_datas',
    'label' => 'Exibir captura entre as datas?',
    'type' => 'select',
    'options' => array(
        '0' => 'Não',
        '1' => 'Sim',
    ),
);

$conteudo_footer = array(
    'id' => 'conteudo_footer',
    'label' => 'Conteúdo no Footer',
    'type' => 'editor',
    'description' => 'Usado sobre tudo para incluir termos de uso, políticas de privacidade e outros'
);

$metabox_congresso_palestrantes_1 = new Odin_Metabox(
        'metabox_congresso_palestrantes_1', // Slug/ID do Metabox (obrigatório)
        'Configurações do Modelo Página de Palestrantes I', // Nome do Metabox  (obrigatório)
        'page', // Slug do Post Type, sendo possível enviar apenas um valor ou um array com vários (opcional)
        'normal', // Contexto (opções: normal, advanced, ou side) (opcional)
        'high' // Prioridade (opções: high, core, default ou low) (opcional)
);

$metabox_congresso_palestrantes_1->set_fields(
        array_merge(array($background, $logo, $headline,$subheadline, $video_iframe, $cor_box, $trans_box), 
            $optin, array($exibir_entre_datas), $redes_sociais, $contador, $dias, $palestrantes, $animacoes, $opcoes, 
            array($descricao))
);

$palestrante1 = array($palestrante_1_nome, $palestrante_1_bio, $palestrante_1_foto); $palestrante2 = array($palestrante_2_nome, $palestrante_2_bio, $palestrante_2_foto); $palestrante3 = array($palestrante_3_nome, $palestrante_3_bio, $palestrante_3_foto); $palestrante4 = array($palestrante_4_nome, $palestrante_4_bio, $palestrante_4_foto); $palestrante5 = array($palestrante_5_nome, $palestrante_5_bio, $palestrante_5_foto); $palestrante6 = array($palestrante_6_nome, $palestrante_6_bio, $palestrante_6_foto); $palestrante7 = array($palestrante_7_nome, $palestrante_7_bio, $palestrante_7_foto); $palestrante8 = array($palestrante_8_nome, $palestrante_8_bio, $palestrante_8_foto); $palestrante9 = array($palestrante_9_nome, $palestrante_9_bio, $palestrante_9_foto); $palestrante10 = array($palestrante_10_nome, $palestrante_10_bio, $palestrante_10_foto); $palestrante11 = array($palestrante_11_nome, $palestrante_11_bio, $palestrante_11_foto); $palestrante12 = array($palestrante_12_nome, $palestrante_12_bio, $palestrante_12_foto); $palestrante13 = array($palestrante_13_nome, $palestrante_13_bio, $palestrante_13_foto); $palestrante14 = array($palestrante_14_nome, $palestrante_14_bio, $palestrante_14_foto); $palestrante15 = array($palestrante_15_nome, $palestrante_15_bio, $palestrante_15_foto); $palestrante16 = array($palestrante_16_nome, $palestrante_16_bio, $palestrante_16_foto); $palestrante17 = array($palestrante_17_nome, $palestrante_17_bio, $palestrante_17_foto); $palestrante18 = array($palestrante_18_nome, $palestrante_18_bio, $palestrante_18_foto); $palestrante19 = array($palestrante_19_nome, $palestrante_19_bio, $palestrante_19_foto); $palestrante20 = array($palestrante_20_nome, $palestrante_20_bio, $palestrante_20_foto); $palestrante21 = array($palestrante_21_nome, $palestrante_21_bio, $palestrante_21_foto); $palestrante22 = array($palestrante_22_nome, $palestrante_22_bio, $palestrante_22_foto); $palestrante23 = array($palestrante_23_nome, $palestrante_23_bio, $palestrante_23_foto); $palestrante24 = array($palestrante_24_nome, $palestrante_24_bio, $palestrante_24_foto); $palestrante25 = array($palestrante_25_nome, $palestrante_25_bio, $palestrante_25_foto); $palestrante26 = array($palestrante_26_nome, $palestrante_26_bio, $palestrante_26_foto); $palestrante27 = array($palestrante_27_nome, $palestrante_27_bio, $palestrante_27_foto); $palestrante28 = array($palestrante_28_nome, $palestrante_28_bio, $palestrante_28_foto); $palestrante29 = array($palestrante_29_nome, $palestrante_29_bio, $palestrante_29_foto); $palestrante30 = array($palestrante_30_nome, $palestrante_30_bio, $palestrante_30_foto); $palestrante31 = array($palestrante_31_nome, $palestrante_31_bio, $palestrante_31_foto); $palestrante32 = array($palestrante_32_nome, $palestrante_32_bio, $palestrante_32_foto); $palestrante33 = array($palestrante_33_nome, $palestrante_33_bio, $palestrante_33_foto); $palestrante34 = array($palestrante_34_nome, $palestrante_34_bio, $palestrante_34_foto); $palestrante35 = array($palestrante_35_nome, $palestrante_35_bio, $palestrante_35_foto); $palestrante36 = array($palestrante_36_nome, $palestrante_36_bio, $palestrante_36_foto); $palestrante37 = array($palestrante_37_nome, $palestrante_37_bio, $palestrante_37_foto); $palestrante38 = array($palestrante_38_nome, $palestrante_38_bio, $palestrante_38_foto); $palestrante39 = array($palestrante_39_nome, $palestrante_39_bio, $palestrante_39_foto); $palestrante40 = array($palestrante_40_nome, $palestrante_40_bio, $palestrante_40_foto);
$palestrantes = array_merge($titpalestrantes, $palestrante1, $palestrante2, $palestrante3, $palestrante4,
    $palestrante5, $palestrante6, $palestrante7, $palestrante8, $palestrante9, $palestrante10, 
    $palestrante11, $palestrante12, $palestrante13, $palestrante14, $palestrante15, $palestrante16, 
    $palestrante17, $palestrante18, $palestrante19, $palestrante20, $palestrante21, $palestrante22, 
    $palestrante23, $palestrante24, $palestrante25, $palestrante26, $palestrante27, $palestrante28, 
    $palestrante29, $palestrante30, $palestrante31, $palestrante32, $palestrante33, $palestrante34, 
    $palestrante35, $palestrante36, $palestrante37, $palestrante38, $palestrante39, $palestrante40);

$metabox_congresso_palestrantes_2 = new Odin_Metabox(
        'metabox_congresso_palestrantes_2', // Slug/ID do Metabox (obrigatório)
        'Configurações do Modelo Página de Palestrantes II', // Nome do Metabox  (obrigatório)
        'page', // Slug do Post Type, sendo possível enviar apenas um valor ou um array com vários (opcional)
        'normal', // Contexto (opções: normal, advanced, ou side) (opcional)
        'high' // Prioridade (opções: high, core, default ou low) (opcional)
);

$metabox_congresso_palestrantes_2->set_fields(
        array_merge(array($background, $logo, $headline, $subheadline, $video_iframe, $cor_box, $trans_box), 
            $optin, $redes_sociais, $contador, $palestrantes, $animacoes, $opcoes, 
            array($descricao, $conteudo_footer))
);

?>