<?php

function add_theme_scripts() {
    wp_enqueue_style('googlefont-style', 'https://fonts.googleapis.com/css?family=Titillium+Web:200,300,400,600,700,900');
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');

    wp_enqueue_style('flesk-slider-css', get_stylesheet_directory_uri() . '/css/flexslider.css');
    wp_enqueue_style('bootstrap-min-css', get_stylesheet_directory_uri() . '/css/bootstrap.min.css');
    wp_enqueue_style('font-awesome.min', get_stylesheet_directory_uri() . '/css/font-awesome.min.css');
    // wp_enqueue_style('live-fonts','https://fonts.googleapis.com/css?family=Titillium+Web:200,300,400,600,700,900');
    wp_enqueue_style('owl-carousel-min-css', get_stylesheet_directory_uri() . '/css/owl.carousel.min.css');
    wp_enqueue_style('owl-theme-min-css', get_stylesheet_directory_uri() . '/css/owl.theme.min.css');
    wp_enqueue_style('slick-css', get_stylesheet_directory_uri() . '/css/slick.css');
    // wp_enqueue_style('colorbox-min-css', get_stylesheet_directory_uri() . '/css/colorbox.css');
    wp_enqueue_script('bootstrap-min-js', get_stylesheet_directory_uri() . '/js/bootstrap.min.js', array(), '1', true);
    wp_enqueue_script('owl-carousel-min-js', get_stylesheet_directory_uri() . '/js/owl.carousel.min.js', array(), '1', true);
    wp_enqueue_script('slick-js', get_stylesheet_directory_uri() . '/js/slick.js', array(), '1', true);
    wp_enqueue_script('flesk-slider-js', get_stylesheet_directory_uri() . '/js/jquery.flexslider.js', array(), '1', true);
    wp_enqueue_script('coustom-js', get_stylesheet_directory_uri() . '/js/coustom.js', array(), '1.1.5', true);
    
    if(is_product() || is_checkout()){
        wp_enqueue_script('liveimage-preview', get_stylesheet_directory_uri().'/js/liveImagePreview.js', array(), '1.0.0', true);
    }
    
    if (is_product() || is_checkout()) {

        wp_enqueue_script('googleplaces-js', 'http://maps.googleapis.com/maps/api/js?key=AIzaSyAv8lO257b_CRHsdrFGwh-Qly46ecM93IY&libraries=places', array(), '1.1.5', true);
        wp_enqueue_script('geocomplete-js', get_stylesheet_directory_uri() . '/js/jquery.geocomplete.min.js', array(), '1.1.5', true);
        wp_enqueue_script('geocompleteScript-js', get_stylesheet_directory_uri() . '/js/geocompleteScript.js', array(), '1.1.5', true);
    }


    // wp_enqueue_script('colorbox-js', get_stylesheet_directory_uri() . '/js/jquery.colorbox-min.js', array('jquery'), '1', false);
}

add_action('wp_enqueue_scripts', 'add_theme_scripts');
add_action('init', 'widgets_init');

function widgets_init() {
    register_sidebar(array(
        'name' => __(' Footer 1', 'text1'),
        'id' => 'sidebar-2',
        'description' => __('Widgets in this area will be shown on all posts and pages.', 'text1'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="footer-heading">',
        'after_title' => '</h3>',
    ));
    register_sidebar(array(
        'name' => __(' Footer 2', 'text1'),
        'id' => 'sidebar-3',
        'description' => __('Widgets in this area will be shown on all posts and pages.', 'text1'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="footer-heading">',
        'after_title' => '</h3>',
    ));
    register_sidebar(array(
        'name' => __(' Footer 3', 'text1'),
        'id' => 'serviceinfo',
        'description' => __('Widgets in this area will be shown on all posts and pages.', 'text1'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="footer-heading">',
        'after_title' => '</h3>',
    ));
}

add_action('customize_register', 'theme_footer_customizer');

function theme_footer_customizer($wp_customize) {
    $wp_customize->add_section('footer_settings_section', array(
        'title' => 'Footer Section',
        'description' => 'Customize your social links',
        'priority' => 60,
    ));
    $wp_customize->add_setting('phoneno');
    $wp_customize->add_control('phoneno', array(
        'label' => __('phoneno', 'footer'),
        'type' => 'textbox',
        'section' => 'footer_settings_section',
        'settings' => 'phoneno',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_setting('email');
    $wp_customize->add_control('email', array(
        'label' => __('email', 'footer'),
        'type' => 'textbox',
        'section' => 'footer_settings_section',
        'settings' => 'email',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_setting('copyright');
    $wp_customize->add_control('copyright', array(
        'label' => __('copyright', 'footer'),
        'type' => 'textbox',
        'section' => 'footer_settings_section',
        'settings' => 'copyright',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_setting('displayphoneno');
    $wp_customize->add_control('displayphoneno', array(
        'label' => __('displayphoneno', 'footer'),
        'type' => 'textbox',
        'section' => 'footer_settings_section',
        'settings' => 'displayphoneno',
        'transport' => 'postMessage'
    ));
}

function create_posttype() {
    register_post_type('testimonials', $args = array(
        'label' => __('Testimonials'),
        'description' => __('Testimonials'),
        //'labels' => $labels,
        // Features this CPT supports in Post Editor
        'supports' => array('title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields',),
        // You can associate this CPT with a taxonomy or custom taxonomy. 
        'taxonomies' => array('slider'),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'page',
            )
    );
//    // Registering your Custom Post Type
//    register_post_type('testimonials', $args);
}

add_action('init', 'create_posttype', 10);

function create_posttype_layouts() {
    register_post_type('layouts', $args = array(
        'label' => __('Layouts'),
        'description' => __('Layouts'),
        //'labels' => $labels,
        // Features this CPT supports in Post Editor
        'supports' => array('title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields',),
        // You can associate this CPT with a taxonomy or custom taxonomy. 
        'taxonomies' => array('layout'),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'page',
            )
    );
//    // Registering your Custom Post Type
//    register_post_type('testimonials', $args);
}

add_action('init', 'create_posttype_layouts', 10);


// Remove Related Product 
remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);

/**
 * Remove Woocmmerce Default Product Gallery and add custom image section
 * */
function check_for_me_product_image() {
    $image = '<div class="woocommerce-product-gallery woocommerce-product-gallery--with-images woocommerce-product-gallery--columns-4 images" data-toggle="modal" data-target="#cfm-bs-modal">
        <div class="cfm-image-wrapper" id="cfm-popup" >
            <div class="cfm-bg-img"><img src="' . get_the_post_thumbnail_url(get_the_ID()) . '" id="cfm-bg-img-image"></div>
            <div class="cfm-template-img"></div>
        </div>
        <div class="cfm-popup-text"><i class="fa fa-search-plus" aria-hidden="true"></i> Click here for large preview
        </div>
    </div>
    
<div id="cfm-bs-modal" class="modal fade  cfm-bs-modal" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn btn-default btn-cfm-modal close" data-dismiss="modal" aria-label="Close"> Close <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"> </h4>
      </div>
      <div class="modal-body">
        <div class="cfm-image-wrapper" id="cfm-modal">
            <div class="cfm-bg-img"><img src="' . get_the_post_thumbnail_url(get_the_ID()) . '" id="cfm-bg-img-modal"></div>
            <div class="cfm-template-img"></div>
        </div>
      </div>
      
    </div>

  </div>
</div>
    
    ';
    echo $image;
}

function check_for_me_product_image_mobile() {
    $image = '<div class="visible-xs woocommerce-product-gallery-mobile woocommerce-product-gallery woocommerce-product-gallery--with-images woocommerce-product-gallery--columns-4 images" data-toggle="modal" data-target="#cfm-bs-modal">
   
        <div class="cfm-image-wrapper" id="cfm-popup-mobile">
            <div class="cfm-bg-img"><img src="' . get_the_post_thumbnail_url(get_the_ID()) . '" id="cfm-bg-img-image-mobile"></div>
            <div class="cfm-template-img"></div>
        </div>
        <div class="cfm-popup-text"><i class="fa fa-search-plus" aria-hidden="true"></i> Click here for large preview
        </div>
   
</div>';
    echo $image;
}

remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20);
add_action('woocommerce_before_single_product_summary', 'check_for_me_product_image', 40);
add_action('woocommerce_before_single_product_summary', 'check_for_me_product_image_mobile', 50);

/**
 *  Change Woocommerce add to cart label
 * */
add_filter('woocommerce_product_single_add_to_cart_text', 'woo_custom_single_add_to_cart_text');  // 2.1 +

function woo_custom_single_add_to_cart_text() {

    return __('Add Order to Shopping Cart', 'woocommerce');
}

/**
 *  Removes woocomerce category meta
 * */
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);



/**
 * Remove product data tabs
 */
add_filter('woocommerce_product_tabs', 'woo_remove_product_tabs', 98);

function woo_remove_product_tabs($tabs) {

    unset($tabs['description']);       // Remove the description tab
    unset($tabs['reviews']);    // Remove the reviews tab
    unset($tabs['additional_information']);   // Remove the additional information tab

    return $tabs;
}

/**
 * Remove Price from the title
 */
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20);


/**
 * Add content for Reorder and Title
 * */
add_action('woocommerce_single_product_summary', 'cfm_title_row_open', 10);
add_action('woocommerce_single_product_summary', 'cfm_title_main_div_open', 10);
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 15);
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 15);
add_action('woocommerce_single_product_summary', 'cfm_title_div_close', 20);

add_action('woocommerce_single_product_summary', 'cfm_title_button_div', 20);
add_action('woocommerce_single_product_summary', 'cfm_title_div_close', 25);
add_action('woocommerce_single_product_summary', 'cfm_iframe_div', 30);

function cfm_iframe_div() {
    echo '<div id="cfm-popup-iframe"></div>';
}

function cfm_title_row_open() {
    echo '<div class="row cfm-single-wrap">';
}

function cfm_title_div_close() {
    echo '</div>';
}

function cfm_title_main_div_open() {
    echo '<div class="col-md-8 cfm-title-main-wrap">';
}

function cfm_title_button_div() {
    echo '<div class="col-md-4 cfm-button-wrap">
        <button class="btn btn-reorder-button" id="button-reorder">
            Reorder Checks
        </button>
     </div>';
}

/**
 *  Removes select2 from the Woocommerce
 * */
add_action('wp_enqueue_scripts', 'wsis_dequeue_stylesandscripts_select2', 100);

function wsis_dequeue_stylesandscripts_select2() {
    if (class_exists('woocommerce')) {
        wp_dequeue_style('selectWoo');
        wp_deregister_style('selectWoo');

        wp_dequeue_script('selectWoo');
        wp_deregister_script('selectWoo');
    }
}

/**
 *  Get content from another  Page
 * */
function show_post($path) {
    $post = get_page_by_path($path);
    $content = apply_filters('the_content', $post->post_content);
    echo $content;
}

/**
 * Change Product URL
 * */
function woocommerce_template_loop_product_link_open() {
    global $product;

    $link = apply_filters('woocommerce_loop_product_link', get_the_permalink(), $product);

    if (is_product_category('reorder-checks')) {

        echo '<a href="' . esc_url($link) . '?reorder=1" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">';
    } else {

        echo '<a href="' . esc_url($link) . '" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">';
    }
}

/**
 *  Category page customization
 * */
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);

function woocommerce_template_loop_price() {
    if (is_product_category()) {
        echo "<p>Starts at <span>";
        wc_get_template('loop/price.php');
        echo "</span> </p>";
    } else {
        wc_get_template('loop/price.php');
    }
}

/**
 * Wrap all stripe icons
 * */
function rs_removed_icon($icons) {

    $icons = '<span class="cfm-stripe-icons">' . $icons . '</span>';
    return $icons;
}

add_filter('woocommerce_gateway_icon', 'rs_removed_icon');


/**
 *  Hide admin bar on frontend
 * */
add_filter('show_admin_bar', '__return_false');


/**
 * Disable Emojis and it's prefetch
 * */

/**
 * Disable the emoji's
 */
function disable_emojis() {
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('admin_print_styles', 'print_emoji_styles');
    remove_filter('the_content_feed', 'wp_staticize_emoji');
    remove_filter('comment_text_rss', 'wp_staticize_emoji');
    remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
    add_filter('tiny_mce_plugins', 'disable_emojis_tinymce');
    add_filter('wp_resource_hints', 'disable_emojis_remove_dns_prefetch', 10, 2);
}

add_action('init', 'disable_emojis');

/**
 * Filter function used to remove the tinymce emoji plugin.
 * 
 * @param array $plugins 
 * @return array Difference betwen the two arrays
 */
function disable_emojis_tinymce($plugins) {
    if (is_array($plugins)) {
        return array_diff($plugins, array('wpemoji'));
    } else {
        return array();
    }
}

/**
 * Remove emoji CDN hostname from DNS prefetching hints.
 *
 * @param array $urls URLs to print for resource hints.
 * @param string $relation_type The relation type the URLs are printed for.
 * @return array Difference betwen the two arrays.
 */
function disable_emojis_remove_dns_prefetch($urls, $relation_type) {
    if ('dns-prefetch' == $relation_type) {
        /** This filter is documented in wp-includes/formatting.php */
        $emoji_svg_url = apply_filters('emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/');

        $urls = array_diff($urls, array($emoji_svg_url));
    }

    return $urls;
}

/**
 * Disable Plugin Updates
 * */
function filter_plugin_updates($value) {
    unset($value->response['akismet/akismet.php']);
    unset($value->response['woocommerce-tm-extra-product-options/tm-woo-extra-product-options.php']);
    unset($value->response['advanced-custom-fields-pro/acf.php']);
    return $value;
}

add_filter('site_transient_update_plugins', 'filter_plugin_updates');

/**
 * Add class to cart page title link
 * */
add_filter('woocommerce_order_item_name', 'woo_order_item_with_link', 10, 3);

function woo_order_item_with_link($item_name, $item, $bool) {
    $url = get_permalink($item['product_id']);
    return '<a href="' . $url . '" class="cfm-product-link">' . $item_name . '</a>';
}

/**
 *  Add action to the Order page 
 * */
function cfm_add_order_again_to_my_orders_actions($actions, $order) {
    if ($order->has_status('completed')) {
        $actions['order-again'] = array(
            'url' => wp_nonce_url(add_query_arg('order_again', $order->get_id()), 'woocommerce-order_again'),
            'name' => __('Reorder', 'woocommerce')
        );
    }
    return $actions;
}

add_filter('woocommerce_my_account_my_orders_actions', 'cfm_add_order_again_to_my_orders_actions', 50, 2);

/**
 * Get coordinates
 **/
 
function getCoordinates($layoutID, $fieldName, $axis){
    
    $x = get_field( $fieldName."_".$axis, $layoutID );
    
    
    return $x;
}

/**
 * Insert text into image
 **/
 
 function generateTextforImage($requestVar, $name, $image, $fontSize, $pageId, $color, $xMargin = 0, $yMargin = 0) {
     if( isset($_REQUEST[$requestVar]) && !empty($_REQUEST[$requestVar])) { 
         if( getCoordinates($pageId, $name,'x') && getCoordinates($pageId, $name,'x') ){
            ImageString($image,$fontSize, getCoordinates($pageId, $name,'x') + $xMargin,getCoordinates($pageId, $name , 'y') + $yMargin, $_REQUEST[$requestVar],$color);
         }
    }   
}

/**
 * Customizer register for the Live preview Api Section
 **/

add_action('customize_register', 'live_image_customizer');

function live_image_customizer($wp_customize) {
    $wp_customize->add_section('live_image_preview', array(
        'title' => 'Live Image Preview',
        'description' => 'Live Image Preview Settings and options',
        'priority' => 60,
    ));
    $wp_customize->add_setting('api_page');
    $wp_customize->add_control('api_page', array(
        'label' => __('API Page', 'footer'),
        'type' => 'dropdown-pages',
        'section' => 'live_image_preview',
        'settings' => 'api_page',
        'transport' => 'postMessage'
    ));
   
}
?>