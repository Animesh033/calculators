<?php
/*
Plugin Name: Calculator For ESI, PF, Gratuity, Income & Tax 
Plugin URI: https://complyindia.com/
Description: Calculate ESI, PF, Gratuity, Income & Tax
Version: 1.0.0
Author: Animesh
Author URI: https://complyindia.com/
*/

// Exit if accessed directly
if(!defined('ABSPATH')){
  exit;
}

// Load Scripts
require_once(plugin_dir_path(__FILE__).'/inc/taxesical-scripts.php');
// Load Class
require_once(plugin_dir_path(__FILE__).'/inc/calc-income-tax-class.php');
require_once(plugin_dir_path(__FILE__).'/inc/calc-esi-class.php');
require_once(plugin_dir_path(__FILE__).'/inc/calc-gratuity-class.php');
require_once(plugin_dir_path(__FILE__).'/inc/calc-provident-fund-class.php');
