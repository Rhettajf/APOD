<?php
/**
 * @package WordPress
 Template Name: Archives FULL
 * @subpackage APOD-Wordpress-Theme
 * @since HTML5 Reset 2.0
 */
 get_header(); ?>
<div data-role="content">
	<div class="row">
		<div data-role="collapsible-set">
	
<?php 
$args = array(
    'type'            => 'monthly',
    'echo'            => 0,
    'year'       => '2013'
);
$args2 = array(
    'type'            => 'monthly',
    'echo'            => 0,
    'year'       => '2012'
);
$args3 = array(
    'type'            => 'monthly',
    'echo'            => 0,
    'year'       => '2011'
);
echo '<div data-role="collapsible" data-theme="a" data-content-theme="e" data-collapsed="false"><h3>2013</h3><ul data-role="listview">';
echo wp_get_archives($args);
echo '</ul></div>';
echo '<div data-role="collapsible" data-theme="a" data-content-theme="e"><h3>2012</h3><ul data-role="listview">';
echo wp_get_archives($args2);
echo '</ul></div>';
?>

		</div>
	</div>
</div>

<?php get_footer(); ?>
