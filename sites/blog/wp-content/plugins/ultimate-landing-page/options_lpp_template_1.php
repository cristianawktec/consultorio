
<style type='text/css'>

#body{
  text-align: center;
}
#lpp_header{
  text-align: center;
  width: 95%;
  border: 2px solid black;
  display: inline-block;
}
#lpp_center{
  width: 95%;
  border: 2px solid black;
  display: inline-block;
}
#lpp_center_left{
  width:45%;
  height:75%;
  float: left;
  text-align: center;

}
#lpp_center_left >img{
  margin-top: 10%;
  height:0%;

}

#lpp_center_right{
  width:50%;
  height:75%;
  float: right;
  text-align: center;

}
#lpp_text{
  margin-top: 10%;
  margin-right: 1%;
  color: #333333; 
  line-height: 1.5; 
  font-size: 1.125rem; 
  font-family: 'proxima-nova', 'Helvetica Neue', Helvetica, Arial, sans-serif;
}
.lpp_p{
  color: #333333; 
  line-height: 1.5; 
  font-size: 1.125rem; 
  font-family: 'proxima-nova', 'Helvetica Neue', Helvetica, Arial, sans-serif;

}

#lpp_feature{
  list-style-type:disc;
  text-align: left;
  margin-top: 4%;
  margin-left: 5%;

}
#lpp_cta1{
  margin-top: 7%;
  width: 70%;
  height: 5%;
  border:none;
  border-bottom: 9px solid #13846c;

  font-size: 1.6em;
  font-family:verdana;
  background: #1BBC9B;
  color: #fff;

}





#lpp_testimonial{
  width: 100%;
  border: 2px solid black;
  display: inline-block;
}
#testimonial_text{
  font-size: 1rem;
  margin-left: 5px;
}

#lpp_testimonial_left{
  width:100%;
  float: left;
}


#lpp_benefit_sect{
  width: 95%;
  border: 2px solid black;
  text-align: center;
  display: inline-block;
}

#lpp_benefit_1{
  width:30%;
  float: left;
  text-align: center;
  border: 1px solid black;
  margin-left:2%; 
  text-align: center;

}

#lpp_benefit_2{
  width:30%;
  float: left;
  text-align: center;
  border: 1px solid black;
  margin-left:2%; 
  text-align: center;

}

#lpp_benefit_3{
  width:30%;
  float: left;
  text-align: center;
  border: 1px solid black;
  margin-left:2%; 
  text-align: center;
}




#lpp_f_line,#lpp_f_cta{

  width: 95%;
  border: 2px solid black;
  display: inline-block;

}
#lpp_main_content{

  border: 2px dashed black;

}
.wp-editor-area{
  border: 2px dashed black;
}








    </style>



<div id="#body">

    <div id='lpp_header' class='lpp_h'>
      <h1><input type='text' id='lpp_main_h1' name='lpp_main_h1' value='<?php echo $lpp_main_h1; ?>' style='width:300px; height:50px; border:2px dashed black; text-align:center;' placeholder='Main Heading'/></h1>
      <h3> 
        <input type='text' id='lpp_sub_h2' name='lpp_sub_h2' value='<?php echo $lpp_sub_h2; ?>' style='width:500px; height:35px; border:2px dashed black; text-align:center;' placeholder='Suporting sub header and explanation.'/>
        </h3>
    </div>
    <div id='lpp_content'>
      <div id='lpp_center'>
        <div id='lpp_center_left'>
          <input id="image_location2" type="text" class="upload_image_button1"  name="lpp_add_img_1"value='<?php echo $lpp_add_img_1; ?>' style='font-size:14px; text-align:center;width:80%;height:45%;' placeholder='Featured image url'/>
    <input id="image_location2" type="button" class="upload_bg" data-id="1" value="Upload Image" />
          <img src='<?php echo $lpp_add_img_1 ;?>' style='width:90%;' >
        </div>
        <div id='lpp_center_right'>
          
            <p id='lpp_text' class='lpp_p'>
            <textarea name='lpp_main_content' id='lpp_main_content' value='<?php echo $lpp_main_content; ?>' style='width:350px; height:200px; border:2px dashed black; text-align:center;' placeholder='Your content goes here!. It should be clear and explain your product.'><?php echo $lpp_main_content; ?></textarea>
          

          <ul id="lpp_feature" class="lpp_p">
            <li>
              <input type='text' id='lpp_feature_1' name='lpp_feature_1' value='<?php echo $lpp_feature_1; ?>' style='width:300px; height:30px; border:2px dashed black; text-align:center;' placeholder='Enter your product features'/>
            </li>
            <li>
              <input type='text' id='lpp_feature_2' name='lpp_feature_2' value='<?php echo $lpp_feature_2; ?>' style='width:300px; height:30px; border:2px dashed black; text-align:center;' placeholder='Enter your product features'/>
            </li>
            <li>
              <input type='text' id='lpp_feature_3' name='lpp_feature_3' value='<?php echo $lpp_feature_3; ?>' style='width:300px; height:30px; border:2px dashed black; text-align:center;' placeholder='Enter your product features'/>
            </li>


          
            <div id="lpp_cta1">
              <input type='text' id='lpp_main_cta' name='lpp_main_cta' value='<?php echo $lpp_main_cta; ?>' style='width:230px; height:35px; border:2px dashed black; text-align:center;' placeholder='Call To Action Text'/>
            </div>
            <input type='url' id='lpp_cta_url' name='lpp_cta_url' value='<?php echo $lpp_cta_url; ?>' style='width:230px; height:35px; border:2px dashed black; text-align:center;' placeholder='Call To Action Target URl'/>
        
      </div>
      <div id="lpp_testimonial">
        <div id="lpp_testimonial_left">
          <p class="lpp_p" id="testimonial_text">
            <textarea name='lpp_testimonial_left_content' id='lpp_testimonial_left_content' value='<?php echo $lpp_testimonial_left_content; ?>' style='width:600px; height:180px; border:2px dashed black; text-align:center;' placeholder='Enter your first testimonial here.'><?php echo $lpp_testimonial_left_content; ?></textarea>
           </p>
           <p style="font-size:11px;">
             <input type='text' id='lpp_testimonial_left_content_author' name='lpp_testimonial_left_content_author' value='<?php echo $lpp_testimonial_left_content_author; ?>' style='width:280px; height:30px; border:2px dashed black; text-align:center;' placeholder='Enter testimonial author name here.'/>
           </p>

        </div>
        
      </div>
      <div id="lpp_benefit_sect">
        <div id="lpp_benefit_1">
          <h3 class="lpp_h">
            <input type='text' id='lpp_benefit_1_content_title' name='lpp_benefit_1_content_title' value='<?php echo $lpp_benefit_1_content_title; ?>' style='width:190px; height:30px; border:2px dashed black; text-align:center;' placeholder='Enter benefit title here.'/>
          </h3>
          <p class="lpp_p" id="benefit_text">
            <textarea rows="4" cols="29" name='lpp_benefit_1_content' id='lpp_benefit_1_content' value='<?php echo $lpp_benefit_1_content; ?>' style='height:180px; border:2px dashed black; text-align:center;' placeholder='Enter your first benefit here.'><?php echo $lpp_benefit_1_content; ?></textarea>
          </p>
        </div>
        <div id="lpp_benefit_2">
           <h3 class="lpp_h">
            <input type='text' id='lpp_benefit_2_content_title' name='lpp_benefit_2_content_title' value='<?php echo $lpp_benefit_2_content_title; ?>' style='width:190px; height:30px; border:2px dashed black; text-align:center;' placeholder='Enter benefit title here.'/>
          </h3>
          <p class="lpp_p" id="benefit_text">
            <textarea rows="4" cols="29" name='lpp_benefit_2_content' id='lpp_benefit_2_content' value='<?php echo $lpp_benefit_2_content; ?>' style='height:180px; border:2px dashed black; text-align:center;' placeholder='Enter your first benefit here.'><?php echo $lpp_benefit_2_content; ?></textarea>
          </p>
        </div>
        <div id="lpp_benefit_3">
           <h3 class="lpp_h">
            <input type='text' id='lpp_benefit_3_content_title' name='lpp_benefit_3_content_title' value='<?php echo $lpp_benefit_3_content_title; ?>' style='width:190px; height:30px; border:2px dashed black; text-align:center;' placeholder='Enter benefit title here.'/>
          </h3>
          <p class="lpp_p" id="benefit_text">
            <textarea rows="4" cols="29" name='lpp_benefit_3_content' id='lpp_benefit_3_content' value='<?php echo $lpp_benefit_3_content; ?>' style='height:180px; border:2px dashed black; text-align:center;' placeholder='Enter your first testimonial here.'><?php echo $lpp_benefit_3_content; ?></textarea>
          </p>
        </div>
      </div>
      <div id='lpp_f_line'>
        <h2 class='lpp_h'>
          <input type='text' id='lpp_final_sub_h2' name='lpp_final_sub_h2' value='<?php echo $lpp_final_sub_h2; ?>' style='width:550px; height:50px; border:2px dashed black; text-align:center;' placeholder='Final Suporting sub header.'/>

        </h2>
      </div>
      <div id='lpp_f_cta'><h1>
        <input type='text' id='lpp_final_cta' name='lpp_final_cta' value='<?php echo $lpp_final_cta; ?>' style='width:550px; height:50px; border:2px dashed black; text-align:center;' placeholder='Place your final Call To Action Text Here'/>
      </h1></div>
    </div>
    </div>
  </div>