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
 		<h1>Background</h1>
 		<?php the_content(); ?>
 	</div>
 	<?php endwhile; else : ?>
	<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>
	</article>

<?php $thispost = $post->ID; ?>

<!--Forecasts list-->
<h1>Related Forecasts</h1>
<?php $post_categories = wp_get_post_categories( $post->ID );
foreach ($post_categories as $key => $value): ?>
<?php $rand_post = new WP_query();
$rand_post->query('post_type=forecast&cat='.$value);

while($rand_post->have_posts()): $rand_post->the_post();?>
<?php if((get_post_type() != 'post')&&($post->ID != $thispost)): ?>
	<h2 class="postTitle"><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
<?php endif; ?>
<?php endwhile;
wp_reset_query(); ?>
<?php endforeach; ?>
<!--end forecasts-->

<!--Discussion-->
<h1>Discussion</h1>
<?php $post_categories = wp_get_post_categories( $post->ID );
foreach ($post_categories as $key => $value): ?>

<?php $rand_post = new WP_query();
$rand_post->query('post_type=post&cat=' . $value);
while($rand_post->have_posts()): $rand_post->the_post();?>
<?php if((get_post_type() == 'post')&&($post->ID != $thispost)): ?>
	<h2 class="postTitle"><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
<?php endif; ?>
<?php endwhile; ?>
<?php wp_reset_query(); ?>
<?php endforeach; ?>
<!--End discussion-->
</div>



<?php get_footer(); ?>

