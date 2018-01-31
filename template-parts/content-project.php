<?php
/**
 * Template part for displaying projects
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Patrizia_Lutz
 */

?>


<article id="project-<?php echo $post->post_name; ?>" <?php post_class('project'); ?>>

	<div class="hovereffect">

		<?php the_post_thumbnail( 'thumbnail', [ 'class' => 'img-responsive responsive--full', 'title' => esc_attr( get_the_title() ) ] ); ?>

		<div class="overlay">

			<?php if( $url = get_post_meta( $post->ID, 'url', true ) ) : ?>

				<?php the_title( '<h3 class="entry-title"><a href="' . esc_url( $url ) . '" title="' . esc_attr( get_the_title() ) . '" target="_blank">', ' <span class="fas fa-external-link-alt"></span></a></h3>' ); ?>

			<?php else : ?>

				<?php the_title( '<h3 class="entry-title"><span>', '</span></h3>' ); ?>

			<?php endif; ?>

			<div class="entry-content">
				<?php the_excerpt(); ?>
			</div><!-- .entry-content -->

		</div>

	</div><!-- .hovereffect -->

</article>
