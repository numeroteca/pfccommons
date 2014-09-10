<?php
/**
 * @package WordPress
 * @subpackage Classic_Theme
 */
get_header();
?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>


<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
	 <h3 class=""><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h3>
	<div style="position:relative;">
	<div class="contentpostdata">	
		<?php _e("<!--:en-->Title<!--:--><!--:es-->T&iacute;tulo<!--:-->"); ?>: <strong><?php the_title(); ?></strong><br/>
		<?php _e("<!--:en-->Category<!--:--><!--:es-->Categor&iacute;a<!--:-->"); ?>:  <?php the_category(', ') ?> <br/>
		<?php _e("<!--:en-->Author<!--:--><!--:es-->Autor&iacute;a <!--:-->"); ?>: <?php echo get_post_meta($post->ID, 'pefecista', true); ?><br/>	
		<?php _e("<!--:en-->Place<!--:--><!--:es-->Lugar<!--:-->"); ?>: <?php echo get_post_meta($post->ID, 'lugar', true); ?>, <?php echo get_the_term_list( $post->ID, 'ciudad', ' ', ' ', '' ); ?><br/>
		<?php _e("<!--:en-->University<!--:--><!--:es-->Escuela<!--:-->"); ?>: <?php echo get_the_term_list( $post->ID, 'uni', ' ', ' ', '' ); ?><br/>
		<?php _e("<!--:en-->Year<!--:--><!--:es-->A&ntilde;o <!--:-->"); ?>: <?php echo get_the_term_list( $post->ID, 'yeardate', ' ', ' ', '' ); ?><br/>
		<?php the_tags(__('Tags: '), ', ', ' &#8212; '); ?>  <br/>
		<div id="categs"><?php the_category(' ') ?>	</div><br/>
		
	 <?php edit_post_link(__('Edit This')); ?></div>

	
	
	
		<?php the_content(__('(more...)')); ?>
	</div>

	<div class="feedback">
		<?php wp_link_pages(); ?>
		<?php comments_popup_link(__('Comments (0)'), __('Comments (1)'), __('Comments (%)')); ?>
	</div>

</div>

<?php comments_template(); // Get wp-comments.php template ?>

<?php endwhile; else: ?>
<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>

<?php posts_nav_link(' &#8212; ', __('&laquo; Newer Posts'), __('Older Posts &raquo;')); ?>

<?php get_footer(); ?>
