<?php get_header(); ?>

<div class="subpage">
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

	<h1>Related Countries</h1>
		<?php $post_categories = wp_get_post_categories($post->ID);
		$country_cat = get_cat_ID('country');
		foreach ($post_categories as $key => $value):
			//have to do this to check parent
			$this_cat = get_category($value);
			if($this_cat->category_parent == $country_cat):
				//if it's a country category, get the countries with that cat
				$args = array('post_type' => 'country',
								'cat' => $value);
				$rand_post = new WP_query($args);
				while($rand_post->have_posts()):
					$rand_post->the_post();
					if(get_post_type() == 'country'):?>
						<h2 class="postTitle"><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
					<?php endif;
				
				endwhile;
				wp_reset_query();
			endif;
		endforeach; ?>


		<h1>Related Issues</h1>
		<?php $post_categories = wp_get_post_categories($post->ID);
		$issue_cat = get_cat_ID('issue');
		foreach ($post_categories as $key => $value):
			//have to do this to check parent
			$this_cat = get_category($value);
			if($this_cat->category_parent == $issue_cat):
				//if it's a country category, get the countries with that cat
				$args = array('post_type' => 'issue',
								'cat' => $value);
				$rand_post = new WP_query($args);
				while($rand_post->have_posts()):
					$rand_post->the_post();
					if(get_post_type() == 'issue'):?>
						<h2 class="postTitle"><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
					<?php endif;
				
				endwhile;
				wp_reset_query();
			endif;
		endforeach; ?>
	</div>

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
</div>

<?php get_footer(); ?>