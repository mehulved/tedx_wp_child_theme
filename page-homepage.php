<?php
/*
Template Name: Homepage
*/
?>

<?php get_header(); ?>
			
			<div id="content">
			
				<div id="main" class="twelve columns" role="main">
					
					<article role="article">
					
						<?php

						$orbit_slider = of_get_option('orbit_slider');
						if ($orbit_slider){

						?>
						
						<header>
						
							<div id="featured">

                            <?php
                                
                                $slider_images = get_option('tedx_slider_images', get_stylesheet_directory_uri() . '/images/tedx.png');

                                foreach ($slider_images as $image) {

                                    if ($image != '') {
                            ?>
                                        <img src="<?php echo $image; ?>" />
                    
                            <?php
                                    }
            
                                }
                            ?>
							</div>
							
						</header>

						<script type="text/javascript">
						   $(window).load(function() {
						       $('#featured').orbit({ 
						       	fluid: '16x6'
						       });
						   });
						</script>

						<?php } ?>

						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

						<section class="row post_content">
						
							<div class="home-main eight columns">
						
								<?php the_content(); ?>
								
							</div>
							
							<?php get_sidebar('sidebar1'); // sidebar 1 ?>
													
						</section> <!-- end article header -->
						
						<footer>
			
							<p class="clearfix"><?php the_tags('<span class="tags">Tags: ', ', ', '</span>'); ?></p>
							
						</footer> <!-- end article footer -->
					
					</article> <!-- end article -->
					
					<?php 
						// No comments on homepage
						//comments_template();
					?>
					
					<?php endwhile; ?>	
					
					<?php else : ?>
					
					<article id="post-not-found">
					    <header>
					    	<h1>Not Found</h1>
					    </header>
					    <section class="post_content">
					    	<p>Sorry, but the requested resource was not found on this site.</p>
					    </section>
					    <footer>
					    </footer>
					</article>
					
					<?php endif; ?>
			
				</div> <!-- end #main -->
    
				<?php //get_sidebar(); // sidebar 1 ?>
    
			</div> <!-- end #content -->

<?php get_footer(); ?>
