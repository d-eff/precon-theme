<?php get_header(); ?>

<?php if ( is_active_sidebar( 'main_left' ) ) : ?>
	<div class="mainSidebarLeft widget-area" role="complementary">
		<?php dynamic_sidebar( 'main_left' ); ?>
	</div>
<?php endif; ?>

<div class="homepageFeed">
<div class="headlineBox"><h3 class="columnTitle">What Matters</h3></div>


<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<article class="mainPost">
	<h2 class="postTitle"><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
	<small><?php the_author_posts_link(); ?> | <?php the_time('F jS, Y'); ?></small>

 	<div class="entry">
 		<?php the_content(); ?>
 	</div>

	</article>

<?php endwhile; else : ?>
	<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>
</div>


<?php if ( is_active_sidebar( 'main_right' ) ) : ?>
	<div class="mainSidebarRight widget-area" role="complementary">
		<?php dynamic_sidebar( 'main_right' ); ?>
	</div>
<?php endif; ?>

<?php get_footer(); ?>

