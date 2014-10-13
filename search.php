<?php get_header(); ?>

<?php if ( is_active_sidebar( 'main_left' ) ) : ?>
	<div class="mainSidebarLeft widget-area" role="complementary">
		<?php dynamic_sidebar( 'main_left' ); ?>
	</div>
<?php endif; ?>

<h2><?php printf( __( 'Search Results for: %s' ), '<span>' . get_search_query() . '</span>'); ?></h2>


<?php get_footer(); ?>

