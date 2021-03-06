<?php get_header(); ?>


<div class="subpage">
	<div class="normalpageFeed">
	<div class="headlineBox"><h3 class="columnTitle">Current Forecasts</h3></div>

			<?php $taxons = array(
					'category'
				);
				$regions_cat = get_cat_ID('region');
				$args = array(
					'hide_empty' => false,
					'child_of' => $regions_cat
					);
				$sub_categories = get_terms($taxons, $args);
				$count = 0;
			foreach ($sub_categories as $cat => $catstuff): ?>
			<div class="forecastRegionSection">
			<p class="forecastRegionTitle"><?php echo $catstuff->name; ?></p>

					<div class="forecastResults forecastResultsTitleWrap">
						<p class="forecastResultTitle forecastResultHouse">House</p>
						<p class="forecastResultTitle forecastResultExpert">Experts</p>
						<p class="forecastResultTitle forecastResultSub">Community</p>
					</div>
			<ul class="forecastRegionList">
				<?php $postlist = get_posts(array(
					'orderby'          => 'title',
					'order'            => 'ASC',
					'post_type'        => 'forecast',
					'posts_per_page'   => -1,
					'category'		   => $catstuff->term_id
					));
				foreach($postlist as $post):
					setup_postdata($post); ?>
					<li class="<?php $count % 2 == 0 ? print 'evenForecast' : print 'oddForecast'?>"><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a>
					<div class="forecastResults"><?php
						$pid = $post->ID; ?>
						<p class="forecastResult forecastResultHouse"><?php echo round(get_post_meta($pid, 'runningAverageAdmin', true)); ?>%</p>
						<p class="forecastResult forecastResultExpert"><?php echo round(get_post_meta($pid, 'runningAverageExpert', true)); ?>%</p>
						<p class="forecastResult forecastResultSub"><?php echo round(get_post_meta($pid, 'runningAverageSub', true)); ?>%</p>
					</div>
					</li>
				<?php $count++;
				wp_reset_postdata(); 
				endforeach; ?>
			</ul>
			</div>
			<?php endforeach; ?>	
	</div>

	<?php if ( is_active_sidebar( 'forecasts_left' ) ) : ?>
		<div class="mainSidebarLeft widget-area" role="complementary">
			<?php dynamic_sidebar( 'forecasts_left' ); ?>
		</div>
	<?php endif; ?>
</div>


<?php get_footer(); ?>
