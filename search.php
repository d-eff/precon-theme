<?php get_header(); ?>

<div class="subpage">
	<div class="normalpageFeed">
	<div class="headlineBox"><h3 class="columnTitle"><?php printf( __( 'Search Results for: %s' ), '<span>' . get_search_query() . '</span>'); ?></h3></div>

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post();
		get_template_part( 'content', 'article' );
	endwhile; else : ?>
		<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
	<?php endif; ?>

	</div>

	<?php if ( is_active_sidebar( 'main_left' ) ) : ?>
		<div class="mainSidebarLeft widget-area" role="complementary">
			<?php dynamic_sidebar( 'main_left' ); ?>
		</div>
	<?php endif; ?>
</div>

<?php get_footer(); ?>