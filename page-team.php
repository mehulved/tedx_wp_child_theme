<?php
/*
 * Template Name: Team
 */
?>

<?php get_header(); ?>
			
			<div id="content">
			
				<div id="main" class="eight columns clearfix" role="main">

                    <?php
                    $args = array('post_type' => 'tedx_team');

                    $loop = new WP_Query($args);

					if ($loop->have_posts()) : while ($loop->have_posts()) : $loop->the_post(); ?>
					
					<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
						
						<section class="post_content clearfix" itemprop="articleBody">

                            <?php the_title('<h2>','</h2>'); 
                            
                            if (has_post_thumbnail()) {

                                the_post_thumbnail('medium');

                            }

							the_content(); ?>
					
						</section> <!-- end article section -->
						
					</article> <!-- end article -->
					
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
    
				<?php get_sidebar(); // sidebar 1 ?>
    
			</div> <!-- end #content -->

<?php get_footer(); ?>
