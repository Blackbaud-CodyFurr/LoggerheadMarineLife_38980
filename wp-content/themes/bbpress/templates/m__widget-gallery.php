<?php 

$images = get_field('gallery', $widget->ID);

if( $images ): ?>
    <ul class="widget-gallery">
        <?php foreach( $images as $image ): ?>
            <li>
                <!-- <a href="<?php //echo $image['url']; ?>"> -->
                     <img src="<?php echo $image['sizes']['grid-template']; ?>" alt="<?php echo $image['alt']; ?>" />
                <!-- </a> -->
                <p class="gallery-caption"><?php echo $image['caption']; ?></p>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>