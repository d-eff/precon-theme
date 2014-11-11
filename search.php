<?php get_header(); ?>

<div class="subpage">
	<div class="normalpageFeed">
	<div class="headlineBox"><h3 class="columnTitle"><?php printf( __( 'Search Results for: %s' ), '<span>' . get_search_query() . '</span>'); ?></h3></div>

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<article class="mainPost">
			<?php echo get_avatar( get_the_author_meta( 'ID' ), 48 ); ?> 
			<h2 class="postTitle"><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
			<small class="postInfo"><?php the_author_posts_link(); ?> | <?php the_time('F jS, Y'); ?></small>

		 	<div class="entry">
		 		<?php the_excerpt(); ?>
		 	</div>
			<div class="postCategories">Categories: <?php the_category(', '); ?></div>
		</article>
	<?php endwhile; else : ?>
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