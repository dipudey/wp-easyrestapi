<?php

if (!defined('WPINC')) {
    die;
}

/**
 * Plugin Name:       Easy Way Rest API
 * Plugin URI:        https://dipudey.com
 * Description:       Easy way rest api declare in oop
 * Version:           1.0.0
 * Author:            Dipu Dey
 * Author URI:        https://dipudey.com
 * License:           GPL-2.0+
 * License URI:
 * Text Domain:       easyresapi
 * Domain Path:       /languages
 */

require_once plugin_dir_path(__FILE__)."lib/autoload.php";
function run_easyrestapi()
{
    \Wp\Easyrestapi\EasyRestApi::instance();
}

add_action( 'plugins_loaded', "run_easyrestapi" );