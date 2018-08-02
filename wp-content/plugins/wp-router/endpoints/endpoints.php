<?php
/**
 * Grab latest post title by an author!
 *
 * @param array $data Options for the function.
 * @return string|null Post title for the latest,  * or null if none.
 */
function my_func( $data ) {
	$posts = get_posts( array(
		'author' => $data['id'],
	) );

	if ( empty( $posts ) ) {
		return null;
	}

	return $posts[0]->post_title;
}

add_action( 'rest_api_init', function () {
	register_rest_route( 'v1',
		'web', array(
		'methods' => 'GET',
		'callback' => 'my_func',
	) );
} );

?>
