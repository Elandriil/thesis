
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
        "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Timo Soiunen</title>
<link rel="shortcut icon" href="/img/favicon.ico"></link>
<link href="/lopu/css/style.css" rel="stylesheet" type="text/css" media="screen">
<script type="text/javascript" src="/lopu/extra/jquery-1.2.6.min.js"></script>
<script type="text/javascript" src="/lopu/extra/jquery.bgpos.js"></script>
<script type="text/javascript">
jQuery(function($){
	$('#b a')
		.css( {backgroundPosition: "0 0"} )
		.mouseover(function(){
			$(this).stop().animate({backgroundPosition:"(-150px 0)"}, {duration:500})
		})
		.mouseout(function(){
			$(this).stop().animate({backgroundPosition:"(-300px 0)"}, {duration:200, complete:function(){
				$(this).css({backgroundPosition: "0 0"})
			}})
		})
	$('#c a')
		.css( {backgroundPosition: "0 0"} )
		.mouseover(function(){
			$(this).stop().animate({backgroundPosition:"(0 -250px)"}, {duration:500})
		})
		.mouseout(function(){
			$(this).stop().animate({backgroundPosition:"(0 0)"}, {duration:500})
		})
});

</script>

</head>
<body>
<div id="wrap">
	<div id="header"> 
	<?php //echo anchor('main/index', '<img src="/extra/header_bg.png">'); ?>
  </div>
	<div id="nav">
   <table><tr><td>
   <span class="menu_link">
		<ul id="c">
		<li><?php echo anchor('main/index', 'Home'); ?> </li>
		<li><?php echo anchor('main/art', 'Art'); ?></li>
		<li><?php echo anchor('main/it', 'Informatics'); ?></li>
		<li><?php echo anchor('main/about', 'About'); ?></li>
        <li><?php //echo anchor('main/services', 'Services'); ?></li>
         <li><?php //echo anchor('main/contact', 'Contact'); ?></li>
        <li><?php //echo anchor('main/upanel', 'User Panel'); ?></li>
        <li><?php //echo anchor('main/admin', 'Admin'); ?></li>
        <li><?php //echo anchor('main/login', 'Login'); ?></li>
        <li><?php //echo anchor('main/logout', 'Logout'); ?></li>
        </ul></span></td></tr></table>
	</div>
	<div id="main" style="margin: 0 auto;"> 
    <div id="inside"  style="margin: 0 auto;">