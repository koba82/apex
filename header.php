<?php
/**
 * Header template
 */

    $google_analytics_code = get_field('google_analytics_code', 'option');
    $page_properties = get_field('seo-options');
    $use_mob_nav = ( get_field('theme-setting-use-hamburger', 'option') )? true : false;
    $use_mob_nav_class = ($use_mob_nav) ? 'use-mob-nav' : '';
    $seo_title = get_field('seo-title');
    $seo_description = get_field('seo-description');

    $index_follow = '<meta name="robots" content="';
    if ($page_properties['no-index'] || $page_properties['no-follow']) :
        if ($page_properties['no-index'] && $page_properties['no-follow'] || get_post_type() == 'static-content'):
            $index_follow .= 'noindex,nofollow"/>';
        elseif (page_properties['no-index']):
            $index_follow .= 'noindex,follow"/>';
        else :
            $index_follow .= 'index,nofollow"/>';
        endif;
    endif;


?>

<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->

<head>

    <?php echo ($google_analytics_code) ? $google_analytics_code : ''; ?>

    <?=$index_follow;?>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge"/>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>
        <?php
        $page_title = '';
        if($seo_title):
            $page_title = $seo_title;
        else:
            $page_title = bloginfo('name')	 . ' | ' .  wp_title('');
        endif;
        echo $page_title; ?>
    </title>
    <?php
    if($seo_description):
        echo '<meta name="description" content="' . $seo_description . '">';
    endif;
    ?>


    <meta property="og:url"           content="<?php global $wp; $current_url = home_url( add_query_arg( array(), $wp->request ) ); echo $current_url; ?>" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="<?=$page_title; ?>" />
    <meta property="og:description"   content="<?=$seo_description; ?>" />
    <meta property="og:image"         content="<?php the_field('config-logo', 'option'); ?>" />

    <script type='application/ld+json'>
	{"@context":"http:\/\/schema.org","@type":"WebSite","url":"<?php echo site_url(); ?>","name":"<?php bloginfo( 'name' ); ?>","potentialAction":{"@type":"SearchAction","target":"<?php echo site_url(); ?>?s={search_term_string}","query-input":"required name=search_term_string"}}</script>

    <?php wp_head(); ?>

    <script type='text/javascript' async src="<?php echo get_template_directory_uri() . '/js/bundle.js'; ?>"></script>

</head>

<body itemscope="itemscope" itemtype="http://schema.org/WebPage" class="nav-closed <?=$use_mob_nav_class;?>">
<div class="size-check"></div>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-T299PHR"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<div class="page-wrapper scroll-top">
    <header itemscope="itemscope" itemtype="http://schema.org/WPHeader">
        <div class="menu-button"></div>
        <?php get_template_part('header-images'); ?>
        <div class="header-content">

            <div class="logo-wrap">
                <a href="<?php echo site_url(); ?>" class="logo-link">
                    <img class="logo" src="<?php $logo_url = get_field('config-logo', 'option'); echo $logo_url['primary-logo']; ?>" alt="<?php the_field('config-name', 'option'); ?>" />
                </a>
            </div>

            <?php
            if(!$use_mob_nav) : ?>
                <div class="nav nav-top-bar">
                    <nav itemscope itemtype="http://schema.org/SiteNavigationElement">

                        <?php get_template_part('nav-links'); ?>

                        <?php get_template_part('nav-top'); ?>

                    </nav>
                </div>

                <nav class="nav nav-main" itemscope itemtype="http://schema.org/SiteNavigationElement">

                    <?php get_template_part('nav-main'); ?>

                </nav>

            <?php endif; ?>

        </div>

    </header>

    <div class="nav-trigger">
        <div class="burger">
            <div class="top-bun"></div>
            <div class="hamburger"></div>
            <div class="bottom-bun"></div>
        </div>
    </div>
    <div class="nav-mobile">
        <?php get_template_part('nav-mobile'); ?>
    </div>
    <!-- #masthead -->

		
