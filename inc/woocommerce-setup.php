<?php
// WooCommerce functions
add_action( 'after_setup_theme', 'woocommerce_support' );
if ( ! function_exists( 'woocommerce_support' ) ) {
    /**
     * Declares WooCommerce theme support.
     */
    function woocommerce_support() {
        add_theme_support( 'woocommerce' );
        // hook in and customizer form fields.
        add_filter( 'woocommerce_form_field_args', 'wc_form_field_args', 10, 3 );
        //add_filter( 'woocommerce_default_address_fields', 'wc_form_field_args', 10, 3 );
    }
}

/**
 * Filter hook function monkey patching form classes
 * Author: Adriano Monecchi http://stackoverflow.com/a/36724593/307826
 *
 * @param string $args Form attributes.
 * @param string $key Not in use.
 * @param null   $value Not in use.
 *
 * @return mixed
 */
function wc_form_field_args( $args, $key, $value = null ) {

    // Start field type switch case.
    switch ( $args['type'] ) {

        /* Targets all select input type elements, except the country and state select input types */
        case 'select' :
            // Add a class to the field's html element wrapper - woocommerce
            // input types (fields) are often wrapped within a <p></p> tag.
            $args['class'][] = 'form-group';
            // Add a class to the form input itself.
            $args['input_class']       = array( 'form-control' );
            $args['label_class']       = array( 'control-label' );
            $args['custom_attributes'] = array(
                'data-plugin'      => array('select'),
                'data-allow-clear' => 'true',
                'aria-hidden'      => 'true',
                // Add custom data attributes to the form input itself.
            );
            break;

        // By default WooCommerce will populate a select with the country names - $args
        // defined for this specific input type targets only the country select element.
        case 'country' :
            $args['class'][]     = 'form-group single-country';
            $args['label_class'] = array( 'control-label' );
            break;

        // By default WooCommerce will populate a select with state names - $args defined
        // for this specific input type targets only the country select element.
        case 'state' :
            // Add class to the field's html element wrapper.
            $args['class'][] = 'form-group';
            // add class to the form input itself.
            $args['label_class']       = array( 'control-label' );
            $args['custom_attributes'] = array(
                'data-plugin'      => 'select2',
                'data-allow-clear' => 'true',
                'aria-hidden'      => 'true',
            );
            break;

        case 'password' :
        case 'text' :
        case 'email' :
        case 'tel' :
        case 'number' :
            $args['class'][]     = 'form-group';
            $args['input_class'] = array( 'form-control' );
            $args['label_class'] = array( 'control-label' );
            break;

        case 'textarea' :
            $args['input_class'] = array( 'form-control' );
            $args['label_class'] = array( 'control-label' );
            break;

        case 'checkbox' :
            $args['label_class'] = array( 'custom-control custom-checkbox' );
            $args['input_class'] = array( 'custom-control-input' );
            break;

        case 'radio' :
            $args['label_class'] = array( 'custom-control custom-radio' );
            $args['input_class'] = array( 'custom-control-input' );
            break;

        default :
            $args['class'][]     = 'form-group';
            $args['input_class'] = array( 'form-control' );
            $args['label_class'] = array( 'control-label' );
            break;
    } // end switch ($args).

    return $args;
}


global $pagenow;
if ( is_admin() && isset( $_GET['activated'] ) && $pagenow == 'themes.php' ) add_action( 'init', 'oseo_woocommerce_image_dimensions', 1 );
/*
Define image sizes
*/
function oseo_woocommerce_image_dimensions() {
    $catalog = array(
        'width' 	=> '350',	// px
        'height'	=> '453',	// px
        'crop'		=> 1 		// true
    );
    $single = array(
        'width' 	=> '570',	// px
        'height'	=> '708',	// px
        'crop'		=> 1 		// true
    );
    $thumbnail = array(
        'width' 	=> '350',	// px
        'height'	=> '453',	// px
        'crop'		=> 0 		// false
    );
    // Image sizes
    update_option( 'shop_catalog_image_size', $catalog ); 		// Product category thumbs
    update_option( 'shop_single_image_size', $single ); 		// Single product image
    update_option( 'shop_thumbnail_image_size', $thumbnail ); 	// Image gallery thumbs
}
/*
 * Add basic WooCommerce template support
 *
 */


// Remove original WooCommerce wrappers
//remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
//remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

add_filter('loop_shop_columns', 'oseo_loop_columns');
if (!function_exists('oseo_loop_columns')) {
    function oseo_loop_columns() {
        return 3; // 3 products per row
    }
}
/*

remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );

add_action( 'woocommerce_archive_description', 'woocommerce_taxonomy_archive_description', 10 );
add_action( 'woocommerce_archive_description', 'woocommerce_taxonomy_archive_description', 10 );

add_action( 'woocommerce_archive_description', 'woocommerce_product_archive_description', 10 );
add_action( 'woocommerce_archive_description', 'woocommerce_product_archive_description', 10 );

add_action( 'woocommerce_before_shop_loop', 'wc_print_notices', 10 );
add_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
add_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );

add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10);
add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );

add_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );

add_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
add_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );

add_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );

add_action( 'woocommerce_after_shop_loop', 'woocommerce_pagination', 10 );

add_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );
 * Add Cart icon and count to header if WC is active
 */

if(!function_exists('oseo_wc_cart_count')):
function oseo_wc_cart_count() {
    if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {

        $count = WC()->cart->cart_contents_count;
        ?>
        <ul class="nav navbar-nav navbar-right mini-cart-menu">
            <?php if($count > 0 ){ ?>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                    <span class="fa-stack" style="font-size: 14px;">
                        <i class="fa fa-shopping-bag fa-stack-2x"></i>
                        <strong class="fa-stack-1x cart-text"><?php echo number_format_i18n($count);?></strong>
                    </span>
                </a>
                <ul class="dropdown-menu dropdown-cart" role="menu">
                    <li class="text-center"><?php echo sprintf(__('Items in your cart : %s Items','oseo'),number_format_i18n($count));?></li>
                    <li class="divider"></li>
                    <li><?php woocommerce_mini_cart(); ?></li>
                </ul>
            </li>
            <?php }else{
                echo '<li><a href="'.get_permalink( woocommerce_get_page_id( 'shop' ) ).'"></a></li>';
            } ?>
        </ul>
        <?php
    }

}
endif;
//add_action( 'wp_nav_menu_items', 'my_wc_cart_count' );




/**
 * Ensure cart contents update when products are added to the cart via AJAX
 */
function my_header_add_to_cart_fragment( $fragments ) {

    ob_start();
    $count = WC()->cart->cart_contents_count;
    ?><a class="cart-contents" href="<?php echo WC()->cart->get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>"><?php
    if ( $count > 0 ) {
        ?>
        <span class="cart-contents-count"><?php echo esc_html( $count ); ?></span>
        <?php
    }
        ?></a><?php

    $fragments['a.cart-contents'] = ob_get_clean();

    return $fragments;
}
add_filter( 'woocommerce_add_to_cart_fragments', 'my_header_add_to_cart_fragment' );


