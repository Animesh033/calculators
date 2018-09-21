<?php
  // Add Scripts
  function add_scripts(){
    // Add Main CSS
    wp_enqueue_style('calc-main-style', plugins_url(). '/taxesical/css/style.css');

    wp_enqueue_style('calc-datepicker-style', plugins_url(). '/taxesical/css/jquery.datetimepicker.min.css');
    // Add Main JS
    wp_enqueue_script('calc-main-script', plugins_url(). '/taxesical/js/main.js', array('jquery'));
    // Additional JS
    wp_enqueue_script('calc-jquery-1.11.2-script', plugins_url(). '/taxesical/js/jquery-1.11.2.js', array('jquery'));

    wp_enqueue_script('calc-jquery-datepicker', plugins_url(). '/taxesical/js/jquery.datetimepicker.full.js', array('jquery'));

  }
  add_action('wp_enqueue_scripts', 'add_scripts');


function wptuts_scripts_load_cdn()
{
    // Deregister the included library
    wp_deregister_script( 'jquery' );
     
    // Register the library again from Google's CDN
    wp_register_script( 'jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js', array(), null, false );
}
add_action( 'wp_enqueue_scripts', 'wptuts_scripts_load_cdn' );

