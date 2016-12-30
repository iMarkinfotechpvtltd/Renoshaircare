<?php 
/* Template Name: Blog 
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
			/*Getting  Blog Banner Image */
				$Banner_image=get_post_meta($post->ID,"blog_banner_image",true);
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

<section class="blog_sec">
	<div class="container">
		<h2>Blog</h2>
	</div>
</section>
<!-- blog_sec section end -->
<section class="blog_inner_sec">
	<div class="container">
		<div class="row">
		 <?php
				$args=array
						(
							'post_type'      => 'post',
							'posts_per_page' => 6,
							'orderBy'        =>'DESC'
						);
				$blogs = new WP_Query($args);
				
				while( $blogs -> have_posts() ) : $blogs -> the_post();
			?>	
				   <div class="col-sm-4">
					   <div class="blog_img">                       
						   <a href="<?php the_permalink();?>">
							   <figure>
								<?php 
								if ( has_post_thumbnail() )
								{
									$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'blog_image_size' );
							?>
									<img src="<?php echo $image[0]; ?>" alt="banner_img"/>
							<?php
								} 
								else 
								{
							?>
								<img src="http://placehold.it/460x330&amp;text=No image found" alt="banner_img" class="img-responsive" />
							<?php 
								} 
							?>
							   <span><h2>Read More</h2></span>
								</figure>
						   </a>
						   <div class="blog_content">
							   <h3><?php the_title();?></h3>
							   <h6><?php echo get_the_date( 'M d Y' ); ?></h6>
								<p><?php $content = get_the_content(); echo mb_strimwidth($content, 0, 121);?></p>
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
    <!-- blog_inner_sec section end -->


<?php get_footer();?>