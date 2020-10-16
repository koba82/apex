<?php
    $group_field = ($args['group-field']) ? $args['group-field'] : 'button-group';
    $button = get_sub_field($group_field);
    $icon = $button['icon-select'] ? $button['icon-select'] : false;

    if($button['button-link-type'] == 'no-link') :
        $link = false;
    else :
        $link = ($button['button-link-type'] == 'internal') ? $button['button-internal-link'] : ($button['button-link-type'] == 'external') ? $button['button-external-link'] : $button['button-file-link'];
    endif;

    echo ($link) ? '<a href="' . $link . '" class="button ' . $button['button-type'] . '">' : '<div class="button ' . $button['button-type'] . '">';
    if($button['icon-select'] !== '-') : ?><span class="icon-wrap small"><?php echo display_icon($button['icon-select']);?></span><?php endif; ?>
        <span class="cta-text"><?=$button['button-text']; ?></span>
    <?php echo ($link) ? '</a>' : '</div>';

