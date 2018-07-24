<?php
defined( 'ABSPATH' ) or die( 'No direct access allowed.' );

/* Menus & Sub menus of plugin */

add_action('admin_menu', 'my_menu_pages');
function my_menu_pages(){
	add_menu_page('CompanyCam Options', 'CompanyCam', 'manage_options', 'companycam-admin-home', 'my_plugin_home' );
	add_submenu_page('companycam-admin-home', 'CompanyCam Home', 'Home', 'manage_options', 'companycam-admin-home','my_plugin_home' );
	add_submenu_page('companycam-admin-home', 'CompanyCam Feed', 'Project', 'manage_options','edit.php?post_type=companycam_feed');
	add_submenu_page('companycam-admin-home', 'CompanyCam Feed', 'Add Project', 'manage_options','post-new.php?post_type=companycam_feed');
	add_submenu_page('companycam-admin-home', 'CompanyCam Feed', 'Project category', 'manage_options','edit-tags.php?taxonomy=companycam_feed_category&post_type=companycam_feed');
	//add_submenu_page('companycam-admin-home', 'CompanyCam Option', 'CompanyCam', 'manage_options', 'companycam-admin-menu','my_plugin_options' );
	add_submenu_page('companycam-admin-home', 'CompanyCam Setting', 'Setting', 'manage_options', 'companycam-admin-setting','my_plugin_setting' );
	add_submenu_page('companycam-admin-home', 'CompanyCam Help', 'Help', 'manage_options', 'companycam-admin-help','my_plugin_help' );
}     

/* Home page function of plugin */

function my_plugin_home() {
	?>
	<script type="text/javascript" src="<?= esc_url( plugins_url( '../js/scripts.js', __FILE__ ) )?>"></script>
	<link rel='stylesheet' id='custom-style-css'  href='<?= esc_url( plugins_url( '../css/style.css', __FILE__ ) )?>' type='text/css' media='all' />
	<div class="plugin_banner">

		<?php
		//$comp_logo_url = get_option('CompCam_logo');
		//if($comp_logo_url){
			?>
			<div class="company-logo">
				<img src="<?php echo esc_url( plugins_url( '../images/CompanyCam-logo.svg', __FILE__ ) ); ?>" width="250px" title="Company logo"/>
			</div>
			<?php
		//}
		?>
        <h1>CompanyCam</h1>
		<span>CompanyCam v1.0</span>

	</div>
	<div class="container companycam">
		<div class="tab_data">
			<div id="Home" class="tabcontent" style="display: block;">
				<h2 dir="ltr"><strong>Description Company Cam Custom Plugin</strong></h2>
				<p></p>
				<p dir="ltr">Overview:-</p>
				<p dir="ltr">CompanyCam provides a platform for contractors to log pictures of the work they have completed to show clients and others.</p>
				<p dir="ltr">They want to provide a custom wordpress plugin to their users that will allow them to install the custom plugin on their wordpress site. The plugin will then connect to their companycam account to pull data and display it as a custom post type.</p>
				<p dir="ltr">The designs and layout of how this information is displayed on the users wordpress site will be the same on every site, the user will NOT have control over the look and feel of it.</p>
				<p><strong></strong><br /> </p>
				<p dir="ltr">Process Overview</p>
				<ul>
					<li dir="ltr">
						<p dir="ltr">Contractor Installs WP Plugin</p>
					</li>
					<li dir="ltr">
						<p dir="ltr">Gets Authentication key from Web App</p>
					</li>
					<li dir="ltr">
						<p dir="ltr">Pastes key into WP Plugin</p>
					</li>
					<li dir="ltr">
						<p dir="ltr">Saves Parent Page Slug</p>
					</li>
					<li dir="ltr">
						<p dir="ltr">WP Plugin registers the CPT</p>
					</li>
					<li dir="ltr">
						<p dir="ltr">User adds projects via web app</p>
					</li>
					<li dir="ltr">
						<p dir="ltr">previews on web app </p>
					</li>
					<li dir="ltr">
						<p dir="ltr">Pushes to website</p>
					</li>
					<li dir="ltr">
						<p dir="ltr">WordPress processes the images on WP server</p>
					</li>
					<li dir="ltr">
						<p dir="ltr">Generates new published pages for for new entries and updates page if entry exists</p>
					</li>
					<li dir="ltr">
						<p dir="ltr">SEO Meta and all content is also generated dynamically</p>
					</li>
					<li dir="ltr">
						<p dir="ltr">User is presented with link to live post</p>
					</li>
					<li dir="ltr">
						<p dir="ltr">WP Design and layout preferably updated dynamically</p>
					</li>
					<li dir="ltr">
						<p dir="ltr">Submit form to their API with hidden data</p>
					</li>
				</ul>
				<h2><strong>The version of the plugin:</strong></h2
				<ul>
					<li><strong>Version:</strong> 1.0</li>
					<li><strong>Author:</strong> <a href="#" target="_blank">Automattic</a></li>
					<li><strong>Last Updated:</strong> 2 days ago</li>
				</ul>
				<hr/>

				<h2>Change log of plugin</h2>
				<h3><strong>Version:</strong> 1.0 &ndash; 2018-06-20</h3>
				<ul>
					<li>Fix &ndash; <strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry.</li>
					<li>Fix &ndash; <strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry.</li>
					<li>Fix &ndash; <strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry.</li>
					<li>Fix &ndash; <strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry.</li>
					<li>Fix &ndash; <strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry.</li>
				</ul>
			</div>
		</div>
	</div> 



	<?php  
	}
/* Setting page function of plugin */

function my_plugin_setting() {
	/*  url slug code start */
	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	}

	// Get app key
	$app_key = 'companycam_app_key';
	$app_key_value = get_option($app_key);
	if( !empty($_POST[$app_key]) ) {
		$app_key_value = sanitize_text_field($_POST[$app_key]);
		update_option($app_key, $app_key_value);
		?>
		<div class="updated"><p><strong><?php _e('Settings successfully saved!' ); ?></strong></p></div>
	<?php
	}
	?>
	<h2>CompanyCam Project Feed Confirguration</h2>
	<hr/>
	<form name="form" method="post" action="">
		<p>
			<?php _e('CompanyCam App Key:'); ?>
			<input type="text" name="<?php echo $app_key; ?>" value="<?php echo $app_key_value; ?>" size="50">
		</p>
		<p>
			<input type="submit" name="Submit" class="button-primary" value="<?php esc_attr_e('Save') ?>" />  
		</p>
	</form>
	<?php
	
	// Get url slug 
	$url_slug = 'companycam_url_slug';	
	$url_slug_value = get_option($url_slug);
	if( !empty($_POST[$url_slug]) ) {
		$url_slug_value = sanitize_text_field($_POST[$url_slug]);
		update_option($url_slug, $url_slug_value);
		?>
		<div class="updated"><p><strong><?php _e('Settings successfully saved!' ); ?></strong></p></div>
	<?php
	}
	?>
 	<h2>CompanyCam Projects</h2>
	<hr/>
	<form name="form" method="post" action="">
		<p>
			<?php _e('Enter Folder Name:'); ?>
			<input type="text" name="<?php echo $url_slug; ?>" value="<?php echo $url_slug_value; ?>" size="50">
		</p>
		<p>
			<input type="submit" name="Submit" class="button-primary" value="<?php esc_attr_e('Save') ?>" />  
		</p>
	</form>
	<hr/>
    <?php

	// Get url slug
	$colorPicker = 'color';
	$color = get_option($colorPicker);
	if( !empty($_POST[$colorPicker]) ) :
		$color = sanitize_text_field($_POST[$colorPicker]);
		update_option('color', $color);
		?>
		<div class="updated"><p><strong><?php _e('Settings successfully saved!' ); ?></strong></p></div>
	<?php endif; ?>

<style>
	
  .color-picker {
    display: -ms-flexbox;
    display: flex;
  }
  
  .swatch {
    width: 24px;
    height: 24px;
    margin-right: 8px;
    cursor: pointer;
    outline: 4px solid transparent;
  }
  
  .swatch.active {
    outline-color: black;
  }
  
  .swatch.navy {
    background: #062e58;
  }
  
  .swatch.blue {
    background: #0074D9;
  }
  
  .swatch.aqua {
    background: #5FBFE5;
  }
  
  .swatch.teal {
    background: #39CCCC;
  }
  
  .swatch.olive {
    background: #3D9970;
  }
  
  .swatch.green {
    background: #2ECC40;
  }
  
  .swatch.yellow {
    background: #FFDC00;
  }
  
  .swatch.orange {
    background: #FF851B;
  }
  
  .swatch.red {
    background: #FF4136;
  }
  
  .swatch.pink {
    background: #F012BE;
  }
  
  .swatch.purple {
    background: #B10DC9;
  }
  
  .swatch.maroon {
    background: #85144B;
  }
  
  .swatch.gray {
    background: #999999;
  }
  
  .swatch.black {
    background: #111111;
  }

</style>

	<h2>Select Color </h2>
	<hr/>
    <form name="form" method="post" action="" style="position:relative;">
		<h3>Brand Color</h3>
		<div class="color-picker">
			<div class="swatch navy" data-color="navy"></div>
			<div class="swatch active blue" data-color="blue"></div>
			<div class="swatch aqua" data-color="aqua"></div>
			<div class="swatch teal" data-color="teal"></div>
			<div class="swatch olive" data-color="olive"></div>
			<div class="swatch green" data-color="green"></div>
			<div class="swatch yellow" data-color="yellow"></div>
			<div class="swatch orange" data-color="orange"></div>
			<div class="swatch red" data-color="red"></div>
			<div class="swatch pink" data-color="pink"></div>
			<div class="swatch purple" data-color="purple"></div>
			<div class="swatch maroon" data-color="maroon"></div>
			<div class="swatch gray" data-color="gray"></div>
			<div class="swatch black" data-color="black"></div>
		</div>
        <p>
            <input type="submit" name="Submit" class="button-primary" value="<?php esc_attr_e('Save') ?>" />
        </p>
	</form>
	<hr/>
	
<script type="text/javascript">
	jQuery(document).ready(function() {
  
// Color swatch functionality - we won't need this in the final plugin code

		jQuery('.swatch').click(function() {
			var color = jQuery(this).attr('data-color');
			jQuery('.swatch').removeClass('active');
			jQuery(this).addClass('active')
			jQuery('html').removeClass().addClass(color);
			jQuery(':root').css('--theme-color', color);
		})
	});
</script>
    <!--  url slug code end  -->
	<?php
	// verification token code start 
	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	}
	// Get url verification token
	$verification_token = 'verification_token_code';
	$verification_token_value = get_option($verification_token);
	if( !empty($_POST[$verification_token]) ) {
		$verification_token_value = sanitize_text_field($_POST[$verification_token]);
		update_option($verification_token, $verification_token_value);
		?>
		<div class="updated"><p><strong><?php _e('Settings successfully saved!' ); ?></strong></p></div>
	<?php
	}
	?>
	<?php	
	/* verification token code end */
	}

function my_plugin_help() {
	?>
   <link rel='stylesheet' id='custom-style-css'  href='https://quirkstory.com/gamma/Blacklistz/wp-content/plugins/companycam_project_feed/css/style.css' type='text/css' media='all' />
	<div class="container help">   
	<h1 style="text-align: center;">How to operate the plugin</h1>
	<div>
		<h3>What is Lorem Ipsum?</h3>
		<p style="text-align: justify;"><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
		</div>
		<div>
		<h3>Why do we use it?</h3>
		<p style="text-align: justify;">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
		</div>
		<div>
		<h3>Where does it come from?</h3>
		<p style="text-align: justify;">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</p>
		<p style="text-align: justify;">The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>
		</div>
		</div>
	<?php		
}

function my_plugin_options() {
	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	}

	// Get app key
	$app_key = 'companycam_app_key';
	
	$app_key_value = get_option($app_key);

	if( !empty($_POST[$app_key]) ) {
		$app_key_value = sanitize_text_field($_POST[$app_key]);

		update_option($app_key, $app_key_value);

		?>
		<div class="updated"><p><strong><?php _e('Settings successfully saved!' ); ?></strong></p></div>
	<?php
	}
?>
	<h2>CompanyCam Project Feed Confirguration</h2>
	<hr/>
	<form name="form" method="post" action="">
		<p>
			<?php _e('CompanyCam App Key:'); ?>
			<input type="text" name="<?php echo $app_key; ?>" value="<?php echo $app_key_value; ?>" size="50">
		</p>
		<p>
			<input type="submit" name="Submit" class="button-primary" value="<?php esc_attr_e('Save') ?>" />  
		</p>
	</form>
<?php
}



	



  
