<?php
// new App\Boot();

if ( ! function_exists( 'icon_setup' ) ) :




	function icon_setup_theme_supported_features() {
			add_image_size( 'mobile', 480, 480, true );
			add_image_size( 'tablet', 900, 500, true );
			add_post_type_support( 'page', 'excerpt' );
			add_theme_support( 'disable-custom-font-sizes' );
			add_theme_support( 'disable-custom-gradients' );
			add_theme_support( 'custom-line-height' );
			remove_theme_support( 'core-block-patterns' );
	    add_theme_support( 'editor-color-palette', array(
	        array(
	            'name' => esc_attr__( 'very dark gray', 'themeLangDomain' ),
	            'slug' => 'very-dark-gray',
	            'color' => '#444',
	        ),
	    ) );
	}

	add_action( 'after_setup_theme', 'icon_setup_theme_supported_features' );


	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function icon_setup() {
		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featugreen-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
		// add_image_size( 'icon-large-thumb', 780 );
		// add_image_size( 'icon-medium-thumb', 400 );

		// add_filter('use_block_editor_for_post', '__return_false', 10);


		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary-menu' 		=> esc_html__( 'Primary', 'icon' ),
			'mobile-menu' 	=> esc_html__( 'Mobile', 'icon' )
		));

	}
endif;

add_action( 'after_setup_theme', 'icon_setup' );


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function icon_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'icon_content_width', 640 );
}
add_action( 'after_setup_theme', 'icon_content_width', 0 );

/**
 * Enqueue scripts and styles.
 */
function icon_scripts() {
	wp_dequeue_script('jquery');
	wp_deregister_script('jquery');

	//wp_register_script('jquery', '//code.jquery.com/jquery-3.5.1.min.js', false, '3.5.1', 'true');
	//wp_enqueue_script('jquery');
	//wp_enqueue_style( 'style', get_template_directory_uri()  .'/assets/css/style.css', array(), true);
	wp_enqueue_style( 'icon-tailwind', get_template_directory_uri() . '/assets/css/app.css', array(), true );
	wp_enqueue_script( 'icon-app', get_template_directory_uri() . '/assets/js/app.js', array(),'20210611', false );
	// wp_enqueue_script( 'icon-main', get_template_directory_uri() . '/assets/js/main.js', array('jquery', 'imagesloaded'), '20171108', true );

}
add_action( 'wp_enqueue_scripts', 'icon_scripts' );

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/header-functions.php';
require get_template_directory() . '/inc/acf.php';

// Remove admin color scheme
remove_action( 'admin_color_scheme_picker', 'admin_color_scheme_picker' );

// Disable Emojicons
add_action('init', 'disable_wp_emojicons' );


function disable_emojicons_tinymce( $plugins ) {
  if ( is_array( $plugins ) ) {
    return array_diff( $plugins, array( 'wpemoji' ) );
  } else {
    return array();
  }
}


function disable_wp_emojicons() {

  // all actions related to emojis
  remove_action( 'admin_print_styles', 'print_emoji_styles' );
  remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
  remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
  remove_action( 'wp_print_styles', 'print_emoji_styles' );
  remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
  remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
  remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );

  // filter to remove TinyMCE emojis
  add_filter( 'tiny_mce_plugins', 'disable_emojicons_tinymce' );
}



// Remove the REST API endpoint.
//remove_action('rest_api_init', 'wp_oembed_register_route' );

// Turn off oEmbed auto discovery.
add_filter('embed_oembed_discover', '__return_false' );

// Don't filter oEmbed results.
remove_filter('oembed_dataparse', 'wp_filter_oembed_result', 10 );

// Remove oEmbed discovery links.
remove_action('wp_head', 'wp_oembed_add_discovery_links');

// Remove oEmbed-specific JavaScript from the front-end and back-end.
remove_action('wp_head', 'wp_oembed_add_host_js');

// Remove all embeds rewrite rules.

// Remove WordPress Meta Generator
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'wp_shortlink_wp_head');
remove_action('wp_head', 'wp_resource_hints', 2);
remove_action('wp_head', 'rest_output_link_wp_head');
remove_action('wp_head', 'feed_links_extra', 3 ); // Display the links to the extra feeds such as category feeds
remove_action('wp_head', 'feed_links', 2 ); // Display the links to the general feeds: Post and Comment Feed
remove_action('wp_head', 'index_rel_link' ); // index link
remove_action('wp_head', 'parent_post_rel_link', 10, 0 ); // prev link
remove_action('wp_head', 'start_post_rel_link', 10, 0 ); // start link
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0 ); // Display relational links for the posts adjacent to the current post.

/*Custom Post type start*/

function icon_post_type_aboutslider() {
	$supports = array(
		'title',
		'thumbnail',
		'excerpt',
		'page-attributes',
		'custom-fields',
		'editor'
	);

	$labels = array(
		'name' => 'About Slider',
		'singular_name' => 'About',
		'menu_name' => 'About Slider',
		'name_admin_bar' => 'About',
		'add_new' => 'Add About',
		'add_new_item' => 'Add About',
		'new_item' => 'New About',
		'edit_item' => 'Edit About',
		'view_item' => __('View About'),
		'all_items' => __('All About'),
		'search_items' => __('Search About'),
		'not_found' => __('No About found.'),
	);
	$args = array(
		'supports' => $supports,
		'labels' => $labels,
		'public' => true,
	  'show_ui' => true,
		'capability_type'    => 'page',
		'query_var' => true,
		'menu_icon' => 'dashicons-slides',
		'rewrite' => array( 'slug' => 'foods'),
		'has_archive' => true,
    'hierarchical' => true,
	);
	register_post_type('about', $args);
}
add_action('init', 'icon_post_type_aboutslider');

/*Custom Post type end*/






/*Register Gutenberg Blocks*/


register_block_type('cgb/calltoaction', array(
        'render_callback' => 'test_render_callback',
    )
);

function test_render_callback( $attributes ){
		$style = $attributes['selectStyle'];
		if ($style = 'style2') {
			$yo = '<div class="bg-purple-300 py-12">';
			$yo .= '<div class="max-w-screen-lg space-y-6 text-center mx-auto">';
			$yo .= '<div class="text-6xl font-bold max-w-3xl mx-auto text-center text-white">';
			$yo .= $attributes['myRichHeading'];
			$yo .= '</div>';
			$yo .= '<div class="text-lg text-center text-white">';
			$yo .= $attributes['myRichText'];
			$yo .= '</div>';
			$yo .= '<a href="/contact" class="text-lg inline-block bg-white text-purple-500 px-4 py-2 text-center text-white">';
			$yo .= $attributes['myRichButton'];
			$yo .= '</a>';
			$yo .= '</div>';
			$yo .= '</div>';
			return $yo;
		}
		else {

		}

}

register_block_type('cgb/ctestimonials', array(
        'render_callback' => 'testimonial_render_callback',
    )
);
function testimonial_render_callback( $attributes ){
			$review = $attributes['info'];
			foreach($review as $rev){
				$test = $rev['title'];
				$test .= $rev['description'];
				return $test;
			}
			$testimonial = '<div class="bg-purple-300 py-12">';
			$testimonial .= '<div class="max-w-screen-lg space-y-6 text-center mx-auto">';
			$testimonial .= '<div class="text-6xl font-bold max-w-3xl mx-auto text-center text-white">';
			$testimonial .=
			$testimonial .= '</div>';
			$testimonial .= '<div class="text-lg text-center text-white">';
			$testimonial .=
			$testimonial .= '</div>';
			$testimonial .= '<a href="/contact" class="text-lg inline-block bg-white text-purple-500 px-4 py-2 text-center text-white">';
			$testimonial .=
			$testimonial .= '</a>';
			$testimonial .= '</div>';
			$testimonial .= '</div>';
			return $testimonial;

}
