<?php
/*
 * A Design by W3layouts
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
 *
 */
include "app/config.php";
include "app/detect.php";
include "layout_principal/top.php";

if ($page_name=='') {
	include $browser_t.'/index.php';
	}
elseif ($page_name=='index.php') {
	include $browser_t.'/index.php';
	}
elseif ($page_name=='about.html') {
	include $browser_t.'/about.html';
	}
elseif ($page_name=='services.html') {
	include $browser_t.'/services.html';
	}
elseif ($page_name=='single.html') {
	include $browser_t.'/single.html';
	}
elseif ($page_name=='careers.html') {
	include $browser_t.'/careers.html';
	}
elseif ($page_name=='contact.html') {
	include $browser_t.'/contact.html';
	}
elseif ($page_name=='contact-post.html') {
	include 'app/contact.php';
	}
else
	{
		include $browser_t.'/404.html';
	}

?>
