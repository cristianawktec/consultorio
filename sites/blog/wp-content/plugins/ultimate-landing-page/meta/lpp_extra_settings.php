<?php 
function lpp_extra_settings($post){


     $lpp_is_front_page = get_post_meta($post->ID,'lpp_is_front_page',true);
     $lpp_load_wphead = get_post_meta($post->ID,'lpp_load_wphead',true);
     $lpp_load_wpfooter = get_post_meta($post->ID,'lpp_load_wpfooter',true);

	 wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );
	 ?>
<div id='extra_options'>
<br>
<br>
<p id='label'>Set as Front Page : </p>
<label class="switch">
  <input type="checkbox" name='lpp_is_front_page' value='true' <?php   checked( "true", $lpp_is_front_page); ?> >
  <div class="slider round"></div>
</label>
<br>
<p id='label'>Load wp_head :  </p>
<label class="switch">
  <input type="checkbox" name='lpp_load_wphead' value='yes' <?php   checked( "yes", $lpp_load_wphead); ?> >
  <div class="slider round"></div>
</label>
<br>
<p style="font-size:12px; font-style:italic;">This will load your theme header scripts.</p>
<p id='label'> Load wp_footer :  </p>
<label class="switch">
  <input type="checkbox" name='lpp_load_wpfooter' value='yes' <?php   checked( "yes", $lpp_load_wpfooter); ?> >
  <div class="slider round"></div>
</label>
<br>
<p style="font-size:12px; font-style:italic;">This will load your theme footer scripts.</p>

</div>




<style>

#extra_options{
height: 300px;
}
#label{
float: left;
text-align: left;
}
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
  float: right;
  margin-right: 40px;
  margin-top: 5px;
}

/* Hide default HTML checkbox */
.switch input {display:none;}

/* The slider */
.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}

</style>

<?php }  

?>