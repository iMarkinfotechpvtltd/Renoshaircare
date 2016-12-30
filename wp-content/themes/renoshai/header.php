<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<?php wp_head(); ?>
	
	<link rel="icon" href="<?php echo get_template_directory_uri();?>/images/fav.png" type="image/x-icon">
    <link href="<?php echo get_template_directory_uri();?>/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo get_template_directory_uri();?>/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo get_template_directory_uri();?>/css/style.css" rel="stylesheet"> 
	
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display+SC:700|Playfair+Display:700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri();?>/css/owl.carousel.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri();?>/css/jquery.fancybox.css" media="screen" />
</head>

<body>
<!--preloader-->
<div class="preloader"><img src="<?php echo get_template_directory_uri();?>/images/Triple-intersection.gif" alt="triple-intersection"></div>
<!--preloader-->
<header class="animated">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="logo">
					<a href="<?php echo site_url();?>" title="">
						<img src="<?php echo get_option_tree('logo');?>" alt="logo">
					</a>
				</div>
				<div class="header_middle_cntnt">
					<div class="header_btm">
						<nav>
						   <ul>
							    <!--START CODE USE FOR GETTING HEADER MENU-->
								<?php

									$defaults = array(
									'theme_location'  => '',
									'menu'            => 'Header_menu',
									'container'       => '',
									'container_class' => '',
									'container_id'    => '',
									'menu_class'      => 'menu',
									'menu_id'         => '',
									'echo'            => true,
									'fallback_cb'     => 'wp_page_menu',
									'before'          => '',
									'after'           => '',
									'link_before'     => '',
									'link_after'      => '',
									'items_wrap'      => '%3$s',
									'depth'           => 0,
									'walker'          => ''
									);

									wp_nav_menu( $defaults );
								?>
								<!--END OF CODE USE FOR GETTING HEADER MENU-->	

								<!--<li class="current-menu-item"><a href="index.html">Home</a></li>
								<li><a href="services.html">Services</a></li>
								<li><a href="#">Salons</a></li>
								<li><a href="gallery.html">Gallery</a></li>
								<li><a href="blog.html">Blog</a></li>-->
							</ul>
						</nav>
						<!--nav end-->
					</div>                        
				</div>
				<div class="contact_top">
					<ul class="social_icon">
						<li> 
							<a href="<?php echo get_option_tree('facebook');?>" target="_blank">
								<i class="fa fa-facebook" aria-hidden="true"></i>
							</a>
						</li>
						<li>
							<a href="<?php echo get_option_tree('mail');?>" target="_blank">
								<i class="fa fa-envelope-o" aria-hidden="true"></i>
							</a>
						</li>
						<li>
							<a href="<?php echo get_option_tree('instagram');?>" target="_blank">
								<i class="fa fa-instagram" aria-hidden="true"></i>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>        
</header>
<!--header end-->
