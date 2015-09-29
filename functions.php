<?php
//update_option('siteurl', 'http://localhost:88/theme');
//update_option('home','http://localhost:88/theme');
//exit;


/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'vi_theme_setup' ) ) :

function vi_theme_setup() {

	/*
	 * Thi?t l?p textdomain cho theme
	 */
	load_theme_textdomain( 'vi_theme', VI_THEME_DIR . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'galelry', 'quote', 'link',
	) );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'vi_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'vi_theme' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );


}
endif; // vi_theme_setup
add_action( 'after_setup_theme', 'vi_theme_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function vi_theme_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Main Sidebar', 'vi_theme' ),
		'id'            => 'main-sidebar',
		'description'   => 'Default Sidebar',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'vi_theme_widgets_init' );


//----------------------------------------------------------
// Set Logo
if( !function_exists( 'vi_theme_logo' ) ) {
	function vi_theme_logo ($logo_on, $logo_image_url) { ?>
		<div class="site-name">
			<?php
				if( $logo_on == 1 && !empty($logo_image_url) ) {
					printf( '<h1><a href="%1$s" title="%2$s"><img src="%3$s" alt="%4$s"></a></h1>',
						get_bloginfo('url'), get_bloginfo('description'), $logo_image_url, get_bloginfo('description')
						);
				} else {
					if( is_home() ) {
						printf( '<h1><a href="%1$s" title="%2$s">%3$s</a></h1>',
							get_bloginfo( 'url' ), get_bloginfo( 'description' ), get_bloginfo(' sitename')
						);
					} else {
						printf( '<h2><a href="%1$s" title="%2$s">%3$s</a></h2>',
							get_bloginfo( 'url' ), get_bloginfo( 'description' ), get_bloginfo(' sitename')
						);
					}
				}
			?>
		</div>
		<div class="site-description"><?php bloginfo('description') ?></div>
	<?php }
}

//----------------------------------------------------------
// Set entry thumbnail for post
if( !function_exists( 'vi_theme_entry_thumbnail' ) ) {
	function vi_theme_entry_thumbnail ( $size ) {
		if( !is_single() && has_post_thumbnail() && !post_password_required() || !has_post_format( 'image' ) ) : ?>
			<figure class="post-thumbnail"><?php the_post_thumbnail( $size ); ?></figure>
		<?php endif;
	}
}

//----------------------------------------------------------
// Set entry header
if( !function_exists( 'vi_theme_entry_header' ) ) {
	function vi_theme_entry_header () {
		if( is_single() ) : ?>
			<h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h1>
		<?php else : ?>
			<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
		<?php endif;
	}
}

//----------------------------------------------------------
// Set entry meta
if( !function_exists( 'vi_theme_entry_meta' ) ) {
	function vi_theme_entry_meta() {
		if ( !is_page() ) : ?>
			<div class="entry-meta">
				<?php
				printf( __( '<span class="author">Post by %1$s', 'vi_theme' ),
					get_the_author() );

				printf( __( '<span class="date-published"> at %1$s', 'vi_theme' ),
					get_the_date() );

				printf( __( '<span class="category"> in %1$s ', 'vi_theme' ),
					get_the_category_list( ',' ) );

				if ( comments_open() ) :
					echo '<span class="meta-reply">';
					comments_popup_link(
						__( 'Leave a comment', 'vi_theme' ),
						__( 'One comment', 'vi_theme' ),
						__( '% comments', 'vi_theme' ),
						__( 'Read all comments', 'vi_theme' )
					);
					echo '</span>';
				endif;
				?>
			</div>
		<?php endif;
	}
}

//----------------------------------------------------------
// Set entry content
if( !function_exists( 'vi_theme_entry_content' ) ) {
	function vi_theme_entry_content() {
		if( !is_single() && !is_page() ) {
			the_excerpt();
		} else {
			the_content();
			// Paging in single
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'vi_theme' ),
				'after'  => '</div>',
			) );
		}
	}
}

//----------------------------------------------------------
// Set entry tag
if( !function_exists( 'vi_theme_entry_tag' ) ) {
	function vi_theme_entry_tag() {
		if(has_tag()) :
			echo '<div class="entry-tag">';
			printf( __( 'Tagged in %1$s', 'vi_theme' ), get_the_tag_list('', ', ') );
		endif;
	}
}

//----------------------------------------------------------
// Readmore link
function vi_theme_readmore() {
	return '... <a class="read-more" href="'. get_permalink( get_the_ID() ) .'" title="'. __( 'Read more', 'vi_theme' ) .'">'. __( '[Read more]', 'vi_theme' ) .'</a>';
}
add_filter( 'excerpt_more', 'vi_theme_readmore' );

//----------------------------------------------------------
// function call Menu
if( !function_exists( 'vi_theme_menu' ) ) {
	function vi_theme_menu( $menu ) {
		$menu = array(
			'theme_location' => $menu,
			'container' => 'nav',
			'container_class' => $menu
		);
		wp_nav_menu( $menu );
	}
}










/**
 * Enqueue scripts and styles.
 */
function vi_theme_scripts() {
	// Register Bootstrap in theme
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/bootstrap/css/bootstrap.min.css');
	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/bootstrap/js/bootstrap.min.js', array('jquery'), '', true );

	wp_enqueue_style( 'vi-style', get_stylesheet_uri() );

	wp_enqueue_script( 'vi-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/js/modernizr.js', array( 'jquery' ), '2.6.1', true );

	wp_enqueue_script( 'vi-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'vi_theme_scripts' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

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
//require get_template_directory() . '/inc/customizer.php';

/**
 * Options additions.
 */
require get_template_directory() . '/inc/options.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

