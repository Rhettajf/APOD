<?php
/**
 * @package WordPress
 * @subpackage HTML5-Reset-Wordpress-Theme
 * @since HTML5 Reset 2.0
 */
 get_header(); ?>
<div data-role="content">
<table data-role="table" id="movie-table" data-mode="reflow" class="ui-responsive table-stroke">
  <thead>
    <tr>
      <th data-priority="1">Date</th>
      <th data-priority="persist">Image</th>
      <th data-priority="2">Year</th>
      <th data-priority="3">Item</th>
    </tr>
  </thead>
  <tbody>
		<?php if (have_posts()) : ?>


                

<?php while (have_posts()) : the_post(); ?>
    <tr <?php post_class() ?>>
      <th><?php the_time('Y, F, j') ?></th>
      <td><a href="<?php the_permalink() ?>"><?php the_post_thumbnail('thumbnail');?></a></td>
      <td><?php the_ID(); ?>"><?php the_title(); ?></td>
      <td><?php the_category(' '); ?></td>
    </tr>
    



			<?php endwhile; ?>

  </tbody>
</table>
	</div>		
	<?php else : ?>

		<h2><?php _e('Nothing Found','html5reset'); ?></h2>

	<?php endif; ?>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
