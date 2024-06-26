<?php

/**
 * The header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

$bootstrap_version = get_theme_mod('understrap_bootstrap_version', 'bootstrap4');
$navbar_type       = get_theme_mod('understrap_navbar_type', 'collapse');
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> <?php understrap_body_attributes(); ?>>
	<?php do_action('wp_body_open'); ?>
	<div class="site" id="page">

		<!-- ******************* The Navbar Area ******************* -->

		<header id="wrapper-navbar" class="site-header">

			<?php get_template_part('global-templates/navbar', $navbar_type . '-' . $bootstrap_version); ?>

			<?php
            if (has_nav_menu('menu-categories')) { ?>
                <div class="navbar__categories">
                    <?php
                    wp_nav_menu(array('theme_location' => 'menu-categories'));
                    ?>
                </div><!--/Menu-->
            <?php
            }
            ?>
		</header><!-- #wrapper-navbar -->

		<div id="side-cart">
    <div class="side-cart-content">
        <?php woocommerce_mini_cart(); ?>
    </div>

</div>