<?php 

/**
 * Creating the "events" custom post type
 *
 * @package uxrennes-theme
 */

add_action('init','register_events');
function register_events(){

	$labels = array(
		'name'					=> __('Events', 'uxrennes-theme'),
		'singular_name'			=> __('Event', 'uxrennes-theme'),
		'add_new'				=> __('Add new', 'uxrennes-theme'),
		'add_new_item'			=> __('Add new event', 'uxrennes-theme'),
		'edit_item'				=> __('Edit event', 'uxrennes-theme'),
		'new_item'				=> __('New event', 'uxrennes-theme'),
		'all_items'				=> __('All events', 'uxrennes-theme'),
		'view_item'				=> __('View event', 'uxrennes-theme'),
		'search_items'			=> __('Search events', 'uxrennes-theme'),
		'not_found'				=> __('No event found', 'uxrennes-theme'),
		'not_found_in_trash'	=> __('No event found in trash', 'uxrennes-theme'), 
		'parent_item_colon'		=> '',
		'menu_name'				=> __('Events', 'uxrennes-theme')
	);
	
	$args = array(
		'labels'				=> $labels,
		'public'				=> true,
		'publicly_queryable'	=> true,
		'hierarchical'			=> true,
		'rewrite'				=> array('slug' => __('events', 'uxrennes-theme'),'with_front' => false),
		'show_ui'				=> true,
		'capability_type'		=> 'post',
		'query_var'				=> 'events',
		'menu_position'			=> 5,
		'supports'				=> array('title','excerpt','thumbnail','page-attributes','page-attributes'),
		//'taxonomies'			=> array('post_tag'),
		'has_archive'			=> __('events', 'uxrennes-theme')
	);

	/* Taxonomies propres au events */
	register_taxonomy('event_type','events',
		array(
			'public'                => true,
			'hierarchical'          => true,
			'label'                 => __('Event types', 'uxrennes-theme'),
			'singular_label'        => __('Event type', 'uxrennes-theme'),
			'query_var'             => true,
			'rewrite'               => true,
			'show_tagcloud'			=> false,
			'rewrite'				=> array('slug' => __('events/type', 'uxrennes-theme')),
			'show_in_nav_menus'		=> false // on ne veut pas l'afficher comme option de menu
		)
	);
	
	
	// Translate Taxonomy Tag
	// add_filter('post_link', 'type_permalink', 10, 3);
	// add_filter('post_type_link', 'type_permalink', 10, 3);
	
	function type_permalink($permalink, $post_id, $leavename) {
	
		if (strpos($permalink, '%event_type%') === FALSE) return $permalink;
		
		// Get post
		$post = get_post($post_id);
		if (!$post) return $permalink;
		
		// Get taxonomy terms
		$terms = wp_get_object_terms($post->ID, 'event_type');
		if (!is_wp_error($terms) && !empty($terms) && is_object($terms[0])) $taxonomy_slug = $terms[0]->slug;
		else $taxonomy_slug = 'no-type';
		return str_replace('%event_type%', $taxonomy_slug, $permalink);
	}
	
	register_post_type('events',$args);
	flush_rewrite_rules();
}
