<?php

//Add the acf_form_head the the admin header. Needed to make acf_form work.
//function add_acf_form_head_to_header() {
//	acf_form_head();
//}
//add_action( 'admin_head', 'add_acf_form_head_to_header' );

//**********************************************************************************************************************
//	Apex Version
//**********************************************************************************************************************
	
	function apex_version( $arg ) {
		
		$apex_main_version = "0.9";
		$apex_sub_version = ".0";
		$apex_version_date = "17-1-2020";
		
		if( $arg == 'main') :
			return $apex_main_version;
		elseif( $arg == 'sub' ) :
			return $apex_sub_version;
		elseif( $arg == 'date' ) :
			return $apex_version_date;
		endif;
	}
	
	
//**********************************************************************************************************************
//	Use classic editor instead of Gutenberg
//**********************************************************************************************************************
	
		add_filter('use_block_editor_for_post', '__return_false');

//**********************************************************************************************************************
//	Include ACF plugin
//**********************************************************************************************************************

	// 1. customize ACF path
	add_filter('acf/settings/path', 'my_acf_settings_path');
	 
	function my_acf_settings_path( $path ) {
	 
	    // update path
	    $path = get_template_directory_uri() . '/plugin/advanced-custom-fields-pro/';
	    
	    // return
	    return $path;
	    
	}
 

	// 2. customize ACF dir
	add_filter('acf/settings/dir', 'my_acf_settings_dir');
	 
	function my_acf_settings_dir( $dir ) {
	 
	    // update path
	    $dir = get_template_directory_uri() . '/plugin/advanced-custom-fields-pro/';
	    
	    // return
	    return $dir;
	    
	}

	// 4. Include ACF
	include_once( get_template_directory() . '/plugin/advanced-custom-fields-pro/acf.php' );
	
	
//**********************************************************************************************************************
//	Include other plugins
//**********************************************************************************************************************

	include_once( get_template_directory() . '/plugin/envisic-custom-dashboard/envisic-custom-dashboard.php' );
	include_once( get_template_directory() . '/plugin/advanced-custom-fields-table-field/acf-table.php' );

//**********************************************************************************************************************
//	Remove Emojicons
//**********************************************************************************************************************

	function disable_wp_emojicons() {
	
		remove_action( 'admin_print_styles', 'print_emoji_styles' );
		remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
		remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
		remove_action( 'wp_print_styles', 'print_emoji_styles' );
		remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
		remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
		remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
	

		add_filter( 'tiny_mce_plugins', 'disable_emojicons_tinymce' );
	}
	
	add_action( 'init', 'disable_wp_emojicons' );
	
	function disable_emojicons_tinymce( $plugins ) {
		if ( is_array( $plugins ) ) {
			return array_diff( $plugins, array( 'wpemoji' ) );
		} else {
			return array();
		}
	}

	
//**********************************************************************************************************************
//	Load stylesheets
//**********************************************************************************************************************

	// Load module stylesheets
	if ( ! function_exists( 'theme_enqueue_module_styles' ) ) {
		function theme_enqueue_module_styles() {
			if(get_sub_field('module-real-estate', 'option') == "true" ) : 
				wp_enqueue_style( 'module-real-estate', get_template_directory_uri() .'/modules/module-real-estate/module-real-estate.css', array(), false, 'all');
			endif;
		}
		add_action( 'wp_enqueue_scripts', 'theme_enqueue_module_styles' );
	};
	
	// Load Google Fonts for backend display
	if ( ! function_exists( 'enqueue_goolge_fonts_backend' ) ) {
		function enqueue_goolge_fonts_backend() {

			wp_enqueue_style( 'google-fonts-Open-sans', 'https://fonts.googleapis.com/css?family=Open+Sans:400' , array(), false, 'all');
			wp_enqueue_style( 'google-fonts-Merriweather', 'https://fonts.googleapis.com/css?family=Merriweather:400' , array(), false, 'all');
			wp_enqueue_style( 'google-fonts-Roboto', 'https://fonts.googleapis.com/css?family=Roboto:400' , array(), false, 'all');
			wp_enqueue_style( 'google-fonts-Playfair', 'https://fonts.googleapis.com/css?family=Playfair+Display:400' , array(), false, 'all');
			wp_enqueue_style( 'google-fonts-Montserrat', 'https://fonts.googleapis.com/css?family=Montserrat+Alternates:400' , array(), false, 'all');
			wp_enqueue_style( 'google-fonts-Playfair', 'https://fonts.googleapis.com/css?family=Playfair+Display:400' , array(), false, 'all');
			wp_enqueue_style( 'google-fonts-Spectral', 'https://fonts.googleapis.com/css?family=Spectral:400' , array(), false, 'all');
			wp_enqueue_style( 'google-fonts-Josefin', 'https://fonts.googleapis.com/css?family=Josefin+Slab:400' , array(), false, 'all');
			wp_enqueue_style( 'google-fonts-Arima', 'https://fonts.googleapis.com/css?family=Arima+Madurai:400' , array(), false, 'all');
			wp_enqueue_style( 'google-fonts-Dancing+Script', 'https://fonts.googleapis.com/css?family=Dancing+Script:400' , array(), false, 'all');
			wp_enqueue_style( 'google-fonts-Trirong', 'https://fonts.googleapis.com/css?family=Trirong:400' , array(), false, 'all');
			wp_enqueue_style( 'google-fonts-Zilla+Slab', 'https://fonts.googleapis.com/css?family=Zilla+Slab:400' , array(), false, 'all');
			wp_enqueue_style( 'google-fonts-Arima', 'https://fonts.googleapis.com/css?family=Arima+Madurai:400' , array(), false, 'all');
			wp_enqueue_style( 'google-fonts-Zilla+Slab', 'https://fonts.googleapis.com/css?family=Zilla+Slab:400' , array(), false, 'all');
			wp_enqueue_style( 'google-fonts-Nunito', 'https://fonts.googleapis.com/css?family=Nunito:400' , array(), false, 'all');
			wp_enqueue_style( 'google-fonts-Montserrat', 'https://fonts.googleapis.com/css?family=Montserrat:400' , array(), false, 'all');
			wp_enqueue_style( 'google-fonts-Raleway', 'https://fonts.googleapis.com/css?family=Raleway:400' , array(), false, 'all');
			wp_enqueue_style( 'google-fonts-Permanent-marker', 'https://fonts.googleapis.com/css?family=Permanent+Marker' , array(), false, 'all');
			wp_enqueue_style( 'google-fonts-Pacifico', 'https://fonts.googleapis.com/css?family=Pacifico' , array(), false, 'all');

		}
	  add_action( 'admin_enqueue_scripts', 'enqueue_goolge_fonts_backend' );
	};

	//Remove Gutenberg block styles
	add_action( 'wp_print_styles', 'wps_deregister_styles', 100 );
	function wps_deregister_styles() {
		wp_dequeue_style( 'wp-block-library' );
	}

	//Start timer to measure time it took the server to bundle the CSS
	//$start = microtime(true);

	$developer_mode = get_field('dev-mode', 'option');

	if ( ! function_exists( 'bundle_css' ) && $developer_mode ) {
		function bundle_css() {
	
			//$theme_sub_style_sheet = get_field('config-theme', 'option');
			//$template_uri = get_template_directory_uri();

			//Bundle CSS files
			//$cssFiles = array(
			//	'/css/aos.css',
			//	'/css/flickity.css',
			//	'/css/reset.css',
			//	'/css/simplelightbox.css',
			//	'/css/style.css',
			//	'/css/' . $theme_sub_style_sheet,
			//	'/css/override.css'
			//);
			
			//$buffer = "";
			//foreach ($cssFiles as $cssFile) {
			//	$buffer .= file_get_contents($template_uri . $cssFile);
			//}
			// Remove comments
			//$buffer = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $buffer);
			// Remove space after colons
			//$buffer = str_replace(': ', ':', $buffer);
			// Remove whitespace
			//$buffer = str_replace(array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $buffer);
			//$file = get_template_directory() . '/bundled-min.css';
			//file_put_contents($file, $buffer ) or print_r(error_get_last()); 


			

			wp_enqueue_style( 'bundled-css', get_template_directory_uri() .'/bundled-min.css', array(), false, 'all');
			
		};
	add_action('wp_enqueue_scripts', 'bundle_css', 10);
	};
	
	//Stop the timer - measure time it took the server to bundle the CSS
	//$GLOBALS['time_elapsed_secs'] = microtime(true) - $start;

	//Load bundled stylesheet
	
	if ( ! function_exists( 'theme_enqueue_bundled_styles_non_dev' ) && !$developer_mode ) {
		function theme_enqueue_bundled_styles_non_dev() {

			$theme_sub_style_sheet = get_field('config-theme', 'option');

			wp_enqueue_style( 'aos', get_template_directory_uri() .'/css/aos.css', array(), false, 'all');
			wp_enqueue_style( 'flickity', get_template_directory_uri() .'/css/flickity.css', array(), false, 'all');
			wp_enqueue_style( 'reset', get_template_directory_uri() .'/css/reset.css', array(), false, 'all');
			wp_enqueue_style( 'style', get_template_directory_uri() .'/css/style.css', array(), false, 'all');
			wp_enqueue_style( 'sub-theme-style', get_template_directory_uri() .'/css/' . $theme_sub_style_sheet, array(), false, 'all');
			wp_enqueue_style( 'override', get_template_directory_uri() .'/css/override.css', array(), false, 'all');
			//wp_enqueue_style( 'bundled-css', get_template_directory_uri() .'/bundled-min.css', array(), false, 'all');
		}
		add_action( 'wp_enqueue_scripts', 'theme_enqueue_bundled_styles_non_dev' );
	};
	
	
//**********************************************************************************************************************
//	Load JavaScript
//**********************************************************************************************************************
	
	// Check if child theme has not already added stylesheets
	if ( ! function_exists( 'theme_enqueue_third_party_javascript' ) ) {
		function theme_enqueue_third_party_javascript() {
			//wp_enqueue_script( 'bundled-js', get_template_directory_uri() . '/js/bundle.js', array(), false, false );
			wp_enqueue_script( 'reCaptcha', 'https://www.google.com/recaptcha/api.js', array(), false, false );
			//wp_enqueue_script( 'jQuery', '//code.jquery.com/jquery-1.11.3.min.js', array(), false, false );
			//wp_enqueue_script( 'flickety-js', get_template_directory_uri() . '/js/flickity.pkgd.js', array(), false, false );
			//wp_enqueue_script( 'simplelightbox-js', get_template_directory_uri() . '/js/simple-lightbox.js', array(), false, false );
			//wp_enqueue_script( 'aos-js', get_template_directory_uri() . '/js/aos.js', array(), false, false );
			//wp_enqueue_script( 'isotope', get_template_directory_uri() . '/js/isotope.js' , array('jQuery'), false, false );
		}
	  add_action( 'wp_enqueue_scripts', 'theme_enqueue_third_party_javascript' );
	};

	
//**********************************************************************************************************************
//	Load admin style & javascript
//**********************************************************************************************************************

	function apex_theme_style() {
		wp_enqueue_style('apex-admin-theme', get_template_directory_uri() . '/admin-style.css', __FILE__);
	}
	add_action('admin_enqueue_scripts', 'apex_theme_style');
	add_action('login_enqueue_scripts', 'apex_theme_style');
	
	if ( ! function_exists( 'enqueue_admin_javascript' ) ) {
		function enqueue_admin_javascript() {
			wp_enqueue_script( 'admin-js', get_template_directory_uri() . '/js/admin.js', array(), false, false );
		}
	  add_action( 'admin_enqueue_scripts', 'enqueue_admin_javascript' );
	};

	
//**********************************************************************************************************************
//	Custom image sizes
//**********************************************************************************************************************	

	if ( ! function_exists( 'add_custom_image_sizes' ) ) {
	    function add_custom_image_sizes() {
			add_image_size( 'image-gallery-thumbnail-size', 250, 250, true );
			add_image_size( 'main-image-size', 1300, 1000 );
			add_image_size( 'front-end-thumb', 550, 550, true );
			add_image_size( 'back-end-thumb', 30, 30, true );
			
			// Header/Hero image sizes
			add_image_size( 'hero-2500', 2500, 1260, true );
			add_image_size( 'hero-1980', 1980, 1080, true );
			add_image_size( 'hero-1280', 1280, 1000, true );
			add_image_size( 'hero-770', 770, 500, true );
			add_image_size( 'hero-640', 640, 300, true );
			add_image_size( 'hero-480', 480, 300, true );
	    }
		add_custom_image_sizes();
	}
	
//**********************************************************************************************************************
//	Front-end image customisation
//**********************************************************************************************************************

	//Remove image links by default
	function wpb_imagelink_setup() {
		$image_set = get_option( 'image_default_link_type' );
			if ($image_set !== 'none') {
				update_option('image_default_link_type', 'none');
			}
	}
	add_action('admin_init', 'wpb_imagelink_setup', 10);
	
	// Add SVG support (or rather remove SVG restriction)
	function custom_upload_mimes ( $existing_mimes=array() ) {

	// add the file extension to the array
	$existing_mimes['svg'] = 'mime/type';

	// call the modified list of extensions
	return $existing_mimes;
}	
	
//**********************************************************************************************************************
//	ACF options page
//**********************************************************************************************************************

	if( function_exists('acf_add_options_page') ) {
		acf_add_options_page(array(
			'page_title' 	=> 'Configuratie',
			'menu_title'	=> 'Configuratie',
			'menu_slug' 	=> 'theme-general-settings',
			'capability'	=> 'edit_posts',
			'redirect'		=> false
		));
		
		//acf_add_options_sub_page(array(
		//	'page_title' 	=> 'Contactformulier',
		//	'menu_title'	=> 'Contactformulier',
		//	'parent_slug'	=> 'theme-general-settings',
		//));
		//
		//acf_add_options_sub_page(array(
		//	'page_title' 	=> 'Unieke punten',
		//	'menu_title'	=> 'Unieke punten',
		//	'parent_slug'	=> 'theme-general-settings',
		//));
	}

	
//**********************************************************************************************************************
//	Remove menu's, widgets, links etc from admin
//**********************************************************************************************************************

	//Remove menu's
	if( ! function_exists( 'remove_menus' ) ) {
		function remove_menus(){
		  //remove_menu_page( 'index.php' );
		  remove_submenu_page( 'index.php', 'update-core.php' );  //Update
		  remove_submenu_page( 'index.php', 'index.php' );  //index submenu
		  remove_menu_page( 'edit.php' );           //Posts
		  remove_menu_page( 'edit-comments.php' );  //Comments
		}
		add_action( 'admin_menu', 'remove_menus' );
	};
	
	//Remove tools menu only if current user is not administrator
	if( ! current_user_can('administrator') ) {
		function remove_tools_menu() {
			remove_menu_page( 'tools.php' );        //Tools
		};
		add_action( 'admin_menu', 'remove_tools_menu' );
	}
	

	//Remove dashboard widgets
	if( ! function_exists( 'remove_dashboard_meta' ) ) {
	  function remove_dashboard_meta() {
			  $user = wp_get_current_user();
			  if (!$user -> has_cap ('manage_options'))
			  remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
			  remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );
			  remove_meta_box( 'dashboard_primary', 'dashboard', 'normal' );
			  remove_meta_box( 'dashboard_secondary', 'dashboard', 'normal' );
			  remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
			  remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );
			  remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
			  remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
			  remove_meta_box( 'dashboard_activity', 'dashboard', 'normal');
		  } 
	  add_action( 'admin_init', 'remove_dashboard_meta' ); 
	};

	//Remove columns from posts/pages overview page (Page table)
	if( ! function_exists( 'custom_column_init' ) ) {
	  function my_manage_columns( $columns ) {
		unset($columns['comments']);	//Comments
		unset($columns['author']);	//Author
		unset($columns['cb']);		//Checkbox
		return $columns;
	}
  
	function custom_column_init() {
		add_filter( 'manage_posts_columns' , 'my_manage_columns' );
		add_filter( 'manage_pages_columns' , 'my_manage_columns' );
	}
	add_action( 'admin_init' , 'custom_column_init' );
	};

	// Remove personal options from profile page, removes the `profile.php` admin color scheme options
	remove_action( 'admin_color_scheme_picker', 'admin_color_scheme_picker' );
	if ( ! function_exists( 'rdm_remove_personal_options' ) ) {
		// removes the leftover 'Visual Editor', 'Keyboard Shortcuts' and 'Toolbar' options.
		function rdm_remove_personal_options( $subject ) {
			$subject = preg_replace( '#<h3>Personal Options</h3>.+?/table>#s', '', $subject, 1 );
			return $subject;
		}
		function rdm_profile_subject_start() {
			ob_start( 'rdm_remove_personal_options' );
		}
		function rdm_profile_subject_end() {
			ob_end_flush();
		}
	}
	add_action( 'admin_head-profile.php', 'rdm_profile_subject_start' );
	add_action( 'admin_footer-profile.php', 'rdm_profile_subject_end' );
	class RDM_User_Caps {
	// add some filters
	function RDM_User_Caps(){
		add_filter( 'editable_roles', array(&$this, 'editable_roles'));
		add_filter( 'map_meta_cap', array(&$this, 'map_meta_cap'),10,4);
	}
	
	// remove 'Administrator' from the list of roles if the current user is not an admin
	function editable_roles( $roles ){
		if( isset( $roles['administrator'] ) && !current_user_can('administrator') ){
		unset( $roles['administrator']);
	}
	return $roles;
	}
	
	// don't allow users to edit or delete unless they are an admin
	function map_meta_cap( $caps, $cap, $user_id, $args ){
		switch( $cap ){
			case 'edit_user':
			case 'remove_user':
			case 'promote_user':
				if( isset($args[0]) && $args[0] == $user_id )
				break;
				elseif( !isset($args[0]) )
					$caps[] = 'do_not_allow';
					$other = new WP_User( absint($args[0]) );
					if( $other->has_cap( 'administrator' ) ){
						if(!current_user_can('administrator')){
							$caps[] = 'do_not_allow';
						}
					}
				break;
			case 'delete_user':
			case 'delete_users':
				if( !isset($args[0]) )
				break;
				$other = new WP_User( absint($args[0]) );
				if( $other->has_cap( 'administrator' ) ){
				if(!current_user_can('administrator')){
				$caps[] = 'do_not_allow';
				}
				}
			break;
			default:
			break;
			}
			return $caps;
		}
	}
	$rdm_user_caps = new RDM_User_Caps();

	// Customize admin menu bar items
	function mytheme_admin_bar_render() {
		global $wp_admin_bar;
		
		// Remove an existing link using its $id
		$wp_admin_bar->remove_menu('updates');
		$wp_admin_bar->remove_menu('comments');
		$wp_admin_bar->remove_menu('new-content');
		$wp_admin_bar->remove_node( 'wp-logo');
	
		// Add a new top level menu link
		// Here we add a customer support URL link
	       
		//$customerSupportURL = 'http://help.eenvoudigonline.nl/';
		//$wp_admin_bar->add_menu( array(
		//'parent' => false,
		//'id' => 'customer_support',
		//'title' => __('Hulp nodig? Klik hier'),
		//'href' => $customerSupportURL
		//));
	
		// Add a new sub-menu to the link above
		$contactUsURL = 'http://www.envisic.nl/';
		$wp_admin_bar->add_menu(array(
			'parent' => 'customer_support',
			'id' => 'contact_us',
			'title' => __('Neem contact op met Envisic'),
			'href' => $contactUsURL
		));
	}
       // Finally we add our hook function
       add_action( 'wp_before_admin_bar_render', 'mytheme_admin_bar_render' );


//**********************************************************************************************************************
//	Create sitemap
//**********************************************************************************************************************     

	add_action( "save_post", "eg_create_sitemap" );   
	function eg_create_sitemap() {
	    if ( str_replace( '-', '', get_option( 'gmt_offset' ) ) < 10 ) { 
		$tempo = '-0' . str_replace( '-', '', get_option( 'gmt_offset' ) ); 
	    } else { 
		$tempo = get_option( 'gmt_offset' ); 
	    }
	    if( strlen( $tempo ) == 3 ) { $tempo = $tempo . ':00'; }
	    $postsForSitemap = get_posts( array(
		'numberposts' => -1,
		'orderby'     => 'modified',
		'post_type'   => array( 'post', 'page' ),
		'order'       => 'DESC'
	    ) );
	    $sitemap .= '<?xml version="1.0" encoding="UTF-8"?>' . '<?xml-stylesheet type="text/xsl" href="' . 
		esc_url( home_url( '/' ) ) . 'sitemap.xsl"?>';
	    $sitemap .= "\n" . '<urlset xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd" xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";
	    $sitemap .= "\t" . '<url>' . "\n" .
		"\t\t" . '<loc>' . esc_url( home_url( '/' ) ) . '</loc>' .
		"\n\t\t" . '<lastmod>' . date( "Y-m-d\TH:i:s", current_time( 'timestamp', 0 ) ) . $tempo . '</lastmod>' .
		"\n\t\t" . '<changefreq>daily</changefreq>' .
		"\n\t\t" . '<priority>1.0</priority>' .
		"\n\t" . '</url>' . "\n";
	    foreach( $postsForSitemap as $post ) {
		setup_postdata( $post);
		$postdate = explode( " ", $post->post_modified );
		$sitemap .= "\t" . '<url>' . "\n" .
		    "\t\t" . '<loc>' . get_permalink( $post->ID ) . '</loc>' .
		    "\n\t\t" . '<lastmod>' . $postdate[0] . 'T' . $postdate[1] . $tempo . '</lastmod>' .
		    "\n\t\t" . '<changefreq>Weekly</changefreq>' .
		    "\n\t\t" . '<priority>0.5</priority>' .
		    "\n\t" . '</url>' . "\n";
	    }
	    $sitemap .= '</urlset>';
	    $fp = fopen( ABSPATH . "sitemap.xml", 'w' );
	    fwrite( $fp, $sitemap );
	    fclose( $fp );
	}

//**********************************************************************************************************************
//	Custom WYSIWYG toolbar
//**********************************************************************************************************************
	
	if( ! function_exists( 'custom_toolbars' ) ) {
		add_filter( 'acf/fields/wysiwyg/toolbars' , 'custom_toolbars'  ); 
		function custom_toolbars( $toolbars ) {
			// Uncomment to view format of $toolbars
			// echo '< pre >'; print_r($toolbars); echo '< /pre >'; die;
			
			// Add a new toolbar called "Very Simple"
			// - this toolbar has only 1 row of buttons
			$toolbars['Very Simple' ] = array();
			$toolbars['Very Simple' ][1] = array('bold' , 'italic' , 'link', 'unlink', 'bullist', 'numlist', 'charmap', 'undo' );
			$toolbars['Table' ] = array();
			$toolbars['Table' ][1] = array('bold' , 'italic' , 'link', 'unlink', 'wp_more' );
			
			// Edit the "Full" toolbar and remove 'code'
			// - delet from array code from http://stackoverflow.com/questions/7225070/php-array-delete-by-value-not-key
			if( ($key = array_search('code' , $toolbars['Full' ][2])) !== false ) {
				unset( $toolbars['Full' ][2][$key] );
			}
			
			// remove the 'Basic' toolbar completely
			unset( $toolbars['Basic' ] );
			
			// return $toolbars - IMPORTANT!
			return $toolbars;
		}
	};

	
//**********************************************************************************************************************
//	Remove toolbar from top of page when logged in
//**********************************************************************************************************************

	function remove_admin_login_header() {
		remove_action('wp_head', '_admin_bar_bump_cb');
	}
	add_action('get_header', 'remove_admin_login_header');
	
//**********************************************************************************************************************
//	Admin page customisation
//**********************************************************************************************************************
	
	//Rename 'Default Template', or 'Standaard template' in Dutch, to custom title
	function filter_function_name( $label, $context ) {
	  return __( 'Selecteer paginatype', 'meta-box' );
	}
	add_filter( 'default_page_template_title', 'filter_function_name', 10, 2 );

	//Custom login logo
	function my_login_logo() { ?>
		<style type="text/css">
			.login h1 a {
				background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/img/login-logo.svg);
				width: 310px;
				height: 104px;
				background-size: contain !important;
				-webkit-background-size: contain !important;
				margin: 0 !important;
			}
		</style>
	<?php }
	add_action( 'login_enqueue_scripts', 'my_login_logo' );

	//Custom login link
	function my_login_logo_url() {
		return home_url();
	}
	add_filter( 'login_headerurl', 'my_login_logo_url' );
	
	function my_login_logo_url_title() {
	    return 'Envisic Print + Web';
	}
	add_filter( 'login_headertitle', 'my_login_logo_url_title' );

	// Customizing meta box names
	function my_remove_meta_boxes() {
		remove_meta_box( 'pageparentdiv', 'post', 'side' );
		remove_meta_box( 'postimagediv', 'post', 'side' );
		add_meta_box('pageparentdiv', __('Pagina eigenschappen'), 'page_attributes_meta_box', 'post', 'normal', 'high');
	}
	add_action( 'admin_menu', 'my_remove_meta_boxes' );
	add_filter('upload_mimes', 'custom_upload_mimes');

	// Add role class to body
	function add_role_to_body($classes) {
		
		global $current_user;
		$user_role = array_shift($current_user->roles);
		
		$classes .= 'role-'. $user_role;
		return $classes;
	}
	add_filter('body_class','add_role_to_body');
	add_filter('admin_body_class', 'add_role_to_body');

	//Add button to publish metabox
	add_action( 'post_submitbox_misc_actions', 'custom_button' );

	function custom_button(){
		$html  = '<div id="major-publishing-actions" style="overflow:hidden">';
		$html .= '<div id="publishing-action">';
		$html .= '<div class="button-grey more-publishing-options" >Meer opties</div>';
		$html .= '</div>';
		$html .= '</div>';
		echo $html;
	}
	
//**********************************************************************************************************************
//	Duplicate post/page
//**********************************************************************************************************************

	function rd_duplicate_post_as_draft(){
		global $wpdb;
		if (! ( isset( $_GET['post']) || isset( $_POST['post'])  || ( isset($_REQUEST['action']) && 'rd_duplicate_post_as_draft' == $_REQUEST['action'] ) ) ) {
			wp_die('No post to duplicate has been supplied!');
		}

		// Nonce verification
		if ( !isset( $_GET['duplicate_nonce'] ) || !wp_verify_nonce( $_GET['duplicate_nonce'], basename( __FILE__ ) ) )
			return;
	 
		//get the original post id
		$post_id = (isset($_GET['post']) ? absint( $_GET['post'] ) : absint( $_POST['post'] ) );

		//and all the original post data then
		$post = get_post( $post_id );
		
		//if you don't want current user to be the new post author, then change next couple of lines to this: $new_post_author = $post->post_author;
		$current_user = wp_get_current_user();
		$new_post_author = $current_user->ID;
		
		//if post data exists, create the post duplicate
		if (isset( $post ) && $post != null) {
	 
		//new post data array
		$args = array(
			'comment_status' => $post->comment_status,
			'ping_status'    => $post->ping_status,
			'post_author'    => $new_post_author,
			'post_content'   => $post->post_content,
			'post_excerpt'   => $post->post_excerpt,
			'post_name'      => $post->post_name,
			'post_parent'    => $post->post_parent,
			'post_password'  => $post->post_password,
			'post_status'    => 'draft',
			'post_title'     => $post->post_title,
			'post_type'      => $post->post_type,
			'to_ping'        => $post->to_ping,
			'menu_order'     => $post->menu_order
		);
	 
		//insert the post by wp_insert_post() function
		$new_post_id = wp_insert_post( $args );
	 
		//get all current post terms ad set them to the new post draft
		$taxonomies = get_object_taxonomies($post->post_type); // returns array of taxonomy names for post type, ex array("category", "post_tag");
		foreach ($taxonomies as $taxonomy) {
			$post_terms = wp_get_object_terms($post_id, $taxonomy, array('fields' => 'slugs'));
			wp_set_object_terms($new_post_id, $post_terms, $taxonomy, false);
		}
	 
		//duplicate all post meta just in two SQL queries
		$post_meta_infos = $wpdb->get_results("SELECT meta_key, meta_value FROM $wpdb->postmeta WHERE post_id=$post_id");
		if (count($post_meta_infos)!=0) {
			$sql_query = "INSERT INTO $wpdb->postmeta (post_id, meta_key, meta_value) ";
			foreach ($post_meta_infos as $meta_info) {
				$meta_key = $meta_info->meta_key;
				if( $meta_key == '_wp_old_slug' ) continue;
				$meta_value = addslashes($meta_info->meta_value);
				$sql_query_sel[]= "SELECT $new_post_id, '$meta_key', '$meta_value'";
			}
			$sql_query.= implode(" UNION ALL ", $sql_query_sel);
			$wpdb->query($sql_query);
		}
	 
	 
			//finally, redirect to the edit post screen for the new draft
			wp_redirect( admin_url( 'post.php?action=edit&post=' . $new_post_id ) );
			exit;
		} else {
			wp_die('Post creation failed, could not find original post: ' . $post_id);
		}
	}
	add_action( 'admin_action_rd_duplicate_post_as_draft', 'rd_duplicate_post_as_draft' );
	 
	//Add the duplicate link to action list for post_row_actions
	function rd_duplicate_post_link( $actions, $post ) {
		if (current_user_can('edit_posts')) {
			$actions['duplicate'] = '<a href="' . wp_nonce_url('admin.php?action=rd_duplicate_post_as_draft&post=' . $post->ID, basename(__FILE__), 'duplicate_nonce' ) . '" title="Duplicate this item" rel="permalink">Dupliceren</a>';
		}
		return $actions;
	}
	 
	add_filter( 'post_row_actions', 'rd_duplicate_post_link', 10, 2 );
	add_filter( 'page_row_actions', 'rd_duplicate_post_link', 10, 2 );

	
//**********************************************************************************************************************
//	Custom names in ACF flexible content layout handle
//**********************************************************************************************************************

	function my_acf_flexible_content_layout_title( $title, $field, $layout, $i ) {
		
		//Wrap default ACF in span class
		$title = '<span class="flex-layout-type">' . $title . '</span>';
		
		//Flex text
		if($text = get_sub_field('flex-text-header')) {
			$title .= ' <span><i>"' . $text . '"</i></span>';
		};
		
		//Flex slider
		if($text = get_sub_field('flex-slider-header')) {
			$title .= ' <span><i>"' . $text . '"</i></span>';
		};
		
		//Flex USP
		if($text = get_sub_field('flex-usp-header')) {
			$title .= ' <span><i>"' . $text . '"</i></span>';
		};
		
		//Flex form
		if($text = get_sub_field('flex-form-title')) {
			$title .= ' <span><i>"' . $text . '"</i></span>';
		};
		
		//Flex Google maps
		if($text = get_sub_field('flex-maps-address')) {
			$title .= ' <span>' . $text . '</span>';
		};
		
		//Flex table
		if( get_row_layout() == 'flex-table' ) {
			$text = get_sub_field('flex-title');
			if($text) {
				$title .= ' <span>' . $text . '</span>';
			}
		};
		
		//Flex image
		if( get_row_layout() == 'flex-image' ) {
			$image_object = get_sub_field('flex-image-array');
			$text = (count($image_object) == 1 ) ? 'Bevat 1 afbeelding' : 'Bevat ' . count($image_object) . ' afbeeldingen';
			$title .= ' <span>' . $text . '</span>';
		};
			
		//Flex gallery
		if( get_row_layout() == 'flex-gallery' ) {
			$gallery_images = get_sub_field('flex-gallery-images');
			$title .= ' <span>Bevat ' . count($gallery_images) . ' afbeeldingen.</span>';
		};
		
		//Flex CTA
		if( get_row_layout() == 'flex-cta' ) {
		  
			$flex_buttons = get_sub_field('flex-cta-object');
			$n_o_b = count($flex_buttons);
		
				if($n_o_b > 1 ) {
					$buttons = 'Bevat ' . count($flex_buttons) . ' knoppen: ';
				} elseif ($n_o_b == 1 ) {
					$buttons = 'Bevat ' . count($flex_buttons) . ' knop: ';
				} else {
					$buttons = 'Bevat geen knoppen.';
				};
	
			$button_names = '';
		  
				if($flex_buttons) :
					foreach( $flex_buttons as $flex_button ):
						$button_names .= '"' . $flex_button['flex-cta-text'] . '", ';
					endforeach;
				endif;
			  
			if (substr($button_names, -1) == ',') :
				$button_names = substr($str, 0, -1);
			endif;
			
		  $buttons = $buttons . '<i>' . $button_names . '</i>';
		  $title .= ' <span>' . $buttons . '</span>';
		};
		
		return $title;
	}

	add_filter('acf/fields/flexible_content/layout_title', 'my_acf_flexible_content_layout_title', 10, 4);


//**********************************************************************************************************************
//	Add custom post types from options page based on radio button on options page
//**********************************************************************************************************************

	//Add the custom post types from the options page
	function add_cpt_from_option_page() {
		function codex_custom_init() {
			
			//First get the true or false values from the options page	
			$mod_occ = get_field('module-occasions', 'option' );
			$mod_new = get_field('module-news', 'option' );
			$mod_res = get_field('module-real-estate', 'option');
			$mod_boo = get_field('module-booking', 'option');
				
			//Occasions CPT 			
			$mod_occ_args = array(
				'labels' => array('name' => __( 'Occasions' ),
						'singular_name' => __( 'Occasion' ),
						'add_new' => __( 'Occasion toevoegen' ),
						'add_new_item' => __( 'Occasion toevoegen' ),
						'edit_item' => __( 'Occasion bewerken' ),
						'new_item' => __( 'Occasion toevoegen' ),
						),
				'public' => true,
				'has_archive' => true,
				'supports' => array('title', 'editor', 'thumbnail'),
				'menu_icon' => __('dashicons-exerpt-view')
			);
					
			//News CPT
			$mod_new_args = array(
				'labels' => array('name' => __( 'Nieuws' ),
						'singular_name' => __( 'Nieuwsitem' ),
						'add_new' => __( 'Nieuwsitem toevoegen' ),
						'add_new_item' => __( 'Nieuwsitem toevoegen' ),
						'edit_item' => __( 'Nieuwsitem bewerken' ),
						'new_item' => __( 'Nieuwsitem toevoegen' ),
						),
				'public' => true,
				'has_archive' => true,
				'supports' => array('title', 'editor', 'thumbnail'),
				'menu_icon' => __('dashicons-media-document')
			);
					
			//Real estate CPT
			$mod_res_args = array(
				'labels' => array('name' => __( 'Vastgoed' ),
						'singular_name' => __( 'Vastgoedobject' ),
						'add_new' => __( 'Vastgoedobject toevoegen' ),
						'add_new_item' => __( 'Vastgoedobject toevoegen' ),
						'edit_item' => __( 'Vastgoedobject bewerken' ),
						'new_item' => __( 'Vastgoedobject toevoegen' ),
						),
				'public' => true,
				'has_archive' => true,
				'supports' => array('title', 'editor', 'thumbnail'),
				'menu_icon' => __('dashicons-admin-home'),
				'rewrite' => array('slug' => __( 'aanbod'))
			);
			
			//Afspraken module CPT
			$mod_boo_args = array(
				'labels' => array('name' => __( 'Afspraken' ),
						'singular_name' => __( 'Afspraak' ),
						'add_new' => __( 'Afspraak toevoegen' ),
						'add_new_item' => __( 'Afspraak toevoegen' ),
						'edit_item' => __( 'Afspraak bewerken' ),
						'new_item' => __( 'Afspraak toevoegen' ),
						),
				'public' => true,
				'has_archive' => true,
				'supports' => array('title', 'editor', 'thumbnail'),
				'menu_icon' => __('dashicons-admin-home'),
				'rewrite' => array('slug' => __( 'aanbod'))
			);
				
			//Register the CPT's if option page values == true
			if($mod_occ == 'true' ) : register_post_type('occasions', $mod_occ_args); endif;
			if($mod_new == 'true' ) : register_post_type('news', $mod_new_args); endif;
			if($mod_res == 'true' ) : register_post_type('real-estate', $mod_res_args); endif;
			if($mod_boo == 'true' ) : register_post_type('booking', $mod_boo_args); endif;
		};
			
		codex_custom_init();
	};
	
	//Register options CPT on init
	add_action('init', 'add_cpt_from_option_page');


	//Add class to body if module is active
	function module_body_classes( $classes ) {
		$mod_occ = get_field('module-occasions', 'option' );
		$mod_new = get_field('module-news', 'option' );
		$mod_res = get_field('module-real-estate', 'option');
		$mod_boo = get_field('module-booking', 'option');
		
		if($mod_occ == 'true') { $classes .= ' occ-active'; };
		if($mod_new == 'true') { $classes .= ' new-active'; };
		if($mod_res == 'true') { $classes .= ' res-active'; };
		if($mod_boo == 'true') { $classes .= ' boo-active'; };
	
	    return $classes;
	};

	add_filter( 'admin_body_class', 'module_body_classes' );


// ************************
//
// CUSTOM PAGE ATTRIBUTES
//
// ************************

//First remove the default page attributes meta box
function my_remove_pageparentdiv() {
		remove_meta_box( 'pageparentdiv', 'page', 'normal' );
}
add_action( 'admin_menu', 'my_remove_pageparentdiv' );
		
//Then copy the page attributes meta box from wp-admin/includes/meta-boxes.php and alter the name of the function from page_attributes_meta_box to page_attributes_custom_meta_box
//and edit as requiered

function page_attributes_custom_meta_box($post) {
	$post_type_object = get_post_type_object($post->post_type);
	if ( $post_type_object->hierarchical ) {
		$dropdown_args = array(
			'post_type'        => $post->post_type,
			'exclude_tree'     => $post->ID,
			'selected'         => $post->post_parent,
			'name'             => 'parent_id',
			'show_option_none' => __('(no parent)'),
			'sort_column'      => 'menu_order, post_title',
			'echo'             => 0,
		);

		/**
		 * Filter the arguments used to generate a Pages drop-down element.
		 *
		 * @since 3.3.0
		 *
		 * @see wp_dropdown_pages()
		 *
		 * @param array   $dropdown_args Array of arguments used to generate the pages drop-down.
		 * @param WP_Post $post          The current WP_Post object.
		 */
		$dropdown_args = apply_filters( 'page_attributes_dropdown_pages_args', $dropdown_args, $post );
		$pages = wp_dropdown_pages( $dropdown_args );
		if ( ! empty($pages) ) {
?>
<p><strong>Deze pagina is een subpagina van:</strong></p>
<label class="screen-reader-text" for="parent_id">Bovenliggende pagina</label>
<?php echo $pages; ?>
<?php
		} // end empty pages check
	} // end hierarchical check.
	if ( 'page' == $post->post_type && 0 != count( get_page_templates( $post ) ) && get_option( 'page_for_posts' ) != $post->ID ) {
		$template = !empty($post->page_template) ? $post->page_template : false;
		?>

<p><strong>Pagina type:</strong><?php
	/**
	 * Fires immediately after the heading inside the 'Template' section
	 * of the 'Page Attributes' meta box.
	 *
	 * @since 4.4.0
	 *
	 * @param string  $template The template used for the current post.
	 * @param WP_Post $post     The current post.
	 */
	do_action( 'page_attributes_meta_box_template', $template, $post );
?></p>
<label class="screen-reader-text" for="page_template">Pagina type</label><select name="page_template" id="page_template">
<?php
/**
 * Filter the title of the default page template displayed in the drop-down.
 *
 * @since 4.1.0
 *
 * @param string $label   The display value for the default page template title.
 * @param string $context Where the option label is displayed. Possible values
 *                        include 'meta-box' or 'quick-edit'.
 */
$default_title = apply_filters( 'default_page_template_title',  __( 'Default Template' ), 'meta-box' );
?>
<option value="page.php">Standaardpagina</option>
<?php page_template_dropdown($template); ?>
</select>
<?php
	} ?>
<p><strong>Volgorde</strong></p>
<p><label class="screen-reader-text" for="menu_order"><?php _e('Order') ?></label><input name="menu_order" type="text" size="4" id="menu_order" value="<?php echo esc_attr($post->menu_order) ?>" /></p>
<?php if ( 'page' == $post->post_type && get_current_screen()->get_help_tabs() ) { ?>
<p>Hulp nodig?</p>
<?php
	}
}		

add_action('add_meta_boxes','add_post_template_metabox');
function add_post_template_metabox() {
    add_meta_box('postparentdiv', __('Pagina eigenschappen'), 'page_attributes_custom_meta_box', 'page', 'side', 'core');
}

//Function to quickly display NAW
function naw($item) {
	$data = get_field("config-naw", "options");
	if($data[$item]) { echo $data[$item]; };
}

function get_naw($item) {
	$data = get_field("config-naw", "options");
	return $data[$item];
}

function check_contrast($pri, $txt) {
		$min_contrast = 35;
		
		list($pr, $pg, $pb) = sscanf($pri, "#%02x%02x%02x");
		list($tr, $tg, $tb) = sscanf($txt, "#%02x%02x%02x");
		$rgb = [$pr, $pg, $pb, $tr, $tg, $tb];
		foreach ($rgb as $value) :
			$lum[] = ($value / 255) * 100 ;
		endforeach;
		$col1 = 0.3 * $lum['0'] + 0.59 * $lum['1'] + 0.11 * $lum['2'];
		$col2 = 0.3 * $lum['3'] + 0.59 * $lum['4'] + 0.11 * $lum['5'];
		$contrast = ($col1 > $col2) ? $col1 - $col2 : $col2 - $col1;
		
		if($contrast >= $min_contrast ) :
			//echo "<div style='margin: 20px; z-index: 10000; width: 100%;'><div style='width: 100px; height: 30px; display: inline-block; border: 1px solid black; background: " . $pri . ";'>" . $pri . "</div> ->
		//Contrast: " . ceil($lval) . " -> <div style='width: 100px; height: 30px; display: inline-block; border: 1px solid black; background: " . $txt . ";'>" . $txt . "</div></div>";
			return true;
		else :
				//echo "<div style='margin: 20px; z-index: 10000; width: 100%;'><div style='width: 100px; height: 30px; display: inline-block; border: 1px solid black; background: " . $pri . ";'>" . $pri . "</div> ->
			//Contrast: " . ceil($lval) . " -> <div style='width: 100px; height: 30px; display: inline-block; border: 1px solid black; background: " . $txt . ";'>" . $txt . "</div></div>";
			return false;
		endif;
}

function add_color_tint($base, $tint) {
	
		list($r, $g, $b) = sscanf($base, "#%02x%02x%02x");
		$tint = 1 - ($tint / 100);
		
		$r = ($r * $tint <= 255) ? $r * $tint : 255;
		$g = $g * $tint;
		$b = $b * $tint;
		
		$r = dechex($r);
		$g = dechex($g);
		$b = dechex($b);
		
		return "#" . $r . $g . $b;
}

//function set_colors($pri, $sec, $h, $t) {
//		if(check_contrast($pri, $h)) :
//			$h_bgc = $h;
//			$t_bgc = $h;
//		elseif(check_contrast($pri, $t)) :
//			$h_bgc = $t;
//			$t_bgc = $t;
//		elseif(check_contrast($sec, $h)) :
//			$h_bgc = $h;
//			$c_bgc = $sec;
//		elseif(check_contrast($pri, "#FFFFFF")) :
//			$h_bgc = '#FFFFFF';
//			$t_bgc = '#FFFFFF';
//		elseif(check_contrast($pri, "#333333")) :
//			$h_bgc = '#333333';
//			$t_bgc = '#333333';
//		elseif(check_contrast($sec, "#FFFFFF")) :
//			$h_bgc = '#FFFFFF';
//			$t_bgc = '#FFFFFF';
//			$c_bgc = $colors['sec-color'];
//		elseif(check_contrast($sec, "#333333")) :
//			$h_bgc = '#333333';
//			$t_bgc = '#333333';
//			$c_bgc = $sec;
//		else :
//			$h_bgc = '#333333';
//			$t_bgc = '#333333';
//			$c_bgc = '#eeeeee';
//		endif;
//}

//**********************************************************************************************************************
//	Get global colors and load them in flex-fields
//**********************************************************************************************************************

function acf_load_color_field_choices( $color_select ) {
    // reset choices
    $color_select['choices'] = array();
	$colors = get_field('config-colors', 'option');
    
	$color_select['choices'][ 'geen' ] = '<span class="color-selector" style="background: #fffff"> Geen </span>';
    $color_select['choices'][ 'pri-color' ] = '<span class="color-selector" style="background: ' . $colors['pri-color'] . ';"> </span>';
	$color_select['choices'][ 'sec-color' ] = '<span class="color-selector" style="background: ' . $colors['sec-color'] . ';"> </span>';
	$color_select['choices'][ 'ter-color' ] = '<span class="color-selector" style="background: ' . $colors['ter-color'] . ';"> </span>';

    // return the field
    return $color_select;
    
}

add_filter('acf/load_field/name=flex-bgc-select', 'acf_load_color_field_choices');

//**********************************************************************************************************************
//	Function to check if a flex item should be shown based on 'Publiceren' option, 'Startdatum' option and 'Einddatum'option
//**********************************************************************************************************************

	function validateFlexItem($flex_options) {
	
		$flex_show = true;
		$flex_publish = $flex_options['flex-publish'];
		$flex_expire = $flex_options['flex-end-date-option'];
		$flex_valid = $flex_options['flex-start-date-option'];
		
		//Before checking dates, see if post is published at all
		if($flex_publish) {
			
			//If either of dates are set
			if($flex_expire or $flex_valid) {
				
				//Get current date
				$current_date = date('Ymd');
				
				//If both start and end date are set
				if($flex_expire && $flex_valid) {
					$flex_expire_date = $flex_options['flex-end-date'];
					$flex_valid_date = $flex_options['flex-start-date'];
					
					if( ( $current_date > $flex_expire_date) or ( $current_date < $flex_valid_date ) ) {
						$flex_show = false;
					}		
				}
				
				//If start date is set
				if($flex_valid && !$flex_expire) {
					$flex_valid_date = $flex_options['flex-start-date'];
					
					if($current_date < $flex_valid_date) {
						$flex_show = false;
					}
				}
				
				//If end date is set
				if($flex_expire && !$flex_valid) {
					$flex_expire_date = $flex_options['flex-end-date'];
					
					if($current_date >= $flex_expire_date) {
						$flex_show = false;
					}
				}
			}
		} else {
			$flex_show = false;
		}
		
		return $flex_show;
	};


//**********************************************************************************************************************
//	Enable GZIP
//**********************************************************************************************************************

	ob_start("ob_gzhandler");


//**********************************************************************************************************************
//	WooSupport
//**********************************************************************************************************************

	// Add new constant that returns true if WooCommerce is active
	define( 'WPEX_WOOCOMMERCE_ACTIVE', class_exists( 'WooCommerce' ) );
	
	// Checking if WooCommerce is active
	if ( WPEX_WOOCOMMERCE_ACTIVE ) {
		
		add_action( 'after_setup_theme', function() {
			add_theme_support( 'woocommerce' );
		} );
		
		add_filter( 'woocommerce_show_page_title', '__return_false' );
		
		add_theme_support( 'wc-product-gallery-slider' );
		add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-lightbox' );
			
		remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
		remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
		
		
		remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
		remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
		
		
		add_action('woocommerce_before_main_content', 'my_theme_wrapper_start', 10);
		add_action('woocommerce_after_main_content', 'my_theme_wrapper_end', 10);
		
		function my_theme_wrapper_start() {
		    echo '<div id="woo-content">';
		}
		
		function my_theme_wrapper_end() {
		    echo '</div>';
		}
	
	}


//**********************************************************************************************************************
//	Adding Menus & adding menu option in backend top level menu
//**********************************************************************************************************************

	//Register menu locations
	function apex_custom_menus() {
		register_nav_menus(
		  array(
			'main-nav' => __( 'Hoofdnavigatie' ),
			'top-nav' => __( 'Topnavigatie' ),
			'footer-nav' => __( 'Footernavigatie')
		  )
		);
	}
	add_action( 'init', 'apex_custom_menus' );

	//Add custom link to Menu's in backend
	add_action( 'admin_menu', 'linked_url' );
    function linked_url() {
  		add_menu_page( 'linked_url', 'Menustructuur', 'read', 'my_slug', '', 'dashicons-text', 1 );
    }

    add_action( 'admin_menu' , 'linkedurl_function' );
		function linkedurl_function() {
		global $menu;
		$menu[1][2] = get_admin_url() . "/nav-menus.php";
	}
		
	//Allow editors to edit menu
	$role_object = get_role( 'editor' );
	$role_object->add_cap( 'edit_theme_options' );


?>