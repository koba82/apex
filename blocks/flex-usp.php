<?php
$usp_header = get_sub_field('flex-usp-header'); 
$usp_cta_link = get_sub_field('flex-usp-cta-link'); ?>

<section class="content-wrap c-flex-usp <?php getBackgroundColor(); ?>" >
    <div class="content">
        <div class="content-animation">
            <div class="usp-content-wrap">
                <div class="usp-header">
                    <h2><?php echo $usp_header; ?></h2>
                </div>
                <?php	
                if( have_rows('flex-usp-list')): ?>
                    <ul class="usp-list">
                        <?php
                        while( have_rows('flex-usp-list') ): the_row(); ?>
                            <li data-icon="&#xf17d;"><?php the_sub_field('flex-usp-list-item'); ?></li>
                        <?php
                        endwhile; ?>
                    </ul>
                <?php 
                endif; ?>
            </div>
            
            
            <?php
            if($usp_cta_link) :	?>
                <div class="flex-usp-button-wrap">
                    <a href="<?php echo $usp_cta_link; ?>" <?php if($open_new_window): ?>target="newwindow" <?php endif; ?>class="button flex-usp-button">
                        <span class="usp-text icon-calendar"><?php the_sub_field('flex-usp-cta-text'); ?></span>
                    </a>
                </div>
            <?php
            endif;?>
        </div>
    </div>
</section>