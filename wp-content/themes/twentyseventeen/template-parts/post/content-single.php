<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.2
 */
	global $wpdb;
	$post_id = get_the_ID();
	$project_info = $wpdb->get_row("SELECT * from wp_companycam_project where post_id = ".$post_id);
	$category_detail = get_the_category($post_id);
	$id = 0;
	$category_name;
	foreach($category_detail as $cd) {
		if ($id == 0)
			$category_name = $cd->cat_name;
		else
			$category_name = $category_name . ', ' . $cd->cat_name;
		$id ++;
	}
?>
	<div class="project__cover" style="background-image: url(<?php echo get_the_post_thumbnail_url($post_id); ?>)">
		<div class="project__address">
			<span><?php echo $category_name; ?>&nbsp;Near</span>
			<h3 class="project__street"><?php print_r( $project_info->address);?></h3>
			<h4 class="project__city"><?php echo $project_info->state;?> &nbsp;|&nbsp; <?php echo $project_info->postal_code;?></h4>
		</div>
	</div>
	<div class="project-page__content container">

    	<div class="project-page__photos">
    		<div class="project-page__intro">
				<h3><?php the_title();?></h3>
				<?php the_content(); ?>
			</div>
		</div>
		<div class="project-page__sidebar">
        <div class="project__map" id="map"></div>
        <div class="project__info">
          <h2 class="project__title"><?php echo $project_info->project_title; ?></h2>
          <div class="project__meta-data">
            <p><strong>Project Type: </strong><?php echo $category_name; ?></p>
            <p><strong>Materials Used:</strong><?php echo $project_info->project_material; ?></p>
          </div>
        </div>

        <div class="project-page__form desktop">
          <?php get_template_part( 'template-parts/post/contactform'); ?>
        </div>
      </div>
	</div>
