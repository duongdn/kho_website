<div class="rightcol"><!-- Sidebar Starts -->
	
	 <div style="clear:both;"></div>
	
	 <h2  class="alth2r"><?php _e("Find Your Destination","traveler"); ?></h2>
		<div class="multisearch">
			<?php include (TEMPLATEPATH . '/multisearch.php'); ?>
		</div>
			<div style="clear:both;"></div>
			
									<h2  class="alth2r"><?php _e("Most Commented Articles","traveler"); ?></h2>
 											
							<?php if (function_exists('yg_recentcommentedposts')) { ?>
		<div class="most_commented"><!-- Most Commented -->							
 
 
    <?php
$parameters = array(
    'limit' => 5, //Number of posts to show
    'excerpt' => 0,  //excerpt length (letters)
    'cusfield' => 'thumbnail', //custom field name of thumbnail image
    'w' => 35,  //width
    'h' => 35, //height
    'firstimage' => false,  //get first image of post content
    'atimage' => true, //get first attached image of post
    'defimage' => 'http://www.yakupgovler.com/default.jpg' //default thumbnail image
);
    //print most recent posts
    yg_recentcommentedposts($parameters);
   ?>

 <br/>
 </div><!-- Most Commented Ends -->
<?php } ?>
						
					<div style="clear:both"></div>
			
			
				<h2  class="alth2r"><?php _e("Featured Video","traveler"); ?></h2>
					<div class="video"><!-- Video Module -->
						<iframe width="300" height="222" frameborder="0" allowfullscreen="" src="http://www.youtube.com/embed/1lFBQaWtb-M">
						</iframe>
					</div><!-- Video Module Ends -->
								
	 				<div style="clear:both;"></div>		 		 		

					<h2  class="alth2r"><?php _e("Photo Gallery","traveler"); ?></h2>
					<?php
					$gallery = get_cat_id(__("gallery","traveler")); 
					$my_query = new WP_Query('cat='.$gallery.'&showposts=1');
					while ($my_query->have_posts()) : $my_query->the_post();
					?>	
		<div class="gallery"><!-- gallery -->
	 		<?php photo_gallery($post->ID,'thumbnail', 12); 
	 		endwhile;
	 		?>
		</div><!--gallery Ends-->
	<div style="clear:both;"></div>
</div><!-- Sidebar Ends -->