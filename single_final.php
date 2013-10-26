<?php get_header(); ?>
<!-- OK AWESOME APOD LOOP FINAL -->
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<!-- START CONTENT -->
<article data-role="content" data-theme="a" <?php post_class() ?> id="post-<?php the_ID(); ?>">
    <div class="row"><!-- make it responsive -->
        <!-- TITLE -->
        <h2><?php the_title(); ?></h2>
        <!-- DATE -->
        <h5><?php the_time('F jS, Y') ?></h5>
        <!-- MEDIA -->
        <div class="entry">
            <?php // check if post format is video
            if( has_post_format(‘video’)){
                // if video get custom field embed
                echo get_post_meta($post->ID, 'video_url', true);
                // load rsw video script
                wp_register_script( 'video', get_bloginfo('template_directory') . '/_/js/video.js' );
                wp_enqueue_script( 'video' );
            } 	
            // check if post has thubnail
            else if ( has_post_thumbnail()) {  
                // if thumbnail link it to its attachment page
                echo '<a href="'.get_attachment_link( get_post_thumbnail_id() ).'">';
                // check if post format is image for gifs
                if( has_post_format(‘image’)){
                    // show original image
                    the_post_thumbnail(‘full’);
                } else {
                        // check if on mobile
                        if (is_mobile()) {
                            // show medium 400px image
                            the_post_thumbnail('medium');
                        } else {
                            // show 1024 px image
                            the_post_thumbnail('large');
                        } 
                    } // end else	
                    echo '</a>'; // close attachmentlink
            } // end else if ?> 
        </div> <!-- /entry MEDIA -->
        <!-- CONTENT collapsible -->  
        <div data-role="collapsible" class="entry" data-theme="a" data-content-theme="e" >
            <?php if (is_mobile()) { // mobile title?>
            <h3>Learn More.</h3>
            <?php } else { //Title ?>
            <h3>Learn more about <?php the_title(); ?>.</h3>
            <?php } ?>
            <p><?php the_content(); ?></p>
        </div><!-- /CONTENT collapsible -->                
<?php echo sharing_display(); ?>
    </div><!-- /row -->
</article><!-- /data-role="content" -->
<!-- /php and just in case msg" -->
<?php endwhile; ?><?php else : ?><h2><?php _e('Nothing Found','APOD'); ?></h2><?php endif; ?>
<!-- Side Panel" -->
<?php get_sidebar(); ?>
<!-- Footer for APOD NAV -->
<?php get_footer("post"); ?>