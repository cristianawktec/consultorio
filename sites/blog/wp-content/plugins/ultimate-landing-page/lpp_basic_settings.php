<?php

function lpp_f_main_front_end_settings($post){
	//
	//  Background Colors 
	//
	$lpp_content_bg = get_post_meta($post->ID,'lpp_content_bg',true); //Section -1
	$lpp_testimonial_bg = get_post_meta($post->ID,'lpp_testimonial_bg',true); //Section --2
	$lpp_benefit_bg = get_post_meta($post->ID,'lpp_benefit_bg',true); //Section -3
	$lpp_cta_bg = get_post_meta($post->ID,'lpp_cta_bg',true); 


	$lpp_body_bg = get_post_meta($post->ID,'lpp_body_bg',true);
	$lpp_center_bg = get_post_meta($post->ID,'lpp_center_bg',true);
	$lpp_f_header_bg = get_post_meta($post->ID,'lpp_f_header_bg',true);
	$lpp_header_bg = get_post_meta($post->ID,'lpp_header_bg',true);

	//
	//  Text Colors 
	//
	$lpp_h1_c = get_post_meta($post->ID,'lpp_h1_c',true);
	$lpp_h2_c = get_post_meta($post->ID,'lpp_h2_c',true);
	$lpp_content_c = get_post_meta($post->ID,'lpp_content_c',true);
	$lpp_cta_c = get_post_meta($post->ID,'lpp_cta_c',true);

	//Fonts 

	$lpp_headings_font = get_post_meta($post->ID,'lpp_headings_font',true);
	$lpp_paragraph_font = get_post_meta($post->ID,'lpp_paragraph_font',true);
	$lpp_input_font = get_post_meta($post->ID,'lpp_input_font',true);



		//Disabled
	$lpp_testimonial_c = get_post_meta($post->ID,'lpp_testimonial_c',true);
	$lpp_benefit_h2_c = get_post_meta($post->ID,'lpp_benefit_h2_c',true);
	$lpp_benefit_c = get_post_meta($post->ID,'lpp_benefit_c',true);
	$lpp_f_h2_c = get_post_meta($post->ID,'lpp_f_h2_c',true);
	


	////  NONCE FIELD ///////

	wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );

?>
		
		
	<style type="text/css">
	.formLayout_1
    {
        width: 550px;
        margin: 20px;
        height: 960px;
    }
    
    .formLayout_1 label 
    {
        display: block;
        width: 195px;
        float: left;
        margin-bottom: 20px;
        margin-left: 20px;
    }
    .formLayout_1 input{
        display: block;
        float: left;
        margin-bottom: 20px;

    }
 
    .formLayout_1 label
    {
        text-align: right;
        padding-right: 20px;
        font-size: 16px;
        font-weight: bold;
    }
 
    br
    {
        clear: left;
    }


    td label, td input {
    	text-align: left !important;
    }

td .font-select {
  font-size: 16px;
  width: 210px;
  position: relative;
  display: inline-block;
  zoom: 1;
  *display: inline;
}

td .font-select .fs-drop {
  background: #fff;
  border: 1px solid #aaa;
  border-top: 0;
  position: absolute;
  top: 29px;
  left: 0;
  -webkit-box-shadow: 0 4px 5px rgba(0,0,0,.15);
  -moz-box-shadow   : 0 4px 5px rgba(0,0,0,.15);
  -o-box-shadow     : 0 4px 5px rgba(0,0,0,.15);
  box-shadow        : 0 4px 5px rgba(0,0,0,.15);
  z-index: 999;
}

td .font-select > a {
  background-color: #fff;
  background-image: -webkit-gradient(linear, left bottom, left top, color-stop(0, #eeeeee), color-stop(0.5, white));
  background-image: -webkit-linear-gradient(center bottom, #eeeeee 0%, white 50%);
  background-image: -moz-linear-gradient(center bottom, #eeeeee 0%, white 50%);
  background-image: -o-linear-gradient(top, #eeeeee 0%,#ffffff 50%);
  background-image: -ms-linear-gradient(top, #eeeeee 0%,#ffffff 50%);
  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#eeeeee', endColorstr='#ffffff',GradientType=0 );
  background-image: linear-gradient(top, #eeeeee 0%,#ffffff 50%);
  -webkit-border-radius: 4px;
  -moz-border-radius   : 4px;
  border-radius        : 4px;
  -moz-background-clip   : padding;
  -webkit-background-clip: padding-box;
  background-clip        : padding-box;
  border: 1px solid #aaa;
  display: block;
  overflow: hidden;
  white-space: nowrap;
  position: relative;
  height: 26px;
  line-height: 26px;
  padding: 0 0 0 8px;
  color: #444;
  text-decoration: none;
}

td .font-select > a span {
  margin-right: 26px;
  display: block;
  overflow: hidden;
  white-space: nowrap;
  line-height: 1.8;
  -o-text-overflow: ellipsis;
  -ms-text-overflow: ellipsis;
  text-overflow: ellipsis;
  cursor: pointer;
}

td .font-select > a div {
  -webkit-border-radius: 0 4px 4px 0;
  -moz-border-radius   : 0 4px 4px 0;
  border-radius        : 0 4px 4px 0;
  -moz-background-clip   : padding;
  -webkit-background-clip: padding-box;
  background-clip        : padding-box;
  background: #ccc;
  background-image: -webkit-gradient(linear, left bottom, left top, color-stop(0, #ccc), color-stop(0.6, #eee));
  background-image: -webkit-linear-gradient(center bottom, #ccc 0%, #eee 60%);
  background-image: -moz-linear-gradient(center bottom, #ccc 0%, #eee 60%);
  background-image: -o-linear-gradient(bottom, #ccc 0%, #eee 60%);
  background-image: -ms-linear-gradient(top, #cccccc 0%,#eeeeee 60%);
  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#cccccc', endColorstr='#eeeeee',GradientType=0 );
  background-image: linear-gradient(top, #cccccc 0%,#eeeeee 60%);
  border-left: 1px solid #aaa;
  position: absolute;
  right: 0;
  top: 0;
  display: block;
  height: 100%;
  width: 18px;
}

td .font-select > a div b {
  display: block;
  width: 100%;
  height: 100%;
  cursor: pointer;
}

td .font-select .fs-drop {
  -webkit-border-radius: 0 0 4px 4px;
  -moz-border-radius   : 0 0 4px 4px;
  border-radius        : 0 0 4px 4px;
  -moz-background-clip   : padding;
  -webkit-background-clip: padding-box;
  background-clip        : padding-box;
}

td .font-select .fs-results {
  margin: 0 4px 4px 0;
  max-height: 190px;
  width: 200px;
  padding: 0 0 0 4px;
  position: relative;
  overflow-x: hidden;
  overflow-y: auto;
}

td .font-select .fs-results li {
  line-height: 80%;
  padding: 7px 7px 8px;
  margin: 0;
  list-style: none;
  font-size: 18px;
}

td .font-select .fs-results li.active {
  background: #3875d7;
  color: #fff;
  cursor: pointer;
}
td.font-select .fs-results li em {
  background: #feffde;
  font-style: normal;
}

td.font-select .fs-results li.active em {
  background: transparent;
}

td.font-select-active > a {
  -webkit-box-shadow: 0 0 5px rgba(0,0,0,.3);
  -moz-box-shadow   : 0 0 5px rgba(0,0,0,.3);
  -o-box-shadow     : 0 0 5px rgba(0,0,0,.3);
  box-shadow        : 0 0 5px rgba(0,0,0,.3);
  border: 1px solid #5897fb;
}

td.font-select-active > a {
  border: 1px solid #aaa;
  -webkit-box-shadow: 0 1px 0 #fff inset;
  -moz-box-shadow   : 0 1px 0 #fff inset;
  -o-box-shadow     : 0 1px 0 #fff inset;
  box-shadow        : 0 1px 0 #fff inset;
  background-color: #eee;
  background-image: -webkit-gradient(linear, left bottom, left top, color-stop(0, white), color-stop(0.5, #eeeeee));
  background-image: -webkit-linear-gradient(center bottom, white 0%, #eeeeee 50%);
  background-image: -moz-linear-gradient(center bottom, white 0%, #eeeeee 50%);
  background-image: -o-linear-gradient(bottom, white 0%, #eeeeee 50%);
  background-image: -ms-linear-gradient(top, #ffffff 0%,#eeeeee 50%);
  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffffff', endColorstr='#eeeeee',GradientType=0 );
  background-image: linear-gradient(top, #ffffff 0%,#eeeeee 50%);
  -webkit-border-bottom-left-radius : 0;
  -webkit-border-bottom-right-radius: 0;
  -moz-border-radius-bottomleft : 0;
  -moz-border-radius-bottomright: 0;
  border-bottom-left-radius : 0;
  border-bottom-right-radius: 0;
}

td.font-select-active > a div {
  background: transparent;
  border-left: none;
}

td.font-select-active > a div b {
  background-position: -18px 1px;
}


td span#pal {
  top: 80px; 
}

	</style>

<div class='formLayout_1'> 	
<h1>Background Colors</h1>

	 <br>
	 <br>
	 <label for='lpp_content_bg'>Section-1 Background Color : </label>
	 <input type='text' class='color_picker' data-alpha="true"  name='lpp_content_bg' value='<?php echo $lpp_content_bg; ?>'/>
	 <br>
	 <br>
	 <label for='lpp_testimonial_bg'>Section-2 Background Color : </label>
	 <input type='text' class='color_picker' data-alpha="true"  name='lpp_testimonial_bg' value='<?php echo $lpp_testimonial_bg; ?>'/>
	 <br>
	 <br>
	 <label for='lpp_benefit_bg'>Section-3 Background Color : </label>
	 <input type='text' class='color_picker' data-alpha="true"  name='lpp_benefit_bg' value='<?php echo $lpp_benefit_bg; ?>'/>
	 <br>
	 <br>
	 <label for='lpp_cta_bg'>Button Background Color : </label>
	 <input type='text' class='color_picker' data-alpha="true"  name='lpp_cta_bg' value='<?php echo $lpp_cta_bg; ?>'/>
	 <br>
	 <br>

	 <h1>Text Color</h1>
	 <br>
	 <label for='lpp_h1_c'>Primary Heading Color : </label>
	 <input type='text' class='color_picker' data-alpha="true"  name='lpp_h1_c' value='<?php echo $lpp_h1_c; ?>'/>
	 <br>
	 <br>
	 <label for='lpp_h2_c'>Sub Heading Color : </label>
	 <input type='text' class='color_picker' data-alpha="true"  name='lpp_h2_c' value='<?php echo $lpp_h2_c; ?>'/>
	 <br>
	 <br>
	 <label for='lpp_content_c'>Paragraph Color : </label>
	 <input type='text' class='color_picker' data-alpha="true"  name='lpp_content_c' value='<?php echo $lpp_content_c; ?>'/>
	 <br>
	 <br>
	 <label for='lpp_cta_c'>Button Color : </label>
	 <input type='text' class='color_picker' data-alpha="true"  name='lpp_cta_c' value='<?php echo $lpp_cta_c; ?>'/>
	 <br>
 	 <br>

 	 <h1>Select Font Family</h1>
 	 <br>
 	 <br>
 	 <table class="form-table">

 	 <tr> 
        <th scope='row'><?php _e('Font Family For Headings');?></th>
        <td><label for='font-headings'>
            <input id="font-headings" type="text" name="lpp_headings_font" value="<?php echo $lpp_headings_font; ?>" />
          </label>
        </td>
    </tr>


    <tr> 
        <th scope='row'><?php _e('Font Family For Paragraphs');?></th>
        <td><label for='font-paragraph'>
            <input id="font-paragraph" type="text" name="lpp_paragraph_font" value="<?php echo $lpp_paragraph_font; ?>" />
          </label>
        </td>
    </tr>

    <tr> 
        <th scope='row'><?php _e('Font Family For Input Fields');?></th>
        <td><label for='font-input-fields'>
            <input id="font-input-fields" type="text" name="lpp_input_font" value="<?php echo $lpp_input_font; ?>" />
          </label>
        </td>
    </tr>


</table>
</div>








<div style='width:95%;margin-left:2.5%; text-align:center; background:#e3e3e3;height:60px;border-left:5px solid #a7d142;'>
 <?php submit_button('Update');?>
</div>





<?php


}
?>