<?php get_header(); ?>
	<div class="middle_single"><!-- Single Blog Page Starts -->
		<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
			<div class="post_blog"><!-- Single Post -->
				<h1><a title="Permanent Link to <?php the_title(); ?>" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h1><br/><div style="clear:both"></div>	
				<div class="post_date"><!-- Metadata -->		
					<?php the_time('M') ?> - <?php the_time('d') ?> | <?php _e("By:","traveler");?> <?php the_author_posts_link(); ?> | <a href="<?php comments_link(); ?>"><?php comments_number(__("No comments","traveler"),__("1 comment","traveler"),__("% comments","traveler")); ?>.</a>					
				</div><br/>
					<div class="filed">			
						<?php _e("Filed under : ","traveler");?> <?php the_category(', ') ?></div><div style="clear:both">			
					</div><!-- Metadata Ends -->			 	 
				 		<div class="entry">	 		
							<?php the_content(__("Read more", 'traveler'));?>				 
						</div>
	  	<div style="clear:both;"></div>
					<?php endwhile; ?>	
					<?php endif; ?>		
			</div><!-- Single Post Ends -->		
				<div class="comment"><!-- Comments -->	
					<?php comments_template(); ?>	
				</div>
</div><!-- Single Blog Page Ends -->	
<?php get_sidebar(); ?>
<?php get_footer(); ?>