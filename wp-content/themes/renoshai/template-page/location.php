<?php 
/* Template Name: Location
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
			/*Getting  Location Banner Image */
				$Banner_image=get_post_meta($post->ID,"location_banner_image",true);
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

<section class="location_sec">
	<div class="container">
		<h2>Locations</h2>
	</div>
</section>
<!-- location_sec section end -->
<section class="location_inner_sec">
	<div class="container">
		<div class="row">
		  <?php 
				$args=array
				(
						'post_type'      =>'location_post',
						'posts_per_page' => -1,
						'order'          => 'DESC',
				);
				$location = new WP_Query($args);
				
				while( $location -> have_posts() ) : $location -> the_post();
		 ?>
				   <div class="col-sm-4">
					   <div class="loc_img">                       
						  <a href="<?php the_permalink();?>"> 
								<figure>
									<?php 
										if ( has_post_thumbnail() )
										{
											$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'location_image_size' );
									?>
											<img src="<?php echo $image[0]; ?>" alt="<?php the_title();?>"/><span></span>
									<?php
										} 
										else 
										{
									?>
										<img src="http://placehold.it/460x307&amp;text=No image found" alt="<?php the_title();?>" class="img-responsive" /><span></span>
									<?php 
										} 
									?>
								</figure>
						  </a>
						   <div class="loc_content">
							   <h3><?php the_title();?></h3>
							       <?php the_content();?>
						   </div>
					   </div>
					</div>
			<?php
				endwhile; 
				wp_reset_query();
			?>						
		</div>
	</div>
</section>
<!-- location_inner_sec section end -->



<?php get_footer();?>