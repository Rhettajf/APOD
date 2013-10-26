<?php
/**
 * @package WordPress
 * @subpackage APOD-Wordpress-Theme
 * @since HTML5 Reset 2.0
 */
 get_header(); ?>
<div data-role="content">
<div class="row">
<?php if (have_posts()) : ?>

<form action="<?php bloginfo('siteurl'); ?>" id="searchform" data-theme="c" method="get" class="ui-icon-nodisc">
<input name="s" id="s" value="" data-theme="e" placeholder="<?php $key = wp_specialchars($s, 1); echo $key; ?>" type="search" data-theme="c" >
</form>
<ul data-role="listview" data-inset="true" data-theme="a">
<li data-role="list-divider" data-theme="a">
<h2 class="pagetitle">Search Results for <?php /* Search Count */ $allsearch = &new WP_Query("s=$s&showposts=-1"); $key = wp_specialchars($s, 1); $count = $allsearch->post_count; _e(''); _e('<span class="search-terms">'); echo $key; _e('</span>'); _e(' — '); echo $count . ' '; _e('APODs'); wp_reset_query(); ?></h2>
</li>
<?php query_posts($query_string . '&showposts=-1'); ?>
<?php while (have_posts()) : the_post(); ?>
<li <?php post_class() ?>><a href="<?php the_permalink() ?>">
<?php the_post_thumbnail('thumbnail');?>
<h2 id="post-<?php the_ID(); ?>"><?php the_title(); ?></h2>
<p><?php the_excerpt(); ?></p></a>
</li>
<?php endwhile; ?>
</ul>
<?php else : ?>
<h2><?php _e('Nothing Found','APOD'); ?> for <?php $key = wp_specialchars($s, 1); echo $key; ?>, search again</h2>
<?php get_search_form(); ?>

<?php endif; ?>

</div>
</div>
<style>
.search-terms { background-color:yellow; color:#000; text-shadow:none !important;}
</style>
<?php get_sidebar(); ?>
<?php get_footer(); ?>