
<?php
	// check if the flexible content field has rows of data
	if( have_rows('flex') ):

		// loop through the rows of data
		while ( have_rows('flex') ) : the_row();
			
			$row_layouts = array(
				0 =>	'flex-text',
				1 =>	'flex-image',
				2 =>	'flex-gallery',
				3 =>	'flex-slider',
				4 =>	'flex-youtube',
				5 =>	'flex-cta',
				6 =>	'flex-usp',
				7 =>	'flex-html',
				8 =>	'flex-php-include',
				9 =>	'flex-table',
				10=>	'flex-display-child-pages',
				11=>	'flex-form',
				12=>	'flex-mod-occasions',
				13=>	'flex-maps'
			);
			
			$row_layout = get_row_layout();
		
			if( in_array($row_layout, $row_layouts) && validateFlexItem(get_sub_field('flex-options')) ) :
		
				get_template_part('/blocks/' . $row_layout);
		
			endif;

		endwhile;
	endif;
?>