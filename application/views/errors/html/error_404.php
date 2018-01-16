<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$server =  $_SERVER['SERVER_NAME'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="shortcut icon" href="../../../../sites/beagle/dist/html/img/logo-fav.png">
	<title>error404</title>
	<link rel="stylesheet" type="text/css" href="../../../../sites/beagle/dist/html/lib/perfect-scrollbar/css/perfect-scrollbar.min.css"/>
	<link rel="stylesheet" type="text/css" href="../../../../sites/beagle/dist/html/lib/material-design-icons/css/material-design-iconic-font.min.css"/><!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	<link rel="stylesheet" href="../../../../sites/beagle/dist/html/assets/css/style.css" type="text/css"/>
</head>
<body class="be-splash-screen">
<div class="be-wrapper be-error be-error-404">
	<div class="be-content">
		<div class="main-content container-fluid">
			<div class="error-container">
				<div class="error-number">404</div>
				<div class="error-description">A página que você está procurando pode ter sido removida.</div>
				<div class="error-goback-text">Gostaria de ir para Home?</div>
				<div class="error-goback-button"><a href="http://<?=$server;?>/" class="btn btn-xl btn-primary">Vamos para home</a></div>
				<div class="footer">&copy; 2016 Awk Consultoria</div>
			</div>
		</div>
	</div>
</div>
<script src="../../../../sites/beagle/dist/html/lib/jquery/jquery.min.js" type="text/javascript"></script>
<script src="../../../../sites/beagle/dist/html/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
<script src="../../../../sites/beagle/dist/html/js/main.js" type="text/javascript"></script>
<script src="../../../../sites/beagle/dist/html/lib/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
<script type="text/javascript">
	$(document).ready(function(){
		//initialize the javascript
		App.init();
	});

</script>
</body>
</html>