<?php if( have_rows('logo_slides', $widget->ID) ): ?>

    <div class="bb-widget-logo-slider carousel slide" data-ride="carousel">
        <!-- Controls -->
        <div class="slider-controls">
          <a class="left carousel-control" href="#widget-logo-slider" data-slide="prev">
            <i class="fa fa-angle-left"></i>
          </a>
          <a class="right carousel-control" href="#widget-logo-slider" data-slide="next">
            <i class="fa fa-angle-right"></i>
          </a>
        </div>
        <div class="bb-logo-slider__wrap">
            <div class="carousel-inner">
                <?php $count = 1; while( have_rows('logo_slides', $widget->ID) ): the_row(); 
                    $img = get_sub_field('logo');
                    $url = get_sub_field('website_link');
                ?>

                <div class="item logo-item <?php if($count == 1) { ?>active<?php } ?>">
                    <div class="bb-logo-slider__inner">
                        <?php if($url) { ?>
                            <a class="bb-logo-slider__logo-wrap" href="<?php echo $url; ?>" target="_blank"><img src="<?php echo $img; ?>" /></a>
                        <?php } else { ?>
                            <div class="bb-logo-slider__logo-wrap"><img src="<?php echo $img; ?>" /></div>
                        <?php } ?>
                    </div>
                </div>

                <?php $count++; endwhile; ?>
            </div>
        </div>
    </div>

<?php endif; ?>
