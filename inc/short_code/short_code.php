<?php

function instagram_shortcode( $atts, $content = null ) {
	$a = shortcode_atts( array(
		'count' => 6 // How many images to display
	), $atts );

	// Get the Instagram feed from our function above
	$result = wpabsolute_instagram_feed( $a['count'] );

	// Set the default return value of and empty string
	$return = '';
	if ( $result ) {

		// Loop through the results and build up the markup to return.
		foreach ( $result as $insta ):

			// Modify this markup to your liking
			$return .= '<li><a href="' . esc_url( $insta->images->standard_resolution->url ) . '" rel="">';
			$return .= '<img class="img-fluid" src="' . esc_url( $insta->images->thumbnail->url ) . '" alt="">';
			$return .= '</a></li>';

		endforeach;
	}

	// Return the instagram feed.
	return $return;
}
add_shortcode( 'wpab_instagram_feed', 'instagram_shortcode' );