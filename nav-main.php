<?php 
	
//First create an array of posts that have set "include-in-main-nav" set to true	
$nav_post_select = array(
	'post_type'  => 'page',
	'meta_value'   => 'include-in-main-nav',
	'posts_per_page' => -1
);

$nav_post_query = new WP_Query( $nav_post_select );
 
$nav_post_array = array();

	if ( $nav_post_query->have_posts() ) :

		$i = 0;
		
	    while ( $nav_post_query->have_posts() ) : $nav_post_query->the_post();    
			//Get ID of current post
	        $post_id = get_the_ID();
	        
			//Add the ID to the post array
			$nav_post_array[$i] = $post_id;
			
			//Increment the counter
			$i++;
	    
	    endwhile;
	wp_reset_postdata();    
	   
	endif;

//Now create the menu with the posts
wp_nav_menu( array( 	'theme_location' => 'primary', 
							'include' =>	$nav_post_array,
							'menu_class' => 'nav-wrap',
							
					) 
			); 
