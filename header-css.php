<?php
	//---------------------------------------------------------------------------------------------------------------------------------------
	//Add inline custom styling
	$custom_style = '';
	$colors = get_field('config-colors', 'option');
	$header_font = get_field('config-header-font', 'option');
	$text_font = get_field('config-text-font', 'option');
	$alt_header_font = get_field('config-header-font-css', 'option');
	$alt_text_font = get_field('config-text-font-css', 'option');

	echo "<style>\n :root {\n";

	//Loop through the color settings and add them to CSS if they are set
	foreach($colors as $key => $value) {
		if($value) {
			$custom_style.= "--" . $key . ": " . $value . ";\n";
		}
	};

	//Set and add the contrast colors
	foreach($colors as $key => $value) {
		if($key == 'pri-color' || 'sec-color' || 'ter-color' && $value) {
			$con = check_contrast($value, '#FFFFFF') ? '#FFF' : '#444';
			$custom_style.= "--" . $key . "-con: " . $con . ";\n";
		}
	};

	//Check for header fonts and alternative header fonts and add them to inline style
	if($alt_header_font) :
		$custom_style.= "--header-font: '" . str_replace("+", " ", $alt_header_font) . "', Helvetica, Arial, sans-serif; \n";
	elseif($header_font['value']) :
		$custom_style.= "--header-font: '" .  str_replace("+"," ",$header_font['value']) . "', Helvetica, Arial, sans-serif; \n";
	endif;
	if($alt_text_font) :
		$custom_style.= "--text-font: '" . str_replace("+", " ", $alt_text_font) . "', Helvetica, Arial, sans-serif; \n";
	elseif($text_font['value']) :
		$custom_style.= "--text-font: '" .  str_replace("+"," ",$text_font['value']) . "', Helvetica, Arial, sans-serif \n";
	endif;

	$custom_style.= "}\n";

	//Set header height option
	if( get_field( 'override-header-height', 'option' ) ) : 
		$custom_style.= "@media screen and (min-width: 950px) { :root { --header-height:" . get_field('dev-header-height', 'option') . "}} \n";
	endif;

	//Override desktop -> mobile navigation breakpoint
	$mobNavBreakpoint = ( get_field('override-mob-navi-breakpoint', 'option') ) ? get_field('mob-navi-breakpoint', 'option') : 950;
	if( get_Field('override-mob-navi-breakpoint', 'option') ) : 
		$custom_style.= "@media screen and (max-width:" . get_field('mob-navi-breakpoint', 'option') . "px) {.nav-main, .nav-top { display:none; } .nav-mobile, .nav-trigger { display: block;}} \n";
	endif;



	// Add the font CSS:
	$selected_header_font = get_field('config-header-font', 'option' );
	$selected_text_font = get_field('config-text-font', 'option' );

	$selected_alternative_header_font = get_field('config-header-font-css', 'option');
	$selected_alternative_text_font = get_field('config-text-font-css', 'option');

	if(!$selected_alternative_header_font) :
		$header_font = 'https://fonts.googleapis.com/css?family=' . $selected_header_font['value'] . ':300,300i,400,400i,700i,700,900,900i';

		if($selected_header_font !== $selected_text_font && !$selected_alternative_text_font) :
			$body_font = 'https://fonts.googleapis.com/css?family=' . $selected_text_font['value'] . ':300,300i,400,400i,700i,700,900,900i';
		elseif($selected_alternative_text_font) :
			$body_font = 'https://fonts.googleapis.com/css?family=' . $selected_alternative_text_font . ':300,300i,400,400i,700i,700,900,900i';
		endif;
	else :
		$header_font = 'https://fonts.googleapis.com/css?family=' . $selected_alternative_header_font . ':300,300i,400,400i,700i,700,900,900i';
		
		if($selected_alternative_text_font) :
			$body_font = 'https://fonts.googleapis.com/css?family=' . $selected_alternative_text_font . ':300,300i,400,400i,700i,700,900,900i';
		else :
			$body_font = 'https://fonts.googleapis.com/css?family=' . $selected_text_font['value'] . ':300,300i,400,400i,700i,700,900,900i';
		endif;
	endif;

	$custom_style.= file_get_contents($header_font);
	$custom_style.= file_get_contents($body_font);

		
	echo $custom_style . "\n</style>\n";
	//---------------------------------------------------------------------------------------------------------------------------------------
	?>