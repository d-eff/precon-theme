<?php 

get_header(); ?>

<div class="subpage">
	<div class="normalpageFeed">
		<div class="headlineBox"><h3 class="columnTitle">Current Issues</h3></div>

		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<article class="mainPost">
			<h2 class="postTitle"><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
			
			<?php $excerpt = get_post_meta( $post->ID, 'excerpt', true ); 
			if(!empty($excerpt)): ?>
		 	<div class="entry">
		 		<?php echo $excerpt; ?>
		 	</div>
		 <?php endif; ?>

			</article>
		<?php endwhile; else : ?>
			<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
		<?php endif; ?>
	</div>

	<div class="mainSidebarLeft widget-area" role="complementary">
		<?php if ( is_active_sidebar( 'main_left' ) ) {
			dynamic_sidebar( 'main_left' ); 
		}?>
	</div>
</div>

<?php get_footer(); ?>
