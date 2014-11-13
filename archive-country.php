<?php get_header(); ?>

<div class="subpage">
	<div class="normalpageFeed">
	<div class="headlineBox"><h3 class="columnTitle">Country Analysis</h3></div>
	<?php build_i_world_map(2); ?>

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
				<?php $postlist = get_posts(array(
					'orderby'          => 'post_date',
					'order'            => 'DESC',
					'post_type'        => 'country',
					'category'		   => $catstuff->term_id
					));
				foreach($postlist as $post):
					if($post->post_type == 'country') :
					setup_postdata($post); ?>
					<li><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></li>
					<?php endif; ?>
				<?php endforeach;
				wp_reset_postdata(); ?>
			</ul>
			<?php endforeach; ?>	
		</div>
		<?php if ( is_active_sidebar( 'countries_left' ) ) {
			dynamic_sidebar( 'countries_left' ); 
		}?>
	</div>
</div>

<?php get_footer(); ?>