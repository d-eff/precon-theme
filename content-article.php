<?php
?>
<article class="mainPost singlePost">
	<div class="postMeta">
		<?php echo get_avatar( get_the_author_meta( 'ID' ), 48 ); ?> 
		<h2 class="postTitle"><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
		<small class="postInfo"><?php the_author_posts_link(); ?> | <?php the_time('F jS, Y'); ?> | 
			<?php if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) : ?>
			<span class="comments-link"><?php comments_popup_link( 'Leave a comment', '1 Comment', '% Comments'); ?></span>
			<?php endif; ?>
		</small>
	</div>

 	<div class="entry singlePostEntry">
 		<div class="excerpt">
 			<?php the_excerpt(); ?>
 		</div>
 		<div class="full">
 			<?php the_content(); ?>
 			<p><a href="#" class="read-less">Read Less</a></p>
 			<p class="no-break">
	 			<span st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>' class='st_twitter'></span>
				<span class='st_facebook' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>'></span>
				<span st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>' class='st_linkedin'></span>
				<span class='st_email' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>'></span>
			</p>
 		</div>
 	<div class="tagWrap"><?php the_tags(); ?></div>
 	</div>
 	
</article>