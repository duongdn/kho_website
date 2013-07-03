<div class="rightcol"><!-- Sidebar Starts -->
	<div class="my-weather">
	<?php if ( !function_exists('dynamic_sidebar')
        || !dynamic_sidebar() ) : ?>    
	<?php endif; ?>
	</div>	
	<div style="clear:both"></div>
	<h2  class="alth2r"><?php _e("Featured Video", "traveler"); ?></h2>
	<div class="video"><!-- Video Module -->
		<iframe width="298" height="222" frameborder="0" allowfullscreen="" src="http://www.youtube.com/embed/1lFBQaWtb-M">
		</iframe>
	</div><!-- Video Module Ends -->
				
	<div style="clear:both;"></div>		 		 		

	<h2  class="alth2r"><?php _e("Photo Gallery", "traveler"); ?></h2>
	
	<div class="gallery"><!-- gallery -->
 		<?php photo_gallery($post -> ID, 'thumbnail', 12);		
 		?>
	</div><!--gallery Ends-->
	<div style="clear:both;"></div>
</div><!-- Sidebar Ends -->