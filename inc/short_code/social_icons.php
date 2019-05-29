<?php

function socialicons_shortcode($atts, $content = null)
{
    $attribute = shortcode_atts(array(
        'location' => '',
        'href' =>  '',
        'class' => '',

    ), $atts);

    $output = '';
    // Check if href has a value before we continue to eliminate bugs
    if ( !$attribute['href'] || !$attribute['class'] )
        return $output;

    // Create our array of values
    // First, sanitize the data and remove white spaces
    $no_whitespaces_href = preg_replace( '/\s*,\s*/', ',', filter_var( $attribute['href'], FILTER_SANITIZE_STRING ) ); 
    $href_array = explode( ',', $no_whitespaces_href );

    $no_whitespaces_class = preg_replace( '/\s*,\s*/', ',', filter_var( $attribute['class'], FILTER_SANITIZE_STRING ) ); 
    $class_array = explode( ',', $no_whitespaces_class );

    // We need to make sure that our two arrays are exactly the same lenght before we continue
    if ( count( $href_array ) != count( $class_array ) )
        return $output;

    // We now need to combine the two arrays, ids will be keys and text will be value in our new arrays
    $combined_array = array_combine( $href_array, $class_array );
    if($attribute['location'] == 'header') {
    $output .= '<ul class="header_social">';

    foreach ( $combined_array as $k => $v )
        $output .= '<li><a href="' . $k .  '"><i class="' . $v . '"></i></a></li>';

    return $output;
    $output .= '</ul>';
    } elseif($attribute['location'] == 'footer') {
        foreach ( $combined_array as $k => $v )
        $output .= '<a href="' . $k .  '"><i class="' . $v . '"></i></a>';

    return $output;

    }
    
}

add_shortcode('socialicons', 'socialicons_shortcode');
