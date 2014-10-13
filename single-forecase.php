<?php get_header(); ?>

<?php if ( is_active_sidebar( 'main_left' ) ) : ?>
	<div class="mainSidebarLeft widget-area" role="complementary">
		<?php dynamic_sidebar( 'main_left' ); ?>
	</div>
<?php endif; ?>

<div class="normalpageFeed">
<div class="headlineBox"><h3 class="columnTitle"><?php the_title(); ?></h3></div>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<article class="mainPost">
	
	

 	<div class="entry">
 		<?php the_content(); ?>
 	</div>

<?php $post_categories = wp_get_post_categories( $post->ID );
echo($post_categories);

?>

	</article>
<?php endwhile; else : ?>
	<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>
</div>



<?php get_footer(); ?>

