<?php
/**
 * @package WordPress
 * @subpackage APOD-Wordpress-Theme
  Template Name: Search
 * @since APOD 3.0
 */
 get_header(); ?>
<?php get_header(); ?>
<section data-role="content" data-theme="a" role="main" <?php post_class() ?> id="post-<?php the_ID(); ?>">
<article class="row">
<header>
<h2>Search</h2>
</header>
<?php get_search_form(); ?>  
</article><!-- /data-role="content" -->
</section>
<?php get_footer(); ?>