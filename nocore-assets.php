<?php

/*
Plugin Name: NoCore Custom Assets
Plugin URI: https://github.com/StephanMeijer/nocore-assets
Description: Custom assets for NoCore
Version: 1.0
Author: Stephan Meijer
Author URI: http://www.stephanmeijer.com/
License: MIT
*/

add_action('init', function() {
  require_once(__dir__ . '/vendor/autoload.php');

  $router = new AltoRouter();

  $router->map('GET', '/inschrijven/', function() {
    wp_enqueue_style('remove_free_price_css', plugin_dir_url( __FILE__ ) . 'assets/css/remove_free_price.css');
  });

  $match = $router->match();

  if ($match && is_callable($match['target'])) {
    call_user_func_array($match['target'], $match['params']); 
  }
});