<?php
/**
 * @package WordPress
 * @subpackage APOD-Wordpress-Theme
 * @since HTML5 Reset 2.0
 */
 get_header(); ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<article data-role="content" data-theme="a" <?php post_class() ?> id="post-<?php the_ID(); ?>">

<div class="row">
<h2><?php the_title(); ?> <span style=" float:right;"><?php the_time('F jS, Y') ?></span></h2>
<div class="entry">

 <?php 
  if ( has_post_thumbnail()) { ?>
  <a href="<?php echo get_attachment_link( get_post_thumbnail_id() ); ?>">
  <?php
	 if( has_post_format(‘image’)){
   the_post_thumbnail(‘full’);

}
   if (is_mobile()) {
	the_post_thumbnail('medium');
	} else {
   the_post_thumbnail('large');
} 

 } ?>  
 </a>
</div>
<div class="fb-like" data-href="<?php the_permalink(); ?>" data-send="true" data-layout="button_count" data-width="300" data-show-faces="true" data-font="arial" data-colorscheme="dark"></div>
<div data-role="collapsible-set">
<div data-role="collapsible" class="entry" data-theme="e" data-content-theme="e" >
<?php if (is_mobile()) { // mobile title?>
            <h3>Learn More.</h3>
            <?php } else { //Title ?>
            <h3>Learn more about <?php the_title(); ?>.</h3>
            <?php } ?>
            <p><?php the_content(); ?></p>
</div>
<div data-role="collapsible" class="entry" data-theme="c" data-content-theme="a" >
<h3>Join the Conversation</h3>
<p class="fb-comments" data-href="<?php the_permalink(); ?>" data-width="470" data-num-posts="10" data-colorscheme="dark"></p>
</div><!-- /CONTENT collapsible -->    
</div>   
 
<style>.fb_iframe_widget, .fb_iframe_widget span, .fb_iframe_widget span iframe[style] {
width: 100% !important;
margin: 0.2em 0;
}

</style>


</div>
</article>

	<?php endwhile; ?>


	<?php else : ?>

		<h2><?php _e('Nothing Found','APOD'); ?></h2>

	<?php endif; ?>

<?php get_sidebar(); ?>

<footer id="footer" data-role="footer" data-theme="a" data-position="fixed" data-tap-toggle="false" class="source-org vcard copyright">
<article data-role="content">
<div class="row">
<?php if (is_mobile()) {
post_navigation_mobile();
 } else {
post_navigation();
 } ?>
</div>
<small>&copy; <?php echo date("Y"); echo " "; bloginfo('name'); ?>: <i>a service of: <a href="http://astrophysics.gsfc.nasa.gov/">ASD</a> at <a href="http://www.nasa.gov/">NASA</a> <a href="http://www.nasa.gov/centers/goddard/">GSFC</a> &amp; <a href="http://www.mtu.edu/">MTU</a></i></small>
</article>
</footer>

	

<?php wp_footer(); ?>


<!-- here comes the javascript -->

<!-- jQuery is called via the Wordpress-friendly way via functions.php -->

<!-- this is where we put our custom functions -->
<style>
.ui-collapsible-content > .ui-listview {
    margin: -10px -16px -21px;
}
.ui-li-desc {white-space:normal;}​
</style>
<script src="<?php bloginfo('template_directory'); ?>/_/js/functions.js"></script>

</div>
</body>

</html>
