<?php
$slider_id = rand (9999, 99999);
$id = rand (9999, 99999);
$slider_autoplay = get_sub_field('slider-autoplay');
    if($slider_autoplay): $slider_autoplay_string = 'true'; else: $slider_autoplay_string = 'false'; endif;
$slider_interval = get_sub_field('slider-interval') * 100;
?>


<?php
//Text slider
if(get_sub_field('flex-slider-type') == 'text') { ?>

    <section class="content-wrap c-flex-slider <?php getBackgroundColor(); ?>" >
        <div class="content" >
            <div class="content-animation">
            <?php if(get_sub_field('flex-slider-header')) : ?>
                <h2><?php the_sub_field('flex-slider-header'); ?></h2>
            <?php endif; ?>
                <div class="flex-content-slider flex-slider flex-slider-<?php echo $slider_id; ?>">
                
                    <?php	
                    if ( have_rows( 'flex-slider-slides' ) ) :
                        while ( have_rows( 'flex-slider-slides' ) ) : the_row();	
                            if( get_row_layout() == 'the-slides' ): ?>
                                <div class="flex-slider-slide">
                                    <div class="flex-slider-content">
                                        <q><?php the_sub_field( 'the-slide-text' ); ?></q>
                                        <br><strong><?php the_sub_field( 'the-slide-text2'); ?></strong>
                                    </div>
                                </div>	
                            <?php endif;
                        endwhile;
                    endif;
                    ?>
                    
                </div>
            </div>
        </div>
    </section>

    <?php } 
    
//Image slider	
elseif(get_sub_field('flex-slider-type') == 'image' ) { ?>
    

    <section class="content-wrap c-flex-image-slider <?php getBackgroundColor(); ?>" >
        <div class="content" >
            <div class="content-animation">
            <?php if(get_sub_field('flex-slider-header')) : ?>
                <h2><?php the_sub_field('flex-slider-header'); ?></h2>
            <?php endif; ?>
                <div class="flex-image-slider">
                    <div class="flex-slider flex-slider-<?=$slider_id;?>">
                    
                    <?php
                    $gallery_images = get_sub_field('flex-gallery-images');
                    if( $gallery_images ): 
                        
                        foreach( $gallery_images as $gallery_single_image ): ?>
                            <div class="flex-slider-slide">
                            
                                <img src="<?=$gallery_single_image['sizes']['main-image-size']; ?>" alt="<?=$gallery_single_image['alt']; ?>" />
                                <a href="<?=$gallery_single_image['sizes']['main-image-size']; ?>" data-lightbox-id="<? echo $id; ?>">
                                    <div class="content-image-overlay">	
                                        <div class="content-image-enlarge-icon">
                                            <div class="icon-plus"></div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php endforeach;
                    endif; ?>
                    </div>
                </div>
            </div>	
        </div>
    </section>	
            
    <?php }
    
    //Text and image slider
    
    else {
        echo 'text and image slider';
    }; ?>
    
    
<script>
    window.addEventListener('load', function () {

        growToTallestElement('.flex-slider-<?=$slider_id; ?> .flex-slide-content','.flex-slider-<?=$slider_id; ?> .flickity-slider');

        var elem<?=$id; ?> = document.querySelector('.flex-slider-<?php echo $slider_id; ?>');
        var flkty<?=$id; ?> = new Flickity( elem<?=$id; ?>, {
            // options
            cellAlign: 'center',
            contain: true,
            freeScroll: false,
            wrapAround: true,
            autoPlay: true,
            pageDots: true,
            prevNextButtons: false,
            arrowShape: { 
                x0: 10,
                x1: 60, y1: 50,
                x2: 60, y2: 50,
                x3: 60
            }
        });
        
        $('a[data-lightbox-id="<?php echo $id; ?>"]').simpleLightbox();
    });
</script>