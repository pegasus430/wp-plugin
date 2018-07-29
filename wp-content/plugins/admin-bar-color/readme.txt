=== Admin Bar Color ===
Contributors: eduardozulian
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=H28V8F5PHSZHA
Tags: admin bar, toolbar, color scheme
Requires at least: 3.8
Tested up to: 4.3.1
Stable tag: 1.2
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Use your favorite Dashboard color scheme on the front end admin bar.

== Description ==

Version 3.8 brought a lot of visual changes, one being the ability to choose from eight color schemes for the Dashboard. However, on the front end, the toolbar is always shown with its default color, not matching your color choice. This plugin simply allows you to use your favorite color scheme on the front end admin bar.

Works smoothly with the [Admin Color Schemes](http://wordpress.org/plugins/admin-color-schemes/) plugin.

**Notice**: Since admin color schemes were meant to exist inside the Dashboard, some issues may appear on the front end. Depending on the theme you are using, `html` and `a` tags may absorb admin bar styles. However, keep in mind that this will only affect logged in users.

= Contributing =
[Admin Bar Color](https://github.com/eduardozulian/admin-bar-color) is available on GitHub. If you want to contribute, please fork it and send a pull request!

== Installation ==

1. Upload `admin-bar-color` folder to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. That's it!

== Changelog ==

= 1.2 =
* Add a notice about core admin bar CSS
* Update coding standards

= 1.1 =
* Update whole plugin, which now saves the admin var `$_wp_admin_css_colors` as an option for enqueueing the color schemes on the front end. This adds the possibility of using plugin-based color schemes such as [Admin Color Schemes](http://wordpress.org/plugins/admin-color-schemes/)

= 1.0 =
* First version!