<?php

define('INCLUDE_URI', get_template_directory_uri());
define('INCLUDE_PATH', get_template_directory());

// echo '<pre>';
// print_r([
//     INCLUDE_URI,
//     INCLUDE_PATH
// ]);

function load_scripts() {
    wp_enqueue_style( 'main-css', INCLUDE_URI, "/assets/css/main.css", [], false, 'all' );

    wp_enqueue_script('app.js' . INCLUDE_URI . '/assets/js/app.js' , ['jquery'] , false, true);
}

add_action('wp_enqueue_scripts' , 'load_scripts');

// 38:20
