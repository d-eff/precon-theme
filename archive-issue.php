<?php 
/*
Template Name: Issue Archive
*/

get_header(); ?>

<div class="subpage">
	<div class="normalpageFeed">
		<div class="headlineBox"><h3 class="columnTitle">Current Issues</h3></div>

		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<article class="mainPost">
			<h2 class="postTitle"><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
			
			<?php $excerpt = get_post_meta( $post->ID, 'excerpt', true ); 
			if(!empty($excerpt)): ?>
		 	<div class="entry">
		 		<?php echo $excerpt; ?>
		 	</div>
		 <?php endif; ?>

			</article>
		<?php endwhile; else : ?>
			<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
		<?php endif; ?>
	</div>

	<div class="mainSidebarLeft widget-area" role="complementary">
		<div class="widgetWrap">
			<h4 class="widgetTitle">Issues</h4>
			<p>By Region:</p>
			<?php $taxons = array(
					'category'
				);
				$regions_cat = get_cat_ID('region');
				$args = array(
					'hide_empty' => false,
					'child_of' => $regions_cat
					);
				$sub_categories = get_terms($taxons, $args);
			foreach ($sub_categories as $cat => $catstuff): ?>
			<p><?php echo $catstuff->name; ?></p>
			<ul>
				<?php $args = array(
					'category'		   => $catstuff->term_id,
					'orderby'          => 'post_date',
					'order'            => 'DESC',
					'post_type'        => 'issue',
					'post_status'      => 'publish' ); 
				$postlist = get_posts($args);
				foreach($postlist as $post): 
					if($post->post_type == 'issue'):
					setup_postdata($post);  ?>
					<li><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></li>
				<?php endif; ?>
				<?php endforeach;
				wp_reset_postdata(); ?>
			</ul>
			<?php endforeach; ?>	

			<p>By Type:</p>
			<?php $taxons = array(
					'category'
				);
				$regions_cat = get_cat_ID('event type');
				$args = array(
					'hide_empty' => false,
					'child_of' => $regions_cat
					);
				$sub_categories = get_terms($taxons, $args);
			foreach ($sub_categories as $cat => $catstuff): ?>
			<p><?php echo $catstuff->name; ?></p>
			<ul>
				<?php $args = array(
					'category'		   => $catstuff->term_id,
					'orderby'          => 'post_date',
					'order'            => 'DESC',
					'post_type'        => 'issue',
					'post_status'      => 'publish' ); 
				$postlist = get_posts($args);
				foreach($postlist as $post): 
					if($post->post_type == 'issue'):
					setup_postdata($post);  ?>
					<li><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></li>
				<?php endif; ?>
				<?php endforeach;
				wp_reset_postdata(); ?>
			</ul>
			<?php endforeach; ?>	
		</div>
		<?php if ( is_active_sidebar( 'main_left' ) ) {
			dynamic_sidebar( 'main_left' ); 
		}?>
	</div>
</div>

<?php get_footer(); ?>