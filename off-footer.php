<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

$container = get_theme_mod('understrap_container_type');
?>

<?php get_template_part('sidebar-templates/sidebar', 'footerfull'); ?>

<div class="site-footer" id="wrapper-footer">

	<div class="<?php echo esc_attr($container); ?>">

		<div class="row site-footer__cols">
			<!--Logo-->
			<div class="site-footer__logo col-12 col-lg-3">
				<?php
				$GETlogo = get_field('logo_site_light', 'option'); ?>
				<a href="<?php echo esc_url(get_bloginfo('url')); ?>">
					<?php if ($GETlogo) {
						get_Image($GETlogo);
					} else {
						echo "<h3 class='mb-0'>Logo Brand</h3>";
					} ?>
				</a>

			</div>
			<!--/Logo-->
			<!--menu-->
			<div class="site-footer__menu col-12 col-md-3 col-lg-3">
				<!--Menu-->
				<?php if (has_nav_menu('menu-footer')) { ?>
						<?php wp_nav_menu(array('theme_location' => 'menu-footer')); ?>
				<?php } ?>
				<!--/Menu-->
			</div>
			<!--/menu-->
			<!--Contact-->
			<div class="site-footer__contact col-12 col-md-6 col-lg-4">
				<?php
				$location = get_field('location_contact', 'options');
				echo '<h4>' . $location['title_location'] . '</h4>';
				?>
				<div class="contact_location">
					<?php
					echo '<p>' . $location['address_location'] . ' ' . $location['suite_location'] . '</p>';
					echo '<p>' . $location['city_location'] . ', ' . $location['state_location'] . ' ' . $location['zip_code_location'] . ' </p>';
					?>
				</div>
			</div>
			<!--Contact-->
			<!--Social-->
			<div class="site-footer__social col-12 col-md-3 col-lg-2">
				<!--Footer Menu Social -->
				
					<h4 class="title">social</h4>
					<?php if (have_rows('social_icons', 'options')) : ?>
						<div class="social-icons__list">
						<?php while (have_rows('social_icons', 'options')) : the_row(); ?>
							<?php
							$social = strtolower(get_sub_field('social_icon')); ?>
							<a class="social-link" href="<?php echo get_sub_field('social_profile'); ?>" data-linktype="social" data-socialnetwork="<?php echo $social; ?>" target="_blank" aria-label="Read more in <?php echo $social; ?>">
								<i class="fa fa-<?php echo $social; ?>" aria-hidden="true"></i>
							</a>
						<?php endwhile; ?>
						</div>
					<?php endif; ?>
				
				<!--/Footer Menu Social -->
			</div>
			<!--Social-->

		</div>

		<div class="row site-footer__copyright">
			<?php if (get_field('copyright_footer', 'options')) : ?>
				<div class="copyright__info col-12 col-lg-6">
					<?php echo get_field('copyright_footer', 'options'); ?>
				</div>
			<?php endif; ?>

			<?php if (have_rows('links_footer', 'options')) : ?>
				<ul class="copyright__legal col-12 col-lg-6">
					<?php while (have_rows('links_footer', 'options')) : the_row();
						$link = get_sub_field('item_link_footer');
						if ($link) :
							$link_url = $link['url'];
							$link_title = $link['title'];
							$link_target = $link['target'] ? $link['target'] : '_self';
					?> <li>
								<a class="link" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
							</li>
						<?php endif; ?>
					<?php endwhile; ?>
				</ul>
			<?php endif; ?>
		</div>

	</div><!-- .row -->

</div><!-- .container(-fluid) -->

</div><!-- #wrapper-footer -->

<?php // Closing div#page from header.php. 
?>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>