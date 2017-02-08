<?php 

/*
Plugin Name: BB Theme Custom Admin Dashboard
Description: Custom Admin Dashboard for Blackbaud Themes
Author: Blackbaud
Author URI: http://www.blackbaud.com
*/


/**
 *  This is the Blackbaud's custom dashboard
 *  1 - Sets up the branding logo in the admin bar - uses the blackbaud favicon + add any custom styles for the dashboard here
 *  2 - Sets up the full branding logo on top of the dashboard - uses the blackbaud logo found in /assets/images
 *  3 - Customizes the dasboard footer
 *  4 - Remove default widgets, help tab and screen options
 *  5 - Custom Welcome Panel
 *  6 - Custom Widget 1 => NPengage Feed
 *  7 - BB Interactive Vimeo
 *  8 - 
 *
 *
 *
 */


/*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*  
  1- Blackbaud Admin Bar Logo
=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*  */

    //hook the administrative header output
    add_action('admin_head', 'my_custom_logo');

    function my_custom_logo() {
      echo '
      <style type="text/css">
      #wp-admin-bar-wp-logo { background-image: url(/wp-content/mu-plugins/custom-admin-dashboard/favicon.ico) !important; width:30px; height:30px; background-size:30px; }
      #wp-admin-bar-wp-logo:hover .ab-item {background:none !important;}
      #wpadminbar #wp-admin-bar-wp-logo > .ab-item .ab-icon::before {color:transparent;}
      .videoWrapper { position: relative; padding-bottom: 56.25%; height: 0; }
      .videoWrapper iframe { position: absolute; top: 0; left: 0; width: 100%; height: 100%; }
      </style>
      ';
    }



/*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*  
  2- Blackbaud Branded Dashboard Logo
=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*  */


    // CUSTOM ADMIN DASHBOARD HEADER LOGO
     
    function custom_admin_logo()
    {
        echo 
        '<style type="text/css">
          body.wp-admin.index-php #wpbody-content .wrap h1 { 
            background-image: url(/wp-content/mu-plugins/custom-admin-dashboard/logo.png) !important; 
            background-repeat:no-repeat;
            width:250px;
            height:140px;
            background-size:250px;
            color:transparent;
          }
          body.wp-admin.index-php #wpbody-content .wrap h2 a {
            left:0;
            margin-top:115px;
            top:0;
            position:absolute;
          }
          body.wp-admin.index-php .welcome-panel {
            margin-top:-40px;
          }
          @media (-webkit-min-device-pixel-ratio: 2), (min-resolution: 192dpi) { 
           body.wp-admin.index-php #wpbody-content .wrap h2 { 
              background-image: url(/wp-content/mu-plugins/custom-admin-dashboard/logo@2x.png);
           }
        }
        </style>';
    }
    add_action('admin_head', 'custom_admin_logo');




/*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*  
  3- Blackbaud branded Dashboard Footer
=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*  */

    // Admin footer modification
 
      function remove_footer_admin () 
      {
          echo '<span id="footer-thankyou">Developed by <a href="http://blackbaud.com" target="_blank">Blackbaud</a></span>';
      }
      add_filter('admin_footer_text', 'remove_footer_admin');



/*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*  
  4- Remove default widgets and screen options
=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*  */
  //removes defaults widgets
    function remove_dashboard_meta() {
        remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );
        remove_meta_box( 'dashboard_secondary', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
        remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );
        remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_activity', 'dashboard', 'normal');//since 3.8
    }
    add_action( 'admin_init', 'remove_dashboard_meta' );


    // removes Help tab
    add_filter( 'contextual_help', 'mytheme_remove_help_tabs', 999, 3 );
    function mytheme_remove_help_tabs($old_help, $screen_id, $screen){
        $screen->remove_help_tabs();
        return $old_help;
    }

    //removes Screen options
//     add_filter('screen_options_show_screen', '__return_false');

/*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*  
  5- Custom Welcome Panel
=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*  */

      
      function rc_my_welcome_panel() { ?>
    
      <script type="text/javascript">
      /* Hide default welcome message */
        jQuery(document).ready( function($) 
        {
          $('div.welcome-panel-content, .welcome-panel-close').hide();
        });
      </script>
      <?php wp_nonce_field( 'welcome-panel-nonce', 'welcomepanelnonce', true ); ?>
    <div class="custom-welcome-panel-content">
      <h3><?php _e( 'Welcome to your Blackbaud Website!' ); ?></h3>
      <p class="about-description"><?php _e( 'We’ve assembled some links to get you started:' ); ?></p>
      <div class="welcome-panel-column-container">
        <div class="welcome-panel-column">
          <h4><?php _e( 'Next Steps' ); ?></h4>
          <ul>
          <?php if ( 'page' == get_option( 'show_on_front' ) && ! get_option( 'page_for_posts' ) ) : ?>
            <li><?php printf( '<a href="%s" class="welcome-icon welcome-edit-page">' . __( 'Edit your front page' ) . '</a>', get_edit_post_link( get_option( 'page_on_front' ) ) ); ?></li>
            <li><?php printf( '<a href="%s" class="welcome-icon welcome-add-page">' . __( 'Add additional pages' ) . '</a>', admin_url( 'post-new.php?post_type=page' ) ); ?></li>
          <?php elseif ( 'page' == get_option( 'show_on_front' ) ) : ?>
            <li><?php printf( '<a href="%s" class="welcome-icon welcome-edit-page">' . __( 'Edit your front page' ) . '</a>', get_edit_post_link( get_option( 'page_on_front' ) ) ); ?></li>
            <li><?php printf( '<a href="%s" class="welcome-icon welcome-add-page">' . __( 'Add additional pages' ) . '</a>', admin_url( 'post-new.php?post_type=page' ) ); ?></li>
            <li><?php printf( '<a href="%s" class="welcome-icon welcome-write-blog">' . __( 'Add a blog post' ) . '</a>', admin_url( 'post-new.php' ) ); ?></li>
          <?php else : ?>
            <li><?php printf( '<a href="%s" class="welcome-icon welcome-write-blog">' . __( 'Write your first blog post' ) . '</a>', admin_url( 'post-new.php' ) ); ?></li>
            <li><?php printf( '<a href="%s" class="welcome-icon welcome-add-page">' . __( 'Add an About page' ) . '</a>', admin_url( 'post-new.php?post_type=page' ) ); ?></li>
          <?php endif; ?>
            <li><?php printf( '<a href="%s" class="welcome-icon welcome-view-site">' . __( 'View your site' ) . '</a>', home_url( '/' ) ); ?></li>
          </ul>
        </div>
        <div class="welcome-panel-column">
          <h4><?php _e( 'More Actions' ); ?></h4>
          <ul>
            <li><?php printf( '<div class="welcome-icon welcome-widgets-menus">' . __( 'Manage <a href="%1$s">widgets</a> or <a href="%2$s">menus</a>' ) . '</div>', admin_url( 'widgets.php' ), admin_url( 'nav-menus.php' ) ); ?></li>
            
            <li><?php printf( '<a href="%s" class="welcome-icon welcome-learn-more">' . __( 'Learn more about getting started' ) . '</a>', __( 'http://codex.wordpress.org/First_Steps_With_WordPress' ) ); ?></li>
            <li><?php printf( '<a href="%s" class="welcome-icon welcome-learn-more">' . __( 'Watch Training Videos' ) . '</a>', __( '/wp-admin/admin.php?page=wp101' ) ); ?></li>
            
          </ul>
        </div>
        <div class="welcome-panel-column welcome-panel-last">
          <h4><?php _e( "Can we help?" ); ?></h4>
          <a class="button button-primary button-hero" href="https://www.blackbaud.com/support/needhelp.aspx" target="_blank"><?php _e( 'Get help from Blackbaud' ); ?></a>
            <p class="hide-if-no-customize"><?php printf( __( 'or, <a href="%s">edit your site settings</a>' ), admin_url( 'options-general.php' ) ); ?></p>
        </div>
      </div>
    </div>


    <?php }
    add_action( 'welcome_panel', 'rc_my_welcome_panel' );

    add_action( 'load-index.php', 'show_welcome_panel' );

      function show_welcome_panel() {
          $user_id = get_current_user_id();

          if ( 1 != get_user_meta( $user_id, 'show_welcome_panel', true ) )
              update_user_meta( $user_id, 'show_welcome_panel', 1 );
      }


/*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*  
  6- Custom Widget 1 - NPengage feed
=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*  */

    add_action('wp_dashboard_setup', 'npengage_dashboard_widgets');
 
    function npengage_dashboard_widgets() {
      global $wp_meta_boxes;
      wp_add_dashboard_widget('custom_help_widget', 'npEngage Feed', 'custom_dashboard_help');
    } 

    function custom_dashboard_help() {
      echo '
      <p>The go to resource for nonprofits looking to advance their mission through fundraising, marketing, social media, management, technology and more.</p>
      <script language="JavaScript" src="http://www.feedroll.com/rssviewer/feed2js.php?src=http%3A%2F%2Ffeeds.feedburner.com%2Fnpengage&chan=y&desc=150>1&num=5&utf=y"  charset="UTF-8" type="text/javascript"></script>
            <noscript><a href="http://www.feedroll.com/rssviewer/feed2js.php?src=http%3A%2F%2Ffeeds.feedburner.com%2Fnpengage&chan=y&desc=1&utf=y&html=y">View RSS feed</a></noscript>';
    }




/*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*  
  7- Custom Widget 2 - BB Interactive Vimeo
=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*  */



  
add_action( 'wp_dashboard_setup', 'video_dashboard_setup' );
	function video_dashboard_setup() {
	    wp_add_dashboard_widget(
	        'video-dashboard-widget',
	        'Blackbaud Interactive',
	        'video_dashboard_content',
	        $control_callback = null
	    );
	}
	
	function video_dashboard_content() {
	    echo '<div class="videoWrapper"><iframe src="https://player.vimeo.com/video/88277666" width="500" height="281" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe></div>';
	}


/*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*  
  8- 
=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*  */


add_action( 'wp_dashboard_setup', 'bbtwitter_dashboard_setup' );
  function bbtwitter_dashboard_setup() {
      wp_add_dashboard_widget(
          'bbtwitter-dashboard-widget',
          'Blackbaud Interactive Twitter Feed',
          'bbtwitter_dashboard_content',
          $control_callback = null
      );
  }
  
  function bbtwitter_dashboard_content() {
      echo '<a class="twitter-timeline" href="https://twitter.com/BBInteractive" data-widget-id="642434101866311680">Tweets by @BBInteractive</a>
            <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?"http":"https";if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>';
  }
                  

