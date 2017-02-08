<?php 
/*
* Callback function to filter the MCE settings
*/

add_filter( 'theme_page_templates', 'my_remove_page_template' );
function my_remove_page_template( $pages_templates ) {

  if(!get_field('internal_2_col', 'option')) { 
    unset( $pages_templates['template-internal-2col.php'] );
  }
  if(!get_field('internal_3_col', 'option')) { 
    unset( $pages_templates['template-internal-3col.php'] );
  }
  if(!get_field('internal_grid', 'option')) { 
    unset( $pages_templates['template-internal-grid.php'] );
  }
  if(!get_field('landing_grid', 'option')) { 
    unset( $pages_templates['template-landing-grid.php'] );
  }
  if(!get_field('landing_blocks', 'option')) { 
    unset( $pages_templates['template-landing-blocks.php'] );
  }
  if(!get_field('template_blog', 'option')) { 
    unset( $pages_templates['template-blog.php'] );
  }
  return $pages_templates;

}

function my_mce_before_init_insert_formats( $init_array ) {  

// Define the style_formats array

  $style_formats = array(  
    // Each array child is a format with it's own settings
    array(  
      'title' => 'Featured Block',  
      'block' => 'span',  
      'classes' => 'featured-block',
      'wrapper' => true,
      
    ),  
    array(  
      'title' => 'Primary Button',  
      'block' => 'span',  
      'classes' => 'btn btn-primary',
      'wrapper' => true,
    ),
    array(  
      'title' => 'Alt Button',  
      'block' => 'span',  
      'classes' => 'alt-button',
      'wrapper' => true,
    ),
    array(  
      'title' => 'Brand Color Bold text',  
      'block' => 'span',  
      'classes' => 'bold-brand',
      'wrapper' => true,
    ),
    array(  
      'title' => 'Sidebar Block Background',  
      'block' => 'div',  
      'classes' => 'sidebar-block',
      'wrapper' => false,
    ),
  );  
  // Insert the array, JSON ENCODED, into 'style_formats'
  $init_array['style_formats'] = json_encode( $style_formats );  
  
  return $init_array;  
  
} 
// Attach callback to 'tiny_mce_before_init' 
add_filter( 'tiny_mce_before_init',  __NAMESPACE__ . '\\my_mce_before_init_insert_formats' ); 

add_shortcode('wpbsearch', 'get_search_form');
function wpbsearchform( $form ) {

    $form = '<form role="search" method="get" id="searchform" action="' . home_url( '/' ) . '" >
    <div>
    <input type="text" placeholder="Type your search phrase here" name="s" id="s" />
    <input type="submit" id="searchsubmit" value="'. esc_attr__('Search') .'" />
    <i class="fa fa-search"></i>

    </div>
    </form>';

    return $form;
}

add_shortcode('wpbsearch', 'wpbsearchform');

function get_excerpt_by_id($post_id){
  $the_post = get_post($post_id); //Gets post ID
  $the_excerpt = $the_post->post_content; //Gets post_content to be used as a basis for the excerpt
  $excerpt_length = 45; //Sets excerpt length by word count
  $the_excerpt = strip_tags(strip_shortcodes($the_excerpt)); //Strips tags and images
  $words = explode(' ', $the_excerpt, $excerpt_length + 1);
  if(count($words) > $excerpt_length) :
  array_pop($words);
  array_push($words, '…');
  $the_excerpt = implode(' ', $words);
  endif;
  $the_excerpt = '<p>' . $the_excerpt . '</p><p><a class="excerpt-btn" href="' . get_permalink() . '">' . __('Continue Reading', 'sage') . '</a></p>';
  return $the_excerpt;
}
