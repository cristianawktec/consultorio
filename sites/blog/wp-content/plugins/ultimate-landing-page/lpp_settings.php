<?php


//////////// META BOXES TYPE STARTS HERE!!!!! //////////////////
                                                        ///////
                                                        //////
                                                        /////
//////////// META BOXES TYPE STARTS HERE!!!!! //////////////



add_action('add_meta_boxes','lpp_f_main_ui_metabox');

  function lpp_f_main_ui_metabox(){

    add_meta_box('lpp_select_landingpage_template','Select Landing Page Template','lpp_f_landing_page_template_select','Landingpage_f','normal','high');


    add_meta_box('lpp_main_ui','Edit Landing page Template','lpp_f_landing_page_template_edit','Landingpage_f','normal','low');
    
    add_meta_box('lpp_main_settings' ,'Landing Page Settings','lpp_f_main_front_end_settings', 'Landingpage_f','normal','low');
   
    add_meta_box('lpp_mail_chimp' ,'Mail Chimp','lpp_f_mail_chimp', 'Landingpage_f','normal','low');

    //add_meta_box('lpp_custom_css' ,'Custom  CSS/JS','lpp_f_custom_css', 'Landingpage_f','normal','low');

    add_meta_box('lpp_f_seo_set' ,'Landing Page SEO','lpp_f_seo_set', 'Landingpage_f','normal','low');

    add_meta_box('lpp_premium_ver' ,'Get More Awesome Features','lpp_premium_ver', 'Landingpage_f','side','high');
    add_meta_box('lpp_extra_settings' ,'Advanced Options','lpp_extra_settings', 'Landingpage_f','side','low');
    add_meta_box('lpp_visitor_count' ,'Statistics','lpp_visitor_count', 'Landingpage_f','side','low');

  }
 

//////////// META BOX 1  STARTS HERE!!!!! //////////////

  function lpp_f_landing_page_template_edit($post){
    // $post is already set, and contains an object: the WordPress post
    global $post;
 //////////////////////////////////////////////////////////////////////////
                                                                        //  
                               //START                                 //
                                                                      //  
                                                                     //
    ///////  MAIN SETTINGS var assign BOX Starts HERE!!! /////////////

    $lpp_fe_template_select = get_post_meta($post->ID,'lpp_fe_template_select',true);
    $lpp_main_h1 = get_post_meta($post->ID,'lpp_main_h1',true);
    $lpp_sub_h2 = get_post_meta($post->ID,'lpp_sub_h2',true);
    $lpp_main_content = get_post_meta($post->ID,'lpp_main_content',true);
    $lpp_main_cta = get_post_meta($post->ID,'lpp_main_cta',true);
    $lpp_feature_1 = get_post_meta($post->ID,'lpp_feature_1',true);
    $lpp_feature_2 = get_post_meta($post->ID,'lpp_feature_2',true);
    $lpp_feature_3 = get_post_meta($post->ID,'lpp_feature_3',true);
    $lpp_feature_4 = get_post_meta($post->ID,'lpp_feature_4',true);
    $lpp_testimonial_left_content = get_post_meta($post->ID,'lpp_testimonial_left_content',true);
    $lpp_testimonial_left_content_author = get_post_meta($post->ID,'lpp_testimonial_left_content_author',true);
    $lpp_testimonial_right_content = get_post_meta($post->ID,'lpp_testimonial_right_content',true);
    $lpp_testimonial_right_content_author = get_post_meta($post->ID,'lpp_testimonial_right_content_author',true);
    $lpp_benefit_1_content_title = get_post_meta($post->ID,'lpp_benefit_1_content_title',true);
    $lpp_benefit_1_content = get_post_meta($post->ID,'lpp_benefit_1_content',true);
    $lpp_benefit_2_content_title = get_post_meta($post->ID,'lpp_benefit_2_content_title',true);
    $lpp_benefit_2_content = get_post_meta($post->ID,'lpp_benefit_2_content',true);
    $lpp_benefit_3_content_title = get_post_meta($post->ID,'lpp_benefit_3_content_title',true);
    $lpp_benefit_3_content = get_post_meta($post->ID,'lpp_benefit_3_content',true);
    $lpp_benefit_4_content_title = get_post_meta($post->ID,'lpp_benefit_4_content_title',true);
    $lpp_benefit_4_content = get_post_meta($post->ID,'lpp_benefit_4_content',true);
    $lpp_final_sub_h2 = get_post_meta($post->ID,'lpp_final_sub_h2',true);
    $lpp_final_cta = get_post_meta($post->ID,'lpp_final_cta',true);

    $lpp_cta_url = get_post_meta($post->ID,'lpp_cta_url',true);



    //Additional Settings

    $lpp_benefit_sect_title = get_post_meta( $post->ID,'lpp_benefit_sect_title',true);
    $lpp_benefit_sect_sub_title = get_post_meta( $post->ID,'lpp_benefit_sect_sub_title',true);
    $lpp_form_h2 = get_post_meta( $post->ID,'lpp_form_h2',true);
    $lpp_form_sub_h2 = get_post_meta( $post->ID,'lpp_form_sub_h2',true);

    $lpp_about_us = get_post_meta( $post->ID,'lpp_about_us',true);
    $lpp_contact_us = get_post_meta( $post->ID,'lpp_contact_us',true);

    $lpp_aboutus_h1 = get_post_meta($post->ID,'lpp_aboutus_h1',true);
    $lpp_aboutus_content = get_post_meta($post->ID,'lpp_aboutus_content',true);
    $lpp_featured_img_url = get_post_meta($post->ID,'lpp_featured_img_url',true);
    $lpp_logo_url = get_post_meta($post->ID,'lpp_logo_url',true);
    $lpp_favicon = get_post_meta($post->ID,'lpp_favicon',true);



    $lpp_add_img_1 = get_post_meta($post->ID,'lpp_add_img_1',true);
    $lpp_add_img_2 = get_post_meta($post->ID,'lpp_add_img_2',true);
    $lpp_add_img_3 = get_post_meta($post->ID,'lpp_add_img_3',true);
    $lpp_add_img_4 = get_post_meta($post->ID,'lpp_add_img_4',true);
    $lpp_add_img_5 = get_post_meta($post->ID,'lpp_add_img_5',true);

    $lpp_new_empty_template = get_post_meta($post->ID,'lpp_new_empty_template',true);
    $lpp_load_wpfooter = get_post_meta($post->ID,'lpp_load_wpfooter',true);
    $lpp_load_wphead = get_post_meta($post->ID,'lpp_load_wphead',true);







///////////////////////////////////////////////////////////////////////////
                                                                        //  
                               //ENDS                                  //
                                                                      //  
                                                                     //
///////////  MAIN SETTINGS var assign BOX ENDS HERE!!! ///////////////
     



///////////////////////////////////////////////////////////////////////////
                                                                        //  
                               //Starts                                //
                                                                      //  
                                                                     //
////////  MAIN SETTINGS Input field BOX Starts HERE!!! ///////////////





    // I will use this nonce field later on when saving.
    wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );

    ?>
         
<?php

$lpp_template_select = get_post_meta($post->ID,'lpp_template_select',true);
if (!empty($lpp_template_select)) {
    include ('options_'.$lpp_template_select);
  }

?>
<style type="text/css">
#wpfooter{
  display: none;
}
  #submit{
    width: 200px;
    height: 40px;
    margin-top: 8px;
    margin-right: 50px;
    font-size: 19px;

  }
  #lpp_main_settings,#lpp_select_landingpage_template,#lpp_custom_css,#lpp_main_ui{
    border-top:5px solid #75c5ff;
  }
 
</style>
<div style='width:95%;margin-left:2.5%; text-align:center; background:#e3e3e3;height:60px;border-left:5px solid #a7d142;margin-top:0;'>
 <?php submit_button('Update');?>
 <a href="http://web-settler.com/ultimate-landing-page/" id='pr_msg_link' style='float:left; font-size:20px; margin:20px 0 0 10px;'><i>Get more Amazing Features and Templates Click Here</i></a>
</div>

<?php


  }


  /////////////////////////////////////////////////////////////////////////
                                                                        //  
                               //ENDS                                  //
                                                                      //  
                                                                     //
///////////  MAIN SETTINGS input fields BOX ENDS HERE!!! /////////////
     






///////////////////////////////////////////////////////////////////////////
                                                                        //  
                               //Starts                                //
                                                                      //  
                                                                     //
////////  MAIN SETTINGS Saving CODE BOX Starts HERE!!! ///////////////



  add_action('save_post','lpp_f_save_meta');

  function lpp_f_save_meta($post_id){
    
     // Bail if we're doing an auto save
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
     
    // if our nonce isn't there, or we can't verify it, bail
    if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'my_meta_box_nonce' ) ) return;
     
    // if our current user can't edit this post, bail
    if( !current_user_can( 'edit_post', $post_id ) ) return;
     
    // now we can actually save the data
    $allowed = array( 
        'a' => array( // on allow a tags
            'href' => array() // and those anchors can only have href attribute
        )
    );
     
    // Make sure your data is set before trying to save it
    if( isset( $_POST['lpp_fe_template_select'] ) )
        update_post_meta( $post_id, 'lpp_fe_template_select',$_POST['lpp_fe_template_select']);
         
    if( isset( $_POST['lpp_template_select'] ) )
        update_post_meta( $post_id, 'lpp_template_select', $_POST['lpp_template_select']);
         
    // This is purely my personal preference for saving check-boxes
    $chk = isset( $_POST['my_meta_box_check'] ) && $_POST['my_meta_box_select'] ? 'on' : 'off';
    update_post_meta( $post_id, 'my_meta_box_check', $chk );


// Starts Here ****** Stars ********* )))))) () Moon **********

    if( isset( $_POST['lpp_main_h1'] ) )
        update_post_meta( $post_id, 'lpp_main_h1', wp_kses( $_POST['lpp_main_h1'], $allowed ) );

    if( isset( $_POST['lpp_sub_h2'] ) )
        update_post_meta( $post_id, 'lpp_sub_h2', wp_kses( $_POST['lpp_sub_h2'], $allowed ) );

    if( isset( $_POST['lpp_main_content'] ) )
        update_post_meta( $post_id, 'lpp_main_content', $_POST['lpp_main_content']);

      if( isset( $_POST['lpp_feature_1'] ) )
        update_post_meta( $post_id, 'lpp_feature_1', wp_kses( $_POST['lpp_feature_1'], $allowed ) );

      if( isset( $_POST['lpp_feature_2'] ) )
        update_post_meta( $post_id, 'lpp_feature_2', wp_kses( $_POST['lpp_feature_2'], $allowed ) );

      if( isset( $_POST['lpp_feature_3'] ) )
        update_post_meta( $post_id, 'lpp_feature_3', wp_kses( $_POST['lpp_feature_3'], $allowed ) );

      if( isset( $_POST['lpp_feature_4'] ) )
        update_post_meta( $post_id, 'lpp_feature_4', wp_kses( $_POST['lpp_feature_4'], $allowed ) );

    if( isset( $_POST['lpp_main_cta'] ) )
        update_post_meta( $post_id, 'lpp_main_cta', wp_kses( $_POST['lpp_main_cta'], $allowed ) );

    if( isset( $_POST['lpp_testimonial_left_content'] ) )
        update_post_meta( $post_id, 'lpp_testimonial_left_content', wp_kses( $_POST['lpp_testimonial_left_content'], $allowed ) );

      if( isset( $_POST['lpp_testimonial_left_content_author'] ) )
        update_post_meta( $post_id, 'lpp_testimonial_left_content_author', wp_kses( $_POST['lpp_testimonial_left_content_author'], $allowed ) );


    if( isset( $_POST['lpp_testimonial_right_content'] ) )
        update_post_meta( $post_id, 'lpp_testimonial_right_content', wp_kses( $_POST['lpp_testimonial_right_content'], $allowed ) );

      if( isset( $_POST['lpp_testimonial_right_content_author'] ) )
        update_post_meta( $post_id, 'lpp_testimonial_right_content_author', wp_kses( $_POST['lpp_testimonial_right_content_author'], $allowed ) );

      if( isset( $_POST['lpp_benefit_1_content_title'] ) )
        update_post_meta( $post_id, 'lpp_benefit_1_content_title', wp_kses( $_POST['lpp_benefit_1_content_title'], $allowed ) );

    if( isset( $_POST['lpp_benefit_1_content'] ) )
        update_post_meta( $post_id, 'lpp_benefit_1_content', wp_kses( $_POST['lpp_benefit_1_content'], $allowed ) );

      if( isset( $_POST['lpp_benefit_2_content_title'] ) )
        update_post_meta( $post_id, 'lpp_benefit_2_content_title', wp_kses( $_POST['lpp_benefit_2_content_title'], $allowed ) );

    if( isset( $_POST['lpp_benefit_2_content'] ) )
        update_post_meta( $post_id, 'lpp_benefit_2_content', wp_kses( $_POST['lpp_benefit_2_content'], $allowed ) );

      if( isset( $_POST['lpp_benefit_3_content_title'] ) )
        update_post_meta( $post_id, 'lpp_benefit_3_content_title', wp_kses( $_POST['lpp_benefit_3_content_title'], $allowed ) );

    if( isset( $_POST['lpp_benefit_3_content'] ) )
        update_post_meta( $post_id, 'lpp_benefit_3_content', wp_kses( $_POST['lpp_benefit_3_content'], $allowed ) );

      if( isset( $_POST['lpp_benefit_4_content_title'] ) )
        update_post_meta( $post_id, 'lpp_benefit_4_content_title', wp_kses( $_POST['lpp_benefit_4_content_title'], $allowed ) );

    if( isset( $_POST['lpp_benefit_4_content'] ) )
        update_post_meta( $post_id, 'lpp_benefit_4_content', wp_kses( $_POST['lpp_benefit_4_content'], $allowed ) );

    if( isset( $_POST['lpp_final_sub_h2'] ) )
        update_post_meta( $post_id, 'lpp_final_sub_h2', wp_kses( $_POST['lpp_final_sub_h2'], $allowed ) );

    if( isset( $_POST['lpp_final_cta'] ) )
        update_post_meta( $post_id, 'lpp_final_cta', wp_kses( $_POST['lpp_final_cta'], $allowed ) );

      if( isset( $_POST['lpp_cta_url'] ) )
        update_post_meta( $post_id, 'lpp_cta_url', wp_kses( $_POST['lpp_cta_url'], $allowed ) );


      // ////////////////// Additional SETTINGS /////////////////////////// ///// ////

      if( isset( $_POST['lpp_benefit_sect_title'] ) )
        update_post_meta( $post_id, 'lpp_benefit_sect_title', wp_kses( $_POST['lpp_benefit_sect_title'], $allowed ) );

      if( isset( $_POST['lpp_benefit_sect_sub_title'] ) )
        update_post_meta( $post_id, 'lpp_benefit_sect_sub_title', wp_kses( $_POST['lpp_benefit_sect_sub_title'], $allowed ) );

      if( isset( $_POST['lpp_form_h2'] ) )
        update_post_meta( $post_id, 'lpp_form_h2', wp_kses( $_POST['lpp_form_h2'], $allowed ) );

      if( isset( $_POST['lpp_form_sub_h2'] ) )
        update_post_meta( $post_id, 'lpp_form_sub_h2', wp_kses( $_POST['lpp_form_sub_h2'], $allowed ) );

      if( isset( $_POST['lpp_aboutus_h1'] ) )
        update_post_meta( $post_id, 'lpp_aboutus_h1', wp_kses( $_POST['lpp_aboutus_h1'], $allowed ) );

      if( isset( $_POST['lpp_aboutus_content'] ) )
        update_post_meta( $post_id, 'lpp_aboutus_content', wp_kses( $_POST['lpp_aboutus_content'], $allowed ) );

      if( isset( $_POST['lpp_featured_img_url'] ) )
        update_post_meta( $post_id, 'lpp_featured_img_url', $_POST['lpp_featured_img_url']);

      if( isset( $_POST['lpp_favicon'] ) )
        update_post_meta( $post_id, 'lpp_favicon', wp_kses( $_POST['lpp_favicon'], $allowed ) );

      if( isset( $_POST['lpp_mailchimp_apikey'] ) )
        update_post_meta( $post_id, 'lpp_mailchimp_apikey',$_POST['lpp_mailchimp_apikey']);

      if( isset( $_POST['lpp_mailchimp_listid'] ) )
        update_post_meta( $post_id, 'lpp_mailchimp_listid',$_POST['lpp_mailchimp_listid']);

      if( isset( $_POST['lpp_custom_styling'] ) )
        update_post_meta( $post_id, 'lpp_custom_styling',$_POST['lpp_custom_styling']);

      if( isset( $_POST['lpp_custom_js'] ) )
        update_post_meta( $post_id, 'lpp_custom_js',$_POST['lpp_custom_js']);

      if( isset( $_POST['lpp_about_us'] ) )
        update_post_meta( $post_id, 'lpp_about_us',$_POST['lpp_about_us']);

      if( isset( $_POST['lpp_contact_us'] ) )
        update_post_meta( $post_id, 'lpp_contact_us',$_POST['lpp_contact_us']);









// ////////////////// GENERAL SETTINGS /////////////////////////// ///// ////

      // ////////////////// Background Color Save SETTINGS /////////////////////////// ///// ////

    if( isset( $_POST['lpp_body_bg'] ) )
        update_post_meta( $post_id, 'lpp_body_bg', wp_kses( $_POST['lpp_body_bg'], $allowed ) );

      if( isset( $_POST['lpp_content_bg'] ) )
        update_post_meta( $post_id, 'lpp_content_bg', wp_kses( $_POST['lpp_content_bg'], $allowed ) );

      if( isset( $_POST['lpp_header_bg'] ) )
        update_post_meta( $post_id, 'lpp_header_bg', wp_kses( $_POST['lpp_header_bg'], $allowed ) );

      if( isset( $_POST['lpp_center_bg'] ) )
        update_post_meta( $post_id, 'lpp_center_bg', wp_kses( $_POST['lpp_center_bg'], $allowed ) );

      if( isset( $_POST['lpp_testimonial_bg'] ) )
        update_post_meta( $post_id, 'lpp_testimonial_bg', wp_kses( $_POST['lpp_testimonial_bg'], $allowed ) );

      if( isset( $_POST['lpp_benefit_bg'] ) )
        update_post_meta( $post_id, 'lpp_benefit_bg', wp_kses( $_POST['lpp_benefit_bg'], $allowed ) );

      if( isset( $_POST['lpp_f_header_bg'] ) )
        update_post_meta( $post_id, 'lpp_f_header_bg', wp_kses( $_POST['lpp_f_header_bg'], $allowed ) );

      if( isset( $_POST['lpp_cta_bg'] ) )
        update_post_meta( $post_id, 'lpp_cta_bg', wp_kses( $_POST['lpp_cta_bg'], $allowed ) );

      if( isset( $_POST['lpp_form_bg'] ) )
        update_post_meta( $post_id, 'lpp_form_bg', wp_kses( $_POST['lpp_form_bg'], $allowed ) );

      // ////////////////// Text Color Save SETTINGS /////////////////////////// ///// ////

      if( isset( $_POST['lpp_h1_c'] ) )
        update_post_meta( $post_id, 'lpp_h1_c', wp_kses( $_POST['lpp_h1_c'], $allowed ) );

      if( isset( $_POST['lpp_h2_c'] ) )
        update_post_meta( $post_id, 'lpp_h2_c', wp_kses( $_POST['lpp_h2_c'], $allowed ) );

      if( isset( $_POST['lpp_content_c'] ) )
        update_post_meta( $post_id, 'lpp_content_c', wp_kses( $_POST['lpp_content_c'], $allowed ) );

      if( isset( $_POST['lpp_testimonial_c'] ) )
        update_post_meta( $post_id, 'lpp_testimonial_c', wp_kses( $_POST['lpp_testimonial_c'], $allowed ) );

      if( isset( $_POST['lpp_benefit_h2_c'] ) )
        update_post_meta( $post_id, 'lpp_benefit_h2_c', wp_kses( $_POST['lpp_benefit_h2_c'], $allowed ) );

      if( isset( $_POST['lpp_benefit_c'] ) )
        update_post_meta( $post_id, 'lpp_benefit_c', wp_kses( $_POST['lpp_benefit_c'], $allowed ) );

      if( isset( $_POST['lpp_f_h2_c'] ) )
        update_post_meta( $post_id, 'lpp_f_h2_c', wp_kses( $_POST['lpp_f_h2_c'], $allowed ) );

      if( isset( $_POST['lpp_cta_c'] ) )
        update_post_meta( $post_id, 'lpp_cta_c', wp_kses( $_POST['lpp_cta_c'], $allowed ) );


      if( isset( $_POST['lpp_add_img_1'] ) )
        update_post_meta( $post_id, 'lpp_add_img_1',  $_POST['lpp_add_img_1']);

      if( isset( $_POST['lpp_add_img_2'] ) )
        update_post_meta( $post_id, 'lpp_add_img_2',  $_POST['lpp_add_img_2']);

      if( isset( $_POST['lpp_add_img_3'] ) )
        update_post_meta( $post_id, 'lpp_add_img_3',  $_POST['lpp_add_img_3']);

      if( isset( $_POST['lpp_add_img_4'] ) )
        update_post_meta( $post_id, 'lpp_add_img_4',  $_POST['lpp_add_img_4']);

      if( isset( $_POST['lpp_add_img_5'] ) )
        update_post_meta( $post_id, 'lpp_add_img_5',  $_POST['lpp_add_img_5']);

      if( isset( $_POST['lpp_logo_url'] ) )
        update_post_meta( $post_id, 'lpp_logo_url',  $_POST['lpp_logo_url']);

      if( isset( $_POST['lpp_new_empty_template'] ) )
        update_post_meta( $post_id, 'lpp_new_empty_template',  $_POST['lpp_new_empty_template']);


      if( isset( $_POST['lpp_seo_title'] ) )
        update_post_meta( $post_id, 'lpp_seo_title', wp_kses( $_POST['lpp_seo_title'], $allowed ) );

      if( isset( $_POST['lpp_seo_keywords'] ) )
        update_post_meta( $post_id, 'lpp_seo_keywords', wp_kses( $_POST['lpp_seo_keywords'], $allowed ) );

      if( isset( $_POST['lpp_seo_meta_description'] ) )
        update_post_meta( $post_id, 'lpp_seo_meta_description', wp_kses( $_POST['lpp_seo_meta_description'], $allowed ) );

        if( isset( $_POST['lpp_headings_font'] ) )
        update_post_meta( $post_id, 'lpp_headings_font', wp_kses( $_POST['lpp_headings_font'], $allowed ) );

      if( isset( $_POST['lpp_paragraph_font'] ) )
        update_post_meta( $post_id, 'lpp_paragraph_font', wp_kses( $_POST['lpp_paragraph_font'], $allowed ) );

      if( isset( $_POST['lpp_input_font'] ) )
        update_post_meta( $post_id, 'lpp_input_font', wp_kses( $_POST['lpp_input_font'], $allowed ) );

      if( isset( $_POST['lpp_page_hit_counter'] ) )
        update_post_meta( $post_id, 'lpp_page_hit_counter', wp_kses( $_POST['lpp_page_hit_counter'], $allowed ) );

      if( isset( $_POST['lpp_page_views_counter'] ) )
        update_post_meta( $post_id, 'lpp_page_views_counter', wp_kses( $_POST['lpp_page_views_counter'], $allowed ) );

        update_post_meta( $post_id, 'lpp_is_front_page', wp_kses( $_POST['lpp_is_front_page'], $allowed ) );

        update_post_meta( $post_id, 'lpp_load_wphead', wp_kses( $_POST['lpp_load_wphead'], $allowed ) );

        update_post_meta( $post_id, 'lpp_load_wpfooter', wp_kses( $_POST['lpp_load_wpfooter'], $allowed ) );

  }

  ///////////////Includes////////////////////////

include 'lpp_basic_settings.php';

include 'select_template.php';

//include 'lpp_custom_scripts.php';

include 'lpp_mail_chimp_int.php';

include 'lpp_seo.php';
include 'lpp_premium_ver.php';

include 'lpp_visitor_count_metabox.php';

include 'meta/lpp_extra_settings.php';




  //////////// META BOXES TYPE ENDS HERE    !!!!! //////////////


















?>