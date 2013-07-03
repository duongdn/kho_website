<?php get_header(); ?>
<div class="middle_single"><!-- Category Page -->	
	<?php if (have_posts()) : ?>
	<?php $post = $posts[0];?>
	<?php  if (is_month())  ?>
	<div style="padding:20px 0px 0px 20px;"><h1><?php single_cat_title(__("Mục: ","traveler")); ?></h1></div>
	<?php while (have_posts()) : the_post(); ?>
				<div class="post_blog"><!-- Category Page Posts -->
 				<h2><a title="Permanent Link to <?php the_title(); ?>" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
 				<div class="post_date"><!-- Metadata -->
					<?php the_time('M') ?> - <?php the_time('d') ?> | <?php _e("By: ","traveler");?> <?php the_author_posts_link(); ?> | <a href="<?php comments_link(); ?>" /><?php comments_number(__("No comments","traveler"),__("1 comment","traveler"),__("% comments","traveler")); ?></a>.</a>	
				</div><br/>
				 		<div class="entry">
							<?php the_content(__("Read more","traveler")); ?>	 
						</div>
	  				<div style="clear:both;"></div>
				<div class="filed">			
				<?php _e("Filed under : ","traveler");?> <?php the_category(', ') ?>
				</div><div style="clear:both">
		</div><!-- Metadata Ends -->
	<div class="pdivider"></div>
</div>
<?php endwhile; ?>
<div class="navigation">
			<div class="alignleft"><?php next_posts_link(__("&laquo; Older Entries","traveler")) ?></div>
			<div class="alignright"><?php previous_posts_link(__("Newer Entries &raquo;","traveler")) ?></div>
		</div>
<?php else : ?>
		<div style="padding:20px 0px 0px 20px;"><h1 class="center"><?php _e("Not Found","traveler");?></h1></div>
	<?php endif; ?>
</div><!-- Category Page Ends -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>