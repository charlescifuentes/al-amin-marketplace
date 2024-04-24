<?php

/**
 * Navbar branding
 *
 * @package Understrap
 * @since 1.2.0
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

if (!has_custom_logo()) { ?>

	<?php if (is_front_page() && is_home()) : ?>

		<h1 class="navbar-brand mb-0">
			<?php
			$GETlogo = get_field('logo_site_light', 'options'); ?>
			<a class="logo-site" href="<?php echo esc_url(get_bloginfo('url')); ?>">
				<?php if ($GETlogo) {
					get_Image($GETlogo);
				} else {
					echo "<h3 class='mb-0'>Logo Brand</h3>";
				} ?>
			</a>
		</h1>

	<?php else : ?>

		<?php
		$GETlogo = get_field('logo_site_light', 'option');
		$GETlogoSticky = get_field('logo_sticky', 'option'); ?>
		<a class="logo-site" href="<?php echo esc_url(get_bloginfo('url')); ?>">
			<?php if ($GETlogo) {
				get_Image($GETlogo);
			} else {
				echo "<h3 class='mb-0'>Logo Brand</h3>";
			} ?>
		</a>

	<?php endif; ?>

<?php
} else {
	the_custom_logo();
}
