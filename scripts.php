<script>
	
	function defer(method) {
	    if (window.jQuery) {
	        method();
	    } else {
	        setTimeout(function() { defer(method) }, 50);
	    }
	}
	
	defer(fireScripts);
	
function fireScripts() {
	//Touch drop down menu
		$('li.page_item_has_children').on("touchstart", function (e) {  
			'use strict';
			var link = $(this); 													
			if (link.hasClass('hover')) {
				return true;
			} else {
				link.addClass('hover');
				$('li.page_item_has_children').not(this).removeClass('hover');
				e.preventDefault();
				return false; 
			}
		});

	//Scroll offset event
		<?php
		$stickyHeaderBreakpoint = ( get_field('override-sticky-header-breakpoint', 'option') ) ? get_field('dev-sticky-header-breakpoint', 'option') : 500;
		$mobNavBreakpoint = ( get_field('override-mob-navi-breakpoint', 'option') ) ? get_field('mob-navi-breakpoint', 'option') : 950;
		?>

		if ( $( window ).width() > <?=$mobNavBreakpoint;?> ) {
			
			$(document).on("scroll",function(){
				if($(document).scrollTop()><?=$stickyHeaderBreakpoint; ?>){ 
					$(".page-wrapper").removeClass("scroll-top").addClass("scroll-offset");
				}
				else{
					$(".page-wrapper").removeClass("scroll-offset").addClass("scroll-top");
				}
			});

		}


	//Mobile navigation trigger
		$(document).ready(function(){
			$(".nav-trigger").click(function(){
				$( "body" ).toggleClass( "nav-open" , "nav-closed" );
				$( "body" ).toggleClass( "nav-closed" , "nav-open" );
			});
		});
		
	//Burger menu
		jQuery(document).ready(function() {
			
			jQuery(".menu-button").on("click", function() {
				jQuery(".nav-main").toggleClass("active");
				jQuery(".menu-button").toggleClass("active");
			});
			
		})

    //Menu hover for touch
    jQuery('.nav-main li.menu-item-has-children').on('touchstart', function (e) {
        'use strict'; //satisfy code inspectors
        let link = jQuery(this);
        if (link.hasClass('touch-hover')) {
            return true;
        } else {
            link.addClass('touch-hover');
            //$('a.taphover').not(this).removeClass('hover');
            e.preventDefault();
            return false; //extra, and to make sure the function has consistent return points
        }
    });

}
</script>