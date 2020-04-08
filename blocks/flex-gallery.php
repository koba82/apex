<?php

$gallery_type = get_sub_field('flex-gallery-type'); ?>	

<section class="content-wrap c-flex-gallery <?php getBackgroundColor(); ?>" >
    <div class="content" >
        <div class="content-animation">
            <?php
            
            if( get_sub_field('flex-gallery-title') ) :
                echo "<h2>";
                the_sub_field('flex-gallery-title');
                echo "</h2>";
            endif;
            
            $id = rand (9999, 99999);
            
            $gallery_images = get_sub_field('flex-gallery-images');
            if( $gallery_images && $gallery_type == 'slider' ): ?>
                <div class="flex-gallery slider-<?=$id; ?>">
                <?php
                    foreach( $gallery_images as $img ): ?>
                        <div class="flex-gallery-image">
                            <a class="content-image" href="<?php echo $img['sizes']['main-image-size']; ?>" data-lightbox-id="<?php echo $id; ?>">
                                <img src="<?php echo $img['sizes']['front-end-thumb']; ?>" alt="<?php echo $img['alt']; ?>" />
                                <div class="content-image-overlay"></div>
                            </a>
                        </div>
                    <?php endforeach; ?>
                    <span class="stretch"></span>
                </div>
                <?php
            endif;
            
            if( $gallery_images && $gallery_type == 'gallery' ): ?>
                <div class="flex-gallery-album">
                <?php
                    foreach( $gallery_images as $img ): ?>
                        <div class="flex-gallery-image content-image-wrap">
                            <a href="<?php echo $img['sizes']['main-image-size']; ?>" data-lightbox-id="<?php echo $id; ?>" class="content-image">
                                <img src="<?php echo $img['sizes']['front-end-thumb']; ?>" alt="<?php echo $img['alt']; ?>" />
                                <div class="content-image-overlay">	
                                    <div class="content-image-enlarge-icon">
                                        <div class="icon-plus"></div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; ?>
                    <span class="stretch"></span>
                </div>
                <?php
            endif;?>
        </div>
    </div>
    <script>
        window.addEventListener('load', function () {

            $('a[data-lightbox-id="<?php echo $id; ?>"]').simpleLightbox();

            var elem<?=$id; ?> = document.querySelector('.slider-<?=$id; ?>');
            var flkty<?=$id; ?> = new Flickity( elem<?=$id; ?>, {
                // options
                cellAlign: 'left',
                contain: false,
                percentPosition: false,
                freeScroll: true,
                wrapAround: false,
                autoPlay: false,
                pageDots: false,
                prevNextButtons: true,
                groupCells: 3,
                arrowShape: { 
                    x0: 10,
                    x1: 60, y1: 50,
                    x2: 60, y2: 50,
                    x3: 60
                }
            });
        });
    </script>
</section>