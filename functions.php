<?php
/**
 * basic_cafe functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package basic_cafe
 */

if ( ! function_exists( 'basic_cafe_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function basic_cafe_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on basic_cafe, use a find and replace
	 * to change 'basic_cafe' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'basic_cafe', get_template_directory() . '/languages' );

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
		'primary' => esc_html__( 'Primary', 'basic_cafe' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'basic_cafe_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'basic_cafe_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function basic_cafe_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'basic_cafe_content_width', 640 );
}
add_action( 'after_setup_theme', 'basic_cafe_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function basic_cafe_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'basic_cafe' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'basic_cafe_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function basic_cafe_scripts() {
	wp_enqueue_style( 'basic_cafe-style', get_stylesheet_uri() );

	wp_enqueue_script( 'basic_cafe-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'basic_cafe-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'basic_cafe_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/*this function creates a flexslider on the home page, retrieved from http://flexslider.woothemes.com */

wp_enqueue_script( 'basic_cafe-flexslider', get_stylesheet_directory_uri() . '/js/jquery.flexslider-min.js', array('jquery'), '2.6.0', true );

wp_enqueue_script( 'basic_cafe-flexslider.js', get_stylesheet_directory_uri() . '/js/flexslider.js', array('jquery'), '1.0', true );

// Enqueue Flexslider Files
 
    function wptuts_slider_scripts() {
        wp_enqueue_script( 'jquery' );
 
        wp_enqueue_style( 'flex-style', get_template_directory_uri() . '/inc/slider/css/flexslider.css' );
 
        wp_enqueue_script( 'flex-script', get_template_directory_uri() .  '/basic_cafe/js/jquery.flexslider-min.js', array( 'jquery' ), false, true );
    }
    add_action( 'wp_enqueue_scripts', 'wptuts_slider_scripts' );

?>