
<!DOCTYPE html>
<html>
<head>
  <style type="text/css">

body{
  max-width:100%;
  max-height: 100%; 
  background:none;
  text-align: center;
}
#lpp_content{
  min-width:480px;
  min-height:780px;
}
#lpp_header{
  text-align: center;
  width: 95%;
  height: 10%;
  display: inline-block;
}
#lpp_center{
  width: 95%;
  height:70%;
  display: inline-block;
}
#lpp_center_left{
  width:45%;
  height:60%;
  float: left;
  text-align: center;

}
#lpp_center_left >img{
  margin-top: 11%;
  height:30%;

}

#lpp_center_right{
  width:50%;
  height:60%;
  float: right;
  text-align: center;

}
#lpp_text{
  margin-top: 10%;
  margin-right: 5%;
  color: #333333; 
  line-height: 1.5; 
  font-size: 1.12rem; 
  font-family: 'proxima-nova', 'Helvetica Neue', Helvetica, Arial, sans-serif;
}
.lpp_p{
  color: #333333; 
  line-height: 1.5; 
  font-size: 1.1rem; 
  font-family: 'proxima-nova', 'Helvetica Neue', Helvetica, Arial, sans-serif;

}

#lpp_feature{
  list-style-type:disc;
  text-align: left;
  margin-top: 10%;
  margin-left: 5%;

}
#lpp_cta1{
  margin-top: 5%;
  width: 70%;
  height: 15%;
  border:none;
  border-bottom: 7px solid #13846c;

  font-size: 1.23em;
  font-family:verdana;
  background: #1BBC9B;
  color: #fff;
  border-top-left-radius: 100px;
  border-bottom-left-radius: 50px;
  border-top-right-radius: 50px;
  border-bottom-right-radius: 100px;

}
#lpp_f_cta{
  border-bottom: 15px solid #13846c;
  font-size: 1em;
  font-family:verdana;
  background: #1BBC9B;
  color: #fff;
  text-align: center;
  width: 100%;


}




#lpp_testimonial{
  width: 92%;
  height:15%;
  margin-top: 30px;
  display: inline-block;
}
#testimonial_text{
  font-size: 1.25rem;
  margin-left: 5px;
}

#lpp_testimonial_left{
  width:45%;
  height:75%;
  float: left;
}

#lpp_testimonial_right{
  width:50%;
  height:75%;
  float: right;
}

#lpp_benefit_sect{
  width: 95%;
  height:45%;
  text-align: center;
  display: inline-block;
}

#lpp_benefit_1{
  width:30%;
  height:70%;
  float: left;
  text-align: center;
  margin-left:2%; 
  text-align: center;

}

#lpp_benefit_2{
  width:30%;
  height:70%;
  float: left;
  text-align: center;
  margin-left:2%; 
  text-align: center;

}

#lpp_benefit_3{
  width:30%;
  height:70%;
  float: left;
  text-align: center;
  margin-left:3%; 
  text-align: center;
}




#lpp_f_line,#lpp_f_cta{

  width: 95%;
  height:15%;
  display: inline-block;

}





    </style>
    <meta name='url' value="<?php 
     echo get_home_url( $blog_id, $path, $scheme );

      ?>">
     
</head>
  <body>

    <div id="lpp_header" class="lpp_h">
      <h1><?php echo  get_post_meta( $post->ID , 'lpp_main_h1' , true ); ?></h1>
      <h3><?php echo  get_post_meta( $post->ID , 'lpp_sub_h2' , true ); ?></h3>
    </div>
    <div id="lpp_content">
      <div id="lpp_center">
        <div id="lpp_center_left">
          <img src="#" style="width:90%; height:70%;">
        </div>
        <div id="lpp_center_right">
          <p id="lpp_text" class="lpp_p">
            <?php echo  get_post_meta( $post->ID , 'lpp_main_content' , true ); ?>
          </p>

          <ul id="lpp_feature" class="lpp_p">
            <li><?php echo  get_post_meta( $post->ID , 'lpp_feature_1' , true ); ?></li>
            <li><?php echo  get_post_meta( $post->ID , 'lpp_feature_2' , true ); ?></li>
            <li><?php echo  get_post_meta( $post->ID , 'lpp_feature_3' , true ); ?></li>
            <li><?php echo  get_post_meta( $post->ID , 'lpp_feature_4' , true ); ?></li>
            <li><?php echo  get_post_meta( $post->ID , 'lpp_feature_5' , true ); ?></li>



            </ul>

            <button id="lpp_cta1"><?php echo  get_post_meta( $post->ID , 'lpp_main_cta' , true ); ?></button>

          
        </div>
      </div>
      <hr>
      <div id="lpp_testimonial">
        <div id="lpp_testimonial_left">
          <p class="lpp_p" id="testimonial_text">
            <?php echo  get_post_meta( $post->ID , 'lpp_testimonial_left_content' , true ); ?>
           </p>
           <p style="font-size:11px;margin-left:10%;">
             <?php echo  get_post_meta( $post->ID , 'lpp_testimonial_left_content_author' , true ); ?>
           </p>

        </div>
        <div id="lpp_testimonial_right" >
          <p class="lpp_p" id="testimonial_text">
            <?php echo  get_post_meta( $post->ID , 'lpp_testimonial_right_content' , true ); ?>
          </p>
          <p style="font-size:11px; margin-left:10%;"><?php echo  get_post_meta( $post->ID , 'lpp_testimonial_right_content_author' , true ); ?></p>
        </div>
        
      </div>
      <hr>
      <div id="lpp_benefit_sect">
        <p style="font-size:12px; margin-left:10%;"><?php echo  get_post_meta( $post->ID , 'lpp_testimonial_right_content_author' , true ); ?></p>
        <div id="lpp_benefit_1">
         <h2 class="lpp_h">
           <?php echo  get_post_meta( $post->ID , 'lpp_benefit_1_content_title' , true ); ?>
         </h2>
         <p class="lpp_p" id="benefit_text">
          </p>
         <p>
          <?php echo  get_post_meta( $post->ID , 'lpp_benefit_1_content' , true ); ?>
         </p>
          
        </div>
        <div id="lpp_benefit_2">
          <h2 class="lpp_h">
            <?php echo  get_post_meta( $post->ID , 'lpp_benefit_2_content_title' , true ); ?>

          </h2>
          <p class="lpp_p" id="benefit_text">
            <?php echo  get_post_meta( $post->ID , 'lpp_benefit_2_content' , true ); ?>
          </p>
        </div>

      </div>
      <div id="lpp_f_line">

      </div>

    </div>
  </body>
  
</html>
