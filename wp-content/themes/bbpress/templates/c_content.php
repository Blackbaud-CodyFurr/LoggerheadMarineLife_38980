
<article <?php post_class(); ?>>
  
  <header>
    <?php if(!has_post_format(array('aside', 'link'))) { ?>
      <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    <?php } ?>
      <?php get_template_part('templates/m__entry-meta'); ?>


  </header>
  
  <div class="entry-summary">
    <?php if ( has_post_format(array( 'video', 'audio' ))) { ?>
      <div class="bb-post-video__wrap">
          <?php the_content(); ?>
      </div>
    <?php } else if(has_post_format('aside')) { ?>
        <div class="bb-post-aside__wrap">
          <?php the_field('aside_content'); ?>
        </div>

    <?php } else if(has_post_format('chat')) { ?>
        <div class="bb-post-chat__wrap">
          <?php the_field('chat_transcript'); ?>
        </div>

    <?php } else if(has_post_format('link')) { ?>
        <div class="bb-post-link__wrap">
          <a href="<?php the_field('post_link'); ?>" target="_blank"><?php the_title(); ?></a>
        </div>

    <?php } else if(has_post_format('gallery')) { ?>
        <div class="bb-post-gallery__wrap">
          <?php 

          $images = get_field('gallery');

          if( $images ): ?>
              <div class="gallery">
                  <?php foreach( $images as $image ): ?>
                        <a href="<?php echo $image['url']; ?>" class="gallery-item">
                             <img src="<?php echo $image['sizes']['grid-template']; ?>" alt="<?php echo $image['alt']; ?>" />
                        </a>
                  <?php endforeach; ?>
              </div>
          <?php endif; ?>
        </div>


    <?php } else { ?>


    <?php if(has_post_thumbnail()) { ?>
      <div class="bb-post-with-img">
        <?php the_post_thumbnail('full'); ?>
      </div>
      <div class="bb-post-with-img-excerpt">
        <?php echo get_the_excerpt(); ?>
      </div>
    <?php } else { ?>
      <div class="bb-post-excerpt">
        <?php the_excerpt(); ?>
      </div>
    <?php } } ?>
  </div>
</article>

