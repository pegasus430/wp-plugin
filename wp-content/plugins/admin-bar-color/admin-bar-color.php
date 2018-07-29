<?php
/*
Plugin Name: Admin Bar Color
Plugin URI: http://github.com/eduardozulian/admin-bar-color
Description: Use your favorite Dashboard color scheme on the front end admin bar.
Version: 1.2
Author: Eduardo Zulian
Author URI: http://zulian.org
License: GNU General Public License v2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Text Domain: admin-bar-color
Domain Path: /languages
*/

/**
 * Admin Bar Color class
 */
class Admin_Bar_Color {

	function __construct() {
		add_action( 'wp_before_admin_bar_render', array( $this, 'save_wp_admin_color_schemes_list' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_admin_bar_color' ) );
	}

	/**
	 * Save the color schemes list into wp_options table
	 */
	function save_wp_admin_color_schemes_list() {
		global $_wp_admin_css_colors;

		if ( count( $_wp_admin_css_colors ) > 1 && has_action( 'admin_color_scheme_picker' ) ) {
			update_option( 'wp_admin_color_schemes', $_wp_admin_css_colors );
		}
	}

	/**
	 * Enqueue the registered color schemes on the front end
	 */
	function enqueue_admin_bar_color() {
		if ( ! is_admin_bar_showing() ) {
			return;
		}

		$user_color = get_user_option( 'admin_color' );

		if ( isset( $user_color ) ) {
			$wp_admin_color_schemes = get_option( 'wp_admin_color_schemes' );
			wp_enqueue_style( $user_color, $wp_admin_color_schemes[$user_color]->url );
		}
	}
}

$admin_bar_color = new Admin_Bar_Color();
