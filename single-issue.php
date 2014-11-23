<?php get_header(); ?>

<div class="subpage">
	<div class="normalpageFeed">
	<div class="headlineBox"><h3 class="columnTitle"><?php the_title(); ?></h3></div>

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<article class="mainPost">
	 	<div class="entry">
	 		<h1 class="singleIssueTitle">Background</h1>
	 		<?php the_content(); ?>
	 	</div>
	 	<?php endwhile; else : ?>
		<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
	<?php endif; ?>
		</article>

	<?php $thispost = $post->ID; 
		$country_cat = get_cat_ID('country');
		$thisCat = $post->post_title;
	?>

	<!--list countries this issue is tagged with-->
	<?php $post_categories = wp_get_post_categories($post->ID);
	$countries = array();
	foreach ($post_categories as $key => $value):
		//have to do this to check parent
		$this_cat = get_category($value);
		if($this_cat->category_parent == $country_cat):
			//if it's a country category, get the countries with that cat
			$args = array('post_type' => 'country',
							'cat' => $value,
							'posts_per_page' => -1);
			$rand_post = new WP_query($args);
			while($rand_post->have_posts()):
				$rand_post->the_post();
				$countries[] = $post;
			endwhile;
			wp_reset_query();
		endif;
	endforeach; ?>

	<?php if(!empty($countries)): ?>
	<div class="relatedWrap relatedCountries">
		<h1 class="relatedWrapTitle">Related Countries</h1>
		<?php foreach ($countries as $apost): ?>
			<?php setup_postdata($apost); ?>
			<h2 class="relatedItemTitle relatedCountryTitle"><a href="<?php echo $apost->guid; ?>" rel="bookmark"><?php echo $apost->post_title; ?></a></h2>
			<?php wp_reset_postdata();
		endforeach; ?>
	</div>
	<?php endif; ?>
	<!-- end country list-->

	<!-- Get forecasts -->
	<?php $value = get_cat_ID($thisCat);
		$args = array('post_type' => 'forecast',
						'cat' => $value,
						'posts_per_page' => -1);
		$rand_post = new WP_query($args);
		if($rand_post->have_posts()): ?>
			<div class="relatedWrap relatedForecasts">
			<h1 class="relatedWrapTitle">Related Forecasts</h1>
			<?php while($rand_post->have_posts()):
				$rand_post->the_post(); ?>
				<h2 class="relatedItemTitle relatedForecastTitle"><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
			<?php endwhile; ?>
			</div>
		<?php endif; 
		wp_reset_query(); ?>

	<!--Discussion-->
	<?php $value = get_cat_ID($thisCat);
	$args = array('post_type' => 'post',
					'cat' => $value,
					'posts_per_page' => -1);
	$rand_post = new WP_query($args);
	if($rand_post->have_posts()): ?>
		<div class="relatedWrap relatedDiscussions">
		<h1 class="relatedWrapTitle">Discussion</h1>
		<?php while($rand_post->have_posts()):
			$rand_post->the_post();
			get_template_part( 'content', 'article' );
		endwhile; ?>
		</div>
	<?php endif;
	wp_reset_query(); ?>
	<!--End discussion-->
	</div>

	<?php if ( is_active_sidebar( 'main_left' ) ) : ?>
		<div class="mainSidebarLeft widget-area" role="complementary">
			<?php dynamic_sidebar( 'main_left' ); ?>
		</div>
	<?php endif; ?>
</div>

<?php get_footer(); ?>
