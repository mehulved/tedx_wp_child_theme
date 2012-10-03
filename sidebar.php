				<div id="sidebar1" class="sidebar four columns" role="complementary">

					<div class="panel">
				
                        <ul class="sidebar-list">
                            <li id="search">
                                <?php get_search_form( $echo ); ?>
                            </li>
                            <li id="sm_sidebar">
                                <h2>Follow <?php echo get_bloginfo('name'); ?></h2>
                                <div class="textwidget">
                                    <a href="<?php echo get_bloginfo('rss2_url');?>" rel="alternate" type="application/rss+xml">
                                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/rss.png" alt="Subscribe to RSS Feed" />
                                    </a>
                                    <a href="<?php echo get_option('tedx_twitter_url'); ?>" rel="nofollow">
                                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/twitter.png" alt="Follow on Twitter" />
                                    </a>
                                    <a href="<?php echo get_option('tedx_fb_url'); ?>" rel="nofollow">
                                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/facebook.png" alt="Like on Facebook" />
                                    </a>
                                    <a href="<?php echo get_option('tedx_yt_url'); ?>" rel="nofollow">
                                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/youtube.png" alt="View Videos on Youtube" />
                                    </a>
                            </li>
                        </ul>

						<?php if ( is_active_sidebar( 'sidebar1' ) ) : ?>

							<?php dynamic_sidebar( 'sidebar1' ); ?>

                        <?php endif; ?>

					</div>

				</div>
