<?php
	
	// Add custom ACF flex loop fields below. 
	if( get_row_layout() == 'flex-buffet-group' ): ?>
	
	<section class="content-wrap flex-buffetten" >
		
		<?php
			
			if( have_rows('buffet') ):
			
			 	// loop through the rows of data
			    while ( have_rows('buffet') ) : the_row(); ?>
			    
			    	<div class="buffet-wrap">
				    	
				    	<div class="buffet-name"><h3><?php the_sub_field('buffet-name');?></h3></div>
				    	<div class="buffet-details"><?php the_sub_field('buffet-details');?></div>
				    	<div class="buffet-price"><?php the_sub_field('buffet-price');?></div>
			    	</div>
			    <?php
			    endwhile;
			
			endif; ?>
	
	
	</section>
	
	<?php
	endif;	
?>