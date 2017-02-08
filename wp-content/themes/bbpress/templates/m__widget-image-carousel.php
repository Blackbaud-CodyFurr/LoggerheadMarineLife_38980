<?php 

$images = get_field('gallery', $widget->ID);

if( $images ): ?>
    <div class="bb-widget-img-carousel carousel slide">
        <div class="slider-controls">
            <a class="left carousel-control" href="#widget-img-carousel" data-slide="prev"><i class="fa fa-angle-left"></i></i></a>
            <a class="right carousel-control" href="#widget-img-carousel" data-slide="next"><i class="fa fa-angle-right"></i></i></a>
        </div>
        <div class="bb-widget-img-carousel__wrap">
            <div class="carousel-inner">
            <?php $count = 0;  foreach( $images as $image ): ?>
                <div class="item img-item <?php if($count == 0) { ?>active<?php } ?>">
                    <!-- <a href="<?php //echo $image['url']; ?>"> -->
                         <div class="bb-widget-img-carousel__img-wrap"><img src="<?php echo $image['sizes']['grid-template']; ?>" alt="<?php echo $image['alt']; ?>" /></div>
                    <!-- </a> -->
                    
                </div>
            <?php $count++; endforeach; ?>
            </div>
        </div>
    </div>
<?php endif; ?>
