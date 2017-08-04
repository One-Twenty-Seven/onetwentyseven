<?php

add_theme_support( 'title-tag' );
add_theme_support( 'post-thumbnails' );


function register_my_menu() {
  register_nav_menus(
      array(
          'nav-primary' => __( 'Nav Menu' ),
          'footer-primary' => __( 'Footer Menu' ),
      )
  );
}
add_action( 'init', 'register_my_menu' );


function modify_contact_methods($profile_fields) {

	// Add new fields
	$profile_fields['twitter'] = 'Twitter Username';
    $profile_fields['job_title'] = 'Job Title';

	return $profile_fields;
}
add_filter('user_contactmethods', 'modify_contact_methods');


if ( function_exists('register_sidebar') ) {
  register_sidebar([
      'name' => 'Homepage Sidebar',
      'before_widget' => '<div class = "homepage-widget">',
      'after_widget' => '</div>',
      'before_title' => '<h3>',
      'after_title' => '</h3>',
  ]);
  register_sidebar([
      'name' => 'Author Sidebar',
      'before_widget' => '<div class = "author-widget">',
      'after_widget' => '</div>',
      'before_title' => '<h3>',
      'after_title' => '</h3>',
  ]);
  register_sidebar([
      'name' => 'Page Sidebar',
      'before_widget' => '<div class = "page-widget">',
      'after_widget' => '</div>',
      'before_title' => '<h3>',
      'after_title' => '</h3>',
  ]);
  register_sidebar([
      'name' => 'Search Sidebar',
      'before_widget' => '<div class = "search-widget">',
      'after_widget' => '</div>',
      'before_title' => '<h3>',
      'after_title' => '</h3>',
  ]);
  register_sidebar([
      'name' => 'Archive Sidebar',
      'before_widget' => '<div class = "author-widget">',
      'after_widget' => '</div>',
      'before_title' => '<h3>',
      'after_title' => '</h3>',
  ]);
}


function wpb_load_widget() {
	register_widget( 'recent_contributors_widget' );
    register_widget( 'random_post_widget' );
}
add_action( 'widgets_init', 'wpb_load_widget' );

/* Include Recent Contributors Widget */
include_once( 'widgets/recent_contrib.php' );
/* Include Random Post Widget */
include_once( 'widgets/random_post.php' );


function wpb_new_gravatar ($avatar_defaults) {
    $myavatar = 'assets/imgs/blank-profile.jpg';
    $avatar_defaults[$myavatar] = "onetwentyseven";
    return $avatar_defaults;
}
add_filter( 'avatar_defaults', 'wpb_new_gravatar' );


add_action('get_header', 'remove_admin_login_header');
function remove_admin_login_header() {
	remove_action('wp_head', '_admin_bar_bump_cb');
}
