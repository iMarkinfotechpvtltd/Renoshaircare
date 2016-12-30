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
<?php
// Start the loop.
while ( have_posts() ) : the_post();
?>
<section class="banner-inner">
	<div id="myCarousel" class="carousel slide" data-ride="carousel">
	  <!-- Wrapper for slides -->
	  <div class="carousel-inner" role="listbox">
			<div class="item active">
				
			<?php
			/*Getting  Blog Internal Banner Image */
				$Banner_image=get_post_meta($post->ID,"blog_internal_banner_image",true);
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
					<img src="http://placehold.it/1920x550&amp;text=No image found" alt="inner_banner_img">
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
		<h2><?php echo the_title();?></h2>
	</div>
</section>
<!-- blog_sec section end -->

<section class="blog_internal_pg">
	<div class="container">
		<div class="row">
		   <div class="col-sm-12">
			   <div class="blog_img">
					
				   <a href="#">
						<figure>
						<?php 
							if ( has_post_thumbnail() )
							{
								$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'blog_single_image_size' );
						?>
								<img src="<?php echo $image[0]; ?>" alt="banner_img"/><span></span>
						<?php
							} 
							else 
							{
						?>
							<img src="http://placehold.it/1440x607&amp;text=No image found" alt="banner_img" class="img-responsive" /><span></span>
					  <?php 
							} 
					 ?>

						</figure>
				   </a>
			   </div>
			</div>
		</div>
	</div>
</section>
<!-- blog_internal_pg section end -->
<section class="blog_post_sec">
	<div class="container">
		<div class="row">
			<div class="col-sm-8">
				<div class="blog_post">
				
					<h4><?php echo the_title();?></h4>
					  <?php echo  the_content();?>
					  

				</div>
				<?php 
				// End of the loop.
			    endwhile;
		       ?>  
			
			</div>
			
			<div class="col-sm-4">
				<div class="realted_post_sec">
					<div class="blog_post">
						<h6>Related Post</h6>
					</div>
					
					<?php
						$args = array('post_type' => 'post',
									  'posts_per_page' => 3,
									  'order'        => 'DESC'
									 );
						$blogs = new WP_Query( $args );
						while ( $blogs->have_posts() ) : $blogs->the_post();
					?>
					
							<div class="blog_img"> 
								<a href="<?php the_permalink();?>">
									<figure>
										<?php 
									if ( has_post_thumbnail() )
									{
										$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'blog_image_size' );
								?>
										<img src="<?php echo $image[0]; ?>" alt="blog-img"/><span></span>
								<?php
									} 
									else 
									{
								?>
										<img src="http://placehold.it/460x330&amp;text=No image found" alt="blog-img" class="img-responsive" /><span></span>
							  <?php 
									} 
							 ?>
										<span><h2>Read More</h2></span>
									</figure> 
								</a>
								<h4><?php the_title();?></h4>
							</div>
					<?php 
					// End of the loop.
						endwhile;
				   ?>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- blog_post_sec section end -->

<?php get_footer(); ?>