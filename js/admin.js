	jQuery(document).ready(function() {
		jQuery(".more-publishing-options").click(function() { 
			console.log("click");
			jQuery(".misc-pub-section").toggleClass("misc-pub-section-open"); 
		});
	});
	
	//jQuery(document).ready(function() {
	//	jQuery(".layout").not("-collapsed").addClass("-collapsed");
	//	
	//	jQuery(".layout").click(function() {
	//		jQuery(".layout").not("-collapsed").not(this).addClass("-collapsed");
	//	});
	//});
