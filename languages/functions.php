<?php
/**
 * @package WordPress
 * @subpackage APOD-Wordpress-Theme
 * @since HTML5 Reset 2.0
 */

	// Options Framework (https://github.com/devinsays/options-framework-plugin)
	if ( !function_exists( 'optionsframework_init' ) ) {
		define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/_/inc/' );
		require_once dirname( __FILE__ ) . '/_/inc/options-framework.php';
	}

	// Theme Setup (based on twentythirteen: http://make.wordpress.org/core/tag/twentythirteen/)
	function APOD_setup() {
		load_theme_textdomain( 'APOD', get_template_directory() . '/languages' );
		add_theme_support( 'automatic-feed-links' );	
		add_theme_support( 'structured-post-formats', array( 'link' ) );
		add_theme_support( 'post-formats', array( 'image', 'video' ) );
		register_nav_menu( 'primary', __( 'Navigation Menu', 'APOD' ) );
		add_theme_support( 'post-thumbnails' );
	}
	
	add_action( 'after_setup_theme', 'APOD_setup' );
	
	
	
	// Scripts & Styles
	
		// Load jQuery
function my_scripts_method() {
    wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', get_template_directory_uri() . '/_/js/jquery-1.9.1.min.js');
    wp_enqueue_script( 'jquery' );
}    

add_action('wp_enqueue_scripts', 'my_scripts_method');
	
function APOD_scripts_styles() {
global $wp_styles;

// Load Comments	
if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
wp_enqueue_script( 'comment-reply' );

wp_enqueue_script( 'APOD-Mobile', get_template_directory_uri() . '/_/js/jquery.mobile-1.3.0.min.js' );
wp_enqueue_script( 'APOD-Less', get_template_directory_uri() . '/_/js/less-1.3.3.min.js' );


// Load Stylesheets
//wp_enqueue_style( 'APOD-Mobile-Structure', get_template_directory_uri() . '/css/jquery.mobile.structure-1.3.0.min.css' );
//wp_enqueue_style( 'APOD-Mobile-Grid', get_template_directory_uri() . '/css/jqm.grid.css' );
//wp_enqueue_style( 'APOD-LESS', get_template_directory_uri() . '/less/theme.less' );

	}
	add_action( 'wp_enqueue_scripts', 'APOD_scripts_styles' );

// WP Title (based on twentythirteen: http://make.wordpress.org/core/tag/twentythirteen/)
	function APOD_wp_title( $title, $sep ) {
		global $paged, $page;
	
		if ( is_feed() )
			return $title;
	
// Add the site name.
		$title .= get_bloginfo( 'name' );
	
//Add the site description for the home/front page.
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) )
			$title = "$title $sep $site_description";
	
//Add a page number if necessary.
		if ( $paged >= 2 || $page >= 2 )
			$title = "$title $sep " . sprintf( __( 'Page %s', 'APOD' ), max( $paged, $page ) );

		return $title;
	}
	add_filter( 'wp_title', 'APOD_wp_title', 10, 2 );

//OLD STUFF BELOW

	// Clean up the <head>
	function removeHeadLinks() {
    	remove_action('wp_head', 'rsd_link');
    	remove_action('wp_head', 'wlwmanifest_link');
    }
    add_action('init', 'removeHeadLinks');

	// Custom Menu
	register_nav_menu( 'primary', __( 'Navigation Menu', 'APOD' ) );

	// Widgets
	function APOD_widgets_init() {
		register_sidebar( array(
			'name'          => __( 'Sidebar Widgets', 'APOD' ),
			'id'            => 'sidebar-primary',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
	}
	add_action( 'widgets_init', 'APOD_widgets_init' );

// APOD NEXT/PREV APOD NEXT/PREV APOD NEXT/PREV APOD NEXT/PREV APOD NEXT/PREV APOD NEXT/PREV 

// Filter previous_post_link and next_post_link for APODS 
 
function filter_next_post_link($link) {
    global $post;
    $post = get_post($post_id);
    $next_post = get_next_post();
    $title = mysql2date('d F Y', $next_post->post_date, false);
    $link = str_replace("rel=", 'title="' . $title . '" data-role="button" data-ajax="true" data-theme="c" data-icon="arrow-r" data-iconpos="right" rel=', $link);
    return $link;
}
add_filter('next_post_link', 'filter_next_post_link');

function filter_previous_post_link($link) {
    global $post;
    $post = get_post($post_id);
    $previous_post = get_previous_post();
    $title = mysql2date('d F Y', $previous_post->post_date, false);
    $link = str_replace("rel=", 'title="' . $title . '" data-role="button" data-ajax="false" data-theme="c" data-icon="arrow-l" rel=', $link);
    return $link;
}
add_filter('previous_post_link', 'filter_previous_post_link');

// DESKTOP APOD NAVIGATION!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
function post_navigation() {
	global $post;
// Don't print empty markup if there's nowhere to navigate.
$previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
$next = get_adjacent_post( false, '', false );
if ( ! $next && ! $previous )
return;
?>
<!-- the buttons! -->
<div class="six column"><?php previous_post_link( '%link', _x( '%title', 'Previous post link', 'APOD' ) ); ?></div>
<div class="six column"><?php next_post_link( '%link', _x( '%title', 'Next post link', 'APOD' ) ); ?></div>
<?php }

// MOBILE APOD NAVIGATION!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
function post_navigation_mobile() {
	global $post;
// Don't print empty markup if there's nowhere to navigate.
$previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
$next = get_adjacent_post( false, '', false );
if ( ! $next && ! $previous )
return;
?>
<!-- the buttons! -->

<div class="ui-grid-a">
    <div class="ui-block-a"><?php previous_post_link( '%link', _x('Prev', 'APOD' ) ); ?></div>
    <div class="ui-block-b"><?php next_post_link( '%link', _x('Next', 'APOD' ) ); ?></div>
</div><!-- /grid-a -->

<?php }

//Navigation Navigation Navigation Navigation Navigation Navigation Navigation Navigation 

//main menu
class data_type_walker extends Walker_Nav_Menu
{
      function start_el(&$output, $item, $depth, $args)
      {
           global $wp_query;
           $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

           $class_names = $value = '';

           $classes = empty( $item->classes ) ? array() : (array) $item->classes;

           $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
           $class_names = ' class="'. esc_attr( $class_names ) . '"';

           $output .= $indent . '<li>';

           $attributes  = ! empty( $item->attr_title ) ? ' title="'  	. esc_attr( $item->attr_title 		) .'"' : '';
           $attributes .= ! empty( $item->target )     ? ' target="' 	. esc_attr( $item->target     		) .'"' : '';
           $attributes .= ! empty( $item->url )        ? ' href="'   	. esc_attr( $item->url        		) .'"' : '';

           $prepend = '';
           $append = '';

           if($depth != 0)
           {
           $description = $append = $prepend = "";
           }

            $item_output = $args->before;
            $item_output .= '<a'. $attributes . 'id="menu-item-'. $item->ID . '"' . $value . $class_names .' data-theme="c">';
            $item_output .= $args->link_before .$prepend.apply_filters( 'the_title', $item->title, $item->ID ).$append;
            $item_output .= $description.$args->link_after;
            $item_output .= '</a>';
            $item_output .= $args->after;

            $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
            }
}

//menu item classes "ui-btn-active ui-state-persist"
function current_to_active($text){
        $replace = array(
                
                'current_page_item' => 'ui-btn-active ui-state-persist',
                'current_page_parent' => 'ui-btn-active ui-state-persist',
                'current_page_ancestor' => 'ui-btn-active ui-state-persist',
        );
        $text = str_replace(array_keys($replace), $replace, $text);
                return $text;
        }
		
		
add_filter ('wp_nav_menu','current_to_active');

// ARCHIVE ARCHIVE ARCHIVE ARCHIVE ARCHIVE ARCHIVE ARCHIVE ARCHIVE ARCHIVE ARCHIVE 

// Make archive big enough for a year.

function number_of_posts_on_archive($query){
    if ($query->is_archive) {
            $query->set('posts_per_page', 365);
   }
    return $query;
}
 
add_filter('pre_get_posts', 'number_of_posts_on_archive');


// Posted On date
	function posted_on() {
		printf( __( '<span class="sep">Posted </span><a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s" pubdate>%4$s</time></a> by <span class="byline author vcard">%5$s</span>', '' ),
			esc_url( get_permalink() ),
			esc_attr( get_the_time() ),
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_author() )
		);
	}
	

//filter archive by specific year/month/day

function takien_archive_where($where,$args){
    $year       = isset($args['year'])      ? $args['year']     : '';
    
    if($year){
        $where .= " AND YEAR(post_date) = '$year' ";
        $where .= $month ? " AND MONTH(post_date) = '$month' " : '';
        $where .= $day ? " AND DAY(post_date) = '$day' " : '';
    }
    return $where;
}
add_filter( 'getarchives_where','takien_archive_where',10,2);

remove_filter('term_description','wpautop');

function SearchFilter($query) {
if ($query->is_search) {
$query->set('post_type', 'post');
}
return $query;
}

add_filter('pre_get_posts','SearchFilter');
?>