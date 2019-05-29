<?php

//register post types
include 'inc/post_types/post_type.php';

//register custom Taxonomy
include 'inc/taxonomy/custom_taxonomy.php';

// Registering the Widgets
include 'inc/widgets/widgets.php';
include 'inc/widgets/custom_widgets.php';
include 'inc/widgets/custom_category_widget.php';
include 'inc/widgets/custom_recentpost_widget.php';
include 'inc/widgets/custom_tag_widget.php';
include 'inc/widgets/custom_instagram_widget.php';



/* Adding pagination */
include 'inc/custom_pagination/custom_pagination.php';

/* Adding instagram  */
include 'inc/instagram_posts/instagram_post.php';


//Registering custom shortcode
include 'inc/short_code/short_code.php';
include 'inc/short_code/social_icons.php';


/*add theme support*/
add_theme_support('title-tag');
add_theme_support('post-thumbnails');
add_theme_support('post_format', ['aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat']);
add_theme_support('html5');
add_theme_support('automatic-feed-links');
add_theme_support('custom-background');
add_theme_support('custom-header');
add_theme_support('custom-logo');
add_theme_support('customize-selective-refresh-widgets');
add_theme_support('starter-content');
add_theme_support('excerpt');
add_theme_support('editor-style');

/* Load in our CSS */
function test_enqueue_styles()
{
    wp_enqueue_style('main-css', get_stylesheet_directory_uri() . '/style.css', [], time(), 'all');
    /* Bootstrap CSS */
    wp_enqueue_style('bootstrap-css', get_stylesheet_directory_uri() . '/css/bootstrap.css', [], time(), 'all');
    wp_enqueue_style('themify-icons-css', get_stylesheet_directory_uri() . '/css/themify-icons.css', [], time(), 'all');
    wp_enqueue_style('flaticon-css', get_stylesheet_directory_uri() . '/css/flaticon.css', [], time(), 'all');
    wp_enqueue_style('fontawesome-css', get_stylesheet_directory_uri() . '/vendors/fontawesome/css/all.min.css', [], time(), 'all');
    wp_enqueue_style('animate-css', get_stylesheet_directory_uri() . '/vendors/animate-css/animate.css', [], time(), 'all');
    wp_enqueue_style('magnific-popup-css', get_stylesheet_directory_uri() . '/vendors/popup/magnific-popup.css', [], time(), 'all');

    /* main CSS */
    wp_enqueue_style('style-css', get_stylesheet_directory_uri() . '/css/style.css', [], time(), 'all');
    wp_enqueue_style('responsive-css', get_stylesheet_directory_uri() . '/css/responsive.css', ['bootstrap-css', 'style-css'], time(), 'all');
}
add_action('wp_enqueue_scripts', 'test_enqueue_styles');


/* Load in our JS */
function add_theme_scripts()
{
    wp_enqueue_script('jquery', get_template_directory_uri() . '/js/jquery-2.2.4.min.js', [], time(), true);
    wp_enqueue_script('popper', get_template_directory_uri() . '/js/popper.js', [], time(), true);
    wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', [], time(), true);
    wp_enqueue_script('stellar-js', get_template_directory_uri() . '/js/stellar.js', [], time(), true);
    wp_enqueue_script('popup-js', get_template_directory_uri() . '/vendors/popup/jquery.magnific-popup.min.js', [], time(), true);
    wp_enqueue_script('ajaxchimp-js', get_template_directory_uri() . '/js/jquery.ajaxchimp.min.js', [], time(), true);
    wp_enqueue_script('waypoints-js', get_template_directory_uri() . '/js/waypoints.min.js', [], time(), true);
    wp_enqueue_script('mail-script-js', get_template_directory_uri() . '/js/mail-script.js', [], time(), true);
    wp_enqueue_script('contact-js', get_template_directory_uri() . '/js/contact.js', [], time(), true);
    wp_enqueue_script('jquery-form-js', get_template_directory_uri() . '/js/jquery.form.js', [], time(), true);
    wp_enqueue_script('jquery-validate-js', get_template_directory_uri() . '/js/jquery.validate.min.js', [], time(), true);
    wp_enqueue_script('theme-js', get_template_directory_uri() . '/js/theme.js', [], time(), true);
    wp_enqueue_script('main', get_template_directory_uri() . '/js/main.js', [], time(), true);


}
add_action('wp_enqueue_scripts', 'add_theme_scripts');


function add_owl_carousel()
{
    wp_enqueue_style('owl-carousel-min-css', get_template_directory_uri() . '/css/owl.carousel.min.css');
    wp_enqueue_style('owl-theme-default-min-css', get_template_directory_uri() . '/css/owl.theme.default.min.css');
    wp_enqueue_script('owl-carousel-min-js', get_template_directory_uri() . '/js/owl.carousel.min.js');
}

add_action('wp_enqueue_scripts', 'add_owl_carousel');

/* Register menu locations */
register_nav_menus([
    'main-menu' => esc_html__('Main Menu', 'ns0014'),
    'top-left-menu' => esc_html__('Top Left Menu', 'ns0014'),
    'top-right-menu' => esc_html__('Top Right Menu', 'ns0014'),
    'secondary-menu' => esc_html__('Secondary Menu', 'ns0014'),

]);

/* Setup for the custom logo */

function custom_logo()
{
    $defaults = array(
        'height' => 100,
        'width'  => 400,
        'flex-height' => true,
        'flex-width' => true,
        'header-text' => array('site-title', 'site-description'),
    );
    add_theme_support('custom-logo', $defaults);
}

add_action('after_setup_theme', 'custom_logo');


/* Adding a CSS Class to a specific menu item */
function add_additional_class_on_li($classes, $item, $args)
{
    if ($args->add_li_class) {
        $classes[] = $args->add_li_class;
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);

/* Adding a CSS clas to a Anchor tag */
function add_class_to_items_link($atts, $item, $args)
{

    if ($args->add_a_class) {
        // add the desired attributes:
        $atts['class'] = $args->add_a_class;
    }
    return $atts;
}
add_filter('nav_menu_link_attributes', 'add_class_to_items_link', 10, 3);


/* Adding the active class to the currently active menus */
add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);

function special_nav_class ($classes, $item) {
    if (in_array('current-menu-item', $classes) ){
        $classes[] = 'active ';
    }
    return $classes;
}


function new_submenu_class($menu) {    
    $menu = preg_replace('/ class="sub-menu"/','/ class="dropdown-menu" /',$menu);        
    return $menu;      
}

add_filter('wp_nav_menu','new_submenu_class'); 

//Enabling the shortcode to be used in custom html widget
add_filter( 'widget_text', 'do_shortcode' );

