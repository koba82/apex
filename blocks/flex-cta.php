<?php

$flex_cta_item = get_sub_field('flex-cta-object');
			
//Count buttons and decide for 1, 2 or 3 buttons per row. 
$buts = count($flex_cta_item);
( $buts == 1 ) ? $data_row_items = 1 : ( ( in_array($buts, array(2,4,8,10,14)) ) ? $data_row_items = 2 : $data_row_items = 3 ); 
        
//See if any of the buttons contain an image. If so, add 'large-button' class so all buttons are the same size.
$no_of_large_buttons = 0;
foreach($flex_cta_item as $item) :
    if($item['flex-cta-image-option']) :
        $no_of_large_buttons++;
    endif;
endforeach;

$xl_but = ($no_of_large_buttons > 0) ? 'large-button' : ''; ?>

<section class="content-wrap c-flex-cta <?php getBackgroundColor(); ?> <?php echo ($xl_but) ? 'has-large-buttons' : ''; ?>" >
    <div class="content" >
        <div class="content-animation">
            
            <?php if(get_sub_field('flex-title')) : ?>
                <h2><?php the_sub_field('flex-title'); ?></h2>
            <?php endif; ?>
            <?php if(get_sub_field('flex-text')) : ?>
                <div class="cta-text-intro"><?php the_sub_field('flex-text'); ?></div>
            <?php endif; ?>
            
            <div class="flex-cta" data-row-items="<?=$data_row_items; ?>">	
    
    <?php		
    //creating the buttons
    if( $flex_cta_item ): 
        foreach( $flex_cta_item as $item ):
            $is_link = true;
            
            //Determine CTA type
            switch($item['flex-cta-type']) {
                case "internal" :
                    $cta_link = $item['flex-cta-link'];
                    $open_new_window = false;
                    break;
                case "file" :
                    $cta_link = $item['flex-cta-file']['url'] ;
                    $open_new_window = true;
                    break;
                case "external" :
                    $cta_link = $item['flex-cta-external-link'];
                    $open_new_window = true;
                    break;
                default:
                    $cta_link = '#' ;
                    $is_link = false;
            }; ?>

                    <div class="flex-cta-button-wrap">
                    <?php 
                    //If link, build a link, else create a div
                    if($is_link) : ?>
                        <a href="<?=$cta_link; ?>" <?php if($open_new_window): ?>target="new_window" <?php endif; ?>
                        class="button flex-cta-button <?=$xl_but; ?> <?php if($item['flex-cta-image-option']) : echo "has-image"; else : echo "has-no-image"; endif; ?>"><?php 
                    else : ?>
                        <div class="flex-cta-button <?=$xl_but; ?>"> <?php
                    endif; ?>										
                        <?php if($item['flex-cta-image-option']) : ?>
                            <div class="flex-cta-image">
                                <img src="<?=$item['flex-cta-image']['sizes']['front-end-thumb']; ?>" alt="<?=$item['flex-cta-image']['alt']; ?>" />
                            </div>
                        <?php endif; ?>
                    <?php if($item['flex-cta-icon'] !== '-') { echo '<div class="cta-icon" data-icon="&#' . $item['flex-cta-icon'] . ';"></div>'; }; ?>
                    <span class="cta-text"><?=$item['flex-cta-text']; ?></span>
                    <?php 
                    //Close link or div	
                    if($is_link) : ?></a><?php else : ?></div> <?php endif; ?>
                </div>
                    
                <?php 
            endforeach;
            endif; ?>
                
            </div>
        </div>
    </div>
</section>