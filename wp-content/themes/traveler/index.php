<?php get_header(); ?>
<div id="leftcol">
	<div id="featured">
		<?php include(TEMPLATEPATH . '/slider.php'); ?>
	</div>
		<div id="sidebar_left">
			<div id="container_left">
				<h2 class="alth2r"><?php _e("Hot Spots","traveler"); ?></h2>
					<div class="random_post">
						<?php 
						$post = $wp_query->post;
						$show = get_settings($shortname."_randomCategoryPosts");
						$video = get_cat_id(__("video","traveler")); 
						$gallery = get_cat_id(__("gallery","traveler")); 
						$slideshow = get_cat_id(__("Slideshow","traveler"));   
						$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
						$limit = get_settings('posts_per_page');
						$my_query = new WP_Query('cat=-'.$video.',-'.$slideshow.',-'.$gallery.',' .$show .'&showposts=3');
						while ($my_query->have_posts()) : $my_query->the_post();
						$wp_query->in_the_loop = true;
						if ( $post->ID == $do_not_duplicate ) continue;
						update_post_caches($posts);
					$do_not_duplicate = $post->ID; 
						?>
						<div class="left_posts">
							<div class="photo"><?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) 
									{
										echo '<a href="'.get_permalink().'">'.get_the_post_thumbnail($id,array('110,80')).'</a>';
									 } else {
												echo'<a href="'.get_permalink().'">'.home_thumbs($post->ID,'thumbnail').'</a>'; 
												}?>
							</div>
							<a class="posts_link" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a><br/><br/>
					<?php $permalink = get_permalink();
					 	  echo hot_spots($text);
					 	 ?>
					 	  <a class="readmore" href="<?php $permalink;?>"><?php _e("...more","traveler");?></a>				
	 	  			</div>
			<div style="clear:both;"></div>	
		<?php endwhile; ?>		
	</div>
<div style="clear:both"></div>
</div><!-- Random Left Posts Ends -->          	
<!--Banner 300x250 -->
	<?php 	newThemeOptions_showBigBanner();?>
<!--Banner 300x250 Ends -->
<div style="clear:both;"></div>
 			
</div><!-- Sidebar Left Ends -->
<div id="middle"><!-- Midle Section -->
	<h2  class="alth2m"><?php _e("Travel News","traveler"); ?></h2>
	<?php 
		$post = $wp_query->post;
		$show = get_settings($shortname."_homePostCategory");
		$noshow = get_settings($shortname."_randomCategoryPosts");
		$video = get_cat_id(__("Video","traveler")); 
		$gallery = get_cat_id(__("gallery","traveler")); 
		$slideshow = get_cat_id(__("Slideshow","traveler"));   
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		$limit = get_settings('posts_per_page');
		$my_query = new WP_Query('cat=-'.$video.',-'.$slideshow.',-'.$gallery.',-' .$show .',-' .$noshow .'&showposts='.$limit.'&paged=' . $paged);
		while ($my_query->have_posts()) : $my_query->the_post();
		$wp_query->in_the_loop = true;
		if ( $post->ID == $do_not_duplicate ) continue;
		update_post_caches($posts);
		$do_not_duplicate = $post->ID;
		?>
		<div class="post_middle"><!-- Posts Midle Section -->
			<h2><a  class="posts_link" title="Permanent Link to <?php the_title(); ?>" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>	
				<div class='photo'>
					 <?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) 
									{
										echo '<a href="'.get_permalink().'">'.get_the_post_thumbnail($id,array('110,80')).'</a>';
									 } else {
												echo'<a href="'.get_permalink().'">'.home_thumbs($post->ID,'thumbnail').'</a>'; 
							}?>
				</div>			 	
		<div class="entry">
			<?php $permalink = get_permalink();
				echo limit_content($text);
				?>
			 <a class="readmore" href="<?php $permalink;?>"><?php _e("...more","traveler");?></a><br/><br/>
			 <span style="float:right;"><img alt="comments" src="<?php bloginfo('template_directory'); ?>/images/comments_grey-trans.png"/>
			 <a href="<?php comments_link(); ?>"><?php comments_number(__("No comments","traveler"),__("1 comment","traveler"),__("% comments","traveler")); ?></a></span>
			</div>
		</div><!-- Posts Midle Section Ends -->
<?php endwhile; ?>	
</div><!-- Midle Section Ends -->
</div><!-- Left Column Section Ends -->
<?php get_sidebar();?>	
<?php get_footer();?>