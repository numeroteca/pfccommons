<?php
/**
 * @package WordPress
 * @subpackage Classic_Theme
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

	<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>

	<style type="text/css" media="screen">
		@import url( <?php bloginfo('stylesheet_url'); ?> );
	</style>

	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<?php wp_get_archives('type=monthly&format=link'); ?>
	<?php //comments_popup_script(); // off by default ?>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="wrap">
<div id="header">
	<div id="header-top">
		<h1><a href="<?php bloginfo('url'); ?>/"><?php bloginfo('name'); ?></a><span class="tagline"><?php bloginfo('description'); ?></span></h1>
			
	</div>
	<div id="header-down">
		
			<?php 
			$args = array(
			'depth'        => 0,
			'title_li'     => __(''));
			wp_list_pages( $args ); ?> 
		<div id="header-down-right"><?php get_search_form( $echo ); ?>
		<?php echo qtrans_generateLanguageSelectCode('both'); ?>
		</div>
	</div> 
	
		
</div>
<div id="content">
<!-- end header -->
