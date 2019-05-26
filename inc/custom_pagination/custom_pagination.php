<?php
/**
 * Archive Navigation
 *
 * @author Bill Erickson
 * @see https://www.billerickson.net/custom-pagination-links/
 *
 */
function ea_archive_navigation() {
	$settings = array(
		'count' => 6,
		'prev_text' => ea_icon( 'arrow-left' ),
		'next_text' => ea_icon( 'arrow-right' )
	);
	global $wp_query;
	$current = max( 1, get_query_var( 'paged' ) );
	$total = $wp_query->max_num_pages;
	$links = array();
	// Offset for next link
	if( $current < $total )
		$settings['count']--;
	// Previous
	if( $current > 1 ) {
		$settings['count']--;
		$links[] = ea_archive_navigation_link( $current - 1, 'prev', $settings['prev_text'] );
	}
	// Current
	$links[] = ea_archive_navigation_link( $current, 'current' );
	// Next Pages
	for( $i = 1; $i < $settings['count']; $i++ ) {
		$page = $current + $i;
		if( $page <= $total ) {
			$links[] = ea_archive_navigation_link( $page );
		}
	}
	// Next
	if( $current < $total ) {
		$links[] = ea_archive_navigation_link( $current + 1, 'next', $settings['next_text'] );
	}
	echo '<nav class="navigation posts-navigation" role="navigation">';
    	echo '<h2 class="screen-reader-text">Posts navigation</h2>';
    	echo '<div class="nav-links">' . join( '', $links ) . '</div>';
	echo '</nav>';
}
add_action( 'tha_content_while_after', 'ea_archive_navigation' );
/**
 * Archive Navigation Link
 *
 * @author Bill Erickson
 * @see https://www.billerickson.net/custom-pagination-links/
 *
 * @param int $page
 * @param string $class
 * @param string $label
 * @return string $link
 */
function ea_archive_navigation_link( $page = false, $class = '', $label = '' ) {
	if( ! $page )
		return;
	$classes = array( 'page-numbers' );
	if( !empty( $class ) )
		$classes[] = $class;
	$classes = array_map( 'sanitize_html_class', $classes );
	$label = $label ? $label : $page;
	$link = esc_url_raw( get_pagenum_link( $page ) );
	return '<a class="' . join ( ' ', $classes ) . '" href="' . $link . '">' . $label . '</a>';
}