<?php
/**
 * @package WordPress
 * @subpackage APOD-Wordpress-Theme
 * @since HTML5 Reset 2.0
 */
 get_header(); ?>
<header id="subheader"  data-role="header" data-theme="a" data-inline="true" >
 <nav data-role="navbar">  
            <?php wp_nav_menu( array(
             'container' =>false,
			 'menu' => 'sub',
             'menu_class' => 'nav',
             'echo' => true,
             'before' => '',
             'after' => '',
             'link_before' => '',
             'link_after' => '',
             'depth' => 0,
             'walker' => new data_type_walker_sub())
             ); ?>
</nav>
</header>
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			
		<article data-role="content" data-theme="e" class="post" id="post-<?php the_ID(); ?>">
        <div class="row">

			<h2><?php the_title(); ?></h2>


			<div class="entry">

				<?php the_content(); ?>

				<?php wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); ?>

			</div>

			<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>
</div>
		</article>
		
		<?php endwhile; endif; ?>

<?php get_footer(); ?>
