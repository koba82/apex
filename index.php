<?php
/**
 * Template Name: Standaardpagina
 */

get_header(); ?>

<div class="content-wrapper" role="main">
	
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
	
<div class="content content-width h1-headline">
	<h1 itemprop="headline"><?=$h1_text; ?></h1>
</div>

<?php get_template_part('acf-flex-content-loop'); ?>


<div class="clear"></div>

</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
