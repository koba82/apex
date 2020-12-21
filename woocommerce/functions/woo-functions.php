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
     * Add the Cost of Products to WooCommerce products (COP)
     */
    function woocommerce_render_cop_field() {
        $input   = array(
            'id'          => '_cop',
            'label'       => sprintf(
                '<abbr title="%1$s">%2$s</abbr>',
                _x( 'Inkoopprijs', 'field label', 'my-theme' ),
                _x( 'Inkoopprijs', 'abbreviated field label', 'my-theme' )
            ),
            'value'       => get_post_meta( get_the_ID(), '_cop', true ),
            'desc_tip'    => true,
            'description' => __( 'Voer de inkoopprijs van het product in', 'my-theme' ),
        );
        ?>

        <div id="cop_attr" class="options_group">
            <?php woocommerce_wp_text_input( $input ); ?>
        </div>

        <?php
    }

    add_action( 'woocommerce_product_options_inventory_product_data', 'woocommerce_render_cop_field' );

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
     * Add specific product attributes to PDP summary based on backend list
     */
    function woocommerce_add_attributes_to_summary() {
        global $product;

        $attr = get_field('summary-attribute', 'option');

        if($attr) :

            echo '<div class="summary-attributes">';

            foreach($attr as $at) :

                if($product->get_attribute($at['attribute-id'])) :
                   echo '<div class="attr-row"><span class="attr-key">' . $at['attribute-label'] . '</span><span class="attr-value">' . $product->get_attribute($at['attribute-id']) . '</<span></div>';
                endif;

           endforeach;

            echo '</div>';

        endif;
    }

    add_action( 'woocommerce_single_product_summary', 'woocommerce_add_attributes_to_summary', 45 );


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

    //Wrap listerpage in div


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

