<?php
/**
 * @package WordPress
 * @subpackage APOD-Wordpress-Theme
 * @since HTML5 Reset 2.0
 */
?><!doctype html>
<!--[if gt IE 9]><!--><html <?php language_attributes(); ?>><!--<![endif]-->
<head id="<?php echo of_get_option('meta_headid'); ?>" data-template-set="APOD">
<meta charset="<?php bloginfo('charset'); ?>">
	<?php if (is_search()) echo '<meta name="robots" content="noindex, nofollow" />'; ?>
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<meta name="title" content="<?php wp_title( '|', true, 'right' ); ?>">
	<meta name="description" content="<?php bloginfo('description'); ?>" />
	<!--Google will often use this as its description of your page/site. Make it good.-->
	<?php if (true == of_get_option('meta_author')) echo '<meta name="author" content="'.of_get_option("meta_author").'" />'; ?>	
	<?php if (true == of_get_option('meta_google')) echo '<meta name="google-site-verification" content="'.of_get_option("meta_google").'" />'; ?>
	<meta name="Copyright" content="Copyright &copy; <?php bloginfo('name'); ?> <?php echo date('Y'); ?>. All Rights Reserved.">
	<?php if (true == of_get_option('meta_viewport')) {
	echo '<meta name="viewport" content="'.of_get_option("meta_viewport").'" />';
	echo '<!--  Mobile Viewport Fix
	j.mp/mobileviewport & davidbcalhoun.com/2010/viewport-metatag 
	device-width : Occupy full width of the screen in its current orientation
	initial-scale = 1.0 retains dimensions instead of zooming out if page height > device height
	maximum-scale = 1.0 retains dimensions instead of zooming in if page width < device width
	-->';
	} ?>	
	<?php if (true == of_get_option('head_favicon')) {
	echo '<link rel="shortcut icon" href="'.of_get_option("head_favicon").'" />';
	echo '<!-- This is the traditional favicon.
		 - size: 16x16 or 32x32
		 - transparency is OK
		 - see wikipedia for info on browser support: http://mky.be/favicon/ -->';
	} ?>
	<?php if (true == of_get_option('head_apple_touch_icon')) {
	echo '<link rel="apple-touch-icon" href="'.of_get_option("head_apple_touch_icon").'">';
	echo '<!-- The is the icon for iOS Web Clip.
		 - size: 57x57 for older iPhones, 72x72 for iPads, 114x114 for iPhone4 retina display (IMHO, just go ahead and use the biggest one)
		 - To prevent iOS from applying its styles to the icon name it thusly: apple-touch-icon-precomposed.png
		 - Transparency is not recommended (iOS will put a black BG behind the icon) -->';
	} ?>
	<!-- concatenate and minify for production -->
	<link rel="stylesheet" href="<?php bloginfo( 'template_directory' ); ?>/css/jquery.mobile.structure-1.3.0.min.css" />
    <link rel="stylesheet" href="<?php bloginfo( 'template_directory' ); ?>/css/jqm.grid.css" />
	<link rel="stylesheet/less" type="text/css" href="<?php bloginfo( 'template_directory' ); ?>/less/theme.less" />   
	<!-- Application-specific meta tags -->
	<?php if (true == of_get_option('meta_app_win_name')) {
	echo '<!-- Windows 8 -->';
	echo '<meta name="application-name" content="'.of_get_option("meta_app_win_name").'" /> ';
	echo '<meta name="msapplication-TileColor" content="'.of_get_option("meta_app_win_color").'" /> ';
	echo '<meta name="msapplication-TileImage" content="'.of_get_option("meta_app_win_image").'" />';
	} ?>
	<?php if (true == of_get_option('meta_app_twt_card')) {
	echo '<!-- Twitter -->';
	echo '<meta name="twitter:card" content="'.of_get_option("meta_app_twt_card").'" />';
	echo '<meta name="twitter:site" content="'.of_get_option("meta_app_twt_site").'" />';
	echo '<meta name="twitter:title" content="'.of_get_option("meta_app_twt_title").'">';
	echo '<meta name="twitter:description" content="'.of_get_option("meta_app_twt_description").'" />';
	echo '<meta name="twitter:url" content="'.of_get_option("meta_app_twt_url").'" />';
	} ?>
	<?php if (true == of_get_option('meta_app_fb_title')) {
	echo '<!-- Facebook -->';
	echo '<meta property="og:title" content="'.of_get_option("meta_app_fb_title").'" />';
	echo '<meta property="og:description" content="'.of_get_option("meta_app_fb_description").'" />';
	echo '<meta property="og:url" content="'.of_get_option("meta_app_fb_url").'" />';
	echo '<meta property="og:image" content="'.of_get_option("meta_app_fb_image").'" />';
	} ?>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="wrapper" data-role="page" class="ui-responsive-panel" data-theme="a">
<?php echo wp_get_attachment_image( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
<footer id="footer" data-role="footer" data-theme="a" data-fullscreen="true" data-position="fixed" data-tap-toggle="true" class="source-org vcard copyright">
<div class="row">
<!-- the buttons! -->
<div class="six column"><a href="<?php echo get_permalink($post->post_parent); ?>" data-role="button" data-theme="c" data-icon="back" title="Click to return to APOD.">Back</a></div>
<div class="six column">
 <?php $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full');
   echo '<a data-role="button" data-theme="c" data-ajax="false" href="' . $large_image_url[0] . '" title="Click to download the highest resolution version available.">';?>
    Download</a>
    </div>
</div>
</footer>
<script src="<?php bloginfo('template_directory'); ?>/_/js/functions.js"></script>
<script>
jQuery(window).load(function($) {
 });
</script>
</div>
</body>
</html>