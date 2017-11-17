<?php 
function lpp_f_main_front_html($single_template) {
     global $post;
     $lpp_template_select = get_post_meta($post->ID,'lpp_template_select',true);

     if (empty($lpp_template_select)) {
         $lpp_template_select = 'lpp_template_1.php';
     }

    $lpp_template = dirname( __FILE__ ).'/'.$lpp_template_select;
  
     if ($post->post_type == 'landingpage_f') {
          $single_template = $lpp_template;
     }
     return $single_template;
}
add_filter( 'single_template', 'lpp_f_main_front_html' );



///////////////////////////////////////////////////

function lpp_f_landing_page_template_select($post){

    global $post;

$lpp_template_select = get_post_meta($post->ID,'lpp_template_select',true);



wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );

?>



<style type="text/css">
#lpp_wrapper{
    display: inline-block;
    width: 100%;
    min-width: 650px;
}

#lpp_left{
    width: 20%;
    display: inline-block;
    float: left;
    margin-right: 100px;

}
#lpp_right{
    width: 20%;
    display: inline-block;
    float: left;
    
}

#lpp_row_3{
    width: 20%;
    display: inline-block;
    float: left;
    margin-left: 80px;
}


.formLayout_s_l
    {

        
        padding: 10px;
        width: 450px;
        margin: 10px;
        font-size: 18px;
        font-weight:100;
        font-family: verdana;
    }
    
    .formLayout_s_l label 
    {
        display: block;
        margin-bottom: 30px;
        margin-top: 30px;
    }
    .formLayout_s_l input{
        display: block;
        float: left;
        margin-right: 15px;
        margin-left: 10px;


    }
 
    .formLayout_s_l label
    {
        text-align: left;
        display: block;
        font-size: 20px;
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
    font-size: 19px;

  }
  .not-avail{
    color: red;
    font-size: 11px;
  }

</style>
<div id='lpp_wrapper' class='formLayout_s_l'>
    <h2>Select a Template and click Update</h2>
    <div id='lpp_left'>
            
        Template -1
        <input checked type="radio" id='lpp_select_template1' name='lpp_template_select' value='lpp_template_1.php'
        <?php checked( "lpp_template_1.php", $lpp_template_select); ?>
        >
        <label for='lpp_select_template1'>
            <img src="<?php echo plugins_url('/imgs/landingpage_template_1.png',__FILE__); ?>" style='width:200px;height:200px;' >
        </label>

        Template -3 <span class='not-avail'>Premium Only</span>
        <input disabled  type="radio" id='lpp_select_template3' name='lpp_template_select' value='lpp_template_3.php'
        <?php checked( "lpp_template_3.php", $lpp_template_select); ?>
        >

        <label disabled for='lpp_select_template3'>
            <img src="<?php echo plugins_url('/imgs/landingpage_template_3.png',__FILE__); ?>"style='width:200px;height:200px;' >
            
        </label>

        Template -5 <span class='not-avail'>Premium Only</span>
        <input disabled type="radio" id='lpp_select_template5' name='lpp_template_select' value='lpp_template_5.php' 
        <?php checked( "lpp_template_5.php", $lpp_template_select); ?>
          disabled >

        <label for='lpp_select_template5'>
            <img src="<?php echo plugins_url('/imgs/landingpage_template_5.png',__FILE__); ?>"style='width:200px;height:200px;' >
        </label>

        Template -7 <span class='not-avail'>Premium Only</span>
        <input  disabled type="radio" id='lpp_select_template7' name='lpp_template_select' value='lpp_template_7.php'
        <?php checked( "lpp_template_7.php", $lpp_template_select); ?>
        >

        <label for='lpp_select_template7'>
            <img src="<?php echo plugins_url('/imgs/landingpage_template_7.png',__FILE__); ?>" style='width:200px;height:200px;' >
        </label>

        CoimingSoon Page <span class='not-avail'>Premium Only</span>
        <input  disabled type="radio" id='lpp_select_template7' name='lpp_template_select' value='lpp_template_7.php'
        <?php checked( "lpp_template_7.php", $lpp_template_select); ?>
        >

        <label for='lpp_select_template7'>
            <img src="<?php echo plugins_url('/imgs/landingpage_template_14.png',__FILE__); ?>" style='width:200px;height:200px;' >
        </label>
    </div>
        <div id='lpp_right'>


        Template -2 <span class='not-avail'>Premium Only</span>
        <input disabled type="radio" id='lpp_select_template2' name='lpp_template_select' value='lpp_template_2.php'
        <?php checked( "lpp_template_2.php", $lpp_template_select); ?>
        >

        <label disabled for='lpp_select_template2'>
            <img src="<?php echo plugins_url('/imgs/landingpage_template_2.png',__FILE__); ?>" style='width:200px;height:200px;' >
        </label>


            Template -4 <span class='not-avail'>Premium Only</span>
        <input disabled type="radio" id='lpp_select_template4' name='lpp_template_select' value='lpp_template_4.php'
        <?php checked( "lpp_template_4.php", $lpp_template_select); ?>
        >

        <label disabled for='lpp_select_template4'>
            <img src="<?php echo plugins_url('/imgs/landingpage_template_4.png',__FILE__); ?>" style='width:200px;height:200px;' >
        </label>


         Template -6 <span class='not-avail'>Premium Only</span>
        <input disabled type="radio" id='lpp_select_template6' name='lpp_template_select' value='lpp_template_6.php'
        <?php checked( "lpp_template_6.php", $lpp_template_select); ?>
        >

        <label disabled for='lpp_select_template6'>
            <img src="<?php echo plugins_url('/imgs/landingpage_template_6.png',__FILE__); ?>" style='width:200px;height:200px;' >
        </label>

        Template -8 <span class='not-avail'>Premium Only</span>
        <input disabled type="radio" id='lpp_select_template8' name='lpp_template_select' value='lpp_template_8.php'
        <?php checked( "lpp_template_8.php", $lpp_template_select); ?>
        >

        <label for='lpp_select_template8'>
            <img src="<?php echo plugins_url('/imgs/landingpage_template_8.png',__FILE__); ?>" style='width:200px;height:200px;' >
        </label>

        ComingSoon Simple <span class='not-avail'>Premium Only</span>
        <input disabled type="radio" id='lpp_select_template8' name='lpp_template_select' value='lpp_template_8.php'
        <?php checked( "lpp_template_8.php", $lpp_template_select); ?>
        >

        <label for='lpp_select_template8'>
            <img src="<?php echo plugins_url('/imgs/landingpage_template_15.png',__FILE__); ?>" style='width:200px;height:200px;' >
        </label>

      
</div>
<div id='lpp_row_3'>
    Template -9 <span class='not-avail'>Premium Only</span>
        <input disabled type="radio" id='lpp_select_template9' name='lpp_template_select' value='lpp_template_9.php'
        <?php checked( "lpp_template_9.php", $lpp_template_select); ?>
        >

        <label for='lpp_select_template9'>
            <img src="<?php echo plugins_url('/imgs/landingpage_template_9.png',__FILE__); ?>" style='width:200px;height:200px;' >
        </label>

         Template -10 <span class='not-avail'>Premium Only</span>
        <input disabled type="radio" id='lpp_select_template10' name='lpp_template_select' value='lpp_template_10.php'
        <?php checked( "lpp_template_10.php", $lpp_template_select); ?>
        >

        <label for='lpp_select_template10'>
            <img src="<?php echo plugins_url('/imgs/landingpage_template_10.png',__FILE__); ?>" style='width:200px;height:200px;' >
        </label>

        Template -11 <span class='not-avail'>Premium Only</span>
        <input disabled type="radio" id='lpp_select_template10' name='lpp_template_select' value='lpp_template_10.php'
        <?php checked( "lpp_template_10.php", $lpp_template_select); ?>
        >

        <label for='lpp_select_template10'>
            <img src="<?php echo plugins_url('/imgs/landingpage_template_12.png',__FILE__); ?>" style='width:200px;height:200px;' >
        </label>

        Template -12 <span class='not-avail'>Premium Only</span>
        <input disabled type="radio" id='lpp_select_template10' name='lpp_template_select' value='lpp_template_10.php'
        <?php checked( "lpp_template_10.php", $lpp_template_select); ?>
        >

        <label for='lpp_select_template10'>
            <img src="<?php echo plugins_url('/imgs/landingpage_template_13.png',__FILE__); ?>" style='width:200px;height:200px;' >
        </label>

        Template - Custom
        <input type="radio" id='lpp_select_template_custom' name='lpp_template_select' value='lpp_template_11.php'
        <?php checked( "lpp_template_11.php", $lpp_template_select); ?>
        >

        <label for='lpp_select_template_custom'>
            <img src="<?php echo plugins_url('/imgs/landingpage_template_custom.png',__FILE__); ?>" style='width:200px;height:200px;' >
        </label>


</div>
    </div>

<div style='width:100%;text-align:center; background:#e3e3e3;height:70px;border-left:5px solid #a7d142;'>
 <?php submit_button('Update');?>
 <a href="http://web-settler.com/ultimate-landing-page/" id='pr_msg_link' style='float:left; font-size:19px; margin:20px 0 0 10px;'><i>Unlock All Templates and get more amazing features Click Here</i></a>
</div>


<?php


}


?>