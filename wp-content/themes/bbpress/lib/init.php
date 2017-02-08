<?php

namespace Roots\Sage\Init;

use Roots\Sage\Assets;

/**
 * Theme setup
 */
function setup() {
  // Make theme available for translation
  // Community translations can be found at https://github.com/roots/sage-translations
  load_theme_textdomain('sage', get_template_directory() . '/lang');

  // Enable plugins to manage the document title
  // http://codex.wordpress.org/Function_Reference/add_theme_support#Title_Tag
  add_theme_support('title-tag');

  // Register wp_nav_menu() menus
  // http://codex.wordpress.org/Function_Reference/register_nav_menus
  register_nav_menus([
    'primary_navigation' => __('Primary Navigation', 'sage'),
    'utility_navigation' => __('Utility Navigation', 'sage'),
    'social_navigation' => __('Social Media Icons', 'sage'),
    'sidebar_navigation' => __('Sidebar Navigation', 'sage'),
    'action_navigation' => __('Action Navigation', 'sage'),
    'footer_admin_navigation' => __('Footer Admin Navigation', 'sage'),
    'footer_sitemap_navigation' => __('Footer Sitemap Navigation', 'sage')
  ]);

  // Add post thumbnails
  // http://codex.wordpress.org/Post_Thumbnails
  // http://codex.wordpress.org/Function_Reference/set_post_thumbnail_size
  // http://codex.wordpress.org/Function_Reference/add_image_size
  add_theme_support('post-thumbnails');
  add_image_size( 'slider-img', 1400, 800, true ); // (cropped)
  add_image_size( 'banner-img', 1400, 400, true ); // (cropped)
  add_image_size( 'home-grid', 760, 425, true ); // (cropped) - ratio that will make sure a photo will have same size as possible as an video iframe 
  add_image_size( 'grid-template', 600, 600, true ); // (cropped)
  // add_image_size('w800', 800, 9999);

  // Add post formats
  // http://codex.wordpress.org/Post_Formats
  add_theme_support('post-formats', ['aside', 'gallery', 'link', 'image', 'quote', 'video', 'audio', 'chat', 'status']);

  // Add HTML5 markup for captions
  // http://codex.wordpress.org/Function_Reference/add_theme_support#HTML5
  add_theme_support('html5', ['caption', 'comment-form', 'comment-list']);

  // Tell the TinyMCE editor to use a custom stylesheet
  add_editor_style(Assets\asset_path('styles/css/editor-style.css'));
}
add_action('after_setup_theme', __NAMESPACE__ . '\\setup');

/**
 * Register sidebars
 */
function widgets_init() {
  
  register_sidebar(array(
  'name'          => __('Sidebar - Internal Pages', 'sage'),
  'id'            => 'sidebar-primary',
  'before_widget' => '<section class="widget %1$s %2$s">',
  'after_widget'  => '</section>',
  'before_title'  => '<h3>',
  'after_title'   => '</h3>',
  ));
  
  register_sidebar(array(
  'name'          => __('Sidebar - Internal Pages 3col', 'sage'),
  'id'            => 'sidebar-secondary',
  'before_widget' => '<section class="widget %1$s %2$s">',
  'after_widget'  => '</section>',
  'before_title'  => '<h3>',
  'after_title'   => '</h3>',
  ));
  
  register_sidebar(array(
  'name'          => __('Sidebar - Blog', 'sage'),
  'id'            => 'sidebar-blog',
  'before_widget' => '<section class="widget %1$s %2$s">',
  'after_widget'  => '</section>',
  'before_title'  => '<h3>',
  'after_title'   => '</h3>',
  ));

  register_sidebar(array(
  'name'          => __('Sidebar - Events', 'sage'),
  'id'            => 'sidebar-events',
  'before_widget' => '<section class="widget %1$s %2$s">',
  'after_widget'  => '</section>',
  'before_title'  => '<h3>',
  'after_title'   => '</h3>',
  ));

  
  register_sidebar(array(
  'name'          => __('Sidebar - Home Page', 'sage'),
  'id'            => 'sidebar-home',
  'before_widget' => '<section class="widget %1$s %2$s">',
  'after_widget'  => '</section>',
  'before_title'  => '<h3>',
  'after_title'   => '</h3>',
  ));
  
  register_sidebar(array(
  'name'          => __('Footer - Column 1', 'sage'),
  'id'            => 'sidebar-footer-1',
  'before_widget' => '<section class="widget %1$s %2$s">',
  'after_widget'  => '</section>',
  'before_title'  => '<h4>',
  'after_title'   => '</h4>',
  ));
  
  register_sidebar(array(
  'name'          => __('Footer - Column 2', 'sage'),
  'id'            => 'sidebar-footer-2',
  'before_widget' => '<section class="widget %1$s %2$s">',
  'after_widget'  => '</section>',
  'before_title'  => '<h4>',
  'after_title'   => '</h4>',
  ));
  
  register_sidebar(array(
  'name'          => __('Footer - Column 3', 'sage'),
  'id'            => 'sidebar-footer-3',
  'before_widget' => '<section class="widget %1$s %2$s">',
  'after_widget'  => '</section>',
  'before_title'  => '<h4>',
  'after_title'   => '</h4>',
  ));
}
add_action('widgets_init', __NAMESPACE__ . '\\widgets_init');
