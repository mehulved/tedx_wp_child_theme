<?php
/*
 * Template Name: Speakers
 */
?>

<?php get_header(); ?>
			
			<div id="content">
			
				<div id="main" class="twelve columns clearfix" role="main">

                    <?php
                    $args = array('post_type' => 'tedx_speakers', 'orderby' => 'name', 'order' => 'ASC', 'posts_per_page' => -1);

                    $loop = new WP_Query($args);

					if ($loop->have_posts()) : while ($loop->have_posts()) : $loop->the_post(); ?>
					
					<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
						
                        <div class="speaker four columns clearfix">

                            <section class="post_content clearfix" itemprop="articleBody">

                                <?php if (has_post_thumbnail()) { ?>

                                    <div class="speaker-photo" id="post-<?php the_ID(); ?>">

                                        <?php the_post_thumbnail(array(150,200), array('class' => 'alignleft speaker-image', 'id' => 'post-' . $post->ID )); ?>

                                    </div>

                                <?php }

                                the_title('<h3 class="speaker-name">','</h3>'); ?>

                                    <div class="speaker-content" id="post-<?php the_ID(); ?>" title="<?php the_title(); ?>">

                                    <?php the_content(); ?>

                                </div>

                            </section> <!-- end article section -->
                            
                        </div> <!-- end speaker block -->
						
					</article> <!-- end article -->
					
					<?php endwhile; ?>		
					
					<?php else : ?>
					
					<article id="post-not-found">
					    	<h3>No Speaker added as yet. Page will be updated soon. Please check again in a few days.</h3>
                    </article>
					
					<?php endif; ?>
			
				</div> <!-- end #main -->
    
			</div> <!-- end #content -->

<?php get_footer(); ?>
