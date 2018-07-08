<?php
defined('ABSPATH') or die('No direct access allowed.');
/*
Plugin Name:  CompanyCam Project Feed
Plugin URI:
Description:  This plugin ingest JSON calls and creates custom posts.
Version:      1.0
Author:       CompanyCam
Author URI:   http://companycam.com/
License:      GPL2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
Text Domain:  wporg
Domain Path:  /languages
*/
/**
 * Register post type on plugin activation
 */
//CompanyCam Taxonomy
function register_companycam_taxonomy()
{
    $labels = array(
        'name' => 'CompanyCam Feed Categories',
        'singular_name' => 'Category',
        'search_items' => 'Search',
        'all_items' => 'All Categories',
        'parent_item' => 'Parent Category',
        'parent_item_colon' => 'Parent Category:',
        'edit_item' => 'Edit Category',
        'update_item' => 'Update Category',
        'add_new_item' => 'Add New Category',
        'new_item_name' => 'New Category Name',
        'menu_name' => 'Category'
    );

    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
        'rewrite' => false,
        'capabilities' => array('manage_terms')
    );

    register_taxonomy('companycam_feed_category', array('companycam_feed'), $args);
}

//CompanyCam Taxonomy
function register_materials_taxonomy()
{
    $labels = array(
        'name' => 'CompanyCam Materials',
        'singular_name' => 'Materials',
        'search_items' => 'Search',
        'all_items' => 'All Materials',
        'parent_item' => 'Parent Material',
        'parent_item_colon' => 'Parent Material:',
        'edit_item' => 'Edit Material',
        'update_item' => 'Update Material',
        'add_new_item' => 'Add New Material',
        'new_item_name' => 'New Material Name',
        'menu_name' => 'Material'
    );

    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
        'rewrite' => false,
        'capabilities' => array('manage_terms')
    );

    register_taxonomy('companycam_feed_material', array('companycam_feed'), $args);
}


// CompanyCam Post Type
function register_companycam_post_type()
{
    $post_type_labels = array(
        'name' => _x('CompanyCam Feed', 'CompanyCam Feed'),
        'singular_name' => _x('Feed', 'post type singular name'),
        'menu_name' => _x('CompanyCam Feed', 'Admin Menu'),
        'name_admin_bar' => _x('Project feed', 'add new on admin bar'),
        'add_new' => _x('Add new', 'project feed'),
        'add_new_item' => __('Add project feed'),
        'new_item' => __('New Project Feed'),
        'edit_item' => __('Edit Project Feed'),
        'view_item' => __('View Project Feed'),
        'all_items' => __('View all project feeds'),
        'search_items' => __('Search project feeds'),
        'parent_item_colon' => __('Parent feeds:'),
        'not_found' => __('No project feeds found.'),
        'not_found_in_trash' => __('No project feeds found in Trash.')
    );

    $post_type_configuration = [
        'labels' => $post_type_labels,
        'public' => true,
        'publicly_queryable' => true,
        'rewrite' => array('slug' => 'companycam-projects'),
        'show_ui' => true,
        'show_in_menu' => false,
        'menu_position' => true,
        'supports' => array('title', 'editor', 'thumbnail'),
        'has_archive' => true,
        'taxonomies' => array('companycam_feed_category', 'companycam_feed_material')
    ];
    register_post_type('companycam_feed', $post_type_configuration);
}


function update_edit_form()
{
    echo ' enctype="multipart/form-data"';
} // end update_edit_form
add_action('post_edit_form_tag', 'update_edit_form');


function add_custom_rewrite_rule()
{

    $url_slug = 'companycam_url_slug';
    $url_slug_value = get_option($url_slug);
    if (($current_rules = get_option('rewrite_rules'))) {
        foreach ($current_rules as $key => $val) {
            if (strpos($key, 'companycam-projects') !== false) {
                add_rewrite_rule(str_ireplace('companycam-projects', $url_slug_value, $key), $val, 'top');
            }
        }
    }

    //  flush the rules
    flush_rewrite_rules();

} // end add_custom_rewrite_rule
add_action('init', 'add_custom_rewrite_rule');

function wpa_companycam_post_link($post_link, $id = 0)
{
    $post = get_post($id);
    $url_slug = 'companycam_url_slug';
    $url_slug_value = get_option($url_slug);
    if (is_object($post)) {
        $terms = wp_get_object_terms($post->ID, 'companycam-projects');
        if ($terms) {
            return str_replace('companycam-projects', $url_slug_value, $post_link);
        }
    }
    return $post_link;
}

add_filter('post_type_link', 'wpa_companycam_post_link', 1, 3);

// Register CompanyCam Post Type and Taxonomy
function companycam_setup_post_type()
{
    register_companycam_taxonomy();
    register_materials_taxonomy();
    register_companycam_post_type();
}

add_action('init', 'companycam_setup_post_type');

// Install custom post type on plugin's activation
function companycam_install()
{
    companycam_setup_post_type();
    flush_rewrite_rules();
}

register_activation_hook(__FILE__, 'companycam_install');

require_once plugin_dir_path(__FILE__) . 'addons/attachment.php';
// Add admin menu.
require_once plugin_dir_path(__FILE__) . 'config/menus.php';

// Register REST endpoint
require_once plugin_dir_path(__FILE__) . 'rest/endpoints.php';

// Filters
require_once plugin_dir_path(__FILE__) . 'config/filters.php';

// Widgets
require_once plugin_dir_path(__FILE__) . 'config/widgets.php';
