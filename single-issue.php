<?php get_header(); ?>

<div class="subpage">
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

	<?php $thispost = $post->ID; 
		$country_cat = get_cat_ID('country');
		$thisCat = $post->post_name;
	?>

	<!--list countries this issue is tagged with-->
	<h1>Related Countries</h1>
	<?php $post_categories = wp_get_post_categories($post->ID);
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
	<!-- end janky country list-->

	<!-- Get forecasts -->
	<h1>Related Forecasts</h1>
	<?php $value = get_cat_ID($thisCat);
		$args = array('post_type' => 'country',
						'cat' => $value);
		$rand_post = new WP_query($args);
		while($rand_post->have_posts()):
			$rand_post->the_post();
			if(get_post_type() == 'forecast'):?>
				<h2 class="postTitle"><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
			<?php endif;
		
		endwhile;
		wp_reset_query();
	?>

	<!--Discussion-->
	<h1>Discussion</h1>
	<?php $value = get_cat_ID($thisCat);
	$args = array('post_type' => 'country',
					'cat' => $value);
	$rand_post = new WP_query($args);
	while($rand_post->have_posts()):
		$rand_post->the_post();
		if(get_post_type() == 'post'):
			get_template_part( 'content', 'article' );
		endif;
	
	endwhile;
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