<?php 
/* Template Name: Gallery
*/ 
get_header();

global $post;
?>
    <section class="banner-inner">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <div class="item active">

                    <?php
			/*Getting  Gallery Banner Image */
				$Banner_image=get_post_meta($post->ID,"gallery_page_banner_image",true);
				$Banner = wp_get_attachment_image_src($Banner_image, 'full');	
			
				if(!empty($Banner))
				{
			?>
                     <img src="<?php echo $Banner[0];?>" alt="inner_banner_img">
           <?php 
				}
				else
				{
			?>
                      <img src="http://placehold.it/1920x450&amp;text=No image found" alt="inner_banner_img">
            <?php	
				}
			?>
                </div>
            </div>
        </div>
    </section>
    <!-- banner section  end-->
    <section class="gallery_slider_sec">
        <div class="container">
            <h2>Gallery</h2>
        </div>
        <div class="gallery_slider">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="blog_img">
                            <div id="slider" class="flexslider">
                                <ul class="slides">

                                    <?php 
									$args=array
											(
												'post_type'      => 'gallery_post',
												'posts_per_page' => -1,
												'orderBy'        =>'DESC'
											);
									$gallery = new WP_Query($args);
									
									while( $gallery -> have_posts() ) : $gallery -> the_post();
								?>
                                        <li>
                                            <?php 
											if ( has_post_thumbnail() )
											{
												$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
										?>
                                                <img src="<?php echo $image[0]; ?>" alt="banner_img" />
                                                <?php
											} 
											else 
											{
										?>
                                                    <img src="http://placehold.it/1360x627&amp;text=No image found" alt="banner_img" class="img-responsive" />
                                                    <?php 
											} 
										?>
                                        </li>
                                        <?php	
								   endwhile;
								   wp_reset_query();
								?>
                                </ul>

                            </div>
                            <div id="carousel" class="flexslider">
                                <div class="container">
                                    <ul class="slides">
                                        <?php 
									$args=array
											(
												'post_type'      => 'gallery_post',
												'posts_per_page' => -1,
												'orderBy'        =>'DESC'
											);
									$gallery_thumb = new WP_Query($args);
									
									while( $gallery_thumb -> have_posts() ) : $gallery_thumb -> the_post();
								?>
                                            <li>
                                                <?php 
												if ( has_post_thumbnail() )
												{
													$thumb_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'gallery_thumb_image_size' );
											?>
                                                    <img src="<?php echo $thumb_image[0]; ?>" alt="banner_thumb_image" />
                                                    <?php
												} 
												else 
												{
											?>
                                                        <img src="http://placehold.it/191x180&amp;text=No image found" alt="banner_thumb_image" class="img-responsive" />
                                                        <?php 
												} 
											?>
                                            </li>
                                            <?php	
								    endwhile;
								    wp_reset_query();
								?>
                                                <!-- items mirrored twice, total of 12 -->
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- gallery_slider_sec section end -->


    <?php get_footer();?>
