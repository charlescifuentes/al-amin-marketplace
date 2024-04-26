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
	<div class="container mx-auto">
		<div class="<?php echo esc_attr($container); ?>">

			<!--Social-->
			<div class="row site-footer__social">
				<!--Footer Menu Social -->

				<?php if (have_rows('social_icons', 'options')) : ?>
					<div class="social-icons__list col-12">
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
		</div><!-- .row -->

	</div>
	<div class="row site-footer__copyright">
		<?php if (get_field('copyright_footer', 'options')) : ?>
			<div class="copyright__info col-12">
				<?php echo get_field('copyright_footer', 'options'); ?>
			</div>
		<?php endif; ?>
	</div>

</div><!-- .container(-fluid) -->

</div><!-- #wrapper-footer -->

<?php // Closing div#page from header.php. 
?>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>