<script>
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
		//var w = Math.max(document.documentElement.clientWidth, window.innerWidth || 0);
		
		$(".nav-mobile").html($(".nav-wrap").html());
		$(".nav-mobile").append($(".nav-top").html());

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
	
//Set height of elements to height of tallest element

	let growToTallestElement = function(sourceElements, targetElement) {
		
		let elHeight = 0;
		
		$(sourceElements).each(function() {
			if ( $(this).height() > elHeight ) {
				elHeight = $(this).height();
			}
		
		$(targetElement).css("height", elHeight);
		})
		
	};
	
//Initialize aos.js (animate on scroll)
    AOS.init({
      offset: <?php if ( get_field('aos-offset', 'option') ) : the_field('aos-offset', 'option'); else : echo '240'; endif; ?>,
      duration: <?php if ( get_field('aos-duration', 'option') ) : the_field('aos-duration', 'option'); else : echo '400'; endif; ?>,
      easing: '<?php if ( get_field('aos-easing', 'option') ) : the_field('aos-easing', 'option'); else : echo 'ease-out'; endif; ?>',
      delay: <?php if ( get_field('aos-delay', 'option') ) : the_field('aos-delay', 'option'); else : echo '0'; endif; ?>,
      once: true
    });
	
</script>