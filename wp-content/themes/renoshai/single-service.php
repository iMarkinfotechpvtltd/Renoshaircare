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
		/*Getting  Home Banner Image */
			$Banner_image=get_post_meta($post->ID,"banner_image",true);
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

<section class="services_in_sec">
	<div class="container">
		<h2><?php the_title();?></h2>
	</div>
</section>
<!-- services_in_sec section end -->
<section class="ser_internal_sec">
	<div class="container">
		<div class="row">
			<div class="col-sm-6">
				<div class="internal_img">
					<?php 
					if ( has_post_thumbnail() )
					{
						$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'service_single_image_size');
					?>
						<img src="<?php echo $image[0]; ?>" alt="services_in-img">
					<?php
					} 
					else 
					{
					?>
						<img src="http://placehold.it/1440x607&amp;text=No image found" alt="services_in-img">
				  <?php 
					} 
				 ?>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="internal_img_content">
					<div class="content">
					<!--<h3><?php //the_title();?></h3>-->
						<?php //the_content();?>
						<?php the_field('price_list',$post->ID);?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- ser_internal_sec section end -->
<section class="price_list_sec">
	<div class="container">
		<div class="price_list">
			<?php //the_field('price_list',$post->ID);?>
		</div>
	</div>
</section>  

<?php 
// End of the loop.
endwhile;
?>
<!-- price_list_sec section end -->


<?php get_footer(); ?>