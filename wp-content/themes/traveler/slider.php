<div id="page-wrap">
   <div class="slider-wrap">
      <div id="main-photo-slider" class="csw">
         <div class="panelContainer">
          <?php
          $slideshow = get_cat_id(__("Slideshow","traveler"));   
		  $recent = new WP_Query('cat='.$slideshow.'&showposts=1'); while ($recent->have_posts()) : $recent->the_post();
          $title = get_the_title();   
          ?>
           <div class="panel" title="<?php echo $title ?>"> <!--- Panel 1 starts -->
              <div class="wrapper">            
				 <?php echo'<a href="'.get_permalink().'">'.featured_images($post->ID,'full').'</a>'; ?><div style="clear:both;"></div>
				 	<div class="photo-meta-data">
						<a class="slider-title" title="Permanent Link to <?php the_title(); ?>" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a>
							<span class="slider-text"><?php echo slider_text($text); ?></span><a class="fullarticle" href="<?php the_permalink();?>"><?php _e("...more","traveler");?></a>	
					</div>
             </div>
          </div><!--- Panel 1 ends -->
		<?php endwhile; ?>
		<?php $slideshow = get_cat_id(__("Slideshow","traveler"));     $recent = new WP_Query('cat='.$slideshow.'&showposts=1&offset=1'); while ($recent->have_posts()) : $recent->the_post(); $title = get_the_title(); ?>
		<div class="panel" title="<?php echo $title ?>">  <!--- Panel 2 starts -->
           <div class="wrapper">
              <?php echo'<a href="'.get_permalink().'">'.featured_images($post->ID,'full').'</a>'; ?><div style="clear:both;"></div>						
                <div class="photo-meta-data">
			   	   <a class="slider-title" title="Permanent Link to <?php the_title(); ?>" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a>
					  <span class="slider-text"><?php echo slider_text($text); ?></span><a class="fullarticle" href="<?php the_permalink();?>"><?php _e("...more","traveler");?></a>	
				</div>
              </div>
           </div> <!--- Panel 2 ends -->
		<?php endwhile; ?>
        <?php $slideshow = get_cat_id(__("Slideshow","traveler"));     $recent = new WP_Query('cat='.$slideshow.'&showposts=1&offset=2'); while ($recent->have_posts()) : $recent->the_post(); $title = get_the_title(); ?>
        <div class="panel" title="<?php echo $title ?>">   <!--- Panel 3 starts -->
           <div class="wrapper">
			  <?php echo'<a href="'.get_permalink().'">'.featured_images($post->ID,'full').'</a>';?> <div style="clear:both;"></div>						
			  <div class="photo-meta-data">
				 <a class="slider-title" title="Permanent Link to <?php the_title(); ?>" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a>
					<span class="slider-text"><?php echo slider_text($text); ?></span><a class="fullarticle" href="<?php the_permalink();?>"><?php _e("...more","traveler");?></a>	
				 </div>
               </div>
            </div>
        <?php endwhile; ?> <!--- Panel 3 ends -->
        <?php $slideshow = get_cat_id(__("Slideshow","traveler"));     $recent = new WP_Query('cat='.$slideshow.'&showposts=1&offset=3'); while ($recent->have_posts()) : $recent->the_post(); $title = get_the_title(); ?>
        <div class="panel" title="<?php echo $title ?>"> <!--- Panel 4 starts -->
           <div class="wrapper">
			 <?php echo'<a href="'.get_permalink().'">'.featured_images($post->ID,'full').'</a>';?> <div style="clear:both;"></div>
			 <div class="photo-meta-data">
			 	<a class="slider-title" title="Permanent Link to <?php the_title(); ?>" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a>
				   <span class="slider-text"><?php echo slider_text($text); ?></span><a class="fullarticle" href="<?php the_permalink();?>"><?php _e("...more","traveler");?></a>	
				 </div>
               </div>
            </div>
        <?php endwhile; ?><!--- Panel 4 ends -->
	</div>
</div>
<div style="clear:both;"></div>
</div>
<div id="movers-row"><?php  $slideshow = get_cat_id(__("Slideshow","traveler"));$recent = new WP_Query('cat='.$slideshow.'&showposts=1'); while ($recent->have_posts()) : $recent->the_post();?>
<div>
	<?php echo'<a href="#1" class="cross-link">'.carousel_thumb($post->ID,'thumbnail').'</a>';  ?>
</div>
	<?php endwhile; ?>
	<?php  $slideshow = get_cat_id(__("Slideshow","traveler"));$recent = new WP_Query('cat='.$slideshow.'&showposts=1&offset=1'); while ($recent->have_posts()) : $recent->the_post();?>
     <div>
     <?php echo'<a href="#2" class="cross-link">'.carousel_thumb($post->ID,'thumbnail').'</a>';  ?>
     </div>
    <?php endwhile; ?>
    <?php  $slideshow = get_cat_id(__("Slideshow","traveler"));$recent = new WP_Query('cat='.$slideshow.'&showposts=1&offset=2'); while ($recent->have_posts()) : $recent->the_post();?>
    <div>
    <?php echo'<a href="#3" class="cross-link">	'.carousel_thumb($post->ID,'thumbnail').'</a>';  ?>
	</div>
	<?php endwhile; ?>
	<?php  $slideshow = get_cat_id(__("Slideshow","traveler"));$recent = new WP_Query('cat='.$slideshow.'&showposts=1&offset=3'); while ($recent->have_posts()) : $recent->the_post();?>
    <div>
    <?php echo'<a href="#4" class="cross-link">	'.carousel_thumb($post->ID,'thumbnail').'</a>';  ?>
	</div><?php endwhile; ?>
     </div>
  </div>
<div style="clear:both;"></div>