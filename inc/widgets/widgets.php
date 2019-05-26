<?php 
//Setup widget areas
function text_widgets_init()
{

    $args = array(
        'name' => esc_html__('Main Sidebar', 'text'),
        'id' => 'main-sidebar',
        'description' => esc_html__("Add widgets for main sidebar here", "ns0014"),
        'before_widget' => '<aside class="single_sidebar_widget %2$s">',
        'class' => 'custom-widget-area',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget_title">',
        'after_title' => '</h3>'

    );
    register_sidebar($args);



    $footerargs = array(
        'name' => esc_html__('Footer Widget', 'text'),
        'id' => 'footer-widget',
        'description' => esc_html__("Add widgets for About Us here", "ns0014"),
        'before_widget' => '<div class="col-lg-3 col-sm-6 mb-4 mb-xl-0 single-footer-widget">',
        'class' => 'custom-widget-area',
        'after_widget' => '</div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>'

    );
    register_sidebar($footerargs);
    

    $secondarysidebarargs = array(
        'name' => esc_html__('Secondary sidebar', 'text'),
        'id' => 'secondary-sidebar',
        'description' => esc_html__("Add widgets for contact us here", "ns0014"),
        'before_widget' => '<div class="media contact-info">',
        'class' => 'custom-widget-area',
        'after_widget' => '</div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>'

    );
    register_sidebar($secondarysidebarargs);

}

add_action('widgets_init', 'text_widgets_init');

