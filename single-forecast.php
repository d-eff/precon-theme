<?php get_header(); ?>


	<div class="mainSidebarLeft widget-area" role="complementary">
		 	<?php if(is_user_logged_in()) {
 			global $current_user;
 			get_currentuserinfo();
 			$tid = get_the_ID();
 			$intime = get_post_time('U', false);
 			custom_vote_function($tid, $current_user->user_level, $intime, $current_user->user_ID); 
 		}
 	?>
 	<?php if ( is_active_sidebar( 'main_left' ) ) : ?>
		<?php dynamic_sidebar( 'main_left' ); ?>

<?php endif; ?>
	</div>

<div class="normalpageFeed">
<div class="headlineBox"><h3 class="columnTitle">Forecast</h3></div>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<article class="mainPost">
	<h2 class="postTitle"><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
	

 	<div class="entry">
 		<?php the_content(); ?>
 		<div class="forecast">
	 		<div class="forecastContent">
	 			<h3 class="forecastTitle">House Analysis</h3>
	 			<?php echo(get_post_meta($post->ID, "House", true)); ?>
	 		</div>
	 		<div class="voteData" data-votes="<?php getData($post->ID, 'admin'); ?>"></div>
	 		<svg id="visualisation0" class="forecastGraph" width="300" height="200"></svg>
 		</div>
 		<div class="forecast">
	 		<div class="forecastContent">
	 			<h3 class="forecastTitle">Expert Analysis</h3>
	 			<?php echo(get_post_meta($post->ID, "Expert", true)); ?></div>
	 		<div class="voteData" data-votes="<?php getData($post->ID, 'auth'); ?>"></div>
	 		<svg id="visualisation1" class="forecastGraph" width="300" height="200"></svg>
 		</div>
 		<div class="forecast">
	 		
	 		<div class="forecastContent">
	 			<h3 class="forecastTitle">Community Analysis</h3>
	 			<?php echo(get_post_meta($post->ID, "Community", true)); ?></div>
	 		<div class="voteData" data-votes="<?php getData($post->ID, 'sub'); ?>"></div>
	 		<svg id="visualisation2" class="forecastGraph" width="300" height="200"></svg>
	 	</div>
 	</div>

	</article>
<?php endwhile; else : ?>
	<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>

</div>



<?php get_footer(); ?>