<?php
/**
 * Template part for displaying Jobs
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Patrizia_Lutz
 */

?>

<?php
$start = date( get_option( 'date_format' ), strtotime( get_post_meta( $post->ID, 'start_date', true ) ) );
$end = ( get_post_meta( $post->ID, 'end_date', true ) ) ? date( get_option( 'date_format' ), strtotime( get_post_meta( $post->ID, 'end_date', true ) ) ) : esc_attr( 'Present', 'patrizialutz' );
?>

<article id="project-<?php echo $post->post_name; ?>" <?php post_class('job row'); ?>>

	<header class="entry-header col-md-4">
		<?php if( $url = get_post_meta( $post->ID, 'url', true ) ) : ?>
			<h4 class="job-company"><i class="fas fa-external-link-alt"></i> <a href="<?php echo esc_url( $url ); ?>" target="_blank" title="<?php echo esc_attr( get_the_title() ); ?>"><?php echo get_post_meta( $post->ID, 'company', true ); ?></a></h4>
		<?php else : ?>
			<h4 class="job-company"><?php echo get_post_meta( $post->ID, 'company', true ); ?></h4>
		<?php endif; ?>
		<?php if( $location = get_post_meta( $post->ID, 'location', true ) ) : ?>
			<div class="job-location"><span></span><?php esc_attr_e( $location, 'patrizialutz' ) ?> </div>
		<?php endif; ?>
		<div class="job-dates"><span></span><time class="start-date"><?php echo $start; ?> </time> <?php esc_attr_e( ' to ', 'patrizialutz' ) ?> <time class="end-date"><?php echo $end; ?></time></div>
	</header><!-- .entry-header -->

	<div class="entry-content col-md-8">
		<h5 class="job-title"><?php the_title(); ?></h5>
		<div class="job-description"><?php the_content(); ?></div>

		<?php if( function_exists( 'get_field' ) ) : ?>

			<div class="clients-list">

				<?php $clients = get_field( 'clients' ); ?>
				<?php if( !empty( $clients ) && !is_wp_error( $clients ) ) : ?>

					<strong><?php _e( 'Clients', 'patrizialutz' ); ?></strong>

					<ul class="list-inline">
						<?php foreach( $clients as $client ) : ?>

							<?php if( empty( $client['client_url'] ) ) : ?>

								<li class="list-inline-item"><?php esc_html_e( $client['client_name'], 'patrizialutz' ) ?></li>

							<?php else : ?>

								<li class="list-inline-item"><span></span><a href="<?php esc_url( $client['client_url'] ); ?>" title="<?php esc_attr_e( $client['client_name'], 'patrizialutz' ) ?>" target="_blank"><?php esc_html_e( $client['client_name'], 'patrizialutz' ) ?></a></li>

							<?php endif; ?>

						<?php endforeach; ?>
					</ul>

				<?php endif; ?>

			</div>

		<?php endif; ?>
	</div><!-- .entry-content -->

	<footer class="entry-footer col-12">
		<?php patrizialutz_entry_footer(); ?>
	</footer><!-- .entry-footer -->

</article>
