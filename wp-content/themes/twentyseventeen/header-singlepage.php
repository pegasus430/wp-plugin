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
	<header class="project-page__header">
    <div class="container">
      <a href="/" class="project-page__nav">&larr; Back to Our Work</a>
      <a href="https://whitecastleroofing.com"><img src="/wp-content/uploads/2018/06/white-castle-roofing-logo.png" class="company-logo" alt="White Castle Roofing Logo"></a>
      <img src="/wp-content/uploads/2018/06/powered-by-image.png" width="150" class="companycam-branding" alt="Powered By CompanyCam graphic">
    </div>
  </header>

	<div class="site-content-contain">
		<div id="content" class="site-content">
