<?php

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 780; /* pixels */
}

/**
 * Customizer additions.
 */
require_once get_template_directory() . '/inc/customizer.php';

/**
 * Custom template tags for this theme.
 */
require_once get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require_once get_template_directory() . '/inc/extras.php';

/**
 * Load Jetpack compatibility file.
 */
require_once get_template_directory() . '/inc/jetpack.php';


if ( ! function_exists( 'undiscovered_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function undiscovered_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Undiscovered, use a find and replace
	 * to change 'undiscovered' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'undiscovered', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'undiscovered' ),
		'footer' => __( 'Footer Menu', 'undiscovered' ),
	) );

	// Enable support for Post Formats.
	add_theme_support( 'post-formats', array( 'image', 'gallery', 'video', 'quote', 'link' ) );
}
endif; // undiscovered_setup
add_action( 'after_setup_theme', 'undiscovered_setup' );

/**
 * Register widgetized area and update sidebar with default widgets.
 */
function undiscovered_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar left', 'undiscovered' ),
		'id'            => 'sidebar-left',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );

	register_sidebar( array(
		'name'          => __( 'Sidebar right', 'undiscovered' ),
		'id'            => 'sidebar-right',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'undiscovered_widgets_init' );


/**
 * Enqueue scripts and styles.
 */
function undiscovered_scripts() {
	wp_enqueue_style( 'undiscovered-slicknav-style', get_template_directory_uri() . '/css/slicknav.css' );
	wp_enqueue_style( 'scss-css-custom', get_template_directory_uri() . '/sass/stylesheets/styles.css' );
	wp_enqueue_style( 'undiscovered-bxslider-style', get_template_directory_uri() . '/css/jquery.bxslider.css' );

	$font = str_replace("+", " ", undiscovered_options('font', 'Rokkitt'));
	$protocol = is_ssl() ? 'https' : 'http';
	$query_args = array(
		'family' =>	$font.':400,700'
	);
	wp_enqueue_style('undiscovered-fonts',
		add_query_arg($query_args, "$protocol://fonts.googleapis.com/css" ),
	array(), null);
	
	// wp_enqueue_style( 'undiscovered-style', get_stylesheet_uri() );
	

	wp_enqueue_style( 'undiscovered-theme-settings-css', get_template_directory_uri() . '/custom.css', array(), null ); 
	$main_color      = undiscovered_options('primary_color', '#E83D52');
	$secondary_color = undiscovered_options('secondary_color', '#BE3243');
	$css = "
		body, button, input {
			font-family: '{$font}', serif;
		}

		a {
			color: {$main_color};
		}
		a:visited, a:hover, a:focus, a:active {
			color: {$secondary_color};
		}

		.slicknav_menu, #main #infinite-handle span, .comment-form .form-submit input {
			background: {$main_color};
		}
		.slicknav_btn, .slicknav_menu li a:hover, .slicknav_nav .slicknav_item:hover {
			background: {$secondary_color};
		}

		.main-navigation a {
			text-shadow: 2px -1px 1px {$secondary_color};
			color: #fff;
		}
		.main-navigation ul ul {
			border-color: {$secondary_color};
		}
		.main-navigation > div > ul > li > a {
			border-bottom: 1px solid {$main_color};
		}
		.main-navigation > div > ul > li:hover > a {
			border-bottom: 1px solid {$secondary_color};
		}
		.main-navigation ul ul a:hover {
			color: {$secondary_color};
		}

		.entry-content blockquote, 
		.format-link .entry-content p:first-child,
		#main #infinite-handle span,
		.comment-form .form-submit input {
			border-color: {$secondary_color};
		}
		.entry-content blockquote:before {
			color: {$secondary_color};
		}

		#main #infinite-handle span, .comment-form .form-submit input {
			text-shadow: 2px -1px 1px {$secondary_color};
		}

		#site-navigation {
			background: {$main_color};
			border-top-color: {$secondary_color};
		}
	";
	wp_add_inline_style( 'undiscovered-theme-settings-css', $css );

	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'undiscovered-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );
	wp_enqueue_script(
		'undiscovered-bxslider',
		get_template_directory_uri() . '/js/jquery.bxslider.min.js',
		array( 'jquery' )
	);
	wp_enqueue_script(
		'undiscovered-slicknav-script',
		get_template_directory_uri() . '/js/jquery.slicknav.min.js',
		array( 'jquery' )
	);
	wp_enqueue_script(
		'undiscovered-uitotop-script',
		get_template_directory_uri() . '/js/jquery.ui.totop.js',
		array( 'jquery' )
	);
	wp_enqueue_script(
		'undiscovered-main-script',
		get_template_directory_uri() . '/js/main.js',
		array( 'jquery' )
	);

	wp_enqueue_script(
		'bootstrap-script',
		get_template_directory_uri() . '/sass/javascripts/bootstrap.min.js',
		array( 'jquery' )
	);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'undiscovered_scripts' );

add_filter( 'use_default_gallery_style', '__return_false' );

add_filter('body_class', 'add_logged_out_body_class');
function add_logged_out_body_class($classes) {
	if (! is_user_logged_in())
		$classes[] = 'logged-out';

	return $classes;
}
add_theme_support( 'post-thumbnails' ); 
function my_nav_wrap() {
  // default value of 'items_wrap' is <ul id="%1$s" class="%2$s">%3$s</ul>'
  
  // open the <ul>, set 'menu_class' and 'menu_id' values
  $wrap  = '<ul id="%1$s" class="%2$s">';
  
  // get nav items as configured in /wp-admin/
  $wrap .= '%3$s';
  
  // the static link 
  $wrap .= '<li class="search-modal-btn"><a href="#search-box" data-click="collapse"><img src="'.get_template_directory_uri().'/img/search-btn.png"></a></li>';
  
  // close the <ul>
  $wrap .= '</ul>';
  // return the result
  return $wrap;
}

// About us CPT
$labels = null;

		$labels = array(

		 'name'               => _x( 'About Us', 'post type general name', 'your-plugin-textdomain' ),

		 'singular_name'      => _x( 'About Us', 'post type singular name', 'your-plugin-textdomain' ),

		 'menu_name'          => _x( 'About Us', 'admin menu', 'your-plugin-textdomain' ),

		 'name_admin_bar'     => _x( 'About Us', 'add new on admin bar', 'your-plugin-textdomain' ),

		 'add_new'            => _x( 'Add New', 'About Us', 'your-plugin-textdomain' ),

		 'add_new_item'       => __( 'Add New About Us Post', 'your-plugin-textdomain' ),

		 'new_item'           => __( 'New About Us Post', 'your-plugin-textdomain' ),

		 'edit_item'          => __( 'Edit About Us Post', 'your-plugin-textdomain' ),

		 'view_item'          => __( 'View About Us Post', 'your-plugin-textdomain' ),

		 'all_items'          => __( 'All About Us Post', 'your-plugin-textdomain' ),

		 'search_items'       => __( 'Search About Us Post', 'your-plugin-textdomain' ),

		 'parent_item_colon'  => __( 'Parent About Us Post:', 'your-plugin-textdomain' ),

		 'not_found'          => __( 'No About Us Post found.', 'your-plugin-textdomain' ),

		 'not_found_in_trash' => __( 'No About Us Post found in Trash.', 'your-plugin-textdomain' )

		);

		 $args = null;

			$args = array(
			 'menu_icon' => 'dashicons-media-text',

			 'labels'             => $labels,

			 'description'        => __( 'Description.', 'your-plugin-textdomain' ),

			 'public'             => true,

			 'publicly_queryable' => true,

			 'show_ui'            => true,

			 'show_in_menu'       => true,

			 'query_var'          => true,

			 'rewrite'            => array( 'slug' => 'is-about-us' ),

			 'capability_type'    => 'post',

			 'has_archive'        => true,

			 'hierarchical'       => false,

			 'menu_position'      => null,

			 'supports'           => array( 'title','editor', 'thumbnail','custom-fields' )

			);
		 register_post_type( 'is-about-us', $args );

// Fire Damage CPT
$labels = null;

		$labels = array(

		 'name'               => _x( 'Fire Damage', 'post type general name', 'your-plugin-textdomain' ),

		 'singular_name'      => _x( 'Fire Damage', 'post type singular name', 'your-plugin-textdomain' ),

		 'menu_name'          => _x( 'Fire Damage', 'admin menu', 'your-plugin-textdomain' ),

		 'name_admin_bar'     => _x( 'Fire Damage', 'add new on admin bar', 'your-plugin-textdomain' ),

		 'add_new'            => _x( 'Add New', 'Fire Damage', 'your-plugin-textdomain' ),

		 'add_new_item'       => __( 'Add New Fire Damage Post', 'your-plugin-textdomain' ),

		 'new_item'           => __( 'New Fire Damage Post', 'your-plugin-textdomain' ),

		 'edit_item'          => __( 'Edit Fire Damage Post', 'your-plugin-textdomain' ),

		 'view_item'          => __( 'View Fire Damage Post', 'your-plugin-textdomain' ),

		 'all_items'          => __( 'All Fire Damage Post', 'your-plugin-textdomain' ),

		 'search_items'       => __( 'Search Fire Damage Post', 'your-plugin-textdomain' ),

		 'parent_item_colon'  => __( 'Parent Fire Damage Post:', 'your-plugin-textdomain' ),

		 'not_found'          => __( 'No Fire Damage Post found.', 'your-plugin-textdomain' ),

		 'not_found_in_trash' => __( 'No Fire Damage Post found in Trash.', 'your-plugin-textdomain' )

		);

		 $args = null;

			$args = array(
			 'menu_icon' => 'dashicons-media-text',

			 'labels'             => $labels,

			 'description'        => __( 'Description.', 'your-plugin-textdomain' ),

			 'public'             => true,

			 'publicly_queryable' => true,

			 'show_ui'            => true,

			 'show_in_menu'       => true,

			 'query_var'          => true,

			 'rewrite'            => array( 'slug' => 'is-fire-damage' ),

			 'capability_type'    => 'post',

			 'has_archive'        => true,

			 'hierarchical'       => false,

			 'menu_position'      => null,

			 'supports'           => array( 'title','editor', 'thumbnail','custom-fields' )

			);
		 register_post_type( 'is-fire-damage', $args );

// Water Damage CPT
$labels = null;

		$labels = array(

		 'name'               => _x( 'Water Damage', 'post type general name', 'your-plugin-textdomain' ),

		 'singular_name'      => _x( 'Water Damage', 'post type singular name', 'your-plugin-textdomain' ),

		 'menu_name'          => _x( 'Water Damage', 'admin menu', 'your-plugin-textdomain' ),

		 'name_admin_bar'     => _x( 'Water Damage', 'add new on admin bar', 'your-plugin-textdomain' ),

		 'add_new'            => _x( 'Add New', 'Water Damage', 'your-plugin-textdomain' ),

		 'add_new_item'       => __( 'Add New Water Damage Post', 'your-plugin-textdomain' ),

		 'new_item'           => __( 'New Water Damage Post', 'your-plugin-textdomain' ),

		 'edit_item'          => __( 'Edit Water Damage Post', 'your-plugin-textdomain' ),

		 'view_item'          => __( 'View Water Damage Post', 'your-plugin-textdomain' ),

		 'all_items'          => __( 'All Water Damage Post', 'your-plugin-textdomain' ),

		 'search_items'       => __( 'Search Water Damage Post', 'your-plugin-textdomain' ),

		 'parent_item_colon'  => __( 'Parent Water Damage Post:', 'your-plugin-textdomain' ),

		 'not_found'          => __( 'No Water Damage Post found.', 'your-plugin-textdomain' ),

		 'not_found_in_trash' => __( 'No Water Damage Post found in Trash.', 'your-plugin-textdomain' )

		);

		 $args = null;

			$args = array(
			 'menu_icon' => 'dashicons-media-text',

			 'labels'             => $labels,

			 'description'        => __( 'Description.', 'your-plugin-textdomain' ),

			 'public'             => true,

			 'publicly_queryable' => true,

			 'show_ui'            => true,

			 'show_in_menu'       => true,

			 'query_var'          => true,

			 'rewrite'            => array( 'slug' => 'is-water-damage' ),

			 'capability_type'    => 'post',

			 'has_archive'        => true,

			 'hierarchical'       => false,

			 'menu_position'      => null,

			 'supports'           => array( 'title','editor', 'thumbnail','custom-fields' )

			);
		 register_post_type( 'is-water-damage', $args );

// Flood Damage CPT
$labels = null;

		$labels = array(

		 'name'               => _x( 'Flood Damage', 'post type general name', 'your-plugin-textdomain' ),

		 'singular_name'      => _x( 'Flood Damage', 'post type singular name', 'your-plugin-textdomain' ),

		 'menu_name'          => _x( 'Flood Damage', 'admin menu', 'your-plugin-textdomain' ),

		 'name_admin_bar'     => _x( 'Flood Damage', 'add new on admin bar', 'your-plugin-textdomain' ),

		 'add_new'            => _x( 'Add New', 'Flood Damage', 'your-plugin-textdomain' ),

		 'add_new_item'       => __( 'Add New Flood Damage Post', 'your-plugin-textdomain' ),

		 'new_item'           => __( 'New Flood Damage Post', 'your-plugin-textdomain' ),

		 'edit_item'          => __( 'Edit Flood Damage Post', 'your-plugin-textdomain' ),

		 'view_item'          => __( 'View Flood Damage Post', 'your-plugin-textdomain' ),

		 'all_items'          => __( 'All Flood Damage Post', 'your-plugin-textdomain' ),

		 'search_items'       => __( 'Search Flood Damage Post', 'your-plugin-textdomain' ),

		 'parent_item_colon'  => __( 'Parent Flood Damage Post:', 'your-plugin-textdomain' ),

		 'not_found'          => __( 'No Flood Damage Post found.', 'your-plugin-textdomain' ),

		 'not_found_in_trash' => __( 'No Flood Damage Post found in Trash.', 'your-plugin-textdomain' )

		);

		 $args = null;

			$args = array(
			 'menu_icon' => 'dashicons-media-text',

			 'labels'             => $labels,

			 'description'        => __( 'Description.', 'your-plugin-textdomain' ),

			 'public'             => true,

			 'publicly_queryable' => true,

			 'show_ui'            => true,

			 'show_in_menu'       => true,

			 'query_var'          => true,

			 'rewrite'            => array( 'slug' => 'is-flood-damage' ),

			 'capability_type'    => 'post',

			 'has_archive'        => true,

			 'hierarchical'       => false,

			 'menu_position'      => null,

			 'supports'           => array( 'title','editor', 'thumbnail','custom-fields' )

			);
		 register_post_type( 'is-flood-damage', $args );

// Sewage Damage CPT
$labels = null;

		$labels = array(

		 'name'               => _x( 'Sewage Damage', 'post type general name', 'your-plugin-textdomain' ),

		 'singular_name'      => _x( 'Sewage Damage', 'post type singular name', 'your-plugin-textdomain' ),

		 'menu_name'          => _x( 'Sewage Damage', 'admin menu', 'your-plugin-textdomain' ),

		 'name_admin_bar'     => _x( 'Sewage Damage', 'add new on admin bar', 'your-plugin-textdomain' ),

		 'add_new'            => _x( 'Add New', 'Sewage Damage', 'your-plugin-textdomain' ),

		 'add_new_item'       => __( 'Add New Sewage Damage Post', 'your-plugin-textdomain' ),

		 'new_item'           => __( 'New Sewage Damage Post', 'your-plugin-textdomain' ),

		 'edit_item'          => __( 'Edit Sewage Damage Post', 'your-plugin-textdomain' ),

		 'view_item'          => __( 'View Sewage Damage Post', 'your-plugin-textdomain' ),

		 'all_items'          => __( 'All Sewage Damage Post', 'your-plugin-textdomain' ),

		 'search_items'       => __( 'Search Sewage Damage Post', 'your-plugin-textdomain' ),

		 'parent_item_colon'  => __( 'Parent Sewage Damage Post:', 'your-plugin-textdomain' ),

		 'not_found'          => __( 'No Sewage Damage Post found.', 'your-plugin-textdomain' ),

		 'not_found_in_trash' => __( 'No Sewage Damage Post found in Trash.', 'your-plugin-textdomain' )

		);

		 $args = null;

			$args = array(
			 'menu_icon' => 'dashicons-media-text',

			 'labels'             => $labels,

			 'description'        => __( 'Description.', 'your-plugin-textdomain' ),

			 'public'             => true,

			 'publicly_queryable' => true,

			 'show_ui'            => true,

			 'show_in_menu'       => true,

			 'query_var'          => true,

			 'rewrite'            => array( 'slug' => 'is-sewage-damage' ),

			 'capability_type'    => 'post',

			 'has_archive'        => true,

			 'hierarchical'       => false,

			 'menu_position'      => null,

			 'supports'           => array( 'title','editor', 'thumbnail','custom-fields' )

			);
		 register_post_type( 'is-sewage-damage', $args );

// Asbestos Removal & Remediation CPT
$labels = null;

		$labels = array(

		 'name'               => _x( 'Asbestos Removal & Remediation', 'post type general name', 'your-plugin-textdomain' ),

		 'singular_name'      => _x( 'Asbestos Removal & Remediation', 'post type singular name', 'your-plugin-textdomain' ),

		 'menu_name'          => _x( 'Asbestos Removal & Remediation', 'admin menu', 'your-plugin-textdomain' ),

		 'name_admin_bar'     => _x( 'Asbestos Removal & Remediation', 'add new on admin bar', 'your-plugin-textdomain' ),

		 'add_new'            => _x( 'Add New', 'Asbestos Removal & Remediation', 'your-plugin-textdomain' ),

		 'add_new_item'       => __( 'Add New Asbestos Removal & Remediation Post', 'your-plugin-textdomain' ),

		 'new_item'           => __( 'New Asbestos Removal & Remediation Post', 'your-plugin-textdomain' ),

		 'edit_item'          => __( 'Edit Asbestos Removal & Remediation Post', 'your-plugin-textdomain' ),

		 'view_item'          => __( 'View Asbestos Removal & Remediation Post', 'your-plugin-textdomain' ),

		 'all_items'          => __( 'All Asbestos Removal & Remediation Post', 'your-plugin-textdomain' ),

		 'search_items'       => __( 'Search Asbestos Removal & Remediation Post', 'your-plugin-textdomain' ),

		 'parent_item_colon'  => __( 'Parent Asbestos Removal & Remediation Post:', 'your-plugin-textdomain' ),

		 'not_found'          => __( 'No Asbestos Removal & Remediation Post found.', 'your-plugin-textdomain' ),

		 'not_found_in_trash' => __( 'No Asbestos Removal & Remediation Post found in Trash.', 'your-plugin-textdomain' )

		);

		 $args = null;

			$args = array(
			 'menu_icon' => 'dashicons-media-text',

			 'labels'             => $labels,

			 'description'        => __( 'Description.', 'your-plugin-textdomain' ),

			 'public'             => true,

			 'publicly_queryable' => true,

			 'show_ui'            => true,

			 'show_in_menu'       => true,

			 'query_var'          => true,

			 'rewrite'            => array( 'slug' => 'is-asbestos-removal' ),

			 'capability_type'    => 'post',

			 'has_archive'        => true,

			 'hierarchical'       => false,

			 'menu_position'      => null,

			 'supports'           => array( 'title','editor', 'thumbnail','custom-fields' )

			);
		 register_post_type( 'is-asbestos-removal', $args );
// Mould Removal CPT
$labels = null;

		$labels = array(

		 'name'               => _x( 'Mould Removal', 'post type general name', 'your-plugin-textdomain' ),

		 'singular_name'      => _x( 'Mould Removal', 'post type singular name', 'your-plugin-textdomain' ),

		 'menu_name'          => _x( 'Mould Removal', 'admin menu', 'your-plugin-textdomain' ),

		 'name_admin_bar'     => _x( 'Mould Removal', 'add new on admin bar', 'your-plugin-textdomain' ),

		 'add_new'            => _x( 'Add New', 'Mould Removal', 'your-plugin-textdomain' ),

		 'add_new_item'       => __( 'Add New Mould Removal Post', 'your-plugin-textdomain' ),

		 'new_item'           => __( 'New Mould Removal Post', 'your-plugin-textdomain' ),

		 'edit_item'          => __( 'Edit Mould Removal Post', 'your-plugin-textdomain' ),

		 'view_item'          => __( 'View Mould Removal Post', 'your-plugin-textdomain' ),

		 'all_items'          => __( 'All Mould Removal Post', 'your-plugin-textdomain' ),

		 'search_items'       => __( 'Search Mould Removal Post', 'your-plugin-textdomain' ),

		 'parent_item_colon'  => __( 'Parent Mould Removal Post:', 'your-plugin-textdomain' ),

		 'not_found'          => __( 'No Mould Removal Post found.', 'your-plugin-textdomain' ),

		 'not_found_in_trash' => __( 'No Mould Removal Post found in Trash.', 'your-plugin-textdomain' )

		);

		 $args = null;

			$args = array(
			 'menu_icon' => 'dashicons-media-text',

			 'labels'             => $labels,

			 'description'        => __( 'Description.', 'your-plugin-textdomain' ),

			 'public'             => true,

			 'publicly_queryable' => true,

			 'show_ui'            => true,

			 'show_in_menu'       => true,

			 'query_var'          => true,

			 'rewrite'            => array( 'slug' => 'is-mould-removal' ),

			 'capability_type'    => 'post',

			 'has_archive'        => true,

			 'hierarchical'       => false,

			 'menu_position'      => null,

			 'supports'           => array( 'title','editor', 'thumbnail','custom-fields' )

			);
		 register_post_type( 'is-mould-removal', $args );

// FAQ CPT
$labels = null;

		$labels = array(

		 'name'               => _x( 'FAQ', 'post type general name', 'your-plugin-textdomain' ),

		 'singular_name'      => _x( 'FAQ', 'post type singular name', 'your-plugin-textdomain' ),

		 'menu_name'          => _x( 'FAQ', 'admin menu', 'your-plugin-textdomain' ),

		 'name_admin_bar'     => _x( 'FAQ', 'add new on admin bar', 'your-plugin-textdomain' ),

		 'add_new'            => _x( 'Add New', 'FAQ', 'your-plugin-textdomain' ),

		 'add_new_item'       => __( 'Add New FAQ Post', 'your-plugin-textdomain' ),

		 'new_item'           => __( 'New FAQ Post', 'your-plugin-textdomain' ),

		 'edit_item'          => __( 'Edit FAQ Post', 'your-plugin-textdomain' ),

		 'view_item'          => __( 'View FAQ Post', 'your-plugin-textdomain' ),

		 'all_items'          => __( 'All FAQ Post', 'your-plugin-textdomain' ),

		 'search_items'       => __( 'Search FAQ Post', 'your-plugin-textdomain' ),

		 'parent_item_colon'  => __( 'Parent FAQ Post:', 'your-plugin-textdomain' ),

		 'not_found'          => __( 'No FAQ Post found.', 'your-plugin-textdomain' ),

		 'not_found_in_trash' => __( 'No FAQ Post found in Trash.', 'your-plugin-textdomain' )

		);

		 $args = null;

			$args = array(
			 'menu_icon' => 'dashicons-media-text',

			 'labels'             => $labels,

			 'description'        => __( 'Description.', 'your-plugin-textdomain' ),

			 'public'             => true,

			 'publicly_queryable' => true,

			 'show_ui'            => true,

			 'show_in_menu'       => true,

			 'query_var'          => true,

			 'rewrite'            => array( 'slug' => 'is-faq' ),

			 'capability_type'    => 'post',

			 'has_archive'        => true,

			 'hierarchical'       => false,

			 'menu_position'      => null,

			 'supports'           => array( 'title','editor', 'thumbnail','custom-fields' )

			);
		 register_post_type( 'is-faq', $args );