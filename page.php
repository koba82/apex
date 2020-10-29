<?php
/**
 * Template Name: Standaardpagina
 */

get_header(); ?>
	
<?php
    $page_properties = get_field('seo-options');

    $args[0] = ($page_properties['h1-text'] !== '') ? $page_properties['h1-text'] : ( ($page_properties['seo-title'] !== '') ? $page_properties['seo-title'] : get_the_title() );

    get_template_part('/blocks/block-h1', 'h1-headline', $args);
?>

<main>

    <?php
    get_template_part('acf-flex-content-loop');

    if ( WPEX_WOOCOMMERCE_ACTIVE ) :

        do_shortcode('aws_search_form'); ?>

        <section class="content-wrap woo-content-wrap">
            <div class="content woo-content">
            </div>
        </section>

    <?php
    endif; ?>


</main>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
