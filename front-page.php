<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Patrizia_Lutz
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<?php
			if ( have_posts() ) :

				if ( is_home() && ! is_front_page() ) : ?>
					<header>
						<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
					</header>

				<?php
				endif;

				/* Start the Loop */
				while ( have_posts() ) : the_post();

					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'template-parts/content', get_post_format() );

				endwhile;


			endif; ?>

		<?php
		$args = array(
			'post_type' 		=> array( 'page' ),
			'orderby' 			=> 'menu_order',
			'order' 				=> 'ASC',
			'post__not_in'	=> array( get_option( 'page_on_front' ) )
		);
		$panels = new WP_Query( $args );

		if ( $panels->have_posts() ) : ?>

		<div class="panels">
			<?php while ( $panels->have_posts() ) :
				$panels->the_post(); ?>

				<?php if( 'portfolio' === $post->post_name || 'experience' === $post->post_name  || 'expertise' === $post->post_name ) : ?>

					<?php get_template_part( 'template-parts/content', $post->post_name ); ?>

				<?php else : ?>

					<?php get_template_part( 'template-parts/content', 'page' ); ?>

				<?php endif; ?>

			<?php endwhile; ?>
			</div>
		<?php endif; ?>

		<?php wp_reset_postdata(); ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
