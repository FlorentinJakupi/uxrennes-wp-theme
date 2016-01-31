<?php
/**
 * Display latest event
 *
 * @package uxrennes-theme
 */

// http://www.smashingmagazine.com/2012/04/random-redirection-in-wordpress/

// Set arguments for WP_Query()
$args = array(
	'post_type' 		=> 'events',
    'posts_per_page' 	=> 1,
    'order'				=> 'DESC',
    'orderby' 			=> 'date',
    'tax_query' => array(
		array(
			'taxonomy' => 'event_type',
			'field'    => 'slug',
			'terms'    => 'ux-deiz',
		),
	),
);

// Get a random post from the database
$latest_event = new WP_Query($args);

// Process the database request through WP_Query
if ( $latest_event->have_posts() ) :
	while ( $latest_event->have_posts() ) :
	
		$latest_event->the_post();

		$post_ID 			= get_the_ID();
		$uxr_event_title 	= get_post_meta($post_ID, 'uxr_event_title', true);

		if (isset($uxr_event_title) && !empty($uxr_event_title)) : 
?>
	<div class="uxr-layout-full_row">
		<div class="uxr-uxdeiz">
			<p><a href="<?php the_permalink(); ?>">Découvrez <span>notre évènement </span><?php echo $uxr_event_title; ?> →</a></p>
		</div>
	</div>
<?php 
		endif;
	endwhile;
endif;
wp_reset_query();

?>
