<?php
/**
 * Template Name: Standaardpagina
 */

get_header(); ?>


	
<?php
	//Determine what H1 text we will use. First comes custom H1 field called 'H1 Kop', then 'Paginatitel', then Wordpress page title.
	if (get_field('h1-text')) {
		$h1_text = get_field('h1-text');
	} elseif (get_field('seo-title')) {
		$h1_text = get_field('seo-title');
	} else {
		$h1_text = get_the_title();
	};
?>	
	

	
	
<div class="content-wrap h1-headline">
	<h1 itemprop="headline"><?=$h1_text; ?></h1>
</div>

<main>

<?php get_template_part('acf-flex-content-loop'); ?>

<?php if ( WPEX_WOOCOMMERCE_ACTIVE ) : ?>

	<?php do_shortcode('aws_search_form'); ?>

	<section class="content-wrap woo-content-wrap">
		<div class="content woo-content">
			<div class="content-animation">	
			</div>
		</div>	
	</section>

<?php endif; ?>

</main>
<?php
// echo getcwd() . '\wp-content\themes\apex-0.8\bundled-min.css' . "\n";
// the_field('config-theme', 'option');
//  echo$GLOBALS['time_elapsed_secs']; ?>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
