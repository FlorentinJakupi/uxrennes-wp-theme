<?php
/**
 * uxrennes-theme functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package uxrennes-theme
 */

/**
 * Display the name of the template in use to display the current page
 */
if ( defined('UXR_ENV') && UXR_ENV === 'DEV' ){

	//add_action('wp_head', 'show_template');
	function show_template() {

		if (current_user_can('activate_plugins')) :
			global $template;
			print_r($template);
		endif;
	}
}

if ( ! function_exists( 'uxr_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function uxr_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on uxrennes-theme, use a find and replace
	 * to change 'uxrennes-theme' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'uxrennes-theme', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'uxrennes-theme' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );

	/**
	 * Remove theme support
	 */
	remove_theme_support('custom-background', 'custom-header', 'post-formats');

	/**
	 * Custom image sizes
	 */
	//add_image_size('links', 128, 128, true);

}
endif; // uxr_setup
add_action( 'after_setup_theme', 'uxr_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function uxr_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'uxr_content_width', 640 );
}
add_action( 'after_setup_theme', 'uxr_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function uxr_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'uxrennes-theme' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'uxr_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function uxr_scripts() {
	
	global $wp_styles;
	global $wp_scripts;

	/* Load our IE specific stylesheet for a range of older versions. */
	$last_update_css_ie8 	= filemtime( get_stylesheet_directory() . '/style-lte-ie8.css' );	
	wp_enqueue_style( 'uxr-style-oldies', get_stylesheet_directory_uri() . "/style-lte-ie8.css", array(), $last_update_css_ie8, 'screen' );
 	$wp_styles->add_data( 'uxr-style-oldies', 'conditional', 'lte IE 8' );

	/* Load the main stylesheet */
	$last_update_css 		= filemtime( get_stylesheet_directory() . '/style.css' );	
	wp_enqueue_style( 'uxr-style', get_stylesheet_uri(), array(), $last_update_css, 'screen' );

	/* Load the print stylesheet */
	// $last_update_css_print 	= filemtime( get_stylesheet_directory() . '/style-print.css' );	
	// wp_enqueue_style( 'uxr-style-print', get_stylesheet_directory_uri() . '/style-print.css', array(), $last_update_css_print, 'print' );

	/* Load Modernizr */
	$last_update_modernizr	= filemtime( get_stylesheet_directory() . '/assets/components/modernizr/modernizr.min.js' );
	wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/assets/components/modernizr/modernizr.min.js', '', $last_update_modernizr );

	/* Get JS */
	// $last_update_js 		= filemtime( get_stylesheet_directory() . '/assets/js/scripts.min.js' );
	// wp_enqueue_script( 'uxr-scripts', get_template_directory_uri() . '/assets/js/scripts.min.js', array( 'jquery' ), $last_update_js );

	$last_update_js 		= filemtime( get_stylesheet_directory() . '/assets/js/scripts.js' );
	wp_enqueue_script( 'uxr-scripts', get_template_directory_uri() . '/assets/js/scripts.js', array( 'jquery' ), $last_update_js, true );

	// if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
	// 	wp_enqueue_script( 'comment-reply' );
	// }
}
add_action( 'wp_enqueue_scripts', 'uxr_scripts', 21 );

/**
 * Add conditional comments around IE-specific style sheet link.
 *
 * @author Gary Jones & Michael Fields (@_mfields)
 * @link http://code.garyjones.co.uk/ie-conditional-style-sheets-wordpress/
 *
 * @param string $tag    Existing style sheet tag.
 * @param string $handle Name of the enqueued style sheet.
 * 
 * @return string Amended markup
 */
add_filter( 'style_loader_tag', 'uxr_add_main_stylesheet_conditional', 10, 2 );
function uxr_add_main_stylesheet_conditional( $tag, $handle ) {
	
	/* 	
		If we display the 'guide' CPT (archive or single), we use a fallback IE8 stylesheet
		thus we don't want IE8 to load the main stylesheet.
	 */
	if ( 'uxr-style' == $handle )
	{
		// We need to change the conditional comment's syntax in order to be understood only by browsers that are not equal or less than IE8
		$tag = '<!--[if ! lte IE 8]><!-->' . "\n" . $tag . '<!--<![endif]-->' . "\n";
		
	}

	return $tag;
}

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';


/**
 * Remove the recent comments widget styles from wp_head
 */
add_action( 'widgets_init', 'uxr_remove_recent_comments_style' );
function uxr_remove_recent_comments_style() {  
	global $wp_widget_factory;  
	remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ) );  
}


/**
 * Filter Yoast Meta Priority
 */
add_filter( 'wpseo_metabox_prio', function() { return 'low';});


/**
 * TinyMCE: remove the h1 and pre choices from the list
 */
add_filter('tiny_mce_before_init', 'uxr_myformatTinyMCE' );
function uxr_myformatTinyMCE($in) {
  $in['block_formats'] = "Paragraph=p;Header 2=h2;Header 3=h3;Header 4=h4;Header 5=h5;Header 6=h6";
  return $in;
}

/*
 * Adds gallery shortcode custom defaults
 * @author http://amethystwebsitedesign.com/how-to-get-larger-images-in-a-wordpress-gallery/#method2
 */
//add_filter( 'shortcode_atts_gallery', 'uxr_gallery_atts', 10, 3 );
function uxr_gallery_atts( $out, $pairs, $atts ) {

	$atts = shortcode_atts( array(
		'columns' 	=> '3',
		'size' 		=> 'medium',
		'link' 		=> 'file',
		), $atts );

	$out['columns'] = $atts['columns'];
	$out['size'] = $atts['size'];
	$out['link'] = $atts['link'];

	return $out;

}

/**
 * @subsection Sanitize Uploads Name to Prevent 404
 * @link https://gist.github.com/herewithme/7704370
 */
add_filter( 'sanitize_file_name', 'remove_accents', 10, 1 );
add_filter( 'sanitize_file_name_chars', 'sanitize_file_name_chars', 10, 1 );
 
function sanitize_file_name_chars( $special_chars = array() ) {
	$special_chars = array_merge( array( '’', '‘', '“', '”', '"', '«', '»', '‹', '›', '—', 'æ', 'Æ', 'E', 'œ', 'Œ', '€', 'ç', 'à', 'À', 'ä', 'Ä', 'é', 'É', 'è', 'È', 'ë', 'Ë', 'ö', 'Ö', 'ù', 'ü', 'Ü' ), $special_chars );
	return $special_chars;
}