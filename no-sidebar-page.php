<?php 
/*
Template Name: No Sidebar Page
*/
get_header(); ?>

<div class="subpage-noSidebar">
	<div class="noSidebarPage">
	<div class="headlineBox"><h3 class="columnTitle"><?php the_title(); ?></h3></div>

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<article class="mainPost">
	 	<div class="entry">
	 		<?php the_content(); ?>
	 	</div>

		</article>
	<?php endwhile; else : ?>
		<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
	<?php endif; ?>
	</div>

</div>

<?php get_footer(); ?>