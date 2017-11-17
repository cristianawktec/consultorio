<?php
require_once('../config/conexao.php');
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Template1 ClickConsultório</title>
<link rel="stylesheet" type="text/css" href="style.css" media="screen" />
<!--[if IE 6]>
<link rel="stylesheet" type="text/css" href="iecss.css" />
<![endif]-->
<style>.horarioAgenda{ cursor: pointer;}</style>
</head>

<body>
<div id="main_container">
	<div class="header">
    	<div id="logo">
            <a href="www.clickconsultorio.com">
              <img src="images/medico_default.jpg" alt="" title="" width="80" height="100" border="0" />
            </a>
        </div>

    	<div class="right_header">

            <div class="top_menu">
            <a href="http://www.clickconsultorio.com/login" class="login">Login</a>
            <a href="#" class="sign_up">Sair</a>
            </div>

            <div id="menu">
                <ul>
                    <li><a class="current" href="#" title="">Home</a></li>
                    <li><a href="http://www.clickconsultorio.com/consulta/marcar?agenda=4&doctor=61" title="">MarcarConsulta</a></li>
                </ul>
            </div>

        </div>

    </div>


    <div id="middle_box">
    	<div class="middle_box_content"><img src="images/banner_content.jpg" alt="" title="" /></div>
    </div>


    <div class="pattern_bg">

    	<div class="pattern_box">
            <div class="pattern_box_icon"><img src="images/icon1.png" alt="" title="" width="70" height="112" /></div>
            <div class="pattern_content">
            <h1>Minha <span class="blue">Especialidade</span></h1>
            <p class="pat">
               Minha descrição sobre minha especialidade, o que atendo e faço.
            </p>
            </div>
        </div>


    	<div class="pattern_box">
            <div class="pattern_box_icon"><img src="images/icon2.png" alt="" title="" width="70" height="112" /></div>
            <div class="pattern_content">
            <h1>Procure por <span class="blue"> Tratamentos</span></h1>
            <p class="pat">
               Ofereço os seguintes tratamentos: Lorem ipsum dolor sit amet. Marque sua Consulta!
            </p>
            </div>
        </div>


    </div>

    <div id="main_content">

 			<div class="box_content">
					<div class="box_title">
                    	<div class="title_icon"><img src="images/mini_icon1.gif" alt="" title="" /></div>
                        <h2>Minha  <span class="dark_blue">Agenda</span></h2>
                    </div>

                    <div class="box_text_content">
                    	<img src="images/calendar.gif" alt="" title="" class="box_icon" />
                        <div class="box_text">
													<?php
													$agenda = mysql_query("select * from agenda WHERE id_medico = 61");
													while($age = mysql_fetch_array($agenda)){
													?>
													<div class="col-md-2 horarioAgenda" onclick="markConsult('<?php echo $age['id_agenda'] ?>','<?php echo $age['id_medico'] ?>')"><?php echo $age['horario']; ?></div>
													<?php } ?>
                        </div>
                        <a href="#" class="details">+ details</a>
                    </div>

            </div>

            <!--
 			<div class="box_content">
					<div class="box_title">
                    	<div class="title_icon"><img src="images/mini_icon2.gif" alt="" title="" /></div>
                        <h2>My <span class="dark_blue"> Goals</span></h2>
                    </div>

                    <div class="box_text_content">
                    	<img src="images/checked.gif" alt="" title="" class="box_icon" />
                        <div class="box_text">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        </div>
                        <a href="#" class="details">+ details</a>
                    </div>

                    <div class="box_text_content">
                    	<img src="images/checked.gif" alt="" title="" class="box_icon" />
                        <div class="box_text">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        </div>
                        <a href="#" class="details">+ details</a>
                    </div>

            </div>


  			<div class="box_content">
					<div class="box_title">
                    	<div class="title_icon"><img src="images/mini_icon3.gif" alt="" title="" /></div>
                        <h2>My <span class="dark_blue">Sleep</span></h2>
                    </div>

                    <div class="box_text_content">
                    	<img src="images/checked.gif" alt="" title="" class="box_icon" />
                        <div class="box_text">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        </div>
                        <a href="#" class="details">+ details</a>
                    </div>

                    <div class="box_text_content">
                    	<img src="images/checked.gif" alt="" title="" class="box_icon" />
                        <div class="box_text">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        </div>
                        <a href="#" class="details">+ details</a>
                    </div>

            </div>

            -->










        <div class="clear"></div>
       </div>


     <div id="footer">
     	<div class="copyright">
            <a href="http://clickconsultorio.com">
                <img src="images/logo_trans.png" alt="" width="80" height="30"  title="ClickConsultório" />
            </a>
        </div>
        <div class="center_footer">&copy; ClickConsultório 2016. All Rights Reserved</div>
    	<div class="footer_links">

        </div>


    </div>


</div>
<script>
    function markConsult(id_agenda, id_medico){
        window.location.href = "<?php echo "http://clickconsultorio.com/"; ?>consulta/marcar?agenda="+id_agenda+"&doctor="+id_medico;
    }
</script>
</body>
</html>
