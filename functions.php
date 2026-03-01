<?php

function school_site_theme_assets() {
    wp_enqueue_style( 'normalize', 'https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css' );
    wp_enqueue_style( 'school-site-main-style', get_stylesheet_uri(), array('normalize'), '1.0.0' );

    if ( is_front_page() ) {
        wp_enqueue_style( 'lightgallery-css', 'https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.2/css/lightgallery-bundle.min.css' );
        wp_enqueue_script( 'lightgallery-js', 'https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.2/lightgallery.min.js', array(), null, true );
        wp_enqueue_script( 
            'lightgallery-init', 
            get_template_directory_uri() . '/script/lightgallery-init.js', 
            array('lightgallery-js'), 
            null, 
            true 
        );
    }
}
add_action( 'wp_enqueue_scripts', 'school_site_theme_assets' );

function school_site_setup() {
    add_editor_style( 'style.css' );
    add_theme_support( 'site-icon' );
}
add_action( 'after_setup_theme', 'school_site_setup' );