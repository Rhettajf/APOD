<?php
/**
 * @package WordPress
 * @subpackage APOD-Wordpress-Theme
 * @since HTML5 Reset 2.0
 */
 get_header(); ?>
<div data-role="content">
<div class="row">
<ul data-role="listview" data-theme="e" data-inset="true">

<li data-role="list-divider" data-theme="a">
<?php if (have_posts()) : ?>

	<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
    
    <?php /* If this is a category archive */ if (is_category()) { ?>
        <h2>Archive for the &#8216;<?php single_cat_title(); ?>&#8217; Category</h2>
    
    <?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
        <h2>Posts Tagged &#8216;<?php single_tag_title(); ?>&#8217;</h2>
    
    <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
        <h2>Archive for <?php the_time('F jS, Y'); ?></h2>
    
    <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
        <h2>Archive for <?php the_time('F, Y'); ?></h2>
    
    <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
        <h2 class="pagetitle">Archive for <?php the_time('Y'); ?></h2>
    
    <?php /* If this is an author archive */ } elseif (is_author()) { ?>
        <h2 class="pagetitle">Author Archive</h2>
    
    <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
        <h2 class="pagetitle">Blog Archives</h2>
			
<?php } ?>
</li>      

<?php while (have_posts()) : the_post(); ?>
			
<li <?php post_class() ?>><a href="<?php the_permalink() ?>">
    <?php the_post_thumbnail('thumbnail');?>
    <h2 id="post-<?php the_ID(); ?>"><?php the_title(); ?></h2>
    <p><?php the_time('F jS, Y') ?></p></a>
</li>

<?php endwhile; ?>

</ul>
</div>	
</div>	
<?php else : ?>
<h2><?php _e('Nothing Found','APOD'); ?></h2>

<?php endif; ?>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
