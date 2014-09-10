<?php
/* /* Template Name: Post a PFC*/
get_header();
?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>


<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
	 <h3><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a> <?php edit_post_link(__('Edit This')); ?></h3>

	<div class="storycontent">
		<?php the_content(__('(more...)')); ?>
		<?php if (function_exists('post_from_site')) {post_from_site();} ?>
		<?php posts_nav_link(' &#8212; ', __('&laquo; Newer Posts'), __('Older Posts &raquo;')); ?>
	</div>
	

	<div class="feedback">
		<?php wp_link_pages(); ?>
		
	</div>

</div>

<?php endwhile; else: ?>
<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>






<?php get_footer(); ?>
