<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package uxrennes-theme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<div class="entry-meta">
			<?php uxr_posted_on(); ?>
		</div>
	</header>

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'uxrennes-theme' ),
				'after'  => '</div>',
			) );
		?>
	</div>

	<footer class="entry-footer">
		<?php uxr_entry_footer(); ?>
	</footer>
</article>

