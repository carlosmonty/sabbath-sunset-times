<?php
/**
 * Plugin Name: Custom Sabbath Times
 * Plugin URI: https://github.com/carlosmonty/sabbath-sunset-times
 * Description: Provides sunset times for the Sabbath based on the user's location, a countdown to the next Sabbath, and displays the times in a widget.
 * Version: 1.0.0
 * Author: Carlos Montgomery
 * Author URI: https://carlosmontgomery.com
 * License: GPL2
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Define plugin constants
define('SABBATH_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('SABBATH_PLUGIN_URL', plugin_dir_url(__FILE__));

// Include necessary files
require_once SABBATH_PLUGIN_DIR . 'includes/api-functions.php';
require_once SABBATH_PLUGIN_DIR . 'widget/widget.php';

// Register the widget
function register_sabbath_widget() {
    register_widget('Sabbath_Sunset_Widget');
}
add_action('widgets_init', 'register_sabbath_widget');

function sabbath_times_shortcode() {
    if (class_exists('Sabbath_Sunset_Widget')) {
        $widget = new Sabbath_Sunset_Widget();
        return $widget->get_sabbath_times_html();
    }
    return '<p>Unable to display Sabbath times.</p>';
}
add_shortcode('sabbath_times', 'sabbath_times_shortcode');
