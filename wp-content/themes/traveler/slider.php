<div id="page-wrap">
   <div class="slider-wrap">
      <div id="main-photo-slider" class="csw">
         <div class="panelContainer">
          <?php          
		  $news_cate = get_cat_id(__("Tin Tức Du Lịch","traveler"));
		  $tour_cate = get_cat_id(__("Tour đã đi","traveler"));		  
		  $recent = new WP_Query('cat='.$news_cate.','.$tour_cate.'&showposts=1'); 
		  while ($recent->have_posts()) : $recent->the_post();
          $title = get_the_title();   
          ?>
           <div class="panel" title="<?php echo $title ?>"> <!--- Panel 1 starts -->
              <div class="wrapper">            
				 <?php echo'<a href="'.get_permalink().'">'.featured_images($post->ID,'full').'</a>'; ?><div style="clear:both;"></div>
			<div class="photo-meta-data">
				 <a class="slider-title" title="Permanent Link to <?php the_title(); ?>" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a>
					<a class="fullarticle" href="<?php the_permalink();?>"></a>	
				 </div>
             </div>
          </div><!--- Panel 1 ends -->
		<?php endwhile; ?>
		<?php 
		$news_cate = get_cat_id(__("Tin Tức Du Lịch","traveler"));
		  $tour_cate = get_cat_id(__("Tour đã đi","traveler"));		  
		  $recent = new WP_Query('cat='.$news_cate.','.$tour_cate.'&showposts=1&offset=1'); 
		  while ($recent->have_posts()) : $recent->the_post();
          $title = get_the_title();   
		?>
		<div class="panel" title="<?php echo $title ?>">  <!--- Panel 2 starts -->
           <div class="wrapper">
              <?php echo'<a href="'.get_permalink().'">'.featured_images($post->ID,'full').'</a>'; ?><div style="clear:both;"></div>						
                <div class="photo-meta-data">
			   	   <a class="slider-title" title="Permanent Link to <?php the_title(); ?>" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a>
					  <a class="fullarticle" href="<?php the_permalink();?>"></a>	
				</div>
              </div>
           </div> <!--- Panel 2 ends -->
		<?php endwhile; ?>
        <?php 
		$news_cate = get_cat_id(__("Tin Tức Du Lịch","traveler"));
		  $tour_cate = get_cat_id(__("Tour đã đi","traveler"));		  
		  $recent = new WP_Query('cat='.$news_cate.','.$tour_cate.'&showposts=1&offset=2'); 
		  while ($recent->have_posts()) : $recent->the_post();
          $title = get_the_title();   
		?>
		<div class="panel" title="<?php echo $title ?>">   <!--- Panel 3 starts -->
           <div class="wrapper">
			  <?php echo'<a href="'.get_permalink().'">'.featured_images($post->ID,'full').'</a>';?> <div style="clear:both;"></div>						
			  <div class="photo-meta-data">
				 <a class="slider-title" title="Permanent Link to <?php the_title(); ?>" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a>
					<a class="fullarticle" href="<?php the_permalink();?>"></a>	
				 </div>
               </div>
            </div>
        <?php endwhile; ?> <!--- Panel 3 ends -->
        <?php 
		$news_cate = get_cat_id(__("Tin Tức Du Lịch","traveler"));
		  $tour_cate = get_cat_id(__("Tour đã đi","traveler"));		  
		  $recent = new WP_Query('cat='.$news_cate.','.$tour_cate.'&showposts=1&offset=3'); 
		  while ($recent->have_posts()) : $recent->the_post();
          $title = get_the_title();   
		?>
		<div class="panel" title="<?php echo $title ?>"> <!--- Panel 4 starts -->
           <div class="wrapper">
			 <?php echo'<a href="'.get_permalink().'">'.featured_images($post->ID,'full').'</a>';?> <div style="clear:both;"></div>
			 <div class="photo-meta-data">
			 	<a class="slider-title" title="Permanent Link to <?php the_title(); ?>" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a>
				   <a class="fullarticle" href="<?php the_permalink();?>"></a>	
				 </div>
               </div>
            </div>
        <?php endwhile; ?><!--- Panel 4 ends -->
	</div>
</div>
<div style="clear:both;"></div>
</div>    
</div>
