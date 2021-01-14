<?php


    /**
     * Add options page for WooCommerce
     */
    acf_add_options_page(array(
        'page_title' 	=> 'Apex & Woo',
        'menu_title'	=> 'Apex & Woo',
        'menu_slug' 	=> 'wc-apex-admin',
        'capability'	=> 'edit_posts',
        'redirect'		=> false
    ));

    //Add class to admin body if WooCommerce is active
    function woo_body_class( $classes ) {
        $classes .= ' woo-com-active';
        return $classes;
    };

    add_filter( 'admin_body_class', 'woo_body_class' );

    add_action( 'after_setup_theme', function() {
        add_theme_support( 'woocommerce' );
    } );

    add_filter( 'woocommerce_show_page_title', '__return_false' );

    add_theme_support( 'wc-product-gallery-slider' );
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );

    /**
     * Wrap Woo content in <main> tag
     */
    function custom_woo_wrapper_open_tag() {
        echo '<main>';
    }
    remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
    add_action('woocommerce_before_main_content', 'custom_woo_wrapper_open_tag', 10);

    function custom_woo_wrapper_close_tag() {
        echo '</main>';
    }
    remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
    add_action('woocommerce_after_main_content', 'custom_woo_wrapper_close_tag', 10);


    function add_class_to_pdp( $classes ) {

        if ( is_product() ) {

            $classes[] = 'pdp';
        }
        return $classes;
    }
    add_filter( 'body_class','add_class_to_pdp' );



    /**
     * Add the Custom fields for Products in WooCommerce backend (COP)
     */
    function woocommerce_render_cop_field() {
        $inputGDJ   = array(
            'id'          => '_cop_gdj',
            'label'       => 'Inkoopprijs GDJ',
            'value'       => get_post_meta( get_the_ID(), '_cop_gdj', true )
        );
        $inputMCW   = array(
            'id'          => '_cop_mcw',
            'label'       => 'Inkoopprijs MCW',
            'value'       => get_post_meta( get_the_ID(), '_cop_mcw', true )
        );
        $inputGDJstock   = array(
            'id'          => '_stock_gdj',
            'label'       => 'Voorraad GDJ',
            'value'       => get_post_meta( get_the_ID(), '_stock_gdj', true )
        );
        $inputMCWstock   = array(
            'id'          => '_stock_mcw',
            'label'       => 'Voorraad MCW',
            'value'       => get_post_meta( get_the_ID(), '_stock_mcw', true )
        );

        ?>

        <div id="cop_attr" style="background: rgb(225,225,255)" class="options_group">
            <?php woocommerce_wp_text_input( $inputGDJ ); ?>
        </div>
        <div id="cop_attr" style="background: rgb(225,225,255)" class="options_group">
            <?php woocommerce_wp_text_input( $inputGDJstock ); ?>
        </div>
        <div id="cop_attr" style="background: rgb(255,225,225)" class="options_group">
            <?php woocommerce_wp_text_input( $inputMCW ); ?>
        </div>
        <div id="cop_attr" style="background: rgb(255,225,225)" class="options_group">
            <?php woocommerce_wp_text_input( $inputMCWstock ); ?>
        </div>

        <?php
    }

    add_action( 'woocommerce_product_options_general_product_data', 'woocommerce_render_cop_field' );

    /**
     * Save the product's COP number, if provided.
     *
     * @param int $product_id The ID of the product being saved.
     */
    function woocommerce_save_cop_field( $product_id ) {
        if (
            ! isset( $_POST['_cop'], $_POST['woocommerce_meta_nonce'] )
            || ( defined( 'DOING_AJAX' ) && DOING_AJAX )
            || ! current_user_can( 'edit_products' )
            || ! wp_verify_nonce( $_POST['woocommerce_meta_nonce'], 'woocommerce_save_data' )
        ) {
            return;
        }

        $cop = sanitize_text_field( $_POST['_cop'] );

        update_post_meta( $product_id, '_cop', $cop );
    }

    add_action( 'woocommerce_process_product_meta','woocommerce_save_cop_field' );


    /**
     * Change number of products that are displayed per page (shop page)
     */
    function new_loop_shop_per_page( $cols ) {
        // $cols contains the current number of products per page based on the value stored on Options –> Reading
        // Return the number of products you wanna show per page.
        $cols = 12;
        return $cols;
    }

    add_filter( 'loop_shop_per_page', 'new_loop_shop_per_page', 20 );

    /**
     *  Lister page product title
     */

    function custom_lister_page_product_title() {

        global $product;

        $year = ($product->get_attribute('jaar')) ? $product->get_attribute('jaar') : '';
        $driver = ($product->get_attribute('driver')) ? $product->get_attribute('driver') : '';
        $manufacturer = ($product->get_attribute('manufacturer')) ? $product->get_attribute('manufacturer') : false;
        $scale = ($product->get_attribute('schaal')) ? $product->get_attribute('schaal') : false;

        echo '<h3>' . $product->get_attribute('brand') . ' ' . $product->get_attribute('brand-type') . '</h3>';

        echo '<div class="lister-subtitle">';

            if($driver) :
                echo '<span class="lister-driver">' . $driver . '</span>';
            endif;

            if($year) :
                echo '<span class="lister-year">' . $year . '</span>';
            endif;

            if($manufacturer) :
                echo '<span class="lister-manufacturer">' . $manufacturer . '</span>';
            endif;

            if($year) :
                echo '<span class="lister-scale">' . $scale . '</span>';
            endif;

        echo '</div>';
    }

    remove_filter('woocommerce_shop_loop_item_title','woocommerce_template_loop_product_title', 10);
    add_filter('woocommerce_shop_loop_item_title','custom_lister_page_product_title', 10);


    /**
     * Add specific product attributes to PDP summary based on backend list
     */
    function woocommerce_add_attributes_to_summary() {
        global $product;

        $attr = get_field('summary-attribute', 'option');

        if($attr) :

            echo '<div class="summary-attributes">';

            foreach($attr as $at) :

                if($product->get_attribute($at['attribute-id'])) :
                   echo '<div class="attr-row"><span class="attr-key">' . $at['attribute-label'] . '</span><span class="attr-value"><a href="/product-category/raceklassen/?filter_' . $at['attribute-id'] . '=' . $product->get_attribute($at['attribute-id']) . '">' . $product->get_attribute($at['attribute-id']) . '</a></<span></div>';
                endif;

           endforeach;

            echo '</div>';

        endif;
    }

    add_action( 'woocommerce_single_product_summary', 'woocommerce_add_attributes_to_summary', 45 );


    /**
     *  PDP product title based on attributes
     */

    function woocommerce_pdp_title() {
        global $product;

        if($product->get_attribute('brand') && $product->get_attribute('brand-type')) : ?>

            <h1 class="product_title entry-title"><?=$product->get_attribute('brand');?>  <?=$product->get_attribute('brand-type');?></h1>

            <?php the_title( '<p class="product-sub-title">', '</p>' ); ?>

        <?php else :

            the_title( '<h1 class="product_title entry-title">', '</h1>' );

        endif;

    }

    remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
    add_action('woocommerce_single_product_summary', 'woocommerce_pdp_title', 5);

    /**
     *  PDP Custom availability
     */
    // Add new stock status options
    function filter_woocommerce_product_stock_status_options( $status ) {
        // Add new statuses
        $status['pre_order'] = 'Voorbestellen';

        return $status;
    }
    add_filter( 'woocommerce_product_stock_status_options', 'filter_woocommerce_product_stock_status_options', 10, 1 );

    // Availability text
    function filter_woocommerce_get_availability_text( $availability, $product ) {
        switch( $product->stock_status ) {
            case 'pre_order':
                $availability = 'Voorbestellen';
                break;
        }
        return $availability;
    }
    add_filter( 'woocommerce_get_availability_text', 'filter_woocommerce_get_availability_text', 10, 2 );

    // Availability class
    function filter_woocommerce_get_availability_class( $class, $product ) {
        switch( $product->stock_status ) {
            case 'pre_order':
                $class = 'pre-order';
                break;
        }

        return $class;
    }
    add_filter( 'woocommerce_get_availability_class', 'filter_woocommerce_get_availability_class', 10, 2 );

    function filter_woocommerce_admin_stock_html( $stock_html, $product ) {

     switch($product->stock_status) {
        case "in_stock" :
            $stock_html =  '<p><span class="icon-wrap small">' . display_icon('fnd-success-alt') . '</span>' . wp_kses_post( $availability ) . '</p><p><span class="icon-wrap small">' . display_icon('truck-delivery') . '</span>Binnen 24 uur verzonden</p>';
            break;
        case "on_backorder" :
            $stock_html =  '<p><span class="icon-wrap small">' . display_icon('fnd-info') . '</span>' . wp_kses_post( $availability ) . '</p><p><span class="icon-wrap small">' . display_icon('calendar') . '</span>Levertijd: enkele werkdagen</p>';
            break;
        case "out_of_stock" :
            $stock_html = '<p><span class="icon-wrap small">' . display_icon('fnd-close-circle') . '</span>' . wp_kses_post( $availability ) . '</p><p><span class="icon-wrap small">' . display_icon('calendar') . '</span>Helaas is de levertijd op dit moment niet bekend.</p>';
            break;
        default :

    }

        return $stock_html;
    }
    add_filter( 'woocommerce_admin_stock_html', 'filter_woocommerce_admin_stock_html', 10, 2 );


    /**
     * Add static content to PDP
     */
    function woocommerce_add_flex_content_to_pdp() {

        $staticID = get_field('woo-set-pdp-content', 'option');

        if($staticID) :

            if( have_rows('flex', $staticID) ):
                while ( have_rows('flex', $staticID) ) : the_row();

                    $row_layout = get_row_layout();

                    if( validateFlexItem(get_sub_field('flex-options')) ) :

                        get_template_part('/blocks/' . $row_layout);

                    endif;

                endwhile;
            endif;

        endif;

    }

    add_action('woocommerce_after_single_product_summary', 'woocommerce_add_flex_content_to_pdp', 25 );


    /**
     * Show cart contents / total Ajax
     */
    add_filter( 'woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment' );

    function woocommerce_header_add_to_cart_fragment( $fragments ) {
        global $woocommerce;

        ob_start();

        ?>
        <a class="cart-customlocation" href="<?php echo esc_url(wc_get_cart_url()); ?>" title="<?php _e('View your shopping cart', 'woothemes'); ?>"><?php echo sprintf(_n('%d item', '%d items', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count);?> - <?php echo $woocommerce->cart->get_cart_total(); ?></a>
        <?php
        $fragments['a.cart-customlocation'] = ob_get_clean();
        return $fragments;
    }

    /**
     * Change the test for "In Stock / Quantity Left / Out of Stock".
     */

    add_filter( 'woocommerce_get_availability', 'wcs_custom_get_availability', 1, 2);
    function wcs_custom_get_availability( $availability, $_product ) {
        global $product;

        // Change In Stock Text
        if ( $_product->is_in_stock() ) {
            //$availability['availability'] = __('Plenty available in our store!', 'woocommerce');
            $availability['availability'] = 'Op voorraad';
        }

        // Change in Stock Text to only 1 or 2 left
        if ( $_product->is_in_stock() && $product->get_stock_quantity() <= 0 ) {
            //$availability['availability'] = sprintf( __('Only %s left in store!', 'woocommerce'), $product->get_stock_quantity());
            $availability['availability'] = 'Op nabestelling';
        }

        // Change Out of Stock Text
        if ( ! $_product->is_in_stock() ) {
            $availability['availability'] = 'Op nabestelling';
        }

        return $availability;
    }

    /**
     * Wrap listerpage in div
     */



    function lister_page_open_div() {
        echo '<div class="content lister-page">';
    }

    function lister_page_close_div() {
        echo '</div>';
    }
    add_action( 'woocommerce_before_shop_loop', 'lister_page_open_div', 5 );
    //add_action( 'woocommerce_after_main_content', 'lister_page_close_div', 5 );

    //Filter op LP

    function show_filter_on_listerpage() {

        get_sidebar('shop');

    }

    add_action( 'woocommerce_after_shop_loop', 'show_filter_on_listerpage' );

    /**
     * Hide H1 titles on listerpage
     */
    add_filter( 'woocommerce_show_page_title', '__return_false' );


    /**
     * Rename "home" in breadcrumb
     */
    function wcc_change_breadcrumb_home_text( $defaults ) {
        // Change the breadcrumb home text from 'Home' to 'Apartment'
        $defaults['home'] = 'Miniaturen';
        return $defaults;
    }
    add_filter( 'woocommerce_breadcrumb_defaults', 'wcc_change_breadcrumb_home_text' );


    /**
     * Change the breadcrumb separator
     */
    function wcc_change_breadcrumb_delimiter( $defaults ) {
        // Change the breadcrumb delimeter from '/' to '>'
        $defaults['delimiter'] = '';
        return $defaults;
    }
    add_filter( 'woocommerce_breadcrumb_defaults', 'wcc_change_breadcrumb_delimiter' );


    /**
     * Register Woo specific widgets
     */
    function apex_widgets_init() {

        /**
         * Layered navigation for Woo lister page
         *
         * Called in show_filter_on_listerpage(), hooked on woocommerce_after_shop_loop
         */
        register_sidebar( array(
            'name'          => __( 'Filterbox', 'apex' ),
            'id'            => 'filterbox',
            'description'   => 'Filter opties voor WooCommerce',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        ) );

        /**
         * Additional nav items
         *
         * Called in header.php
         */
        register_sidebar( array(
            'name'          => __( 'Navbalk', 'apex' ),
            'id'            => 'navbar',
            'description'   => 'Navbar opties',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '',
            'after_title'   => '',
        ) );

        /**
         * Serachbar in header
         *
         * Called in header.php
         */
        register_sidebar( array(
            'name'          => __( 'Searchbar', 'apex' ),
            'id'            => 'searchbar',
            'description'   => 'Searchbar',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '',
            'after_title'   => '',
        ) );

    }
    add_action( 'widgets_init', 'apex_widgets_init' );


    /**
     * Remove add to cart button on lister page
     */
    remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart');


    /**
     * Custom product rating on PDP and LP
     */

    function woocommerce_template_custom_loop_rating($arg) {

        global $product;

        if ( ! wc_review_ratings_enabled() ) {
            return;
        }

        $rating_count = $product->get_rating_count();
        $review_count = $product->get_review_count();
        $average      = $product->get_average_rating();

        if ( $rating_count > 0 ) :

            $star_width = $average * 20;
            $plural = ($rating_count == 1) ? 'beoordeling' : 'beoordelingen';

            ?>

            <div class="woocommerce-product-rating">
                <div class="star-container">
                    <div class="star-wrap open">
                        <div class="star star-open"><?php echo display_icon('fnd-star');?></div>
                        <div class="star star-open"><?php echo display_icon('fnd-star');?></div>
                        <div class="star star-open"><?php echo display_icon('fnd-star');?></div>
                        <div class="star star-open"><?php echo display_icon('fnd-star');?></div>
                        <div class="star star-open"><?php echo display_icon('fnd-star');?></div>
                    </div>
                    <div class="star-wrap closed" style="width: <?=$star_width;?>%;">
                        <div class="star star-closed"><?php echo display_icon('fnd-star-filled');?></div>
                        <div class="star star-closed"><?php echo display_icon('fnd-star-filled');?></div>
                        <div class="star star-closed"><?php echo display_icon('fnd-star-filled');?></div>
                        <div class="star star-closed"><?php echo display_icon('fnd-star-filled');?></div>
                        <div class="star star-closed"><?php echo display_icon('fnd-star-filled');?></div>
                    </div>
                </div>

                <?php if($arg) : ?>
                    <div class="no-of-ratings"><?php echo $rating_count . ' ' . $plural;?></div>
                <?php endif; ?>

            </div>

        <?php endif;

        return;

    }

    /* LP */
    remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5);
    add_action('woocommerce_after_shop_loop_item_title', function() { woocommerce_template_custom_loop_rating(false); } , 5);

    /* PDP Summary */
    remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10);
    add_action('woocommerce_single_product_summary', function() { woocommerce_template_custom_loop_rating(true); } , 5);

