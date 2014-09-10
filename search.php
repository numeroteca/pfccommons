<?php
/**
 * @package WordPress
 * @subpackage Classic_Theme
 */
get_header();
?>


<div id="box2">
		<h3>Resultados de la b&uacute;squeda "<strong><?php the_search_query(); ?></strong>"</h3>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
<div class="portada-post post-<?php the_ID(); ?>">
	 <div class="attach-post-image" style="height:85px;width:150px;display:block;background:url('<?php echo get_post_meta($post->ID, 'img', true); ?>') 
					top center no-repeat; float:left; margin:0 5px 0 0;border:1px solid #ccc;"></div>
	</a>
	
	<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
		<h4 class="archive-header">
			<?php the_title() ?>
		</h4>
	</a>
	<span style="font-size:10px;"><?php echo get_post_meta($post->ID, 'pefecista', true); ?></span><br/>
	<h6><?php the_category(', ') ?></h6>

</div>

<?php comments_template(); // Get wp-comments.php template ?>

<?php endwhile; else: ?>
<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>
</div>
<?php posts_nav_link(' &#8212; ', __('&laquo; Newer Posts'), __('Older Posts &raquo;')); ?>

<?php get_footer(); ?>
