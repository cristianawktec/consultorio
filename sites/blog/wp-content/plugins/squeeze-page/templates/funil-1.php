<?php
require_once(plugin_dir_path(__FILE__) . '../inc/teste-ab/teste-ab-site.php');
require_once(plugin_dir_path(__FILE__) . '../salva-cookie.php');

$squeeze = SqueezeWP::get_instance();
$locale = $squeeze->get_locale();

$theme_path = plugins_url('..', __FILE__);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <?php
		if (have_posts())
            the_post();

        $id = get_the_ID();
        $descricao = get_post_meta($id, 'descricao', true);
        require_once(plugin_dir_path(__FILE__) . '../inc/facebook.php');
    	//proteção de recompensa
        $url_confirmacao = get_post_meta($id, 'protecao', true);
		$url_redirecionamento = get_post_meta($id, 'url_redirecionamento', true);
		if (isset($_GET['hash'])){
            if ($url_confirmacao <> '' && md5($id) <> $_GET['hash'])
    		    require_once(plugin_dir_path(__FILE__) . '../le-cookie.php');
    		else{
    			$id_protecao = explode('|', $url_confirmacao);
            	$id_protecao = $id_protecao[0];
    			setcookie($id_protecao, 'true', time() + 17280000000, "/");
    			echo '<META http-equiv="refresh" content="0;URL=' . get_permalink($id) . '?video=' . $_GET['video'] .'">';
    		}
        }
		if(isset($_COOKIE[@$id_protecao]) || @$id_protecao == 0 || md5($id) == $_GET['hash']){
		?>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php the_title(); ?></title>
        <!-- Bootstrap -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <link href="<?php echo $theme_path; ?>/bootstrap/css/bootstrap.css" rel="stylesheet">
        <link href="<?php echo $theme_path; ?>/style-sp.css" rel="stylesheet">
        <link href="<?php echo $theme_path; ?>/css/animate.min.css" rel="stylesheet">
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <?php require_once(plugin_dir_path(__FILE__) . '../inc/fontes.php'); ?>       
        <?php require_once(plugin_dir_path(__FILE__) . '../inc/animate.php'); ?>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <?php require_once(plugin_dir_path(__FILE__) . '../inc/css.php'); ?>
    </head>
    <body class="funil-1">
        <?php
        

        

        $back = get_post_meta($id, 'background', true);
        $back = wp_get_attachment_image_src($back, 'full');
        $back = $back[0];

        $logo = get_post_meta($id, 'logo', true);
        $logo = wp_get_attachment_image_src($logo, 'full');
        $logo = $logo[0];

        $image1 = $squeeze->get_image(get_post_meta($id, 'imagem_video_1', true));
        $image2 = $squeeze->get_image(get_post_meta($id, 'imagem_video_2', true));
        $image3 = $squeeze->get_image(get_post_meta($id, 'imagem_video_3', true));
        $image4 = $squeeze->get_image(get_post_meta($id, 'imagem_video_4', true));

        $titulo1 = get_post_meta($id, 'titulo_video_1', true);
        $titulo2 = get_post_meta($id, 'titulo_video_2', true);
        $titulo3 = get_post_meta($id, 'titulo_video_3', true);
        $titulo4 = get_post_meta($id, 'titulo_video_4', true);

        $embed1 = get_post_meta($id, 'embed_video_1', true);
        $embed2 = get_post_meta($id, 'embed_video_2', true);
        $embed3 = get_post_meta($id, 'embed_video_3', true);
        $embed4 = get_post_meta($id, 'embed_video_4', true);

        $data1 = get_post_meta($id, 'data_video_1', true);
        $data2 = get_post_meta($id, 'data_video_2', true);
        $data3 = get_post_meta($id, 'data_video_3', true);
        $data4 = get_post_meta($id, 'data_video_4', true);

        $botao = get_post_meta($id, 'texto_cta_4', true);
        $cor_botao = get_post_meta($id, 'cor_cta_4', true);
        $tempo = get_post_meta($id, 'tempo_botao_4', true);
        $link = get_post_meta($id, 'cta_video_4', true);

        $format = 'd/m/Y H:i';

        $data1  = DateTime::createFromFormat($format, $data1);
        $data2  = DateTime::createFromFormat($format, $data2);
        $data3  = DateTime::createFromFormat($format, $data3);
        $data4  = DateTime::createFromFormat($format, $data4);

        $now   = new DateTime;

        $interval2 = date_diff($data2, $now);
        $interval3 = date_diff($data3, $now);
        $interval4 = date_diff($data4, $now);

        $url_comentarios = get_post_meta($id, 'url_comentarios', true);


        $video = $embed1;
        if ($interval2->invert == 0){
        	$video = $embed2;
        }
        if ($interval3->invert == 0){
        	$video = $embed3;
        }
        if ($interval4->invert == 0){
        	$video = $embed4;
            $cta = '<div class="row">
                        <div class="' . squeezewp_get_animacao("animated zoomIn", false) . ' col-md-6 col-md-offset-3" id="botao-compra">
                            <a href="' . $link .'" class="btn ' . $squeeze->get_classbotao($cor_botao) .'">' . $botao . '</a>
                        </div>
                    </div>';
        }

        if (isset($_GET['video'])){
        	if ($_GET['video'] == '1')
        		$video = $embed1;
        	elseif($_GET['video'] == '2')
        		$video = $embed2;
        	elseif($_GET['video'] == '3')
        		$video = $embed3;
        	elseif($_GET['video'] == '4')
        		$video = $embed4;
                $cta = '<div class="row">
                        <div class="' . squeezewp_get_animacao("animated zoomIn", false) . ' col-md-6 col-md-offset-3" id="botao-compra">
                            <a href="' . $link .'" class="btn ' . $squeeze->get_classbotao($cor_botao) .'">' . $botao . '</a>
                        </div>
                    </div>';
        }

        $headline = get_post_meta($id, 'headline', true);
        $posicao = get_post_meta($id, 'posicao_form', true);


        
        // Configurações de cor e transparência
        $cor_box = get_post_meta($id, 'cor_box', true);
        if ($cor_box == '')
            $cor_box = '#000000';
        $trans_box = get_post_meta($id, 'trans_box', true);
        if($trans_box == '')
            $trans_box = 80;
        $trans_box = $trans_box / 100;
        $rgb = $squeeze->hex2rgb($cor_box);
        $rgba = 'rgba(' . $rgb[0] . ',' . $rgb[1] . ',' . $rgb[2] . ',' . $trans_box . ')';

        require_once(plugin_dir_path(__FILE__) . '../inc/form.php');
        ?>
        <style>
            .funil-1{
                <?php if ($back <> null) { ?>
                    background-image: url(<?php echo $back; ?>);
                <?php } ?>
            }
        </style>
        <style>
            #botao-compra{
                animation-duration: 2s;
                animation-delay: <?php echo $tempo; ?>s;
                animation-iteration-count: 1;
                -webkit-animation-duration: 2s;
                -webkit-animation-delay: <?php echo $tempo; ?>s;
                -webkit-animation-iteration-count: 1;
                -moz-animation-duration: 2s;
                -moz-animation-delay: <?php echo $tempo; ?>s;
                -moz-animation-iteration-count: 1;
            }
        </style>
        <div class="navigation">
        	<div class="container">
        		<div class="row">
        			<div class="col-md-4">
        				<img src="<?php echo $logo; ?>" />
        			</div>
            		<div class="col-md-8">
            			<div class="col-md-3 nav">
            				<a href="?video=1"><img src="<?php echo $image1; ?>" />
            				<h2><?php echo $titulo1;?></h2></a>
            			</div>
            			<div class="col-md-3 nav <?php if ($interval2->invert == 1) echo 'em-breve'; ?>">
            				<?php if ($interval2->invert == 0){ ?><a href="?video=2"><?php } ?><?php if($titulo3 <> ''){  ?><img src="<?php echo $image2; ?>" /><?php } ?>
            				<h2><?php if ($interval2->invert == 0) echo $titulo2; elseif($titulo2 <> '') echo 'EM BREVE';?></h2><?php if ($interval2->invert == 0){ ?></a><?php } ?>
            			</div>
            			<div class="col-md-3 nav <?php if ($interval3->invert == 1) echo 'em-breve'; ?>">
            				<?php if ($interval3->invert == 0){ ?><a href="?video=3"><?php } ?><?php if($titulo3 <> ''){  ?><img src="<?php echo $image3; ?>" /> <?php } ?>
            				<h2><?php if ($interval3->invert == 0) echo $titulo3; elseif($titulo3 <> '') echo 'EM BREVE';?></h2><?php if ($interval3->invert == 0){ ?></a><?php } ?>
            			</div>
            			<div class="col-md-3 nav <?php if ($interval4->invert == 1) echo 'em-breve'; ?>">
            				<?php if ($interval3->invert == 0){ ?><a href="?video=4"><?php } ?><?php if($titulo4 <> ''){  ?><img src="<?php echo $image4; ?>" /> <?php } ?>
            				<h2><?php if ($interval4->invert == 0) echo $titulo4; elseif($titulo4 <> '') echo 'EM BREVE';?></h2><?php if ($interval4->invert == 0){ ?></a><?php } ?>
            			</div>
            		</div>
            	</div>
            </div>
        </div>
        <div class="">
            <div class="container">
                <div class="row">
                	<div class="col-md-10 col-md-offset-1 video">
                		<?php echo $video; ?>
                	</div>
                    <?php echo $cta; ?>
                	<div class="clearfix"></div>
				<?php require_once(plugin_dir_path(__FILE__) . '../inc/redes-sociais.php'); ?>
				<div class="div-comentarios">
					<h2 class="titulo-comentarios">Deixe seu comentário...</h2>
                	<div class="col-md-3 col-md-offset-8" id="div-atualizar-comentarios"><button class="btn btn-primary" id="atualizar-comentarios"> Atualizar Comentários <i class="fa fa-refresh"></i></button></div>
                	<div class="fb-comments" data-href="<?php echo $url_comentarios; ?>" data-width="750" data-numposts="5" data-colorscheme="light"></div>
                </div>
            </div>
            <script>
            jQuery('#atualizar-comentarios').click(function() {
                FB.XFBML.parse();
            });
        
        </script>

        <?php require_once(plugin_dir_path(__FILE__) . '../inc/powered.php'); ?>
        <?php require_once(plugin_dir_path(__FILE__) . '../inc/scripts.php'); ?>

        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="<?php echo $theme_path; ?>/bootstrap/js/bootstrap.min.js"></script>
        <?php require_once(plugin_dir_path(__FILE__) . '../inc/exit.php'); ?>
    </body>
    <?php } ?>
</html>
