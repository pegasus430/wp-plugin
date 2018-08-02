<?php

// Single page template
if( !function_exists('get_companycam_feed_template') ):
 function get_companycam_feed_template($single_template) {
    global $wp_query, $post;
    if ($post->post_type == 'companycam_feed'){
        $single_template = plugin_dir_path(__DIR__ . '../') . 'templates/single-companycam_feed.php';
    }
    return $single_template;
}
endif;
add_filter( 'single_template', 'get_companycam_feed_template' ) ;
?>