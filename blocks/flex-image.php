
<?php

$image_array = get_sub_field('flex-image-array'); 
    $id = rand (9999, 99999); ?>
    
    <section class="content-wrap c-flex-image <?php getBackgroundColor(); ?>" >
        <div class="content" >
            <div class="content-animation">
                <?php if(get_sub_field('flex-title')) : ?>
                    <h2><?php the_sub_field('flex-title'); ?></h2>
                <?php endif; ?>
                <div class="content-image-group-wrap">
                    <?php if($image_array) :
                        foreach($image_array as $single_image) : ?>
                            <div class="content-image-wrap">
                                <a href="<?=$single_image['sizes']['main-image-size']; ?>" data-lightbox-id="<? echo $id; ?>" class="content-image" style="background: url(<?=$single_image['sizes']['main-image-size']; ?>); background-size: cover; background-position: center center;" title="<?=$single_image['alt']; ?>"> 
                                    <img src="<?=$single_image['sizes']['main-image-size']; ?>" alt="<?=$single_image['alt']; ?>" />
                                    <div class="content-image-overlay">	
                                        <div class="content-image-enlarge-icon">
                                            <div class="icon-plus"></div>
                                        </div>
                                    </div>
                                </a>
                        
                                <?php 
                                if($image['caption']): ?>
                                    <div class="content-image-text">
                                        <span data-icon="&#xf16a;"><?=$image['caption']; ?></span>
                                    </div>
                                <?php
                                endif;?>
                            </div>
                        <?php
                        endforeach;
                    endif;
                    ?>
                </div>
            </div>
        </div>
        
        <script>
            window.addEventListener('load', function () {
                
                jQuery("a[data-lightbox-id=<? echo $id; ?>] > img").each(function() {
                    let imageHeight = $(this).height();
                    let imageWidth = $(this).width();
                    
                    let imageMode = (imageHeight > imageWidth) ? 'portrait' : 'landscape';
                    
                    $(this).parent().parent().addClass(imageMode);
                });
                
                $('a[data-lightbox-id="<?php echo $id; ?>"]').simpleLightbox();

            });
        </script>
    </section>