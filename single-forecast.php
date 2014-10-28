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
 		<div class="voteData">
 			<?php getData($post->ID, 'admin'); ?>
 		</div>
 		<svg id="visualisation0" width="500" height="300"></svg>
 		<div id="test1"></div>

 		<h3>Expert Analysis</h3>
 		<?php echo(get_post_meta($post->ID, "Expert", true)); ?>
 		<div class="voteData">
 			<?php getData($post->ID, 'auth'); ?>
 		</div>
 		<svg id="visualisation1" width="500" height="300"></svg>

 		<h3>Community Analysis</h3>
 		<?php echo(get_post_meta($post->ID, "Community", true)); ?>
 		<div class="voteData">
 			<?php getData($post->ID, 'sub'); ?>
 		</div>
 		<svg id="visualisation2" width="500" height="300"></svg>
 	</div>

 	<?php if(is_user_logged_in()) {
 			global $current_user;
 			get_currentuserinfo();
 			$tid = get_the_ID();
 			$intime = get_post_time('U', false);

 			custom_vote_function($tid, $current_user->user_level, $intime); 
 		}
 	?>

	



	</article>
<?php endwhile; else : ?>
	<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>

</div>



<?php get_footer(); ?>