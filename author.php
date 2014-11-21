<?php get_header(); ?>

<div class="main">
	<div class="homepageFeed">
	<?php $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));?>
		<div class="headlineBox"><h3 class="columnTitle">
			Posts by <?php echo $curauth->display_name; ?>
			</h3></div>
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<article class="mainPost">
			<?php echo get_avatar( get_the_author_meta( 'ID' ), 48 ); ?> 
			<h2 class="postTitle"><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
			<small class="postInfo"><?php the_author_posts_link(); ?> | <?php the_time('F jS, Y'); ?></small>

		 	<div class="entry">
		 		<?php the_excerpt(); ?>
		 	</div>
			<div class="postCategories">Categories: <?php the_category(', '); ?></div>
		</article>
	<?php endwhile; else : ?>
		<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
	<?php endif; ?>
	<?php
	global $wp_query;

	$big = 999999999; // need an unlikely integer

	echo paginate_links( array(
		'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
		'format' => '?paged=%#%',
		'current' => max( 1, get_query_var('paged') ),
		'total' => $wp_query->max_num_pages,
	        'before_page_number' => '[',
	        'after_page_number' => ']'
	) );
	?>


	</div>


	<?php if ( is_active_sidebar( 'main_left' ) ) : ?>
		<div class="mainSidebarLeft widget-area" role="complementary">
			<?php dynamic_sidebar( 'main_left' ); ?>
		</div>
	<?php endif; ?>

	<?php if ( is_active_sidebar( 'main_right' ) ) : ?><div class="mainSidebarRight widget-area" role="complementary">
			<?php dynamic_sidebar( 'main_right' ); ?>
		</div>
	<?php endif; ?>
</div>

<?php get_footer(); ?>