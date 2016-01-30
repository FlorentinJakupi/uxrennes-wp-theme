<?php
/**
 * Template part for displaying single events
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package uxrennes-theme
 */

// Retrieve some metadata
$post_ID 						= get_the_ID();
$uxr_event_title 				= get_post_meta($post_ID, 'uxr_event_title', 			true);
$uxr_event_theme 				= get_post_meta($post_ID, 'uxr_event_theme', 			true);
$uxr_event_date 				= get_post_meta($post_ID, 'uxr_event_date', 			true);
$uxr_event_flexible_content 	= get_post_meta($post_ID, 'uxr_event_flexible_content', true);

echo $uxr_event_title;

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

