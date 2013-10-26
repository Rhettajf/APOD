<?php
/**
 * @package WordPress
 * @subpackage HTML5-Reset-Wordpress-Theme
 * @since HTML5 Reset 2.0
 */
 get_header(); ?>
<article data-role="content" data-theme="a">
<div class="row">

	<h2><?php _e('Error 404 - Page Not Found','html5reset'); ?></h2>
    <h3>Return to today's <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'description' ); ?></a></h3>
    <?php get_search_form(); ?>
    </div>
    </article>

<?php get_sidebar(); ?>

<?php get_footer(); ?>