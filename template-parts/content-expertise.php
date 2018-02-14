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

			<?php if( function_exists( 'get_field' ) ) : ?>
				<?php $skills = get_field( 'skills_group' ); ?>
				<?php $column_1 = array_slice( $skills, 0, 2 ); ?>
				<?php $column_2 = array_slice( $skills, 2, 2 ); ?>

				<?php if( !empty( $skills ) && !is_wp_error( $skills ) ) : ?>

					<div class="skills-list row">

						<div class="column-1 col-md-6">

							<ul class="no-bullets">

								<?php foreach( $column_1 as $section ) : ?>

									<li>
										<h4><?php esc_attr_e( $section['section'], 'patrizialutz' ); ?></h4>
										<ul>

										<?php foreach( $section as $skills ) : ?>
											<?php foreach( $skills as $skill ) : ?>

											<li>
												<div class="skill"><?php echo $skill['skill']; ?></div>
											</li>

											<?php endforeach; ?>
										<?php endforeach; ?>

									</ul>
								</li>

								<?php endforeach; ?>

							</ul>

						</div><!-- column_1 -->

						<div class="column-2 col-md-6">

							<ul class="no-bullets">

								<?php foreach( $column_2 as $section ) : ?>

									<li class="level-1">
										<h4><?php esc_attr_e( $section['section'], 'patrizialutz' ); ?></h4>
										<ul>

										<?php foreach( $section as $skills ) : ?>

											<?php foreach( $skills as $skill ) : ?>

											<li class="level-2">
												<div class="skill"><?php echo $skill['skill']; ?></div>
											</li>

											<?php endforeach; ?>

										<?php endforeach; ?>

									</ul>
								</li>

								<?php endforeach; ?>

							</ul>

						</div><!-- column_2 -->

					</div>

				<?php endif; ?>

			<?php endif; ?>

		</div><!-- .entry-content -->

		<footer class="entry-footer">
			<?php patrizialutz_entry_footer(); ?>
		</footer><!-- .entry-footer -->
	</div>
</section><!-- #post-<?php the_ID(); ?> -->
