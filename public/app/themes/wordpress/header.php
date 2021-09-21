<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package IOTA
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<title><?php wp_title(); ?></title>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="mobile-web-app-capable" content="yes">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@600&family=Roboto+Slab&display=swap&family=Inter:wght@300;400;500;700;800;900&display=swap" rel="stylesheet">
	<link rel="apple-touch-icon" sizes="57x57" href="<?= get_template_directory_uri() ?>/assets/icons/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="<?= get_template_directory_uri() ?>/assets/icons/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="<?= get_template_directory_uri() ?>/assets/icons/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="<?= get_template_directory_uri() ?>/assets/icons/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="76x76" href="<?= get_template_directory_uri() ?>/assets/icons/android-icon-96x96.png">
	<link rel="apple-touch-icon" sizes="76x76" href="<?= get_template_directory_uri() ?>/assets/icons/android-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="<?= get_template_directory_uri() ?>/assets/icons/android-icon-36x36.png">
	<link rel="apple-touch-icon" sizes="76x76" href="<?= get_template_directory_uri() ?>/assets/icons/android-icon-48x48.png">
	<link rel="apple-touch-icon" sizes="114x114" href="<?= get_template_directory_uri() ?>/assets/icons/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="<?= get_template_directory_uri() ?>/assets/icons/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="<?= get_template_directory_uri() ?>/assets/icons/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="<?= get_template_directory_uri() ?>/assets/icons/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="<?= get_template_directory_uri() ?>/assets/icons/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="<?= get_template_directory_uri() ?>/assets/icons/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?= get_template_directory_uri() ?>/assets/icons/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="<?= get_template_directory_uri() ?>/assets/icons/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?= get_template_directory_uri() ?>/assets/icons/favicon-16x16.png">
	<link rel="apple-touch-icon" sizes="180x180" href="<?= get_template_directory_uri() ?>/assets/icons/apple-touch-icon.png">
	<link rel="manifest" href="/manifest.json">
	<link rel="mask-icon" href="<?= get_template_directory_uri() ?>/assets/icons/safari-pinned-tab.svg" color="#1c242b">
	<meta name="apple-mobile-web-app-title" content="Downshire Tennis Club">
	<meta name="application-name" content="Downshire">
	<meta name="msapplication-TileColor" content="#FFFFFF">
	<meta name="theme-color" content="#ffffff">
	<?php wp_head(); ?>

</head>
<body <?php body_class(); ?>>

<?php wp_body_open(); ?>
<div id="app" v-cloak class="flex w-full min-h-full flex-col antialiased text-gray-300">
	<?php do_action( 'icon_before_page' ); ?>
	<a class="sr-only" href="#content"><?php esc_html_e( 'Skip to content', 'icon' ); ?></a>
	<cookie-consent></cookie-consent>
	<scroll-top></scroll-top>
	<?php do_action( 'icon_before_header' ); ?>
	<app-fixed-header>
		<app-nav-bar>
			<?php do_action( 'icon_header_navigation' ); ?>
			<template slot="brand">
				<?php do_action( 'icon_header_brand' ); ?>
			</template>
			<template slot="mobile-menu">
				<?php do_action( 'icon_header_mobile_navigation' ); ?>
			</template>
		</app-nav-bar>

	</app-fixed-header>
	<?php do_action( 'icon_after_header' ); ?>
	<div id="content" class="site-content ">
		<?php do_action( 'icon_before_container' ); ?>
