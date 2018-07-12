<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link href="https://fonts.googleapis.com/css?family=Muli:400,700,900" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.4/css/selectize.default.min.css" rel="stylesheet" />
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<header class="project-index__header container">
    <a href="https://whitecastleroofing.com"><img src="/wp-content/uploads/2018/06/white-castle-roofing-logo.png" class="company-logo" alt="White Castle Roofing Logo"></a>
    <div class="project-index__title">
      <h1>Our Work</h1>
      <img src="/wp-content/uploads/2018/06/powered-by-image.png" width="150" alt="Powered By CompanyCam graphic">
    </div>
    <div class="project-index__filter">

      <div class="filter__list">
        <div class="filter">
          <label for="type" class="filter__label">Type</label>
          <select class="filter__dropdown select-type" name="type" id="type" multiple>
            <option class="search-label" value="" disabled>Type to search...</option>
            <option value="roofs">Residential Roofing</option>
            <option value="siding">Commercial Roofing</option>
            <option value="gutters">Concrete Foundation</option>
            <option value="fascia">Home Remodeling</option>
            <option value="roofs2">Residential and Construction Roofing</option>
            <option value="siding2">Siding</option>
            <option value="gutters2">Gutters</option>
            <option value="fascia2">Fascia</option>
          </select>
        </div>
        <div class="filter">
          <label for="materials" class="filter__label">Materials Used</label>
          <select class="filter__dropdown select-materials" name="materials" id="materials" multiple>
            <option class="search-label" value="" disabled>Type to search...</option>
            <option value="roofs">Roofs</option>
            <option value="siding">Siding</option>
            <option value="gutters">Gutters</option>
            <option value="fascia">Fascia</option>
            <option value="roofs2">Roofs</option>
            <option value="siding2">Siding</option>
            <option value="gutters2">Gutters</option>
            <option value="fascia2">Fascia</option>
          </select>
        </div>
        <div class="filter">
          <label for="zip" class="filter__label">Zip Code</label>
          <select class="filter__dropdown select-zip" name="zip" id="zip" multiple>
            <option class="search-label" value="" disabled>Type to search...</option>
            <option value="68516">68516</option>
            <option value="68502">68502</option>
            <option value="68508">90210</option>
            <option value="68512">60652</option>
          </select>
        </div>
        
        <div class="filter filter--search">
          <label>
            <input type="submit">
            <img src="https://companycam.imgix.net/icons-logos/icons/search.svg">
          </label>
          <input type="text" placeholder="Search for a project">
        </div>

      </div>

    </div>
  </header>

	<?php

	/*
	 * If a regular post or page, and not the front page, show the featured image.
	 * Using get_queried_object_id() here since the $post global may not be set before a call to the_post().
	 */
	if ( ( is_single() || ( is_page() && ! twentyseventeen_is_frontpage() ) ) && has_post_thumbnail( get_queried_object_id() ) ) :
		echo '<div class="single-featured-image-header">';
		echo get_the_post_thumbnail( get_queried_object_id(), 'twentyseventeen-featured-image' );
		echo '</div><!-- .single-featured-image-header -->';
	endif;
	?>

	<div class="site-content-contain">
		<div id="content" class="site-content">
