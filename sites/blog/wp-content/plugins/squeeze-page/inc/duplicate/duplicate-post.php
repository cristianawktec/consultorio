<?php

function duplicate_post_get_clone_post_link($id = 0, $context = 'display', $draft = true) {

    if (!$post = get_post($id))
        return;

    
    $action_name = "duplicate_post_save_as_new_post";

    if ('display' == $context)
        $action = '?action=' . $action_name . '&amp;post=' . $post->ID;
    else
        $action = '?action=' . $action_name . '&post=' . $post->ID;

    $post_type_object = get_post_type_object($post->post_type);
    if (!$post_type_object)
        return;

    return apply_filters('duplicate_post_get_clone_post_link', admin_url("admin.php" . $action), $post->ID, $context);
}

/**
 * Display duplicate post link for post.
 *
 * @param string $link Optional. Anchor text.
 * @param string $before Optional. Display before edit link.
 * @param string $after Optional. Display after edit link.
 * @param int $id Optional. Post ID.
 */
function duplicate_post_clone_post_link($link = null, $before = '', $after = '', $id = 0) {
    if (!$post = get_post($id))
        return;

    if (!$url = duplicate_post_get_clone_post_link($post->ID))
        return;

    if (null === $link)
        $link = __('Copy to a new draft', DUPLICATE_POST_I18N_DOMAIN);

    $post_type_obj = get_post_type_object($post->post_type);
    $link = '<a class="post-clone-link" href="' . $url . '" title="'
            . esc_attr(__("Copy to a new draft", DUPLICATE_POST_I18N_DOMAIN))
            . '">' . $link . '</a>';
    echo $before . apply_filters('duplicate_post_clone_post_link', $link, $post->ID) . $after;
}

/**
 * Get original post .
 *
 * @param int $id Optional. Post ID.
 * @param string $output Optional, default is Object. Either OBJECT, ARRAY_A, or ARRAY_N.
 * @return mixed Post data
 */
function duplicate_post_get_original($id = 0, $output = OBJECT) {
    if (!$post = get_post($id))
        return;
    $original_ID = get_post_meta($post->ID, '_dp_original');
    if (empty($original_ID))
        return null;
    $original_post = get_post($original_ID[0], $output);
    return $original_post;
}

// Admin bar
function duplicate_post_admin_bar_render() {
    global $wp_admin_bar;
    $current_object = get_queried_object();
    if (empty($current_object))
        return;
    if (!empty($current_object->post_type) && ( $post_type_object = get_post_type_object($current_object->post_type) ) && ( $post_type_object->show_ui || 'attachment' == $current_object->post_type )) {
        $wp_admin_bar->add_menu(array(
            'parent' => 'edit',
            'id' => 'new_draft',
            'title' => __("Copy to a new draft", DUPLICATE_POST_I18N_DOMAIN),
            'href' => duplicate_post_get_clone_post_link($current_object->ID)
        ));
    }
}

add_action('wp_before_admin_bar_render', 'duplicate_post_admin_bar_render');


if (!is_admin())
    return;

/**
 * Wrapper for the defined constant DUPLICATE_POST_CURRENT_VERSION
 */
function duplicate_post_get_current_version() {
    return DUPLICATE_POST_CURRENT_VERSION;
}
add_filter('page_row_actions', 'duplicate_post_make_duplicate_link_row', 10, 2);

/**
 * Add the link to action list for post_row_actions
 */
function duplicate_post_make_duplicate_link_row($actions, $post) {
    $actions['clone'] = '<a href="' . duplicate_post_get_clone_post_link($post->ID, 'display', false) 
            . '" title="Clonar esta página">Clonar Página</a>';
    return $actions;
}

/**
 * Connect actions to functions
 */
add_action('admin_action_duplicate_post_save_as_new_post', 'duplicate_post_save_as_new_post');

/*
 * This function calls the creation of a new copy of the selected post (as a draft)
 * then redirects to the edit post screen
 */


/*
 * This function calls the creation of a new copy of the selected post (by default preserving the original publish status)
 * then redirects to the post list
 */

function duplicate_post_save_as_new_post($status = '') {
    if (!( isset($_GET['post']) || isset($_POST['post']) || ( isset($_REQUEST['action']) && 'duplicate_post_save_as_new_post' == $_REQUEST['action'] ) )) {
        wp_die(__('No post to duplicate has been supplied!', DUPLICATE_POST_I18N_DOMAIN));
    }

    // Get the original post
    $id = (isset($_GET['post']) ? $_GET['post'] : $_POST['post']);
    $post = get_post($id);

    // Copy the post and insert it
    if (isset($post) && $post != null) {
        $new_id = duplicate_post_create_duplicate($post, $status);

        if ($status == '') {
            // Redirect to the post list screen
            wp_redirect(admin_url('edit.php?post_type=' . $post->post_type));
        } else {
            // Redirect to the edit screen for the new draft post
            wp_redirect(admin_url('post.php?action=edit&post=' . $new_id));
        }
        exit;
    } else {
        $post_type_obj = get_post_type_object($post->post_type);
        wp_die(esc_attr(__('Copy creation failed, could not find original:', DUPLICATE_POST_I18N_DOMAIN)) . ' ' . htmlspecialchars($id));
    }
}

/**
 * Get the currently registered user
 */
function duplicate_post_get_current_user() {
    if (function_exists('wp_get_current_user')) {
        return wp_get_current_user();
    } else if (function_exists('get_currentuserinfo')) {
        global $userdata;
        get_currentuserinfo();
        return $userdata;
    } else {
        $user_login = $_COOKIE[USER_COOKIE];
        $sql = $wpdb->prepare("SELECT * FROM $wpdb->users WHERE user_login=%s", $user_login);
        $current_user = $wpdb->get_results($sql);
        return $current_user;
    }
}

/**
 * Copy the taxonomies of a post to another post
 */
function duplicate_post_copy_post_taxonomies($new_id, $post) {
    global $wpdb;
    if (isset($wpdb->terms)) {
        // Clear default category (added by wp_insert_post)
        wp_set_object_terms($new_id, NULL, 'category');

        $post_taxonomies = get_object_taxonomies($post->post_type);
        $taxonomies_blacklist = array();
        $taxonomies = array_diff($post_taxonomies, $taxonomies_blacklist);
        foreach ($taxonomies as $taxonomy) {
            $post_terms = wp_get_object_terms($post->ID, $taxonomy, array('orderby' => 'term_order'));
            $terms = array();
            for ($i = 0; $i < count($post_terms); $i++) {
                $terms[] = $post_terms[$i]->slug;
            }
            wp_set_object_terms($new_id, $terms, $taxonomy);
        }
    }
}

// Using our action hooks to copy taxonomies
add_action('dp_duplicate_post', 'duplicate_post_copy_post_taxonomies', 10, 2);
add_action('dp_duplicate_page', 'duplicate_post_copy_post_taxonomies', 10, 2);

/**
 * Copy the meta information of a post to another post
 */
function duplicate_post_copy_post_meta_info($new_id, $post) {
    $post_meta_keys = get_post_custom_keys($post->ID);
    if (empty($post_meta_keys))
        return;
    $meta_blacklist = explode(",", get_option('duplicate_post_blacklist'));
    if ($meta_blacklist == "")
        $meta_blacklist = array();
    $meta_keys = array_diff($post_meta_keys, $meta_blacklist);

    foreach ($meta_keys as $meta_key) {
        $meta_values = get_post_custom_values($meta_key, $post->ID);
        foreach ($meta_values as $meta_value) {
            $meta_value = maybe_unserialize($meta_value);
            add_post_meta($new_id, $meta_key, $meta_value);
        }
    }
}

// Using our action hooks to copy meta fields
add_action('dp_duplicate_post', 'duplicate_post_copy_post_meta_info', 10, 2);
add_action('dp_duplicate_page', 'duplicate_post_copy_post_meta_info', 10, 2);

/**
 * Copy the attachments
 * It simply copies the table entries, actual file won't be duplicated
 */
function duplicate_post_copy_children($new_id, $post) {
    $copy_attachments = get_option('duplicate_post_copyattachments');
    $copy_children = get_option('duplicate_post_copychildren');

    // get children
    $children = get_posts(array('post_type' => 'any', 'numberposts' => -1, 'post_status' => 'any', 'post_parent' => $post->ID));
    // clone old attachments
    foreach ($children as $child) {
        if ($copy_attachments == 0 && $child->post_type == 'attachment')
            continue;
        if ($copy_children == 0 && $child->post_type != 'attachment')
            continue;
        duplicate_post_create_duplicate($child, '', $new_id);
    }
}

// Using our action hooks to copy attachments
add_action('dp_duplicate_post', 'duplicate_post_copy_children', 10, 2);
add_action('dp_duplicate_page', 'duplicate_post_copy_children', 10, 2);

/**
 * Create a duplicate from a post
 */
function duplicate_post_create_duplicate($post, $status = '', $parent_id = '') {

    // We don't want to clone revisions
    if ($post->post_type == 'revision')
        return;

    if ($post->post_type != 'attachment') {
        $prefix = get_option('duplicate_post_title_prefix');
        $suffix = get_option('duplicate_post_title_suffix');
        if (!empty($prefix))
            $prefix.= " ";
        if (!empty($suffix))
            $suffix = " " . $suffix;
        if (get_option('duplicate_post_copystatus') == 0)
            $status = 'draft';
    }
    $new_post_author = duplicate_post_get_current_user();

    $new_post = array(
        'menu_order' => $post->menu_order,
        'comment_status' => $post->comment_status,
        'ping_status' => $post->ping_status,
        'post_author' => $new_post_author->ID,
        'post_content' => $post->post_content,
        'post_excerpt' => (get_option('duplicate_post_copyexcerpt') == '1') ? $post->post_excerpt : "",
        'post_mime_type' => $post->post_mime_type,
        'post_parent' => $new_post_parent = empty($parent_id) ? $post->post_parent : $parent_id,
        'post_password' => $post->post_password,
        'post_status' => $new_post_status = (empty($status)) ? $post->post_status : $status,
        'post_title' => $prefix . $post->post_title . $suffix,
        'post_type' => $post->post_type,
    );

    if (get_option('duplicate_post_copydate') == 1) {
        $new_post['post_date'] = $new_post_date = $post->post_date;
        $new_post['post_date_gmt'] = get_gmt_from_date($new_post_date);
    }

    $new_post_id = wp_insert_post($new_post);

    // If the copy is published or scheduled, we have to set a proper slug.
    if ($new_post_status == 'publish' || $new_post_status == 'future') {
        $post_name = wp_unique_post_slug($post->post_name, $new_post_id, $new_post_status, $post->post_type, $new_post_parent);

        $new_post = array();
        $new_post['ID'] = $new_post_id;
        $new_post['post_name'] = $post_name;

        // Update the post into the database
        wp_update_post($new_post);
    }

    // If you have written a plugin which uses non-WP database tables to save
    // information about a post you can hook this action to dupe that data.
    if ($post->post_type == 'page' || (function_exists('is_post_type_hierarchical') && is_post_type_hierarchical($post->post_type)))
        do_action('dp_duplicate_page', $new_post_id, $post);
    else
        do_action('dp_duplicate_post', $new_post_id, $post);

    delete_post_meta($new_post_id, '_dp_original');
    add_post_meta($new_post_id, '_dp_original', $post->ID);

    return $new_post_id;
}
?>