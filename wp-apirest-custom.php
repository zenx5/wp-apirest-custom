<?php

/**
 * @package WP_APIRest_Kavav
 * @version 1.7.2
 */
/*
Plugin Name: WP Custom APIRest Full by Kavav
Plugin URI: https://kavavdigital.com.ve
Description: Custom APIRest Full
Author: Octavio Martinez
Version: 1.0.0
Author URI: https://wa.me/19104468990
*/

require __DIR__ . '/vendor/autoload.php';

register_activation_hook(__FILE__, array('ApirestCustom', 'active'));
register_deactivation_hook(__FILE__, array('ApirestCustom', 'deactive'));


// register_uninstall_hook(__FILE__, array('WP_Rulette', 'uninstall') );

add_action('init', array('ApirestCustom', 'init'));
