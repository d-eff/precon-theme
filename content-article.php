<?php
?>
<article class="mainPost">
	<div class="postMeta">
		<?php echo get_avatar( get_the_author_meta( 'ID' ), 48 ); ?> 
		<h2 class="postTitle"><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
		<small class="postInfo"><?php the_author_posts_link(); ?> | <?php the_time('F jS, Y'); ?></small>
	</div>

 	<div class="entry">
 		<div class="excerpt">
 			<?php the_excerpt(); ?>
 		</div>
 		<div class="full">
 			<?php the_content(); ?>
 			<a href="#" class="read-less">Read Less</a>
 		</div>
 	</div>
</article>