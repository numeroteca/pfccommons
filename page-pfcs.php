	<?php
/* Template Name: PFCs*/
get_header();
?>
<div id="categs">	 
<?php wp_list_categories('orderby=name&title_li=&depth=1	'); ?> 
</div>
<div id="box2">
<h5>Listado de PFCs en PFCCOMMONS</h5>


<?php
$args = array( 'numberposts' => -1, 'order'=> 'DESC', 'orderby' => 'date'); 
$postslist = get_posts( $args );
foreach ($postslist as $post) :  setup_postdata($post); ?> 
	<div class="portada-post post-<?php the_ID(); ?>">
	
	<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
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
<?php endforeach; ?>
	
</div>









<?php posts_nav_link(' &#8212; ', __('&laquo; Newer Posts'), __('Older Posts &raquo;')); ?>

<?php get_footer(); ?>
