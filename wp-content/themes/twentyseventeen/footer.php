<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.2
 */

?>

		</div><!-- #content -->

		<footer id="colophon" class="site-footer" role="contentinfo">
			<div class="wrap">
				<?php
				get_template_part( 'template-parts/footer/footer', 'widgets' );

				if ( has_nav_menu( 'social' ) ) : ?>
					<nav class="social-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Footer Social Links Menu', 'twentyseventeen' ); ?>">
						<?php
							wp_nav_menu( array(
								'theme_location' => 'social',
								'menu_class'     => 'social-links-menu',
								'depth'          => 1,
								'link_before'    => '<span class="screen-reader-text">',
								'link_after'     => '</span>' . twentyseventeen_get_svg( array( 'icon' => 'chain' ) ),
							) );
						?>
					</nav><!-- .social-navigation -->
				<?php endif;

				get_template_part( 'template-parts/footer/site', 'info' );
				?>
			</div><!-- .wrap -->
		</footer><!-- #colophon -->
	</div><!-- .site-content-contain -->
</div><!-- #page -->
<?php wp_footer(); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.4/js/standalone/selectize.min.js"></script>
<script>
	$(document).ready(function() {
 $('select').selectize({
   plugins: ['remove_button'],
 });
  
 // Color swatch functionality - we won't need this in the final plugin code
 $('.swatch').click(function() {
   var color = $(this).attr('data-color');
   $('.swatch').removeClass('active');
   $(this).addClass('active')
   $('html').removeClass().addClass(color);
   $(':root').css('--theme-color', color);
 })
})
<?php
	global $wpdb;
	$post_id = get_the_ID();
	$project_info = $wpdb->get_row("SELECT * from wp_companycam_project where post_id = ".$post_id);
?>
function myMap() {
	var address = "<?php echo $project_info->address. ' ' . $proejct_info->state . ' ' . $proeject_info->postal_code;?>";
	
	var geocoder = new google.maps.Geocoder();
	geocoder.geocode( { 'address': address}, function(results, status) {
		if (status == google.maps.GeocoderStatus.OK) {
			var latitude = results[0].geometry.location.lat();
			var longitude = results[0].geometry.location.lng();
			console.log(latitude, longitude);
			var mapOptions = {
				center: new google.maps.LatLng(latitude, longitude),
				zoom: 19,
				mapTypeId: 'roadmap',
				disableDefaultUI: true
			}
			var map = new google.maps.Map(document.getElementById("map"), mapOptions);
		} 
	}); 
	
  	
}
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD3JPxQVW47rRgs6V6Br5Cu3JcS4VOuzds&callback=myMap"></script>
</body>
</html>
