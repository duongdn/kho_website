<?php get_header(); ?>
	<div class="middle_single">
		<div class="post_sitemap"><br/>
			<h1><?php _e("Page not found! Please browse our sitemap to find your Article","traveler");?></h1><br/>
		<h2><?php _e("Sitemap:","traveler");?></h2><br/>
			<ul>
				<?php get_archives('postbypost', 100); ?>
			</ul><br/>
		</div>
	</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>