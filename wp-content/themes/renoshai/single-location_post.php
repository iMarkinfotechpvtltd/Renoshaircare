<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
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
			/*Getting  Location internal Banner Image */
				$Banner_image=get_post_meta($post->ID,"location_internal_banner_image",true);
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
    <?php
// Start the loop.
while ( have_posts() ) : the_post();
?>
        <section class="location_img_sec">
            <div class="container">
                <h2><?php the_title();?></h2>

                <?php 
					if ( has_post_thumbnail() )
					{
						$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'blog_single_image_size' );
				?>
                    <img src="<?php echo $image[0]; ?>" alt="location-inner-img">
                    <?php
					} 
					else 
					{
				?>
                        <img src="http://placehold.it/1440x607&amp;text=No image found" alt="location-inner-img">
                        <?php 
					} 
			 ?>


            </div>
        </section>
        <!-- location_sec_img section end -->
        <section class="internal_sec">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="internal_img">

                            <?php
						/*Getting  Location internal Banner Image */
							$internal_image=get_post_meta($post->ID,"location_internal_image",true);
							$internal = wp_get_attachment_image_src($internal_image, 'full');	
						
							if(!empty($internal))
							{
						?>
                                <img src="<?php echo $internal[0];?>" alt="internal_location_image">

                                <?php 
							}
							else
							{
						?>
                                    <img src="http://placehold.it/704x505&amp;text=No image found" alt="internal_location_image">
                                    <?php	
							}
						?>

                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="internal_img_content">
                           <!-- <h3>Address</h3>
                            <p>
                                <?php //the_title();?>
                               </p> -->     
                                    <?php the_field('address',$post->ID);?>
                           
                            <h3>Working Hours</h3>
                            <?php the_field('working_hour',$post->ID);?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- internal_sec section end -->
        <?php 
// End of the loop.
endwhile;
?>

            <?php get_footer(); ?>
