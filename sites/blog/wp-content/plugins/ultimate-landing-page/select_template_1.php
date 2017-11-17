<?php 
function lpp_f_main_front_html($single_template) {
     global $post;
     $lpp_template_select = get_post_meta($post->ID,'lpp_template_select',true);

    $lpp_template = dirname( __FILE__ ).'/'.$lpp_template_select;
  
     if ($post->post_type == 'landingpage_f') {
          $single_template = $lpp_template;
     }
     return $single_template;
}
add_filter( 'single_template', 'lpp_f_main_front_html' );



//////////////////////////////

function lpp_f_landing_page_template_select($post){

    global $post;

$lpp_template_select = get_post_meta($post->ID,'lpp_template_select',true);



wp_nonce_field( 'lpp_meta_box_nonce', 'lppmeta_box_nonce' );

?>



<style type="text/css">
#lpp_wrapper{
    display: inline-block;
    height: 1200px;
    width: 100%;
}

#lpp_left{
    width: 40%;
    display: inline-block;
    float: left;
    margin-right: 100px;

}
#lpp_right{
    width: 40%;
    display: inline-block;
    float: left;
    
}


.formLayout_s_l
    {

        
        padding: 11px;
        width: 450px;
        margin: 10px;
        font-size: 20px;
        font-weight:100;
        font-family: sans-serif;
    }
    
    .formLayout_s_l label 
    {
        display: block;
        margin-bottom: 29px;
        margin-top: 30px;
    }
    .formLayout_s_l input{
        display: block;
        float: left;
        margin-right: 40px;
        margin-left: 10px;


    }
 
    .formLayout_s_l label
    {
        text-align: left;
        display: block;
        font-size: 19px;
        font-family: sans-serif;
        font-weight: 100;
    }
 
    br
    {
        clear: left;
    }

    #submit{
    width: 200px;
    height: 40px;
    margin-top: 8px;
    margin-right: 50px;
    font-size: 18px;

  }
  #pr_msg_link{
    font-size:25px; font-family:sans-serif; font-weight:100;
  }

</style>
<div id='lpp_wrapper' class='formLayout_s_l'>
    <h2>Select a template and click update</h2>
    <div id='lpp_left'>
            
        Template -1
        <input type="radio" id='lpp_select_template1' name='lpp_template_select' value='lpp_template_1.php'
        <?php checked( "lpp_template_1.php", $lpp_template_select); ?>
        >
        <label for='lpp_select_template1'>
            <img src="<?php echo plugins_url('/img/landingpage_template_1.png',__FILE__); ?>" style='width:200px;height:200px;' >
        </label>

        Template -3
        <input disabled  type="radio" id='lpp_select_template3' name='lpp_template_select' value='lpp_template_3.php'
        <?php checked( "lpp_template_3.php", $lpp_template_select); ?>
        >

        <label disabled for='lpp_select_template3'>
            <img src="<?php echo plugins_url('/img/landingpage_template_3.png',__FILE__); ?>"style='width:200px;height:200px;' >
            
        </label>

        Template -5
        <input disabled type="radio" id='lpp_select_template5' name='lpp_template_select' value='lpp_template_5.php' 
        <?php checked( "lpp_template_5.php", $lpp_template_select); ?>
          disabled >

        <label for='lpp_select_template5'>
            <img src="<?php echo plugins_url('/img/landingpage_template_5.png',__FILE__); ?>"style='width:200px;height:200px;' >
        </label>

        Template -7
        <input  disabled type="radio" id='lpp_select_template7' name='lpp_template_select' value='lpp_template_7.php'
        <?php checked( "lpp_template_7.php", $lpp_template_select); ?>
        >

        <label for='lpp_select_template7'>
            <img src="<?php echo plugins_url('/img/landingpage_template_7.png',__FILE__); ?>" style='width:200px;height:200px;' >
            <img src="<?php echo plugins_url('/img/landingpage_template_7.png',__FILE__); ?>" style='width:200px;height:200px;' >
        </label>
    </div>
        <div id='lpp_right'>


        Template -2
        <input disabled type="radio" id='lpp_select_template2' name='lpp_template_select' value='lpp_template_2.php'
        <?php checked( "lpp_template_2.php", $lpp_template_select); ?>
        >

        <input style='display:none;' disabled type="radio" id='lpp_select_template2' name='lpp_template_select' value='lpp_template_2.php'
        <?php checked( "lpp_template_2.php", $lpp_template_select); ?>
        >


        <label disabled for='lpp_select_template2'>
            <img src="<?php echo plugins_url('/img/landingpage_template_2.png',__FILE__); ?>" style='width:200px;height:200px;' >
        </label>


            Template -4
        <input disabled type="radio" id='lpp_select_template4' name='lpp_template_select' value='lpp_template_4.php'
        <?php checked( "lpp_template_4.php", $lpp_template_select); ?>
        >

        <label disabled for='lpp_select_template4'>
            <img src="<?php echo plugins_url('/img/landingpage_template_4.png',__FILE__); ?>" style='width:200px;height:200px;' >
        </label>


         Template -6
        <input disabled type="radio" id='lpp_select_template6' name='lpp_template_select' value='lpp_template_6.php'
        <?php checked( "lpp_template_6.php", $lpp_template_select); ?>
        >

        <label disabled for='lpp_select_template6'>
            <img src="<?php echo plugins_url('/img/landingpage_template_6.png',__FILE__); ?>" style='width:200px;height:200px;' >
        </label>



        
        
</div>
    </div>

    <a href="http://web-settler.com/ultimate-landing-page/" id='pr_msg_link'><i>To Unlock all Templates Click Here</i></a>

<div style='width:100%;text-align:center; background:#e3e3e3;height:60px;border-left:5px solid #a7d142;'>
 <?php submit_button('Update');?>
</div>


<?php


}


?>