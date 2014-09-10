<?php
/**
 * Template Name: Blogs List
 */
get_header();
?>

<div id="pfcblogs-list">
<?php
// BEGIN PFC blogs posts list
//
// blogs array
$blogs = array(
	'0' => array(
		'feed' => 'http://pfccommons.org/comunidadmariadelmar/feed/',
		'url' => 'http://pfccommons.org/comunidadmariadelmar/',
		'tit' => 'Comunidad María do Mar',
		'desc' => 'consiste en urbanizar, y construir las viviendas y equipamientos, de la Comunidad de María del Mar, en la municipalidad de Champerico (Retalhulheu, Guatemala), para 71 familias de un colectivo \"sin tierra\", por Alberto Fortes. Primer blog en pfccommons.'),
	'1' => array(
		'feed' => 'http://pfccommons.org/mvd/feed/',
		'url' => 'http://pfccommons.org/mvd/',
		'tit' => 'MVD',
		'desc' => 'proceso de un PFC \'ETSAB\' en Montevideo sobre rehabilitación de edificio colonial de la ciudad vieja para convertirlo en cooperativa de viviendas y creación de biblioteca pública . Por Andrea Swiec en pfccommons.'),
	'2' => array(
		'feed' => 'http://memoria-ics.tumblr.com/rss',
		'url' => 'http://memoria-ics.tumblr.com/',
		'tit' => 'Industrias Creativas Santiago',
		'desc' => 'es un proyecto de Diego Sepúlveda para la Universidad de Chile. Se incluyen en el blog los originales descargables.'),
	'3' => array(
		'feed' => 'http://cuadernodepfc.wordpress.com/feed/',
		'url' => 'http://cuadernodepfc.wordpress.com/',
		'tit' => 'cuadernodepfc',
		'desc' => 'PFC sobre vivienda compartida y artesanía de la ETSA de Sevilla \"he ido elaborando un blog donde voy profundizando en temas teóricos en relación al proyecto y voy subiendo mi material de trabajo\" por Blanca Domínguez.')
);

// get each PFC blog feed using DOM
foreach ( $blogs as $blog ) {

	// building blog header
	$blog_pre = "
		<div class='blog-part'>
			<h2 class='blog-tit'>".$blog['tit']."</h2>
			<div class='blog-meta'><a href='".$blog['url']."'>".$blog['url']."</a></div>
			<div class='blog-desc'>".$blog['desc']."</div>
			<ul class='blog-items'>
	";
	// using DOM to extract feed items
	$doc = new DOMDocument();
	$doc->load($blog['feed']);

	// var to define how many feed items we want to retrieve
	$how_many_items = "3";
	// loop along each feed item until loop turn = $how_many_items
	$count = 0;
	$blog_items = "";
	foreach ($doc->getElementsByTagName('item') as $node) {
//		while ( $count <= $how_many_items ) {
		if ( $count == $how_many_items ) {
			break;
		}
			$item_tit = $node->getElementsByTagName('title')->item(0)->nodeValue;
			$item_link = $node->getElementsByTagName('link')->item(0)->nodeValue;
			$item_desc = $node->getElementsByTagName('description')->item(0)->nodeValue;

			$blog_items .= "
				<li class='item-part'>
					<h3 class='item-tit'>".$item_tit."</h3>
					<div class='item-desc'>".$item_desc."</div>
					<div class='item-link'><a href='".$item_link."' title='Leer el artículo completo'>+</a></div>
				</li><!-- end .item-part -->
			";
			$count++;
//		}
	}
	$blog_epi = "
			</ul><!-- end .blog-items -->
		</div><!-- end .blog-part -->
	";
	// output
	echo $blog_pre;
	echo $blog_items;
	echo $blog_epi;
} // end each feed url loop
 
// END PFC blogs posts list
?>
</div><!-- #pfcblogs-list -->



<?php if (have_posts()) : while (have_posts()) : the_post(); ?>


<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
	 <h3><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h3>

	<div class="storycontent">
		<?php the_content(__('(more...)')); ?>
	</div>
	<div class="meta">
	<?php edit_post_link(__('Edit This')); ?></div>

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
