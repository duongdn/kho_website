<div style="clear:both;"></div>
<div id="footer">			
	<div id="footer_inner">
				<div id="footer_left">	
					<?php if ( !function_exists('dynamic_sidebar')
					      || !dynamic_sidebar(2) ) : ?>
					<?php endif; ?>	   
				</div>
				<div id="footer_center">				
					<?php if ( !function_exists('dynamic_sidebar')
					      || !dynamic_sidebar(3) ) : ?>
					<?php endif; ?>
				</div>
				<div id="footer_right">					
 					<?php if ( !function_exists('dynamic_sidebar')
				      	  || !dynamic_sidebar() ) : ?>
					<?php endif; ?>
				</div>
			<div style="clear:both"></div>
                  <?php wp_footer();?>

		</div>
	</div><div id="copyright">
	<p><a href="<?php get_bloginfo('url'); ?>"><?php echo get_bloginfo('name') ?></a> <?php _e("is powered by","khowebsite.net");?> <a href="http://www.khowebsite.net">khowebsite.net</a></p>
</div>
</div> <!-- Grid Ends -->  
</div> <!-- Layout Ends -->
</div> <!-- Background Pixel Ends -->
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/javascript/sfhover.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/javascript/jquery-1.2.6.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/javascript/jquery-easing-1.3.pack.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/javascript/jquery-easing-compatibility.1.2.pack.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/javascript/coda-slider.1.1.1.pack.js"></script>
<script type="text/javascript">
		var theInt = null;
		var $crosslink, $navthumb;
		var curclicked = 0;
		
		theInterval = function(cur){
			clearInterval(theInt);
			
			if( typeof cur != 'undefined' )
				curclicked = cur;
			
			$crosslink.removeClass("active-thumb");
			$navthumb.eq(curclicked).parent().addClass("active-thumb");
				$(".stripNav ul li a").eq(curclicked).trigger('click');
			
			theInt = setInterval(function(){
				$crosslink.removeClass("active-thumb");
				$navthumb.eq(curclicked).parent().addClass("active-thumb");
				$(".stripNav ul li a").eq(curclicked).trigger('click');
				curclicked++;
				if( 4 == curclicked )
					curclicked = 0;
				
			}, 3000);
		};
		
		$(function(){
			
			$("#main-photo-slider").codaSlider();
			
			$navthumb = $(".nav-thumb");
			$crosslink = $(".cross-link");
			
			$navthumb
			.click(function() {
				var $this = $(this);
				theInterval($this.parent().attr('href').slice(1) - 1);
				return false;
			});
			
			theInterval();
		});
	</script>
	<!--[if lt IE 7]>
 <script src="http://ie7-js.googlecode.com/svn/version/2.0(beta3)/IE7.js" 
 type="text/javascript">
 </script>
<![endif]-->
</body>
</html>