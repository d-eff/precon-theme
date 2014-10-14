<?php get_header(); ?>

<?php if ( is_active_sidebar( 'main_left' ) ) : ?>
	<div class="mainSidebarLeft widget-area" role="complementary">
		<?php dynamic_sidebar( 'main_left' ); ?>
	</div>
<?php endif; ?>

<div class="normalpageFeed">
<div class="headlineBox"><h3 class="columnTitle">Forecast</h3></div>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<article class="mainPost">
	<h2 class="postTitle"><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
	

 	<div class="entry">
 		<?php the_content(); ?>

 		<h3>House Analysis</h3>
 		<?php echo(get_post_meta($post->ID, "House", true)); ?>

 		<h3>Expert Analysis</h3>
 		<?php echo(get_post_meta($post->ID, "Expert", true)); ?>

 		<h3>Community Analysis</h3>
 		<?php echo(get_post_meta($post->ID, "Community", true)); ?>
 	</div>

	</article>
<?php endwhile; else : ?>
	<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>
</div>



<?php get_footer(); ?>