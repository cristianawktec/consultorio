<!DOCTYPE html>
<!-- saved from url=(0062)http://conceptbeans.co.uk/medipro/v2/demos/html/homepage3.html -->
<html class=" js flexbox flexboxlegacy canvas canvastext webgl no-touch geolocation postmessage websqldatabase indexeddb hashchange history draganddrop websockets rgba hsla multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients cssreflections csstransforms csstransforms3d csstransitions fontface generatedcontent video audio localstorage sessionstorage webworkers applicationcache svg inlinesvg smil svgclippaths">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<!-- Page Title -->
    <title>ClickConsultorio  - Consultório Online</title>
    <link rel="shortcut icon" href="files/favicon.png">

    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta name="keywords" content="Lotar agenda Médica">
    <meta name="description" content="Página de Lançamento ClickConsultorio">
    <meta name="format-detection" content="telephone=no">
    <meta name="author" content="1stone">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Google Analytics -->
  <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-79289611-1', 'auto');
    ga('send', 'pageview');

  </script>
  <!-- end analytics-->

    <!-- Theme Styles -->
    <link href="files/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="files/animations.css" rel="stylesheet" type="text/css">

    <!-- Main Style -->
    <link href="files/style.less" rel="stylesheet" type="text/less">
  <style type="text/css" id="less:medipro-v2-demos-html-less-style">@import url(http://fonts.googleapis.com/css?family=Lato:400,100,100italic,300,400italic,700,700italic);
@import url(http://fonts.googleapis.com/css?family=Titillium+Web:400,200,200italic,300,300italic,400italic,600,600italic,700,700italic);


 /*
 * Title:   ClickConsultorio  - Consultório Online
 * Author:  http://www.awktec.com
 */
/* GOOGLE FONTS */
/* END OF GOOGLE FONTS */
/* VARIALBLES */
/* VARIALBLES */
/* BASIC STYLE */
body {
  font-family: 'Lato', sans-serif;
  font-weight: 400;
  font-size: 18px;
  color: #9f9f9f;
  background: #ffffff;
  overflow: hidden;
}
img {
  border: 0px;
}
a {
  text-decoration: none;
}
* {
  margin: 0px;
  padding: 0px;
  -moz-box-sizing: border-box;
  /* Firefox 1, probably can drop this */
  -webkit-box-sizing: border-box;
  /* Safari 3-4, also probably droppable */
  box-sizing: border-box;
  /* Everything else */
}
ul,
li {
  list-style: none;
}
h1,
h2,
h3,
h4,
h5,
h6 {
  font-weight: 400;
  margin: 0;
  font-family: 'Titillium Web', sans-serif;
  font-weight: bold;
}
h1,
h2 {
  font-size: 54px;
  color: #0267b9;
  padding-bottom: 74px;
  line-height: 56px;
  text-transform: uppercase;
}
p {
  line-height: 27px;
}
input,
textarea,
select {
  border: 0px none;
  background: none;
  font-family: 'Lato', sans-serif;
  outline: none;
}
/* END Of BASIC STYLE */
/* BUTTON */
.btn {
  color: #ffffff;
  font-size: 26px;
  background: #dc3522;
  text-align: center;
  text-transform: uppercase;
  font-family: 'Lato', sans-serif;
  font-weight: bold;
  line-height: 48px;
  height: 60px;
}
.btn-round {
  border-radius: 6px;
  -webkit-border-radius: 6px;
  -moz-border-radius: 6px;
  -o-border-radius: 6px;
  -ms-border-radius: 6px;
}
/* END OF BUTTON */
/*TOOLTIP STYLE*/
.tooltip-inner {
  background-color: #003DFF;
}
.tooltip.top .tooltip-arrow {
  border-top-color: #003DFF;
}
/* END OF TOOLTIP STYLE */
/* HEADER */
header {
  position: relative;
  z-index: 8;
}
.header-wrapper {
  width: 100%;
  position: relative;
  overflow: hidden;
}
.banner-outer {
  width: 100%;
  height: 600px;
  background-color: #0775cb;
}
.banner-outer .banner-img {
  position: relative;
  left: 50%;
  margin-left: -1000px;
}
.header-content {
  position: absolute;
  top: 0;
  left: 0px;
  height: 100%;
  width: 100%;
  padding-top: 27px;
}
.header-top-outer {
  width: 100%;
  padding-bottom: 45px;
}
.header-top-outer .logo {
  width: 142px;
  float: left;
  visibility: hidden;
}
.header-top-outer .logo a {
  width: 142px;
  height: 28px;
  display: block;
}
.header-top-outer .call {
  color: #ffffff;
  width: 160px;
  height: 20px;
  float: right;
  background-position: left center;
  background-repeat: no-repeat;
  background-image: url(http://conceptbeans.co.uk/medipro/v2/demos/html/images/phoneicon.png);
  font-weight: 400;
  line-height: 20px;
  padding-left: 30px;
  text-align: right;
  visibility: hidden;
}
.header-bottom-outer {
  width: 100%;
  height: 500px;
}
.banner-text {
  width: 100%;
  margin-top: 127px;
  min-height: 200px;
}
.banner-text h1 {
  color: #ffffff;
  padding-bottom: 12px;
  position: relative;
  visibility: hidden;
  text-align: center;
}
.banner-text h1:first-child {
  padding-bottom: 0px;
}
.banner-text p {
  color: #ffffff;
  width: 88%;
  position: relative;
  visibility: hidden;
}
/* HEADER FORM */
.banner-form {
  width: 100%;
  height: 500px;
  padding-top: 120px;
  background-color: #f2f9fc;
  padding: 20px 12px 0px;
  visibility: hidden;
}
.banner-form span {
  display: block;
  color: #696969;
  font-weight: 400;
  text-align: center;
  padding-bottom: 10px;
}
.banner-form h2 {
  text-align: center;
  font-size: 48px;
  color: #dc3522;
  font-weight: bold;
  text-transform: uppercase;
  padding-bottom: 13px;
}
.banner-form form fieldset {
  margin-bottom: 20px;
  background-color: #ffffff;
  border-top: 1px solid #edf0f1;
  height: 50px;
  position: relative;
  padding: 13px !important;
}
.banner-form form fieldset:nth-last-child(2) {
  padding: 0px;
}
.banner-form form fieldset label {
  position: absolute;
  top: 9px;
  left: 22px;
  display: inline-block;
  font-size: 14px;
  color: #696969;
  font-weight: 400;
  z-index: 0;
}
.banner-form form fieldset input[type="text"],
.banner-form form fieldset input[type="password"] {
  width: 100%;
  height: 20px;
  line-height: 20px;
  font-size: 15px;
  color: #9f9f9f;
  font-weight: 400;
  /* padding: 30px 22px 10px; */
  z-index: 1;
  position: relative;
}
.banner-form form fieldset input[type="text"]::-webkit-input-placeholder,
.banner-form form fieldset input[type="password"]::-webkit-input-placeholder {
  color: #9f9f9f;
  opacity: 1 !important;
}
.banner-form form fieldset input[type="text"]:-moz-placeholder,
.banner-form form fieldset input[type="password"]:-moz-placeholder {
  color: #9f9f9f;
  opacity: 1 !important;
}
.banner-form form fieldset input[type="text"]::-moz-placeholder,
.banner-form form fieldset input[type="password"]::-moz-placeholder {
  color: #9f9f9f;
  opacity: 1 !important;
}
.banner-form form fieldset input[type="text"]:-ms-input-placeholder,
.banner-form form fieldset input[type="password"]:-ms-input-placeholder {
  color: #9f9f9f;
  opacity: 1 !important;
}
.banner-form form fieldset span.hidden-overflow {
  overflow: hidden;
  width: 100%;
  height: 59px;
  background-position: right center;
  background-repeat: no-repeat;
  background-image: url(http://conceptbeans.co.uk/medipro/v2/demos/html/images/select-bg.png);
}
.banner-form form fieldset select {
  width: 105%;
  height: 59px;
  font-size: 15px;
  color: #696969;
  font-weight: 400;
  padding: 15px 20px;
  line-height: 39px;
  position: relative;
}
.banner-form form fieldset select option {
  padding: 5px 22px;
}
.banner-form input[type="submit"] {
  width: 100%;
}
/* END OF HEADER FORM */
/* END OF HEADER */
/* CONTENT */
section {
  padding: 18px 22px 80px;
  position: relative;
  z-index: 8;
  background-size: cover
;
}
/* PROCEDURE SECTION */
#procedure-section {
  overflow: hidden;
  background: #ffffff;
}
.procedure {
  display: table;
}
.procedure-box {
  position: relative;
  display: table-cell;
  vertical-align: top;
  float: none;
}
.procedure-box span {
  width: 200px;
  height: 200px;
  display: block;
  margin: 0 auto;
  background-color: #eceaea;
  border-radius: 50%;
  -webkit-border-radius: 50%;
  -moz-border-radius: 50%;
  -o-border-radius: 50%;
  -ms-border-radius: 50%;
  margin-bottom: 30px;
}
.procedure-box h3 {
  color: #696969;
}
/* END OF PROCEDURE SECTION */
/* WATCH VIDEO SECTION */
#watch-video-section {
  background-color: #dcedf1;
  overflow: hidden;
  position: relative;
}
.watch-video-text {
  width: 100%;
}
.watch-video-text h3 {
  color: #696969;
  font-size: 26px;
  font-weight: 600;
  padding-bottom: 24px;
  line-height: 36px;
  position: relative;
  margin-top: -44px;
}
.watch-video-text p {
  padding-bottom: 34px;
}
.watch-video-text a.btn {
  width: 80%;
  margin-bottom: 40px;
}
.video-container {
  width: 100%;
  height: 300px;
}
.video-container iframe {
  width: 100%;
  height: 100%;
  border: 0px;
}
/* END OF WATCH VIDEO SECTION */
/* TEAM SECTION */
#team-section {
  background-color: #f5f5f5;
  padding-bottom: 40px;
  overflow: hidden;
}
.team-box {
  background-color: #ffffff;
  padding-bottom: 19px;
  margin-bottom: 40px;
}
.team-box .team-img {
  position: relative;
  margin-bottom: 16px;
}
.team-box .team-img span {
  display: block;
}
.team-box .team-img .team-img-overlay {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(2, 103, 185, 0.4);
  -webkit-transition: all 0.3s ease-in-out;
  -moz-transition: all 0.3s ease-in-out;
  -o-transition: all 0.3s ease-in-out;
  transition: all 0.3s ease-in-out;
}
.team-box .team-img:hover .team-img-overlay {
  height: 0;
}
.team-box .team-text {
  padding: 0px 24px;
}
.team-box .team-text h4 {
  font-size: 22px;
  padding-bottom: 2px;
  margin-bottom: 7px;
  border-bottom: 1px solid #eceeee;
  display: inline-block;
  font-weight: 600;
}
.team-box .team-text span {
  display: block;
  font-style: italic;
  font-weight: 400;
  color: #dc3522;
}
/* END OF TEAM SECTION */
/* NEWSLETTER SECTION */
#newsletter-section {
  background-position: top center;
  background-repeat: no-repeat;
  background-image: url(http://conceptbeans.co.uk/medipro/v2/demos/html/images/newsletter.jpg);
  overflow: hidden;
  height: 300px;
}
#newsletter-section h2 {
  padding-bottom: 34px;
  color: #ffffff;
}
#newsletter-section .newsletter-field {
  width: 100%;
  height: 60px;
  position: relative;
  border: 2px solid #5ba8e9;
  background-color: rgba(0, 0, 0, 0.2);
}
#newsletter-section .newsletter-field input {
  width: 100%;
  height: 56px;
  padding: 18px 20px 18px 90px;
  line-height: 20px;
  font-weight: 400;
  color: #ffffff;
  font-size: 15px;
  z-index: 1;
  position: relative;
}
#newsletter-section .newsletter-field input::-webkit-input-placeholder {
  color: #ffffff;
  opacity: 1 !important;
}
#newsletter-section .newsletter-field input:-moz-placeholder {
  color: #ffffff;
  opacity: 1 !important;
}
#newsletter-section .newsletter-field input::-moz-placeholder {
  color: #ffffff;
  opacity: 1 !important;
}
#newsletter-section .newsletter-field input:-ms-input-placeholder {
  color: #ffffff;
  opacity: 1 !important;
}
#newsletter-section .newsletter-field label {
  position: absolute;
  top: 13px;
  left: 20px;
  z-index: 0;
  display: block;
  width: 51px;
  height: 30px;
  background-repeat: no-repeat;
  background-image: url(http://conceptbeans.co.uk/medipro/v2/demos/html/images/paperplane.png);
}
#newsletter-section .btn {
  width: 100%;
  background-color: #00ceac;
}
.newsletter-bg2#newsletter-section {
  background-image: url(http://conceptbeans.co.uk/medipro/v2/demos/html/images/newsletter2.jpg);
}
/* END OF NEWSLETTER SECTION */
/* TESTIMONIAL SECTION */
#testimoial-section {
  overflow: hidden;
  background: #ffffff;
}
.patient-img {
  width: 120px;
  height: 120px;
  position: relative;
}
.patient-img span {
  width: 120px;
  height: 120px;
  display: block;
  border: 5px solid #fff;
  border-radius: 50%;
  -webkit-border-radius: 50%;
  -moz-border-radius: 50%;
  -o-border-radius: 50%;
  -ms-border-radius: 50%;
  -webkit-box-shadow: 0px 0px 6px 1px rgba(0, 0, 0, 0.6);
  -moz-box-shadow: 0px 0px 6px 1px rgba(0, 0, 0, 0.6);
  box-shadow: 0px 0px 6px 1px rgba(0, 0, 0, 0.6);
  margin-bottom: 30px;
  overflow: hidden;
  position: relative;
}
.patient-img:after {
  content: '';
  position: absolute;
  right: -90px;
  top: 37px;
  width: 54px;
  height: 45px;
  background-repeat: no-repeat;
  background-image: url(http://conceptbeans.co.uk/medipro/v2/demos/html/images/patient-coma.png);
}
.testimoial-style1 .patient-text-animation {
  font-weight: 400;
}
.patient-text {
  position: relative;
  padding-top: 16px;
  margin-top: 16px;
  color: #bcbcbc;
}
.patient-text:after {
  content: '';
  position: absolute;
  left: 0px;
  top: 0px;
  width: 200px;
  height: 1px;
  background: #dadede;
}
.patient-text span {
  color: #696969;
  display: block;
}
/* END OF TESTIMONIAL SECTION */
.separator-section.separator-style1 {
  display: block;
  float: left;
  height: 440px;
}
/* OPENING HOUR SECTION */
.opening-hour-bg2#opening-hour-section {
  background-image: url(http://placehold.it/2000x341);
}
#opening-hour-section {
  background-position: top center;
  background-repeat: no-repeat;
  background-image: url(http://conceptbeans.co.uk/medipro/v2/demos/html/images/openinghour.jpg);
  height: 341px;
  overflow: hidden;
  width: 100%;
  bottom: 100px;
  left: 0;
  position: fixed;
  z-index: 0;
}
#opening-hour-section label {
  display: block;
  font-size: 26px;
  color: #9b9b9b;
  font-weight: 400;
  font-family: 'Titillium Web', sans-serif;
}
#opening-hour-section h2 {
  padding-bottom: 34px;
  color: #ffffff;
  text-transform: none;
}
#opening-hour-section .calling-number p {
  font-family: 'Titillium Web', sans-serif;
  line-height: 60px;
  font-weight: 400;
  color: #ffffff;
  font-size: 26px;
}
#opening-hour-section .calling-number span {
  color: #dc3522;
}
#opening-hour-section .btn {
  width: 100%;
}
.opening-hour-bg2#opening-hour-section {
  background-image: url(http://conceptbeans.co.uk/medipro/v2/demos/html/images/openinghour2.jpg);
}
.opening-hour-bg3#opening-hour-section {
  background-image: url(http://conceptbeans.co.uk/medipro/v2/demos/html/images/openinghour3.jpg);
}
/* END OF OPENING HOUR SECTION */
/* END OF CONTENT */
/* FOOTER */
.footer-style1 {
  background-color: #030b10;
  padding: 40px 0px;
  width: 100%;
  bottom: 0;
  left: 0;
  min-height: 100px;
  position: fixed;
  z-index: 0;
}
.footer-style1 p {
  color: #c2c2c2;
  font-weight: 400;
  font-size: 14px;
  line-height: 20px;
}
.footer-style1 p a {
  color: #c2c2c2;
}
.footer-style1 .socials {
  float: right;
}
.footer-style1 .socials a {
  display: block;
  float: left;
  height: 20px;
  margin: 0 12px;
  background-repeat: no-repeat;
  background-position: center center;
  /* IE 8 */
  -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=70)";
  /* IE 5-7 */
  filter: alpha(opacity=70);
  /* Netscape */
  -moz-opacity: 0.7;
  /* Safari 1.x */
  -khtml-opacity: 0.7;
  /* Good browsers */
  opacity: 0.7;
  -webkit-transition: all .25s;
  -moz-transition: all .25s;
  -ms-transition: all .25s;
  -o-transition: all .25s;
  transition: all .25s;
}
.footer-style1 .socials a:first-child {
  background-image: url(http://conceptbeans.co.uk/medipro/v2/demos/html/images/homeiconhover.png);
  width: 10px;
}
.footer-style1 .socials a:nth-child(2) {
  background-image: url(http://conceptbeans.co.uk/medipro/v2/demos/html/images/facebookiconhover.png);
  width: 25px;
}
.footer-style1 .socials a:nth-child(3) {
  background-image: url(http://conceptbeans.co.uk/medipro/v2/demos/html/images/rss-squareiconhover.png);
  width: 19px;
}
.footer-style1 .socials a:last-child {
  background-image: url(http://conceptbeans.co.uk/medipro/v2/demos/html/images/skypeiconhover.png);
  width: 23px;
  margin-right: 0px;
}
.footer-style1 .socials a:hover {
  /* IE 8 */
  -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)";
  /* IE 5-7 */
  filter: alpha(opacity=100);
  /* Netscape */
  -moz-opacity: 1;
  /* Safari 1.x */
  -khtml-opacity: 1;
  /* Good browsers */
  opacity: 1;
}
/* END OF FOOTER */
/* HOME PAGE STYLES */
/* HOME PAGE 2 STYLES */
.watch-video-style2#watch-video-section {
  background-color: #0775cb;
}
.watch-video-style2#watch-video-section h2 {
  color: #fff;
}
.watch-video-style2 .watch-video-text h3 {
  color: #fff;
}
.watch-video-style2 .watch-video-text p {
  color: #fff;
}
/* HOME PAGE STYLE 2 */
/* HEADER STYLE 2 */
.header2 .header-wrapper {
  width: 100%;
  height: 100%;
  position: relative;
  overflow: hidden;
}
.header2 .banner-outer {
  width: 100%;
  height: 100%;
}
.header2 .banner-outer .banner-img {
  position: static;
  left: 0%;
  margin-left: 0px;
}
.header2 .header-content {
  position: absolute;
  top: 0;
  left: 0px;
  height: 100%;
  width: 100%;
  padding-top: 27px;
  padding-bottom: 104px;
}
.header2 .header-bottom-outer {
  width: 100%;
  height: 500px;
}
.header2 .middle {
  position: relative;
  top: 50%;
  -webkit-transform: translateY(-50%);
  -ms-transform: translateY(-50%);
  transform: translateY(-50%);
}
.header2 .banner-text {
  margin-top: 0px;
}
.header2 .banner-text h1 {
  color: #ffffff;
  padding-bottom: 9px;
  position: relative;
}
.header2 .banner-text h1:first-child {
  padding-bottom: 0px;
}
.header2 .banner-text p {
  color: #ffffff;
  width: 52%;
  margin: 0 auto;
  position: relative;
  padding-bottom: 34px;
  font-weight: 300;
}
.header2 .banner-text .btn {
  width: 308px;
  margin: 0 auto 40px;
  position: relative;
  padding-bottom: 34px;
  visibility: hidden;
}
.header2 .banner-text span.arrow {
  width: 22px;
  height: 76px;
  margin: 0 auto;
  visibility: hidden;
  display: block;
  background-position: center center;
  background-repeat: no-repeat;
  background-image: url(http://conceptbeans.co.uk/medipro/v2/demos/html/images/down-arrow.png);
}
.header2 .banner-text span.arrow {
  -webkit-animation: arrowLoop 1.5s infinite;
  -moz-animation: arrowLoop 1.5s infinite;
  -o-animation: arrowLoop 1.5s infinite;
  animation: arrowLoop 1.5s infinite;
}
@-webkit-keyframes arrowLoop {
  0% {
    opacity: 0;
    filter: alpha(opacity=0);
    -khtml-opacity: 0;
    -moz-opacity: 0;
    -webkit-transform: translateY(-20px);
    transform: translateY(-20px);
  }
  50%,
  60%,
  65% {
    opacity: 1;
    filter: alpha(opacity=100);
    -khtml-opacity: 1;
    -moz-opacity: 1;
    -webkit-transform: translateY(0);
    transform: translateY(0);
  }
  100% {
    opacity: 0;
    filter: alpha(opacity=0);
    -khtml-opacity: 0;
    -moz-opacity: 0;
    -webkit-transform: translateY(20px);
    transform: translateY(20px);
  }
}
@-moz-keyframes arrowLoop {
  0% {
    opacity: 0;
    filter: alpha(opacity=0);
    -khtml-opacity: 0;
    -moz-opacity: 0;
    -webkit-transform: translateY(-20px);
    transform: translateY(-20px);
  }
  50%,
  60%,
  65% {
    opacity: 1;
    filter: alpha(opacity=100);
    -khtml-opacity: 1;
    -moz-opacity: 1;
    -webkit-transform: translateY(0);
    transform: translateY(0);
  }
  100% {
    opacity: 0;
    filter: alpha(opacity=0);
    -khtml-opacity: 0;
    -moz-opacity: 0;
    -webkit-transform: translateY(20px);
    transform: translateY(20px);
  }
}
@-o-keyframes arrowLoop {
  0% {
    opacity: 0;
    filter: alpha(opacity=0);
    -khtml-opacity: 0;
    -moz-opacity: 0;
    -webkit-transform: translateY(-20px);
    transform: translateY(-20px);
  }
  50%,
  60%,
  65% {
    opacity: 1;
    filter: alpha(opacity=100);
    -khtml-opacity: 1;
    -moz-opacity: 1;
    -webkit-transform: translateY(0);
    transform: translateY(0);
  }
  100% {
    opacity: 0;
    filter: alpha(opacity=0);
    -khtml-opacity: 0;
    -moz-opacity: 0;
    -webkit-transform: translateY(20px);
    transform: translateY(20px);
  }
}
@keyframes arrowLoop {
  0% {
    opacity: 0;
    filter: alpha(opacity=0);
    -khtml-opacity: 0;
    -moz-opacity: 0;
    -ms-transform: translateY(-20px);
    -webkit-transform: translateY(-20px);
    transform: translateY(-20px);
  }
  50%,
  60%,
  65% {
    opacity: 1;
    filter: alpha(opacity=100);
    -khtml-opacity: 1;
    -moz-opacity: 1;
    -webkit-transform: translateY(0);
    transform: translateY(0);
  }
  100% {
    opacity: 0;
    filter: alpha(opacity=0);
    -khtml-opacity: 0;
    -moz-opacity: 0;
    -webkit-transform: translateY(20px);
    transform: translateY(20px);
  }
}
/* END OF HEADER STYLE 2 */
/* GET APPOINMETN SECTION */
#get-Appointment-section {
  overflow: hidden;
  background: #dcedf1;
}
#get-Appointment-section .banner-form-outer {
  padding: 0 15px 0px;
  background-color: #c6dfe9;
  position: relative;
  margin-top: 30px;
}
#get-Appointment-section .banner-form {
  position: relative;
  top: -15px;
  width: 100%;
  height: auto;
  padding-top: 120px;
  background-color: #f2f9fc;
  padding: 20px;
  visibility: visible;
}
#get-Appointment-section .banner-form span {
  display: block;
  color: #696969;
  font-weight: 400;
  text-align: center;
  padding-bottom: 0px;
}
#get-Appointment-section .banner-form h3 {
  text-align: center;
  font-size: 48px;
  color: #dc3522;
  font-weight: bold;
  text-transform: uppercase;
  padding-bottom: 3px;
}
#get-Appointment-section .banner-form ul li {
  margin-bottom: 20px;
  position: relative;
}
#get-Appointment-section .banner-form ul li input[type="text"],
#get-Appointment-section .banner-form ul li input[type="password"] {
  width: 100%;
  height: 40px;
  font-size: 14px;
  color: #696969;
  font-weight: 400;
  line-height: 18px;
  padding: 10px 14px;
  z-index: 1;
  position: relative;
  background-color: #ffffff;
  border: 1px solid #dcdcdc;
  border-radius: 6px;
}
#get-Appointment-section .banner-form ul li input[type="text"]::-webkit-input-placeholder,
#get-Appointment-section .banner-form ul li input[type="password"]::-webkit-input-placeholder {
  color: #696969;
  opacity: 1 !important;
}
#get-Appointment-section .banner-form ul li input[type="text"]:-moz-placeholder,
#get-Appointment-section .banner-form ul li input[type="password"]:-moz-placeholder {
  color: #696969;
  opacity: 1 !important;
}
#get-Appointment-section .banner-form ul li input[type="text"]::-moz-placeholder,
#get-Appointment-section .banner-form ul li input[type="password"]::-moz-placeholder {
  color: #696969;
  opacity: 1 !important;
}
#get-Appointment-section .banner-form ul li input[type="text"]:-ms-input-placeholder,
#get-Appointment-section .banner-form ul li input[type="password"]:-ms-input-placeholder {
  color: #696969;
  opacity: 1 !important;
}
#get-Appointment-section .banner-form ul li span.hidden-overflow {
  overflow: hidden;
  width: 100%;
  height: 40px;
  border-radius: 6px;
  border: 1px solid #dcdcdc;
  background-color: #ffffff;
  background-position: right center;
  background-repeat: no-repeat;
  background-image: url(http://conceptbeans.co.uk/medipro/v2/demos/html/images/select-bg.png);
}
#get-Appointment-section .banner-form ul li select {
  width: 105.5%;
  height: 38px;
  font-size: 14px;
  color: #696969;
  font-weight: 400;
  line-height: 16px;
  padding: 10px 11px;
  position: relative;
}
#get-Appointment-section .banner-form ul li select option {
  padding: 5px 22px;
}
#get-Appointment-section .banner-form input[type="submit"] {
  width: 100%;
}
.why-choose h3 {
  font-size: 26px;
  font-weight: 600;
  color: #696969;
  border-bottom: 1px solid #c6d5d8;
  margin-bottom: 40px;
}
.why-choose ul li {
  padding-left: 90px;
  background-repeat: no-repeat;
  background-position: left top;
  padding-bottom: 36px;
}
.why-choose ul li label {
  font-size: 22px;
  font-weight: 600;
  color: #7b7b7b;
  display: block;
  line-height: 21px;
  font-family: 'Titillium Web', sans-serif;
  padding-bottom: 11px;
}
.why-choose ul li p {
  width: 320px;
  font-weight: 400;
}
.why-choose ul li:first-child {
  background-image: url(http://conceptbeans.co.uk/medipro/v2/demos/html/images/whychose1.png);
}
.why-choose ul li:nth-child(2) {
  background-image: url(http://conceptbeans.co.uk/medipro/v2/demos/html/images/whychose2.png);
}
.why-choose ul li:nth-child(3) {
  background-image: url(http://conceptbeans.co.uk/medipro/v2/demos/html/images/whychose3.png);
}
.why-choose ul li:last-child {
  padding-bottom: 0px;
}
/* END OF GET APPOINMETN SECTION */
.separator-section.separator-style2 {
  display: block;
  float: left;
  height: 320px;
}
/* WATCH VIDEO SECTION VARIATIONS */
.style3#watch-video-section {
  background-color: #0775cb;
}
.style3#watch-video-section h2 {
  color: #fff;
}
.style3 .watch-video-text h3 {
  color: #fff;
}
.style3 .watch-video-text p {
  color: #fff;
}
/* END OF WATCH VIDEO VARIATIONS */
/* TESTIMONIAL SECTION STYLE 2*/
.testimoial-style2#testimoial-section {
  overflow: hidden;
  background: #ffffff;
}
.testimoial-style2 .patient-img {
  width: 120px;
  height: 120px;
  margin: auto;
  margin-bottom: 21px;
  position: relative;
}
.testimoial-style2 .patient-img:after {
  display: none;
}
.testimoial-style2 .patient-img span {
  width: 120px;
  height: 120px;
  display: block;
  border: 5px solid #fff;
  border-radius: 50%;
  -webkit-border-radius: 50%;
  -moz-border-radius: 50%;
  -o-border-radius: 50%;
  -ms-border-radius: 50%;
  -webkit-box-shadow: 0px 0px 6px 1px rgba(0, 0, 0, 0.6);
  -moz-box-shadow: 0px 0px 6px 1px rgba(0, 0, 0, 0.6);
  box-shadow: 0px 0px 6px 1px rgba(0, 0, 0, 0.6);
  margin-bottom: 30px;
  overflow: hidden;
  position: relative;
}
.testimoial-style2 .patient-text-animation {
  margin: 0 auto;
  padding-bottom: 40px;
}
.testimoial-style2 .patient-text-animation p {
  padding-bottom: 56px;
  position: relative;
  width: 66.6666%;
  margin: 0 auto;
}
.testimoial-style2 .patient-text-animation p:before {
  content: '';
  position: absolute;
  left: -65px;
  top: -42px;
  width: 54px;
  height: 45px;
  background-repeat: no-repeat;
  background-image: url(http://conceptbeans.co.uk/medipro/v2/demos/html/images/patient-coma1.png);
}
.testimoial-style2 .patient-text-animation p:after {
  content: '';
  position: absolute;
  right: -65px;
  bottom: 11px;
  width: 54px;
  height: 45px;
  background-repeat: no-repeat;
  background-image: url(http://conceptbeans.co.uk/medipro/v2/demos/html/images/patient-coma2.png);
}
.testimoial-style2 .patient-text {
  position: relative;
  margin: 0 0;
  padding-top: 0px;
}
.testimoial-style2 .patient-text span {
  color: #696969;
  display: block;
}
.testimoial-style2 .patient-text:after {
  display: none;
}
/* END OF TESTIMONIAL SECTION STYLE 2*/
/* OPENING HOUR SECTION STYLE 2 */
.opening-hour-style2#opening-hour-section {
  height: 341px;
  position: relative;
  bottom: 0px;
  z-index: 1;
}
.opening-hour-style2#opening-hour-section label {
  text-align: center;
}
.opening-hour-style2#opening-hour-section .calling-number p {
  font-family: 'Titillium Web', sans-serif;
  line-height: 60px;
  font-weight: 400;
  color: #ffffff;
  font-size: 26px;
}
.opening-hour-style2#opening-hour-section .calling-number span {
  color: #dc3522;
}
.opening-hour-style2#opening-hour-section .btn {
  width: 100%;
}
/* END OF OPENING HOUR SECTION STYLE 2 */
/* NEWSLETTER SECTION STYLE 2 */
.newsletter-style2#newsletter-section {
  background-color: #ffffff;
  background-image: none;
  height: auto;
  overflow: hidden;
}
.newsletter-style2#newsletter-section h2 {
  padding-bottom: 26px;
  color: #0068a0;
}
.newsletter-style2#newsletter-section p {
  width: 66.6666%;
  margin: 0 auto;
  text-align: center;
}
.newsletter-style2#newsletter-section .newsletter-field-outer {
  padding-top: 36px;
}
.newsletter-style2#newsletter-section .newsletter-field {
  width: 100%;
  height: 60px;
  position: relative;
  border: 1px solid #dcdcdc;
  border-radius: 6px;
  background: none;
}
.newsletter-style2#newsletter-section .newsletter-field input {
  color: #bababa;
}
.newsletter-style2#newsletter-section .newsletter-field input::-webkit-input-placeholder {
  color: #bababa ;
  opacity: 1 !important;
}
.newsletter-style2#newsletter-section .newsletter-field input:-moz-placeholder {
  color: #bababa;
  opacity: 1 !important;
}
.newsletter-style2#newsletter-section .newsletter-field input::-moz-placeholder {
  color: #bababa;
  opacity: 1 !important;
}
.newsletter-style2#newsletter-section .newsletter-field input:-ms-input-placeholder {
  color: #bababa;
  opacity: 1 !important;
}
.newsletter-style2#newsletter-section .newsletter-field label {
  background-image: url(http://conceptbeans.co.uk/medipro/v2/demos/html/images/paperplane2.png);
}
.newsletter-style2#newsletter-section .btn {
  width: 100%;
  background-color: #00ceac;
}
/* END OF NEWSLETTER SECTION STYLE 2 */
/* FOOTER SECTION STYLE 2*/
.footer-style2 {
  background-color: #030b10;
  padding: 80px 0px 40px;
  width: 100%;
  bottom: 0;
  left: 0;
  min-height: 320px;
  position: fixed;
  z-index: 0;
}
.footer-style2 a.footer-logo {
  width: 289px;
  height: 59px;
  display: block;
  margin: 0 auto;
  margin-bottom: 20px;
}
.footer-style2 p {
  color: #c2c2c2;
  font-weight: 400;
  font-size: 14px;
  line-height: 20px;
}
.footer-style2 p a {
  color: #c2c2c2;
}
.footer-style2 .socials {
  width: 200px;
  font-size: 0px;
  text-align: center;
  border-top: 1px solid #232a2e;
  padding-top: 20px;
  margin: 0 auto;
  padding-bottom: 20px;
}
.footer-style2 .socials a {
  display: inline-block;
  *display: inline;
  *zoom: 1;
  height: 20px;
  margin: 0 12px;
  background-repeat: no-repeat;
  background-position: center center;
  /* IE 8 */
  -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=70)";
  /* IE 5-7 */
  filter: alpha(opacity=70);
  /* Netscape */
  -moz-opacity: 0.7;
  /* Safari 1.x */
  -khtml-opacity: 0.7;
  /* Good browsers */
  opacity: 0.7;
  -webkit-transition: all .25s;
  -moz-transition: all .25s;
  -ms-transition: all .25s;
  -o-transition: all .25s;
  transition: all .25s;
}
.footer-style2 .socials a:first-child {
  background-image: url(http://conceptbeans.co.uk/medipro/v2/demos/html/images/facebookiconhover.png);
  width: 10px;
  margin-left: 0px;
}
.footer-style2 .socials a:nth-child(2) {
  background-image: url(http://conceptbeans.co.uk/medipro/v2/demos/html/images/twittericonhover.png);
  width: 25px;
}
.footer-style2 .socials a:nth-child(3) {
  background-image: url(http://conceptbeans.co.uk/medipro/v2/demos/html/images/instagramiconhover.png);
  width: 19px;
}
.footer-style2 .socials a:last-child {
  background-image: url(http://conceptbeans.co.uk/medipro/v2/demos/html/images/linkiconhover.png);
  width: 23px;
  margin-right: 0px;
}
.footer-style2 .socials a:hover {
  /* IE 8 */
  -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)";
  /* IE 5-7 */
  filter: alpha(opacity=100);
  /* Netscape */
  -moz-opacity: 1;
  /* Safari 1.x */
  -khtml-opacity: 1;
  /* Good browsers */
  opacity: 1;
}
/* END OF FOOTER STYLE 2 */
/* END OF HOME PAGE STYLE 2 */
/* METHEW FLAT STYLE **/
#gradient {
  position: absolute;
  height: 100%;
  width: 100%;
  left: 50%;
  top: 0;
  z-index: -1;
}
#output,
#mycanvas {
  height: 100%;
  width: 100%;
}
/* END OF METHEW FLAT STYLE */
@media screen and (-webkit-min-device-pixel-ratio: 0) {
  ::i-block-chrome,
  .banner-form form fieldset select {
    margin-top: 7px;
    text-indent: 22px;
  }
  ::i-block-chrome,
  #get-Appointment-section .banner-form ul li select {
    margin-top: 8px;
    text-indent: 20px;
    font-weight: 600;
  }
  ::i-block-chrome,
  .newsletter-field input {
    font-weight: 600 !important;
  }
  #get-Appointment-section .banner-form ul li input::-webkit-input-placeholder {
    color: #9f9f9f;
  }
}
@media all and (min-width: 0px) and (max-width: 1024px) {
  .separator-section {
    display: none;
  }
  #opening-hour-section {
    position: static;
    z-index: normal;
  }
  footer {
    position: static;
    z-index: normal;
  }
  #procedure-section h2,
  .procedure-box,
  .watch-video-text,
  .soial-container,
  .video-container,
  .team-box,
  #newsletter-section .newsletter-field,
  #newsletter-section input.btn,
  .patient-img,
  .patient-text-animation,
  #get-Appointment-section h2,
  #get-Appointment-section .banner-form-outer,
  #get-Appointment-section .banner-form,
  .testimoial-style2 .patient-img,
  #opening-hour-section .btn,
  #opening-hour-section .calling-number,
  .banner-form-outer,
  .why-choose,
  #opening-hour-section.opening-hour-style2 .btn,
  #opening-hour-section.opening-hour-style2 .calling-number,
  #newsletter-section.newsletter-style2 .btn {
    visibility: visible;
  }
  .gradient-outer {
    display: none;
  }
  .why-choose ul li {
    padding-left: 70px;
  }
  .why-choose ul li p {
    width: 100%;
  }
  .header2 .middle {
    top: 0px;
    -webkit-transform: translateY(0%);
    -ms-transform: translateY(0%);
    transform: translateY(0%);
  }
  #opening-hour-section {
    position: static;
    bottom: 0px;
    background-size: auto 100%;
    height: auto;
  }
  .footer-style1,
  .footer-style2 {
    position: static;
    bottom: 0px;
  }
  #newsletter-section.newsletter-style2 {
    background-size: auto 100%;
    height: auto;
  }
}
@media all and (min-width: 768px) and (max-width: 991px) {
  /* IPAD STYLING */
  h1 {
    font-size: 40px;
    line-height: 48px;
    padding-bottom: 50px;
  }
  .btn {
    font-size: 18px;
  }
  .banner-form h2 {
    font-size: 38px;
  }
  .patient-img:after {
    right: -62px;
  }
  .team-box .team-text span {
    font-size: 14px;
  }
  /* HOME PAGE STYLE 2 */
  #get-Appointment-section .banner-form h3 {
    font-size: 41px;
  }
  /* END OF HOME PAGE STYLE 2 */
  /* END OF IPAD STYLING */
}
@media all and (min-width: 0px) and (max-width: 767px) {
  /* MOBILE STYLING */
  body {
    text-align: center;
  }
  h1,
  h2 {
    font-size: 32px;
    line-height: 38px;
    padding-bottom: 40px;
  }
  .btn {
    font-size: 18px;
  }
  .header-top-outer .logo {
    width: 100%;
    float: none;
  }
  .header-top-outer .logo a {
    margin: 0 auto;
  }
  .header-top-outer .call {
    margin: auto;
    display: none;
  }
  .header-content {
    position: static;
  }
  .banner-outer {
    height: auto;
  }
  .banner-outer .banner-img {
    display: none;
  }
  .banner-text {
    display: none;
  }
  .banner-text .btn {
    width: 300px;
  }
  .procedure {
    display: block;
  }
  .procedure .procedure-box {
    display: block;
    padding-bottom: 40px;
  }
  .procedure .procedure-box:last-child {
    padding-bottom: 0px;
  }
  .procedure .procedure-box:nth-child(2):before {
    display: none;
  }
  .procedure .procedure-box:nth-child(2):after {
    display: none;
  }
  .banner-form h2 {
    font-size: 38px;
  }
  .watch-video-text a.btn {
    width: 100%;
  }
  .video-container {
    height: auto;
  }
  .video-container iframe {
    width: 100%;
    height: 100%;
    min-height: 178px;
    bordor: none;
  }
  .soial-container {
    padding-bottom: 40px;
  }
  .patient-img {
    margin: 0 auto;
    margin-bottom: 40px;
  }
  .patient-img:after {
    display: none;
  }
  .patient-text:after {
    left: 50%;
    margin-left: -100px;
  }
  #newsletter-section {
    background-size: auto 100%;
    height: auto;
  }
  #newsletter-section .newsletter-field {
    margin-bottom: 10px;
  }
  #opening-hour-section {
    position: static;
    bottom: 0px;
    background-size: auto 100%;
    height: auto;
  }
  #opening-hour-section .calling-number p {
    text-align: center;
    font-size: 16px;
  }
  .footer-style1 {
    position: static;
    bottom: 0px;
  }
  .footer-style1 p {
    text-align: center;
    padding-bottom: 20px;
    line-height: 1.2;
  }
  .footer-style1 .socials {
    width: 100%;
    text-align: center;
    font-size: 0px;
  }
  .footer-style1 .socials a {
    float: none;
    display: inline-block;
    *display: inline;
    *zoom: 1;
  }
  /* HOME PAGE STYLE 2 */
  .header2 .header-top-outer {
    padding-bottom: 40px;
  }
  .header2 .header-top-outer .logo {
    width: 100%;
    float: none;
  }
  .header2 .header-top-outer .logo a {
    margin: 0 auto;
    height: auto;
    width: 160px;
  }
  .header2 .header-top-outer .call {
    margin: auto;
    display: none;
  }
  .header2 .header-content {
    position: static;
    padding-top: 40px;
    padding-bottom: 40px;
  }
  .header2 .banner-outer {
    height: auto;
  }
  .header2 .banner-outer .banner-img {
    display: none;
  }
  .header2 .middle {
    position: static;
    top: 0%;
    -webkit-transform: translateY(0%);
    -ms-transform: translateY(0%);
    transform: translateY(0%);
  }
  .header2 .banner-text {
    display: block;
  }
  .header2 .banner-text p {
    width: 100%;
  }
  .header2 .banner-text .btn {
    width: 100%;
  }
  .why-choose {
    display: none;
  }
  .procedure {
    display: block;
  }
  .procedure .procedure-box {
    display: block;
    padding-bottom: 40px;
  }
  .procedure .procedure-box:last-child {
    padding-bottom: 0px;
  }
  .procedure .procedure-box:nth-child(2):before {
    display: none;
  }
  .procedure .procedure-box:nth-child(2):after {
    display: none;
  }
  #get-Appointment-section .banner-form span {
    font-size: 16px;
  }
  #get-Appointment-section .banner-form h3 {
    font-size: 32px;
  }
  .testimoial-style2 .patient-img {
    margin: 0 auto;
    margin-bottom: 40px;
  }
  .testimoial-style2 .patient-img:after {
    display: none;
  }
  .testimoial-style2 .patient-text:after {
    left: 50%;
    margin-left: -100px;
  }
  .testimoial-style2 .patient-text-animation p {
    width: 100%;
  }
  .newsletter-style2#newsletter-section {
    background-size: auto 100%;
    height: auto;
  }
  .newsletter-style2#newsletter-section p {
    width: 100%;
  }
  .newsletter-style2#newsletter-section .newsletter-field {
    margin-bottom: 10px;
  }
  .opening-hour-style2#opening-hour-section {
    background-size: auto 100%;
    height: auto;
  }
  .opening-hour-style2#opening-hour-section .calling-number p {
    text-align: center;
    font-size: 16px;
  }
  .patient-text-animation p {
    width: 100%;
  }
  .patient-text-animation p:before {
    display: none;
  }
  .patient-text-animation p:after {
    display: none;
  }
  .footer-style2 {
    position: static;
  }
  /* END OF HOME PAGE STYLE 2 */
  /* END OF MOBILE STYLING */
}
</style>

    <!-- Custom Style -->
    <link href="files/custom.less" rel="stylesheet" type="text/less"><style type="text/css" id="less:medipro-v2-demos-html-less-custom">/*
 * Title:   Custom Style File
 * Author:  1stone
 */
</style>

    <!-- Updates Style -->
    <link href="files/updates.less" rel="stylesheet" type="text/less"><style type="text/css" id="less:medipro-v2-demos-html-less-updates">/*
 * Title:   Updates Style File
 * Author:  1stone
 */
</style>

    <!-- Loader Style -->
    <link href="files/loader.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

  <style type="text/css">
    *, html {
      font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
      margin: 0px;
      padding: 0px;
      font-size: 12px;
    }

    a {
      color: #0099CC;
    }

    body {
      margin: 10px;
    }
    .carregando{
      color:#666;
      display:none;
    }
  </style>

</head>

<body style="overflow: auto;">

<!-- Google Code for Conversao de lancamento Conversion Page -->
<script type="text/javascript">
  /* <![CDATA[ */
  var google_conversion_id = 927687500;
  var google_conversion_language = "en";
  var google_conversion_format = "3";
  var google_conversion_color = "ffffff";
  var google_conversion_label = "rJJPCKON02cQzMatugM";
  var google_remarketing_only = false;
  /* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
  <div style="display:inline;">
    <img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/927687500/?label=rJJPCKON02cQzMatugM&amp;guid=ON&amp;script=0"/>
  </div>
</noscript>


<!-- LOADER -->
<div id="preloader" style="display: none;">
    <div id="status"></div>
</div>    		
<!-- END OF LOADER -->
<!-- HEADER -->
<header class="header1">
    <div class="header-wrapper">
        <div class="banner-outer">
            <img src="files/banner.jpg" alt="" class="banner-img">
            <div class="header-content">
                <div class="container">
                    <div class="header-top-outer clearfix">
                        <div class="logo animated fadeInDown" style="visibility: visible;">
                            <a href="http://www.clickconsultorio.com/login">
                                <img src="files/logo_trans.png" alt="" class="img-responsive">
                                <!--<img src="../../assets/img/logo.png" alt="" class="img-responsive logo" style="width: 35%; height: 35%">-->
                            </a>
                        </div>
                        <!--
                        <div class="call animated fadeInDown" style="visibility: visible;">
                            + 847 322 8454
                        </div>
                        -->
                    </div>

                    <div class="row">
                        <div class="col-sm-7 col-xs-12">
                            <div class="banner-text">
                              <h3 style="
                                  /* float: inherit; */
                                  font-size: 33px;
                                  margin-top: -78px;
                                  margin-bottom: 86px;
                                  color: white;
                                  text-align: center;
                              ">Saiba como AUMENTAR em até 40%</h3><br>
                                <h3 style="
                                  /* float: inherit; */
                                  font-size: 26px;
                                  margin-top: -102px;
                                  margin-bottom: 6px;
                                  color: white;
                                  text-align: center;
                              "> seu número de Pacientes em sua Agenda!
                                <h3 id="heading1" class="animated fadeInDown" style="visibility: visible;height: 0px;"></h3>
                                <!-- WATCH VIDEO -->
                                <section id="watch-video-section">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-sm-7 col-md-6 col-xs-12 pull-left">
                                                <div class="video-container">
                                                    <!--<iframe src="./files/72675442.html"></iframe>-->
                                                    <iframe width="560" height="315" src="https://www.youtube.com/embed/RJq0RJZHmV8" frameborder="0" allowfullscreen></iframe>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <!-- END OF WATCH VIDEO -->

                            </div>
                        </div>
                        <div class="col-sm-5 col-xs-12">
                            <!-- HEADER FORM -->

                            <div class="banner-form animated fadeInUp" style="visibility: visible;">
                                <span>Quer saber mais?</span>
                                <span>Baixe</span><h2>Grátis</h2>
                              <h3 style="
                                  /* float: inherit; */
                                  font-size: 33px;
                                  margin-top: -36px;
                                  margin-bottom: 7px;
                                  color: #424040;
                                  text-align: center;
                              ">Nosso e-book</h3>
                                <form id="form" name="form" method="post" action="cadastra.php">
                                <input class="text" type="hidden" name="id_perfil" value="2">
                                  <!--<input class="text" type="hidden" name="ch_ativo" value="0">
                                  <input class="text" type="hidden" name="ch_prospecto" value="1">
                                  <input type="hidden" name="acaoForm" value="cadastra_prospect" />-->

                                  <!--<form name="myForm" class="form" method="post" action="/landingpage/cadastra">
                                    <input class="text" type="hidden" name="id_perfil" value="2">
                                    <input class="text" type="hidden" name="ch_ativo" value="1">
                                    <input class="text" type="hidden" name="ch_prospecto" value="0">-->

                                <fieldset>
                                    <label></label>
                                    <input type="text" placeholder="Digite o seu Nome. . ." name="nome" required="">
                                </fieldset>
                                <fieldset>
                                    <label></label>
                                    <input type="text" placeholder="Informe o seu email  . . ." name="email" required="">
                                </fieldset>
                                  <fieldset>
                                    <select name="cod_estados" id="cod_estados" style="padding: 0px !important;height: 23px !important;">
                                      <option value="">Estado:</option>
                                      <?php
                                      include("../config/default.php");
                                      $sql = "SELECT cod_estados, sigla
                                              FROM estados
                                              ORDER BY sigla";
                                      $res = mysql_query( $sql );
                                        while ( $row = mysql_fetch_assoc( $res ) ) {
                                          echo '<option value="'.$row['cod_estados'].'">'.$row['sigla'].'</option>';
                                        }
                                      ?>
                                    </select>
                                  </fieldset>

                                  <fieldset>
                                    <span class="carregando" style="display: none;">Aguarde, carregando...</span>
                                    <select name="cod_cidades" id="cod_cidades" style="padding: 0px !important;height: 23px !important;">
                                      <option value="">-- Escolha um estado --</option>
                                    </select>
                                  </fieldset>

                                  <script src="http://www.google.com/jsapi"></script>
                                  <script type="text/javascript">
                                    google.load('jquery', '1.3');
                                  </script>

                                  <script type="text/javascript">
                                    $(function(){
                                      $('#cod_estados').change(function(){
                                        if( $(this).val() ) {
                                          $('#cod_cidades').hide();
                                          $('.carregando').show();
                                          $.getJSON('cidades.ajax.php?search=',{cod_estados: $(this).val(), ajax: 'true'}, function(j){
                                            var options = '<option value=""></option>';
                                            for (var i = 0; i < j.length; i++) {
                                              options += '<option value="' + j[i].cod_cidades + '">' + j[i].nome + '</option>';
                                            }
                                            $('#cod_cidades').html(options).show();
                                            $('.carregando').hide();
                                          });
                                        } else {
                                          $('#cod_cidades').html('<option value="">– Escolha um estado –</option>');
                                        }
                                      });
                                    });
                                  </script>
                                <!--
                                <fieldset>
                                    <label>Telefone</label>
                                    <input type="text" placeholder="Personal phone number . . ." name="phone" required="">
                                </fieldset>
                                <fieldset>
                                    <span class="hidden-overflow">
                                        <select class="selectpicker" name="procedure">
                                            <option>Procedure Type</option>
                                            <option>Lasik Eye</option>
                                            <option>Invisalign</option>
                                            <option>Cosmetic Surgery</option>
                                        </select>
                                    </span>
                                </fieldset>
                                -->
                                    <input type="submit" value="INSCREVA-SE AQUI" class="btn">
                                </form>
                            </div>
                            <!-- END OF HEADER FORM-->
                        </div>
                    </div> 
                </div>
            </div> 
        </div>
    </div>
</header> 
<!-- END OF HEADER -->        
<!-- CONTENT -->


<div class="separator-section separator-style1"></div>
<!-- opening HOUR -->
<section class="opening-hour-style1" id="opening-hour-section">
    <div class="container">
        <label>
            Nós ajudamos pacientes e profissionais da saúde<br>
            Fazendo com que tenham facilidade no agendamento de consultas<br>
            Ganhando tempo sem precisar gastar com ligações telefônicas.<br>
            Sem custo nenhum para o paciente, e redução de custo para o Médico,<br>
            estabelecendo assim uma relação de transparência<br>
            entre o paciente e o profissional de saúde!
        </label>
        <h2></h2>
        <!--
        <div class="row opening-hour-animation">
            <div class="col-sm-4 col-xs-12">
                <a href="javascript:void(0)" class="btn cta1">Get Appointment!</a>
            </div>
            <div class="col-sm-8 col-xs-12 calling-number">
                <p>Or  Call Us <span> 1-800 987-0786</span></p>
            </div>
        </div>
        -->
    </div>
</section>
<!-- END OF opening HOUR -->	
<!-- END OF CONTENT -->
<!-- FOOTER -->
<footer class="footer-style1">
    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-xs-12">
                <p>© 2016 ClickConsultorio TODOS direitos reservados <a target="_blank" href="http://www.awktec.com">à AWK Consultoria</a></p>
            </div>
            <div class="col-sm-4 col-xs-12">
              <!--
                <div class="socials">
                  <a href="https://clickconsultorio.com"><i class="fa fa-home"></i></a>
                  <a href="https://www.facebook.com/ClickConsult%C3%B3rio-457104751143587/?fref=ts"><i class="fa fa-facebook"></i></a>
                  <a href="https://clickconsultorio.blogspot.com"><i class="fa fa-rss-square fa-5x"></i></a>
                  <a href="skype://clickconsultorio?chat"><i class="fa fa-skype"></i></a>
                </div>
                -->
            </div>
        </div>
     </div> 
</footer>
<!-- END OF FOOTER -->

<!-- JQUERY LIBRARY -->
<script type="text/javascript" src="files/jquery-2.1.1.min.js"></script>
<!-- LESS.JS -->
<script type="text/javascript" src="files/less.js"></script>
<!-- Modernizr.js -->
<script type="text/javascript" src="files/modernizr.js"></script>
<!-- Mootstrap.min.js -->
<script type="text/javascript" src="files/bootstrap.min.js"></script>
<!-- Jquery.waypoints.js -->
<script type="text/javascript" src="files/jquery.waypoints.js"></script>
<!-- Jquery.simplr.jquery.validate.js -->
<script type="text/javascript" src="files/jquery.validate.js"></script>
<!-- Jquery.simplr.jquery-validate.bootstrap-tooltip.js -->
<script type="text/javascript" src="files/jquery-validate.bootstrap-tooltip.js"></script>
<!-- Custom.js -->
<script type="text/javascript" src="files/custom.js"></script>



<!-- Código do Google para tag de remarketing -->
<!--------------------------------------------------
As tags de remarketing não podem ser associadas a informações pessoais de identificação
nem inseridas em páginas relacionadas a categorias de confidencialidade. Veja mais informações
e instruções sobre como configurar a tag em: http://google.com/ads/remarketingsetup
--------------------------------------------------->
<script type="text/javascript">
  /* <![CDATA[ */
  var google_conversion_id = 927687500;
  var google_custom_params = window.google_tag_params;
  var google_remarketing_only = true;
  /* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
  <div style="display:inline;">
    <img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/927687500/?value=0&amp;guid=ON&amp;script=0"/>
  </div>
</noscript>

</body>
<object id="69d94918-383a-868c-6bbb-08afa9ba9bb1" width="0" height="0" type="application/gas-events-bb"></object>
</html>