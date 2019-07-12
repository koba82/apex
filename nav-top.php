<?php 
	
//First create an array of posts that have set "include-in-main-nav" set to true	
$top_nav_post_select = array(
	'post_type'  => 'page',
	'meta_value'   => 'include-in-top-nav'
);

$top_nav_post_query = new WP_Query( $top_nav_post_select );
 
$top_nav_post_array = array();

	if ( $top_nav_post_query->have_posts() ) :

		$i = 0;
		
	    while ( $top_nav_post_query->have_posts() ) : $top_nav_post_query->the_post();    
			//Get ID of current post
	        $post_id = get_the_ID();
	        
			//Add the ID to the post array
			$top_nav_post_array[$i] = $post_id;
			
			//Increment the counter
			$i++;
	    
	    endwhile;
	wp_reset_postdata();    
	   


    //Now create the menu with the posts- note: still in if-statement, because if $top_nav_post_query is empty, we want to hide the menu.
    wp_nav_menu( array( 	'theme_location' => 'secondary', 
                                'include' => $top_nav_post_array,
                                'menu_class' => 'nav-top'
                                
                        ) 
                ); 

	endif; 


