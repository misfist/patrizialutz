<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Patrizia_Lutz
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">

		<div class="container">

			<div class="site-info">
				<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'patrizialutz' ) ); ?>"><?php
					/* translators: %s: CMS name, i.e. WordPress. */
					printf( esc_html__( 'Proudly powered by %s', 'patrizialutz' ), 'WordPress' );
				?></a>
			</div><!-- .site-info -->

		</div><!-- .container -->

	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
