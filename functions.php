<?php
/**
 * c functions and definitions
 *
 * @package c
 */

// Set the content width based on the theme's design and stylesheet.
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
add_action( 'after_setup_theme', 'c_setup' );

if ( ! function_exists( 'c_setup' ) ) {
	function c_setup() {
		// Translations can be filed in the /languages/ directory.
		// load_theme_textdomain( 'c', get_template_directory() . '/languages' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'html5', array(
			'comment-list',
			'search-form',
			'comment-form',
			'gallery',
			'caption',
		) );

		add_action( 'init', 'c_register_menus' );
		add_action( 'init', 'c_clean_up' );
		
		add_action( 'wp_enqueue_scripts', 'c_adjust_queue', 0 );
		add_action( 'widgets_init', 'c_widgets_init' );

		add_filter( 'wp_page_menu_args', 'c_page_menu_args' );
		add_filter( 'wp_title', 'c_wp_title', 10, 2 );
		add_filter( 'show_admin_bar', '__return_false' );
	}
}

function bnl_register_menus() {
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'c' ),
	) );
}

function c_clean_up() {
	if( is_front_page() || is_home() ) {
		remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head' );
		remove_action( 'wp_head', 'start_post_rel_link' );
	}

	remove_action( 'wp_head', 'rsd_link' );
	remove_action( 'wp_head', 'wlwmanifest_link' );
	remove_action( 'wp_head', 'wp_generator' );
	remove_action( 'wp_head', 'index_rel_link' );
	remove_action( 'wp_head', 'wp_shortlink_wp_head' );
	remove_action( 'wp_head', 'feed_links_extra', 3 );
}


/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function c_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'c' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}

/**
 * Enqueue scripts and styles.
 */
function c_adjust_queue() {
	if ( ! is_admin() ) {
		wp_enqueue_style( 'c-style', get_stylesheet_directory_uri().'/style.css' );
		wp_deregister_script( 'jquery' );

		// wp_enqueue_script( 'webfont', 'http://ajax.googleapis.com/ajax/libs/webfont/1.5.3/webfont.js', array(), '', false );
		wp_enqueue_script( 'modernizr', get_stylesheet_directory_uri() . '/components/modernizr/modernizr.js', array(), '', false );
		$jquery_url = check_jquery();
		wp_enqueue_script( 'jquery', $jquery_url, array(), '1.11.1', true );
		wp_enqueue_script( 'c-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );
		wp_enqueue_script( 'c-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
}

function check_jquery() {
	$cache = get_transient( 'is_google_alive' );
	$google_jquery = '//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js';
	$wp_jquery = get_stylesheet_directory_uri() . '/components/jquery/dist/jquery.min.js';

	if( $cache === false ) {
		$ping = wp_remote_head( 'http:' . $google_jquery );

		if( !is_wp_error( $ping ) && 200 == $ping[ 'response' ][ 'code' ] ) {
			set_transient( 'is_google_alive', true, 60 * 5 );
			
			return $google_jquery;
		} else {
			set_transient( 'is_google_alive', false, 60 * 5 );

			return $wp_jquery;
		}
	} else {
		return $google_jquery;
	}
}

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 *
 * @param array $args Configuration arguments.
 * @return array
 */
function c_page_menu_args( $args ) {
	$args['show_home'] = true;
	
	return $args;
}

/**
 * Filters wp_title to print a neat <title> tag based on what is being viewed.
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string The filtered title.
 */
function c_wp_title( $title, $sep ) {
	if ( is_feed() ) {
		return $title;
	}

	global $page, $paged;

	// Add the blog name
	$title .= get_bloginfo( 'name', 'display' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title .= " $sep $site_description";
	}

	// Add a page number if necessary:
	if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
		$title .= " $sep " . sprintf( __( 'Page %s', 'c' ), max( $paged, $page ) );
	}

	return $title;
}

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';