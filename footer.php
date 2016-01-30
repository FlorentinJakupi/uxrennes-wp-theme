<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package uxrennes-theme
 */

?>

			</div>

			<footer id="colophon" class="site-footer" role="contentinfo">
				<div class="site-info">
					<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'uxrennes-theme' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'uxrennes-theme' ), 'WordPress' ); ?></a>
				</div>
			</footer>
		</div>

		<?php wp_footer(); ?>

	</body>
</html>
