			<footer role="contentinfo">
			
					<div class="twelve columns footer">

						<div class="row">

							<nav class="ten columns clearfix">
								<?php bones_footer_links(); ?>
							</nav>

                            <p class="copyrights twelve columns">&copy; <?php echo date('Y'); ?> TEDxNMIMS</p>
                            <p class="ted-licensed six columns"> <?php bloginfo('name'); ?> is an independent TEDx event operated under license from TED.</p>
							<p class="attribution three columns"><a href="http://mehulved.github.com/tedx_wp_child_theme" id="credit" title="TEDx Wordpress Theme">TEDx Theme for Wordpress</a></p>
						</div>

					</div>
					
			</footer> <!-- end footer -->
		
		</div> <!-- end #container -->
		
		<!--[if lt IE 7 ]>
  			<script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
  			<script>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
		<![endif]-->
		
		<?php wp_footer(); // js scripts are inserted using this function ?>

	</body>

</html>
