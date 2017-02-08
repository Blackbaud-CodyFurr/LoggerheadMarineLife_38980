<div class="bb-search-wrap">   
	<form method="get" class="search-form form-inline" action="<?= esc_url(home_url('/')); ?>">
	  <div class="input-group">
	    <input type="search" value="<?= get_search_query(); ?>" name="s" class="search-field form-control" placeholder="<?php _e('Search', 'sage'); ?>" required>
	    <span class="input-group-btn">
	      <button type="submit" class="search-submit"><i class="fa fa-search"></i></button>
	    </span>
	  </div>
	</form>
</div>
