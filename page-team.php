<?php
/*
 * Template Name: Team
 */
?>

<?php get_header(); ?>
			
			<div id="content">
			
				<div id="main" class="twelve columns clearfix" role="main">

                    <?php
                    $args = array('post_type' => 'tedx_team', 'orderby' => 'date', 'order' => 'ASC', 'posts_per_page' => -1);

                    $loop = new WP_Query($args);

					if ($loop->have_posts()) : while ($loop->have_posts()) : $loop->the_post(); ?>
					
                    <div class="team-member twelve columns mobile-four clearfix">

                        <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
                            
                            <section class="post_content clearfix" itemprop="articleBody">

                                <?php the_title('<h3 class="member-name">','</h3>'); ?>

                                <div class="member-info three columns">
                                
                                    <div class="member-photo">

                                        <?php if (has_post_thumbnail()) {

                                            the_post_thumbnail('medium', array('class' => 'alignleft member-image')); 

                                        } ?>

                                    </div>

                                    <?php if (get_post_meta($post->ID, 'twitter', true) != '' || get_post_meta($post->ID, 'facebook', true) != '' || get_post_meta($post->ID, 'linkedin', true) != '') { ?>

                                        <div class="member-social">

                                            <?php if (get_post_meta($post->ID, 'facebook', true) != '') { ?>

                                                <a href="<?php echo get_post_meta($post->ID, 'facebook', true); ?>"><img src="<?php echo get_stylesheet_directory_uri() . '/images/team-fb.png'; ?>" alt="facebook profile" class="member-fb" /></a>

                                            <?php } ?>

                                            <?php if (get_post_meta($post->ID, 'linkedin', true) != '') { ?>

                                                <a href="<?php echo get_post_meta($post->ID, 'linkedin', true); ?>"><img src="<?php echo get_stylesheet_directory_uri() . '/images/team-linkedin.png'; ?>" alt="linkedin profile" class="member-linkedin" /></a>

                                            <?php } ?>

                                            <?php if (get_post_meta($post->ID, 'twitter', true) != '') { ?>

                                                <a href="<?php echo get_post_meta($post->ID, 'twitter', true); ?>"><img src="<?php echo get_stylesheet_directory_uri() . '/images/team-twitter.png'; ?>" alt="twitter profile" class="member-twitter" /></a>

                                            <?php } ?>

                                        </div>

                                    <?php } ?>

                                </div>

                                <div class="member-description nine columns">

                                    <?php the_content(); ?>

                                </div> <!-- end member description -->
                        
                            </section> <!-- end article section -->
                            
                        </article> <!-- end article -->
        
                    </div>
					
					<?php endwhile; ?>		
					
					<?php else : ?>
					
					<article id="post-not-found">
					    	<h3>No Team members added as yet. Page will be updated soon. Please check again in a few days.</h3>
					</article>
					
					<?php endif; ?>
			
				</div> <!-- end #main -->
    
			</div> <!-- end #content -->

<?php get_footer(); ?>
