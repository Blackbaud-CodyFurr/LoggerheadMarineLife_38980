<?php
/**
 * Sage includes
 *
 * The $sage_includes array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 *
 * Please note that missing files will produce a fatal error.
 *
 * @link https://github.com/roots/sage/pull/1042
 */
$sage_includes = array(
    'lib/utils.php',                        // Utility functions
    'lib/init.php',                         // Initial theme setup and constants
    'lib/wrapper.php',                      // Theme wrapper class
    'lib/conditional-tag-check.php',        // ConditionalTagCheck class
    'lib/config.php',                       // Configuration
    'lib/assets.php',                       // Scripts and stylesheets
    'lib/titles.php',                       // Page titles
    'lib/extras.php',                       // Custom functions
    'lib/customizer.php',                   // Theme Options
    'lib/nav.php',                          // Custom nav modifications
    'lib/gallery.php',                      // Custom [gallery] modifications
    'lib/breadcrumbs.php',                  // Breadcrumbs
    'lib/theme-updater.php',                // Blackbaud's automatic theme updater
    'templates/m__bootstrap_pagination.php' // Bootstrap pagination
);


# Include dependencies and libraries.
foreach ($sage_includes as $file) {
    if (!$filepath = locate_template($file)) {
        trigger_error(sprintf(__('Error locating %s for inclusion', 'sage'), $file), E_USER_ERROR);
    }
    require_once $filepath;
}
unset($file, $filepath);


# Advanced Custom Fields filters.
function acf_location_rules_types($choices) {
    $choices['Basic']['user'] = 'User';
    return $choices;
}

function acf_location_rules_operators($choices) {
    $choices['<'] = 'is less than';
    $choices['>'] = 'is greater than';
    return $choices;
}

function acf_location_rules_values_user($choices) {
    $users = get_users();
    if ($users) {
        foreach ($users as $user) {
            $choices[$user->data->ID] = $user->data->display_name;
        }
    }
    return $choices;
}

function acf_location_rules_match_user($match, $rule, $options) {
    $current_user = wp_get_current_user();
    $selected_user = (int) $rule['value'];
    if ($rule['operator'] == "==") {
        $match = ($current_user->ID == $selected_user);
    } elseif ($rule['operator'] == "!=") {
        $match = ($current_user->ID != $selected_user);
    }
    return $match;
}



# WordPress database filters.
if (function_exists('get_field') && get_field('hide_acf', 'option')) {
    add_filter('acf/settings/show_admin', '__return_false');
}

add_filter('acf/location/rule_types', 'acf_location_rules_types');
add_filter('acf/location/rule_operators', 'acf_location_rules_operators');
add_filter('acf/location/rule_values/user', 'acf_location_rules_values_user');
add_filter('acf/location/rule_match/user', 'acf_location_rules_match_user', 10, 3);
add_filter('auto_update_plugin', '__return_true');
add_filter('auto_update_theme', '__return_true');
add_filter('login_errors',create_function('$a', "return null;"));


# Hook into the automatic theme updater.
if (function_exists('get_field') && get_field('bb_theme_update', 'option')) {
    new blackbaud\ThemeUpdater();
}

function my_mce_buttons_2($buttons) { 
  /**
   * Add in a core button that's disabled by default
   */
  $buttons[] = 'superscript';
  $buttons[] = 'subscript';

  return $buttons;
}
add_filter('mce_buttons_2', 'my_mce_buttons_2');


