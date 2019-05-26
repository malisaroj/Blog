<?php 
//register a  custom taxonomy
function custom_type()
{

    $labels = array(
        'name' => _x('Types', 'taxonomy general name'),
        'singular_name' => _x('Type', 'taxonomy singular name'),
        'search_items' => __('Search Types'),
        'all_items' => __('All Types'),
        'parent_item' => __('Parent Type'),
        'parent_item_colon' => __('Parent Type:'),
        'edit_item' => __('Edit Type'),
        'update_item' => __('Update Type'),
        'add_new_item' => __('Add New Type'),
        'new_item_name' => __('New Type Name'),
        'menu_name' => __('Types'),
    );

    $args = array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'type')
    );
    // create a new  hierarchical taxonomy
    register_taxonomy(
        'type',
        array('blogs'),
        $args
    );

    // create a new non hierarchical taxonomy
    register_taxonomy('tags', 'blogs', array(
        'label' => 'Tags',
        'rewrite' => array('slug' => 'tags'),
        'hierarchical' => false,

    ));
}

add_action('init', 'custom_type');
