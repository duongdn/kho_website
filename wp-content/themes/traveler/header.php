<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes('xhtml'); ?>>
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<meta name="robots" content="follow, all" />
<link rel="Shortcut Icon" href="<?php bloginfo('template_directory'); ?>/images/favicon.ico" type="image/x-icon" />
<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>
<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" />
<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/images-slider/slider.css" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/style.css" />	
<?php wp_get_archives('type=monthly&format=link'); ?>
<?php wp_head(); ?>
</head>
<body<?php if ( is_home() ) { ?> id="home"<?php } ?>>
<div id="pixel"><!--Background Pixel-->		
<div id="layout"><!--Page  starts-->		
<!--Logo-->
<div id="logo"><a href="<?php bloginfo('url');?>"><?php if ( !function_exists('show_logo')|| !show_logo() ) : ?></a>
<?php endif; ?></div>
<!--Logo-->
	<div id="header"><!--Header starts-->
		<div id="header_ad">
			<?php newThemeOptions_showHeaderBanner(); ?>	
     	</div>
		<div class="wrapper_right"><!--  Wrapper Right Starts-->
			<form class="searchform" method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
			<input type="text" name="s" value="<?php _e("Enter keywords and click 'Search'","traveler");?>" onclick="this.value='';" class="search_input" />
			<input type="submit" class="submit_button" value="<?php _e("Search","traveler");?>" /></form>
		</div><!-- Wrapper Right Ends-->		
	</div><!--Header ends-->		
		<div class="wrapper_left"><!-- Wrapper Left starts--> 					   			
   			<div id="menu_navigation"> <!-- Main Menu Starts-->
			<ul id="menu-one" class="menu">
			<li ><a href="<?php echo get_option('home'); ?>/" class="on"><?php _e("Home","traveler");?></a></li>
			<?php wp_list_pages('depth=1&sort_column=menu_order&title_li=' . __('') . '' ); ?>
 	  		</ul>  			
  		    </div> <!-- Main Menu Ends-->
  		    <div id="emptysubnav">
   				<?=newThemeOptions_categoriesSubmenu(true);?>
   			</div>
   				<div style="clear:both"></div>		  
		</div><!-- Wrapper Left Ends-->			
	<div style="clear:both"></div>  	  
<div id="grid"><!--  Grid  Starts-->