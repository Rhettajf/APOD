<?php
/**
 * @package WordPress
 * @subpackage APOD-Wordpress-Theme
 * @since HTML5 Reset 2.0
 */
?>
<aside id="sidebar" data-role="panel" data-position="right" data-display="push" data-theme="a" data-swipe-close="true" role="complementary" aria-hidden="true">
<?php get_search_form(); ?>  
<div data-role="collapsible-set">
<div data-role="collapsible" data-theme="a" data-content-theme="e">	  
<h1>Explore</h1>
<?php
$cats = get_categories();
foreach ($cats as $cat) {
if($cat->parent == 0 ){
$cat_id= $cat->term_id;
$cat_link = get_category_link( $cat_id );
echo '<div data-role="collapsible" data-theme="e" data-content-theme="e"><h2>' .$cat->name. '</h2><ul data-role="listview"> ';
query_posts("cat=$cat_id&showposts=5");					
wp_list_categories('orderby=id&show_option_none=&show_count=0&title_li=&child_of='.$cat_id); ?>
<li data-theme="c" data-content-theme="c"><?php  echo '<a href="'.get_category_link($cat_id ).'">'. "Explore all " .$cat->name. '</a>'; ?></li>
</ul>
</div><!-- /collapsible -->
<?php }} // done the foreach statement ?>
</div>
</div>
<ul data-role="listview" data-inset="true">  	
<li data-role="list-divider" data-theme="a"><a href="<?php bloginfo('rss2_url'); ?>" rel="external" data-ajax="false"><h2>Subscribe (RSS)</h2></a></li>
</ul>
</aside>