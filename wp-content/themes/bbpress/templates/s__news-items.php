<section id="bb-home-news-section">
   <div class="bb-section__wrap">
   	<div class="bb-section__outer">
			<div class="bb-home-news__title"><h2><?php the_field('section_title'); ?></h2></div>
			<div class="bb-home-news__callout"><a class="" href="<?php the_field('posts_page'); ?>"><?php the_field('all_posts_button_label'); ?></a></div>				
   	</div>
   	<div class="bb-section__outer">
         <?php 
         	$cats = get_field('posts_category'); 
         	$number = get_field('posts_number'); 
          foreach( $cats as $cat ) { 
         	query_posts(array('post_type' => 'post', 'cat' => $cat, 'posts_per_page' => $number)); 
         }
         	if (have_posts()) :
         	     while (have_posts()) : the_post(); ?>							
         	     <article class="bb-news__wrap">	
         			 <div class="bb-news__outer">
                     <?php if ( has_post_thumbnail() ) { ?>
            				<div class="bb-news__img-wrap">
                           <a href="<?php the_permalink(); ?>">      				        
               					<?php the_post_thumbnail('full'); ?>     					      
                           </a>
            				</div>
                     <?php } ?>
         				<div class="bb-news__excerpt-wrap">
         					<a class="bb-news-title" href="<?php the_permalink(); ?>"><?php the_title() ;?></a>								
         					<div class="bb-news-date"><?php the_time('j F Y') ?></div>
         					<div class="bb-news-excerpt"><?php the_excerpt(); ?></div>
         				 </div>
         			 </div>	
         		</article>	
         	<?php endwhile;
         	endif; 
         	?>
         	<?php wp_reset_query(); ?>
      </div>
   	<div class="bb-section__outer">
   		<div class="bb-news-callout__wrap">
            <a class="bb-news-callout-link" href="<?php the_field('posts_page'); ?>"><?php the_field('all_posts_button_label'); ?></a>
         </div>
   	</div>	
   
   </div>
</section>