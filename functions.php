<?php
/**
 * aictheme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package aictheme
 */

if ( ! function_exists( 'aictheme_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function aictheme_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on aictheme, use a find and replace
		 * to change 'aictheme' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'aictheme', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'aictheme' ),
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

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'aictheme_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'aictheme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function aictheme_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'aictheme_content_width', 640 );
}
add_action( 'after_setup_theme', 'aictheme_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function aictheme_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'aictheme' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'aictheme' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'aictheme_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function aictheme_scripts() {
	wp_enqueue_style( 'bootstrap-css', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css' );

	wp_enqueue_style( 'aictheme-style', get_stylesheet_uri() );
	
	wp_enqueue_style( 'aictheme-fonts', 'https://fonts.googleapis.com/css?family=Roboto:300,400|Noto+Serif', false );

	wp_enqueue_script( 'popper-js', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js', array('jquery'), null, true);

	wp_enqueue_script( 'bootstrap-js', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js', array('jquery'), null, true );

	wp_enqueue_script( 'parallax', get_template_directory_uri() . '/js/parallax.min.js', array('jquery'), null, true );

	wp_enqueue_script( 'aictheme-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'aictheme_scripts' );

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


/**
 * Start customization
 */

 /**
 * CPT's
 */

add_action( 'init', 'resources_cpt' );

function resources_cpt() {
  register_post_type( 'resources',
    array(
      'labels' => array(
        'name' => __( 'Resources' ),
        'singular_name' => __( 'Resource' ),
        'name_admin_bar'        => _x( 'Resources', 'Add New on Toolbar', 'textdomain' ),
        'add_new'               => __( 'Add New', 'textdomain' ),
        'add_new_item'          => __( 'Add New Resource', 'textdomain' ),
        'new_item'              => __( 'New Resource', 'textdomain' ),
        'edit_item'             => __( 'Edit Resource', 'textdomain' ),
        'view_item'             => __( 'View Resource', 'textdomain' ),
        'all_items'             => __( 'All Resource', 'textdomain' ),
      ),
      'rewrite' => array( 'slug' => 'resources' ),
	  'public' => true,
      'has_archive' => true,
			'supports' => array( 'editor','thumbnail', 'title' ),
			'menu_icon'           => 'dashicons-analytics',
    )
  );
}

add_action( 'init', 'services' );

function services() {
  register_post_type( 'service',
    array(
      'labels' => array(
        'name' => __( 'Services' ),
        'singular_name' => __( 'Service' ),
        'name_admin_bar'        => _x( 'Services', 'Add New on Toolbar', 'textdomain' ),
        'add_new'               => __( 'Add New', 'textdomain' ),
        'add_new_item'          => __( 'Add New Service', 'textdomain' ),
        'new_item'              => __( 'New Service', 'textdomain' ),
        'edit_item'             => __( 'Edit Service', 'textdomain' ),
        'view_item'             => __( 'View Service', 'textdomain' ),
        'all_items'             => __( 'All Services', 'textdomain' ),
      ),
      'rewrite' => array( 'slug' => 'services' ),
	  'public' => true,
      'has_archive' => false,
			'supports' => array( 'editor', 'thumbnail', 'title' ),
			'menu_icon'           => 'dashicons-admin-tools',
    )
  );
}

function team_member() {
  register_post_type( 'team-member',
    array(
      'labels' => array(
        'name' => __( 'Team' ),
        'singular_name' => __( 'Team Member' ),
        'name_admin_bar'        => _x( 'Team ', 'Add New on Toolbar', 'textdomain' ),
        'add_new'               => __( 'Add New', 'textdomain' ),
        'add_new_item'          => __( 'Add New Team Member', 'textdomain' ),
        'new_item'              => __( 'New Team Member', 'textdomain' ),
        'edit_item'             => __( 'Edit Team Member', 'textdomain' ),
        'view_item'             => __( 'View Team Member', 'textdomain' ),
        'all_items'             => __( 'All Team Members', 'textdomain' ),
      ),
      'public' => true,
      'has_archive' => true,
			'supports' => array( 'title', 'thumbnail' ),
			'menu_icon'           => 'dashicons-id-alt',
    )
  );
}

add_action( 'init', 'team_member' );

 /**
 * Taxonomies
 */

add_action( 'init', 'team_member_cats' );

function team_member_cats() {
	register_taxonomy(
		'team-member-cats',
		'team-member',
		array(
			'hierarchical' => true,
			'label' => __( 'Sector' ),
			'rewrite' => true,
			'query_var' => true,
			'show_ui' => true,	
			'update_count_callback' => '_update_post_term_count'
		)
	);
}


if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Site-wide Content',
		'menu_title'	=> 'Site-wide Content',
		'menu_slug' 	=> 'site-wide-content',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Contact Details',
		'menu_title'	=> 'Contact Details',
		'parent_slug'	=> 'site-wide-content',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Footer',
		'menu_title'	=> 'Footer',
		'parent_slug'	=> 'site-wide-content',
	));
	
}

add_image_size( 'insights-thumb', 346, 206, true);


// Register Custom Navigation Walker
require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';

// Custom excerpt length
add_filter( 'excerpt_length', function($length) {
    return 14;
} );
// Modify read more
function new_excerpt_more($more) {
       global $post;
	return ' <a class="moretag" href="'. get_permalink($post->ID) . '">Read more</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');


// Team loop function

function team_loop(){ ?>

		<div id="post-<?php the_ID(); ?>" <?php post_class('team-member col-md-6'); ?>>
			<div class="row">
				<div class="col-4">
					<?php if (has_post_thumbnail()) {
					  the_post_thumbnail('thumbnail');
					} else { ?>
					   <img src="<?php echo get_stylesheet_directory_uri(); ?>/imgs/headshot-placeholder.jpg" alt="">
					<?php } ?>
					<?php  ?>
				</div>
				<div class="col-8 align-self-end">
					<h4 class="team-member-header"><?php the_title(); ?></h4>
					<p class="team-member-title"><?php the_field('title'); ?></p>
					<?php if (get_field('linked_in')): ?>
					<a href="<?php echo get_field('linked_in'); ?>"><img src="<?php echo get_stylesheet_directory_uri();?>/imgs/li-block.svg" alt="linked in logo"></a>
					<?php endif; ?>
				</div>
			</div>
			<div class="entry-content">
				<?php the_field('biography'); ?>
			</div><!-- .entry-content -->
		</div><!-- #post-<?php the_ID(); ?> -->
										
<?php }



						




