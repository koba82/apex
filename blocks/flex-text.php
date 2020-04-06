<?php 

//$bgc = get_sub_field('flex-options');
//$has_bgc = ( $bgc['flex-bgc-select'] == 'geen' ) ? 'no-bgc' : 'bgc ' . $bgc['flex-bgc-select'];

$id = rand (9999, 99999);


//Text without image
if(get_sub_field('flex-text-add-image') == 'false') : ?>
    <section class="content-wrap c-flex-text <?php getBackgroundColor(); ?>">
        <div class="content">
            <div class="content-animation">
                <div class="flex-paragraph <?php the_sub_field('flex-text-spotlight'); ?>">
                
                    <?php
                    if(get_sub_field('flex-text-header')): ?> <h2 itemprop="description"> <?php the_sub_field('flex-text-header'); ?> </h2> <?php endif; 
                    
                    if(get_sub_field('flex-text-block')): the_sub_field('flex-text-block'); endif;
                    ?>
                    
                </div>
            </div>
        </div>
    </section>

<?php endif;

//Text WITH image	
if(get_sub_field('flex-text-add-image') == 'true' ) :

    $image = get_sub_field('flex-text-image'); ?>
     
    <section class="content-wrap c-flex-text <?=$has_bgc; ?>" >
        <div class="content <?php the_sub_field('flex-text-image-position'); ?>" >
            <div class="content-animation">
                <div class="flex-text-image-column <?php the_sub_field('flex-text-spotlight'); ?> text-col" >
                    <div class="flex-paragraph">	
                    <?php
                    if(get_sub_field('flex-text-header')): ?> 
                        <h2 itemprop="description"><?php the_sub_field('flex-text-header'); ?></h2>
                        <?php endif; the_sub_field('flex-text-block'); ?>
                    </div>
                </div>
                
                <div class="flex-text-image-column image-col">							
                    <div class="content-image-wrap">
                        <a href="<?php echo $image['sizes']['main-image-size']; ?>" data-lightbox-id="<? echo $id; ?>" class="content-image"> 
                            <img src="<?=$image['sizes']['main-image-size'];?>" alt="<?=$image['alt'];?>" />
                            <div class="img-as-background" style="background: url(<?=$image['sizes']['main-image-size'];?>); background-position: center center; background-size: cover;"></div>
                            <div class="content-image-overlay">	
                                <div class="content-image-enlarge-icon">
                                    <div class="icon-plus"></div>
                                </div>
                            </div>
                        </a>
                        <?php
                        $image_caption = $image['caption'];	
                        if($image_caption): ?>
                            <div class="content-image-text">
                                <span data-icon='&#xf1e4;'><?php echo $image_caption; ?></span>
                            </div>
                        <?php endif;?>
                    </div>
                </div>
            </div>
        </div>
        
        <script>
            window.addEventListener('load', function () {
                $('a[data-lightbox-id="<?php echo $id; ?>"]').simpleLightbox();
            });

        </script>
    </section>

<?php 

 endif;
