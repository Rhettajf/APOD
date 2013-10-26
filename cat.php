<?php
/**
 * @package WordPress
 * @subpackage APOD-Wordpress-Theme
  Template Name: Cat
 * @since HTML5 Reset 2.0
 */
 get_header(); ?>


 
<div data-role="content">
<div class="row">



 <?php
            // get all the categories from the database
            $cats = get_categories();
 
                // loop through the categries
                foreach ($cats as $cat) {
					if($cat->parent == 0 ){
                    // setup the cateogory ID
                    $cat_id= $cat->term_id;
					$cat_link = get_category_link( $cat_id );
                    // Make a header for the cateogry


echo '<div data-role="collapsible" data-theme="a" data-content-theme="e"><h3>' .$cat->name. '</h3><ul data-role="listview"> ';


echo '<li>'. category_description( $cat_id ) .'</li>';
                    // create a custom wordpress query
	        
					query_posts("cat=$cat_id&showposts=5");
                    // start the wordpress loop!
					

                    if (have_posts()) : while (have_posts()) : the_post(); ?>
 
                        <?php // create our link now that the post is setup ?>

                    

    
        <li data-theme="a" data-content-theme="a"><a href="<?php the_permalink() ?>">
        <?php the_post_thumbnail('thumbnail', array('title' => esc_attr( $post->post_title ))); ?>   
        <h2><?php the_title(); ?></h2>
        <p><?php the_time('F jS, Y') ?></p></a>
    </li>

                    <?php endwhile; endif; // done our wordpress loop. Will start again for each category ?>      


<?php wp_list_categories('orderby=id&show_option_none=&show_count=0&title_li=&child_of='.$cat_id); ?>

<li data-theme="c" data-content-theme="c"><?php  echo '<a href="'.get_category_link($cat_id ).'">'. "Explore all " .$cat->name. '</a>'; ?></li>		       


 </ul>
     </div><!-- /collapsible -->

                <?php }} // done the foreach statement ?>
                <?php get_search_form(); ?>
 </div>
    </div>

<?php get_footer(); ?>
