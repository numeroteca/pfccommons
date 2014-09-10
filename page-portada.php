	<?php
/* Template Name: Portada*/
get_header();
?>

<div id="box1">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>


<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
	
		<?php the_content(__('(more...)')); ?>



</div>


<?php endwhile; else: ?>
<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>
<div id="categs"></ul>	 
<?php wp_list_categories('orderby=name&title_li=&depth=1'); ?></ul> 
</div>
</div>




<div id="box2">
<h4> <a href="http://pfccommons.org/pfcs/"> <?php _e("<!--:en-->Last projects<br><br><!--:--><!--:es-->&Uacute;ltimos PFC recibidos<!--:-->"); ?></a></h4>	


<?php
$args = array( 'numberposts' => 6, 'order'=> 'DESC', 'orderby' => 'date'); 
$postslist = get_posts( $args );
foreach ($postslist as $post) :  setup_postdata($post); ?> 
	<div class="portada-post post-<?php the_ID(); ?>">
	
	<a href="<?php the_permalink() ?>" rel="bookmark" title="Ir a <?php the_title_attribute(); ?>">
		<div class="attach-post-image" style="height:85px;width:150px;display:block;background:url('<?php echo get_post_meta($post->ID, 'img', true); ?>') 
					center center no-repeat; float:left; margin:0 5px 0 0;border:1px solid #ccc;"></div>
	</a>
	
	<a href="<?php the_permalink() ?>" rel="bookmark" title="Ir a <?php the_title_attribute(); ?>">
		<h4 class="archive-header">
			<?php the_title() ?>
		</h4>
	</a>
	<span style="font-size:10px;"><?php echo get_post_meta($post->ID, 'pefecista', true); ?></span><br/>
	<h6><?php the_category(', ') ?></h6>
		<!--<?php the_excerpt(); ?>-->
		
		
	</div>
<?php endforeach; ?>
	
</div>









<?php posts_nav_link(' &#8212; ', __('&laquo; Newer Posts'), __('Older Posts &raquo;')); ?>

<?php get_footer(); ?>
