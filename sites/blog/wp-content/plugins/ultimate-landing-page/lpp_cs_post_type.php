<?php 



//////////// CUSTOM POST TYPE STARTS HERE!!!!! //////////////

function lpp_f_custom_post_type(){
  $labels = array(
    'name' => _x('Landing Page','post type general name'),
    'singular_name' => _x('Landing Page','post type singular name'),
    'add_new' => _x('Add New','Landing Page'),
    'add_new_item' => __('Add new Landing Page'),
    'edit_item' => __('Edit Landing Page'),
    'new_item' => __('New Landing Page'),
    'all_items' => __('All Landing Pages'),
    'view_itme' => __('View Landing Page'),
    'search_items' => __('Search Landing Page'),
    'not_found' => __('No Landing Page found'),
    'not_found_in_trash' => __('No Landing Page found in trash'),
    'parent_item_colon' => "",
    'menu_name' => 'Landing Page'

    );
  $args = array(
    'labels' => $labels,
    'description' => 'Create Landing Page',
    'public' => true,
    'exclude_from_search' => false,
    'menu_position' => 15,
    'supports' => array('title','custom_fields'),
    'has_archive' => true,
    'capability_type' => 'page',
    'query_var' => 'landingpage',
    'menu_icon' => 'dashicons-welcome-add-page',
    'show_in_menu' => true

    );


  register_post_type('landingpage_f',$args);
}

add_action('init','lpp_f_custom_post_type');


function lpp_ulp_activate_f() {  
    flush_rewrite_rules();
}
 
register_activation_hook( __FILE__, 'lpp_ulp_activate_f' );
 
function lpp_ulp_deactivate_f() {
    flush_rewrite_rules();
}
register_deactivation_hook( __FILE__, 'lpp_ulp_deactivate_f' );

//////////// CUSTOM POST TYPE ENDS HERE!!!!! ////////////// /
                                                        // //   / 
                                                            //  //  /
                                                            //  //  //
                // WONDERFULL ART HERE                      //  //  //////////////////////////////
                                                            //  //  ///        //////////////////
                                                            //  //  ////////////////////////////
                                                            //  //  ///
                                                            //  //
                                                            //  //
                                                            //  /
                                                            //

/////////////////////////// Removing post name from perma link ///////////////////////////


/**
 * Some hackery to have WordPress match postname to any of our public post types
 * All of our public post types can have /post-name/ as the slug, so they better be unique across all posts
 * Typically core only accounts for posts and pages where the slug is /post-name/
 */

add_action("load-post-new.php","lpp_f_count");

    function lpp_f_count( $userid, $post_type = 'landingpage_f' ) {
    global $wpdb;

    $userid = get_current_user_id();

    $where = get_posts_by_author_sql( $post_type, true, $userid );

    $count = $wpdb->get_var( "SELECT COUNT(*) FROM $wpdb->posts $where" );

    $screen = get_current_screen();

    if (current_user_can( 'edit_posts') and $screen->post_type === 'landingpage_f') { 
        //Is  admin and all users - so impose the limit
        if($count>=2)
            header("Location: /wp-content/plugins/ultimate-landing-page/phuf.php");
        
        }
    }

    function add_lpp_tabs_to_dropdown_f( $pages ){
    $args = array(
        'post_type' => 'landingpage_f'
    );
    $items = get_posts($args);
    $pages = array_merge($pages, $items);

    return $pages;
}
add_filter( 'get_pages', 'add_lpp_tabs_to_dropdown_f' );


function lpp_column_visitors($defaults) {
    $date = $defaults['date'];
    unset($defaults['date']);
    $defaults['lpp_visitors']  = 'Visitor Count';
    $defaults['lpp_front_page']  = 'Front Page';
    $defaults['date'] = $date;

    return $defaults;
}
function lpp_column_visitors_data($column_name, $post_ID) {
    if ($column_name == 'lpp_visitors') {
        $current_count = get_post_meta($post_ID,'lpp_page_hit_counter',true);
        if (empty($current_count)) {
            $current_count = 0;
        }
        echo "<div style='padding: 7px 10px 8px 31px;background: #fff;border: 1px solid #D2D2D2;border-radius: 3px;width: 20%; min-width:200px;font-weight: bold;' >$current_count - Visits</div>";
    }
}

add_filter('manage_landingpage_f_posts_columns', 'lpp_column_visitors');
add_action('manage_landingpage_f_posts_custom_column','lpp_column_visitors_data',10, 2);

function lpp_front_page_column($column_name, $post_ID) {
    if ($column_name == 'lpp_front_page') {
        $lpp_is_front_page = get_post_meta($post_ID,'lpp_is_front_page',true);
        if ($lpp_is_front_page === 'true') {
            $is_landing_page = 'background:#8bc34a;';
        }else{
            $is_landing_page = 'background:#f44336;';
        }
        echo "<div style='width:30px; height:30px; border-radius:100px; $is_landing_page'></div>";
    }
}

add_action('manage_landingpage_f_posts_custom_column','lpp_front_page_column',10, 2);


add_filter( 'template_redirect', 'lpp_front_page');

function lpp_front_page() {

$args = array(
    'offset'           => 0,
    'orderby'          => 'date',
    'order'            => 'ASC',
    'post_type'        => 'landingpage_f',
    'post_status'      => 'publish',
    );
    
    $lpp_pages = get_posts( $args );

    if (!empty($lpp_pages)) {
        foreach ($lpp_pages as $post) {
            $currentID = $post->ID;
            $lpp_is_front_page = get_post_meta( $currentID, 'lpp_is_front_page', true );

            if ($lpp_is_front_page === 'true') {
            $lpp_template_select = get_post_meta($currentID,'lpp_template_select',true);
            $lpp_template = dirname( __FILE__ ).'/'.$lpp_template_select;
            
            if (is_home() || is_front_page() ) {

                    include($lpp_template);
                    exit();

            }
    }

    }

    
    }

}



    




?>