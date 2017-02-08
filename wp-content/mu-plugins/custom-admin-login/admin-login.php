<?php 

/*
Plugin Name: BB Theme Custom Admin Login
Description: Custom Admin Login for Blackbaud Themes
Author: Blackbaud
Author URI: http://www.blackbaud.com
*/

/**
 * CUSTOMIZE ADMIN LOGIN PAGE
 */

// Add Admin Logo

function my_login_logo() { ?>
          <?php
            $height = $image['sizes'][ $size . '-height' ];
            $image = get_field('logo', 'option'); 
            $size = 'large';
            $thumb = $image['sizes'][ $size ];
            $width = $image['sizes'][ $size . '-width' ];
          ?>
    <style type="text/css">
        body.login {background-color:<?php the_field("admin_bg_clr", "option"); ?>;}
        body.login div#login h1 a {
            background-image: url(<?php echo $thumb; ?>);
            background-position: 50%;
            background-size:contain;
            height:<?php echo $height; ?>px;
            max-width:<?php echo $width; ?>px;
            width:100%; 
        }
        @media (-webkit-min-device-pixel-ratio: 2), (min-resolution: 192dpi) { 
           body.login div#login h1 a { 
              background-image: url(<?php the_field("logo_retina", "option"); ?>);
			        background-position: 50%;
              background-size:contain;
              max-width:<?php echo $width; ?>px;
           }
        }
    </style>
<?php } 
add_action( 'login_enqueue_scripts', 'my_login_logo' );

// CUSTOM ADMIN LOGIN LOGO LINK
 
function change_wp_login_url() 
{
    echo '';  // OR ECHO YOUR OWN URL
}
add_filter('login_headerurl', 'change_wp_login_url');
 
// CUSTOM ADMIN LOGIN LOGO & ALT TEXT
 
function change_wp_login_title() 
{
    echo ''; // OR ECHO YOUR OWN ALT TEXT
}
add_filter('login_headertitle', 'change_wp_login_title');
