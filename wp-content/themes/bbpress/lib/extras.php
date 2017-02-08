<?php

namespace Roots\Sage\Extras;

use Roots\Sage\Config;

/**
 * Add <body> classes
 */
function body_class($classes) {
  // Add page slug if it doesn't exist
  if (is_single() || is_page() && !is_front_page()) {
    if (!in_array(basename(get_permalink()), $classes)) {
      $classes[] = basename(get_permalink());
    }
  }

  // Add class if sidebar is active
  if (Config\display_sidebar()) {
    $classes[] = 'sidebar-primary';
  }

  return $classes;
}
add_filter('body_class', __NAMESPACE__ . '\\body_class');

/**
 * Clean up the_excerpt()
 */
function excerpt_more() {
  return ' &hellip; <p><a class="excerpt-btn" href="' . get_permalink() . '">' . __('Read More', 'sage') . '</a></p>';
}
add_filter('excerpt_more', __NAMESPACE__ . '\\excerpt_more');


add_filter('nav_menu_css_class' ,  __NAMESPACE__ . '\\special_nav_class' , 10 , 2);
function special_nav_class($classes, $item){
     if( in_array('current-menu-item', $classes) ){
             $classes[] = 'active-current-item ';
     }
     return $classes;
}


add_filter('the_content', __NAMESPACE__ . '\\remove_img_titles');

function remove_img_titles($text) {

    // Get all title="..." tags from the html.
    $result = array();
    preg_match_all('|title="[^"]*"|U', $text, $result);

    // Replace all occurances with an empty string.
    foreach($result[0] as $img_tag) {
        $text = str_replace($img_tag, '', $text);
    }

    return $text;
}

add_filter( 'post_thumbnail_html', __NAMESPACE__ . '\\remove_thumbnail_dimensions', 10, 3 );

function remove_thumbnail_dimensions( $html, $post_id, $post_image_id ) {
    $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
    return $html;
}


//Add Custom styling to WYSIWYG editor => customs styles need to be defined in child them functions.php
function wpb_mce_buttons_2($buttons) {
  array_unshift($buttons, 'styleselect');
  return $buttons;
}
add_filter('mce_buttons_2',  __NAMESPACE__ . '\\wpb_mce_buttons_2');


//Remove unwanted widget areas
function remove_some_widgets(){
    if(!get_field('sidebar_primary', 'option')) { 
      unregister_sidebar( 'sidebar-primary' );

    } if(!get_field('sidebar_secondary', 'option')) { 
      unregister_sidebar( 'sidebar-secondary' );

    } if(!get_field('sidebar_blog', 'option')) { 
      unregister_sidebar( 'sidebar-blog' );

    } if(!get_field('sidebar_events', 'option')) { 
      unregister_sidebar( 'sidebar-events' );

    } if(!get_field('sidebar_home', 'option')) { 
      unregister_sidebar( 'sidebar-home' );

    } if(!get_field('sidebar_footer_1', 'option')) { 
      unregister_sidebar( 'sidebar-footer-1' );

    } if(!get_field('sidebar_footer_2', 'option')) { 
      unregister_sidebar( 'sidebar-footer-2' );

    } if(!get_field('sidebar_footer_3', 'option')) { 
      unregister_sidebar( 'sidebar-footer-3' );
    }
}
add_action( 'widgets_init',  __NAMESPACE__ . '\\remove_some_widgets', 11 );

// Register Custom Navigation Walker


add_filter( 'storm_social_icons_type', create_function( '', 'return "icon-sign";' ) );

if( function_exists('acf_add_options_page') ) {
  
  acf_add_options_page(array(
    'page_title'  => 'Theme General Settings',
    'menu_title'  => 'Client Settings',
    'menu_slug'   => 'theme-general-settings',
    'capability'  => 'edit_posts',
    'redirect'    => false
  ));
  
  acf_add_options_page(array(
    'page_title'  => 'Theme Developer Settings',
    'menu_title'  => 'Developer Only',
    'menu_slug'   => 'developer-settings',
    'capability'  => 'edit_posts',
    'redirect'    => false
  ));
  
  // acf_add_options_sub_page(array(
  //   'page_title'  => 'Theme Footer Settings',
  //   'menu_title'  => 'Footer',
  //   'parent_slug' => 'theme-general-settings',
  // ));
  
}
