
<?php
	// check if the flexible content field has rows of data
	if( have_rows('flex') ):

		// loop through the rows of data
		while ( have_rows('flex') ) : the_row();
			
			// first column loop
			get_template_part('acf-flex-single-loop');
			
		endwhile;
	endif;
?>