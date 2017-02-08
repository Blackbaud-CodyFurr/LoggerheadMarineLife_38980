<?php use Roots\Sage\Nav; ?>


<header id="bb-header">
  <div class="bb-header__top">
    <div class="bb-header__top-wrap">
      <div class="bb-header__top-inner">
        <div class="bb-nav__action-wrap">
            <nav class="bb-nav__action">
              <?php
                if (has_nav_menu('action_navigation')) {
                  wp_nav_menu(array(
                    'theme_location' => 'action_navigation', 
                    'menu_class' => 'bb-nav'
                  ));
                }
                ?>    
            </nav>       
            <?php get_search_form( $echo ); ?>                
        </div>
        <div class="bb-logo__wrap">
       
          <?php
            $image = get_field('logo', 'option'); 
            $size = 'large';
            $thumb = $image['sizes'][ $size ];
            $width = $image['sizes'][ $size . '-width' ];
            $height = $image['sizes'][ $size . '-height' ];
          ?>
          <a class="bb-logo" href="/">
            <img class="logo-regular" src="<?php echo $thumb; ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" style="max-width:<?php echo $width; ?>px" />
            <img class="logo-retina" src="<?php the_field("logo_retina", "option"); ?>" style="max-width:<?php echo $width; ?>px" />
          </a>

        </div>
      </div>
    </div>
  </div>
  <div class="bb-header__bottom">
    <div class="bb-header__bottom-wrap">   
      <div class="bb-header__bottom-inner">   
        <button id="hamburger" data-toggle="collapse" type="button" aria-controls="navbar" aria-expanded="false" data-target="#navbar">    
          <i class="fa fa-bars"></i>&nbsp;&nbsp;MENU
        </button>
      
        <nav id="navbar" class="bb-nav__primary">
          <?php
            if (has_nav_menu('primary_navigation')) :
              wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav navbar-nav bb-nav']);
            endif;
          ?>
        </nav>
      </div>
    </div>
  </div>
</header>





