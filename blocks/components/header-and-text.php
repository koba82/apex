<?php
    if(get_sub_field('content-header-text')) :

        $header_and_text = get_sub_field('content-header-text');

        if($header_and_text['content-header']) : ?>
            <h2><?= $header_and_text['content-header']; ?></h2>
        <?php endif;

        if($header_and_text['content-text']) : ?>

            <div class="block-intro">
                <?= $header_and_text['content-text']; ?>
            </div>
        <?php endif;

    endif; ?>