<?php get_header(); ?>
<article data-role="content" data-theme="a" <?php post_class() ?> id="post-<?php the_ID(); ?>">
    <div class="row">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<h2><?php the_title(); ?> </h2>
<h3<?php the_time('F jS, Y') ?></h3>
        <div class="entry">
            <?php 
            if( has_post_format(‘video’)){
                echo get_post_meta($post->ID, 'video_url', true);
                wp_register_script( 'video', get_bloginfo('template_directory') . '/_/js/video.js' );
                wp_enqueue_script( 'video' );
            } 	
            else if ( has_post_thumbnail()) {  
                echo '<a href="'.get_attachment_link( get_post_thumbnail_id() ).'">';
                if( has_post_format('image')){
                    the_post_thumbnail('full');
                } else {
                        if (is_mobile()) {
                            the_post_thumbnail('medium');
                        } else {
                            the_post_thumbnail('large');
                        } 
                    }
                    echo '</a>';
            } ?> 
        </div> <!-- /entry MEDIA -->
        <div data-role="collapsible" class="entry" data-theme="a" data-content-theme="e" role="button" aria-expanded="true">
			<?php if (is_mobile()) {?>
            <h4>Learn More.</h4>
            <?php } else {?>
            <h4>Learn more about <?php the_title(); ?>.</h4>
            <?php } ?>
            <?php the_content(); ?>
        </div><!-- /CONTENT collapsible -->                
<?php echo sharing_display(); ?>
<?php endwhile; ?><?php else : ?><h2><?php _e('Nothing Found','APOD'); ?></h2><?php endif; ?>
    </div><!-- /row -->
</article><!-- /data-role="content" -->
<?php get_footer("post"); ?>