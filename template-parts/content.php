<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Patrizia_Lutz
 */

?>

<section id="<?php echo $post->post_name; ?>" <?php post_class('section'); ?>>
	<div class="container">

		<header class="entry-header">

			<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>

		</header><!-- .entry-header -->

		<div class="entry-content">

			<?php
				the_content( sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'patrizialutz' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				) );
				?>

				<?php if( 'home' === $post->post_name ) : ?>
						<?php patrizialutz_custom_menu();?>
				<?php endif; ?>

				<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'patrizialutz' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->

		<footer class="entry-footer">
			<?php patrizialutz_entry_footer(); ?>
		</footer><!-- .entry-footer -->

	</div><!-- .container -->
</section><!-- #post-<?php the_ID(); ?> -->
