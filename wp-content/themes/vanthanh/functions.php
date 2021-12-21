<?php
/**
 * vanthanh functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package vanthanh
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'vanthanh_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function vanthanh_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on vanthanh, use a find and replace
		 * to change 'vanthanh' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'vanthanh', get_template_directory() . '/languages' );

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
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'vanthanh' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'vanthanh_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'vanthanh_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function vanthanh_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'vanthanh_content_width', 640 );
}

add_action( 'after_setup_theme', 'vanthanh_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function vanthanh_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'vanthanh' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'vanthanh' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}

add_action( 'widgets_init', 'vanthanh_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function vanthanh_scripts() {
	wp_enqueue_style( 'vanthanh-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'vanthanh-style', 'rtl', 'replace' );

	wp_enqueue_script( 'vanthanh-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'vanthanh-script', get_template_directory_uri() . '/js/script.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'vanthanh_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

// =========================== START CUSTOMIZE

/* Disable WordPress Admin Bar for all users */
add_filter( 'show_admin_bar', '__return_false' );


// Add slug column for PAGE posts
add_filter( "manage_page_posts_columns", "page_columns" );
function page_columns( $columns ) {
	$add_columns = array(
		'slug' => 'Slug',
	);
	$res         = array_slice( $columns, 0, 2, true ) +
	               $add_columns +
	               array_slice( $columns, 2, count( $columns ) - 1, true );

	return $res;
}

add_action( "manage_page_posts_custom_column", "my_custom_page_columns" );
function my_custom_page_columns( $column ) {
	global $post;
	switch ( $column ) {
		case 'slug' :
			echo $post->post_name;
			break;
	}
}

add_filter( "manage_post_posts_columns", "page_columns" );
add_action( "manage_post_posts_custom_column", "my_custom_page_columns" );

// END - Add slug column for PAGE posts

// Start - Images
// Remove default image sizes here.
function remove_extra_image_sizes() {
	foreach ( get_intermediate_image_sizes() as $size ) {
		if ( ! in_array( $size, array( 'thumbnail', 'medium', 'large' ) ) ) {
			remove_image_size( $size );
		}
	}
}

add_action( 'init', 'remove_extra_image_sizes' );
update_option( 'medium_large_size_w', 150 );
// END - Images


/**
 * Add section in admin page
 * @position function.php
 */
if ( function_exists( 'acf_add_options_page' ) ) {
	acf_add_options_page(
		array(
			'page_title' => 'Options Page',
			'menu_title' => 'Options Page Settings',
			'menu_slug'  => 'options-page-settings',
			'capability' => 'edit_posts',
			'redirect'   => true
		)
	);
	acf_add_options_sub_page(
		array(
			'page_title'  => 'General Settings',
			'menu_title'  => 'General Settings',
			'parent_slug' => 'options-page-settings'
		)
	);
	acf_add_options_sub_page(
		array(
			'page_title'  => 'Header Settings',
			'menu_title'  => 'Header Settings',
			'parent_slug' => 'options-page-settings'
		)
	);
	acf_add_options_sub_page(
		array(
			'page_title'  => 'Footer Settings',
			'menu_title'  => 'Footer Settings',
			'parent_slug' => 'options-page-settings'
		)
	);
}

/**
 * @param $price
 * @param string $symbol
 *
 * @return string
 */
function price_format( $price, string $symbol = 'VNĐ' ): string {
	return number_format( $price ) . ' ' . $symbol;
}

/**
 * @return string
 */
function render_call_button(): string {
	$text  = get_field( 'detail_call_text', 'option' );
	$link  = get_field( 'detail_call_link', 'option' );
	$link  = $link ?? 'javascript:void(0);';
	$color = get_field( 'detail_call_color', 'option' );
	$bg    = get_field( 'detail_call_bg', 'option' );
	$html  = '';
	if ( $text ) {
		$html = '<div class="call_btn"><a href="' . $link .
		        '" style="background:' . $bg . '; color:' . $color . ';"><div class="call_btn_inner">' . $text . '</div></a></div>';
	}

	return $html;
}
