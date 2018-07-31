<?php
defined( 'ABSPATH' ) or die( 'No direct access allowed.' );

/**
 * Register route to listen to webhooks
 */
function process_webhook( WP_REST_Request $request ) {

	// Get the JSON parameters as array
	$params = $request->get_json_params();

	// Make sure we got information posted and parsed from the webhook.
	if( !empty($params) ) {

		// Create categories if they don't exists
		if( !empty($params['categories']) && (count($params['categories']) > 0) ) {
			foreach($params['categories'] as $category) {
				if( !term_exists($category, 'companycam_feed_category') ) {
					wp_insert_term($category, 'companycam_feed_category');
				}
			}
		}

		// Check if the custom post exists by id
		$post_status = get_post_status($params['companyCamCollectionId']);

		// Check if post exists
		if( $post_status === false ) {

			// Create post. We use import id to be able to use the collection id sent
			$post_array = array(
				'import_id' => $params['companyCamCollectionId'],
				'post_content' => $params['description'],
				'post_title' => $params['title'],
				'post_status' => 'publish',
				'post_type' => 'companycam_feed'
			);
			$postId = wp_insert_post($post_array);

			// Attach categories to newly created post
			wp_set_object_terms($postId, array_values($params['categories']), 'companycam_feed_category', true);

			// Build the response object
			$response = new WP_REST_Response(
				array(
					'status' => 'success',
					'post_id' => $postId
				)
			);
			$response->set_status(200);
			return $response->data;
		}
	}
}

// Register route for our webhook in wordpress
add_action('rest_api_init', function(){
	register_rest_route(
		'companycam/v1',
		'webhook',
		array(
			'methods' => 'POST',
			'callback' => 'process_webhook'
		)
	);
});
