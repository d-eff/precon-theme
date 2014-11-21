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
			$thisCat = $post->post_name
	?>

	<?php $infoboxes = get_post_meta( $thispost, 'info_boxes', true ); 
	if(!empty($infoboxes)):?>

		<ul class="infoBoxMenu">
			<?php $count = 0;
			foreach($infoboxes as $box): 
				$title = $box['box_title'];?>
				<li><a href="#<?php echo $title.$count; ?>"><?php echo $title ?></a></li>
			<?php $count += 1;
			endforeach; ?>
			<li><a href="#discussion">Discussion</a></li>
		</ul>

		<?php $count = 0; 
		foreach($infoboxes as $box): ?>
		<div id="<?php echo $box['box_title'].$count; ?>" class="countryInfoBox">
			<h3 class="countryInfoBoxTitle"><?php echo $box['box_title']; ?></h3>
			<p class="countryInfoBoxContent"><?php echo $box['box_content']; ?></p>
		</div>
		<?php $count += 1;
		endforeach; ?>
	<?php endif; ?>


	<?php $value = get_cat_ID($thisCat);
	$issues = array();
	$forecasts = array();
	$discussions = array();
	$args = array('post_type' => 'country',
					'cat' => $value,
					'posts_per_page' => -1);
	$rand_post = new WP_query($args);
	while($rand_post->have_posts()):
		$rand_post->the_post();
		$ptype = get_post_type();

		switch($ptype) {
			case 'issue':
				$issues[] = $post;
				break;
			case 'forecast':
				$forecasts[] = $post;
				break;
		}
	endwhile;
	wp_reset_query(); ?>

	<h1>Related Issues</h1>
	<?php foreach ($issues as $apost): ?>
		<?php setup_postdata($apost); ?>
		<h2 class="postTitle"><a href="<?php echo $apost->guid; ?>" rel="bookmark"><?php echo $apost->post_title; ?></a></h2>
		<?php wp_reset_postdata();
	endforeach; ?>
	<h1>Related Forecasts</h1>
	<?php foreach ($forecasts as $apost): ?>
		<?php setup_postdata($apost); ?>
		<h2 class="postTitle"><a href="<?php echo $apost->guid; ?>" rel="bookmark"><?php echo $apost->post_title; ?></a></h2>
		<?php wp_reset_postdata();
	endforeach; ?>
	<!--Discussion-->
	<h1>Discussion</h1>
	<?php $value = get_cat_ID($thisCat);
	$args = array('post_type' => 'country',
					'cat' => $value,
					'posts_per_page' => -1);
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
