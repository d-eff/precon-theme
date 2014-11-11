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
	<?php $thispost = $post->ID; ?> 

		</article>
		<ul class="infoBoxMenu">
		<?php $infoboxes = get_post_meta( $thispost, 'info_boxes', true ); 
			$count = 0;
			foreach($infoboxes as $box): 
				$title = $box['box_title'];?>
				<li><a href="#<?php echo $title.$count; ?>"><?php echo $title ?></a></li>
			<?php $count += 1;
			endforeach; ?>
			<li><a href="#discussion">Discussion</a></li>
		</ul>


	<?php $infoboxes = get_post_meta( $thispost, 'info_boxes', true );
		$count = 0; 
		foreach($infoboxes as $box): ?>
		<div id="<?php echo $box['box_title'].$count; ?>" class="countryInfoBox">
			<h3 class="countryInfoBoxTitle"><?php echo $box['box_title']; ?></h3>
			<p class="countryInfoBoxContent"><?php echo $box['box_content']; ?></p>
		</div>
	<?php $count += 1;
		endforeach; ?>

	<h1>Issues</h1>
	<?php $post_categories = wp_get_post_categories( $post->ID );
	foreach ($post_categories as $key => $value): ?>
		<?php $rand_post = new WP_query();
		$rand_post->query('post_type=question&cat='.$value);

		while($rand_post->have_posts()): $rand_post->the_post();?>
		<?php if((get_post_type() != 'post')&&($post->ID != $thispost)): ?>
			<h2 class="postTitle"><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
		<?php endif; ?>
		<?php endwhile;
		wp_reset_query(); ?>
	<?php endforeach; ?>


	<h1 id="discussion">Discussion</h1>
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

	</div>

	<?php if ( is_active_sidebar( 'main_left' ) ) : ?>
		<div class="mainSidebarLeft widget-area" role="complementary">
			<?php dynamic_sidebar( 'main_left' ); ?>
		</div>
	<?php endif; ?>
</div>

<?php get_footer(); ?>