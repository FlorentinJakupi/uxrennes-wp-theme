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
$uxr_event_theme 				= wp_kses( $uxr_event_theme, array( 'br' => array() ) );
$uxr_event_flexible_content 	= get_post_meta($post_ID, 'uxr_event_flexible_content', true);

// Date
$uxr_event_date 				= get_post_meta($post_ID, 'uxr_event_date', 			true);

// Extraire Y,M,D
// @link https://www.gregoirenoyelle.com/acf-creer-une-date-intertionalisable/
$y = substr($uxr_event_date, 0, 4);
$m = substr($uxr_event_date, 4, 2);
$d = substr($uxr_event_date, 6, 2);

// Créer le format UNIX
$time_d = strtotime("{$d}-{$m}-{$y}");

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header role="banner" class="uxr-header">
		<div class="uxr-grid-container">
			<p class="uxr-header-logo">
				<a href="<?php echo home_url('/'); ?>" rel="home">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/logo-uxrennes.svg" width="121" height="121" alt="UX Rennes" data-pin-nopin="true" />
				</a>
			</p>	

			<h1 class="uxr-header-title">
				<?php if (isset($uxr_event_theme) && !empty($uxr_event_theme)) : ?>
				<em><?php echo $uxr_event_title; ?> &middot; <?php echo date_i18n('d F Y', $time_d); ?></em>
				<span class="uxr-visually-hidden"> : </span>
				<strong class="uxr-title-alpha"><?php echo $uxr_event_theme; ?></strong>
				<?php else : ?>
				<em><?php echo date_i18n('d F Y', $time_d); ?></em>
				<strong class="uxr-title-alpha"><?php the_title(); ?></strong>
				<?php endif; ?>
			</h1>
		</div>
	</header>

	<main role="main" class="uxr-main">
		<div class="uxr-grid-container">
			<div class="uxr-contrib">

				<?php 

				if (isset($uxr_event_flexible_content) && !empty($uxr_event_flexible_content)) :
								 
					foreach( $uxr_event_flexible_content as $count => $uxr_event_flexible_content_block ) :
	 
						switch( $uxr_event_flexible_content_block ) :
		

							// 
							// SUBTITLE
							//
							case 'subtitle':
					 
								$subtitle      = get_post_meta( $post_ID, 'uxr_event_flexible_content_' . $count . '_subtitle', true);
								 
								if ( isset($subtitle) && !empty($subtitle) ) 
									echo '</div>';
									echo '<h2 class="uxr-title-beta">' . esc_html($subtitle) . '</h2>';
									echo '<div class="uxr-contrib">';
					 
							break;


							// 
							// WYSIWYG
							//
							case 'wysiwyg':
					 
								$wysiwyg      = get_post_meta( $post_ID, 'uxr_event_flexible_content_' . $count . '_wysiwyg', true);
								 
								if ( isset($wysiwyg) && !empty($wysiwyg) ) 
									echo apply_filters('the_content', $wysiwyg);
					 
							break;
					 
					 
							//
							// Talk
							//
							case 'talk':
					 
								$talk_title 			= get_post_meta( $post_ID, 'uxr_event_flexible_content_' . $count . '_title', true );
								$talk_speaker_name 		= get_post_meta( $post_ID, 'uxr_event_flexible_content_' . $count . '_speaker_name', true );
								$talk_speaker_twitter 	= get_post_meta( $post_ID, 'uxr_event_flexible_content_' . $count . '_speaker_twitter', true );
				 
								if ($talk_title ) :
									
									echo '<h3>';

									// Talk title
									echo "\t" . esc_html($talk_title) . "\n";

									// Speaker name
									if ($talk_speaker_name) :
										echo "\t" . '<span>'. __('by', 'uxrennes-theme') . ' ' . esc_html($talk_speaker_name) . '</span>' . "\n";
									endif;

									// Speaker Twitter
									if ($talk_speaker_twitter) :
										$talk_speaker_twitter = str_replace('@', '', $talk_speaker_twitter);
										echo "\t" . '<span><a href="https://twitter.com/'.esc_html($talk_speaker_twitter).'" target="_blank">@'. esc_html($talk_speaker_twitter) . '</a></span>'."\n";
									endif;

									echo '</h3>';

								endif;
					 
							break;
					 
					 
							//
							// Video
							//
							// case 'video':
					 
							// 	$video = get_post_meta( $post_ID, 'uxr_event_flexible_content_' . $count . '_video', true);
					 
							// 	if ( isset($video) && !empty($video) ) :
							// 		echo apply_filters('the_content', $video) . "\n"; 
							// 	endif;
					 
							// break;

					 
					 
							//
							// Image
							//
							case 'fullwidth_image':
					 
								$image_ID   = get_post_meta( $post_ID, 'uxr_event_flexible_content_' . $count . '_fullwidth_image', true );

								if (isset($image_ID) && !empty($image_ID)) :

									// Image source
									$img_src                = wp_get_attachment_image_url( $image_ID, 'large' );
									$img_srcset             = wp_get_attachment_image_srcset( $image_ID, 'large' );
									$img_sizes              = wp_get_attachment_image_sizes( $image_ID, 'large' );

									// Image meta
									$image_meta             = get_posts(array('p' => $image_ID, 'post_type' => 'attachment'));
									$image_caption          = $image_meta[0]->post_excerpt;
									$image_more_meta        = wp_get_attachment_metadata($image_ID, 'large');

									echo "\t".'</div>'."\n";
									echo '</div>'."\n";

									echo '<img src="'. esc_url( $img_src ) .'" srcset="'. esc_attr( $img_srcset ) .'" sizes="'. esc_attr($img_sizes).'" alt="" class="uxr-asset-fullwidth" />';

									echo '<div class="uxr-grid-container">'."\n";
									echo "\t".'<div class="uxr-contrib">'."\n";

								endif;
					 
							break;

						endswitch;

					endforeach;

				endif;

				?>
			</div>
		</div>
	</main>

	<?php /*
	<footer class="entry-footer">
		<?php uxr_entry_footer(); ?>
	</footer>
	*/ ?>
</article>

