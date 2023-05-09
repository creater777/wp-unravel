<?php




/**
 * unravel functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package unravel
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */


require_once WP_CONTENT_DIR . '/themes/wp_unravel/menu_walker.php';

function wpcf7_load_js_not_safari11() {
    global $is_safari;
    if($is_safari) {
        return false;
    } else {
        return true;
    }
}
add_filter( 'wpcf7_load_js', 'wpcf7_load_js_not_safari11' );

function my_nav_menu( $args ) {

    $args = array_merge( [
        'container'       => false,
        'menu_class'      => 'menu main-menu menu-depth-0 menu-even',
        'echo'            => false,
        'items_wrap'      => '%3$s',
        'depth'           => 10,
        'walker'          => new My_Walker_Nav_Menu()
    ], $args );

    $args['container']='';

    echo wp_nav_menu( $args );
}


function my_nav_menu_post( $args ) {

    $args = array_merge( [

            'menu'            => '',              // (string) Название выводимого меню (указывается в админке при создании меню, приоритетнее
            // чем указанное местоположение theme_location - если указано, то параметр theme_location игнорируется)
            'container'       => 'div',           // (string) Контейнер меню. Обворачиватель ul. Указывается тег контейнера (по умолчанию в тег div)
            'container_class' => '',              // (string) class контейнера (div тега)
            'container_id'    => '',              // (string) id контейнера (div тега)
            'menu_class'      => 'menu-skeleton',          // (string) class самого меню (ul тега)
            'menu_id'         => '',              // (string) id самого меню (ul тега)
            'echo'            => true,            // (boolean) Выводить на экран или возвращать для обработки
            'fallback_cb'     => 'wp_page_menu',  // (string) Используемая (резервная) функция, если меню не существует (не удалось получить)
            'before'          => '',              // (string) Текст перед <a> каждой ссылки
            'after'           => '',              // (string) Текст после </a> каждой ссылки
            'link_before'     => '',              // (string) Текст перед анкором (текстом) ссылки
            'link_after'      => '',              // (string) Текст после анкора (текста) ссылки
            'depth'           => 0,               // (integer) Глубина вложенности (0 - неограничена, 2 - двухуровневое меню)
            'walker'          => new My_Walker_Nav_Menu2(),              // (object) Класс собирающий меню. Default: new Walker_Nav_Menu
            'theme_location'  => ''               // (string) Расположение меню в шаблоне. (указывается ключ которым было зарегистрировано меню в функции register_nav_menus)


    ], $args );



    echo wp_nav_menu( $args );
}


function get_global(){
    return 103;
}

function unravel_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on unravel, use a find and replace
		* to change 'unravel' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'unravel', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Навигация по сайту', 'unravel' ),
		)
	);


//	Меню сайта
    add_filter( 'nav_menu_css_class', '__return_empty_array' );



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
            'menu',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'unravel_custom_background_args',
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
add_action( 'after_setup_theme', 'unravel_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function unravel_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'unravel_content_width', 640 );
}
add_action( 'after_setup_theme', 'unravel_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function unravel_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'unravel' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'unravel' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'unravel_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function unravel_scripts() {
	wp_enqueue_style( 'unravel-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'unravel-style', 'rtl', 'replace' );

	wp_enqueue_script( 'unravel-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'unravel_scripts' );

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

function div_view( $atts ){
    return "<div class=\"{$atts['class']}\">{$atts['raw']}:</div>";
}

add_shortcode( 'div', 'div_view' );