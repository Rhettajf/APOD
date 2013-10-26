<?php get_header(); ?>

<section data-role="content" data-theme="a" role="main" <?php post_class() ?> id="post-<?php the_ID(); ?>">
<article class="row">
<header>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<h2><?php the_title(); ?> </h2>
<h3><?php the_time('F jS, Y') ?></h3>
</header>
            <?php 
            if( has_post_format(‘video’)){
                echo get_post_meta($post->ID, 'video_url', true);
                wp_register_script( 'video', get_bloginfo('template_directory') . '/_/js/video.js' );
                wp_enqueue_script( 'video' );
            } 	
            else if ( has_post_thumbnail()) {  
                echo '<a href="'.get_attachment_link( get_post_thumbnail_id() ).'" title="See Explanation below or click to view full image" tab-index="6">';
				$title=get_the_title();
				

                if( has_post_format('image')){
                    the_post_thumbnail('full',array( 'alt' =>$title));
                } else {
                        if (is_mobile()) {
                            the_post_thumbnail('medium',array( 'alt' =>$title));
                        } else {
                            the_post_thumbnail('large',array( 'alt' =>$title));
                        } 
                    }
                    echo '</a>';
            } ?> 
        <div data-role="collapsible" class="entry" data-theme="a" data-content-theme="e" role="article" title="Click to expand/collapse Explanation">
            <h4>Explanation</h4>   
            <?php the_content(); ?>
        </div><!-- /CONTENT collapsible -->                
<?php echo sharing_display(); ?>
<?php endwhile; ?><?php else : ?><h2><?php _e('Nothing Found','APOD'); ?></h2><?php endif; ?>
</article><!-- /data-role="content" -->
</section>
<?php get_footer("post"); ?>