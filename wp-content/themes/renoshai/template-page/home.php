<?php 
/* Template Name: Home 
*/ 
get_header();

global $post;
?>

<section class="banner">
	<div id="myCarousel" class="carousel slide" data-ride="carousel">
	  <!-- Wrapper for slides -->
	  <div class="carousel-inner" role="listbox">
		
		<!--******** START GETTING BANNER SLIDER (PART-1)*******-->
		  
		  <?php 
				$i=0;
				$args=array
						(
							'post_type'      => 'home_slider_post',
							'posts_per_page' => -1,
							'orderBy'        =>'DESC'
						);
				$slider = new WP_Query($args);
				
				while( $slider -> have_posts() ) : $slider -> the_post();
				if($i==0)
				{
			?>	
				<div class="item active">
				<?php 
					if ( has_post_thumbnail() )
					{
						$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'home_banner_size' );
				?>
						<img src="<?php echo $image[0]; ?>" alt="banner_img"/>
				<?php
					} 
					else 
					{
				?>
					<img src="http://placehold.it/1920x972&amp;text=No image found" alt="banner_img" class="img-responsive" />
              <?php 
				} 
			 ?>
				</div>
				
				<?php	
					$i++;
				}
				else
				{
			?>	
				<div class="item">
				<?php 
					if ( has_post_thumbnail() )
					{
						$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'home_banner_size' );
				?>
						<img src="<?php echo $image[0]; ?>" alt="banner_img"/>
				<?php
					} 
					else 
					{
				?>
					<img src="http://placehold.it/1920x972&amp;text=No image found" alt="banner_img" class="img-responsive" />
				<?php 
					} 
				?>
				</div>
		    <?php	
					$i++;
				}
				endwhile;
				wp_reset_query();
		    ?>	
		
		</div>
	</div>
</section> 
    
<!-- banner section  end-->
<section class="gallery_sec">
	<div class="container">
		<div class="gallery_content">
			<h2>Our Gallery</h2>
		</div>
		<div class="gallery_images">

			<div class="clearfix mosaicflow">
			
			   <?php 
				$args=array
						(
							'post_type'      => 'gallery_post',
							'posts_per_page' => 15,
							//'orderBy'        =>'rand'
							'orderby'=>'rand'
						);
				$gallery = new WP_Query($args);
				
				while( $gallery -> have_posts() ) : $gallery -> the_post();
				?>	
				 <div class="mosaicflow__item">
					<figure>
						<?php if ( has_post_thumbnail() ) 
					{
					$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
					?>
							<img src="<?php echo $image[0]; ?>" alt="<?php echo the_title();?>" />
					<?php
					} 
					else
					{ 
					?>
							<img src="http://placehold.it/355x227&amp;text=No image found" alt="<?php echo the_title(); ?>" class="img-responsive" />
					<?php 
					}
					?>
					</figure>

					<div class="portfolio_ovrlay">
						<div class="display-table">
							<div class="display-table-cell">
								<figure> <a href="<?php echo $image[0]; ?>" class="fancybox" rel="gallery1" title=""><i class="fa fa-search" aria-hidden="true"></i></a> </figure>
							</div>
						</div>
					</div>
					
				 </div>
				 <?php	
				   endwhile;
				   wp_reset_query();
				 ?>	
		   </div>		
		   <a class="button" href="<?php echo site_url();?>/gallery">View Gallery</a>
		 
	   </div>
	</div>
</section>
    
<!-- gallery section end -->
<section class="subscribe_sec" >
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h2>LET'S STAY CONNECTED</h2>
				<div class="subscribe_form">
					<div class="row">
						<div class="col-lg-offset-2 col-lg-8 col-lg-offset-2 col-md-offset-2 col-md-8 col-md-offset-2 col-sm-offset-1 col-lg-10 col-sm-offset-1">
							<form>
								<p><input type="text" placeholder="ENTER YOUR EMAIL" class="form-control"/><input type="submit" value="SUBSCRIBE" class="btn-sub"></p>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
    
<!--subscribe end-->
<section class="about_sec">
  <div class="container">
	  <div class="row">
		  <div class="col-sm-6">
			  <div class="about_content">
				  <h2><?php the_field('about_us_text',$post->ID);?></h2>
				  
					  <?php the_field('about_us_description',$post->ID);?>
			  </div>
		  </div>
		  <div class="col-sm-6">
			  <div class="about_img">
					<?php
					/*Getting  About US Image */
						$about_image=get_post_meta($post->ID,"about_us_image",true);
						$about = wp_get_attachment_image_src($about_image, 'about_image_size');	
					
						if(!empty($about))
						{
					?>
							 <img src="<?php echo $about[0];?>" alt="about_img">
					<?php 
						}
						else
						{
					?>		
							<img src="http://placehold.it/635x643&amp;text=No image found" alt="about_img">
					<?php	
						}
					?>
			  </div>
		  </div>
	  </div>
	  <div class="about_btn">
		  <a href="#" class="btn-see"> See More</a>
	  </div>
  </div>
</section>
<!-- about_sec section  End-->
    
<section class="testimonial_sec">
	<div class="container">
		<h2>Testimonials</h2>
		  <div id="myCarousel" class="carousel slide" data-ride="carousel">

			  <!-- Wrapper for slides -->
			  <div class="carousel-inner" role="listbox">
			  
				<?php 
					$args=array
					(
							'post_type'      =>'testimonial_post',
							'posts_per_page' => -1,
							'order'          => 'DESC',
					);
					$testimonial = new WP_Query($args);
					$i=1;
					$count_posts = $testimonial->found_posts;
					?>
			  
			  
				<div class="item <?php if($i==1) {echo 'active';}?>">
				  <div class="carousel-caption">
					 <div class="row">
						<?php 
						 while( $testimonial -> have_posts() ) : $testimonial -> the_post();
						?>
						 
							<div class="col-sm-6">
								<div class="test_info">
						
										<?php the_content();?>
									
									<h6><?php the_title();?></h6>
									
								</div>
							</div>
						<?php 
							if($i%2==0)
							{
								if($count_posts==$i)
								{
								?>
												</div>
											</div>
										</div>
								<?php 
								}
								else
								{
									//close the div first than start the new div	
								?>	
												</div>
											</div>
										</div>
										<div class="item">
											<div class="carousel-caption">
												<div class="row">
								<?php	
								}
								
							}
							$i++;
							endwhile; 
							wp_reset_query();
						?>		
						
					</div>
				  </div>
				</div>
                
				 
			  </div>
			</div>  
	</div>
</section>
<!-- testimonial section end -->
<section class="brand_sec">
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
<!-- brand section end -->

<?php get_footer();?>