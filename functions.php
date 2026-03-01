<?php
function school_site_enqueue_assets() {
    
    if ( is_front_page() ) {
        // 1. lightGallery CSS (CDN)
        wp_enqueue_style( 'lightgallery-css', 'https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.2/css/lightgallery-bundle.min.css' );

        // 2. lightGallery JS (CDN)
        wp_enqueue_script( 'lightgallery-js', 'https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.2/lightgallery.min.js', array(), '2.7.2', true );

        // 3. Settings File
        wp_enqueue_script( 
            'school-gallery-init', 
            get_template_directory_uri() . '/js/lightgallery-init.js', // Match your screenshot
            array('lightgallery-js'), 
            '1.0.0', 
            true 
        );
    }
}
add_action( 'wp_enqueue_scripts', 'school_site_enqueue_assets' );