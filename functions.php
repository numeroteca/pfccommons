<?php

// shortcode to retrive feed items
//This file is needed to be able to use the wp_rss() function.
include_once(ABSPATH.WPINC.'/rss.php');

function add_blogfeed($atts) {
    extract(shortcode_atts(array(
	"feed" => '',
      "num" => '',
    ), $atts));

    return wp_rss($feed, $num);
}

add_shortcode('addfeed', 'add_blogfeed');


automatic_feed_links();

if ( function_exists('register_sidebar') )
	register_sidebar(array(
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget' => '</li>',
		'before_title' => '',
		'after_title' => '',
	));

	
	// Custom Taxonomies
add_action( 'init', 'build_taxonomies', 0 );

function build_taxonomies() {

register_taxonomy( 
	'uni', 'post', array(
		'hierarchical' => true,
		'label' => 'universidad',
		'query_var' => true,
		'rewrite' => array( 'slug' => 'universidad' ),
	)
);

register_taxonomy( 
	'univ', 'post', array(
		'hierarchical' => true,
		'label' => 'universidad2',
		'query_var' => true,
		'rewrite' => array( 'slug' => 'universidad2' ),
	)
);

register_taxonomy( 	
	'tipode', 'post', array(
		'hierarchical' => true,
		'label' => 'tipo de proyecto',
		'query_var' => true,
		'rewrite' => array( 'slug' => 'universidad2' ),
	)
);
	
register_taxonomy( 
	'yeardate', 'post', array(
		'hierarchical' => true,
		'label' => 'yeardate',
		'query_var' => true,
		'rewrite' => true ) 
	);
	
register_taxonomy( 
	'ciudad', 'post', array(
		'hierarchical' => true,
		'label' => 'ciudad',
		'query_var' => true,
		'rewrite' => true )
	);
	
}

global $is_apache;
$is_apache = true;
	
/*
Plugin Name: Remove /blog slug  plugin for wpmu
Description:Remove /blog slug from wpmu subdirectory install of wpmu default blog 
Version: 1.1
Tested up to: Wordpress 3.0 Multisite,buddypress 1.2.5.2
License: GNU General Public License 2.0 (GPL) http://www.gnu.org/licenses/gpl.html
Author: Brajesh Singh
Author URI: http://www.ThinkingInWordpress.com/
Plugin URI:http://thinkinginwordpress.com
tags:wpmu,wpms,buddypress,remove slug
*/

/* let us add filters for intercepting the permalink update,category base update and tag base update */

add_filter("pre_update_option_category_base","cc_remove_blog_slug");
add_filter("pre_update_option_tag_base","cc_remove_blog_slug");
add_filter("pre_update_option_permalink_structure","cc_remove_blog_slug");

/* just check if the current structure begins with /blog/ remove that and return the stripped structure */
function cc_remove_blog_slug($tag_cat_permalink){

if(!preg_match("/^\/blog\//",$tag_cat_permalink))
return $tag_cat_permalink;

$new_permalink=preg_replace ("/^\/blog\//","/",$tag_cat_permalink );
return $new_permalink;


}
/* fin del plugin Remove /blog slug  plugin for wpmu */



?>
