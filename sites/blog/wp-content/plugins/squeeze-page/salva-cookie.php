<?php

$squeeze = SqueezeWP::get_instance();
if (have_posts()) {
    the_post();
    if (get_post_status(get_the_id()) == 'publish') {
        ob_start();
        setcookie(get_the_id(), 'true', time() + 17280000000, "/");
        if (! is_user_logged_in()) {
            if ($squeeze->is_page_sp('sp', get_the_id())) {
                $acessos = get_post_meta(get_the_id(), 'acessos', true);
                update_post_meta(get_the_id(), 'acessos', $acessos + 1);
            } elseif ($squeeze->is_page_sp('conversao', get_the_id())) {
                $paginas = $squeeze->page_by_conversion(get_the_id());
                if (count($paginas))
                    foreach ($paginas as $p) {
                        update_post_meta($p, 'conversoes', get_post_meta($p, 'conversoes', true) + 1);
                    }
            }
        }
    }
}
?>