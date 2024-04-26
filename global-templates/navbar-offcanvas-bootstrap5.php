<?php

/**
 * Header Navbar (bootstrap5)
 *
 * @package Understrap
 * @since 1.1.0
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

$container = get_theme_mod('understrap_container_type');
?>

<nav id="main-nav" class="navbar navbar-expand-lg navbar-light" aria-labelledby="main-nav-label">

	<h2 id="main-nav-label" class="screen-reader-text">
		<?php esc_html_e('Main Navigation', 'understrap'); ?>
	</h2>


	<div class="<?php echo esc_attr($container); ?>">

		<!-- Your site branding in the menu -->
		<?php get_template_part('global-templates/navbar-branding'); ?>

		<button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#navbarNavOffcanvas" aria-controls="navbarNavOffcanvas" aria-expanded="false" aria-label="<?php esc_attr_e('Open menu', 'understrap'); ?>">
			<span class="navbar-toggler-icon"></span>
		</button>

		
		<?php get_product_search_form(); ?>


		<div class="offcanvas offcanvas-start" tabindex="-1" id="navbarNavOffcanvas">

			<div class="offcanvas-header justify-content-end">
				<button class="btn-close btn-close-dark text-reset" type="button" data-bs-dismiss="offcanvas" aria-label="<?php esc_attr_e('Close menu', 'understrap'); ?>"></button>
			</div><!-- .offcancas-header -->

			<!-- The WordPress Menu goes here -->
			<?php
			wp_nav_menu(
				array(
					'theme_location'  => 'menu-header',
					'container_class' => 'offcanvas-body',
					'container_id'    => '',
					'menu_class'      => 'navbar-nav justify-content-end flex-grow-1 pe-3',
					'fallback_cb'     => '',
					'menu_id'         => 'menu-header',
					'depth'           => 2,
					'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
				)
			);
			?>
		</div><!-- .offcanvas -->
		<div class="nav-user">
			<?php
			if (is_user_logged_in()) {
				$myaccount_page_id = get_option('woocommerce_myaccount_page_id');
				if ($myaccount_page_id) {
					$myaccount_page_url = get_permalink($myaccount_page_id);
					echo '<a href="' . esc_url($myaccount_page_url) . '">My account</a>';
				}
			} else {
				wp_nav_menu(
					array(
						'theme_location'  => 'menu-header-user',
						'container_id'    => '',
						'menu_class'      => 'navbar-nav justify-content-end flex-grow-1 pe-3',
						'fallback_cb'     => '',
						'menu_id'         => 'menu-header-user',
						'depth'           => 2,
						'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
					)
				);
			}
			?>
		</div>

		<div class="cart-button">
			<a href="<?php echo wc_get_cart_url(); ?>" title="<?php _e('Ver carrito'); ?>">
				<i class="fa fa-shopping-cart"></i>
				<span class="cart-contents-count"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
			</a>
		</div>

	</div><!-- .container(-fluid) -->

</nav><!-- #main-nav -->