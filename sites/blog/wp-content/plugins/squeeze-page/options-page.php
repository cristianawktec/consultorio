<?php

$redes_sociais = array(
    array(
        'name' => '',
        'slug' => "divider_redes_sociais",
        "type" => "divider",
        "options" => array(
            "appearance" => "line" // line | white_space
        )
    ),
    array(
        'slug' => "exibir_facebook",
        'name' => 'Exibir botão para curtir a página no Facebook?',
        'description' => 'É colocado uma caixa de curtir a página, desde você tenha uma licença para isso',
        'type' => 'checkbox',
    ),
    array(
        'slug' => "exibir_plus",
        'name' => 'Exibir botão para adicionar aos círculos do Google+?',
        'description' => 'É colocado uma caixa de adicionar aos círculos, desde você tenha uma licença para isso',
        'type' => 'checkbox',
    ),
    array(
        'slug' => "exibir_youtube",
        'name' => 'Exibir botão de inscrição no canal do Youtube?',
        'description' => 'É colocado uma caixa de inscrição no canal, desde você tenha uma licença para isso',
        'type' => 'checkbox',
    ),
    array(
        'slug' => "exibir_twitter",
        'name' => 'Exibir botão para seguir no twitter?',
        'description' => 'É colocado uma caixa para seguir no twitter, desde você tenha uma licença para isso',
        'type' => 'checkbox',
    ),
);
$contador = array(
    array(
        'name' => '',
        'slug' => "divider_contador",
        "type" => "divider",
        "options" => array(
            "appearance" => "line" // line | white_space
        )
    ),
    array(
        'slug' => "exibir_contador",
        'name' => 'Exibir contador regressivo?',
        'description' => 'Exibindo o contador você gerará uma grande urgência para a sua audiência, funcionará caso você tenha uma licença do SqueezeWP',
        'type' => 'checkbox',
    ),
    array(
        'slug' => "titulo_contador",
        'name' => 'Título do Contador',
        'description' => '',
        'type' => 'text',
    ),
    array(
        'slug' => "data_contador",
        'name' => 'Data de expiração da oferta',
        'description' => '',
        'type' => 'date_v2',
        "options" => array(
            "show" => "on_click",
            "show_as" => "datetime",
            "default_date" => "today"
        )
    ),
);
$animacao = array(
    array(
        'name' => '',
        'slug' => "divider_animacao",
        "type" => "divider",
        "options" => array(
            "appearance" => "line" // line | white_space
        )
    ),
    array(
        'slug' => "animacao",
        'name' => 'Usar animações?',
        'description' => 'Exibe os elementos das páginas com animações, funcionará caso você tenha uma licença do SqueezeWP',
        'type' => 'checkbox',
    ),);

$botao = array(array(
        'slug' => "botao",
        'name' => 'Texto do Botão (CTA)',
        'description' => '',
        'type' => 'text'
    ),
    array(
        'slug' => "cor_botao",
        'name' => 'Cor do botão (CTA)',
        'type' => 'dropdown',
        'options' => array(
            "enable_multiple" => false,
            "values" => array(
                array(
                    "num" => '0',
                    "value" => "Verde"
                ),
                array(
                    "num" => '1',
                    "value" => "Azul escuro"
                ),
                array(
                    "num" => '2',
                    "value" => "Azul"
                ),
                array(
                    "num" => '3',
                    "value" => "Laranja"
                ),
                array(
                    "num" => '4',
                    "value" => "Vermelho"
                )
            )
        )
        ));

$optin = array(
    array(
        'name' => '',
        'slug' => "divider_optin",
        "type" => "divider",
        "options" => array(
            "appearance" => "line" // line | white_space
        )
    ),
    array(
        'slug' => "texto_formulario",
        'name' => 'Texto Acima do Formulário',
        'description' => '',
        'placeholder' => 'Texto Acima do Formulário',
        'type' => 'text'
    ),
    array(
        'slug' => "form",
        'name' => 'Form',
        'description' => '',
        'type' => 'textarea'
    ),
    array(
        'slug' => "placeholder",
        'name' => 'Rótulo do E-mail',
        'description' => 'Rótulo que aparecerá no campo de e-mail do usuário',
        'type' => 'text'
    ),
    array(
        'slug' => "exibir_campos",
        'name' => 'Exibir campos além do e-mail?',
        'description' => 'Caso deseje exibir outros campos como Nome, Sobrenome e outros campos provenientes de seu 
				serviço de E-mail Markeeting, marque esta caixa',
        'type' => 'checkbox',
    ),
    array(
        'slug' => "placeholder_1",
        'name' => 'Rótulo Campo 1',
        'description' => 'Rótulo do Campo 1 (Ex: Primeiro Nome)',
        'type' => 'text'
    ),
    array(
        'slug' => "placeholder_2",
        'name' => 'Rótulo Campo 2',
        'description' => 'Rótulo do Campo 2 (Ex: Sobrenome)',
        'type' => 'text'
    ),
    array(
        'slug' => "placeholder_3",
        'name' => 'Rótulo Campo 3',
        'description' => 'Rótulo do Campo 3 (Ex: Telefone)',
        'type' => 'text'
    ),
);

$optin = array_merge($optin, $botao);


$opcoes = array(
    array(
        'name' => '',
        'slug' => "divider_opcoes",
        "type" => "divider",
        "options" => array(
            "appearance" => "line" // line | white_space
        )
    ),
    array(
        'slug' => "texto_privacidade",
        'name' => 'Texto de privacidade',
        'description' => 'Texto abaixo do form que indica ao usuário seu cuidado contra SPAM',
        'type' => 'text'
        ));
$headline = array(
    array(
        'slug' => "headline_",
        'name' => 'Headline',
        'description' => '',
        'placeholder' => 'Headline',
        'type' => 'textarea',
        'type_textarea_options' => array('use_html_editor' => 1)
        ));
$video = array(array(
        'slug' => "url_do_video",
        'name' => 'URL do Vídeo',
        'description' => '',
        'placeholder' => 'URL do Vídeo',
        'type' => 'text'
        ));
$subheadline = array(array(
        'slug' => "subheadline",
        'name' => 'Subheadline',
        'description' => '',
        'placeholder' => 'SubHeadline',
        'type' => 'textarea',
        'type_textarea_options' => array('use_html_editor' => 1)
        ));

$ebook = array(array(
        'slug' => "e_book",
        'name' => 'Imagem do E-book',
        'description' => 'Insira aqui a imagem do seu e-book',
        'type' => 'file'
        ));

$descritivo = array(array(
        'slug' => "titulo_texto_descritivo_",
        'name' => 'Título do texto descritivo',
        'description' => 'Título do Texto que ficará abaixo do e-book demostrando o porque de usuário baixar o e-book',
        'type' => 'textarea',
        'type_textarea_options' => array('use_html_editor' => 1)
    ),
    array(
        'slug' => "texto_descritivo_",
        'name' => 'Texto descritivo',
        'description' => 'Texto que ficará abaixo do e-book demostrando o porque de usuário baixar o e-book',
        'type' => 'textarea',
        'type_textarea_options' => array('use_html_editor' => 1)
        ));
$texto_descritivo = array(array(
        'slug' => "texto_descritivo_",
        'name' => 'Texto descritivo',
        'description' => 'Texto que ficará abaixo do e-book demostrando o porque de usuário baixar o e-book',
        'type' => 'textarea',
        'type_textarea_options' => array('use_html_editor' => 1)
        ));
$lista_beneficios = array(array(
        'slug' => "lista_beneficios_",
        'name' => 'Lista de benefícios',
        'description' => 'Lista de benefícios posicionadas abaixo do form (Use listas do editor do Wordpress)',
        'type' => 'textarea',
        'type_textarea_options' => array('use_html_editor' => 1)
        ));

$link = array(array(
        'slug' => "link",
        'name' => 'Link do Ebook',
        'description' => 'Insira aqui o link da  recompensa',
        'type' => 'text'
        ));

$pages = get_pages();
foreach ($pages as $p) {
    $template_name = get_post_meta($p->ID, '_wp_page_template', true);
    $templates = array('sp-video-1.php', 'sp-padrao-1.php', 'sp-ebook-1.php', 'sp-back-animado-1.php', 'confirme-inscricao-1.php', 'page-download-1.php');
    if (in_array($template_name, $templates)) {
        $paginas[] = array("num" => $p->ID, "value" => $p->ID . '|' . $p->post_title);
    }
}
$opcoes_page_download = array(array(
        'slug' => "url_pagina_confirmacao",
        'name' => 'Proteção de recompensa',
        'description' => 'Use se deseja proteger a sua recompensa, o visitante conseguirá visualizar a
										página de download apenas se acessou a página cadastrada neste item. (Inclua o HTTP)',
        'type' => 'dropdown',
        'options' => array(
            "enable_multiple" => false,
            "values" => $paginas
        )
    ),
    array(
        'slug' => "url_redirecionamento",
        'name' => 'URL de redirecionamento',
        'description' => 'Página que irá carregar se o ususário ainda não visitou a página cadastrada no item anterior',
        'type' => 'dropdown',
        'options' => array(
            "enable_multiple" => false,
            "values" => $paginas
        )
        ));

$passos = array(array(
        'slug' => "titulo_1",
        'name' => 'Título - Passo 1',
        'description' => '',
        'type' => 'text'
    ),
    array(
        'slug' => "texto_1",
        'name' => 'Texto - Passo 1',
        'description' => '',
        'type' => 'text'
    ),
    array(
        'slug' => "titulo_2",
        'name' => 'Título - Passo 2',
        'description' => '',
        'type' => 'text'
    ),
    array(
        'slug' => "texto_2",
        'name' => 'Texto - Passo 2',
        'description' => '',
        'type' => 'text'
    ),
    array(
        'slug' => "titulo_3",
        'name' => 'Título - Passo 3',
        'description' => '',
        'type' => 'text'
    ),
    array(
        'slug' => "texto_3",
        'name' => 'Texto - Passo 3',
        'description' => '',
        'type' => 'text'
    ),
    array(
        'slug' => "titulo_4",
        'name' => 'Título - Passo 4',
        'description' => '',
        'type' => 'text'
    ),
    array(
        'slug' => "texto_4",
        'name' => 'Texto - Passo 4',
        'description' => '',
        'type' => 'text'
        ));

$background = array(array(
        'slug' => "background",
        'name' => 'Background',
        'description' => '',
        'type' => 'file'
        ));

$posicao_form = array(array(
        'slug' => "posicao",
        'name' => 'Posição do Formulário',
        'type' => 'dropdown',
        'options' => array(
            "enable_multiple" => false,
            "values" => array(
                array(
                    "num" => '0',
                    "value" => "Centro"
                ),
                array(
                    "num" => '1',
                    "value" => "Esquerda"
                ),
                array(
                    "num" => '2',
                    "value" => "Direita"
                ),
            )
        )
        ));

$backgrounds = array(
    array(
        'name' => '',
        'slug' => "divider_backgrounds",
        "type" => "divider",
        "options" => array(
            "appearance" => "line" // line | white_space
        )
    ),
    array(
        'slug' => "background_",
        'name' => 'Background',
        'description' => '',
        'type' => 'file'
    ),
    array(
        'slug' => "background2_",
        'name' => 'Background 2',
        'description' => '',
        'type' => 'file'
    ),
    array(
        'slug' => "background3_",
        'name' => 'Background 3',
        'description' => '',
        'type' => 'file'
        ));

if (function_exists("simple_fields_register_field_group") && function_exists("simple_fields_register_post_connector")) {

    simple_fields_register_field_group('squeeze-video-1', array(
        'name' => 'Squeeze Vídeo I',
        'description' => "Campos customizados da Squeeze Page - Vídeo I",
        'repeatable' => 0,
        "gui_view" => "list", // list | table
        'fields' => array_merge($headline, $subheadline, $video, $optin, $opcoes, $redes_sociais, $contador, $animacao)
            )
    );

    simple_fields_register_field_group('sp-video-background-1', array(
        'name' => 'Squeeze Vídeo Background I',
        'description' => "Campos customizados da Squeeze Page - Vídeo Background I",
        'repeatable' => 0,
        "gui_view" => "list", // list | table
        'fields' => array_merge($video, $headline, $posicao_form, $optin, $opcoes, $redes_sociais, $contador, $animacao)
    ));


    simple_fields_register_field_group('squeeze-ebook-1', array(
        'name' => 'Squeeze E-book I',
        'description' => "Campos customizados da Squeeze Page - E-book I",
        'repeatable' => 0,
        "gui_view" => "list", // list | table
        'fields' => array_merge($headline, $subheadline, $ebook, $descritivo, $lista_beneficios, $optin, $opcoes, $redes_sociais, $contador, $animacao),
            )
    );



    simple_fields_register_field_group('page-download-1', array(
        'name' => 'Página de Download I',
        'description' => "Campos customizados da Página de Download I",
        'repeatable' => 0,
        "gui_view" => "list", // list | table
        'fields' => array_merge($headline, $subheadline, $ebook, $descritivo, $link, $botao, $opcoes_page_download, $redes_sociais, $animacao)
            )
    );


    simple_fields_register_field_group('squeeze-padrao1', array(
        'name' => 'Squeeze Padrão I',
        'description' => "Campos customizados da Squeeze Page - Padrão I",
        'repeatable' => 0,
        "gui_view" => "list", // list | table
        'fields' => array_merge($background, $headline, $posicao_form, $optin, $opcoes, $redes_sociais, $contador, $animacao)
            )
    );



    simple_fields_register_field_group('sp-back-animado-1', array(
        'name' => 'Squeeze Background Animado I',
        'description' => "Campos customizados da Squeeze Page - Background Animado I",
        'repeatable' => 0,
        "gui_view" => "list", // list | table
        'fields' => array_merge($backgrounds, $headline, $posicao_form, $optin, $opcoes, $redes_sociais, $contador, $animacao)
            )
    );
    
    simple_fields_register_field_group('sp-back-animado-2', array(
        'name' => 'Squeeze Background Animado com ModalDialog',
        'description' => "Campos customizados da Squeeze Page - Background Animado com ModalDialog",
        'repeatable' => 0,
        "gui_view" => "list", // list | table
        'fields' => array_merge($backgrounds, $headline, $posicao_form, $optin, $opcoes, $redes_sociais, $contador, $animacao)
            )
    );

    // function simple_fields_register_post_connector($unique_name = "", $new_post_connector = array()) {
    simple_fields_register_post_connector('sp-back-animado-1', array(
        'name' => "Squeeze Background Animado I",
        'field_groups' => array(
            array(
                'slug' => 'sp-back-animado-1',
                'context' => 'normal', // 'normal', 'advanced', or 'side'
                'priority' => 'default' // 'high', 'core', 'default' or 'low'
            )
        ),
        // post_types can also be string, if only one post type is to be connected
        'post_types' => array('page', "sp-back-animado-1"),
        "hide_editor" => true // true or false, hides the standard wp editor if true
            )
    );
    
    // function simple_fields_register_post_connector($unique_name = "", $new_post_connector = array()) {
    simple_fields_register_post_connector('sp-back-animado-2', array(
        'name' => "Squeeze Background Animado com ModalDialog",
        'field_groups' => array(
            array(
                'slug' => 'sp-back-animado-2',
                'context' => 'normal', // 'normal', 'advanced', or 'side'
                'priority' => 'default' // 'high', 'core', 'default' or 'low'
            )
        ),
        // post_types can also be string, if only one post type is to be connected
        'post_types' => array('page', "sp-back-animado-2"),
        "hide_editor" => true // true or false, hides the standard wp editor if true
            )
    );


    simple_fields_register_field_group('confirme-inscricao-1', array(
        'name' => 'Página de Confirmação I',
        'description' => "Campos customizados da Página de Confirmação I",
        'repeatable' => 0,
        "gui_view" => "list", // list | table
        'fields' => array_merge($headline, $passos, $animacao)
            )
    );

    simple_fields_register_field_group('confirme-inscricao-2', array(
        'name' => 'Página de Confirmação II',
        'description' => "Campos customizados da Página de Confirmação II",
        'repeatable' => 0,
        "gui_view" => "list", // list | table
        'fields' => array_merge($background, $headline, $passos, $animacao)
            )
    );
    
    simple_fields_register_field_group('page-download-2', array(
        'name' => 'Página de Download II',
        'description' => "Campos customizados da Página de Download II",
        'repeatable' => 0,
        "gui_view" => "list", // list | table
        'fields' => array_merge($background, $headline, $subheadline, $texto_descritivo, $link, $botao, $opcoes_page_download, $redes_sociais, $animacao)
            )
    );

    // function simple_fields_register_post_connector($unique_name = "", $new_post_connector = array()) {
    simple_fields_register_post_connector('confirme-inscricao-1', array(
        'name' => "Página de Confirmação I",
        'field_groups' => array(
            array(
                'slug' => 'confirme-inscricao-1',
                'context' => 'normal', // 'normal', 'advanced', or 'side'
                'priority' => 'high' // 'high', 'core', 'default' or 'low'
            )
        ),
        // post_types can also be string, if only one post type is to be connected
        'post_types' => array('page', "confirme-inscricao-1"),
        "hide_editor" => true // true or false, hides the standard wp editor if true
            )
    );

    // function simple_fields_register_post_connector($unique_name = "", $new_post_connector = array()) {
    simple_fields_register_post_connector('confirme-inscricao-2', array(
        'name' => "Página de Confirmação II",
        'field_groups' => array(
            array(
                'slug' => 'confirme-inscricao-2',
                'context' => 'normal', // 'normal', 'advanced', or 'side'
                'priority' => 'high' // 'high', 'core', 'default' or 'low'
            )
        ),
        // post_types can also be string, if only one post type is to be connected
        'post_types' => array('page', "confirme-inscricao-2"),
        "hide_editor" => true // true or false, hides the standard wp editor if true
            )
    );
    
    // function simple_fields_register_post_connector($unique_name = "", $new_post_connector = array()) {
    simple_fields_register_post_connector('page-download-2', array(
        'name' => "Página de Download II",
        'field_groups' => array(
            array(
                'slug' => 'page-download-2',
                'context' => 'normal', // 'normal', 'advanced', or 'side'
                'priority' => 'high' // 'high', 'core', 'default' or 'low'
            )
        ),
        // post_types can also be string, if only one post type is to be connected
        'post_types' => array('page', "page-download-2"),
        "hide_editor" => true // true or false, hides the standard wp editor if true
            )
    );


    // function simple_fields_register_post_connector($unique_name = "", $new_post_connector = array()) {
    simple_fields_register_post_connector('squeeze-video-1', array(
        'name' => "Squeeze Vídeo I",
        'field_groups' => array(
            array(
                'slug' => 'squeeze-video-1',
                'context' => 'normal', // 'normal', 'advanced', or 'side'
                'priority' => 'high' // 'high', 'core', 'default' or 'low'
            )
        ),
        // post_types can also be string, if only one post type is to be connected
        'post_types' => array('page', "squeeze-video-1"),
        "hide_editor" => true // true or false, hides the standard wp editor if true
            )
    );

    // function simple_fields_register_post_connector($unique_name = "", $new_post_connector = array()) {
    simple_fields_register_post_connector('sp-video-background-1', array(
        'name' => "Squeeze Vídeo Background I",
        'field_groups' => array(
            array(
                'slug' => 'sp-video-background-1',
                'context' => 'normal', // 'normal', 'advanced', or 'side'
                'priority' => 'high' // 'high', 'core', 'default' or 'low'
            )
        ),
        // post_types can also be string, if only one post type is to be connected
        'post_types' => array('page', "sp-video-background-1"),
        "hide_editor" => true // true or false, hides the standard wp editor if true
            )
    );

    // function simple_fields_register_post_connector($unique_name = "", $new_post_connector = array()) {
    simple_fields_register_post_connector('squeeze-ebook-1', array(
        'name' => "Squeeze E-book I",
        'field_groups' => array(
            array(
                'slug' => 'squeeze-ebook-1',
                'context' => 'normal', // 'normal', 'advanced', or 'side'
                'priority' => 'high' // 'high', 'core', 'default' or 'low'
            )
        ),
        // post_types can also be string, if only one post type is to be connected
        'post_types' => array('page', "squeeze-ebook-1"),
        "hide_editor" => true // true or false, hides the standard wp editor if true
            )
    );

    // function simple_fields_register_post_connector($unique_name = "", $new_post_connector = array()) {
    simple_fields_register_post_connector('squeeze-padrao-1', array(
        'name' => "Squeeze Padrão I",
        'field_groups' => array(
            array(
                'slug' => 'squeeze-padrao1',
                'context' => 'normal', // 'normal', 'advanced', or 'side'
                'priority' => 'high' // 'high', 'core', 'default' or 'low'
            )
        ),
        // post_types can also be string, if only one post type is to be connected
        'post_types' => array('page', "squeeze-padrao1"),
        "hide_editor" => true // true or false, hides the standard wp editor if true
            )
    );

    // function simple_fields_register_post_connector($unique_name = "", $new_post_connector = array()) {
    simple_fields_register_post_connector('page-download-1', array(
        'name' => "Página de Download I",
        'field_groups' => array(
            array(
                'slug' => 'page-download-1',
                'context' => 'normal', // 'normal', 'advanced', or 'side'
                'priority' => 'high' // 'high', 'core', 'default' or 'low'
            )
        ),
        // post_types can also be string, if only one post type is to be connected
        'post_types' => array('page', "page-download-1"),
        "hide_editor" => true // true or false, hides the standard wp editor if true
            )
    );
}