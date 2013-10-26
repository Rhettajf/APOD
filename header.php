<!doctype html>
<!--[if gt IE 9]><!--><html <?php language_attributes(); ?>><!--<![endif]-->
<head id="<?php echo of_get_option('meta_headid'); ?>" data-template-set="APOD">
<meta charset="<?php bloginfo('charset'); ?>">
<!--[if IE ]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
<?php if (is_search()) echo '<meta name="robots" content="noindex, nofollow" />'; ?>
<title>
 <?php if ( is_single() ) { bloginfo('description') ?> <?php the_time('F jS, Y'); } else { wp_title( '|', true, 'right' ); } ?>
 
</title>
<meta name="description" content="A different astronomy and space science
related image is featured each day, along with a brief explanation.">
<?php if (true == of_get_option('meta_author')) echo '<meta name="author" content="'.of_get_option("meta_author").'" />'; ?>	
<?php if (true == of_get_option('meta_google')) echo '<meta name="google-site-verification" content="'.of_get_option("meta_google").'" />'; ?>
<meta name="dcterms.rights" content="Copyright &copy; <?php bloginfo('name'); ?> <?php echo date('Y'); ?>. All Rights Reserved.">
<?php if (true == of_get_option('meta_viewport')) { 
echo '<meta name="viewport" content="'.of_get_option("meta_viewport").'" />';
} ?>	
<?php if (true == of_get_option('head_favicon')) {
echo '<link rel="shortcut icon" href="'.of_get_option("head_favicon").'" />';
} ?>
<?php if (true == of_get_option('head_apple_touch_icon')) {
echo '<link rel="apple-touch-icon" href="'.of_get_option("head_apple_touch_icon").'">';
}?>
<link rel="stylesheet" href="<?php bloginfo( 'template_directory' ); ?>/css/jquery.mobile.structure-1.3.0.min.css" />
<link rel="stylesheet" href="<?php bloginfo( 'template_directory' ); ?>/css/jqm.grid.css" />
<link rel="stylesheet/less" type="text/css" href="<?php bloginfo( 'template_directory' ); ?>/less/theme.less" />   
<?php if (true == of_get_option('meta_app_win_name')) {
echo '<meta name="application-name" content="'.of_get_option("meta_app_win_name").'" /> ';
echo '<meta name="msapplication-TileColor" content="'.of_get_option("meta_app_win_color").'" /> ';
echo '<meta name="msapplication-TileImage" content="'.of_get_option("meta_app_win_image").'" />';
} ?>
<?php if (true == of_get_option('meta_app_twt_card')) {
echo '<meta name="twitter:card" content="'.of_get_option("meta_app_twt_card").'" />';
echo '<meta name="twitter:site" content="'.of_get_option("meta_app_twt_site").'" />';
echo '<meta name="twitter:title" content="'.of_get_option("meta_app_twt_title").'">';
echo '<meta name="twitter:description" content="'.of_get_option("meta_app_twt_description").'" />';
echo '<meta name="twitter:url" content="'.of_get_option("meta_app_twt_url").'" />';
} ?>
<?php if (true == of_get_option('meta_app_fb_title')) {
echo '<meta property="og:title" content="'.of_get_option("meta_app_fb_title").'" />';
echo '<meta property="og:description" content="'.of_get_option("meta_app_fb_description").'" />';
echo '<meta property="og:url" content="'.of_get_option("meta_app_fb_url").'" />';
echo '<meta property="og:image" content="'.of_get_option("meta_app_fb_image").'" />';
} ?>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php wp_head(); ?>
<script>
$( document ).bind( 'mobileinit', function(){
  $.mobile.loader.prototype.options.text = "loading";
  $.mobile.loader.prototype.options.textVisible = false;
  $.mobile.loader.prototype.options.theme = "c";
  $.mobile.loader.prototype.options.html = "";
});
</script>
</head>

<body <?php body_class(); ?>>
<div id="wrapper" data-role="page" class="ui-responsive-panel" data-theme="a" role="document">
    <header id="header" data-role="header" data-theme="a" data-inline="true" role="banner" >
            <a href="http://apod.nasa.gov/apod/astropix.html" id="NASA" data-icon="custom" title="Click to return to NASA's APOD" data-ajax="false" class="ui-btn-left" data-iconpos="notext" data-theme="c">NASA</a>	
    <?php
$args = array( 'numberposts' => '1' );
$recent_posts = wp_get_recent_posts( $args );
$latest_post_id=$recent_posts[0]['ID']; ?>
        <?php if ($post->ID == $latest_post_id)  {
            if (is_mobile()) {?>
        <h1><?php bloginfo( 'name' ); ?></h1>
        <?php } else { ?>
        <h1><?php bloginfo( 'description' ); ?></h1>
        <?php } 
         } else {
            if (is_mobile()) {?>
        <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="Click to return home." data-ajax="false" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
        <?php } else { ?>
        <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="Click to return home." data-ajax="false" rel="home"><?php bloginfo( 'description' ); ?></a></h1>
        <?php } 
        } ?>      		
        <a href="http://apod.rhettforbes.com/search/" id="#searchbtn" title="Click to Search the index" data-ajax="true" data-icon="search" class="ui-btn-right" data-iconpos="notext" data-theme="c">Search</a>         
        <nav data-role="navbar" role="navigation">  
            <?php wp_nav_menu( array(
             'container' =>false,
             'menu_class' => 'nav',
             'echo' => true,
             'before' => '',
             'after' => '',
             'link_before' => '',
             'link_after' => '',
             'depth' => 0,
             'walker' => new data_type_walker())
             ); ?>
        </nav>
    </header>