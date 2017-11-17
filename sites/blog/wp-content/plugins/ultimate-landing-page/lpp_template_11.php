<?php include 'lpp_counter.php'; ?>
<html>
	<head>



		<title><?php echo the_title(); ?></title>

		<!-- -------------------- Landing Page SEO  -------------------- -->
		<meta property="og:title" content="<?php echo get_post_meta($post->ID,'lpp_seo_title',true); ?>">

		<meta property="og:url" content="<?php $url = site_url(); echo $url; ?>">
		
		<meta property="og:description" name="description" content='<?php echo get_post_meta($post->ID,'lpp_seo_meta_description',true); ?>'>

		<meta name="keywords" content="<?php echo get_post_meta($post->ID,'lpp_seo_keywords',true); ?>">


				<script type="text/javascript">

							<?php echo get_post_meta($post->ID,'lpp_custom_js',true); ?>

				</script>


		<style>

		<?php echo get_post_meta($post->ID,'lpp_custom_styling',true); ?>

		</style>

<?php
$lpp_head = get_post_meta($post->ID,'lpp_load_wphead',true);
$lpp_footer = get_post_meta($post->ID,'lpp_load_wpfooter',true);
if ($lpp_head === 'yes') { wp_head(); }
?>


	</head>
	<body>
		<?php echo do_shortcode(get_post_meta($post->ID,'lpp_new_empty_template',true)); ?>
	
	</body>

<?php
if ($lpp_footer === 'yes') { wp_footer(); }
?>
</html>