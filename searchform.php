<div class="row">
  <div class="twelve columns">
    <div class="row collapse">
    	<form action="<?php echo home_url( '/' ); ?>" method="get">
	      <div class="eight mobile-three columns">
	        <input type="text" id="search" placeholder="Search" name="s" value="<?php the_search_query(); ?>" />
	      </div>
	      <div class="four mobile-one columns">
          <input type="image" id="search-submit" class="postfix button" src="<?php bloginfo('stylesheet_directory');?>/images/search.png" />
	      </div>
  		</form>
    </div>
  </div>
</div>
