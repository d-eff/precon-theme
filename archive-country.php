<?php get_header(); ?>

<?php if ( is_active_sidebar( 'countries_left' ) ) : ?>
	<div class="mainSidebarLeft widget-area" role="complementary">
		<?php dynamic_sidebar( 'countries_left' ); ?>
	</div>
<?php endif; ?>

<div class="normalpageFeed">
<div class="headlineBox"><h3 class="columnTitle">Country Analysis</h3></div>
<?php build_i_world_map(2); ?>

</div>



<?php get_footer(); ?>

