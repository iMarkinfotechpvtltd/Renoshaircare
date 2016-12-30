<?php 
/* Template Name: Services 
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
				$Banner_image=get_post_meta($post->ID,"service_banner_image",true);
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
<section class="services_sec">
	<div class="container">
		<div class="services_heading">
			<h2>Services</h2>
		</div>
	</div>
		<div class="row">
			<div class="col-sm-12">
			  <?php 
				$i=1;
				$args=array
						(
							'post_type'      => 'service',
							'posts_per_page' => -1,
							'orderBy'        =>'DESC'
						);
				$service = new WP_Query($args);
				
				while( $service -> have_posts() ) : $service -> the_post();
				
					if($i%2!=0)
					{
				?>
						<div class="service_inner">
							<div class="container">
								<div class="ser_list_content">
									<h2><?php the_title();?></h2>
									    <?php the_content();?>
								<a class="button-read" href="<?php the_permalink();?>">See More</a>
								</div>
								<div class="ser_list">
									
										<figure>
											<?php 
												if ( has_post_thumbnail() )
												{
													$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'about_image_size' );
											?>
													<img src="<?php echo $image[0]; ?>" alt="<?php the_title();?>"/>
											<?php
												} 
												else 
												{
											?>
												<img src="http://placehold.it/635x643&amp;text=No image found" 
												  alt="<?php the_title();?>" class="img-responsive" />
										  <?php 
											} 
										 ?>
										</figure>
								   
								</div>
							</div>
						</div>
					<?php
					}
					else
					{
				    ?>
						<div class="service_inner">
							<div class="container">
								<div class="ser_list">
								 
									<figure>
										<?php 
											if ( has_post_thumbnail() )
											{
												$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'about_image_size' );
										?>
												<img src="<?php echo $image[0]; ?>" alt="<?php the_title();?>"/>
										<?php
											} 
											else 
											{
										?>
											<img src="http://placehold.it/635x643&amp;text=No image found" 
											  alt="<?php the_title();?>" class="img-responsive" />
									   <?php 
										} 
									   ?>
									</figure>
								</div>
								<div class="ser_list_content">
									<h2><?php the_title();?></h2>
									    <?php the_content();?>
										<a class="button-read" href="<?php the_permalink();?>">See More</a>
								</div>
							</div>
						</div>
				<?php	
					}
				$i++;
			    endwhile;
				wp_reset_query();
				?>	
			</div>
		</div>
</section>
<!-- services_sec section end -->
    
<section class="ser_brand_sec">
	<div class="container">
		<h2>our brands</h2>
		<div id="owl-demo" class="owl-carousel owl-theme">
			
			<?php 
			$args=array
			(
					'post_type'      =>'brand_post',
					'posts_per_page' => -1,
					'order'          => 'DESC',
			);
			$brand = new WP_Query($args);
			$i=1;
			$count_posts = $brand->found_posts;
			while( $brand -> have_posts() ) : $brand -> the_post();
			?>	
		
		
				<div class="item">
					<a href="#">
				<?php 
					if ( has_post_thumbnail() )
					{
						$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
				?>
						<img src="<?php echo $image[0]; ?>" alt="<?php the_title();?>"/>
				<?php
					} 
					else 
					{
				?>
					<img src="http://placehold.it/178x52&amp;text=No image found" alt="<?php the_title();?>" 
					class="img-responsive" />
				<?php 
					} 
				?>
					</a>
				</div>
			<?php			
			$i++;
			endwhile; 
			wp_reset_query();
			?>		
		</div>
	</div>
</section>
<!-- ser_brand_sec section end -->

<?php get_footer();?>