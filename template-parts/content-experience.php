<?php
/**
 * Template part for displaying expertise section
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

			<hr>

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

				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'patrizialutz' ),
					'after'  => '</div>',
				) );
			?>
			<?php
			$args = array(
				'post_type' 		=> array( 'jetpack-portfolio' ),
				'order' 				=> 'ASC',
				'orderby' 			=> 'menu_order',
				'tax_query'			=>  array(
					array(
						'taxonomy'         => 'jetpack-portfolio-type',
						'terms'            => 'job',
						'field'            => 'slug',
						'operator'         => 'IN',
					),
				)
			);

			$jobs = new WP_Query( $args );
			?>

			<?php if( $jobs->have_posts() ) : ?>

				<div class="jobs-list">

					<?php while( $jobs->have_posts() ) : ?>
						<?php $jobs->the_post(); ?>

							<?php get_template_part( 'template-parts/content', 'job' ); ?>

					<?php endwhile; ?>

				</div>

			<?php endif; ?>

			<?php wp_reset_postdata(); ?>

		</div><!-- .entry-content -->

		<footer class="entry-footer">
			<?php patrizialutz_entry_footer(); ?>
		</footer><!-- .entry-footer -->
	</div>
</section><!-- #post-<?php the_ID(); ?> -->
