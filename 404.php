<?php get_header(); ?>

<div class="main">
	<div class="homepageFeed">
		<div class="headlineBox"><h3 class="columnTitle">404</h3>
	</div>
		<article class="mainPost">
			<h1>Sorry.</h1>
			<p>We can't seem to find the content you're looking for.</p>
			<p>Try the search box in the upper right, or try browsing our <a href="/forecasts">Forecast</a> or <a href="/issues">Issues</a> sections.</p>	 	
		</article>
	</div>

	<?php if ( is_active_sidebar( 'main_left' ) ) : ?>
		<div class="mainSidebarLeft widget-area" role="complementary">
			<?php dynamic_sidebar( 'main_left' ); ?>
		</div>
	<?php endif; ?>

	<?php if ( is_active_sidebar( 'main_right' ) ) : ?>
		<div class="mainSidebarRight widget-area" role="complementary">
			<?php dynamic_sidebar( 'main_right' ); ?>
		</div>
	<?php endif; ?>
</div>


<?php get_footer(); ?>