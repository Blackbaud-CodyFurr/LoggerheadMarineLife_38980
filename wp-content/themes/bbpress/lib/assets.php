<?php

namespace Roots\Sage\Assets;

/**
 * Scripts and stylesheets
 *
 * Enqueue stylesheets in the following order:
 * 1. /theme/dist/styles/main.css
 *
 * Enqueue scripts in the following order:
 * 1. /theme/dist/scripts/modernizr.js
 * 2. /theme/dist/scripts/main.js
 */

class JsonManifest {
  private $manifest;

  public function __construct($manifest_path) {
    if (file_exists($manifest_path)) {
      $this->manifest = json_decode(file_get_contents($manifest_path), true);
    } else {
      $this->manifest = [];
    }
  }

  public function get() {
    return $this->manifest;
  }

  public function getPath($key = '', $default = null) {
    $collection = $this->manifest;
    if (is_null($key)) {
      return $collection;
    }
    if (isset($collection[$key])) {
      return $collection[$key];
    }
    foreach (explode('.', $key) as $segment) {
      if (!isset($collection[$segment])) {
        return $default;
      } else {
        $collection = $collection[$segment];
      }
    }
    return $collection;
  }
}

function asset_path($filename) {
  $dist_path = get_stylesheet_directory_uri() . DIST_DIR;
  $directory = dirname($filename) . '/';
  $file = basename($filename);
  static $manifest;

  if (empty($manifest)) {
    $manifest_path = get_template_directory() . DIST_DIR . 'assets.json';
    $manifest = new JsonManifest($manifest_path);
  }

  if (array_key_exists($file, $manifest->get())) {
    return $dist_path . $directory . $manifest->get()[$file];
  } else {
    return $dist_path . $directory . $file;
  }
}

function assets() {
  wp_enqueue_style('sage_css', asset_path('styles/css/main.css'), false, null);
  wp_enqueue_style('sage_css', asset_path('styles/css/main-blessed1.css'), false, null);

  if (is_single() && comments_open() && get_option('thread_comments')) {
    wp_enqueue_script('comment-reply');
  }
  if(get_field('retina_js', 'option')) { 
    wp_enqueue_script('retinajs', get_template_directory_uri() . '/assets/scripts/retina.min.js', [], null, true);
  }
  if(get_field('font_resizer_js', 'option')) { 
    wp_enqueue_script('jfontsize', get_template_directory_uri() . '/assets/scripts/jfontsize.js', [], null, true);
  }
  //if in front end (not admin)
  if ( ! is_admin() ) { 

    //register our script with handle 'event_tracking'
    wp_register_script( 'event_tracking', get_template_directory_uri() . '/assets/scripts/event-tracking.js', array('jquery'), '1.0' );

    // enqueue the script
    wp_enqueue_script('event_tracking');

  }
  //wp_enqueue_script('ga-event-track', get_template_directory_uri() . '/assets/scripts/event-tracking.js', [], null, true);
  wp_enqueue_script('modernizr', asset_path('scripts/min/modernizr.js'), [], null, true);
  wp_enqueue_script('sage_js', asset_path('scripts/main.js'), ['jquery'], null, true);
  wp_enqueue_script( 'bootstrap', get_stylesheet_directory_uri() . '/bower_components/bootstrap-sass-official/assets/javascripts/bootstrap.js', array(), '1.0.0', true );
}
add_action('wp_enqueue_scripts', __NAMESPACE__ . '\\assets', 100);
