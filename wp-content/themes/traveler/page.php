<?php get_header(); ?>
	<div class="middle_single"> <!-- Page Starts -->
	<?php if (have_posts()) : ?>
	<?php $post = $posts[0];?>
	<?php while (have_posts()) : the_post(); ?>
		<div class="page"> <!-- Page Content -->	
			<h1><a title="Permanent Link to <?php the_title(); ?>" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h1>
				<div class="entry">		
					<?php the_content(__("Read more","traveler")); ?>                 
				</div>			
		</div><!-- Page Content Ends -->		
	<?php endwhile; ?>
	<?php else : ?>
	<h1 class="center"><?php _e("Not Found","traveler")?></h1>
<?php endif; ?>
</div><!-- Page Ends -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>