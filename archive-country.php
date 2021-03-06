<?php get_header(); ?>

<div class="subpage">
	<div class="normalpageFeed">
	<?php build_i_world_map(2); ?>

	</div>

	<div class="mainSidebarLeft widget-area" role="complementary">
		<div class="widgetWrap">
			<h4 class="widgetTitle">By Region</h4>
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
			<a class="regionMenuLabel" href="#"><?php echo $catstuff->name; ?></a>
			<ul class="regionMenuContent" style="display:none">
				<?php $postlist = get_posts(array(
					'orderby'          => 'post_date',
					'order'            => 'DESC',
					'post_type'        => 'country',
					'posts_per_page'   => -1,
					'category'		   => $catstuff->term_id
					));
				foreach($postlist as $post):
					setup_postdata($post); ?>
					<li><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></li>
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
