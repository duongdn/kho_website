<?php get_header(); ?>
<div class="middle_single"><!-- Single Archive Page Starts -->
	<?php if (have_posts()) : ?><?php $post = $posts[0];?>
	  <?php  if (is_month())  ?>
	  	<h2 class="month_metadata"><?php _e("Archive for ","traveler");?> <?php the_time('F, Y'); ?></h2>
  	  <?php while (have_posts()) : the_post(); ?>
	<div class="post_blog"><!-- Single Post -->
				<h2><a title="Permanent Link to <?php the_title(); ?>" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2><br/><div style="clear:both"></div>
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
	</div><!-- Single Post Ends -->			
<?php endwhile; ?>
		<div class="navigation">
			<div class="alignleft"><?php next_posts_link(__("&laquo; Older Entries","traveler")) ?></div>
			<div class="alignright"><?php previous_posts_link(__("Newer Entries &raquo;","traveler")) ?></div>
		</div>
		<?php else : ?>
		<h2 class="center"><?php _e("Not Found","traveler")?></h2>
		<?php endif; ?>
</div><!-- Single Archive Page Ends -->	
<?php get_sidebar(); ?>
<?php get_footer(); ?>