<?php
defined( 'ABSPATH' ) or die( 'No direct access allowed.' );

/**
 * Register route to listen to webhooks
 */
function process_webhook( WP_REST_Request $request ) {
	
		$resp = wp_remote_get( 'http://192.168.0.81/staging/companycam-wp-site-and-plugin/remote_data.json' );
			// Check for error
			if ( is_wp_error( $resp ) ) {
					return;
				}
			// Parse remote HTML file
			  $json = wp_remote_retrieve_body( $resp );
			// Check for error
				if ( is_wp_error( $data ) ) {
					return;
				}
			
				$data = json_decode($json);
				$version = $data->{'version'};
				$title = $data->{'title'};
				$description = $data->{'description'};
				$categories = $data->{'categories'};
				foreach($categories as  $cat)
					{
				//	 echo $cat[0];
					}
				$materials = $data->{'materials'};
				  foreach($materials as  $mat)
					{
				//	 echo $mat[0];
					}
				
				$user_id = get_current_user_id();				
				$post_data = array(
					'post_author' => $user_id,
					'post_content' => $description,
					'post_content_filtered' => '',
					'post_title' => $title,
					'post_excerpt' => '',
					'post_status' => 'draft',
					'post_type' => 'post',
					'comment_status' => '',
					'ping_status' => 'open',
					'post_password' => '',
					'to_ping' =>  '',
					'pinged' => '',
					'post_parent' => 0,
					'menu_order' => 0,
					'guid' => '',
					'import_id' => 0,
					'context' => '',
				);
				// Post data to database
				wp_insert_post($post_data, false);
					
					
					//print_r(get_posts());	
			
					
                     return "success";
			
}

// Register route for our webhook in wordpress
add_action('rest_api_init', function(){
	register_rest_route(
		'companycam/v1',
		'webhook',
		array(
			'methods' => 'GET',
			'callback' => 'process_webhook'
		)
	);
});
