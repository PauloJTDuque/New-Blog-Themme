<?php

define('INCLUDE_URI', get_template_directory_uri());
define('INCLUDE_PATH', get_template_directory());

// echo '<pre>';
// print_r([
//     INCLUDE_URI,
//     INCLUDE_PATH
// ]);

function load_scripts()
{
   //wp_enqueue_style('main-css', INCLUDE_URI . '/assets/css/main.css', [], false, 'all');

    wp_enqueue_script('app.js', INCLUDE_URI . '/assets/js/app.js', ['jquery'], false, true);

    wp_localize_script('app.js', 'obj', [
        // 'teste' => 'ok',
        // 'search' => isset($_GET['busca']) ? $_GET['busca'] : null, ***Ternário
        'ajaxurl' => admin_url('admin-ajax.php'),

    ]);
}

add_action('wp_enqueue_scripts', 'load_scripts');

register_nav_menus(
    array(
        'header' => esc_html( 'Header menu', 'New Blog Theme'),
        'footer' => esc_html( 'Footer menu', 'New Blog Theme'),
    )
    );


/*
* Themes Supports
*/
add_theme_support( 'title-tag' );
add_theme_support( 'post-thumbnails' );
add_theme_support(
    'html5',
    array(
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
        'navigation-widgets',
    )
);
add_theme_support(
    'custom-logo',
    array(
        'height'               => '500',
        'width'                => '1024',
        'flex-width'           => true,
        'flex-height'          => true,
        'unlink-homepage-logo' => false,
    )
);
add_theme_support( 'custom-header',
    array(
        'width'              => 1000,
        'height'             => 250,
        'flex-width'         => true,
        'flex-height'        => true,
    )
);
add_theme_support( 'editor-styles' );
add_theme_support( 'responsive-embeds' );

show_admin_bar(false);