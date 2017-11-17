<?php
    $scripts = get_option('scripts_squeeze_wp');
    echo stripslashes($scripts);
    $scripts_page = get_post_meta($id, 'squeeze_scritps', true);
    echo stripslashes($scripts_page);
?>
