<?php get_header(); ?>

<div class="main">
	<div class="homepageFeed">
		<div class="headlineBox"><h3 class="columnTitle">What Matters</h3></div>
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); 
			get_template_part( 'content', 'article' );
		endwhile; else : ?>
		<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
	<?php endif; ?>
	<?php
	global $wp_query;

	$big = 999999999; // need an unlikely integer

	echo paginate_links( array(
		'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
		'format' => '?paged=%#%',
		'current' => max( 1, get_query_var('paged') ),
		'total' => $wp_query->max_num_pages,
	        'before_page_number' => '[',
	        'after_page_number' => ']'
	) );
	?>


	</div>


	<?php if ( is_active_sidebar( 'main_left' ) ) : ?>
		<div class="mainSidebarLeft widget-area" role="complementary">
			<?php dynamic_sidebar( 'main_left' ); ?>
		</div>
	<?php endif; ?>

	<?php if ( is_active_sidebar( 'main_right' ) ) : ?><div class="mainSidebarRight widget-area" role="complementary">
			<?php dynamic_sidebar( 'main_right' ); ?>
		</div>
	<?php endif; ?>
</div>

<?php get_footer(); ?>

