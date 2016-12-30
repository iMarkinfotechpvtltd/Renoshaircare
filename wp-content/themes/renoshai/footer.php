<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>

    <footer>
        <div class="container">
            <div class="ftr_section">
                <div class="ftr_logo">
                    <a href="<?php echo site_url();?>"> <img src="<?php echo get_option_tree('footer_logo');?>" alt="footer_logo"></a>
                </div>
                <div class="ftr_menu">
                    <nav>
                        <ul>
                            <!--START CODE USE FOR GETTING FOOTER MENU-->
                            <?php

							$defaults = array(
							'theme_location'  => '',
							'menu'            => 'Footer_menu',
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
                                <!--END OF CODE USE FOR GETTING FOOTER MENU-->

                                <!--<li class="current-menu-item"><a href="index.html">Home</a></li>
						<li><a href="services.html">Services</a></li>
						<li><a href="location.html">Locations</a></li>
						<li><a href="gallery.html">Gallery</a></li>
						<li><a href="blog.html">Blog</a></li>-->
                        </ul>
                    </nav>
                </div>
                <div class="ftr_contact">
                    <ul class="contact_info">
                        <i class="fa fa-location-arrow" aria-hidden="true"></i>
						<?php 
						$args=array
						(
								'post_type'      =>'location_post',
								'posts_per_page' => -1,
								'order'          => 'DESC',
						);
						$brand = new WP_Query($args);
						$count_posts = $brand->found_posts;
						while( $brand -> have_posts() ) : $brand -> the_post();
						?>	
							<li>
								<a href="<?php the_permalink();?>"><?php the_field('location_short_name',$post->ID);?></a>
							</li>
						<?php			
						endwhile; 
						wp_reset_query();
						?>	
                    </ul>
                </div>
                <div class="ftr_links">
                    <ul class="social_icon">
                        <li>
                            <a href="<?php echo get_option_tree('facebook');?>" target="_blank">
                                <i class="fa fa-facebook" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo get_option_tree('twitter');?>" target="_blank">
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
            <div class="copyright">
                <p>
                    Copyright
                    <?php echo date('Y');?> Renos, All Rights Reserved, Website Created By <a href="http://tradesignaus.com.au/tradies/" target="blank">Tradesign</a> </p>
            </div>
        </div>
        </div>
    </footer>

    <?php wp_footer(); ?>

        <!-- footer scetion -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo get_template_directory_uri();?>/js/bootstrap.min.js"></script>
        <script src="<?php echo get_template_directory_uri();?>/js/owl.carousel.min.js"></script>
        <!-- preloader js -->
        <script>
            jQuery(function($) {
                //Preloader
                var preloader = $('.preloader');
                jQuery(window).load(function() {
                    preloader.remove();
                });
            });

        </script>
        <script src="https://npmcdn.com/masonry-layout@4.1/dist/masonry.pkgd.min.js"></script>
        <script src="<?php echo get_template_directory_uri();?>/js/masonry.pkgd.min.js"></script>
        <script src="<?php echo get_template_directory_uri();?>/js/masonry.pkgd.js"></script>
        <script src="<?php echo get_template_directory_uri();?>/js/jquery.mosaicflow.min.js"></script>


        <script>
            // external js: masonry.pkgd.js, <?php echo get_template_directory_uri();?>/imagesloaded.pkgd.js

            // init Isotope
            var grid = document.querySelector('.grid');

            var msnry = new Masonry(grid, {
                itemSelector: '.grid-item',
                columnWidth: '.grid-sizer',
                percentPosition: true
            });

            imagesLoaded(grid).on('progress', function() {
                // layout Masonry after each image loads
                msnry.layout();
            });

        </script>
        <!-- slider -->
        <script>
            $(document).ready(function() {

                var owl = $("#owl-demo");

                owl.owlCarousel({
                    items: 5, //10 items above 1000px browser width
                    itemsDesktop: [1000, 5], //5 items between 1000px and 901px
                    itemsDesktopSmall: [900, 3], // betweem 900px and 601px
                    itemsTablet: [600, 2], //2 items between 600 and 0
                    itemsMobile: false, // itemsMobile disabled - inherit from itemsTablet option


                    // Custom Navigation Events
                    autoPlay: 3000, //Set AutoPlay to 3 seconds

                    items: 5,
                    itemsDesktop: [1199, 5],
                    itemsDesktopSmall: [979, 3]
                });
            });

        </script>
        <script defer src="<?php echo get_template_directory_uri();?>/js/jquery.flexslider.js"></script>
        <script>
            $(window).load(function() {
                // The slider being synced must be initialized first
                $('#carousel').flexslider({
                    animation: "slide",
                    controlNav: false,
                    animationLoop: false,
                    slideshow: false,
                    itemWidth: 210,
                    itemMargin: 5,
                    asNavFor: '#slider'
                });

                $('#slider').flexslider({
                    animation: "slide",
                    controlNav: false,
                    animationLoop: false,
                    slideshow: false,
                    sync: "#carousel",

                });

            });

        </script>
        <script type="text/javascript" src="<?php echo get_template_directory_uri();?>/js/jquery-1.10.1.min.js"></script>
        <script defer src="<?php echo get_template_directory_uri();?>/js/jquery.fancybox.js"></script>
        <script defer src="<?php echo get_template_directory_uri();?>/js/jquery.validate.min.js"></script>
        <!--<script>
jQuery(document).ready(function () {
			jQuery(".fancybox").fancybox({
				openEffect: 'none',
				closeEffect: 'none'
			});
			
			jQuery('.comment-form').addClass('inline-form');
			jQuery('.comment-form .form-submit .submit').addClass('btn');
			jQuery('.comment-form .form-submit .submit').addClass('btn-send');
		});

</script>-->

        <script type="text/javascript">
            jQuery(document).ready(function() {
                /*
                 *  Simple image gallery. Uses default settings
                 */

                jQuery('.fancybox').fancybox();

                /*
                 *  Different effects
                 */

                // Change title type, overlay closing speed
                jQuery(".fancybox-effects-a").fancybox({
                    helpers: {
                        title: {
                            type: 'outside'
                        },
                        overlay: {
                            speedOut: 0
                        }
                    }
                });
                jQuery("#fancybox-manual-c").click(function() {
                    $.fancybox.open([{
                        href: '1_b.jpg',
                        title: 'My title'
                    }, {
                        href: '2_b.jpg',
                        title: '2nd title'
                    }, {
                        href: '3_b.jpg'
                    }], {
                        helpers: {
                            thumbs: {
                                width: 75,
                                height: 50
                            }
                        }
                    });
                });


            });

        </script>

        
        </body>

        </html>
