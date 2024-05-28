<?php
/*
Plugin Name: Business Listing Plugin
Description: Custom plugin for business listings with Gutenberg blocks and ACF integration.
Version: 1.0
Author: Your Name
*/

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

require_once plugin_dir_path( __FILE__ ) . 'includes/custom-post-types.php';
require_once plugin_dir_path( __FILE__ ) . 'includes/acf-fields.php';
require_once plugin_dir_path( __FILE__ ) . 'includes/user-registration.php';
require_once plugin_dir_path( __FILE__ ) . 'includes/gutenberg-blocks.php';
require_once plugin_dir_path( __FILE__ ) . 'includes/site-creation.php';
require_once plugin_dir_path( __FILE__ ) . 'includes/whatsapp-integration.php';
require_once plugin_dir_path( __FILE__ ) . 'includes/form-shortcode.php';