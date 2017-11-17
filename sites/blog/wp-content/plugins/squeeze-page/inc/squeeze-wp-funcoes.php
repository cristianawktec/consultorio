<?php

add_action('admin_menu', 'adicionar_menu_squeeze');

function adicionar_menu_squeeze() {
    $page_title = 'SqueezeWP';
    $menu_title = 'SqueezeWP';
    $capability = 'manage_options';
    $menu_slug = 'squeezewp';
    $function = 'mostrar_squeezewp';
    add_menu_page($page_title, $menu_title, $capability, $menu_slug, 'mostrar_squeezewp', 'dashicons-welcome-widgets-menus', 21);
    add_submenu_page('squeezewp', 'Configurações', 'Configurações', 'manage_options', 'squeezewp', 'mostrar_squeezewp');
    add_submenu_page('squeezewp', 'Testes A/B', 'Testes A/B', 'manage_options', 'squeezewp-teste-ab', 'mostrar_testeab');
    add_submenu_page('squeezewp', 'Estatísticas', 'Estatísticas', 'manage_options', 'squeezewp-estatisticas', 'mostrar_estatisticas');

    add_pages_page('Criar Página de Captura', 'Criar Página de Captura', 'manage_options', 'criar-squeeze', 'criar_squeeze');
}

function mostrar_squeezewp() {
    require_once('squeeze-wp.php');
}

function criar_squeeze() {
    if (isset($_POST['tipo-pagina'])) {
        require_once('option.php');
        $key = get_option('key_squeeze_wp');
        $option = squeezewp_verifica_dominio();
        $funcao = squeezewp_verifica_funcao(2);
        $permite = true;
        if (!($option && $funcao)) {
            $permite = false;
            $gratis = array('sp-video-1.php', 'sp-padrao-1.php', 'sp-ebook-1.php',
                'sp-back-animado-1.php', 'confirme-inscricao-1.php', 'page-download-1.php');
            if (!in_array($_POST['tipo-pagina'], $gratis))
                echo '<meta http-equiv="refresh" content="0;url=' . get_bloginfo('wpurl') . '/wp-admin/edit.php?post_type=page&page=criar-squeeze&aviso=gratis' .'">';
            else
                $permite = true;
        }
        if ($permite) {
            $post = array(
                'post_title' => $_POST['nome-pagina'],
                'post_status' => 'publish',
                'post_type' => 'page',
                'page_template' => $_POST['tipo-pagina']
            );
            $p = wp_insert_post($post);
            echo '<meta http-equiv="refresh" content="0;url=' . get_bloginfo('wpurl') . '/wp-admin/post.php?post=' . $p . '&action=edit' .'">';
        }
    }
    require_once('create-pages/create-pages.php');
}

function mostrar_testeab() {
    require_once('option.php');
    $option = squeezewp_verifica_dominio();
    $funcao = squeezewp_verifica_funcao(2);
    if ($option && $funcao) {
        switch ($_GET['action']) {
            case 'testeab-new':
                require_once('teste-ab/teste-ab-new.php');
                break;
            case 'testeab-del':
                require_once('teste-ab/teste-ab-del.php');
                break;
            case 'testeab-parar':
                require_once('teste-ab/teste-ab-parar.php');
                break;
            case 'testeab-detalhes':
                require_once('teste-ab/teste-ab-detalhes.php');
                break;
            case 'testeab-upgrade':
                require_once('teste-ab/teste-ab-upgrade.php');
                break;
            default:
                require_once('teste-ab/teste-ab.php');
        }
    } else
        require_once('comprar.php');
}

function mostrar_estatisticas() {
    require_once('option.php');
    $option = squeezewp_verifica_dominio();
    $funcao = squeezewp_verifica_funcao(2);
    if ($option && $funcao) {
        require_once('estatisticas.php');
    } else
        require_once('comprar.php');
}

?>